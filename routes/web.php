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


Route::get('/', 'PrincipalController@principal')-> name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobreNos')-> name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')-> name('site.contato');

Route::get('/login', function(){return 'Login';})-> name('site.login');


//Agrupamento de rotas
Route::prefix('/app')-> group(function(){

    Route::get('/clientes', function(){return 'Clientes';})-> name('app.clientes');

    Route::get('/fornecedores', function(){return 'Fornecedores';})-> name('app.fornecedores');
    
    Route::get('/produtos', function(){return 'Produtos';})-> name('app.produtos');

});



