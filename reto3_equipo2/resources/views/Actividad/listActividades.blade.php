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

            <div class="row mb-5">
                <div class="col-md-3"> <!-- Columna para Centro Civico -->
                    <div class="form-group d-flex flex-direction-row align-items-center gap-2">
                        <label for="centro_civico">Centros</label>
                        <select class="form-select" id="centro_civico" name="centro_civico">
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
                        <input type="text" class="form-control" id="edad" name="edad" value="">
                    </div>
                </div>

                <div class="col-md-3"> <!-- Columna para Idioma -->
                    <div class="form-group d-flex flex-direction-row align-items-center gap-2">
                        <label for="idioma">Idioma</label>
                        <select class="form-select" id="idioma">
                            <option value="todos">Todos</option>
                            <option value="espanol">Español</option>
                            <option value="euskera">Euskera</option>
                            <option value="ingles">Inglés</option>
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

            <!-- TODO : (HAY QUE ESTILIZAR EL BOTÓN Y REUBICAR EVERYTHING) - Buscador de palabras concretas (en títulos y descripciones de actividades) y botón de aplicar filtro -->
            <div class="row">
                <div class="form-group d-flex flex-direction-row align-items-center gap-2 w-auto">
                    <label for="textoBusqueda">Texto</label>
                    <input type="text" class="form-control" id="textoBusqueda" placeholder="Título o descripción">
                    <a href="" class="btn btn-success">Buscar</a>
                </div>
            </div>

            <div class="row py-5">
                <div class="col-md-12">
                    <a href="{{ route('actividad.showActividadesFiltros') }}" class="btn btn-success">Filtrar</a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <!-- TODO : Implementar bien (que "$actividadesTotales" sea el listado filtrado resultante). -->
                    <?php $actividadesTotales = 0 ?>

                    <?php if ($actividadesTotales == 1): ?>
                    <p>Se ha encontrado <b>1</b> actividad con los criterios anteriores.</p>
                    <?php else: ?>
                    <p>Se han encontrado <b><?php echo $actividadesTotales; ?></b> actividades con los criterios anteriores.</p>
                    <?php endif; ?>
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
            <div class="row pt-5">
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
                                        <form action="{{ route('actividad.delete') }}" method="POST" class="w-50 m-0">
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
                            <p><b>Plazas Libres: </b><span id="modal-actividad-plazas"></span></p>
                            <p><b>Edades: </b><span id="modal-actividad-edades"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-secundario" data-bs-dismiss="modal">Cancelar</button>
                            <!-- TODO : Que solo deje inscribirse si hay al menos 1 plaza
                            disponible (transformar a int el valor de "$actividad->plazas_disponibles" y comprobar).
                            Si ya no quedan plazas debería salir un error en el control de arriba.
                            Saldría algo como "No hay plazas disponibles para esta actividad" -->
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
                });

                // Temporizadores para los mensajes (de 5 segundos)
                setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, 5000);
                setTimeout(function() {
                    document.getElementById('danger-message').style.display = 'none';
                }, 5000);



                // TODO : Repasar
                /*
                document.addEventListener('DOMContentLoaded', function() {
            const centroCivicoSelect = document.getElementById('centro_civico');
            const edadInput = document.getElementById('edad');
            const idiomaSelect = document.getElementById('idioma');
            const horarioInput = document.getElementById('horario');
            const textoBusquedaInput = document.getElementById('textoBusqueda');
            const btnBuscar = document.getElementById('btnBuscar');
            const btnFiltrar = document.getElementById('btnFiltrar');
            const listaActividades = document.getElementById('listaActividades');
            const actividadesTotalesSpan = document.getElementById('actividadesTotales');
            let actividades = Array.from(document.querySelectorAll('.actividad-item'));

            function filtrarActividades() {
                const centroCivicoSeleccionado = centroCivicoSelect.value;
                const edadIngresada = edadInput.value;
                const idiomaSeleccionado = idiomaSelect.value;
                const horarioIngresado = horarioInput.value;
                const textoBusqueda = textoBusquedaInput.value.toLowerCase();

                let actividadesFiltradas = actividades.filter(actividad => {
                    const centroCivicoActividad = actividad.dataset.centroCivico;
                    const edadMinimaActividad = actividad.dataset.edadMinima;
                    const edadMaximaActividad = actividad.dataset.edadMaxima;
                    const idiomaActividad = actividad.dataset.idioma;
                    const horarioActividad = actividad.dataset.horario.toLowerCase();
                    const textoActividad = actividad.dataset.texto.toLowerCase();

                    let cumpleFiltro = true;

                    // Filtro de Centro Cívico
                    if (centroCivicoSeleccionado && centroCivicoSeleccionado !== "" && centroCivicoSeleccionado !== centroCivicoActividad) {
                        cumpleFiltro = false;
                    }

                    // Filtro de Edad
                    if (edadIngresada) {
                        const edad = parseInt(edadIngresada);
                        const edadMinima = parseInt(edadMinimaActividad) || 0; // Si es null, asumimos 0
                        const edadMaxima = parseInt(edadMaximaActividad) || Infinity; // Si es null, asumimos infinito

                        if (edad < edadMinima || edad > edadMaxima) {
                            cumpleFiltro = false;
                        }
                    }

                    // Filtro de Idioma
                    if (idiomaSeleccionado && idiomaSeleccionado !== "") {
                        if (idiomaSeleccionado !== "todos" && idiomaSeleccionado !== idiomaActividad) {
                            cumpleFiltro = false;
                        }
                    }

                    // Filtro de Horario
                    if (horarioIngresado && horarioIngresado !== "" && !horarioActividad.includes(horarioIngresado.toLowerCase())) {
                        cumpleFiltro = false;
                    }

                    // Filtro de Texto
                    if (textoBusqueda && textoBusqueda !== "" && !textoActividad.includes(textoBusqueda)) {
                        cumpleFiltro = false;
                    }

                    return cumpleFiltro;
                });

                // Ocultar todas las actividades
                actividades.forEach(actividad => {
                    actividad.style.display = 'none';
                });

                // Mostrar solo las actividades filtradas
                actividadesFiltradas.forEach(actividad => {
                    actividad.style.display = 'block';
                });

                // Actualizar el número total de actividades encontradas
                actividadesTotalesSpan.textContent = actividadesFiltradas.length;
            }

            // Event listeners para cada filtro
            centroCivicoSelect.addEventListener('change', filtrarActividades);
            edadInput.addEventListener('input', filtrarActividades);
            idiomaSelect.addEventListener('change', filtrarActividades);
            horarioInput.addEventListener('input', filtrarActividades);
            btnBuscar.addEventListener('click', function(event) {
                event.preventDefault(); // Evitar la recarga de la página al presionar "Buscar"
                filtrarActividades();
            });
            btnFiltrar.addEventListener('click', function(event) {
                event.preventDefault(); // Evitar la recarga de la página al presionar "Filtrar"
                filtrarActividades();
            });

            // Inicializar el número total de actividades
            actividadesTotalesSpan.textContent = actividades.length;
        });
                 */

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
