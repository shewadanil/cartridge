<?php


namespace App\Model;
use App\Db;

abstract class ActiveRecordEntity
{
    public static function findAll(){
        $db = Db::getConnection();
        return $db->query('SELECT * FROM`'. static::getTableName() . '`;',[],static::class);
    }
    abstract protected static function getTableName():string;

    public static function getById(int $id){
        $db = Db::getConnection();
        return $db->query('SELECT * FROM`'. static::getTableName() . '`
        WHERE id =:id;',[':id' => $id],static::class);
    }
    public static function getByBarcode($barcode){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM`'. static::getTableName() . '`
        WHERE barcode =:barcode;';
        return $db->query($sql,[':barcode' => $barcode],static::class);

    }

}