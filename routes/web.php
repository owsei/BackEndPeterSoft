<?php

use Illuminate\Http\Request;
/** @var \Laravel\Lumen\Routing\Router $router */
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

$router->get('/', function () use ($router) {
    return $router->app->version();
});



//Todo tiene que pasar por aqui
$router->group(['middleware' => 'AuthPeterSoft'], function () use ($router) {
    // $router->get('/testData', function () use ($router) {
    //      return $router->app->version();
    // });
    $router->get('/testData', 'TestDataController@testData');
    $router->get('/testDataDependencies', 'TestDataController@testDataDependencies');

    //USUARIOS
    $router->post('/loginUser', 'UserController@loginUser');
    $router->get('/getUser', 'UserController@getUser');
    $router->get('/getAllUsers', 'UserController@getAllUsers');

    //WEIGHT
    $router->get('/getWeight', 'WeightController@getWeight');
    $router->post('/insertWeight', 'WeightController@insertWeight');
});

