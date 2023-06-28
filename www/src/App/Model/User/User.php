<?php


namespace App\Model\User;


use App\Attribute\Properties;
use App\Attribute\Table;
use App\Model\ActiveRecordEntity;

#[Table(User::class)]
class User extends ActiveRecordEntity
{
    #[Properties("id")]
    protected $id;
    #[Properties("nikname")]
    protected $nikname;
    #[Properties("passwordHach")]
    protected $passwordHach;
    #[Properties("passwordHach")]
    protected $role;
    #[Properties("authToken")]
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