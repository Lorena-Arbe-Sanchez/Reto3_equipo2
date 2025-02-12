@extends('layouts.public')
@section('content')
    <div class="row mx-3 mt-4">
        <div class="col">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h3>Crear actividad</h3>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col d-flex justify-content-center">
                    <form action="{{ route('administrador.crearAdministrador') }}" method="POST">
                        @csrf
                        <label for="usuario">Usuario:</label>
                        <input type="text" id="usuario" name="usuario" required>

                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" required>

                        <button type="submit">Crear Administrador</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

</div>
</body>
</html>
