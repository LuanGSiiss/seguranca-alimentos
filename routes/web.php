<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlimentoController;
use App\Http\Controllers\PorcaoController;

Route::get('/', function () {
    return view('welcome');
});

// Rotas para Alimentos
Route::resource('alimentos', AlimentoController::class);

// Rotas para Porções
Route::resource('porcoes', PorcaoController::class);
