<?php


namespace App;
use ReflectionClass;
use ReflectionMethod;
use ReflectionAttribute;

class ScanClass
{
    static public array $arrayargument;
    static public array $arrayamethod;
    static public array $arrayaproperties;

    static function classScan(){
        $dir = scandir("src" . DIRECTORY_SEPARATOR . "App");
        unset($dir[0], $dir[1]);
       foreach ($dir as &$value){
           $reg = str_replace('.php', '', $value);
           $value = $reg;
           $value = "App\\" . $value;

       }
        /*print_r($dir);*/
       foreach ($dir as $classname){
           $class = new \ReflectionClass($classname);
           foreach ($class->getAttributes() as $value){
               foreach ($value->getArguments() as $result){
                   ScanClass::$arrayargument[] = $result;
               }
           }
           foreach ($class->getMethods() as $method){
               foreach ($method->getAttributes() as $methodValue){
                   foreach ($methodValue->getArguments() as $methodResult){
                       ScanClass::$arrayamethod[$classname][] = $methodResult;
                   }
               }
           }
           foreach ($class->getProperties() as $properties){
               foreach ($properties->getAttributes() as $propertiesValue){
                   foreach ($propertiesValue->getArguments() as $propertiesResult){
                       ScanClass::$arrayaproperties[$classname][] = $propertiesResult;
                   }
               }
           }
       }




    }


}