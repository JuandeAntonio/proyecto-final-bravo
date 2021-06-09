@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>EDITAR INFORMACION EQUIPO</h1>
@stop

<!--AQUÍ ES DONDE SE MUESTRA EL COTENIDO DE LA PAGINA -->
@section('content')
    <form action="/admin/equipos/{{$equipo->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$equipo->nombre}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{$equipo->direccion}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{$equipo->telefono}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Liga ID</label>
            <input type="text" class="form-control" id="liga_id" name="liga_id" value="{{$equipo->liga_id}}">
        </div>
        <a href="/admin/equipos" class="btn btn-secondary" tabindex="4">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

@stop