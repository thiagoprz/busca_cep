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
$app->get('/', function () use ($app) {
    return 'Muito obrigado por utilizar este software. Para mais informações acesse: <a href="https://github.com/thiagoprz/busca_cep">https://github.com/thiagoprz/busca_cep</a>';
});
$app->group(['prefix' => 'api/v1'], function($app) {
    $app->get('/', 'CepController@index');
    $app->get('cidade/{cep}', 'CepController@cidade');
    $app->get('estado/{cep}', 'CepController@estado');
    $app->get('cep/{cep}', 'CepController@cep');
});