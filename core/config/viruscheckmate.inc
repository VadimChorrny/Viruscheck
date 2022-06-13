<?php

namespace viruscheckmate;

class scanner
{

    const API_VERSION = 1;

    const ENGINE_TYPE_FILE = 1;
    const ENGINE_TYPE_ADDRESS = 2;

    const default_server = "http://avcheck.net/vhm";

    static $curl_handle;

    private $_apikey;
    private $_server;
    private $_lastrequestraw;
    private $_dataresponseraw;

    protected $_allowed_methods = array(
        'service' => array(
            'get'
        ),
        'check' => array(
            'new',
            'get'
        )
    );

    private function _curl_reset()
    {
        curl_close(self::$curl_handle);
        self::$curl_handle = curl_init();
        curl_setopt(self::$curl_handle, CURLOPT_RETURNTRANSFER, true);
    }

    private function _filterHTTPCode($http_code)
    {

    }

    private function _request($method, $submethod = 'get', $task_id = null, $post = null)
    {
        $this->_curl_reset();

        if (!array_key_exists($method, $this->_allowed_methods)) {
            throw new \Exception("Unknown method '$method'");
        } else if (!in_array($submethod, $this->_allowed_methods[$method])) {
            throw new \Exception("Unknown submethod '$submethod' of method '$method'");
        }

        $current_request = "/api/v" . self::API_VERSION . "/$method/$submethod/";

        if ($task_id !== null) {
            $current_request .= "$task_id/";
        }

        $url = $this->_server . $current_request;

        curl_setopt(self::$curl_handle, CURLOPT_URL, $url);

        if ($post !== null) {
            curl_setopt(self::$curl_handle, CURLOPT_POST, true);
            curl_setopt(self::$curl_handle, CURLOPT_POSTFIELDS, $post);
        }

        $result = curl_exec(self::$curl_handle);

        if ($result === false) {
            throw new \Exception(curl_error(self::$curl_handle));
        }

        $curl_exec_info = curl_getinfo(self::$curl_handle);

        $return_array = json_decode($result, true);

        if ($return_array === null) {
            scanner::_filterHTTPCode($curl_exec_info['http_code']);
            print_r($result);
            throw new \Exception("Unkown error in response");
        }

        if (!isset($return_array['status'])) {
            throw new \Exception("Unkown response");
        } else if ($return_array['status'] !== 1) {
            throw new \Exception($return_array['status_t']);
        }

        return $return_array;
    }

    private function _getEngineProp($Engine, $Prop)
    {
        if (!$this->_lastrequestraw) {
            $this->getInfo();
        }

        foreach ($this->_lastrequestraw['data']['engines'] as $_engine) {
            if ($Engine == $_engine['short_name']) {
                if (isset($_engine[$Prop])) {
                    return $_engine[$Prop];
                } else {
                    return false;
                }
            }
        }

        return false;
    }

    function getTaskData($task_id)
    {
        task::_filterTaskId($task_id);
        $this->_dataresponseraw = $this->_request('check', 'get', $task_id, array('apikey' => $this->_apikey));
        return $this->_dataresponseraw;
    }

    function getInfo($task_id = null)
    {
        if ($task_id !== null) {
            task::_filterTaskId($task_id);
        }

        $this->_lastrequestraw = $this->_request('service', 'get', $task_id, array('apikey' => $this->_apikey));

        return $this->_lastrequestraw;
    }

    function getEngineFullName($Engine)
    {
        return $this->_getEngineProp($Engine, 'full_name');
    }

    function getEngineVersion($Engine)
    {
        return $this->_getEngineProp($Engine, 'version');
    }

    function getEngineUpdate($Engine)
    {
        return $this->_getEngineProp($Engine, 'def_time');
    }

    function getAvailableEngines($CheckType, $Engine = null)
    {
        if (!$this->_lastrequestraw) {
            $this->getInfo();
        }

        $_engines = array();

        foreach ($this->_lastrequestraw['data']['engines'] as $_engine) {
            if ($_engine['status'] != 1 || !($CheckType & $_engine['type'])) {
                continue;
            }

            if ($Engine != null) {
                if ($Engine == $_engine['short_name']) {
                    return true;
                }
            } else {
                $_engines[] = $_engine['short_name'];
            }
        }

        if ($Engine != null || count($_engines) == 0) {
            return false;
        } else {
            return $_engines;
        }
    }

    function _requestScan($params)
    {
        $_params = $params;
        $_params['apikey'] = $this->_apikey;
        return $this->_request('check', 'new', null, $_params);
    }

