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
                    <a href="" class="btn btn-primary">Buscar</a>
                </div>
            </div>

            <div class="row py-5">
                <div class="col-md-12">
                    <a href="{{ route('actividad.showActividadesFiltros') }}" class="btn btn-primary">Filtrar</a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <!-- TODO : Implementar bien. -->
                    <?php $actividadesTotales = 0 ?>

                    <?php if ($actividadesTotales == 1): ?>
                    <p>Se ha encontrado <b>1</b> actividad con los criterios anteriores.</p>
                    <?php else: ?>
                    <p>Se han encontrado <b><?php echo $actividadesTotales; ?></b> actividades con los criterios anteriores.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!--Lista de actividades-->
            <div class="row pt-5">
                @forelse ($actividades as $actividad)
                    <div class="col-lg-3 col-md-4 mt-2 d-flex justify-content-center">
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
                                <small class="text-muted">{{ "Plazas disponibles: ". $actividad->plazas_disponibles
                                    ." de ". $actividad->plazas_totales }}</small>
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
                            <button type="button" class="btn btn-editar text-white" id="confirmarApuntarse">Inscribirse</button>
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

                                <!-- TODO : id de la actividad -->
                                <input type="hidden" name="id_actividad" value="">
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-editar text-white" id="confirmarConfirmacion">Confirmar</button>
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
                                    }
                                    else {
                                        // Será correcto
                                        // TODO : Pillar el dato de "casillaDni" y el id d ela actividad, y crear una fila en 'inscripciones'
                                        // TODO : Actualizar el valor de la columna a 'plazas_disponibles - 1' en la actividad
                                    }

                                }





                                /*
                                if (contenedorDni.style.visibility === 'hidden') {
                                    contenedorDni.style.visibility = 'visible';
                                } else {
                                    const dni = casillaDni.value;
                                    const dniRegex = /^[0-9]{8}[A-Z]$/;

                                    if (dni.length !== 9 || !dniRegex.test(dni)) {
                                        // Mostrar mensaje de error con toast
                                        const toast = new bootstrap.Toast(document.getElementById('validationToast'));
                                        const toastBody = document.querySelector('.toast-body');
                                        toastBody.textContent = "El DNI debe tener 8 números seguidos de una letra mayúscula";
                                        toast.show();
                                        return;
                                    }

                                    try {
                                        // Realizar la inscripción
                                        const response = await fetch('{{ route("inscripcion.store") }}', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            },
                                            body: JSON.stringify({
                                                actividad_id: actividadData.id,
                                                dni: dni
                                            })
                                        });

                                        const data = await response.json();

                                        if (data.success) {
                                            // Cerrar los modales
                                            bootstrap.Modal.getInstance(document.getElementById('inscripcionFormModal')).hide();
                                            bootstrap.Modal.getInstance(document.getElementById('apuntarseModal')).hide();

                                            // Actualizar las plazas disponibles en la UI
                                            const plazasElement = document.querySelector(`[data-actividad-id="${actividadData.id}"] .plazas-disponibles`);
                                            if (plazasElement) {
                                                plazasElement.textContent = data.plazas_disponibles;
                                            }

                                            // Mostrar mensaje de éxito
                                            const toast = new bootstrap.Toast(document.getElementById('validationToast'));
                                            const toastBody = document.querySelector('.toast-body');
                                            document.getElementById('validationToast').classList.remove('bg-danger');
                                            document.getElementById('validationToast').classList.add('bg-success');
                                            toastBody.textContent = "¡Inscripción realizada con éxito!";
                                            toast.show();
                                        }
                                    } catch (error) {
                                        const toast = new bootstrap.Toast(document.getElementById('validationToast'));
                                        const toastBody = document.querySelector('.toast-body');
                                        toastBody.textContent = "Error al realizar la inscripción";
                                        toast.show();
                                    }
                                }
                                */









                                /*
                                if (contenedorDni.style.visibility === 'hidden') {
                                    // Mostrar casilla del DNI a rellenar
                                    contenedorDni.style.visibility = 'visible';
                                }
                                else {
                                    // Validar el DNI y realizar inscripción
                                    if (casillaDni.value.length !== 9) {
                                        // TODO : Ponerlo como mensaje lateral (mirar login en modo claro)
                                        alert("El DNI debe tener 9 caracteres.");
                                    }
                                    else if (!casillaDni.value.test(/^[0-9]{8}[A-Z]$/)) {
                                        alert("El DNI debe cumplir el formato.");
                                    }
                                    else {
                                        // Será correcto
                                        // TODO : Pillar el id_actividad y el id_ciudadano, y crear una fila en 'inscripciones'
                                        // TODO : Actualizar el valor de la columna a 'plazas_disponibles - 1' en la actividad
                                    }
                                }
                                */

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
