<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liga;
use App\Models\Equipo;
use App\Models\Partido;
use Illuminate\Support\Facades\DB;

class PartidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $partidos = Partido::all();
        return view('admin.partido.index')->with('partidos', $partidos);
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
        $partido = Partido::find($id);
        return view ('admin.partido.edit')->with('partido',$partido);
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
        $partido = Partido::find($id);
        $partido->fecha_partido = $request->get('fecha');
        $partido->hora_partido = $request->get('hora');
        $partido->sets_equipo_local = $request->get('sets_equipo_local');
        $partido->sets_equipo_visitante = $request->get('sets_equipo_visitante');
        $partido->arbitros_id = $request->get('arbitro');

        $partido->save();

        return redirect('/admin/partidos');
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
    public static function generar_partidos($id_liga){

        //$id_liga = 1;
        $equipos_liga = Equipo::where('liga_id', $id_liga)->get();
        $equipos = [];
        foreach($equipos_liga as $equipo){
            $id = $equipo->id;
            array_push($equipos, $id);
        }
        
        $orden = [
            0 => [1,2,8,3,7,4,6,5],
            1 => [3,1,4,2,5,8,6,7],
            2 => [1,4,3,5,2,6,8,7],
            3 => [5,1,6,4,7,3,8,2],
            4 => [1,6,5,7,4,8,3,2],
            5 => [7,1,8,6,2,5,3,4],
            6 => [1,8,7,2,6,3,5,4]
        ];
           for($i=0; $i<7; $i++){
            DB::insert("INSERT INTO `partidos` VALUES (NULL, '" . $i+1 . "', '2021-10-02', '9:00', '0', '0', '0', '0', '".$id_liga."', '".$equipos[($orden[$i][0])-1]."', '".$equipos[($orden[$i][1])-1]."', '1', NULL, NULL);");
            DB::insert("INSERT INTO `partidos` VALUES (NULL, '" . $i+1 . "', '2021-10-02', '9:00', '0', '0', '0', '0', '".$id_liga."', '".$equipos[($orden[$i][2])-1]."', '".$equipos[($orden[$i][3])-1]."', '1', NULL, NULL);");
            DB::insert("INSERT INTO `partidos` VALUES (NULL, '" . $i+1 . "', '2021-10-02', '9:00', '0', '0', '0', '0', '".$id_liga."', '".$equipos[($orden[$i][4])-1]."', '".$equipos[($orden[$i][5])-1]."', '1', NULL, NULL);");
            DB::insert("INSERT INTO `partidos` VALUES (NULL, '" . $i+1 . "', '2021-10-02', '9:00', '0', '0', '0', '0', '".$id_liga."', '".$equipos[($orden[$i][6])-1]."', '".$equipos[($orden[$i][7])-1]."', '1', NULL, NULL);");
        }
        
        for($i=0; $i<7; $i++){
            $orden[$i] = array_reverse($orden[$i]);
        }
           for($i=7; $i<14; $i++){
            DB::insert("INSERT INTO `partidos` VALUES (NULL, '" . $i+1 . "', '2021-10-02', '9:00', '0', '0', '0', '0', '".$id_liga."', '".$equipos[($orden[$i-7][0])-1]."', '".$equipos[($orden[$i-7][1])-1]."', '1', NULL, NULL);");
            DB::insert("INSERT INTO `partidos` VALUES (NULL, '" . $i+1 . "', '2021-10-02', '9:00', '0', '0', '0', '0', '".$id_liga."', '".$equipos[($orden[$i-7][2])-1]."', '".$equipos[($orden[$i-7][3])-1]."', '1', NULL, NULL);");
            DB::insert("INSERT INTO `partidos` VALUES (NULL, '" . $i+1 . "', '2021-10-02', '9:00', '0', '0', '0', '0', '".$id_liga."', '".$equipos[($orden[$i-7][4])-1]."', '".$equipos[($orden[$i-7][5])-1]."', '1', NULL, NULL);");
            DB::insert("INSERT INTO `partidos` VALUES (NULL, '" . $i+1 . "', '2021-10-02', '9:00', '0', '0', '0', '0', '".$id_liga."', '".$equipos[($orden[$i-7][6])-1]."', '".$equipos[($orden[$i-7][7])-1]."', '1', NULL, NULL);");
        }

        return redirect('/admin/partidos');
    }
}
