<?php

    $mysql = new mysqli('database','Danil','1209vzQla','docker');
    $model = $req->post('model');
    $barcode = $req->post('barcode');
    $service = $req->post('service');
    $price = $req->post('price');
    $mysql->query("INSERT INTO `cartridge` (`model`, `barcode`, `service`, `price`)
    VALUES ('$model', '$barcode', '$service', '$price')");
    $mysql->close();