<?php
    require("head.php");
    if(!$_SESSION["user_id"]) {
        header("Location: http://mgtrains.com/");
        exit;
    }
?>


<head>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
    <div class="container">
        <form id="timeTableForm" method="POST" action="services/add_route.php">
        <div class="row">
            <input type="hidden" name="branchID" value="<?php echo $_GET["branch"];?>">
            <?php
                require("includes/connect_bd.php");
                $branch = mysqli_escape_string($link, $_GET["branch"]);
                $query = "SELECT s.name as stationName , s.id as StationID FROM stationtothebranch sb INNER JOIN station s ON sb.id_station = s.id WHERE sb.id_branch = $branch";
                $result = mysqli_query($link, $query);
            ?>


            <div class="col-lg-6">
                <label for="departure">Станция отправления : </label>

                <?
                    while($station = mysqli_fetch_assoc($result)) {

                ?>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="<?php echo htmlspecialchars($station["StationID"], ENT_HTML5); ?>" name="customRadio" class="custom-control-input" value="<?php echo htmlspecialchars($station["StationID"], ENT_HTML5); ?>">
                        <label class="custom-control-label" for="<?php echo htmlspecialchars($station["StationID"], ENT_HTML5); ?>"><?php echo htmlspecialchars($station["stationName"], ENT_HTML5); ?></label>
                    </div>
                    
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <lable for="dateStart">Дата отправки : </lable>
                <input class="form-control" id="datepicker" type="text" name="dateStart"/>
            </div>
            <div class="col-lg-6">
                <lable>Время отправки : </lable>
                <input class="form-control" type="text" id="timeStart" name="timeStart" placeholder="hh:mm"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <lable for="dateEnd">Дата прибытия : </lable>
                <input class="form-control" id="dateEnd" type="text" name="dateEnd"/>
            </div>
            <div class="col-lg-6">
                <lable for="timeEnd">Время прибытия : </lable>
                <input class="form-control" type="text" id="timeEnd" name="timeEnd" placeholder="hh:mm"/>
            </div>
        </div>
        <div class='listTrain' id="listTrain"></div>

        </form>
        <div class="padding-btn">
            <button class="btn btn-secondary" form="timeTableForm">Пустить</button>
        </div>
    </div>
</body> 
<script>

    $(":radio[name='customRadio']").change(function() {
        getListTrain($(":radio[name='customRadio']:checked").val());
    });




    function change_disabled(value) {
        $('#destination').prop("disabled", value);
    }    

    $(document).ready(
        
        function(e) {
            $('#destination').prop("disabled", true);
            $( "#datepicker" ).datepicker();
            $('#dateEnd').datepicker();
        }
    )


    $('#timeTableForm').submit(
        function(e) {
            if ( !($("input[name=customRadio]:checked").length > 0) ) {
                alert ("Выберите станцию отправления !");
                e.preventDefault();
                return false;
            }
            if ($("#datepicker").val().trim() == "") {
                alert ("Выберите дату отправления !");
                e.preventDefault();
                return false;
            }
            if ($('#timeStart').val().trim() == ''){
                alert('Выберите время отправки!');
                e.preventDefault();
                return false;

            }
            if($('#timeEnd').val().trim() == '') {
                alert('Выберите время прибытия!');
                e.preventDefault();
                return false;

            }
            if ($('#dateEnd').val().trim() == '') {
                alert('Выберите Дату прибытия!');
                e.preventDefault();
                return false;
            }
            let reg = /\d\d:\d\d/
            if ($('#timeEnd').val().search(reg) == -1 ) {
                alert("Неверный формат в поле \'Время прибытия\'");
                e.preventDefault();
                return false;
            } 
            if ($('#timeStart').val().search(reg) == -1 ){
                alert("Неверный формат в поле \'Время отправления\'");
                e.preventDefault();
                return false;
            }
        }
    )

    function getListTrain(id) {
        url = 'services/get_free_train_station.php?stationID='+id;
        let xhr = new XMLHttpRequest();

        xhr.open('GET', url);
        xhr.responseType = 'document';
        xhr.send();
        xhr.onload = function() {
            $('#listTrain').empty();    
            console.log(xhr.response.body);
            inputs = xhr.response.body.getElementsByTagName('input');
            for ( var i = 0 ; i < inputs.length; i++ ) {
                console.log(i); 
                inputs[i].addEventListener('change', 
                    function(e) {
                        console.log(e.target.value);
                    }
                )
            }
            $('#listTrain').html(xhr.response.body);
            console.log(xhr.response);
        }
    }
</script>