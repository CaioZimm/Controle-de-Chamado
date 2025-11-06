<?php

use App\Http\Controllers\RptController;
use App\Http\Controllers\OrganizacoesController;
use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::middleware("guest")->group(function () {
    Route::get('/', function () {
        return view('auth/login');
    });
});

Route::middleware('auth')->group(function () {

    Route::get('/', [RptController::class, 'index'])->name('tarrpt.index');

    Route::post('/tarrpt', [RptController::class, 'store'] )->name('tarrpt.store');


    Route::post('/organizacoes', [OrganizacoesController::class, 'store'])->name('organizacoes.store');
    Route::post('/clientes', [ClientesController::class, 'store'])->name('clientes.store');


    Route::get('/buscar-organizacoes', [OrganizacoesController::class, 'buscarOrganizacoes'])->name('buscar.organizacoes');
    Route::get('/buscar-clientes', [ClientesController::class, 'buscarClientes'])->name('buscar.clientes');

    // logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});


Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
