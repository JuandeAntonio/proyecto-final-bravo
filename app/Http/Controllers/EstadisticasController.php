<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Estadistica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class EstadisticasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nombreliga)
    {   
        $idlg = DB::select("select id from ligas where nombre like '".$nombreliga."';");
        $idliga = $idlg[0]->id;
        $numjor = DB::select('select count(distinct jornada) as num from partidos where liga_id = '.$idliga.';'); 
        $numerojornadas = $numjor[0]->num;      
        $var = DB::select('select * from estadisticas where equipo_id in (select id from equipos where liga_id in (select id from ligas where nombre like "'.$nombreliga.'")) order by puntos desc;');
        $todaslasjornadas = [];
        for($i=0; $i<=$numerojornadas; $i++){
            $consulta = DB::select("select * from partidos where liga_id = ".$idliga." and jornada = ".$i.";");
            array_push($todaslasjornadas,$consulta);
        }
        /*
        return Response::json(array(
            'succes' => true,
            'data' => $todaslasjornadas[1][0]
        ), 200);*/

        return view('clasificaciones.index')->with('estadisticas', $var)->with('nombreliga',$nombreliga)->with('todaslasjornadas',$todaslasjornadas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
