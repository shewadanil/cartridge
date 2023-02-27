<?php
    require "../autoloader.php";
    $login = $req->getPost_key('login');
    $password = $req->getPost_key('password');
    include 'includ_db.php';
    $password = md5($password."adafaghha");

    $result = $mysql->query("SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'");

    if ($result->num_rows == 0){
        echo 'Пользователь не найден <br>';
        echo '<a href="../index.php">На главную</a>';
        exit();

    }
    $user = $result->fetch_assoc();
    if($result->num_rows) {
        setcookie("user", $user['login'], time() + 3600, "/");
    }
    $mysql->close();
    header('Location: /');
?>
