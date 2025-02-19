@extends('layouts.public')

@section('title', 'Lista de Inscripciones')

@section('content')

    <div class="row mx-3 mt-4">
        <div class="col">
            <div class="row">
                <form action="{{ route('centros.listCentros') }}" method="GET">
                    <button type="submit" class="btn btn-success btn-secundario">Volver</button>
                </form>
            </div>
            <div class="row mb-5">
                <div class="col d-flex justify-content-center">
                    <h3>Lista de personas inscritas</h3>
                </div>
            </div>

            <!--Filtros-->
            <div class="row py-4" id="centradoInscripciones">
                <div class="col">
                    <form action="{{ route('inscripcion.show') }}" method="GET" class="row gy-3 gx-3 align-items-center">
                        <div class="col-sm-auto">
                            <label for="centro_civico" class="col-form-label">Centro civico:</label>
                        </div>
                        <div class="col-sm-auto">
                            <select class="form-select" id="centro_civico" name="centro_civico">
                                <option value="">Todos</option>
                                @foreach ($centroCivicos as $centro)
                                    <option value="{{ $centro->id }}" {{ request('centro_civico') == $centro->id ? 'selected' : '' }}>
                                        {{ $centro->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-auto">
                            <label for="actividad" class="col-form-label">Actividad:</label>
                        </div>
                        <div class="col-sm-auto">
                            <select class="form-select" id="actividad" name="actividad">
                                <option value="">Todas</option>
                                @foreach ($actividades as $actividad)
                                    <option value="{{ $actividad->id }}" {{ request('actividad') == $actividad->id ? 'selected' : '' }}>
                                        {{ $actividad->titulo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-auto">
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row py-4" id="centradoInscripciones">
                <div class="col">
                    @if($inscripcionesTotales == 1)
                        <p>Se ha encontrado <b>1</b> inscripción con los criterios anteriores.</p>
                    @else
                        <p>Se han encontrado <b>{{ $inscripcionesTotales }}</b> inscripciones con los criterios anteriores.</p>
                    @endif
                </div>
            </div>

            <!--Lista de inscripciones-->
            <div class="row mt-2 w-75 mx-auto border rounded px-2 pb-2">
                @if($inscripciones->isEmpty())
                    <p class="mt-3">No hay inscripciones.</p>
                @else
                    <div class="col-12 mt-2 d-flex justify-content-around align-items-center border-bottom">
                        <strong class="col-2 my-2">Centro cívico</strong>
                        <strong class="col-2 my-2">Actividad</strong>
                        <strong class="col-2 my-2">Nombre</strong>
                        <strong class="col-2 my-2">Apellidos</strong>
                        <strong class="col-2 my-2">DNI</strong>
                        <!--Este vacío es para que los otros tres ocupen el espacio necesario-->
                        <strong class="col-2 my-2"></strong>
                    </div>
                    @foreach($inscripciones as $inscripcion)
                        <div class="col-12 mt-2 d-flex justify-content-around align-items-center border-bottom">
                            <p class="col-2 my-2">{{ $inscripcion->actividad->centroCivico->nombre}}</p>
                            <p class="col-2 my-2">{{ $inscripcion->actividad->titulo }}</p>
                            <p class="col-2 my-2">{{ $inscripcion->ciudadano->nombre }}</p>
                            <p class="col-2 my-2">{{ $inscripcion->ciudadano->apellidos }}</p>
                            <p class="col-2 my-2">{{ $inscripcion->ciudadano->dni }}</p>

                            <!-- TODO : Poner mensaje lateral -->
                            <form action="{{ route('inscripcion.destroy') }}" method="POST" class="col-2 my-2">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id_actividad" value="{{ $inscripcion->id_actividad }}">
                                <input type="hidden" name="id_ciudadano" value="{{ $inscripcion->id_ciudadano }}">
                                <button type="submit" class="btn btn-danger btn-destacado text-white">Eliminar inscripción</button>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>

            <!--Paginación-->
            <div class="d-flex justify-content-center mt-3">
                {{ $inscripciones->links() }}
            </div>
        </div>
    </div>

    <div class="footer mt-5 pt-4 border-top text-center">
        <p class="text-muted">© 2025 All rights reserved</p>
    </div>

@endsection

</div>
</body>

    @vite(['resources/js/listInscripciones.js'])

</html>
