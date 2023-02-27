<?php
namespace App;

class Cartridg
{
    public $id;
    public $model;
    public $barcode;
    public $service;
    public $price;
    public $date;
    function __construct($id, $model, $barcode, $service, $price, $date)
    {
        $this->id = $id;
        $this->model = $model;
        $this->barcode = $barcode;
        $this->service = $service;
        $this->price = $price;
        $this->date = $date;

    }
}



