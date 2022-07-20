<?php

use App\Http\Controllers\TesteControler;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/clientes/{id}', [App\Http\Controllers\HomeController::class, 'readAllDataClients'])->name('readAllDataClients');
Route::put('/clientes/{id}', [App\Http\Controllers\HomeController::class, 'updateClient'])->name('updateClient');
Route::get('/cadastra-cliente/novo', [App\Http\Controllers\HomeController::class, 'createNewClientLoadData'])->name('createNewClientLoadData');
Route::post('/cadastra-cliente/novo', [App\Http\Controllers\HomeController::class, 'createNewClientInsertData'])->name('createNewClientInsertData');
Route::get('/cadastra-cliente/editar/{id}', [App\Http\Controllers\HomeController::class, 'editClient'])->name('editClient');
Route::get('/cadastra-cliente/novo-dependente/{id}', [App\Http\Controllers\HomeController::class, 'createNewClientLoadDataDependent'])->name('createNewClientLoadDataDependent');
Route::post('/cadastra-cliente/novo-dependente', [App\Http\Controllers\HomeController::class, 'createNewClientInsertDataDependent'])->name('createNewClientInsertDataDependent');
Route::get('/home/{id}', [App\Http\Controllers\HomeController::class, 'deleteClient'])->name('deleteClient');
Route::get('/dependente/{id}', [App\Http\Controllers\HomeController::class, 'deleteDependent'])->name('deleteDependent');
