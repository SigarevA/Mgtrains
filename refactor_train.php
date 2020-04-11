<?php
    require("head.php");
    if(!$_SESSION["user_id"]) {
        header("Location: http://mgtrains.com/");
        exit;
    }
?>

<head>
    <?php
        require("includes/connect_select2_lib.php");
    ?>
</head>
<div class="container">

    <input class="form-control margin-top-bottom" id='name' placeholder="поиск"></input>
    <div class="row">     
        <div class="col-lg-9">
            <select id="station"  name="station" class="form-control departure" selected="selected">
                <option value="init">--- Поиск по станции ---</option>
            </select>
        </div>   
        <div  class="col-lg-2 text-center">
            <button class="btn" id="discharge">сбросить</button>
        </div>
    </div>
    <br><br/>
    <div class='listTrain' id="listTrain"></div>

</div>
<script>


    $('#discharge').click(
        function(e) {
            $('#name').val("");
            $('#station').val('init').change();
        }
    )

    $('#station').on('change',
        function (e) {
            getListTrain($('#name').val());
        }
    );

    $(document).ready(
        function (e) {
            getListTrain();
        }
    );

    function getListTrain(name) {
        if (name == undefined)
        {
            name = "";
        }

        url = 'includes/list_train.php?name='+name;

        if ( $('#station').val() != "init")
            url += "&station=" + $('#station').val();
        let xhr = new XMLHttpRequest();

        xhr.open('GET', url);
        xhr.responseType = 'document';
        xhr.send();
        xhr.onload = function() {
            $('#listTrain').empty();    
            console.log(xhr.response.body);
            $('#listTrain').html(xhr.response.body);
            console.log(xhr.response);
        }
    }

    $("#station").select2(
                { 
                    ajax : {
                        url : 'http://mgtrains.com/includes/Handler_requst.php',
                        type : "GET",
                        dataType : 'json',
                        delay: 250,
                        data : function(params) {
                            return {text : params.term };
                        },
                        processResults: function (response) {
                            
                            return {
                                results: response
                            };
                        },
                        cache : false 
                    }
                }
            );
 
    $('#name').keyup(
        function () {
            console.log($('#name').val());
            getListTrain($('#name').val());
        }
    );
</script>