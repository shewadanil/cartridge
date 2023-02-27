<?php
    require "../autoloader.php";
    require 'includ_db.php';
    $model = $req->post('model');
    $barcode = $req->post('barcode');
    $service = $req->post('service');
    $price = $req->post('price');
    $id = $req->post('id');
    $mysql->query("UPDATE `cartridge` SET `model` = '$model', `barcode` = '$barcode', `service` = '$service',
                       `price` = '$price' WHERE `id` = '$id'");
    $mysql->close();
    header('Location: ../index.php');
