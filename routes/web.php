<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ExhibicionController;

Route::get('/', function () {
    return view('home');
});

Route::resource('usuarios', UserController::class);
Route::resource('productos', ProductoController::class);
Route::resource('eventos', EventoController::class);
Route::resource('exhibiciones', ExhibicionController::class);
