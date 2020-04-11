<?php
    require("head.php");
    if(!$_SESSION["user_id"]) {
        header("Location: http://mgtrains.com/");
    }
?>

<div class="container">

    <h3>Добавление локомотива</h3>
    <input type="hidden" id='trainID' value='<?php echo $_GET['id']?>' />
    <div class='message' id='message'></div>
    <div class="container">
        <input class='form-control margin-top-bottom' type='text' id='serualNumber' placeholder="поиск">
        <div class="listlocomotive" id='listlocomotive'></div>
    </div>

    <a class="btn btn-primary btn-left" href="add_carriage_to_train.php?trainID=<?php echo $_GET['id']?>">Далле <img class="traingleNext" src="media/RightTrain.png"></a>

<script src="js/list_locomotive.js"> </script>
<script >

function add(name) {
    if (name == undefined) {
        name = '';
    }
    let train = $('#trainID').val();
    let url = 'includes/get_list_locomotive.php?train=' + train + '&serialNumber=' + name;
    let xhr = new XMLHttpRequest();

    xhr.open('GET', url);
    xhr.responseType = 'document';
    xhr.send();
    xhr.onload = function() {
        $('#listlocomotive').empty();    
        buttons = xhr.response.body.getElementsByTagName('button');
        for ( var i = 0 ; i < buttons.length; i++ ) {
            buttons[i].addEventListener('click', 
                function(e) {
                    console.log(e.target.value);
                    addLocomotive(e.target.value);
                }
            )
        }
        console.log(xhr.response.body);
        $('#listlocomotive').html(xhr.response.body);
        console.log(xhr.response);
    }
}


function addLocomotive(id) {

    let train = $('#trainID').val();
    let url = 'includes/addLocomotivetoTrain.php';
    let xhr = new XMLHttpRequest();
    xhr.responseType = 'document';
    xhr.open('POST', url);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

    xhr.send('trainID=' + train + '&locomotiveID=' + id)

    xhr.onload = function() {
        $('#message').empty();
        console.log(xhr.response.body);
        $('#message').html(xhr.response.body);
        add($('#serualNumber').val());
    }
}

$(document).ready( function () {
    add();
    $('#test').keyup(
    function() {
        alert($('#test').val());
    }
)
});

$('#serualNumber').keyup(
    function(e) {
        add($('#serualNumber').val());
    }
);
</script>
</div>