<?php
    require("head.php");
    if(!$_SESSION["user_id"]) {
        header("Location: http://mgtrains.com/");
        exit;
    }
?>

<div class="container">
    <h4>Ветки</h4>
    <input class="form-control" type="text" placeholder="поиск" id="name"/>


    <div class='listBranch' id="listBranch"></div>
</div>


<script>

    function getListBranch(name) {
        if (name == undefined)
        {
            name = "";
        }

        url = 'services/get_list_branch.php?text='+name;


        let xhr = new XMLHttpRequest();

        xhr.open('GET', url);
        xhr.responseType = 'document';
        xhr.send();
        xhr.onload = function() {
            $('#listBranch').empty();    
            console.log(xhr.response.body);
            $('#listBranch').html(xhr.response.body);
            console.log(xhr.response);
        }
    }

    $(document).ready(
        function(e) {
            getListBranch()
        }
    )

    $('#name').keyup(
        function () {
            console.log($('#name').val());
            getListBranch($('#name').val());
        }
    );



</script>


