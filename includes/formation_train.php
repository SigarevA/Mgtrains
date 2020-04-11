<?php

    if ( isset($_POST["name_train"]) && isset($_POST["station"]));
    {
        require("connect_bd.php");

        $name_train = mysqli_escape_string($link, $_POST["name_train"]);
        $stationid = mysqli_escape_string($link, $_POST["station"]);
        $query = "INSERT INTO train (trainName, StationID) VALUES('$name_train', $stationid)";
        $result = mysqli_query($link, $query);

        $id = mysqli_insert_id($link);

        if (!$result) {
            header("Location: http://mgtrains.com/message.php?id=7");
            exit;
        }

        header("Location: http://mgtrains.com/add_to_train_locomotive.php?id=$id");
        exit;
    }
?>