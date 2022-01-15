<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CandidaturaController;
use App\Http\Controllers\EmpregadorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MailController;
use App\Models\Candidatura;
use App\Http\Controllers\PDFController;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

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


//rotas user
Route::get('/registerCandidato', [UserController::class, 'registerCandidato']);
Route::post('createCandidato', [RegisterController::class, 'createCandidato'])->name('createCandidato');
Route::get('/informacoesPessoais/{id}', [UserController::class, 'informacoesPessoais'])->middleware('verified');
Route::post('/uploadPP/{id}',[UserController::class, 'uploadImage']);
Route::get('/registerEmpregador', [UserController::class, 'registerEmpregador'])->name('registerEmpregador');
Route::post('createEmpregador', [RegisterController::class, 'createEmpregador'])->name('createEmpregador');
Route::get('user/{id}', [UserController::class, 'userProfile'])->name('user')->middleware('verified');
Route::post('/user/editar/{id}', [UserController::class, 'updatePerfil']);

//rotas anuncios
Route::get('/criarAnuncio', [AnuncioController::class, 'showCriarAnuncio'])->middleware('verified');    
Route::post('createAnuncio', [AnuncioController::class, 'createAnuncio'])->name('createAnuncio');
Route::get('/meusAnuncios', [AnuncioController::class, 'showMeusAnuncios'])->name('/meusAnuncios');
Route::get('/anuncios/edit/{id}', [AnuncioController::class, 'editAnuncio']);
Route::put('anuncios/update/{id}', [AnuncioController::class, 'updateAnuncio']);
Route::get('anuncios/delete/{id}', [AnuncioController::class, 'deleteAnuncio']);
Route::get('/searchAdd', [AnuncioController::class, 'searchAnuncio']);
Route::get('/verMais/{id}',[AnuncioController::class, 'showVerMais'])->middleware('verified');  
Route::get('/report/{id}',[AnuncioController::class, 'report'])->middleware('verified');  

//rotas candidaturas
Route::post('contactarEmpresa/{id}',[CandidaturaController::class,'enviarCandidatura'])->name('contactarEmpresa')->middleware('verified');
Route::get('anuncios/Candidaturas/{id}',[CandidaturaController::class,'showCandidaturas']);
Route::get('/resposta/{id}',[CandidaturaController::class,'showRespostaForm']);
Route::get('enviarResposta/{id}',[MailController::class,'contactPost']);

//rotas admin
Route::get('admin', [HomeController::class, 'adminHome'])->name('admin')->middleware('is_admin');
Route::post('reports',[UserController::class, 'showReports'])->name('reports')->middleware('is_admin');

//rotas extra
Route::get('team', [HomeController::class, 'team']);
Auth::routes(['verify'=>true]);

Route::get('/Curriculo/{id}',[PDFController::class,'generatePDF']);