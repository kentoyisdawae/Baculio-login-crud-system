<?php

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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users', ['uses' => 'UserController@getUsers']);
});

$router->get('login', [
    'as' => 'login', 'uses' => 'UserController@loginPage'
]);

//log in button
$router->post('verify', [
    'as' => 'verify', 'uses' => 'UserController@verifyUser'
]);

//add user page
$router->post('addUser', [
    'as' => 'addUser', 'uses' => 'UserController@newUserPage'
]);

//add user button
$router->post('insert', [
    'as' => 'insert', 'uses' => 'UserController@insertUser'
]);

//delete user page
$router->get('delUserPage', [
    'as' => 'delUserPage', 'uses' => 'UserController@deleteUserPage'
]);

//delete user button
$router->post('deleteUser', [
    'as' => 'deleteUser', 'uses' => 'UserController@delete'
]);

//update user page
$router->post('updateUserPage', [
    'as' => 'updateUserPage', 'uses' => 'UserController@updateUserPage'
]);

//update user button
$router->post('updateUser', [
    'as' => 'updateUser', 'uses' => 'UserController@update'
]);
