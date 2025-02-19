@extends('layouts.public')

@section('content')

    <div class="row mx-3 mt-4">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h3>Elige tu centro cívico: </h3>
                </div>
            </div>

            <div class="row mt-2">
                @forelse ($centroCivicos as $centro)
                    <div class="col-lg-3 col-md-4 my-4 px-4 d-flex justify-content-center">
                        <div class="card d-flex flex-column h-100 text-center">
                            <img class="card-img-top"
                                 src="{{ $centro->imagen ? asset('storage/' . $centro->imagen) :
                                    asset('storage/' . 'centros_civicos/default.png') }}"
                                 alt="Imagen {{ $centro->nombre }}">
                            <div class="card-body d-flex flex-column flex-grow-1">
                                <h5 class="card-title">{{ $centro->nombre }}</h5>
                                <p class="card-text">{{ $centro->direccion }}</p>

                                @if(!Auth::check())
                                    <a href="#" class="btn btn-secundario mt-auto w-100 mx-auto mb-2"
                                       data-bs-toggle="modal" data-bs-target="#masInfoModal"
                                       data-centro="{{ json_encode($centro) }}">
                                        Más información
                                    </a>
                                @endif

                                <!-- Enlace que navega a la ventana de las actividades de ese centro. Si se está logueado, aparecerá más abajo. -->
                                <a href="{{ route('actividad.showActividadesCentro', ['id' => $centro->id]) }}"
                                   class="{{ Auth::check() ? 'btn btn-success w-100 mx-auto mt-auto' : 'btn btn-success w-100 mx-auto' }}">
                                    Ver actividades
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <p>No se encontraron centros cívicos.</p>
                    </div>
                @endforelse
            </div>

            <div class="modal fade" id="masInfoModal" tabindex="-1" aria-labelledby="masInfoModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="masInfoModalLabel">Datos del centro cívico</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img class="img-thumbnail mb-5" id="modal-centro-imagen"
                                 src="" alt="Imagen del centro cívico">
                            <span id="modal-centro-id" style="visibility: hidden"></span>
                            <p><b>Nombre: </b><span id="modal-centro-nombre"></span></p>
                            <p><b>Teléfono: </b><span id="modal-centro-telefono"></span></p>
                            <p><b>Correo: </b><span id="modal-centro-correo"></span></p>
                            <p><b>Dirección: </b><span id="modal-centro-direccion"></span></p>
                            <p><b>Código postal: </b><span id="modal-centro-codigo"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-secundario" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col d-flex justify-content-end">
                    <a href="{{route("actividad.showActividades")}}" class="btn btn-primary btn-editar">Ver todas las actividades</a>
                </div>
            </div>
        </div>

        @if(Auth::check())
            <div class="row border-top mt-5">
                <div class="col d-flex justify-content-center mt-3">
                    <h3>Opciones de administrador</h3>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col d-flex justify-content-center gap-4">
                    <form action="{{ route('inscripcion.show') }}" method="GET">
                        <button type="submit" class="btn btn-success">Ver Inscripciones</button>
                    </form>
                    <form action="{{ route('actividad.create') }}" method="GET">
                        <button type="submit" class="btn btn-success">Crear Actividades</button>
                    </form>
                    <form action="{{ route('ciudadano.create') }}" method="GET">
                        <button type="submit" class="btn btn-success">Crear Ciudadanos</button>
                    </form>
                </div>
            </div>
        @endif
    </div>

    <div class="footer mt-5 pt-4 border-top text-center">
        <p class="text-muted">© 2025 All rights reserved</p>
    </div>

    @endsection

    </div>
    </body>

    @vite(['resources/js/listCentros.js'])

    </html>
