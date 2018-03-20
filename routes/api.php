<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$api = $app->make(Dingo\Api\Routing\Router::class);

$api->version('v1', function ($api) {
    $api->post('/auth/login', [
        'as' => 'api.auth.login',
        'uses' => 'App\Http\Controllers\Auth\AuthController@postLogin',
    ]);

    $api->group([
        'middleware' => 'api.auth',
    ], function ($api) {
        $api->get('/', [
            'uses' => 'App\Http\Controllers\APIController@getIndex',
            'as' => 'api.index'
        ]);
        $api->get('/user/{id}/quinielas', [
            'uses' => 'App\Http\Controllers\QuinelaController@getAll',
            'as' => 'api.quinielas'
        ]);
        $api->put('/user/{id}/quiniela/{id_partido}', [
            'uses' => 'App\Http\Controllers\QuinelaController@putQuinela',
            'as'=> 'api.quiniela'
        ]);
        $api->get('/quinielas/ranking', [
            'uses' => 'App\Http\Controllers\QuinelaController@rankingQuinela',
            'as' => 'api.ranking'
        ]);
        $api->get('/partidos', [
            'uses' => 'App\Http\Controllers\PartidoController@getAllPartidos',
            'as' => 'api.partidos'
        ]);
        $api->put('/partido/{id}', [
            'uses' => 'App\Http\Controllers\PartidoController@putPartido',
            'as' => 'api.partido'
        ]);
        $api->get('/user/{id}', [
            'uses' => 'App\Http\Controllers\Auth\AuthController@getUser',
            'as' => 'api.auth.user'
        ]);
        $api->get('/users', [
            'uses' => 'App\Http\Controllers\Auth\AuthController@getAllUsers',
            'as' => 'api.auth.users'
        ]);
        $api->post('/user', [
            'uses' => 'App\Http\Controllers\Auth\AuthController@createUser',
            'as' => 'api.auth.user'
        ]);
        $api->put('/user/{id}/password', [
            'uses' => 'App\Http\Controllers\Auth\AuthController@resetPassword',
            'as' => 'api.auth.user'
        ]);
        $api->put('/user/{id}', [
            'uses' => 'App\Http\Controllers\Auth\AuthController@updateUser',
            'as' => 'api.auth.user'
        ]);
        $api->delete('/user/{id}', [
            'uses' => 'App\Http\Controllers\Auth\AuthController@deleteUser',
            'as' => 'api.auth.user'
        ]);
        $api->patch('/auth/refresh', [
            'uses' => 'App\Http\Controllers\Auth\AuthController@patchRefresh',
            'as' => 'api.auth.refresh'
        ]);
        $api->delete('/auth/invalidate', [
            'uses' => 'App\Http\Controllers\Auth\AuthController@deleteInvalidate',
            'as' => 'api.auth.invalidate'
        ]);
    });
});
