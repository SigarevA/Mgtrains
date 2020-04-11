<?php
    require("head.php");
?>
<head>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <?php
        require("includes/connect_select2_lib.php");
    ?>

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
    
    <div class="container margininfo">

            <div class="row">
                <div class="col-lg-4">
                    <label for="departure">Выберите станцию отправления : </label>
                    <select id="departure"  name="departure" class="form-control departure" selected="selected">
                        <option value="init">--- Cтанция отправления ---</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="destination">Выберите станцию назначения : </label>
                    <select id="destination"  name="destination" class="form-control departure" selected="selected">
                        <option value="init">--- Cтанция назначения---</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="datepicker"><span>Дата</span> : </label>
                    <input class="form-control" type="text" id="datepicker"/>          
                </div>
            </div>
                <div class="margin_top">
                    <button type="button" id="search" class="btn  btn-block btn-outline-success"> Подобрать 
                </button>
            </div>

            <div id="listTrain">
            </div>
<script>
$( function() {
    $( "#datepicker" ).datepicker();
});
</script>

<script>
        const url = 'http://mgtrains.com/includes/Handler_requst.php';

        var xhr = new XMLHttpRequest();

        xhr.open("GET", url);

        xhr.onload = function () {
            console.log( JSON.parse(xhr.response));
            console.error('dsfdf');
        }

        xhr.send();

        $('#search').click(
            function (e) {
                if ( $('#departure').val() == "init") {
                    alert("Выберите станцию отправления!");
                    return false;
                }
                if ( $('#destination').val() == "init") {
                    alert("Выберите станцию назначения!");
                    return false;
                }
                if( $('#datepicker').val() == "") {
                    alert("Выберите дату!");
                    return false;
                }
                
                getList();
            }
        );

        function getList() {

        let departure = $('#departure').val();
        let destination = $('#destination').val();
        let date = $('#datepicker').val();
        console.log(date);
        let url = 'services/get_list_route.php?departure='+ departure + '&destination=' + destination + '&date=' + date;

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


        $("#destination").select2(
                { 
                    ajax : {
                        url : 'http://mgtrains.com/includes/Handler_requst.php',
                        type : "GET",
                        dataType : 'json',
                        delay: 250,
                        data : function(params) {
                            return {
                                text : params.term ,
                                destination : $('#departure').val()
                            };
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

        $("#departure").select2(
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

</script>
    </div>

</body>