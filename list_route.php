<?php
    require("head.php");
    if(!$_SESSION["user_id"]) {
    header("Location: http://mgtrains.com/");
    exit;
}
?>


<div class='container'>
    <h4>Поездки</h4>
    <div id="msg"></div>
    <div id="list"></div>
</div>

<script>


    function confirm(train) {
        let url = 'services/confirm_route.php';
        let xhr = new XMLHttpRequest();
        xhr.responseType = 'document';
        xhr.open('POST', url);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

        xhr.send('train=' + train);

        xhr.onload = function() {
            $('#msg').empty();
            console.log(xhr.response.body);
            $('#msg').html(xhr.response.body);
            getList();
        }
    }

    $(document).ready(
        function(e){
            getList();
        }
    )

    function getList() {
        
        let url = 'services/get_all_route.php';
        let xhr = new XMLHttpRequest();
        xhr.open('GET', url);
        xhr.responseType = 'document';
        xhr.send();
        xhr.onload = function() {
            $('#list').empty();    
            console.log(xhr.response.body);
            buttons = xhr.response.body.getElementsByTagName('button');
        for ( var i = 0 ; i < buttons.length; i++ ) {
            buttons[i].addEventListener('click', 
                function(e) {
                    console.log(e.target.value);
                    confirm(e.target.value);
                }
            );
        }
            $('#list').html(xhr.response.body);
            console.log(xhr.response);
        }
    }

</script>