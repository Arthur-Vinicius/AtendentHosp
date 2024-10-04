<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Criação das rotas url e funçoes */

use App\Http\Controllers\userController;
use App\Http\Controllers\loginController;

// Rotas de login agrupadas.
Route::prefix('')->name('login.')
->controller(loginController::class)
->group(function(){
    Route::redirect('/', 'login');
    Route::get('/login', 'index')->name('login');
    Route::post('/logar', 'login')->name('post.login');
    Route::post('/logout', 'logout')->middleware('auth')->name('post.logout');
    Route::get('/redefinirSenha', 'redefinirSenha')->name('redefinirSenha');
});

// Agrupa as rotas, diminui e organiza o codigo, agrupa por prefixo da rota, função da controller e nome da rota
Route::prefix('usuarios')
->name('user.')
->middleware('auth')
->controller(userController::class)
//->missing(function(){ return redirect()->route('user.list');})
->group(function(){
    Route::get('/','index')->name('list');
    Route::get('/info/{id}','showUserInfos')->name('showUserInfos');
    /*Define a busca de usuarios */
    Route::get('/pesquisa/usuarios','pesquisa')->name('search');
    Route::put('/update/{id}','update')->name('update');
    Route::delete('/deletar/{id}','destroy')->name('destroy');
    Route::get('/cadastrar/usuario','create')->name('create');
    Route::post('/cadastrar/infos','store')->name('store');
    Route::get('/usuario/perfil','perfil')->name('perfil');
});

/* redireciona para a rota user.list se uma rota inexistente for acessada.*/
Route::fallback(function(){
    return redirect()->route('user.list');
});






