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

Route::get('/', [ ProdutosController::class, 'index' ])->name('home');


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
    Route::view('/cadastrar', 'produtos-create')->name('cadastrar-produto');
    Route::post('/cadastrar', [ ProdutosController::class, 'store' ]);
    Route::get('/produtos', [App\Http\Controllers\ProdutosController::class, 'admin'])->name('adminsitrador');
    Route::get('/remover/{id}', [App\Http\Controllers\ProdutosController::class, 'destroy'])->name('remover-produto');
    
    Route::get('/test',function(){
        return "hello World admin";
    });
});
