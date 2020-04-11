<?php
        require("head.php");
        if(!$_SESSION["user_id"]) {
            header("Location: http://mgtrains.com/");
        }
?>

<div class="container">

    <h4>Добавление вагона</h4>
    <input type="hidden" id='trainID' value='<?php echo $_GET['trainID']?>' />
    <div class='message' id='message'></div>
    <div class="container">
        <input class='form-control margin-top-bottom' type='text' id='SerialNumber' placeholder="поиск">
        <div class="listlocomotive" id='listcarriage'></div>
    </div>

    <a class="btn btn-primary btn-left" href="http://mgtrains.com/refactor_train_by_id.php?id=<?php echo $_GET['trainID']?>">завершить </a>

</div>

<script>

function getList(name) {
    if (name == undefined) {
        name = '';
    }
    let train = $('#trainID').val();
    let url = 'services/list_free_carriage.php?serialNumber=' + name;
    let xhr = new XMLHttpRequest();

    xhr.open('GET', url);
    xhr.responseType = 'document';
    xhr.send();
    xhr.onload = function() {
        $('#listcarriage').empty();    
        buttons = xhr.response.body.getElementsByTagName('button');
        for ( var i = 0 ; i < buttons.length; i++ ) {
            buttons[i].addEventListener('click', 
                function(e) {
                    console.log(e.target.value);
                    addCarriage(e.target.value);
                }
            )
        }
        console.log(xhr.response.body);
        $('#listcarriage').html(xhr.response.body);
        console.log(xhr.response);
    }
}


function addCarriage(id) {

    let train = $('#trainID').val();
    let url = 'services/add_carriage_to_train.php';
    let xhr = new XMLHttpRequest();
    xhr.responseType = 'document';
    xhr.open('POST', url);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

    xhr.send('trainID=' + train + '&carriageID=' + id)

    xhr.onload = function() {
        $('#message').empty();
        console.log(xhr.response.body);
        $('#message').html(xhr.response.body);
        getList($('#SerialNumber').val());
    }
}

$(document).ready( function () {
    getList ();
    $('#test').keyup(
    function() {
        alert($('#test').val());
    }
)
});
    
</script>