@inject('ligas', 'App\Http\Controllers\LigasController')

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            @media (max-width: 600px) {
            #cajafondo{background-image:none;}            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <title>Clasificaciones</title>
    </head>
    <!-- PLANTILLA PARA LA PAGINA PRINCIPAL DE TODOS LOS USUARIOS-->
    <body>
        <div class="container-fluid">
            <div class="row min-vh-100 flex-column flex-md-row">
                <aside class="col-12 col-md-3 col-xl-2 p-0 bg-dark flex-shrink-1">
                    <!-- MENÚ LATERAL-->
                    <nav class="navbar navbar-expand-md navbar-dark db-dark flex-md-column flex-row align-items-center py-2 text-center sticky-top" id="sidebar">
                        <div class="text-center p-3">
                            <img src="{{URL::asset('/img/volei.png')}}" alt="web picture" class="img-fluid my-3 ml-3 d-none d-md-block shadow" height="120" width="120">
                            <a href="/welcome" class="navbar-brand mx-o font-weight-bold text-nowrap">TodoVoleibol</a>
                        </div>
                        <button type="button" class="navbar-toggler border-0 order-1" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse order-2" id="nav">
                            <ul class="navbar-nav flex-column w-100 justify-content-center">
                            <!--LAS LIGAS QUE YA HAN COMENZADO-->
                                @foreach ($ligas->ligas_funcionando() as $nom)
                                    <li class="nav-item">
                                        <a href="/clasificaciones/{{$nom->nombre}}" class="nav-link active">{{$nom->nombre}}</a> 
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <ul class="nav justify-content-center order-last">
                            <li class="nav-item">
                                <a href="#" class="nav-link text-white"><i class="fab fa-twitter-square fa-lg"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-white"><i class="fab fa-instagram fa-lg"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-white"><i class="fab fa-facebook-square fa-lg"></i></a>
                            </li>
                        </ul>
                    </nav>
                </aside>
                <main class="col px-0 bg-dark">
                    <div class="container-fluid">
                        <div class="col-12">
                            <div class="d-flex justify-content-end text-white">
                                @if (Route::has('login'))
                                    <div class="">
                                        @auth
                                            <a href="{{ url('/admin') }}" class="text-muted">Admin</a>
                                        @else
                                            <a href="{{ route('login') }}" class="text-muted">Log in</a>

                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @yield('tablaClasificacion')
                </main>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    </body>
</html>
