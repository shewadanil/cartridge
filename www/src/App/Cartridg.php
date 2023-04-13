<?php
namespace App;
use Attribute\Table;
use Attribute\Method;
#[Table("cartridge")]
class Cartridg
{
    public int $id;
    public string $model;
    public int $barcode;
    public string $service;
    public int $price;
    public $date;
    #[Method("constract")]
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



