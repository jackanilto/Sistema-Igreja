<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterChurchController;

/*
|------------------------------------------------------------------
| ROTAS DE AUTENTICAÇÃO (TODOS OS DOMÍNIOS)
|------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|------------------------------------------------------------------
| DOMÍNIO PRINCIPAL
|------------------------------------------------------------------
*/
Route::domain('localhost')->group(function () {

    Route::get('/', fn () => view('welcome'));

    Route::get('/register-church', [RegisterChurchController::class, 'showForm'])
        ->middleware('auth');

    Route::post('/register-church', [RegisterChurchController::class, 'store'])
        ->middleware('auth')
        ->name('church.register');
});

/*
|------------------------------------------------------------------
| DOMÍNIO DAS IGREJAS
|------------------------------------------------------------------
*/
Route::domain('{subdomain}.localhost')
    ->middleware(['tenant', 'auth'])
    ->group(function () {

        Route::get('/', fn () => view('dashboard'))
            ->name('tenant.dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

