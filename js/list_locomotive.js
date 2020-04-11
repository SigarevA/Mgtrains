function print() {

    url = 'includes/get_list_locomotive.php';

    let xhr = new XMLHttpRequest();

    if ( id != undefined) {
        url += '&id=' + id;
    }

    xhr.open('GET', url);
    xhr.responseType = 'json';
    xhr.send();

    xhr.onload = function() {
        let responseObj = xhr.response;
        console.log(xhr.response);
        alert(responseObj.message);
    };
}
