<?php
    require('../includes/table_carrige_header.php');
?>
<tbody>
<?php
    require('../includes/connect_bd.php');
    $serailNumber = mysqli_escape_string($link, $_GET["serialNumber"]);
    $query = "SELECT * FROM carriage WHERE SerialNumber LIKE '$serailNumber%' and TrainID is NULL";
    $result = mysqli_query($link, $query); 

    $count = 0;
    require("../includes/print_info_carriage_to_table.php");
    while ($carriage = mysqli_fetch_assoc($result)) {
        $id = $carriage["id"];
        $count++;
?>  
    <tr>
        <th scope="row"><?php echo $count;?></th>
        <?php printCarriage($carriage);?>
        <td><button class="btn btn-link" value="<?php echo $id;?>">Добавить</button></td>
    </tr>
<?php
    }
?>
            </tbody>
<?php
    require('../includes/table_carrige_footer.php');
?>