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
            <strong>Выполнено!</strong> Локомотив успешно добавлен.
        </div>
<?php
    }
?>

<?php
    if( isset($_GET["id"]) and $_GET["id"] == 5) 
    {
?>
        <div class="alert alert-success" role="alert">
            <strong>Выполнено!</strong> Вагон успешно добавлен.
        </div>
<?php
    }
?>

<?php
    if( isset($_GET["id"]) and $_GET["id"] == 6) 
    {
?>
        <div class="alert alert-danger" role="alert">
            <strong>Ошибка!</strong> Вагон не добавлен.
        </div>
<?php
    }
?>

<?php
    if( isset($_GET["id"]) and $_GET["id"] == 7) 
    {
?>
        <div class="alert alert-danger" role="alert">
            <strong>Ошибка!</strong> Поезд не добавлен.
        </div>
<?php
    }
?>

<?php
    if( isset($_GET["id"]) and $_GET["id"] == 8) 
    {
?>
        <div class="alert alert-success" role="alert">
            <strong>Выполнено!</strong> Поезд успешно добавлен.
        </div>
<?php
    }
?>

<?php
    if( isset($_GET["id"]) and $_GET["id"] == 9) 
    {
?>
        <div class="alert alert-success" role="alert">
            <strong>Выполнено!</strong> Поезд успешно удален.
        </div>
<?php
    }
?>

<?php
    if( isset($_GET["id"]) and $_GET["id"] == 10) 
    {
?>
        <div class="alert alert-danger" role="alert">
            <strong>Упс!</strong> Попытка удаления поезда не увенчалась успехом.
        </div>
<?php
    }
?>

<?php
    if( isset($_GET["id"]) and $_GET["id"] == 11) 
    {
?>
        <div class="alert alert-danger" role="alert">
            <strong>Упс!</strong> Поезд не был выбран, возможно на станции нет свободных или вы просто пропустили данный пункт.
        </div>
<?php
    }
?>

<?php
    if( isset($_GET["id"]) and $_GET["id"] == 12) 
    {
?>
        <div class="alert alert-danger" role="alert">
            <strong>Упс!</strong> Добавить рейс не получилось.
        </div>
<?php
    }
?>

<?php
    if( isset($_GET["id"]) and $_GET["id"] == 13) 
    {
?>
        <div class="alert alert-success" role="alert">
            <strong>Выполнено!</strong> Рейс добавлен в расписание.
        </div>
<?php
    }
?>

<?php
    if( isset($_GET["id"]) and $_GET["id"] == 14) 
    {
?>
        <div class="alert alert-danger" role="alert">
            <strong>Ошибка!</strong> Даты отправлния не может быть больше даты прибытия.
        </div>
<?php
    }
?>

<?php
    if( isset($_GET["id"]) and $_GET["id"] == 15) 
    {
?>
        <div class="alert alert-danger" role="alert">
            <strong>Ошибка!</strong> Ветка занята.
        </div>
<?php
    }
?>