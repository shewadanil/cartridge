<?php

require "autoloader.php";

use App\App;
use App\Request;
use App\ConnectDb;
use App\ScanClass;
$req = new Request();
$app = new App($req);
$response = $app->handle();
$response->generateResponse();
ScanClass::classScan("src");
print_r(ScanClass::$arrayaproperties);
print_r(ScanClass::$arrayargument);



/*var_dump($_SERVER['REQUEST_URI']);
var_dump(parse_url($_SERVER['REQUEST_URI']));
var_dump($req);*/

/*ob_start();
include 'src/view/index_view.php';
$output = ob_get_clean();
echo $output;*/
?>