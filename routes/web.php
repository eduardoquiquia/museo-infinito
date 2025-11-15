<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExhibicionController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;

// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Exhibiciones
Route::get('/exhibiciones', [ExhibicionController::class, 'index'])->name('exhibiciones.index');

// Eventos
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');

// Rutas (sin controlador)
Route::get('/rutas', function() {
    return view('rutas.index');
})->name('rutas.index');

// Blog (sin controlador)
Route::get('/blog', function() {
    return view('blog.index');
})->name('blog.index');

// Restaurante (sin controlador)
Route::get('/restaurante', function() {
    return view('restaurante.index');
})->name('restaurante.index');

// Sobre Nosotros (sin controlador)
Route::get('/sobre', function() {
    return view('sobre.index');
})->name('sobre.index');

// Contacto (sin controlador)
Route::get('/contacto', function() {
    return view('contacto.index');
})->name('contacto.index');

Route::resource('usuarios', UserController::class);
Route::resource('productos', ProductoController::class);
Route::resource('eventos', EventoController::class);
Route::resource('exhibiciones', ExhibicionController::class);
