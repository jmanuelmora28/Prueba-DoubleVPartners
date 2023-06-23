<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prueba Front End # 1</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="jumbotron">
        <section class="jumbotron text-center">
            <div class="container">
                <h1>Prueba Front End # 1</h1>
                <form action="#" method="get">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="user" name="user" aria-describedby="userHelp">
                        <small id="userHelp" class="form-text text-muted">Ingrese el texto a buscar</small>
                    </div>
                    <p>
                        <button type="submit" class="btn btn-primary my-2">BUSCAR</button>
                    </p>
                </form>
            </div>
        </section>
        <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <div class="card bg-light mb-3">
                        <div class="card-header">
                            Listado de Usuarios
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                @foreach($users as $user)
                                    <div class="col-sm-4 mb-2">
                                        <div class="card">
                                            <h3 class="card-title text-center pt-3"><i class="fas fa-user"></i></h3>                                            
                                            <h5 class="card-title text-center">{{ $user['login'] }}</h5>
                                            <p class="card-text text-center">id: {{ $user['id'] }}</p>
                                            <a href="/detalles/{{ $user['login'] }}" class="btn btn-primary m-2">Ver Usuario</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>                    
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card bg-light mb-3">
                        <div class="card-header">
                            GRAFICO
                        </div>
                        <div class="card-body">
                            <canvas id="graphic" width="400" height="200"></canvas>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
        @php

            $follower = json_decode($followers, true);
            $follower_string = '["' . implode('", "', $follower) . '"]';

        @endphp
        </section>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $( document ).ready(function() {
                const followers = <?php echo '["' . implode('", "', $follower) . '"]' ?>;
                const ctx = document.getElementById('graphic');

                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: followers,
                        datasets: [{
                            data: {{ $followers_total }},
                            // label: users,
                            backgroundColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                        legend: {
                            position: 'none',
                        },
                        title: {
                            display: true,
                            text: 'SEGUIDORES POR USUARIO'
                        }
                        }
                    }
                });
                
                $( "#user" ).on( "change", function() {
                    const user = $( "#user" ).val();
                    if(user.length < 4){

                        Swal.fire({
                            title: 'Error!',
                            text: 'El número minimo de caracteres para buscar es de 4.',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });

                        $( "#user" ).val('');

                    }else if(user === "doublevpartners"){

                        Swal.fire({
                            title: 'Error!',
                            text: 'Palabra no permitida para busqueda.',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });

                        $( "#user" ).val('');

                    }

                } );
            });
        </script>
    </body>
</html>