    function __construct($apikey, $server = self::default_server)
    {
        if (!function_exists('curl_init')) {
            throw new \Exception("Please, enable curl");
        }

        scanner::_filterAPIKey($apikey);

        $ch = curl_init();
        if ($ch === false) {
            throw new \Exception("Curl initialization error");
        }

        self::$curl_handle = $ch;

        $this->_server = $server;
        $this->_apikey = $apikey;

        task::$scanner = $this;
    }

    function __destruct()
    {
        curl_close(self::$curl_handle);
    }

    static function _filterAPIKey($task_id)
    {
        if (!preg_match("/^[a-z0-9]{40}$/", $task_id)) {
            throw new \Exception("Wrong 'APIKey'");
        }
    }
}

class task
{

    static $scanner;
    /// OUTPUT OBJECTS
    private $_task_id;
    private $_detectCount;
    private $_detectedObjects;
    private $_detectedEngines;
    private $_cleanObjects;
    private $_cleanEngines;
    private $_cleanItems;
    private $_detectedItems;
    private $_allItems;
    private $_usedEngines;
    private $_lastrequestraw;

    /// INPUT OBJECTS
    private $_type;
    private $_fileUpload;
    private $_inputObjects;
    private $_engineSet;
    private $_uaSet;

    protected $_STATUSES = array(
        -1 => 'ERROR',
        0 => 'NOT_READY',
        1 => 'CHECKING',
        2 => 'CHECKING',
        3 => 'CHECKING',
        4 => 'DONE',
        5 => 'DONE',
        6 => 'DONE'
    );

    private $_options = array(
        'use_profile' => "",
        'uagents' => "",
        'option_fast' => false,
        'option_usecache' => false,
        'option_autocheck' => false,
        'option_unpack' => false,
        'option_resolve' => false,
        'response_type' => 'on_close'
    );

    function __construct($task_id = null, $apikey = null)
    {
        if ($task_id !== null) {
            task::_filterTaskId($task_id);
            $this->_task_id = $task_id;
        }

        if ($apikey !== null) {
            task::$scanner = new scanner($apikey);
        } else {
            if (task::$scanner == null) {
                throw new \Exception("Initialized scanner not found, need APIKEY");
            }
        }

        $this->_inputObjects = array();
        $this->_engineSet = array();
        $this->_uaSet = array();

        $this->_fileUpload = false;
    }

    function addObject($object)
    {
        if (!is_string($object) || $object == "") {
            throw new \Exception("Wrong object");
        } else if (in_array($object, $this->_inputObjects)) {
            throw new \Exception("Object already added");
        }

        $this->_inputObjects[] = trim($object);
    }

    function setOption($option, $param)
    {
        if (!isset($this->_options[$option])) {
            throw new \Exception("Wrong option");
        }

        $this->_options[$option] = $param;
    }

    function enableUA($UA)
    {
        $_newua = explode(",", $UA);
        foreach ($_newua as $_ua) {
            if (strlen($_ua) < 3) {
                continue;
            }

            if (in_array($_ua, $this->_uaSet)) {
                continue;
            }

            $this->_uaSet[] = $_ua;
        }
    }

    function clearUASet()
    {
        $this->_uaSet = array();
    }

    function setProfile($profile)
    {
        $this->cleanEngineSet();
        $this->setOption("use_profile", trim($profile));
    }

    function clearProfile()
    {
        $this->setOption("use_profile", "");
    }

    function enableEngine($engines)
    {
        $this->clearProfile();

        $_newengines = explode(",", $engines);
        foreach ($_newengines as $_engine) {
            if (strlen($_engine) < 3) {
                continue;
            }

            if (in_array($_engine, $this->_engineSet)) {
                continue;
            }

            $this->_engineSet[] = trim($_engine);
        }
    }

    function cleanEngineSet()
    {
        $this->_engineSet = array();
    }

