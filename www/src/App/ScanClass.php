<?php


namespace App;
use ReflectionClass;
use ReflectionMethod;
use ReflectionAttribute;

class ScanClass
{
    static public array $arrayargument;

    static function classScan() :array{
        $dir = scandir("src/App");
        unset($dir[0], $dir[1]);
       foreach ($dir as &$value){
           $reg = preg_replace('/\..+$/u', '', $value);
           $value = $reg;
           $reg = preg_replace('/\./', '', $value);
           $value = $reg;

       }
        print_r($dir);
       foreach ($dir as $classname){
           $class = new \ReflectionClass("App/" . $classname);
           foreach ($class->getAttributes() as $value){
               ScanClass::$arrayargument['class'][] = $value->getArguments();

           }
           foreach ($class->getMethods() as $method){
               foreach ($method->getAttributes() as $value){
                   ScanClass::$arrayargument['method'][] = $value->getArguments();
               }
           }
       }



        return ScanClass::$arrayargument;

    }


}