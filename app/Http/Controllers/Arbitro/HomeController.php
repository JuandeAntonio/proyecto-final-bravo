<?php

namespace App\Http\Controllers\arbitro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partido;

class HomeController extends Controller
{
    public function index(){
        //$id_del_arbitro = 4;
        //$partidos = Partido::where('arbitros_id', '=', $id_del_arbitro)->get();
        //return view('arbitro.index')->with('partidos', $partidos);
        return view('arbitro.index');
    }
}
