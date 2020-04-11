<?php
    require("head.php");
    if(!$_SESSION["user_id"]) {
        header("Location: http://mgtrains.com/");
        exit;
    }
?>

<head>
    <link rel="stylesheet" type="text/css" href="mystyle/the-modal.css" media="all"></link>
</head>
<?php 
    if (isset($_GET["id"])) {

    require("includes/connect_bd.php");
    $id = mysqli_escape_string($link, $_GET["id"]);
    $query = "SELECT * FROM train WHERE TrainID = $id";
    $result = mysqli_query($link, $query);
    $train = mysqli_fetch_assoc($result);

?>



    <div class="container">
        <form id="trainProfile" method="post" action="services/delete_train.php">
            <input type="hidden" name="trainID" value="<?php echo $_GET["id"]?>">
        </form>
        <div class="card margin-top-bottom">
            <h4 class="card-title">Профиль поезда</h4>
            <div class="card-body">
                <p class="card-text"> Название :
                    <?php
                        echo htmlspecialchars($train["TrainName"]);
                    ?>
                    <br/>
                    Местоположение : 
                    <?php
                        $stationID = $train["StationID"];
                        $query = "SELECT * FROM station WHERE id = $stationID";
                        $result = mysqli_query($link, $query);
                        $station = mysqli_fetch_assoc($result);
                        echo htmlspecialchars($station['name']);
                    ?>
                    <br/>
                    Количество вагонов : 
                    <?php
                        $query = "SELECT * FROM carriage WHERE TrainID = $id";
                        $result = mysqli_query($link, $query);
                        $num = mysqli_num_rows($result);
                        echo $num;
                        $countPlace = 0;
                        while ($carrige = mysqli_fetch_assoc($result)) {
                            $countPlace += $carrige["CountPlace"];
                        }
                    ?>
                    <br/>
                    Количество мест : <?php echo $countPlace;?>
                </p>

                <input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
                
               
                <a href="add_carriage_to_train.php?trainID=<?php echo $_GET["id"];?>" class="card-link">Добавить вагон</a> 
            </div>
            <div class="card-footer">
                <button class="btn btn-outline-dark btn-block" form="trainProfile">Удалить</button>
            </div>
        </div>
    </div>
<?php
    }
?>



<script src="js/jquery.the-modal.js"></script>
<script>

</script>