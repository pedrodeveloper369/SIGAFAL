<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicoController;
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
    return view('welcome');
});*/

Route::get('/', function () {
    return view('auth/login');
});


Route::get('/teste', function () {
    return view('teste');
});

/*Route::get('/dashboard/user', function () {
    return view('user');
});*/

Route::get('/dashboard/user', [UserController::class,'index']);


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/register', function () {
    return view('auth/register');
})->middleware(['auth'])->name('register');

Route::get('/user/register', function () {
    return view('auth/register');
})->middleware(['auth'])->name('register');
require __DIR__.'/auth.php';

Route::post('/user/registar',[RegisteredUserController::class,'store'])->middleware('auth');

//Rotas clientes
Route::get('/dashboard/clientes', [ClienteController::class,'index']);
Route::get('/dashboard/clientes.register', function () {
    return view('registercliente');
});
Route::post('/dashboard/clientes', [ClienteController::class,'store']);

//Rotas servicos
Route::get('/dashboard/servicos', [ServicoController::class,'index']);
Route::get('/dashboard/servico.register', [ServicoController::class,'create']);
Route::post('/dashboard/servicos', [ServicoController::class,'store']);