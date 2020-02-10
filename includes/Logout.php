<?php
    session_start();
    unset($_SESSION["user_id"]);
    header("Location: http://mgtrains.com/");
    exit;
?>