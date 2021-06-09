@inject('partido', 'App\Http\Controllers\PartidosController')
use \App\Http\Controllers\PartidosController;
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">LIGAS DE VOLEIBOL</h1>
@stop

<!--AQUÍ ES DONDE SE MUESTRA EL COTENIDO DE LA PAGINA -->
@section('content')
    
    <a href="ligas/create" class="btn btn-warning">CREAR NUEVA LIGA</a>
    <table class="table table-light table-striped text-center mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoria</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ligas as $liga)
                <tr>
                    <td>{{$liga->id}}</td>
                    <td>{{$liga->nombre}}</td>
                    <td>{{$liga->categoria}}</td>
                    <td>
                        <form action="{{route('admin.ligas.destroy',$liga->id)}}" method="POST">
                            <a href="ligas/{{$liga->id}}/edit" class="btn btn-info">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Borrar</button>
                        </form>
                        <form action="{{route('admin.generarpartido',$liga->id)}}" method="POST">
                            @csrf
                            <input type="number" hidden value="{{$liga->id}}" name="liga_id" />
                            <button type="submit" class="btn btn-success">Crear partidos</button> 
                        </form>
                    </td>
                </tr>
            @endforeach
            @isset($mensaje)
            <h3 class="text-center text-info">{{$mensaje}}</h3>
        @endisset
        </tbody>    
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
        //PASAR EL VALOR DE LA LIGA POR PARAMETRO
        //LLAMAR A LA FUNCIÓN DEL CONTROLADOR Y PASARLE EL PARAMETRO
        //ASINCRONIA, CALLBACK?
        //RESPONSE
        function generar_partidos(){
            alert('Hello');

        }

        $.ajax({
            method: "POST",
            url: "admin/ligas",
            data: {}
        })
        .done(function( response ) {
        alert(response);
        });

        $.ajax({
            type: "POST",
            url: '\app\Http\Controllers\PartidosController.php',
            data: $(this).serialize(),
            success: function(response)
            {
                alert(respone)
            }
       });
    </script>
@stop