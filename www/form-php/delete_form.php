<?php
require "../autoloader.php";
include "includ_db.php";
$id = $req->getKey('id');
$mysql->query("DELETE FROM `cartridge` WHERE `id` = '$id'");
$mysql->close();
header('Location: /index.php');