<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="{{URL('css/app.css')}}">
    <link rel="stylesheet" href="{{URL('css/master.css')}}">

    @yield('head')
</head>

<body>

    <div class="brand-bar row">
        <img src="{{URL('/images/pepe.png')}}" alt="pepe" class="pepe col-2">
        <h1 class="brand-title col-6">MEMEPEDIA</h1>
        <img src="{{URL('/images/pepe.png')}}" alt="pepe" class="pepe col-2">
    </div>

    <nav class="navbar row">
        <a class="navbar-item col-3" href="{{route('index')}}">Inicio</a>
        <a class="navbar-item col-3" href="{{route('crear-meme')}}">Crear Meme</a>
        <a class="navbar-item col-3" href="{{route('tierlist')}}">TierList</a>
        <a class="navbar-item col-3" href="{{route('ranking')}}">Ranking</a>
    </nav>

    <div class="content row mb-4">
        @yield('content')
    </div>

    <footer class="footer row mt-3">
        <p>Política de privacidad | Acerca de | Contacto</p>
        <hr>
        <p>Carr. de San Vicente del Raspeig, s/n, 03690 San Vicente del Raspeig, Alicante</p>
        <p>D-SSarrolladores</p>
    </footer>

</body>

</html>