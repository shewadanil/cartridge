<?php

require "autoloader.php";

use App\App;
use App\Request;
use App\Db;
use App\ScanClass;
$req = new Request();
$app = new App($req);
$response = $app->handle();
$response->generateResponse();

/*$db = new Db();
$result = $db->query("SELECT * FROM `cartridge`;");
var_dump($result);*/
/*var_dump($_SERVER['REQUEST_URI']);
var_dump(parse_url($_SERVER['REQUEST_URI']));
var_dump($req);*/

?>