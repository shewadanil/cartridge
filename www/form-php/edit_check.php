<?php
    require 'includ_db.php';
    $model = $_POST['model'];
    $barcode = $_POST['barcode'];
    $service = $_POST["service"];
    $price = $_POST['price'];
    $id = $_POST['id'];
    $mysql->query("UPDATE `cartridge` SET `model` = '$model', `barcode` = '$barcode', `service` = '$service',
                       `price` = '$price' WHERE `id` = '$id'");
    $mysql->close();
    header('Location: ../index.php');