    private function _scan()
    {
        $this->_options['task_type'] = $this->_type;

        switch ($this->_type) {
            case 'link':
            case 'clouds_link':
            case 'webpage':
                $this->_options['url'] = $this->_inputObjects[0];
                break;
            case 'clouds_file':
            case 'file':
                if ($this->_fileUpload === true) {
                    foreach ($this->_inputObjects as $key => $file) {
                        if (!file_exists($file)) {
                            throw new \Exception("file {$file} not found");
                        }
                        $this->_options["file[$key]"] = new \CURLFile($file, 'application/octet-stream');
                    }
                }
                break;
            case 'domain':
                if ($this->_fileUpload === true) {
                    $this->_options['file'] = new \CURLFile($this->_inputObjects[0], 'application/octet-stream');
                } else {
                    if (count($this->_inputObjects) > 1) {
                        foreach ($this->_inputObjects as $key => $object) {
                            $this->_options["url[$key]"] = $object;
                        }
                    } else {
                        $this->_options['url'] = $this->_inputObjects[0];
                    }
                }
                break;
        }

        $this->_fileUpload = false;

        if (count($this->_engineSet) > 0) {
            $this->_options['use_profile'] = "";
            $this->_options['engines'] = implode(",", $this->_engineSet);
        }

        if (count($this->_uaSet) > 0 && $this->_type == "webpage") {
            $this->_options['uagents'] = implode(",", $this->_uaSet);
        }

        $data = $this->getData(null, task::$scanner->_requestScan($this->_options));

        if ($this->_options['response_type'] == "on_close" || $this->_options['response_type'] == "") {
            while (!$this->isDone()) {
                sleep(1);
                $this->getData();
            }
        }

        return $data;
    }

    function scanDomainOrIP($object = null)
    {
        $this->_type = "domain";

        $this->_fileUpload = false;

        if ($object !== null) {
            $this->addObject($object);
        } else if (count($this->_inputObjects) == 0) {
            throw new \Exception("Need object to check");
        }

        return $this->_scan();
    }

    function scanLinkToFileWithClouds($object = null)
    {
        $this->_type = "clouds_link";

        $this->_fileUpload = false;

        if ($object !== null) {
            $this->addObject($object);
        } else if (count($this->_inputObjects) == 0) {
            throw new \Exception("Need object to check");
        }

        return $this->_scan();
    }

    function scanLinkToFile($object = null)
    {
        $this->_type = "link";

        $this->_fileUpload = false;

        if ($object !== null) {
            $this->addObject($object);
        } else if (count($this->_inputObjects) == 0) {
            throw new \Exception("Need object to check");
        }

        return $this->_scan();
    }

    function scanDomainsFromList($object = null)
    {
        $this->_type = "domain";

        $this->_fileUpload = true;

        if ($object !== null) {
            $this->addObject($object);
        } else if (count($this->_inputObjects) == 0) {
            throw new \Exception("Need object to check");
        }

        return $this->_scan();
    }

    function scanWebPage($object = null)
    {
        $this->_type = "webpage";

        $this->_fileUpload = false;

        if ($object !== null) {
            $this->addObject($object);
        } else if (count($this->_inputObjects) == 0) {
            throw new \Exception("Need object to check");
        }

        return $this->_scan();
    }

    function scanFilesWithClouds($object = null)
    {
        $this->_type = "clouds_file";

        $this->_fileUpload = true;

        if ($object !== null) {
            $this->addObject($object);
        } else if (count($this->_inputObjects) == 0) {
            throw new \Exception("Need object to check");
        }

        return $this->_scan();
    }

    function scanFiles($object = null)
    {
        $this->_type = "file";

        $this->_fileUpload = true;

        if ($object !== null) {
            $this->addObject($object);
        } else if (count($this->_inputObjects) == 0) {
            throw new \Exception("Need object to check");
        }

        return $this->_scan();
    }

    function scanDirectory($Directory)
    {
        $this->_type = "file";

        $this->_fileUpload = true;

        if (!is_string($Directory) || strlen($Directory) == 0 || realpath($Directory) == "") {
            throw new \Exception("Wrong directory");
        }

        $Directory = rtrim($Directory, '\/');

        $files = scandir(realpath($Directory));

        foreach ($files as $file) {
            if ($file[0] == '.') {
                continue;
            } else {
                $this->addObject(realpath($Directory . DIRECTORY_SEPARATOR . $file));
            }
        }

        if (count($this->_inputObjects) == 0) {
            throw new \Exception("Need object to check");
        }

        return $this->_scan();
    }

    function setTaskId($task_id)
    {
        task::_filterTaskId($task_id);
        $this->_task_id = $task_id;
    }

    function getTaskId()
    {
        return $this->_task_id;
    }

    function getInfo($task_id = null)
    {
        if ($task_id !== null) {
            task::_filterTaskId($task_id);
            $this->_task_id = $task_id;
        }

        $rawdata = task::$scanner->getInfo($this->_task_id);
        return $rawdata;
    }

