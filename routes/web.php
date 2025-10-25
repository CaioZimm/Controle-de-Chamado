<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('home');
});

Route::middleware("auth")->group(function () {

    Route::get('/tarrpt', function(){
        return view('tarrpt');
    })->name("dashboard"); //<---retorno depois do login que estava dando erro

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');

});


require __DIR__.'/auth.php';
