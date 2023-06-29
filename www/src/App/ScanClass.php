<?php


namespace App;
use ReflectionClass;
use ReflectionMethod;
use ReflectionAttribute;

class ScanClass
{
    private array $arrayclass;
    private array $arrayamethod;
    private array $arrayaproperties;
    private array $array_full;
    private array $routMethod;
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
               $this->arrayclass[$value->getName()][] = $class->getName();
           }
       }
    }
    private function MethodsAttribute()
    {
        foreach ($this->array_full as $classname){
            $class = new \ReflectionClass($classname);
            foreach ($class->getMethods() as $method){
                foreach ($method->getAttributes() as $methodValue){
                    $this->arrayamethod[$classname][] = $method->getName();
                    foreach ($methodValue->getArguments() as $routarg){
                        $this->routMethod[$classname][$method->getName()][] = $routarg;
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
                    $this->arrayaproperties[$classname][] = $properties->getName();
                }
            }
        }
    }
    public function findRoute($uri, $httpMethod) {
        /*var_dump($this->routMethod);
        var_dump($this->arrayaproperties);
        var_dump($this->arrayclass);*/
        $array = [];
        foreach ($this->routMethod as $class => $method){
            foreach ($method as $nameMethod => $result){
                foreach ($result as $value){
                    var_dump($value);
                    if ($value === $uri){
                        $array[$class] = $method;
                        return $array;
                    }
                }
            }
        }
        return null;
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