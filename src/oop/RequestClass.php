<?php
/**
 * Created by PhpStorm.
 * User: vladv
 * Date: 07.09.2020
 * Time: 22:53
 */

class RequestClass
{
    public $dataGet;
    public $dataPost;
    public $userIp;
    public $userAgent = [];
    public $cookies;
    public $session;
    public $requestMethod;

    public function __construct($getMethod, $postMethod, $userIp, $userAgent, CookiesClass $cookies, SessionClass $session, $requestMethod)
    {
        $this->dataGet = $getMethod;
        $this->dataPost = $postMethod;
        $this->userIp = $userIp;
        $this->userAgent = $userAgent;
        $this->cookies = $cookies;
        $this->session = $session;
        $this->requestMethod = $requestMethod;
    }

    public function query($key, $default = null)
    {
        return isset($this->dataGet[$key]) ? $this->dataGet[$key] : $default;
    }

    public function post($key, $default = null)
    {
        return isset($this->dataPost[$key]) ? $this->dataPost[$key] : $default;
    }

    public function get($key, $default = null)
    {
        if (!isset($this->dataPost[$key]) && !isset($this->dataGet[$key])) {
            return $default;
        }
        return isset($this->dataPost[$key]) ? $this->dataPost[$key] : $this->dataGet[$key];
    }

    public function all(array $only = [])
    {
        return isset($only) ? ['get' => array_keys($this->dataGet), 'post' => array_keys($this->dataPost)] : ['get' => $this->dataGet, 'post' => $this->dataPost];
    }

    public function has($key)
    {
        return (isset($this->dataPost[$key]) || isset($this->dataGet[$key])) ? true : false;
    }

    public function ip()
    {
        return $this->userIp;
    }

    public function userAgent()
    {
        return $this->userAgent;
    }

    public function cookies()
    {
        return $this->cookies;
    }

    public function session()
    {
        return $this->session;
    }
}