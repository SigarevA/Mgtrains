<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Дистанция</th>
      <th>Первой станции</th>
      <th>Вторая станция</th>
      <th>Действие</th>
    </tr>
  </thead>
<tbody>
<?php
    require('../includes/connect_bd.php');
    $text = mysqli_escape_string($link, $_GET["text"]);
    $query = "SELECT DISTINCT b.id as branchID, b.distance as distance FROM branch b INNER JOIN stationtothebranch sb ON sb.id_branch = b.id INNER JOIN station s ON s.id = sb.id_station WHERE s.name LIKE '$text%'";
    $result = mysqli_query($link, $query);
    $count = 0;
    require('../includes/branch_info.php');
    while ($branch = mysqli_fetch_assoc($result)) {
      $count++ ;
      ?>
        <tr>
        <td scope="row"><?php echo $count;?></td>
<?php
        printStationInBranc($branch);
?>
        <td> <a class="link" href="timetable.php?branch=<?php echo htmlspecialchars($branch["branchID"], ENT_HTML5) ; ?>">манипулировать</a></td>      
    </tr>
<?php
    }
?>

</tbody>
</table>