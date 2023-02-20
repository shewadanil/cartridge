<?php


namespace Request;


class Request
{
    private array $post;
    private array $get;
    private array $cookie;

    public function __construct()
    {
        $this->post = [];
        foreach ($_POST as $key => $value) {
            $this->post[$key] = $value;
        }
        $this->get = [];
        foreach ($_GET as $key => $value) {
            $this->get[$key] = $value;
        }
        $this->cookie = [];
        foreach ($_COOKIE as $key => $value) {
            $this->cookie[$key] = $value;
        }


    }
    public function getPost_key($key ,$default = null){
        if(isset($this->post[$key])){
           return $this->post[$key];
        }
            return $default;

    }
    public function getCookie($key){
       return isset($this->cookie[$key]);

    }
    public function valueCookie($key, $default = null){
        if (isset($this->cookie[$key]));{
            return $this->cookie[$key];
        }
        return $default;

    }
}