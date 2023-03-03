<?php


namespace App;


class NewRecordDB
{
    private Request $request;
    private $mysql;

    public function __construct(Request $req)
    {
        $this->request = $req;
    }
    public function insert (){
        $this->mysql = new mysqli('database','Danil','1209vzQla','docker');
        $model = $this->request->post('model');
        $barcode = $this->request->post('barcode');
        $service = $this->request->post('service');
        $price = $this->request->post('price');
        $this->mysql->query("INSERT INTO `cartridge` (`model`, `barcode`, `service`, `price`)
    VALUES ('$model', '$barcode', '$service', '$price')");
        $this->mysql->close();
    }



}