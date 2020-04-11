<?php
    if ( isset($_POST['trainID']) && isset($_POST['locomotiveID'])) {

        require('connect_bd.php');

        $trainID = mysqli_escape_string($link, $_POST['trainID']);
        $locomotiveID = mysqli_escape_string($link, $_POST['locomotiveID']);
        $query = "UPDATE locomotive SET TrainID = $trainID WHERE id = $locomotiveID";
        $result = mysqli_query($link, $query);
        if ($result) 
        {
?>
            <div class="alert alert-success" role="alert">
                <strong>Выполнено!</strong> Локомотив успешно добавлен. 
            </div>
<?php    
        }
?>
<?php
        if (!$result) 
        {
?>
            <div class="alert alert-danger" role="alert">
                <strong>Ошибка!</strong> Что-то пошло не так.2
            </div>

<?php
        }
?>

<?php
    }
?>

<?php
    if ( !isset($_POST['trainID']) || !isset($_POST['locomotiveID']) ) {
?>
    <div class="alert alert-danger" role="alert">
        <strong>Ошибка!</strong> Что-то пошло не так.
    </div>

<?php
    }
?>