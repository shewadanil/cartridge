<?php
    require "../autoloader.php";
    require 'includ_db.php';
    $model = $req->getPost_key('model');
    $barcode = $req->getPost_key('barcode');
    $service = $req->getPost_key('service');
    $price = $req->getPost_key('price');
    $mysql->query("INSERT INTO `cartridge` (`model`, `barcode`, `service`, `price`)
    VALUES ('$model', '$barcode', '$service', '$price')");
    $mysql->close();
    header('Location: /');