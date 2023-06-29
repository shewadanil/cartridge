<?php


namespace App\Attribute;

#[\Attribute]
class RouteMethod
{
    public function __construct($uri, $method){}
}