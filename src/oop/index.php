<?php
/**
 * Created by PhpStorm.
 * User: vladv
 * Date: 08.09.2020
 * Time: 0:07
 */

require_once 'CookiesClass.php';
require_once 'SessionClass.php';
require_once 'RequestClass.php';

$session = new SessionClass([
    'session_key_1' => 'session_value_1',
    'session_key_2' => 'session_value_2',
    'session_key_3' => 'session_value_3',
    'session_key_4' => 'session_value_4',
]);
$cookies = new CookiesClass([
    'cookies_key_1' => 'cookies_value_1',
    'cookies_key_2' => 'cookies_value_2',
    'cookies_key_3' => 'cookies_value_3',
    'cookies_key_4' => 'cookies_value_4',
]);

$request = new RequestClass(

    [
        'get_key_1' => 'get_value_1',
        'get_key_2' => 'get_value_2',
        'get_key_3' => 'get_value_3',
        'get_key_4' => 'get_value_4',
    ],
    [
        'post_key_1' => 'post_value_1',
        'post_key_2' => 'post_value_2',
        'post_key_3' => 'post_value_3',
        'post_key_4' => 'post_value_4',
    ],
    '192.168.0.1',
    'Chrome',
    $cookies,
    $session,
    'post'
);
var_dump($request->query('get_key_1'));
var_dump($request->post('post_key_1'));
var_dump($request->get('get_key_4'));
var_dump($request->has('post_key_2'));
var_dump($request->ip());
var_dump($request->userAgent());

var_dump($request->cookies()->all());
var_dump($request->session()->all());