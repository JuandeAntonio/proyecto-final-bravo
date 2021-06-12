<?php

namespace App\Http\Controllers;
use App\Models\Equipo;
use App\Models\Estadistica;

use Illuminate\Http\Request;

use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class EquiposController extends Controller
{
    
    use WithPagination;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::all();
        return view('admin.equipo.index')->with('equipos', $equipos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.equipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //EN EL REQUEST, VIENEN LOS DATOS QUE SE HAN ENVIADO DEL FORMULARIO, SE ASOCIAN AL MODELO Y SE GUARDAN
        $equipos = new Equipo();
        $equipos->nombre = $request->get('nombre');
        $equipos->direccion = $request->get('direccion');
        $equipos->telefono = $request->get('telefono');
        $equipos->liga_id = $request->get('liga_id');

        $equipos->save();
        //PARA QUE AL CREAR UN EQUIPO, SE CREEN SUS ESTADISTICAS CORRESPONDIENTES
        $estadisticasdelequipo = new Estadistica();
        $estadisticasdelequipo->partidos_ganados = 0;
        $estadisticasdelequipo->partidos_perdidos = 0;
        $estadisticasdelequipo->sets_ganados = 0;
        $estadisticasdelequipo->sets_perdidos = 0;
        $estadisticasdelequipo->puntos = 0;
        $telefono = $request->get('telefono');
        $id_equipocreado = Equipo::where('telefono', "=", $telefono)->get();
        $estadisticasdelequipo->equipo_id = $id_equipocreado[0]->id;

        $estadisticasdelequipo->save();

        return redirect('/admin/equipos');
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
        $equipo = Equipo::find($id);
        //CUANDO PULSAN EN EDIT, SE LES DEVUELVE OTRA VISTA A LA QUE HEMOS PASADO UNA VARIABLE CON EL EQUIPO CON ESA ID
        return view ('admin.equipo.edit')->with('equipo',$equipo);
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
        $equipo = Equipo::find($id);
        $equipo->nombre = $request->get('nombre');
        $equipo->direccion = $request->get('direccion');
        $equipo->telefono = $request->get('telefono');
        $equipo->liga_id = $request->get('liga_id');

        $equipo->save();

        return redirect('/admin/equipos');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id);
        $equipo->delete();
        return redirect('/admin/equipos');
    }

    //FUNCIONES DECLARADAS PARA SACAR EL NOMBRE DE LOS EQUIPOS
    public static function nombre_equipo($equipo_id){
        $var = DB::select('select nombre from equipos where id = '.$equipo_id.';');
        return $var;
    }
    public static function todos_equipos(){
        $equipos = Equipo::all();
        return $equipos;
    }
}
