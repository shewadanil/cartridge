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

    public static function getById($id){
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
    public function save(){
        $mapedProperti = $this->mapProperti();
        if($this->id != null){
            $this->update($mapedProperti);
        }
        else {
            self::insert($mapedProperti);
        }
    }
    public function update(array $properties){
        $index = 1;
        $paramValue = [];
        $columnParam = [];
        foreach ($properties as $column => $value){
            if ($value != ''){
                $param = ':param' . $index;
                $columnParam[] = $column . ' = ' . $param;
                $paramValue[$param] = $value;
                $index++;
            }
        }
        $sql = 'UPDATE ' . static::getTableName() . ' SET '
            . implode(", ",$columnParam) . ' WHERE `id` = ' . $this->id;
        /*var_dump($sql);
        var_dump($columnParam);*/
        $db = Db::getConnection();
        $db->query($sql, $paramValue, static::class);
    }

    public function insert($properties){
        $index = 1;
        $columnName = [];
        $columnParam = [];
        foreach ($properties as $column => $value){
            if ($column != 'id'&& $value != ''){
                $param = ':' . $column;
                $columnName[] = '`' . $column . '`';
                $columnParam[] = $param;
                $paramValue[$param] = $value;
                $index++;
            }
        }
        $sql = 'INSERT INTO ' . static::getTableName() .' ('. implode(', ', $columnName) .')' .
            'VALUES ('. implode(', ', $columnParam) .')';
        $db = Db::getConnection();
        $db->query($sql, $paramValue, static::class);
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
    public function createNewRecord($array = []){
        $this->setValue($array);
        $this->save();
    }
    public function delete($id){
        $db = Db::getConnection();
        $sql = 'DELETE FROM ' . static::getTableName() . ' WHERE id = :id';
        $db->query($sql, [':id' => $id]);
    }
}