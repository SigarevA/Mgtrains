<table class="table">
        <thead class="thead-light">
                <tr>
                <th>#</th>
                <th>Название</th>
                <th>Редактировать</th>
                </tr>
        </thead>
        <tbody>
            <?php
                require("connect_bd.php");
                $name = mysqli_escape_string($link, $_GET["name"]);
                $query = "SELECT * FROM train WHERE TrainName LIKE '$name%'";
                if (isset($_GET['station']))
                {
                    $stationID = mysqli_escape_string($link, $_GET['station']);
                    $query = "SELECT * FROM train WHERE TrainName LIKE '$name%' and StationID = $stationID";
                }
                $result = mysqli_query($link, $query);
                $count = 0;
                while ( $row = mysqli_fetch_assoc($result)) {
                    $id = $row["TrainID"];
                    $trainName = htmlspecialchars($row["TrainName"], ENT_HTML5);
                    $location = $row["StationID"];
                    $count++;
            ?>
                <tr>
                    <th scope="row"><?php echo $count;?></th>
                    <td><?php echo $trainName; ?></td>
                    <td><a class="link" href="refactor_train_by_id.php?id=<?php echo $id; ?>">Просмотреть</a> </td>
                </tr>

            <?php
            }
            ?>  
        </tbody>
    </table>