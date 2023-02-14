<?php
    require 'includ_db.php';
    $model = $_POST['model'];
    $barcode = $_POST['barcode'];
    $service = $_POST["service"];
    $price = $_POST['price'];
    $mysql->query("INSERT INTO `cartridge` (`model`, `barcode`, `service`, `price`)
    VALUES ('$model', '$barcode', '$service', '$price')");
    $mysql->close();
    header('Location: /index.php');