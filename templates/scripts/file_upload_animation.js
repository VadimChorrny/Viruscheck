const buttonValue = document.getElementById('btn-scan');

function uploadFile() {
    buttonValue.innerHTML = '<div class="spinner-border" role="status">\n' +
        '                <span class="visually-hidden">Loading...</span>\n' +
        '            </div>'
}

function validateForm() {
    valid = true;
    if (document.upload_form.scan_file.value == "") {
        alert("Please, select your file for scanning!");
        valid = false;
    }
    return valid;
}