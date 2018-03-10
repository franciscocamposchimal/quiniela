<?php

$app->get('/', function () use ($app) {
    return $app->version();
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function($api) {
    $api->group(['prefix'=>'oauth'], function($api) {
    $api->post('token','\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
    });
    $api->group(['namespace'=>'App\Http\Controllers','middleware'=>['auth:api', 'cors']], function($api){
        $api->get('users','UserController@index');
        $api->post('user','UserController@create');
    });
});