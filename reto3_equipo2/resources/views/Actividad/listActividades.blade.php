@extends('layouts.public')
@section('content')

    <div class="row mx-3 mt-4">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h3>Apúntate a las actividades:</h3>
                </div>
            </div>

            <!--Filtros-->

            <div class="row">
                <div class="col-md-3"> <!-- Columna para Centro Civico -->
                    <form>
                        <div class="form-group d-flex flex-direction-row align-items-center gap-2">
                            <label for="centro_civico">Centros</label>
                            <select class="form-select" id="centro_civico">
                                <option value="">Todos</option>

                                @foreach ($centroCivicos as $centro)
                                    <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>

                <div class="col-md-3"> <!-- Columna para Edad -->
                    <form>
                        <div class="form-group d-flex flex-direction-row align-items-center gap-2">
                            <label for="edad">Edad</label>
                            <input type="text" class="form-control" id="edad">
                        </div>
                    </form>
                </div>

                <div class="col-md-3"> <!-- Columna para Idioma -->
                    <form>
                        <div class="form-group d-flex flex-direction-row align-items-center gap-2">
                            <label for="idioma">Idioma</label>
                            <select class="form-select" id="idioma">
                                <option value="todos">Todos</option>
                                <option value="espanol">Español</option>
                                <option value="euskera">Euskera</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="col-md-3"> <!-- Columna para Horario -->
                    <form>
                        <div class="form-group d-flex flex-direction-row align-items-center gap-2">
                            <label for="horario">Horario</label>
                            <input type="text" class="form-control" id="horario">
                        </div>
                    </form>
                </div>
            </div>

            <!--Lista de actividades-->
            <div class="row mt-2">
                @forelse ($actividades as $actividad)
                    <div class="col-12 mt-2 border rounded d-flex flex-direction-row justify-content-between align-items-center">
                        <p class="mt-2">{{ $actividad->titulo }}</p>
                        <p class="mt-2">{{ $actividad->descripcion }}</p>
                        <a href="#" class="btn btn-primary text-white my-2" data-bs-toggle="modal" data-bs-target="#apuntarseModal" data-actividad-id="{{ $actividad->id }}" data-actividad-titulo="{{ $actividad->titulo }}">Ver</a>
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
                            <h5 class="modal-title" id="apuntarseModalLabel">Confirmar Inscripción</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- TODO : Descomentar y corregir (obtener '$actividad'). -->
{{--                            <p>Actividad: <span id="modal-actividad-titulo"> {{$actividad->titulo}}</span></p>--}}
{{--                            <p>Descripción: <span id="modal-actividad-descripcion">{{$actividad->descripcion}}</span></p>--}}
{{--                            <p>Idioma: <span id="modal-actividad-idioma">{{$actividad->idioma}}</span></p>--}}
{{--                            <p>Horario: <span id="modal-actividad-horario"> {{$actividad->hora_inicio}} - {{$actividad->hora_fin}}</span></p>--}}
{{--                            <p>Plazas Libres: <span id="modal-actividad-plazas">{{$actividad->plazas_disponibles}}/{{$actividad->plazas_totales}}</span></p>--}}
{{--                            <p>Edades: <span id="modal-actividad-edades">{{$actividad->edad_minima}} - {{$actividad->edad_maxima}}</span></p>--}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="confirmarApuntarse">Inscribirse</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Modal for Inscription Form -->
            <div class="modal fade" id="inscripcionFormModal" tabindex="-1" aria-labelledby="inscripcionFormModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="inscripcionFormModalLabel">Formulario de Inscripción</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Replace this with your actual form HTML -->
                            <p>Contenido del formulario de inscripción aquí...</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>

            @endsection

            @section('scripts')
                <script>
                    const apuntarseButtons = document.querySelectorAll('[data-bs-toggle="modal"]');

                    apuntarseButtons.forEach(button => {
                        button.addEventListener('click', function(event) {
                            event.preventDefault(); // Prevent the link from navigating

                            const actividadId = this.dataset.actividadId;
                            const actividadTitulo = this.dataset.actividadTitulo;
                            const modalTitle = document.querySelector('#apuntarseModalLabel');
                            const activityDetails = document.querySelector('#activity-details');

                            modalTitle.textContent = `Confirmar Inscripción: ${actividadTitulo}`;
                            activityDetails.textContent = `ID de la actividad: ${actividadId}`;

                            const confirmarApuntarseBtn = document.querySelector('#confirmarApuntarse');
                            confirmarApuntarseBtn.addEventListener('click', function() {

                                // Show the second modal (inscription form)
                                var inscripcionModal = new bootstrap.Modal(document.getElementById('inscripcionFormModal'));
                                inscripcionModal.show();
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
