<?php

require "autoloader.php";

use App\App;
use App\Request;
use App\Cartridg;
$req = new Request();
$app = new App($req);
$app->handle();

var_dump($_SERVER['REQUEST_URI']);
var_dump(parse_url($_SERVER['REQUEST_URI']));
var_dump($req);

ob_start();
include 'src/view/index_view.php';
$output = ob_get_clean();
echo $output;
?>