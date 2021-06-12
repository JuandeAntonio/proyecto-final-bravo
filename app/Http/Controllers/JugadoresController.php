<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Partido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class JugadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugadors = Jugador::all();
        return view('admin.jugador.index')->with('jugadors', $jugadors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jugador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {/*
        $equipos = new Jugador();
        $equipos->nombre = $request->get('nombre');
        $equipos->apellidos = $request->get('apellidos');
        $equipos->dorsal = $request->get('dorsal');
        $equipos->equipo_id = $request->get('equipo_id');

        $equipos->save();*/

        
        return Response::json(array(
            'succes' => true,
            'data' => $request->all()
        ), 200);

        //return redirect('/admin/jugadors');
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
        $jugador = Jugador::find($id);
        return view ('admin.jugador.edit')->with('jugador',$jugador);
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
        $jugador = Jugador::find($id);
        $jugador->nombre = $request->get('nombre');
        $jugador->apellidos = $request->get('apellidos');
        $jugador->dorsal = $request->get('dorsal');
        $jugador->equipo_id = $request->get('equipo_id');

        $jugador->save();

        return redirect('/admin/jugadors');
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
