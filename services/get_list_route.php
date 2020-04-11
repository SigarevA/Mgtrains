<?php

    require("../includes/connect_bd.php");

    $departure = mysqli_escape_string($link, $_GET['departure']);
    $destination = mysqli_escape_string($link, $_GET['destination']);

    $date = substr($_GET["date"], 6, 4) . "-" . substr($_GET["date"], 0, 2);
    $date .= '-' . substr($_GET["date"], 3, 2);
    
    $date = mysqli_escape_string($link, $date);

    $query = "SELECT r.id_branch as id,  r.end as end, r.Start as start, r.station_departure as departure, sb.id_station as destination FROM routes r INNER JOIN stationtothebranch sb ON sb.id_branch = r.id_branch WHERE r.station_departure = $departure and DATE(r.Start) = '$date' and sb.id_station <> r.station_departure";
    $result = mysqli_query($link, $query);


    while ($row = mysqli_fetch_assoc($result)) {
        $query = "SELECT * FROM station WHERE id = $departure";
        $result = mysqli_query($link, $query);
        $departureINFO = mysqli_fetch_assoc($result);
        $query = "SELECT * FROM station WHERE id = $destination";
        $result = mysqli_query($link, $query);
        $destinationINFO = mysqli_fetch_assoc($result);
        $nameDeparture = htmlspecialchars($departureINFO["name"], ENT_HTML5);
        $nameDestination = htmlspecialchars($destinationINFO["name"], ENT_HTML5);
?>
        <div class="card">
            <div class="card-body">
                <h6 class="card-title"> <?php echo $nameDeparture; ?> -> <?php echo $nameDestination?> </h6>
                <p class="card-text">
                    Время отправления : <?php echo htmlspecialchars($row["start"]);?> <br>
                    Время прибытия : <?php echo htmlspecialchars($row["end"], ENT_HTML5);?>
                </h6>
            </div>
        </div>
<?php   
    }
?>