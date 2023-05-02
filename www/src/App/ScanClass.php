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
    static public array $array_full;
    static function scanDirectory($nameDirectory) : array {
        $dir = scandir($nameDirectory);
        foreach ($dir as $key => $value){
            if($value == "." || $value == ".."){
                unset($dir[$key]);
            }
        }
        $dir = array_values($dir);
        foreach ($dir as &$value) {
            $flag = is_dir($nameDirectory . DIRECTORY_SEPARATOR . $value);
            if ($flag) {
               ScanClass::scanDirectory($nameDirectory . DIRECTORY_SEPARATOR .$value);
            }
            $value = $nameDirectory . DIRECTORY_SEPARATOR . $value;
            if(!$flag){
                ScanClass::$array_full[] = $value;
            }
        }

        return $dir;

    }

    static function classScan($nameDirectory){
        ScanClass::scanDirectory($nameDirectory);
        $dir = ScanClass::$array_full;

        foreach ($dir as &$value){
            $reg = str_replace('.php', '', $value);
            $value = $reg;
            $reg = str_replace($nameDirectory . DIRECTORY_SEPARATOR, '', $value);
            $value = $reg;
            $reg = str_replace('/', "\\", $value);
            $value = $reg;


        }
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