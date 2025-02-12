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
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
</head>
<body id="login">

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="login-form card p-4 shadow-lg w-50">
        <div class="text-center mb-4">
            <h1>Iniciar Sesión</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <form action="{{ route('administrador.login') }}" method="POST">
            @csrf

            <div class="mb-3 row">
                <div class="col-12">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" value="{{ old('usuario') }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-12">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>

            <div class="row button-container text-center">
                <div class="col-12">
                    <button type="submit" class="btn text-white w-100">Acceder</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
