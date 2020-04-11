<?php

    if (!isset($_POST["trainList"])) {
        header("Location: http://mgtrains.com/message.php?id=11");
        exit;
    }
    require("../includes/connect_bd.php");


    $query = "SELECT * FROM routes WHERE DATE(end) < $start or DATE(Start) > $end";

    $start = substr($_POST["dateStart"], 6, 4) . "-" . substr($_POST["dateStart"], 0, 2);
    $start .= '-' . substr($_POST["dateStart"], 3, 2);
    $start .= " " . $_POST["timeStart"] . ":00";
    $end = substr($_POST["dateEnd"], 6, 4) . "-" . substr($_POST["dateEnd"], 0, 2);
    $end .= '-' . substr($_POST["dateEnd"], 3, 2);
    $end .= " " . $_POST["timeEnd"] . ":00";
    $date1 = DateTime::createFromFormat('Y-m-d H:i:s', $start);
    $date2 = DateTime::createFromFormat('Y-m-d H:i:s', $end);
    if (  $date1 > $date2) {
        header("Location: http://mgtrains.com/message.php?id=14");
        exit;
    }

    $query = "SELECT * FROM routes WHERE DATE(end) < $start or DATE(Start) > $end";

    $stationDeparture = mysqli_escape_string($link, $_POST["customRadio"]);
    $branchID = mysqli_escape_string($link, $_POST["branchID"]);
    $trainID = mysqli_escape_string($link, $_POST["trainList"]);
    $start = mysqli_escape_string($link, $start);
    $end = mysqli_escape_string($link, $end);

    $query = "SELECT * FROM routes WHERE id_branch = $branchID and (DATE(end) < '$start' or DATE(Start) > '$end')";
    $result = mysqli_query($link, $query);
    $count1 = mysqli_num_rows($result);
    $query = "SELECT * FROM routes WHERE id_branch = $branchID";
    $result = mysqli_query($link, $query);
    $count2 = mysqli_num_rows($result);
    if ( $count1 != $count2 ) {
       header("Location: http://mgtrains.com/message.php?id=15");
        exit;
    }

    $query = "INSERT INTO routes(id_branch, Start, end, station_departure, train_ID) VALUES($branchID, '$start', '$end', $stationDeparture, $trainID)";
    $result = mysqli_query($link, $query);
    if ($result)
    {
        header("Location: http://mgtrains.com/message.php?id=13");
        exit;
    }
    else {
        header("Location: http://mgtrains.com/message.php?id=12");
        exit;
    }
?>