<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/requisitos', function () {
    return view('home');
})->middleware('auth');
Route::get('/personas', function () {
    return view('home');
})->middleware('auth');

Route::get('/users', function () {
    return view('home');
})->middleware('auth');

Route::get('/unidades', function () {
    return view('home');
})->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::apiResource('/requisito',\App\Http\Controllers\RequisitoController::class);
route::apiResource('/persona',\App\Http\Controllers\PersonaController::class);
route::apiResource('/user',\App\Http\Controllers\UserController::class);
route::put('/passact/{id}',[\App\Http\Controllers\UserController::class,'passact']);
//route::apiResource('/unidades',\App\Http\Controllers\UnidadController::class);
