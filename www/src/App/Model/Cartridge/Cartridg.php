<?php
namespace App\Model\Cartridge;
use App\Attribute\Table;
use App\Attribute\Method;
use App\Attribute\Properties;
use App\Model\ActiveRecordEntity;
#[Table(Cartridg::class)]
class Cartridg extends ActiveRecordEntity
{
    #[Properties("id")]
    public int $id;
    #[Properties("model")]
    private string $model;
    #[Properties("barcode")]
    private int $barcode;
    #[Properties("service")]
    private string $service;
    #[Properties("price")]
    private int $price;
    #[Properties("date")]
    private $date;
    public function getId(){
        return $this->id;
    }
    public function getModel(){
        return $this->model;
    }
    public function getBarcode(){
        return $this->barcode;
    }
    public function getService(){
        return $this->service;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getDate(){
        return $this->date;
    }
    protected static function getTableName(): string
    {
        return "cartridge";

    }
}