    function getData($task_id = null, $rawdata = null)
    {
        if ($rawdata === null) {
            if ($task_id === null && $this->_task_id === null) {
                throw new \Exception("TaskId unknown");
            } else if ($task_id !== null) {
                task::_filterTaskId($task_id);
                $this->_task_id = $task_id;
            }
        }

        if ($rawdata) {
            $this->_lastrequestraw = $rawdata;
        } else {
            $this->_lastrequestraw = task::$scanner->getTaskData($this->_task_id);
        }

        $this->_task_id = $this->_lastrequestraw['data']['info']['check_id'];

        $results_section = isset($this->_lastrequestraw['data']['results']) ? $this->_lastrequestraw['data']['results'] : array();
        $objects_section = isset($this->_lastrequestraw['data']['objects']) ? $this->_lastrequestraw['data']['objects'] : array();

        $this->_detectCount = 0;
        $this->_detectedObjects = array();
        $this->_detectedEngines = array();
        $this->_cleanObjects = array();
        $this->_cleanEngines = array();
        $this->_cleanItems = array();
        $this->_detectedItems = array();
        $this->_allItems = array();
        $this->_usedEngines = array();

        if (isset($this->_lastrequestraw['data']['results'])) {
            foreach ($results_section as $engine => $objects) {
                foreach ($objects['objects'] as $object => $result) {
                    if ($engine != null) {

                        if (!in_array($engine, $this->_usedEngines)) {
                            $this->_usedEngines[] = $engine;
                        }

                        if ($result['fast_detect'] == 1) {
                            $this->_detectCount++;
                            if (in_array($engine, $this->_detectedEngines) === false) {
                                $this->_detectedEngines[$engine][] = $object;
                            }
                            if (in_array($object, $this->_detectedObjects) === false) {
                                $this->_detectedObjects[$object][$engine] = $result['detect_name'];
                            }
                        } else {
                            if (in_array($engine, $this->_cleanEngines) === false) {
                                $this->_cleanEngines[$engine][] = $object;
                            }
                            if (in_array($object, $this->_cleanObjects) === false) {
                                $this->_cleanObjects[$object][] = $engine;
                            }
                        }
                    }
                }
            }
        }
        if (isset($this->_lastrequestraw['data']['objects'])) {
            //var_dump($this->_detectedObjects);
            foreach ($objects_section as $num => $object) {
                $object_name = $object['object'];
                $this->_allItems[$object_name] = array('size' => $object['size'], 'md5' => $object['md5'], 'sha1' => $object['sha1'], 'type' => $object['type']);
                if (key_exists($object_name, $this->_detectedObjects)) {
                    $this->_detectedItems[$object_name] = $this->_detectedObjects[$object_name];
                } else {
                    $this->_cleanItems[] = $object_name;
                }
            }
        }

        return $this->_lastrequestraw;
    }

    function _firstrequest()
    {
        if (!$this->_lastrequestraw || $this->_lastrequestraw['data']['info']['status'] == NULL) {
            if ($this->_task_id === null) {
                throw new \Exception("TaskId unknown");
            }

            $this->getData();
        }
    }

    function getStatus()
    {
        $this->_firstrequest();
        $STATUS_INT = $this->_lastrequestraw['data']['info']['status'];
        return isset($this->_STATUSES[$STATUS_INT]) ? $this->_STATUSES[$STATUS_INT] : $this->_STATUSES[-1];
    }

    function isDone()
    {
        $status = $this->getStatus();
        return $status != 'CHECKING' && $status != 'NOT_READY';
    }

    function isError()
    {
        $status = $this->getStatus();
        return $status == 'ERROR' || $status == 'NOT_READY';
    }

    function isDetected()
    {
        $this->_firstrequest();

        if (count($this->_detectedObjects) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function isClean()
    {
        return !$this->isDetected();
    }

    function getCleanItems()
    {
        $this->_firstrequest();
        return $this->_cleanItems;
    }

    function getDetectedItems()
    {
        $this->_firstrequest();
        return $this->_detectedItems;
    }

    function getItems()
    {
        $this->_firstrequest();
        return $this->_allItems;
    }

    function getDetectedEngines()
    {
        $this->_firstrequest();
        return $this->_detectedEngines;
    }

    function getUsedEngines()
    {
        $this->_firstrequest();
        return $this->_usedEngines;
    }

    function saveCleanToFile($FileName = "clean.txt", $glue = "\r\n")
    {
        $_items = $this->getCleanItems();
        $_content = implode($glue, $_items);
        if (file_put_contents($FileName, $_content) === false) {
            throw new \Exception("file_put_contents() Error writing file");
        }
    }

    static function _filterTaskId($task_id)
    {
        if (!preg_match("/^[a-z0-9]{12}$/i", $task_id)) {
            throw new \Exception("Wrong 'task_id'");
        }
    }
}

