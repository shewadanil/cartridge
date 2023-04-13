<?php


namespace Attribute;
use \Attribute;
#[\Attribute]
class Method
{
    private string $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

}