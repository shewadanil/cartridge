<?php


namespace App;


class ConnectDb
{
    private \mysqli $mysql;

    public  function start($flag){
        $this->db($flag);
    }
    private function db($flag){
        if ($flag){
            $config = require_once 'config/dbconfig.php';
            $this->mysql = new \mysqli($config['hostname'],$config['username'],$config['password'],$config['database']);

        }
        else if($flag === 0){
            $this->mysql->close();
        }



    }


}