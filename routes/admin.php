<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LigasController;

Route::get('', [HomeController::class, 'index']);

Route::resource('ligas', LigasController::class)->names('admin.ligas');