<?php

use App\Http\Controllers\AtendenteController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\PromocaoController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\InicioController::class, 'index'])->name('inicio.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Grupo de Gerenciamento - Atendentes
Route::middleware('processo:' . config('conf.processos.gerenciamento.atendente.id'))
    ->prefix('atendentes')->group(function () {
        Route::get('/index', [AtendenteController::class, 'index'])->name('atendente.index');
        Route::get('/create', [AtendenteController::class, 'create'])->name('atendente.create');
        Route::post('/post', [AtendenteController::class, 'store'])->name('atendente.post');
        Route::put('/update', [AtendenteController::class, 'update'])->name('atendente.update');
    });

// Grupo de Gerenciamento - Promoções
Route::middleware('processo:' . config('conf.processos.gerenciamento.promocao.id'))
    ->prefix('promocoes')->group(function () {
        Route::get('/index', [PromocaoController::class, 'index'])->name('promocao.index');
        Route::get('/create', [PromocaoController::class, 'create'])->name('promocao.create');
        Route::post('/post', [PromocaoController::class, 'store'])->name('promocao.post');
        Route::put('/update', [PromocaoController::class, 'update'])->name('promocao.update');
    });

// Grupo de Histórico - Chat
Route::middleware('processo:' . config('conf.processos.historicos.chat.id'))
    ->prefix('chat')->group(function () {
        Route::get('/index', [ChatController::class, 'index'])->name('chat.index');
        Route::get('/create', [ChatController::class, 'create'])->name('chat.create');
        Route::post('/post', [ChatController::class, 'store'])->name('chat.post');
        Route::put('/update', [ChatController::class, 'update'])->name('chat.update');
    });

// Grupo de Menu - Painel
Route::middleware('processo:' . config('conf.processos.menu.painel.id'))
    ->prefix('painel')->group(function () {
        Route::get('/index', [PainelController::class, 'index'])->name('menu.painel.index');
        Route::get('/create', [PainelController::class, 'create'])->name('menu.painel.create');
        Route::post('/post', [PainelController::class, 'store'])->name('menu.painel.post');
        Route::put('/update', [PainelController::class, 'update'])->name('menu.painel.update');
    });

// Grupo de Menu - Consulta
Route::middleware('processo:' . config('conf.processos.menu.consulta.id'))
    ->prefix('consulta')->group(function () {
        Route::get('/index', [ConsultaController::class, 'index'])->name('menu.consulta.index');
        Route::get('/create', [ConsultaController::class, 'create'])->name('menu.consulta.create');
        Route::post('/post', [ConsultaController::class, 'store'])->name('menu.consulta.post');
        Route::put('/update', [ConsultaController::class, 'update'])->name('menu.consulta.update');
    });

// Grupo de Menu - Compras
Route::middleware('processo:' . config('conf.processos.menu.compras.id'))
    ->prefix('compras')->group(function () {
        Route::get('/index', [ComprasController::class, 'index'])->name('menu.compras.index');
        Route::get('/create', [ComprasController::class, 'create'])->name('menu.compras.create');
        Route::post('/post', [ComprasController::class, 'store'])->name('menu.compras.post');
        Route::put('/update', [ComprasController::class, 'update'])->name('menu.compras.update');
    });
