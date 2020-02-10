<?php
    session_start();
    if(!$_SESSION["user_id"]) {
        header("Location: http://mgtrains.com/");
    }
?>

<!-- Форма добавления вагона -->
<?php
    if( isset($_GET["add"]) )
    {
        require("head.php");
?>
        <div class="container">

            <!-- Форма добавления станции -->
            <?php
                if ($_GET["add"] == "station") 
                { 
            ?>
                    <h3>Добавление станции</h3>
                    <form action="includes/adding.php" id="formMenuStation" method="POST">
                        <input type="hidden" name="form_id" value="1">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Название станции</label>
                            <input type="text" name="namestation" class="form-control" id="InputNameStation" placeholder="Название станции">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Страна</label>
                            <input type="text" name="namecountry" class="form-control" id="NameCountry" placeholder="Страна">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Город</label>
                            <input type="text" name="namecity" class="form-control" id="NameCity" placeholder="Город">
                        </div>
                        <button class="btn btn-success" id="send_station">Добавить</button>
                    </form>

                    <script type="text/javascript">

                        document.getElementById("formMenuStation").addEventListener("submit" , check_fillstation);

                        function check_fillstation(e) {
                            if( document.getElementById("InputNameStation").value === '') {
                                e.preventDefault();
                                alert("Заполните поле \"Название станции\"");
                                document.getElementById("InputNameStation").focus();
                                return false;
                            }
                            if( document.getElementById("NameCountry").value === '') {
                                e.preventDefault();
                                alert("Заполните поле \"Страна\"");
                                document.getElementById("NameCountry").focus();
                                return false;
                            }
                            if( document.getElementById("NameCity").value === '') {
                                e.preventDefault();
                                alert("Заполните поле \"Город\"");
                                document.getElementById("NameCity").focus();
                                return false;
                            }
                        }
                    </script>
            <?php
                }
            ?>

            <!-- Форма добавления вагона -->
            <?php
                if ($_GET["add"] == "carriage") 
                { 
            ?>
                    <h3>Добавление вагона</h3>

                    <form action="includes/adding.php" id="formMenuCarriage" method="POST">
                        <input type="hidden" name="form_id" value="2">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Серийный номер :</label>
                            <input type="text" name="serialnumber" class="form-control" id="SerialNumber" placeholder="Серийный номер">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Количество мест :</label>
                            <input type="text" name="countplace" class="form-control" id="CountPlace" placeholder="Количество мест">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Класс :</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">1</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">2</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" value="3" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio3">3</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Вес</label>
                            <input type="text" name="namecity" class="form-control" id="Weight" placeholder="Вес">
                        </div>
                        <button class="btn btn-success" id="send_carriage">Добавить</button>
                    </form>
                    <script type="text/javascript">

                        document.getElementById("formMenuCarriage").addEventListener("submit" , check_fillCarriage);

                        function check_fillCarriage(e) {
                            if( document.getElementById("SerialNumber").value === '') {
                                e.preventDefault();
                                alert("Заполните поле \"Серийный номер\"");
                                document.getElementById("SerialNumber").focus();
                                return false;
                            }
                            if( document.getElementById("CountPlace").value === '') {
                                e.preventDefault();
                                alert("Заполните поле \"Количество мест\"");
                                document.getElementById("CountPlace").focus();
                                return false;
                            }
                            if( document.getElementById("Weight").value === '') {
                                e.preventDefault();
                                alert("Заполните поле \"Вес\"");
                                document.getElementById("Weight").focus();
                                return false;
                            }
                            var reg = /^(\d)*[\.(\d)+]?$/;
                            if (document.getElementById("Weight").value.search(reg) == -1) {
                                e.preventDefault();
                                alert("Поле \'Вес\' принимает только число (разделитель точка)");
                                return false;
                            } 
                            if (!$('input[name="customRadio"]').is(':checked')){
                                e.preventDefault();
	                            alert('Выберите класс!');
                                return false;
                            }
                        }
                    </script>
            <?php
                }
            ?>

            <?php
                if ($_GET["add"] == "locomotive") 
                { 
            ?>
                    <h3>Добавление локомотива</h3>
                    <form action="includes/adding.php" id="formMenuLocomotive" method="POST">
                        <input type="hidden" name="form_id" value="3">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Серийный номер :</label>
                            <input type="text" name="serialnumber" class="form-control" id="SerialNumber" placeholder="Серийный номер">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Мощность :</label>
                            <input type="text" name="power" class="form-control" id="Power" placeholder="кВт"> 
                            
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Пробег : </label>
                            <input type="text" name="mileage" class="form-control" id="mileage" placeholder="км">
                        </div>
                        <button class="btn btn-success" id="send_carriage">Добавить</button>
                    </form>
                    <script type="text/javascript">

                        document.getElementById("formMenuLocomotive").addEventListener("submit" , check_fillLocomotive);

                        function check_fillLocomotive(e) {

                            if( document.getElementById("SerialNumber").value === '') {
                                e.preventDefault();
                                alert("Заполните поле \"Серийный номер\"");
                                document.getElementById("SerialNumber").focus();
                                return false;
                            }
                            if( document.getElementById("Power").value === '') {
                                e.preventDefault();
                                alert("Заполните поле \"Мощность\"");
                                document.getElementById("Power").focus();
                                return false;
                            }
                            if( document.getElementById("mileage").value === '') {
                                e.preventDefault();
                                alert("Заполните поле \"Пробег\"");
                                document.getElementById("mileage").focus();
                                return false;
                            }
                            if ( !Number.isInteger(+document.getElementById("Power").value ) ) {
                                e.preventDefault();
                                document.getElementById("Power").value = '';
                                alert("Поле\"Мощность\" принимает только целочисленные значения!");
                                document.getElementById("Power").focus();
                                return false;
                            }
                        }
                        
                    </script>
            <?php
                }
            ?>
        </div>
<?php
    }
?>

