<?php

namespace App;


class Request
{
    private array $post = [];
    private array $get = [];
    private array $cookie = [];
    private string $uri;
    private string $method;

    public function __construct()
    {
        $this->post = [];
        foreach ($_POST as $key => $value) {
            $this->post[$key] = $value;
        }
        $result = parse_url($_SERVER['REQUEST_URI']);
        if (isset($result['query'])) parse_str($result['query'], $this->get);
        else $this->get = [];
        $this->uri = $result['path'];

        $this->cookie = [];
        foreach ($_COOKIE as $key => $value) {
            $this->cookie[$key] = $value;
        }
        $this->method = $_SERVER['REQUEST_METHOD'];


    }

    public function getPostKey($key, $default = null)
    {
        if (isset($this->post[$key])) {
            return $this->post[$key];
        }
        return $default;

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

    public function getKey($key, $default = null)
    {
        if (isset($this->get[$key])) {
            return $this->get[$key];
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

}