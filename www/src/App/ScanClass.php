<?php


namespace App;
use ReflectionClass;
use ReflectionMethod;
use ReflectionAttribute;

class ScanClass
{
    static public array $arrayargument;
    static public array $arrayamethod;

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
                   ScanClass::$arrayargument[$classname]['class'][] = $result;
                   foreach ($class->getMethods() as $method){
                       foreach ($method->getAttributes() as $methodValue){
                           foreach ($methodValue->getArguments() as $methodResult){
                               ScanClass::$arrayargument[$classname]['method'][] = $methodResult;
                           }
                           /*ScanClass::$arrayargument[$classname]['method'] = $value->getArguments();*/
                       }
                   }
                   foreach ($class->getProperties() as $properties){
                       foreach ($properties->getAttributes() as $propertiesValue){
                           foreach ($propertiesValue->getArguments() as $propertiesResult){
                               ScanClass::$arrayargument[$classname]['properties'][] = $propertiesResult;
                           }
                          /* ScanClass::$arrayargument[] = $value->getArguments();*/
                       }
                   }
               }
               /*ScanClass::$arrayargument = $value->getArguments();*/
           }

           /*foreach ($class->getMethods() as $method){
               foreach ($method->getAttributes() as $value){
                   foreach ($value->getArguments() as $result){
                       ScanClass::$arrayargument[] = $result;
                   }

                   ScanClass::$arrayargument[$classname]['method'] = $value->getArguments();
               }
           }*/
           /*foreach ($class->getProperties() as $properties){
               foreach ($properties->getAttributes() as $value){
                   foreach ($value->getArguments() as $result){
                       ScanClass::$arrayargument[$classname]['properties'] = $result;
                   }
                   ScanClass::$arrayargument[] = $value->getArguments();
               }
           }*/
       }




    }


}