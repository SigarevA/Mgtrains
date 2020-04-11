<?php

    require("connect_bd.php");
    if(isset($_POST["form_id"]) and $_POST["form_id"] == 1 ) {
        
        $name = mysqli_escape_string( $link , $_POST["namestation"]);
        $country = mysqli_escape_string( $link, $_POST["namecountry"]);
        $city = mysqli_escape_string($link , $_POST["namecity"]);

        $query = "INSERT INTO station(name, country, city) VALUES('$name', '$country', '$city')";
        $result = mysqli_query($link, $query);
        
        header('Location: http://mgtrains.com/');
        exit;
    }


    if(isset($_POST["form_id"]) and $_POST["form_id"] == 2) {

        $serialnumber = mysqli_escape_string($link, $_POST["serialnumber"]);
        $query = "SELECT * FROM carriage WHERE serialnumber = '$serialnumber'";

        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) != 0){
            header("Location: http://mgtrains.com/message.php?id=1");
            exit;
        }

        $countplace = mysqli_escape_string($link, $_POST["countplace"]);
        $customRadio =  mysqli_escape_string($link, $_POST["customRadio"]);
        $class = mysqli_escape_string($link, $_POST["customRadio"]);
        
        $query = "INSERT INTO carriage(SerialNumber, CountPlace, Weight, Class) VALUES ('$serialnumber' , $countplace, $customRadio, $class)";
        $result = mysqli_query($link, $query);
        if (!$result) {
            header("Location: http://mgtrains.com/message.php?id=6");
            exit;
        }
        
        header("Location: http://mgtrains.com/message.php?id=5");
        exit;
    }


    if ( isset($_POST["form_id"]) and $_POST["form_id"] == 3 ) {

        $serialnumber = mysqli_escape_string($link, $_POST["serialnumber"]);
        $query = "SELECT * FROM carriage WHERE serialnumber = '$serialnumber'";

        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) != 0){
            header("Location: http://mgtrains.com/message.php?id=2");
            exit;
        }
        
        if( !is_numeric($_POST["mileage"]) ) {
            header("Location: http://mgtrains.com/message.php?id=3");
        }

        $power = mysqli_escape_string($link, $_POST["power"]);
        $mileage = mysqli_escape_string($link, $_POST["mileage"]);

        $query = "INSERT INTO locomotive(Serialnumber, Power, Mileage) VALUES('$serialnumber' , $power, $mileage)";
        
        
        $result = mysqli_query($link, $query);

        if (!$result) {
            header("Location: http://mgtrains.com/message.php?id=3");
        }

        if($result) {
            header("Location: http://mgtrains.com/message.php?id=4");
        }
        
    }
?>