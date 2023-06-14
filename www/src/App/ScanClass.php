<?php


namespace App;
use ReflectionClass;
use ReflectionMethod;
use ReflectionAttribute;

class ScanClass
{
    private array $arrayargument;
    private array $arrayamethod;
    private array $arrayaproperties;
    private array $array_full;
    private string $dir;
    public function __construct($dir){
        $this->dir = $dir;
        $this->scanDirectory($dir);
        $this->MethodsAttribute();
        $this->ClassAttribute();
        $this->PropertiesAttribute();
    }
    private function scanDirectory($nameDirectory) : array {
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
                $this->scanDirectory($nameDirectory . DIRECTORY_SEPARATOR .$value);
            }
            $value = $nameDirectory . DIRECTORY_SEPARATOR . $value;
            if(!$flag){
                $this->array_full[] = $value;
            }
        }
        $this->sorted();
        return $dir;
    }
    private function sorted(){
        foreach ($this->array_full as &$value){
            $reg = str_replace('.php', '', $value);
            $value = $reg;
            $reg = str_replace($this->dir . DIRECTORY_SEPARATOR, '', $value);
            $value = $reg;
            $reg = str_replace('/', "\\", $value);
            $value = $reg;
        }
    }

    private function ClassAttribute(){
       foreach ($this->array_full as $classname){
           $class = new \ReflectionClass($classname);
           foreach ($class->getAttributes() as $value){
               foreach ($value->getArguments() as $result){
                   $this->arrayargument[$value->getName()][] = $result;
               }
           }
       }
    }
    private function MethodsAttribute()
    {
        foreach ($this->array_full as $classname){
            $class = new \ReflectionClass($classname);
            foreach ($class->getMethods() as $method){
                foreach ($method->getAttributes() as $methodValue){
                    foreach ($methodValue->getArguments() as $methodResult){
                        $this->arrayamethod[$classname][] = $methodResult;
                    }
                }
            }
        }

    }
    private function PropertiesAttribute()
    {
        foreach ($this->array_full as $classname) {
            $class = new \ReflectionClass($classname);
            foreach ($class->getProperties() as $properties){
                foreach ($properties->getAttributes() as $propertiesValue){
                    foreach ($propertiesValue->getArguments() as $propertiesResult){
                        $this->arrayaproperties[$classname][] = $propertiesResult;
                    }
                }
            }
        }
    }
    public function findClassByAttribute ($nameClass) : array {
        $array = [];
        foreach ($this->arrayargument as $name => $value){
                if ($name === $nameClass){
                    foreach ($value as $result) {
                        $array[] = $result;
                    }
                }
        }
        return $array;
    }
    public function findMethodByAttribute ($nameClass) : array {
        $array = [];
        foreach ($this->arrayamethod as $name => $value){
            if ($name === $nameClass){
                foreach ($value as $result) {
                    $array[] = $result;
                }
            }
        }
        return $array;
    }
    public function findPropertiesAttribute ($nameClass) : array {
        $array = [];
        foreach ($this->arrayaproperties as $name => $value){
            if ($name === $nameClass){
                foreach ($value as $result) {
                    $array[] = $result;
                }
            }
        }
        return $array;
    }





}