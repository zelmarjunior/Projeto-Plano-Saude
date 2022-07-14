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
Route::get('/clientes/{id}', [App\Http\Controllers\HomeController::class, 'read'])->name('read');
Route::get('/clientes', [App\Http\Controllers\HomeController::class, 'deleteDependent'])->name('deleteDependent');
Route::put('/clientes/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::get('/cadastra-cliente/novo', [App\Http\Controllers\HomeController::class, 'createNew'])->name('createNew');
Route::post('/cadastra-cliente/novo', [App\Http\Controllers\HomeController::class, 'createInsert'])->name('createInsert');
Route::get('/cadastra-cliente/editar/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::get('/cadastra-cliente/novo-dependente/{id}', [App\Http\Controllers\HomeController::class, 'createNewDependent'])->name('createNewDependent');
Route::post('/cadastra-cliente/novo-dependente', [App\Http\Controllers\HomeController::class, 'createInsertDependent'])->name('createInsertDependent');
Route::get('/home/{id}', [App\Http\Controllers\HomeController::class, 'deleteClient'])->name('deleteClient');

Route::resource('teste', TesteControler::class);
