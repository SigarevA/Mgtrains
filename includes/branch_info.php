<?php

    function printStationInBranc($branch) {
        require("connect_bd.php");
?>

        <td><?php echo $branch["distance"]; ?></td>

<?php
        $branchID = $branch["branchID"];
        $query = "SELECT s.name as nameStation, s.id as stationID FROM stationtothebranch sb INNER JOIN station s ON s.id = sb.id_station WHERE sb.id_branch =$branchID";
        $result = mysqli_query($link, $query);
        while ($station = mysqli_fetch_assoc($result)) 
        {
            $name = htmlspecialchars($station["nameStation"], ENT_HTML5);
?>
            <td><?php echo $name; ?></td>
<?php
        }    
    }
?>