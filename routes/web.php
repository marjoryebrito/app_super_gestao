<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return "Olá, seja bem-vindo";
});*/


/*Na versão 8.x do Laravel utilizar:
Route::get('/', [\App\Http\Controller\PrincipalController::class, 'principal']);
*/
Route::get('/', 'PrincipalController@principal');

Route::get('/sobre-nos', 'SobreNosController@sobreNos');

Route::get('/contato', 'ContatoController@contato');

//tipagem das variáveis no PHP 7 pode evitar erros no código
Route::get('/contato/{nome}/{sobrenome}/{mensagem?}', function(string $nome, string $sobrenome, string $mensagem ='Mensagem não informada.'){
    echo "Estamos aqui $nome  $sobrenome - $mensagem";
});