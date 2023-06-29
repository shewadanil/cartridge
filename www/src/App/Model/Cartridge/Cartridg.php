<?php
namespace App\Model\Cartridge;
use App\Attribute\Table;
use App\Attribute\Method;
use App\Attribute\Properties;
use App\Model\ActiveRecordEntity;
#[Table]
class Cartridg extends ActiveRecordEntity
{
    #[Properties]
    protected $id;
    #[Properties]
    protected  $model;
    #[Properties]
    protected $barcode;
    #[Properties]
    protected  $service;
    #[Properties]
    protected  $price;
    #[Properties]
    protected  $date;

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
    private function getProperty(): array{
        $value = ['id', 'model', 'barcode',
            'service','price', 'date'];
        return $value;
    }
    public function setValue($value = []){
        $array = $this->getProperty();
        foreach ($array as $arrayVal){
            foreach ($value as $valueKey => $valueVal) {
                if ($valueKey === $arrayVal){
                    if ($valueKey != ''){
                        $this->$valueKey = $valueVal;
                    }

                }
            }
        }
    }
}



