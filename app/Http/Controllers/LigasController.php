<?php

namespace App\Http\Controllers;

use App\Models\Liga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LigasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ligas = Liga::all();
        return view('admin.liga.index')->with('ligas',$ligas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.liga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ligas = new Liga();
        $ligas->nombre = $request->get('nombre');
        $ligas->categoria = $request->get('categoria');

        $ligas->save();

        return redirect('/admin/ligas');
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
        $liga = Liga::find($id);
        return view ('admin.liga.edit')->with('liga',$liga);
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
        $liga = Liga::find($id);
        $liga->nombre = $request->get('nombre');
        $liga->categoria = $request->get('categoria');
        $liga->save();

        return redirect('/admin/ligas');
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
    public static function nombre_liga($liga_id){
        $var = DB::select('select nombre from ligas where id = '.$liga_id.';');
        return $var;
    }

    public static function nombres_liga(){
        $nom_liga = Liga::all();
        return $nom_liga;
    }
}
