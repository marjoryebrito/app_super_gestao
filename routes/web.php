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
Route::get('/contato/{nome}/{categoria_id}', function(string $nome, int $categoria_id = 1){
    echo "Estamos aqui $nome - $categoria_id";
})-> where('categoria_id','[0-9]+')-> where('nome','[A-Za-z]+');