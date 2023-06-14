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
    protected int $id;
    #[Properties("model")]
    protected string $model;
    #[Properties("barcode")]
    protected int $barcode;
    #[Properties("service")]
    protected string $service;
    #[Properties("price")]
    protected int $price;
    #[Properties("date")]
    protected string $date;

    public function getId():string{
        return $this->id;
    }
    public function getModel():string{
        return $this->model;
    }
    public function getBarcode():int{
        return $this->barcode;
    }
    public function getService():string{
        return $this->service;
    }
    public function getPrice():int{
        return $this->price;
    }
    public function getDate():string{
        return $this->date;
    }
    protected static function getTableName(): string
    {
        return "cartridge";

    }
}



