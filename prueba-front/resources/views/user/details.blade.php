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
                <div class="row">
                    <div class="col">
                        <div class="card text-center mx-auto" style="width: 18rem;">
                            <img src="{{ $user['avatar_url'] }}" class="card-img-top" alt="{{ $user['login'] }}">
                            <div class="card-body">
                                <h3 class="card-title">{{ $user['login'] }}</h3>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam obcaecati dolorem fugit rerum! Temporibus ipsam voluptatum nulla at provident cupiditate maiores modi nobis quae blanditiis, ex nisi harum magnam impedit.</p>
                                <p>
                                    <a href="{{ $user['html_url'] }}" class="text-decoration-none text-dark" target="_blank" rel="noopener noreferrer"><i class="fas fa-user"></i></a> 
                                    <a href="{{ $user['twitter_username'] }}" class="text-decoration-none text-dark" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-twitter"></i></a> 
                                    <a href="{{ $user['company'] }}" class="text-decoration-none text-dark" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-industry"></i></a> 
                                </p>
                                <a href="/" class="btn btn-primary m-2">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
