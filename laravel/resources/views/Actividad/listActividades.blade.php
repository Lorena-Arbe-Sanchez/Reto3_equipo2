@extends('layouts.public')

@section('title', 'Lista de Actividades')

@section('content')

    <div class="row mx-3 my-4">
        <div class="col">

            <div class="row">
                <div class="col mt-4 mb-5">
                    <h3>Apúntate a las actividades</h3>
                </div>
            </div>

            <!--Filtros-->

            <form id="filtroForm" method="GET" action="{{ route('actividad.showActividades') }}">

                <div class="row mb-5 g-2 d-flex flex-wrap align-items-center gap-4">

                    <!-- Columna para Centro Civico -->
                    <div class="col-xl-2 col-md-4 col-sm-7">
                        <div class="form-group d-flex flex-direction-row align-items-center gap-3">
                            <label for="centro_civico">Centros:</label>
                            <select class="form-select" id="centro_civico" name="centro_civico">
                                <option value="" {{ request('centro_civico') == null ? 'selected' : '' }}>Todos</option>

                                @foreach ($centroCivicos as $centro)
                                    <option value="{{ $centro->id }}" {{ (request('centro_civico') == $centro->id ||
                                        (isset($centroSeleccionado) && $centroSeleccionado == $centro->id)) ? 'selected' : '' }}>
                                        {{ $centro->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Columna para Edad -->
                    <div class="col-xl-1 col-md-4 col-sm-7">
                        <div class="form-group d-flex flex-direction-row align-items-center gap-3">
                            <label for="edad">Edad:</label>
                            <input type="text" class="form-control" id="edad" name="edad" value="{{ request('edad') }}">
                        </div>
                    </div>

                    <!-- Columna para Idioma -->
                    <div class="col-xl-auto col-md-4 col-sm-7">
                        <div class="form-group d-flex flex-direction-row align-items-center gap-3">
                            <label for="idioma">Idioma:</label>
                            <select class="form-select" id="idioma" name="idioma">
                                <option value="todos">Todos</option>
                                <option value="espanol">Español</option>
                                <option value="euskera">Euskera</option>
                                <option value="ingles">Inglés</option>
                            </select>
                        </div>
                    </div>

                    <!-- Columna para Horario -->
                    <div class="col-xl-1 col-md-4 col-sm-7">
                        <div class="form-group d-flex flex-direction-row align-items-center gap-3">
                            <label for="horario">Hora:</label>
                            <input type="text" class="form-control" id="horario" name="horario" value="{{ request('horario') }}">
                        </div>
                    </div>

                    <!-- Buscador de palabras concretas (en títulos y descripciones de actividades) y botón de aplicar todos los filtros -->

                    <div class="col-xl-auto col-md-5 col-sm-7">
                        <div class="form-group d-flex align-items-center gap-3">
                            <label for="textoBusqueda">Búsqueda:</label>
                            <input type="text" class="form-control" id="textoBusqueda" name="textoBusqueda" value="{{ request('textoBusqueda') }}"placeholder="Título o descripción">
                        </div>
                    </div>

                    <div class="col-auto col-sm-auto">
                        <button type="submit" class="btn btn-secundario btn-success w-100" id="aplicarFiltrosBtn">Aplicar filtros</button>
                    </div>

                    <div class="col-auto col-sm-auto">
                        <button type="submit" class="btn btn-secundario btn-success w-100" id="resetearFiltrosBtn">Resetear filtros</button>
                    </div>

                </div>

            </form>

            <div class="row">
                <div class="col">
                    @if($actividadesTotales == 1)
                        <p>Se ha encontrado <b>1</b> actividad con los criterios anteriores.</p>
                    @else
                        <p>Se han encontrado <b>{{ $actividadesTotales }}</b> actividades con los criterios anteriores.</p>
                    @endif
                </div>
            </div>

            <!-- TODO : Ponerlo como mensaje lateral -->
            @if ($errors->any())
                <div class="alert alert-danger" id="danger-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- TODO : Ponerlo como mensaje lateral -->
            @if(session('success'))
                <div class="alert alert-success" id="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <!--Lista de actividades-->
            <div class="row pt-5" id="actividadesContainer">
                @forelse ($actividades as $actividad)
                    <div class="col-lg-3 col-md-4 my-4 px-4 d-flex justify-content-center">
                        <div class="card d-flex flex-column h-100 text-center">
                            <img class="card-img-top img-fluid" style="height: 200px; object-fit: cover;"
                                 src="{{ $actividad->imagen ? asset('storage/' . $actividad->imagen) :
                                    asset('storage/' . 'actividades/default.jpg') }}"
                                 alt="Imagen {{ $actividad->titulo }}">
                            <div class="card-body d-flex flex-column flex-grow-1">
                                <h5 class="card-title">{{ $actividad->titulo }}</h5>
                                <p class="card-text">{{ $actividad->descripcion }}</p>
                                @if(!Auth::check())
                                    <a href="#" class="btn btn-success mt-auto w-100 mx-auto" data-bs-toggle="modal"
                                       data-bs-target="#apuntarseModal" data-actividad="{{ json_encode($actividad) }}">
                                        Más información
                                    </a>
                                @endif
                                @if(Auth::check())
                                    <div class="d-flex gap-2 mt-auto">
                                        <form action="{{ route('actividad.destroy') }}" method="POST" class="w-50 m-0">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $actividad->id }}">
                                            <button type="submit" class="btn btn-danger btn-destacado text-white w-100">
                                                Eliminar
                                            </button>
                                        </form>

                                        <a href="{{ route('actividad.edit', ['id' => $actividad->id]) }}"
                                           class="btn btn-primary btn-editar text-white w-50">
                                            Editar
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer">
                                <small class="text-muted plazas-disponibles">
                                    Plazas disponibles: <b>{{ $actividad->plazas_disponibles }}</b> de
                                    {{ $actividad->plazas_totales }}
                                </small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <p>No se encontraron actividades.</p>
                    </div>
                @endforelse
            </div>

            <div class="modal fade" id="apuntarseModal" tabindex="-1" aria-labelledby="apuntarseModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="apuntarseModalLabel">Datos de la actividad</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img class="img-thumbnail mb-5" id="modal-actividad-imagen"
                                 src="" alt="Imagen de la actividad">
                            <span id="modal-actividad-id" style="visibility: hidden"></span>
                            <p><b>Actividad: </b><span id="modal-actividad-titulo"></span></p>
                            <p><b>Descripción: </b><span id="modal-actividad-descripcion"></span></p>
                            <p><b>Idioma: </b><span id="modal-actividad-idioma"></span></p>
                            <p><b>Horario: </b><span id="modal-actividad-horario"></span></p>
                            <p><b>Plazas libres: </b><span id="modal-actividad-plazas"></span></p>
                            <p><b>Edades: </b><span id="modal-actividad-edades"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-secundario" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary btn-editar text-white" id="confirmarApuntarse">Inscribirme</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Segundo Modal para la inscripción -->
            <div class="modal fade" id="inscripcionFormModal" tabindex="-1" aria-labelledby="inscripcionFormModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="inscripcionFormModalLabel">Confirmación de Inscripción</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route("inscripcion.store") }}" method="POST">
                                @csrf
                                @method('POST')

                                <p>¿Quieres inscribirte en esta actividad?</p>

                                <div class="mt-3" id="contenedorDni" style="visibility: hidden;">
                                    <label for="casillaDni" class="form-label">
                                        <i>Escribe tu código de la TMC para poder completar la inscripción</i>
                                    </label>
                                    <input type="text" class="form-control" id="casillaDni" name="casillaDni" placeholder="DNI" value="{{ old('casillaDni') }}">
                                </div>

                                <!-- Poner como valor el id de la actividad, obtenido del "modal-actividad-id" anterior. -->
                                <input type="hidden" name="id_actividad" value="">
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-secundario" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary btn-editar text-white" id="confirmarConfirmacion">Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="footer mt-5 pt-4 border-top text-center">
        <p class="text-muted">© 2025 All rights reserved</p>
    </div>

    @endsection

    </div>
    </body>

    @vite(['resources/js/listActividades.js'])

    </html>
