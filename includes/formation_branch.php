<?php

   /* function createErr(){
        header("");
        exit();
    }
*/
    if (    
            isset($_POST['length']) && 
            isset($_POST['departure']) && 
            isset($_POST['destination_station']) 
        )
    {
        require("connect_bd.php");
        $length = mysqli_escape_string($link, $_POST["length"]);
        $departure = mysqli_escape_string($link, $_POST["departure"]);
        $destination = mysqli_escape_string($link, $_POST["destination_station"]);

        $create_branch = "INSERT INTO branch(distance) VALUES ($length)";
        $result = mysqli_query($link, $create_branch);
        $branch_id = mysqli_insert_id($link);
        $add_station_to_branch = "INSERT INTO stationtothebranch(id_branch, id_station) VALUES($branch_id, $departure)";
        $result = mysqli_query($link, $add_station_to_branch);

        $add_station_to_branch = "INSERT INTO stationtothebranch(id_branch, id_station) VALUES($branch_id, $destination) ";
        $result = mysqli_query($link, $add_station_to_branch);
        header("Location: http://mgtrains.com/");
        exit;
    }
    else {
        header("HTTP/1.0 404 Not Found");
        die();
    }

?>