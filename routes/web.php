<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/requisitos', function () {
    return view(['auth','admin']);
})->middleware('auth');
Route::get('/personas', function () {
    return view('home');
})->middleware('auth');

Route::get('/users', function () {
    return view('home');
})->middleware(['auth','admin']);

Route::get('/units', function () {
    return view('home');
})->middleware(['auth','admin']);

Route::get('/documentos', function () {
    return view('home');
})->middleware('auth');

Route::get('/archivos', function () {
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::apiResource('/requisito',\App\Http\Controllers\RequisitoController::class);
route::apiResource('/persona',\App\Http\Controllers\PersonaController::class);
route::apiResource('/user',\App\Http\Controllers\UserController::class);
route::put('/passact/{id}',[\App\Http\Controllers\UserController::class,'passact']);
route::apiResource('/unit',\App\Http\Controllers\UnitController::class);

Route::apiResource('/documento',\App\Http\Controllers\DocumentoController::class);
Route::apiResource('/archivo',\App\Http\Controllers\ArchivoController::class);

