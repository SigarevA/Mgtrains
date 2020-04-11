<?php


    if (isset($_GET["name"]) && isset($_GET["city"]) && isset($_GET["country"]) ) {
        
        require("connect_bd.php");
        $name = mysqli_escape_string($link, $_GET["name"]);
        $city = mysqli_escape_string($link, $_GET["city"]);
        $country = mysqli_escape_string($link, $_GET["country"]);
        $query = "SELECT * FROM station WHERE name = '$name'";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) == 0 ) {
            $response = ["status" => true];
        }
        else {
            $response = ["status" => false];
        }

        header('Content-type: application/json');
        echo json_encode( $response );
    }
?>