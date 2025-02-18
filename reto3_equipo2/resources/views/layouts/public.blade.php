@php
    use Illuminate\Support\Facades\Auth;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Centros cívicos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style/styles.css') }}">
</head>

<body>

<div class="container-fluid">

    <nav class="navbar navbar-expand-lg navbar-light border-bottom mb-5">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="img-fluid" id="imagenLogo" src="{{ asset('storage/' . 'logos/ayuntamiento_logo.png') }}"
                 alt="Ayuntamiento de Vitoria-Gasteiz">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarNav">
            <ul class="navbar-nav d-flex align-items-center">
                @if(Auth::check())
                    <li class="nav-item mx-2 d-flex align-items-center">
                        <form action="{{ route('administrador.logout') }}" method="POST" class="m-0 d-flex align-items-center">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-destacado" id="botonCerrarSesion">
                                <img class="img-fluid" id="imagenCerrarSesion"
                                     src="{{ asset('storage/' . 'iconos/cerrar_sesion.png') }}" alt="Cerrar sesión">
                            </button>
                        </form>
                    </li>
                @endif
                <li class="nav-item mx-2">
                    <a class="btn btn-success" href="{{ route('login') }}">
                        @guest
                            Conectarse
                        @else
                            Cambiar de cuenta
                        @endguest
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <div class="d-flex align-items-center">
                        <a class="nav-link px-2" href="#">ES</a>
                        <span class="nav-link px-1">|</span>
                        <a class="nav-link px-2" href="#">EU</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Bootstrap JS (para funcionalidades JS de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@yield('content')
