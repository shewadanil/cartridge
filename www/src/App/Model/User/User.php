<?php


namespace App\Model\User;


use App\Attribute\Properties;
use App\Attribute\Table;
use App\Exceptions\InvalidArgument;
use App\Model\ActiveRecordEntity;
use http\Exception\InvalidArgumentException;

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
    public function getAuthToken(){
        return $this->authToken;
    }
    public function getId(){
        return $this->id;
    }
    public function getPasswordHash(): string
    {
        return $this->passwordHach;
    }
    protected static function getTableName(): string
    {
        return 'user';
    }
    public static function login(array $value){
        $user = User::findByColumn('nikname', $value['login']);
        if($user === null){
            throw new InvalidArgument('Неправильный логин');
        }
        if (!password_verify($value['password'], $user->getPasswordHash())){
            throw new InvalidArgument('Неправильный пароль');
        }
        $user->refreshAuthToken();
        $user->save();
        return $user;
    }
    public function logOut(){
        $this->refreshAuthToken();
        $this->save();
        UserAuth::deleteToken();
    }
    private function refreshAuthToken(){
        $this->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
    }

}