// function check() {
const currFile = document.getElementById('scan_file');
//
const url = 'http://avcheck.net/vhm/api/v1/check/new/';
//
//     const model = {
//         apiKey: '470d208f8d49f5f94ece3abe422dff28862b87df',
//         task_type: 'file',
//         file: currFile.files[0],
//         url: '45.151.238.168',
//         engines: 'main profile',
//         response_type: 'on_close'
//     }
//
//     let fetchData = {
//         mode: 'no-cors',
//         method: 'POST',
//         headers: {
//             "Content-Type": "application/json"
//         },
//         body: model
//     }
//
//     console.log('Curr file: ', currFile.files[0])
//     console.log('My model: ', model);
//     console.log('Body: ', fetchData.body)
//
//     fetch(url, fetchData).then(data => {
//         return console.log(data);
//     }).then(res => {
//         console.log(res)
//     }).catch(error => {
//         console.log('Error result: ',error)
//     })
//
// }
//
//

const getData = async () => {

    let formData = new FormData();
    formData.append('apiKey', '470d208f8d49f5f94ece3abe422dff28862b87df');
    formData.append('task_type', 'file');
    formData.append('file', currFile.files[0]);
    formData.append('url', '45.151.238.168');
    formData.append('engines', 'main profile');

    // Display the key/value pairs
    for (let pair of formData.entries()) {
        console.log(pair[0], pair[1]);
    }

    await fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'Content-Type': 'multipart/form-data'
        },
        mode: 'no-cors'
    }).then(response => console.log(response))
        .then(data => {
            console.log('Data: ',data);
        })
        .catch(err => {
            console.log('Error: ', err)
        })


}