<?php
    session_start();
    require('connect_bd.php');
    $login = mysqli_escape_string($link, $_POST['login']);
    $password = mysqli_escape_string($link, $_POST['password']);
    $query = "SELECT * FROM users WHERE login = '$login' and password = '$password'";
    $result = mysqli_query($link, $query);
    if ( 1 == mysqli_num_rows( $result ) ) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION["user_id"] = $user["id"];
        header('Location: http://mgtrains.com/');
    }
    else {
        header('Location: http://mgtrains.com/Login.php?message=error');
    }
?>
