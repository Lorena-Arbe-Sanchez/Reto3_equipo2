@extends('layouts.public')
@section('content')

    <div class="row mx-3 mt-4">
        <div class="col">

            <div class="row">
                <form action="{{ route('centros.listCentros') }}" method="GET">
                    <button type="submit" class="btn btn-success">Volver</button>
                </form>
            </div>

            <div class="row">
                <div class="col mt-4 mb-5">
                    <h3>Apúntate a las actividades:</h3>
                </div>
            </div>

            <!--Filtros-->

            <div class="row mb-4">
                <div class="col-md-3"> <!-- Columna para Centro Civico -->
                    <div class="form-group d-flex flex-direction-row align-items-center gap-2">
                        <label for="centro_civico">Centros</label>
                        <select class="form-select" id="centro_civico">
                            <option value="">Todos</option>

                            @foreach ($centroCivicos as $centro)
                                <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3"> <!-- Columna para Edad -->
                    <div class="form-group d-flex flex-direction-row align-items-center gap-2">
                        <label for="edad">Edad</label>
                        <input type="text" class="form-control" id="edad">
                    </div>
                </div>

                <div class="col-md-3"> <!-- Columna para Idioma -->
                    <div class="form-group d-flex flex-direction-row align-items-center gap-2">
                        <label for="idioma">Idioma</label>
                        <select class="form-select" id="idioma">
                            <option value="todos">Todos</option>
                            <option value="espanol">Español</option>
                            <option value="euskera">Euskera</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3"> <!-- Columna para Horario -->
                    <div class="form-group d-flex flex-direction-row align-items-center gap-2">
                        <label for="horario">Horario</label>
                        <input type="text" class="form-control" id="horario">
                    </div>
                </div>
            </div>

            <!--Lista de actividades-->
            <div class="row mt-2">
                @forelse ($actividades as $actividad)
                    <div class="col-lg-3 col-md-4 mt-2 d-flex justify-content-center">
                        <div class="card d-flex flex-column h-100 text-center">
                            <img class="card-img-top img-fluid" style="height: 200px; object-fit: cover;"
                                 src="{{ $actividad->imagen ? asset('storage/' . $actividad->imagen) : asset('storage/' . 'actividades/pintura.png') }}"
                                 alt="Imagen {{ $actividad->titulo }}">
                            <div class="card-body d-flex flex-column flex-grow-1">
                                <h5 class="card-title">{{ $actividad->titulo }}</h5>
                                <p class="card-text">{{ $actividad->descripcion }}</p>
                                <a href="#" class="btn btn-success mt-auto w-100 mx-auto" data-bs-toggle="modal"
                                   data-bs-target="#apuntarseModal" data-actividad="{{ json_encode($actividad) }}">
                                    Más información</a>
                                @if(Auth::check())
                                    <form action="{{ route('actividad.delete') }}" method="POST" class="my-1 w-100">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $actividad->id }}">
                                        <button type="submit" class="btn btn-danger btn-destacado w-100 text-white">Borrar</button>
                                    </form>

                                    <a href="{{ route('actividad.edit', ['id' => $actividad->id]) }}"
                                       class="btn btn-editar text-white w-100">Editar</a>
                                @endif
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{{ "Plazas disponibles: ". $actividad->plazas_disponibles ." de ". $actividad->plazas_totales }}</small>
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
                            <p><b>Actividad: </b><span id="modal-actividad-titulo"></span></p>
                            <p><b>Descripción: </b><span id="modal-actividad-descripcion"></span></p>
                            <p><b>Idioma: </b><span id="modal-actividad-idioma"></span></p>
                            <p><b>Horario: </b><span id="modal-actividad-horario"></span></p>
                            <p><b>Plazas Libres: </b><span id="modal-actividad-plazas"></span></p>
                            <p><b>Edades: </b><span id="modal-actividad-edades"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="confirmarApuntarse">Inscribirse</button>
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
                            <p>¿Quieres inscribirte en esta actividad?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <!-- TODO : Que cree una fila en 'inscripciones' y que actualice el valor de 'plazas_disponibles'... -->
                            <button type="button" class="btn btn-primary" id="confirmarConfirmacion">Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>

                document.addEventListener('DOMContentLoaded', function() {
                    const apuntarseButtons = document.querySelectorAll('[data-bs-toggle="modal"]');

                    apuntarseButtons.forEach(button => {
                        button.addEventListener('click', function(event) {
                            event.preventDefault();

                            const actividadData = JSON.parse(this.dataset.actividad);

                            // Actualizar el contenido del modal con los datos de la actividad
                            document.getElementById('modal-actividad-titulo').textContent = actividadData.titulo;
                            document.getElementById('modal-actividad-descripcion').textContent = actividadData.descripcion;
                            document.getElementById('modal-actividad-idioma').textContent = actividadData.idioma;
                            document.getElementById('modal-actividad-horario').textContent = `${actividadData.hora_inicio} - ${actividadData.hora_fin}`;
                            document.getElementById('modal-actividad-plazas').textContent = `${actividadData.plazas_disponibles}/${actividadData.plazas_totales}`;
                            const edadMaxima = actividadData.edad_maxima === null ? "∞" : actividadData.edad_maxima;
                            document.getElementById('modal-actividad-edades').textContent = `${actividadData.edad_minima} - ${edadMaxima}`;

                            // Actualizar la imagen del modal con la de la actividad seleccionada
                            const modalImagen = document.getElementById('modal-actividad-imagen');
                            modalImagen.src = actividadData.imagen ? `/storage/${actividadData.imagen}` : `/storage/actividades/pintura.png`;
                            modalImagen.alt = `Imagen de ${actividadData.titulo}`;

                            // Evento del botón "Inscribirse" en el primer modal
                            const confirmarApuntarseBtn = document.querySelector('#confirmarApuntarse');
                            confirmarApuntarseBtn.addEventListener('click', () => {
                                // Mostrar el segundo modal (de la inscripción)
                                var inscripcionModal = new bootstrap.Modal(document.getElementById('inscripcionFormModal'));
                                inscripcionModal.show();
                            });
                        });
                    });
                });

            </script>

        </div>
    </div>

    @endsection

    </div>
    </body>
    </html>
