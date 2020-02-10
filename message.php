<?php
    require("head.php");
?>
<?php
    if(isset($_GET["id"]) and $_GET["id"] == 1)
    {
?>
        <div class="alert alert-danger" role="alert">
            <strong>Ошибка!</strong> Вагон с таким серийным номером уже зарегистрирован.
        </div>
<?php
    }
?>

<?php
    if( isset($_GET["id"]) and $_GET["id"] == 2)
    {
?>
        <div class="alert alert-danger" role="alert">
            <strong>Ошибка!</strong> Локомитив с таким серийным номером уже зарегистрирован.
        </div>
<?php
    }
?>

<?php
    if( isset($_GET["id"]) and $_GET["id"] == 3) 
    {
?>
        <div class="alert alert-danger" role="alert">
            <strong>Ошибка!</strong> Локомотив не добавлен.
        </div>
<?php
    }
?>

<?php
    if( isset($_GET["id"]) and $_GET["id"] == 4) 
    {
?>
        <div class="alert alert-success" role="alert">
            <strong>Ошибка!</strong> Локомотив успешно добавлен.
        </div>
<?php
    }
?>

