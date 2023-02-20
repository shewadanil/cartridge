<?php
    require "../autoloader.php";
    $user = $req->valueCookie('user');
    setcookie("user", $user, time() - 3600, "/");
    header('Location: ../index.php');