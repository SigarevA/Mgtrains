<?php
    if (isset($_POST["train"])) {
        require("../includes/connect_bd.php");

        $train = mysqli_escape_string($link, $_POST["train"]);
        
        $query = "SELECT * FROM routes WHERE train_ID = $train";
        $result = mysqli_query($link, $query);
        $route = mysqli_fetch_assoc($result);

        $query = "DELETE FROM routes WHERE train_ID = $train";
        $result = mysqli_query($link, $query);
        if (!$result ) {
            ?>
            <div class="alert alert-danger" role="alert">
                <strong>Ошибка</strong> Не удалось удалить маршрут.
            </div>
        <?php   
        }
        $bracnID = mysqli_escape_string($link, $route['id_branch']);
        $station_departure = mysqli_escape_string($link, $route['station_departure']);
        
        $query = "SELECT * FROM stationtothebranch WHERE id_branch = $bracnID and id_station <> $station_departure";
        $result = mysqli_query($link, $query);
        $stationDestination = mysqli_fetch_assoc($result);
        $destination = $stationDestination["id_station"];

        $query = "UPDATE train SET StationID = $destination WHERE TrainID = $train"; 
        $result = mysqli_query($link, $query);
        if (!$result) 
            {
        ?>
            <div class="alert alert-danger" role="alert">
                <strong>Ошибка</strong> Не удалось обновить позд, возможно он был удален.
            </div>
        <?php    
            }
        ?>

        <?php
            if ($result) 
            {
        ?>
                <div class="alert alert-success" role="alert">
                    <strong>Выполнено!</strong> Маршрут подтвержден.
                </div>
        <?php
            }
        ?>

<?php
    
    }
?>
<?php
    if (!isset($_POST["train"])){
?>
    <div class="alert alert-danger" role="alert">
        <strong>Ошибка</strong> Что - то пошло не так.
    </div>
<?php       
    }
?>