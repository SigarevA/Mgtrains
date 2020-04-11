<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="mystyle/bootstrap.css" rel="stylesheet" >
    <link href="mystyle/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"/>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Index</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <img src="media/train.png" class="img-fluid img navbar-brand">
        <a href="index.php" class = "domen navbar-brand btn">Management trains</a>
            
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
            <ul class="nav">
                <?php
                    if ( isset ($_SESSION["user_id"]))
                    {
                ?>          
                        <!-- Добавление -->      
                        <li class="nav-item">
                            <div class="nav-item dropdown">
                            <button class="btn dropdown-toggle"
                                    type="button" id="dropdownMenu1" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Добавить
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <a class="dropdown-item" href="formsadd.php?add=station">Станцию</a>
                                <a class="dropdown-item" href="formsadd.php?add=carriage">Вагон</a>
                                <a class="dropdown-item" href='formsadd.php?add=locomotive'>Локомотив</a>
                            </div>
                        </div>
                        </li>
                        <!-- Формирование -->
                        <li class="nav-item">
                        <div class="nav-item dropdown">
                            <button class="btn dropdown-toggle"
                                    type="button" id="dropdownMenu1" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Сформировать
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <a class="dropdown-item" href="formation.php?what=train">Состав</a>
                                <a class="dropdown-item" href='formation.php?what=branch'>Ветку</a>
                            </div>
                        </div>
                        </li>
                        <li class="nav-item">
                        <div class="nav-item dropdown">
                            <button class="btn dropdown-toggle"
                                    type="button" id="dropdownMenu1" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Редактировать
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <a class="dropdown-item" href="list_branch.php">Расписание</a>
                                <a class="dropdown-item" href="refactor_train.php">Список Поездов</a>
                                <a class="dropdown-item" href="list_route.php">Управление</a>
                            </div>
                        </div>
                        </li>
                
                <?php
                    }
                ?>

                <li class="nav-item">
                    <a class= "btn" href="contacts.php"> Контакты </a>
                </li>

                <?php
                    if ( !isset($_SESSION["user_id"]))
                    { 
                ?>
                        <li class="nav-item">
                            <a class="btn" href="Login.php"> Войти </a>
                        </li>
                <?php
                    }
                ?>

                <?php
                    if ( isset($_SESSION["user_id"])) 
                    {
                ?>
                        <li class="nav-item">
                            <a class="btn" href="includes/Logout.php"> Выйти </a>
                        </li>
                <?php
                    }
                ?>



            </ul>
        </div>
    </div>
</nav>
    <div class="line"></div>
</body>
</html> 