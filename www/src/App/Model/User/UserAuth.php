<?php


namespace App\Model\User;


class UserAuth
{
    public static function createToken(User $user){
        $token = $user->getId() . ':' . $user->getAuthToken();
        setcookie('token', $token, 0, '/','', true, false);

    }
    public static function getUserByToken(){
        $token = $_COOKIE['token'] ?? '';
        if (empty($token)){
            return null;
        }
        [$userId, $authToken] = explode(':', $token);
        $user = User::getById((int)$userId);
        if($user === null){
            return null;
        }
        if ($user->getAuthToken() != $authToken){
            return null;
        }
        return $user;
    }
    public static function deleteToken(){
        setcookie('token', '', -1, '', true, false);
    }

}