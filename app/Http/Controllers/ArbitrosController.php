<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arbitro;
use App\Models\User;

class ArbitrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arbitros = Arbitro::all();
        return view('admin.arbitro.index')->with('arbitros', $arbitros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.arbitro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arbitros = new Arbitro();
        $arbitros->nombre_guerra = $request->get('nombre_guerra');
        $arbitros->telefono = $request->get('telefono');
        $arbitros->save();

        $arbitros_user = new User();
        $arbitros_user->name = $request->get('nombre_guerra');
        $arbitros_user->email = $request->get('nombre_guerra')."@gmail.com";
        $arbitros_user->password =bcrypt("A123a456");
        $arbitros_user->assignRole('Arbitro');
        $arbitros_user->save();

        return redirect('/admin/arbitros');
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
        $arbitro = Arbitro::find($id);
        return view ('admin.equipo.edit')->with('arbitro',$arbitro);
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
        $arbitro = Arbitro::find($id);
        $arbitro->nombre_guerra = $request->get('nombre_guerra');
        $arbitro->telefono = $request->get('telefono');

        $arbitro->save();

        return redirect('/admin/arbitros');
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
