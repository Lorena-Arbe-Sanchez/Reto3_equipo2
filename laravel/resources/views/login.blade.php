<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style/styles.css') }}">
</head>
<body>

<div class="login-container container-fluid vh-100 d-flex justify-content-center align-items-center">

    <div class="card shadow-lg">
        <div class="card-body p-5">
            <h2 class="card-title text-center mb-4">Iniciar Sesión</h2>
            <form id="loginForm" action="{{ route('administrador.login') }}" method="POST">

                <!-- Agregar un campo oculto con un token de seguridad. -->
                @csrf

                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" value="{{ old('usuario') }}" autocomplete="username" >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" >
                </div>
                <button type="submit" class="btn btn-success w-100">Acceder</button>

            </form>
        </div>
    </div>

</div>

<button id="darkModeToggle" class="btn btn-dark position-fixed top-0 end-0 m-3">
    <i class="bi bi-moon-fill"></i>
</button>

<!-- Mensaje entrante de error. -->
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div id="notification" class="notification">{{ $error }}</div>
    @endforeach
@endif

</body>
@vite(['resources/js/validarUsuario.js'])

@vite(['resources/js/login.js'])

</body>

</html>
