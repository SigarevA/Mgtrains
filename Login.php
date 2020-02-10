<?php
    session_start();
?>
<html>
<head>
    <link href="mystyle/bootstrap.css" rel="stylesheet" >
    <link href="mystyle/style.css" rel="stylesheet">
    <script type="text/javascript" src="js/script.js" async ></script>
    <title>Login</title> 
</head>
<body>

    <div class="container">
        <form class="login" action="includes/handler_of_authorization.php" method="POST" id="loginform">
            <div class="head">
                <p>Добро пожаловать!</p>
            </div>
            <div class="body" id="containerinf">

            <?php
                if( isset($_GET['message']) and $_GET['message'] == 'error')
                {
            ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Упс!</strong> Такого пользователя нет
                </div>

            <?php
                }
            ?>

                <input name="login" id="login_id" class="form-control" type="text" placeholder="Имя" >
                <input name="password" id="password" class="form-control" type="password" placeholder="Пароль">                
            </div>
            <div class="tail text-right">
                <button class="btn btn-success pull-right" id="send">Войти</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">

        document.getElementById("send").addEventListener("click" , check);

        function check(e) {
            var login = document.getElementById("login_id").value;
            var password = document.getElementById("password").value;
            var body = document.getElementById("containerinf");
            if(login === '') {
                alert("Заполните поле \"Имя\"");
                document.getElementById("login_id").focus();
                return false;
            }
            if(password === '') {
                alert("Заполните поле \"Пароль\"");
                document.getElementById("password").focus();
                return;
            }
        }
    </script>

</body>
</html>