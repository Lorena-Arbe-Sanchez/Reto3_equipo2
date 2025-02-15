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
                    <div class="col-lg-3 col-md-4 mt-2 d-flex justify-content-center">
                        <div class="card d-flex flex-column h-100 text-center">
                            <img class="card-img-top"
                                 src="{{ $centro->imagen ? asset('storage/' . $centro->imagen) :
                                    asset('storage/' . 'centros_civicos/default.png') }}"
                                 alt="Imagen {{ $centro->nombre }}">
                            <div class="card-body d-flex flex-column flex-grow-1">
                                <h5 class="card-title">{{ $centro->nombre }}</h5>
                                <p class="card-text">{{ $centro->direccion }}</p>

                                <!-- TODO : Poner como en las actividades: su información. Falta de rellenar "data-actividad" y hacer la parte de script abajo. -->
                                @if(!Auth::check())
                                    <a href="#" class="btn btn-secundario mt-auto w-100 mx-auto mb-2"
                                       data-bs-toggle="modal" data-bs-target="#informacionModal"
                                       data-actividad="">
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

            <div class="row mt-4">
                <div class="col d-flex justify-content-end">
                    <a href="{{route("actividad.showActividades")}}" class="btn btn-success text-white">Ver todas</a>
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
                <div class="col d-flex justify-content-center gap-2">
                    <form action="{{ route('inscripcion.show') }}" method="GET">
                        <button type="submit" class="btn btn-success">Ver Inscripciones</button>
                    </form>
                    <form action="{{ route('actividad.create') }}" method="GET">
                        <button type="submit" class="btn btn-success">Crear Actividades</button>
                    </form>
                </div>
            </div>
        @endif
    </div>

    @endsection

    </div>
    </body>
    </html>
