<?php

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\AuthController;
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

Route::view('/', 'home')->name('home');


Route::view('/registar', 'register')->name('registrar');
Route::post('/registar', [AuthController::class, 'insert']); 

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');




Route::middleware('auth')->group(function(){
    // Rtoas de usuario
    Route::get('/testlog',function(){
        return "hello World";
    });

});

Route::middleware(['auth','is.admin'])->prefix('admin')->group(function(){
    // Rotas de admin

    Route::get('/test',function(){
        return "hello World admin";
    });
});
