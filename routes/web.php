<?php

use App\Http\Controllers\RptController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::middleware("guest")->group(function () {
    Route::get('/', function () {
        return view('auth/login');
    });
});



Route::middleware('auth')->group(function () {

    // rota para listar relatórios
    Route::get('/tarrpt', [RptController::class, 'index'])->name('tarrpt.index');

    // rota para criar relatório
    Route::post('/tarrpt', [RptController::class, 'store'])->name('tarrpt.store');

    // dashboard redirecionando pelo tipo de usuário
    Route::get('/dashboard', function(){
        $user = auth::user();
        if (!$user) return redirect()->route('login');

        if ($user->time=='D'){
            $rpt = \App\Models\Tarrpt::all(); // pegar todos os RPTs
            return view('tarrpt_dev', compact('rpt'));
        } elseif ($user->time=='S'){
            return redirect()->route('tarrpt.index'); // ✅ return necessário
        } else {
            return redirect('/logout');
        }
    })->name("/dashboard");

    // logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});


Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
