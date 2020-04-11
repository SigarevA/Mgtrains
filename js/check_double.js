function checkName(url) {
    var xhr = new XMLHttpRequest();
    console.log(url);
    xhr.open('GET', url , false);
    xhr.send();
    console.log(xhr.responseText);
    let response = JSON.parse(xhr.responseText);
    return response["status"];
}

function template_err(e, str) {
    $('#err_msg').empty();
    $("#err_msg").addClass("alert alert-danger");
    $("#err_msg").css('visibility', "visible");
    $('<strong>Ошибка!</strong>').appendTo('#err_msg');
    $(str).appendTo('#err_msg');
    e.preventDefault();
}
