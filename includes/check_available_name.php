<?php

    if (isset($_GET["name_train"])) {

        require("connect_bd.php");
        $name = mysqli_escape_string($link, $_GET["name_train"]);

        $query = "SELECT * FROM train WHERE TrainName = '$name'";
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