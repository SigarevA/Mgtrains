<?php
    require("head.php");
    if(!$_SESSION["user_id"]) {
        header("Location: http://mgtrains.com/");
    }
?>

<head>
    <?php
        require("includes/connect_select2_lib.php");
    ?>
</head>
<?php
    if( isset($_GET["what"])) 
    {
?>      
        <div class="container">
            <?php
                if($_GET["what"] == 'branch') 
                {
            ?>
                    <h3>Формирование ветки</h3>

                    <form id="formbranch" method="POST" action="includes/formation_branch.php">
                        <div id="err_msg"> </div>
                        <div class="form-group">
                            <span class="label">Название первой станции : </span>
                            <br/><br/>
                            <select id="departure"  name="departure" class="form-control departure" selected="selected" form="formbranch">
                                <option value="init">--- Выберите станцию ---</option>
                            </select>
                            <br/>
                        </div>
                        <div class="form-group">
                            <div>
                                <span class="label">Название второй станции : </span>
                            </div>
                            <br/>
                            <select name="destination_station" id="destination_station" class="form-control" form="formbranch">
                                <option value="init">--- Выберите станцию ---</option>
                            </select>
                            <br/>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Протяженность : </label>
                            <input type="text" name="length" class="form-control" id="length" placeholder="км">
                        </div>
                        <button class="btn btn-success" id="send_carriage">Добавить</button>
                    </form>
                    <script type="text/javascript" src="js/formation_branch.js"></script>
            <?php
                }
            ?>
            <?php
                if( $_GET["what"] == "train") 
                {
            ?>
                    <h3>Формирование состава</h3>
                    <form action="includes/formation_train.php" method="POST" id="formtrain">
                        <div id="err_msg"> </div>
                        <div class="form-group">
                            <label for="name_train">Название поезда : </label>
                            <input type="text" name="name_train" class="form-control" id="name_train" placeholder="Голубой">
                        </div>
                        Станция нахождения : 

                    <br/><br/>

                            <select id="station"  name="station" class="form-control departure" selected="selected" form="formtrain">
                                <option value="init">--- Выберите станцию отправления ---</option>
                            </select>
                            <br/><br/>
                    </form>
                    <button class="btn btn-primary btn-left" type="submit" form="formtrain"> Далле <img class="traingleNext" src="media/RightTrain.png"></button>
                    <script src="js/check_double.js"></script>
                    <script>
                        

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


                        $('#formtrain').on("submit", 
                            function (e) {
                                let value = $('#name_train').val();
                                var url = "includes/check_available_name.php?name_train=" + value;
                                console.log(url);
                                var res = checkName(url);
                                console.log(res);
                                if (!res) {
                                    e.preventDefault();
                                    var str = '<span>Поезд с таким именем уже занят!</span>';
                                    template_err(e, str);
                                }
                                if ($('#station').val() == "init" ) {
                                    e.preventDefault();
                                    var str = '<span>Выберите станцию сборки!</span>';
                                    template_err(e, str);
                                }
                            }
                        );

                    </script>
            <?php
                }
            ?>
        </div>
<?php
    }
?>