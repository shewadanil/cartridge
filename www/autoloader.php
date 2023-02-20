<?php
spl_autoload_register(function ($class_name){
    $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
    require __DIR__ . '/src/' . $class_name . '.php';

});
use Cartridge\Cartridg;
use Request\Request;
$req = new Request();

?>
