<?php
/**
 * Created by PhpStorm.
 * User: vladv
 * Date: 07.09.2020
 * Time: 23:18
 */

class CookiesClass
{
    public $cookies = [];

    public function __construct($cookies)
    {
        $this->cookies = $cookies;
    }

    public function all()
    {
        return $this->cookies;
    }

    public function get($key, $default)
    {
        return isset($this->cookies[$key]) ? $this->cookies[$key] : $default;
    }

    public function set($key, $value)
    {
        return array_merge($this->cookies, [$key => $value]);
    }

    public function has($key)
    {
        return isset($this->cookies[$key]);
    }

    public function remove($key)
    {
        unset($this->cookies[$key]);
    }

    public function count()
    {
        return count($this->cookies);
    }
}