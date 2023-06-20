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
    protected $id;
    #[Properties("model")]
    protected  $model;
    #[Properties("barcode")]
    protected $barcode;
    #[Properties("service")]
    protected  $service;
    #[Properties("price")]
    protected  $price;
    #[Properties("date")]
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
    protected function arrayValue():array{
        $value = ['id' => $this->id, 'model' => $this->model, 'barcode'=> $this->barcode,
            'service'=> $this->service,'price'=> $this->price, 'date'=> $this->date];
        return $value;
    }
    private function giveProperty(): array{
        $value = ['id', 'model', 'barcode',
            'service','price', 'date'];
        return $value;
    }
    public function setValue($value = []){
        $array = $this->giveProperty();
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



