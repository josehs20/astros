<?php

use App\Http\Controllers\AtendenteController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DepoimentoController;
use App\Http\Controllers\FechamentoController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\PontoController;
use App\Http\Controllers\PromocaoController;
use App\Http\Controllers\SuporteController;
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
Route::get('/login/sair', function () {
    Auth::logout();
    return redirect()->route('inicio.index');
})->name('login.sair');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Grupo de Gerenciamento - Atendentes
Route::middleware('processo:' . config('conf.processos.gerenciamento.atendente.id'))
    ->prefix('atendentes')->group(function () {
        Route::get('/index', [AtendenteController::class, 'index'])->name('atendente.index');
        Route::get('/create', [AtendenteController::class, 'create'])->name('atendente.create');
        Route::get('/edit{id}', [AtendenteController::class, 'edit'])->name('atendente.edit');
        Route::post('/post', [AtendenteController::class, 'store'])->name('atendente.post');
        Route::put('/update/{id}', [AtendenteController::class, 'update'])->name('atendente.update');
    });

// Grupo de Gerenciamento - Promoções
Route::middleware('processo:' . config('conf.processos.gerenciamento.promocao.id'))
    ->prefix('promocoes')->group(function () {
        Route::get('/index', [PromocaoController::class, 'index'])->name('promocao.index');
        Route::get('/create', [PromocaoController::class, 'create'])->name('promocao.create');
        Route::post('/store', [PromocaoController::class, 'store'])->name('promocao.store');
        Route::post('/delete', [PromocaoController::class, 'delete'])->name('promocao.delete');
        Route::get('/get', [PromocaoController::class, 'getPromocoesDataTable'])->name('promocao.get');
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
        Route::get('/index', [PainelController::class, 'index'])->name('painel.index');
        Route::get('/create', [PainelController::class, 'create'])->name('painel.create');
        Route::post('/post', [PainelController::class, 'store'])->name('painel.post');
        Route::put('/update', [PainelController::class, 'update'])->name('painel.update');
    });

// Grupo de Menu - Consulta
Route::middleware('processo:' . config('conf.processos.menu.consulta.id'))
    ->prefix('consulta')->group(function () {
        Route::get('/index', [ConsultaController::class, 'index'])->name('consulta.index');
        Route::get('/create', [ConsultaController::class, 'create'])->name('consulta.create');
        Route::post('/post', [ConsultaController::class, 'store'])->name('consulta.post');
        Route::put('/update', [ConsultaController::class, 'update'])->name('consulta.update');
    });

// Grupo de Menu - Compras
Route::middleware('processo:' . config('conf.processos.menu.compras.id'))
    ->prefix('compras')->group(function () {
        Route::get('/index', [ComprasController::class, 'index'])->name('compras.index');
        Route::get('/create', [ComprasController::class, 'create'])->name('compras.create');
        Route::get('/edit/{id}', [ClienteController::class, 'edit'])->name('compras.edit');
        Route::post('/post', [ComprasController::class, 'store'])->name('compras.post');
        Route::put('/update', [ComprasController::class, 'update'])->name('compras.update');
    });

// Grupo de Cliente
Route::middleware('processo:' . config('conf.processos.gerenciamento.cliente.id'))
    ->prefix('clientes')->group(function () {
        Route::get('/index', [ClienteController::class, 'index'])->name('cliente.index');
        Route::get('/create', [ClienteController::class, 'create'])->name('cliente.create');
        Route::get('/edit/{id}', [ClienteController::class, 'edit'])->name('cliente.edit');
        Route::post('/post', [ClienteController::class, 'store'])->name('cliente.post');
        Route::put('/update/{id}', [ClienteController::class, 'update'])->name('cliente.update');
    });

// Grupo de Pontos
Route::middleware('processo:' . config('conf.processos.menu.pontos.id'))
    ->prefix('pontos')->group(function () {
        Route::get('/index', [PontoController::class, 'index'])->name('pontos.index');
        Route::get('/create', [PontoController::class, 'create'])->name('pontos.create');
        Route::post('/post', [PontoController::class, 'store'])->name('pontos.post');
        Route::put('/update', [PontoController::class, 'update'])->name('pontos.update');
    });

// Grupo de Suporte
Route::middleware('processo:' . config('conf.processos.menu.suporte.id'))
    ->prefix('suporte')->group(function () {
        Route::get('/index', [SuporteController::class, 'index'])->name('suporte.index');
        Route::get('/create', [SuporteController::class, 'create'])->name('suporte.create');
        Route::post('/post', [SuporteController::class, 'store'])->name('suporte.post');
        Route::put('/update', [SuporteController::class, 'update'])->name('suporte.update');
    });

// Grupo de Suporte
Route::middleware('processo:' . config('conf.processos.menu.depoimento.id'))
    ->prefix('depoimento')->group(function () {
        Route::get('/index', [DepoimentoController::class, 'index'])->name('depoimento.index');
        Route::get('/create', [DepoimentoController::class, 'create'])->name('depoimento.create');
        Route::post('/post', [DepoimentoController::class, 'store'])->name('depoimento.post');
        Route::post('/update', [DepoimentoController::class, 'update'])->name('depoimento.update');
        Route::get('/pendentes', [DepoimentoController::class, 'getDepoimentos'])->name('depoimento.get');

    });

// Grupo de Suporte
Route::middleware('processo:' . config('conf.processos.financeiro.fechamento.id'))
    ->prefix('fechamento')->group(function () {
        Route::get('/index', [FechamentoController::class, 'index'])->name('fechamento.index');
        Route::get('/create', [FechamentoController::class, 'create'])->name('fechamento.create');
        Route::post('/post', [FechamentoController::class, 'store'])->name('fechamento.post');
        Route::put('/update', [FechamentoController::class, 'update'])->name('fechamento.update');
    });

// Grupo de Suporte
Route::middleware('processo:' . config('conf.processos.financeiro.credito.id'))
    ->prefix('credito')->group(function () {
        Route::get('/index', [FechamentoController::class, 'index'])->name('credito.index');
        Route::get('/create', [FechamentoController::class, 'create'])->name('credito.create');
        Route::post('/post', [FechamentoController::class, 'store'])->name('credito.post');
        Route::put('/update', [FechamentoController::class, 'update'])->name('credito.update');
    });

    // Grupo de Suporte
Route::middleware('processo:' . config('conf.processos.conta.perfil.id'))
->prefix('perfil')->group(function () {
    Route::get('/index', [FechamentoController::class, 'index'])->name('perfil.index');
    Route::get('/create', [FechamentoController::class, 'create'])->name('perfil.create');
    Route::post('/post', [FechamentoController::class, 'store'])->name('perfil.post');
    Route::put('/update', [FechamentoController::class, 'update'])->name('perfil.update');
});
