<?php

    if (isset($_POST["trainID"])) {
        
        require("../includes/connect_bd.php");
        
        $id = mysqli_escape_string($link , $_POST["trainID"]);
        $query = "DELETE FROM train WHERE TrainID = $id";
        $result = mysqli_query($link, $query);
        $query = "UPDATE carriage SET TrainID = NULL WHERE TrainID = $id";
        $result = mysqli_query($link, $query);
        $query = "UPDATE locomotive SET TrainID = NULL WHERE TrainID = $id";
        $result = mysqli_query($link, $query);


        if ($result) 
            header("Location: http://mgtrains.com/message.php?id=9");
        else 
            header("Location: http://mgtrains.com/message.php?id=10");
        exit;
    }
?>