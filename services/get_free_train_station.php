<div > 
    <p>
        Выберите поезд : 
<?php
    require("../includes/connect_bd.php");
    $stationID = mysqli_escape_string($link, $_GET["stationID"]);
    $query = "SELECT * FROM train t INNER JOIN locomotive l ON l.TrainID = t.TrainID INNER JOIN carriage c ON c.TrainID = t.TrainID  WHERE StationID = $stationID GROUP BY t.TrainID, l.id HAVING count(*) >= 1";
    $result = mysqli_query($link, $query);

    while($train = mysqli_fetch_assoc($result)) {
        $id = htmlspecialchars($train["TrainID"], ENT_HTML5);
        $name = htmlspecialchars($train["TrainName"] , ENT_HTML5);
?>
        <div class="custom-control custom-radio">
            <input type="radio" id="<?php echo $id?>" name="trainList" class="custom-control-input" value="<?php echo $id?>">
            <label class="custom-control-label" for="<?php echo $id?>"> <a class="link" href="refactor_train_by_id.php?id=<?php echo $id; ?>"><?php echo $name;?></a> </label>
        </div>

<?php
    }
?>
    </p>
</div>