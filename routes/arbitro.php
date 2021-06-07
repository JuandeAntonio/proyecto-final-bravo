<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Arbitro\HomeController;

Route::get('', [HomeController::class, 'index'])->name('arbitro.home');


//Route::resource('/ligas', 'App\Http\Controllers\LigasController')->names('admin.ligas');
