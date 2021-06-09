<?php

namespace App\Http\Controllers\arbitro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partido;

class HomeController extends Controller
{
    public function index(){
        return view('arbitro.index');
    }
}
