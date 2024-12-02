<?php

use App\Http\Controllers\EscolaController;
use App\Http\Controllers\UsuarioController;

Route::middleware(['auth', 'admin'])->group(function () {
   // Route::resource('escolas', EscolaController::class);
});

Route::resource('escolas', EscolaController::class);

Route::resource('usuarios', UsuarioController::class);
