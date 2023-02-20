<?php
    require "../autoloader.php";
    require 'includ_db.php';
    $model = $req->getPost_key('model');
    $barcode = $req->getPost_key('barcode');
    $service = $req->getPost_key('service');
    $price = $req->getPost_key('price');
    $id = $req->getPost_key('id');
    $mysql->query("UPDATE `cartridge` SET `model` = '$model', `barcode` = '$barcode', `service` = '$service',
                       `price` = '$price' WHERE `id` = '$id'");
    $mysql->close();
    header('Location: ../index.php');
