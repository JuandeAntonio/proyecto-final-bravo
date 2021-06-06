@inject('equipos', 'App\Http\Controllers\EquiposController')
@inject('ligas', 'App\Http\Controllers\LigasController')
@extends('adminlte::page')

@section('title', 'Dashboard')


<!--AQUÍ ES DONDE SE MUESTRA EL COTENIDO DE LA PAGINA -->
@section('content')
<table id="example" class="display text-center">
                <thead>
                    <tr>
                        <th>Liga</th>
                        <th>Jornada</th>
                        <th>Local</th>
                        <th>Visitante</th>
                        <th>Sets Local</th>
                        <th>Sets Visitante</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Arbitro</th>
                        <th>Editar</th>
                        
                    </tr>
                </thead>
                <tbody>
                @foreach ($partidos as $partido)
                    <tr>
                        <td>{{($ligas->nombre_liga($partido->liga_id))[0]->nombre}}</td>
                        <td>{{$partido->jornada}}</td>
                        <td>{{($equipos->nombre_equipo($partido->equipo_local_id))[0]->nombre}}</td>
                        <td>{{($equipos->nombre_equipo($partido->equipo_visitante_id))[0]->nombre}}</td>
                        <td>{{$partido->sets_equipo_local}}</td>
                        <td>{{$partido->sets_equipo_visitante}}</td>
                        <td>{{$partido->fecha_partido}}</td>
                        <td>{{$partido->hora_partido}}</td>
                        <td>{{$partido->arbitros_id}}</td>
                        <td>
                            <a href="partidos/{{$partido->id}}/edit" class="btn btn-info">Editar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>               
 </table>  


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> 

<script>

$(document).ready(function(){
    var table = $('#example').DataTable({
       orderCellsTop: true,
       fixedHeader: true
       //scrollY: 480,
    });

    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#example thead tr').clone(true).appendTo( '#example thead' );

    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html( '<input type="text" placeholder="Search..." />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );   
});

</script>

@stop