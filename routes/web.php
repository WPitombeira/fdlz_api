<?php

/** @var \Laravel\Lumen\Routing\Router $router */
header('Access-Control-Allow-Origin: *');

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/login', 'AdminController@authenticate');

$router->group(['middleware' => 'auth','prefix' => '/api/v2/estabelecimentos'], function() use($router){
   $router->get('/', 'EstabelecimentoController@getAll');
   $router->get('/{id}', 'EstabelecimentoController@getById');
   $router->get('/{id}/clientes', 'ClienteController@getClientes');
   $router->post('/{id}/clientes', 'ClienteController@save');
   $router->get('/{id}/clientes/{id_cliente}', 'ClienteController@getClienteById');
   $router->put('/{id}/clientes/{id_cliente}', 'ClienteController@update');
});
