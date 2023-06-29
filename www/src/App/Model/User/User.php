<?php


namespace App\Model\User;


use App\Attribute\Properties;
use App\Attribute\Table;
use App\Model\ActiveRecordEntity;

#[Table]
class User extends ActiveRecordEntity
{
    #[Properties]
    protected $id;
    #[Properties]
    protected $nikname;
    #[Properties]
    protected $passwordHach;
    #[Properties]
    protected $role;
    #[Properties]
    protected $authToken;

    public function getPasswordHach(){
        return $this->passwordHach;
    }
    protected static function getTableName(): string
    {
        return 'user';
    }
    public static function login(array $value){
        $user = User::findByColumn('nikname', $value['login']);
        $user->refreshAuthToken();
        $user->save();
        return $user;
    }
    private function refreshAuthToken(){
        $this->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
    }
    public function getPasswordHash(): string
    {
        return $this->passwordHach;
    }
}