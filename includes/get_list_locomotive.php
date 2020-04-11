<?php
    if (isset($_GET['train'])) {
?>
<table class="table">
        <thead class="thead-light">
                <tr>
                <th>#</th>
                <th>Серийный номер</th>
                <th>Мощность</th>
                <th>Пробег</th>
                <th>Действие</th>
                </tr>
        </thead>
        <tbody>
<?php
    require('connect_bd.php');

    $serialNumber = mysqli_escape_string($link, $_GET['serialNumber']);

    $query = "SELECT * FROM locomotive WHERE TrainID IS NULL AND Serialnumber LIKE '$serialNumber%'";
    $result = mysqli_query($link, $query);

    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
?>
                <tr>
                    <th scope="row"><?php echo $count;?></th>
                    <td><?php echo $row['Serialnumber'] ?></td>
                    <td> <?php echo $row['Power']; ?> </td>
                    <td> <?php echo $row['Mileage']?> </td>

                    <td>
                        <button  
                            class="btn" 
                            value="<?php echo $row['id']; ?>"
                        >
                                Добавить 
                        </button> 
                    </td>
                </tr>
    <?php
        }
    ?>
    </tbody>
</table>

<?php
    }
?>

<?php

    if (!isset($_GET["train"])) {
?>

    <div class="alert alert-danger" role="alert">
        <strong>Ошибка!</strong> Выберите поезд.
    </div>

<?php
    }
?>