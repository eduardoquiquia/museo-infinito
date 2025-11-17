<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExhibicionController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Páginas estáticas
Route::get('/rutas', function() { return view('rutas.index'); })->name('rutas.index');
Route::get('/blog', function() { return view('blog.index'); })->name('blog.index');
Route::get('/restaurante', function() { return view('restaurante.index'); })->name('restaurante.index');
Route::get('/sobre', function() { return view('sobre.index'); })->name('sobre.index');
Route::get('/contacto', function() { return view('contacto.index'); })->name('contacto.index');

// CRUD Resources
Route::resource('usuarios', UserController::class);
Route::resource('productos', ProductoController::class);
Route::resource('eventos', EventoController::class);
Route::resource('exhibiciones', ExhibicionController::class);