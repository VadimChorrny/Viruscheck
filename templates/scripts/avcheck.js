const currFile = document.getElementById('scan_file');

const url = 'http://avcheck.net/vhm/api/v1/check/new/';

const btnUpload = document.getElementById('btn_scan');

const getData = () => {

    btnUpload.innerHTML = 'Loading...'
    btnUpload.disabled = true;

    let formData = new FormData();
    formData.append('apikey', '470d208f8d49f5f94ece3abe422dff28862b87df');
    formData.append('task_type', 'file');
    formData.append('file', currFile.files[0]);
    formData.append('url', '45.151.238.168');
    formData.append('engines', 'main profile');

    var res = ''

    axios.post(url, formData)
        .then(function (response) {
            res = response;
            localStorage.setItem('response', JSON.stringify(res));
            localStorage.setItem('currFile', currFile.files[0].name)
            window.location.href = 'templates/main.php';
            btnUpload.disabled = false;
        })
        .catch(function (error) {
            console.log(error);
            btnUpload.disabled = false;
        });

}
