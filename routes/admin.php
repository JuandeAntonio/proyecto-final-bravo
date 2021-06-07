<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LigasController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

//Route::resource('/ligas', LigasController::class)->names('admin.ligas');

Route::resource('/ligas', 'App\Http\Controllers\LigasController')->names('admin.ligas');

Route::resource('/equipos', 'App\Http\Controllers\EquiposController')->names('admin.equipos');;

Route::resource('/partidos', 'App\Http\Controllers\PartidosController')->names('admin.partidos');;

Route::resource('/jugadors', 'App\Http\Controllers\JugadoresController')->names('admin.jugadors');;

Route::resource('/arbitros', 'App\Http\Controllers\ArbitrosController')->names('admin.arbitros');