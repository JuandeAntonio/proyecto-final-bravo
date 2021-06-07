<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::resource('clasificaciones/{nombreliga}', 'App\Http\Controllers\EstadisticasController', ['parameters' => [
    '{nombreliga}' => 'nombre'
]]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('welcome');
})->name('welcome');

Route::post('/arbitro', 'App\Http\Controllers\Arbitro\HomeController@index');