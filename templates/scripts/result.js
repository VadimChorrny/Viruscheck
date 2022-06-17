function getResponse(){
    const response = localStorage.getItem('response');
    console.log(JSON.parse(response));
}