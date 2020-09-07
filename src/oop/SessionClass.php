<?php
/**
 * Created by PhpStorm.
 * User: vladv
 * Date: 07.09.2020
 * Time: 23:31
 */

class SessionClass
{
    public $session = [];

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function all()
    {
        return $this->session;
    }

    public function get($key, $default)
    {
        return isset($this->session[$key]) ? $this->session[$key] : $default;
    }

    public function set($key, $value)
    {
        array_merge($this->session, [$key => $value]);
    }

    public function has($key)
    {
        return isset($this->session[$key]);
    }

    public function remove($key)
    {
        unset($this->session[$key]);
    }

    public function clear()
    {
        $this->session = [];
    }

    public function count()
    {
        return count($this->session);
    }
}