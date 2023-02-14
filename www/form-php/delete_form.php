<?php
include "includ_db.php";
$id = $_GET['id'];
$mysql->query("DELETE FROM `cartridge` WHERE `id` = '$id'");
$mysql->close();
header('Location: /index.php');