<?php
include "../config/viruscheckmate.inc";
// Scanner initialization
$vcm     = new viruscheckmate\scanner("470d208f8d49f5f94ece3abe422dff28862b87df");

// Scan file
$filename = "C:\\Program Files\\Mozilla Firefox\\firefox.exe";

if (!file_exists($filename)) {
    echo "file {$filename} not found\n";
    echo "script working dir is: ". getcwd() ."\n";
    echo "put {$filename} to this dir or use absolute path to file (example: C:\\Program Files\\Mozilla Firefox\\firefox.exe)\n";
    exit;
}
$task    = new viruscheckmate\task();
$task->scanFiles($filename);

// Scan massive of files
$task    = new viruscheckmate\task();
$task->addObject("C:\\Program Files\\Mozilla Firefox\\firefox.exe");      // you can use local path to file
$task->addObject("C:\\Program Files\\Mozilla Firefox\\firefox.exe"); // as long as absolute file paths
$task->addObject("C:\\Program Files\\Mozilla Firefox\\firefox.exe");
$task->scanFiles();

// Scan files from directory
$task    = new viruscheckmate\task();
$task->scanDirectory('dir'); // local and absolute dir paths are both allowed

// Scan domain + add all resolved IPs to task (as optional)
$task    = new viruscheckmate\task();
$task->scanDomainOrIP("www.tv-jirinka.wz.cz");

// Check massive of domaines and IPs + choose engine set (as optional)
$task    = new viruscheckmate\task();
$task->enableEngine("nod32");               // optional
$task->enableEngine("kasper");              // optional
$task->enableEngine("comodo,clam,k7av");    // optional
$task->addObject("www.yandex.com");
$task->addObject("www.google.com");
$task->addObject("8.8.8.8");
$task->addObject("8.8.4.4");
$task->scanDomainOrIP();

// Check massive of domaines and IPs from list + save list of clean objects to text file (as optional)
$task    = new viruscheckmate\task();
$task->scanDomainsFromList("domainslist.txt");
$task->saveCleanToFile();                   // optional

// how to get information see in example_get_task_info.php

