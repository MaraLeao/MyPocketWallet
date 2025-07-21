<?php

use App\Http\Controllers\FPController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\UserController;


/*
|-------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/entradas', [EntradaController::class, 'index']);
Route::get('/entradas/create/despesa', [EntradaController::class, 'createDespesa']);
Route::get('/entradas/create/ganho', [EntradaController::class, 'createGanho']);
Route::get('/entradas/edit/{id}', [EntradaController::class, 'edit']);

Route::get('/formapagamentos', [FPController::class, 'index']);
Route::get('/formapagamentos/create', [FPController::class, 'create']);
Route::get('/formapagamentos/edit/{id}', [FPController::class, 'edit']);
Route::get('/formapagamentos/delete/{id}', [FPController::class, 'delete']);

Route::get('/users/{id}', [UserController::class, 'show']);
