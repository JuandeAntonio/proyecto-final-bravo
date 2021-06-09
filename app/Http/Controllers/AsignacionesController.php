<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;
use Illuminate\Support\Facades\DB;

class AsignacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaciones = Partido::where('arbitros_id', 4)->get();
        return view('admin.asignaciones.index')->with('asignaciones',$asignaciones);
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
        $asignacion = Partido::find($id);
        $equipo_visitante = DB::select('select equipo_visitante_id from partidos where id ='.$id.';');
        $nombre_equipo_visitante = $equipo_visitante[0]->equipo_visitante_id;
        $equipo_local = DB::select('select equipo_local_id from partidos where id ='.$id.';');
        $nombre_equipo_local = $equipo_local[0]->equipo_local_id;
        $jugadores_visitantes = DB::select('select nombre from jugadors where equipo_id ='.$nombre_equipo_visitante.';');
        $jugadores_locales = DB::select('select nombre from jugadors where equipo_id ='.$nombre_equipo_local.';');
        return view ('admin.asignaciones.edit')
            ->with('asignacion',$asignacion)
            ->with('jugadores_visitantes',$jugadores_visitantes)
            ->with('jugadores_locales',$jugadores_locales);
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
        $partido->sets_equipo_local = $request->get('marcador_set_local');
        $partido->sets_equipo_visitante = $request->get('marcador_set_visitante');
        $partido->save();

        return redirect('/admin/asignaciones');
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
