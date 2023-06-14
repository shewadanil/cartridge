<?php


namespace App\Model;
use App\Db;
use App\ScanClass;

abstract class ActiveRecordEntity
{
    public static function findAll(){
        $db = Db::getConnection();
        return $db->query('SELECT * FROM`'. static::getTableName() . '`;',[],static::class);
    }
    abstract protected static function getTableName():string;

    public static function getById(int $id){
        $db = Db::getConnection();
        $entities = $db->query('SELECT * FROM`'. static::getTableName() . '`
        WHERE id =:id;',[':id' => $id],static::class);
        return $entities ? $entities[0] : null;
    }
    public static function getByBarcode($barcode){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM`'. static::getTableName() . '`
        WHERE barcode =:barcode;';
        return $db->query($sql,[':barcode' => $barcode],static::class);

    }
    public function save($id){
        $mapedProperti = $this->mapProperti();
        if($id != null){
            $this->update($mapedProperti, $id);
        }
        else {
            self::insert($mapedProperti);
        }

    }
    private function mapProperti():array{
        $mapedProperti = [];
        $scanclass = new ScanClass("src");
        $properties = $scanclass->findPropertiesAttribute(static::class);
        foreach ($properties as $proper){
            $mapedProperti[$proper] = $this->$proper;
        }
        return $mapedProperti;
    }
    public static function update(array $properties, $id){
        $index = 1;
        $paramValue = [];
        $columnParam = [];
        foreach ($properties as $column => $value){
            $param = ':param' . $index;
            $columnParam[] = $value . ' = ' . $param;
            $paramValue[$param] = $value;
            $index++;
        }
        var_dump($paramValue);
        var_dump($columnParam);

    }
    public static function insert($properties){

    }

}