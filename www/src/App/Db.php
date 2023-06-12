<?php


namespace App;


class Db
{
    private \PDO $pdo;
    private static int $count;
    private static  $connection;
    private function __construct(){
        $dboption = require_once 'config/dbconfig.php';
        $this->pdo = new \PDO('mysql:host=' . $dboption['host'] . ';dbname=' . $dboption['dbname'] ,
            $dboption['user'],
            $dboption['pass']);
        $this->pdo->exec('SET NAMES UTF8');

    }
    public function query(string $sql, array $params = [], $class_name = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);
        if (false === $result){
            return null;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class_name);

    }
    public static function getConnection(): self{
        if (self::$connection === null){
            self::$connection = new self();
        }
        return self::$connection;
}


}