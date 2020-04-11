<?php

    if (isset($_POST["trainID"]) && isset($_POST["carriageID"]) )
    {
        require("../includes/connect_bd.php");
        $carriageID = mysqli_escape_string($link, $_POST["carriageID"]);
        $trainID = mysqli_escape_string($link, $_POST["trainID"]);

        $query = "UPDATE carriage SET TrainID = $trainID WHERE id = $carriageID ";
        echo $query;
        $result = mysqli_query($link, $query);
        if ($result) {
?>
            <div class="alert alert-success" role="alert">
                <strong>Выполнено!</strong> Вагон успешно добавлен. 
            </div>
<?php
        }
?>

<?php
        if (!$result) {
?>
            <div class="alert alert-danger" role="alert">
                <strong>Ошибка!</strong> Что-то пошло не так.2
            </div>
<?php
        }

    }

?>