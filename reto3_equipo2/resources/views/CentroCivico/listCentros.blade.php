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
                    <div class="col-md-4 mt-2">
                        <div class="card d-flex flex-column h-100">
                            <img class="card-img-top"
                                 src="{{ $centro->imagen ? asset('storage/' . $centro->imagen) : asset('storage/' . 'centros_civicos/arriaga.png') }}"
                                 alt="Imagen {{ $centro->nombre }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $centro->nombre }}</h5>
                                <p class="card-text">{{ $centro->direccion }}</p>
                                <a href="{{route('actividad.showActividadesCentro', ['id' => $centro->id]) }}"
                                   class="btn btn-success">Ver actividades
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
