<?php

namespace App;


class Request
{
    private array $post = [];
    private array $get = [];
    private array $cookie;
    private string $uri;
    private string $method;

    public function __construct()
    {
        $this->post = [];
        foreach ($_POST as $key => $value) {
            $this->post[$key] = $value;
        }
        $result = parse_url($_SERVER['REQUEST_URI']);
        if (isset($result['query']))
            parse_str($result['query'], $this->get);
        else $this->get = [];
        $this->uri = $result['path'];
        foreach ($_COOKIE as $key => $value) {
            $this->cookie[$key] = $value;
        }
        $this->method = $_SERVER['REQUEST_METHOD'];

    }

    public function getPostKey($key)
    {
        if (isset($this->post[$key])) {
            return $this->post[$key];
        }
        return null;

    }
    public function getPostArrayKey($key = []):array
    {
        $array = [];
        foreach ($key as $value){
            if (isset($this->post[$value])) {
                $array[$value] = $this->post[$value];
            }
        }
        return $array;

    }
    public function getPostStatus() : bool{
        $ar = $this->post;
        $res = array_shift($ar);
        $res = isset($res);
        return $res;
    }
    public function getCookie($key)
    {
        return isset($this->cookie[$key]);

    }

    public function valueCookie($key, $default = null)
    {
        if (isset($this->cookie[$key]))
        {
            return $this->cookie[$key];
        }
        return $default;

    }

    public function getUri()
    {
        return $this->uri;
    }


    public function getMethod(): string
    {
        return $this->method;
    }
    public function getPost(): array
    {
        return $this->post;

    }
    public function getGet($key){
        if (isset($this->get[$key])) {
            return $this->get[$key];
        }
        return null;
    }

}