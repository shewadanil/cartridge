<?php
namespace Model;
use Attribute\Table;
use Attribute\Method;
use Attribute\Properties;
#[Table("cartridge")]
class Cartridg
{
    #[Properties("id")]
    public int $id;
    #[Properties("model")]
    public string $model;
    #[Properties("barcode")]
    public int $barcode;
    #[Properties("service")]
    public string $service;
    #[Properties("price")]
    public int $price;
    #[Properties("date")]
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



