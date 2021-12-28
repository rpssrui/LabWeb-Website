<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpregadorController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\User;

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
    return view('home');
});

Route::get('/home', [HomeController::class, 'home']);
Route::post('home', [HomeController::class, 'home'])->name('home');

Route::get('/registerCandidato', [UserController::class, 'registerCandidato']);
Route::post('createCandidato', [RegisterController::class, 'createCandidato'])->name('createCandidato');
Route::get('/login', function () {
    return view('auth.login');
});
Route::post('login', [UserController::class, 'login'])->name('login');

Route::get('/registerEmpregador', [UserController::class, 'registerEmpregador']);
Route::post('createEmpregador', [RegisterController::class, 'createEmpregador'])->name('createEmpregador');

Auth::routes();

Route::get('/criarAnuncio', [AnuncioController::class, 'showCriarAnuncio']);
Route::post('criarAnuncio', [AnuncioController::class, 'createAnuncio'])->name('createAnuncio');
Route::get('/meusAnuncios', [AnuncioController::class, 'showMeusAnuncios'])->name('meusAnuncios');
Route::get('/anuncios/edit/{id}', [AnuncioController::class, 'editAnuncio']);
Route::put('anuncios/update/{id}', [AnuncioController::class, 'updateAnuncio']);
Route::get('anuncios/delete/{id}', [AnuncioController::class, 'deleteAnuncio']);

Route::get('admin.home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
