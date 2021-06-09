@inject('liga', 'App\Http\Controllers\LigasController')
@inject('equipo', 'App\Http\Controllers\EquiposController')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	.marcadores{font-size:15em;width:270px;height:300px;background-color:#212529;color:#198754;text-align: center;}
	.fa-plus, .fa-minus{font-size:5em;}
	.fa-greater-than, .fa-less-than{font-size:3em;}
	.separador{font-size:15em;}
	.marcadores_sets{font-size:5em;width:50px;height:80px;background-color:#212529;color:#dc3545;}
	</style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
  	<form action="/admin/asignaciones/{{$asignacion->id}}" method="POST">
    @csrf
    @method('PUT')
		<div class="container-fluid bg-dark text-center text-white">
			<div class="row pt-1">
				<div class="col-12"><h2>{{($liga->nombre_liga($asignacion->liga_id))[0]->nombre}}</h2></div>
			</div>
			<div class="row">
				<div class="col-5 text-info"><h1>{{($equipo->nombre_equipo($asignacion->equipo_local_id))[0]->nombre}}</h1></div>
				<div class="col-2"><h1>VS</h1></div>
				<div class="col-5 text-info"><h1>{{($equipo->nombre_equipo($asignacion->equipo_visitante_id))[0]->nombre}}</h1></div>
			</div>
			<div class="row">
				<div class="col-12">{{$asignacion->fecha_partido}}</div>
			</div>
			<div class="row text-center">
				<div class="col-12">{{$asignacion->hora_partido}}</div>
			</div>
			<div class="row">
				<div class="col-3">
					@foreach($jugadores_locales as $jugador_l)
					<div class="row"><h4>{{$jugador_l->nombre}}</h4></div>
					@endforeach
				</div>
				<div class="col-6">
					<div class="row">
						<div class="col-4"></div>
						<div class="col-2 border border-dark text-danger"><input type="text" id="marcador_set_local" readonly="readonly" name="marcador_set_local"  class="marcadores_sets" value="0"></div>
						<div class="col-2 border border-dark text-danger"><input type="text" id="marcador_set_visitante" readonly="readonly" name="marcador_set_visitante"  class="marcadores_sets" value="0"></div>
						<div class="col-4"></div>
					</div>
					<div class="row">
						<div class="col-5 text-success"><input type="text" id="marcador_local" readonly="readonly" name="marcador_local" class="marcadores" value="0"></div>
						<div class="col-2"><p class="separador">-</p></div>
						<div class="col-5 text-success"><input type="text" id="marcador_visitante" readonly="readonly" name="marcador_visitante" class="marcadores" value="0"></div>
					</div>
				</div>
				<div class="col-3">
					@foreach($jugadores_visitantes as $jugador_v)
					<div class="row"><h4>{{$jugador_v->nombre}}</h4></div>
					@endforeach
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<div class="row">
						<div class="col-6" onclick="maslocal()" ><i class="fas fa-plus text-success"></i></div>
						<div class="col-6" onclick="menoslocal()" ><i class="fas fa-minus text-danger menoslocal"></i></div>
					</div>
				</div>
				<div class="col-2">
					<div class="row">
							<div class="col-6" onclick="massetslocal()"><i class="fas fa-less-than text-danger"></i></div>
							<div class="col-6" onclick="menossetslocal()"><i class="fas fa-greater-than text-success" ></i></div>
					</div>
				</div>
				<div class="col-2">
					<div class="row">
							<div class="col-6" onclick="massetsvisitante()" ><i class="fas fa-less-than text-danger"></i></div>
							<div class="col-6" onclick="menossetsvisitante()" ><i class="fas fa-greater-than text-success"></i></div>
					</div>
				</div>
				<div class="col-4">
					<div class="row">
							<div class="col-6" onclick="masvistante()"><i class="fas fa-plus text-success"></i></div>
							<div class="col-6" onclick="menosvisitante()"><i class="fas fa-minus text-danger"></i></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-2 offset-5">
					<button type="submit" class="btn btn-primary" tabindex="3">TERMINAR PARTIDO</button>
				</div>
			</div>
		</div>
	</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script>
		function maslocal(){document.getElementById("marcador_local").value++;}
		function menoslocal(){document.getElementById("marcador_local").value--;}
		function massetslocal(){document.getElementById("marcador_set_local").value++;}
		function menossetslocal(){document.getElementById("marcador_set_local").value--;}
		function masvistante(){document.getElementById("marcador_visitante").value++;}
		function menosvisitante(){document.getElementById("marcador_visitante").value--;}
		function massetsvisitante(){document.getElementById("marcador_set_visitante").value++;}
		function menossetsvisitante(){document.getElementById("marcador_set_visitante").value--;}
	</script>
  </body>
</html>