<?php
    $login = $_POST['login'];
    $password = $_POST['password'];
    include 'includ_db.php';
    $password = md5($password."adafaghha");

    $result = $mysql->query("SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'");

    if ($result->num_rows == 0){
        echo 'Пользователь не найден';
    }
    $user = $result->fetch_assoc();
    setcookie("user", $user['login'], time() + 3600, "/");
    $mysql->close();
    header('Location: ../index.php');

