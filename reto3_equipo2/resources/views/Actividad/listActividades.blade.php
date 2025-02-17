@extends('layouts.public')
@section('content')

    <div class="row mx-3 my-4">
        <div class="col">

            <div class="row">
                <div class="col mt-4 mb-5">
                    <h3>Apúntate a las actividades</h3>
                </div>
            </div>

            <!--Filtros-->

            <div class="row mb-5 g-2 d-flex flex-wrap align-items-center gap-4">

                <!-- Columna para Centro Civico -->
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="form-group d-flex flex-direction-row align-items-center gap-3">
                        <label for="centro_civico">Centros:</label>
                        <select class="form-select filtrarDatos" id="centro_civico" name="centro_civico">
                            <option value="">Todos</option>

                            @foreach ($centroCivicos as $centro)
                                <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Columna para Edad -->
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="form-group d-flex flex-direction-row align-items-center gap-3">
                        <label for="edad">Edad:</label>
                        <input type="text" class="form-control filtrarDatos" id="edad" name="edad" value="">
                    </div>
                </div>

                <!-- Columna para Idioma -->
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="form-group d-flex flex-direction-row align-items-center gap-3">
                        <label for="idioma">Idioma:</label>
                        <select class="form-select filtrarDatos" id="idioma">
                            <option value="todos">Todos</option>
                            <option value="espanol">Español</option>
                            <option value="euskera">Euskera</option>
                            <option value="ingles">Inglés</option>
                        </select>
                    </div>
                </div>

                <!-- Columna para Horario -->
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="form-group d-flex flex-direction-row align-items-center gap-3">
                        <label for="horario">Horario:</label>
                        <input type="text" class="form-control filtrarDatos" id="horario">
                    </div>
                </div>

                <!-- Buscador de palabras concretas (en títulos y descripciones de actividades) y botón de aplicar todos los filtros -->

                <div class="col-xl-2 col-md-5 col-sm-7">
                    <div class="form-group d-flex align-items-center gap-3">
                        <label for="textoBusqueda">Búsqueda:</label>
                        <input type="text" class="form-control filtrarDatos" id="textoBusqueda" placeholder="Título o descripción">
                    </div>
                </div>

                <div class="col-xl-auto col-md-3 col-sm-5">
                    <button class="btn btn-secundario btn-success w-100" id="aplicarFiltrosBtn">Aplicar filtros</button>
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <p>Se han encontrado <b id="actividadesTotales">0</b> actividades con los criterios anteriores.</p>

                    <!-- TODO : Poner mensaje con algo así -->
                    {{--
                    @if($actividadesTotales == 1)
                        <p>Se ha encontrado <b>1</b> actividad con los criterios anteriores.</p>
                    @else
                        <p>Se han encontrado <b>{{ $actividadesTotales }}</b> actividades con los criterios anteriores.</p>
                    @endif
                    --}}

                </div>
            </div>

            <!-- TODO : Ponerlo como mensaje lateral (que se sobreponga a todo y no afecte a lo demás / a lo de abajo) + Que no se recargue la página -->
            @if ($errors->any())
                <div class="alert alert-danger" id="danger-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- TODO : Ponerlo como mensaje lateral también -->
            @if(session('success'))
                <div class="alert alert-success" id="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <!--Lista de actividades-->
            <div class="row pt-5" id="actividadesContainer">
                @include('partials.actividades_list', ['actividades' => $actividades])
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
                            <p><b>Plazas Libres: </b><span id="modal-actividad-plazas"></span></p>
                            <p><b>Edades: </b><span id="modal-actividad-edades"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-secundario" data-bs-dismiss="modal">Cancelar</button>

                            <!-- TODO : Que solo deje inscribirse si hay al menos 1 plaza
                            disponible (transformar a int el valor de "$actividad->plazas_disponibles" y comprobar).
                            Si ya no quedan plazas debería salir un error en el control de arriba ("if ($errors->any())").
                            Saldría algo como "No hay plazas disponibles para esta actividad" -->

                            <!-- TODO : Que solo deje inscribirse si cumple en rango de edad -->
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
                                        <i>Escribe tu DNI para poder completar la inscripción</i>
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

            <script>

                document.addEventListener('DOMContentLoaded', function() {
                    const apuntarseButtons = document.querySelectorAll('[data-bs-toggle="modal"]');

                    apuntarseButtons.forEach(button => {
                        button.addEventListener('click', function(event) {

                            event.preventDefault();

                            const actividadData = JSON.parse(this.dataset.actividad);

                            // Actualizar el contenido del modal con los datos de la actividad
                            document.getElementById('modal-actividad-id').textContent = actividadData.id;
                            document.getElementById('modal-actividad-titulo').textContent = actividadData.titulo;
                            document.getElementById('modal-actividad-descripcion').textContent = actividadData.descripcion;
                            document.getElementById('modal-actividad-idioma').textContent = actividadData.idioma;
                            document.getElementById('modal-actividad-horario').textContent = `${actividadData.hora_inicio} - ${actividadData.hora_fin}`;
                            document.getElementById('modal-actividad-plazas').textContent = `${actividadData.plazas_disponibles}/${actividadData.plazas_totales}`;
                            const edadMinima = actividadData.edad_minima === null ? "∞" : actividadData.edad_minima;
                            const edadMaxima = actividadData.edad_maxima === null ? "∞" : actividadData.edad_maxima;
                            document.getElementById('modal-actividad-edades').textContent = `${edadMinima} - ${edadMaxima}`;

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

                            var contenedorDni = document.getElementById('contenedorDni');
                            var casillaDni = document.getElementById('casillaDni');

                            // Evento del botón de confirmar la inscripción en el primer modal
                            const confirmarConfirmacionBtn = document.querySelector('#confirmarConfirmacion');
                            confirmarConfirmacionBtn.addEventListener('click', async () => {

                                // Solamente si el DNI está visible lo validará y permitirá realizar la inscripción. Si no, mostrará su casilla.

                                if (contenedorDni.style.visibility === 'hidden') {
                                    // Mostrar casilla del DNI a rellenar
                                    contenedorDni.style.visibility = 'visible';
                                }
                                else {
                                    // Validar el DNI y realizar inscripción

                                    const dni = casillaDni.value;
                                    const dniRegex = /^[0-9]{8}[A-Z]$/;

                                    if (dni.length !== 9 || !dniRegex.test(dni)) {
                                        // todo : Ponerlo como mensaje lateral (mirar login en modo claro)
                                        alert("El DNI debe tener 8 números seguidos de una letra mayúscula.");
                                        casillaDni.focus();
                                    }
                                    else {
                                        // Se establecerán los datos de "casillaDni" y de "id_actividad" del formulario, y se creará una fila en 'inscripciones'.
                                        document.querySelector('#inscripcionFormModal form input[name="id_actividad"]').value = document.getElementById('modal-actividad-id').textContent;
                                        // Enviar el formulario
                                        document.querySelector('#inscripcionFormModal form').submit();
                                        // Si vuelve aquí es que la inserción ha salido bien y se puede continuar.
                                        casillaDni.value = "";
                                        contenedorDni.style.visibility = 'hidden';
                                    }
                                }

                            });

                        });
                    });

                    // Parte para gestionar los filtros y el listado de actividades.

                    const actividadesContainer = document.getElementById('actividadesContainer');
                    const actividadesTotalesElement = document.getElementById('actividadesTotales');
                    const filtros = document.querySelectorAll('.filtrarDatos');
                    const aplicarFiltrosBtn = document.getElementById('aplicarFiltrosBtn');

                    // Función para aplicar los filtros
                    async function aplicarFiltros() {
                        const centro_civico = document.getElementById('centro_civico').value;
                        const edad = document.getElementById('edad').value;
                        const idioma = document.getElementById('idioma').value;
                        const horario = document.getElementById('horario').value;
                        const textoBusqueda = document.getElementById('textoBusqueda').value;

                        try {
                            const response = await fetch('/actividades/filtrar', {
                                method: 'GET',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    centro_civico: centro_civico,
                                    edad: edad,
                                    idioma: idioma,
                                    horario: horario,
                                    textoBusqueda: textoBusqueda
                                })
                            });

                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }

                            const data = await response.json();

                            // Actualizar el listado de actividades
                            actividadesContainer.innerHTML = data.html;

                            // Actualizar el count de actividades
                            actividadesTotalesElement.textContent = data.actividadesCount;

                        }
                        catch (error) {
                            console.error('Error:', error);
                        }
                    }

                    // Listener para filtros por individual
                    filtros.forEach(filter => {
                        filter.addEventListener('change', aplicarFiltros);
                        filter.addEventListener('input', aplicarFiltros);
                    });

                    // Listener para el botón de "Aplicar filtros"
                    aplicarFiltrosBtn.addEventListener('click', aplicarFiltros);

                });

                // Temporizadores para los mensajes (de 5 segundos)
                setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, 5000);
                setTimeout(function() {
                    document.getElementById('danger-message').style.display = 'none';
                }, 5000);

            </script>

        </div>
    </div>

    <div class="footer mt-5 pt-4 border-top text-center">
        <p class="text-muted">© 2025 All rights reserved</p>
    </div>

    @endsection

    </div>
    </body>
    </html>
