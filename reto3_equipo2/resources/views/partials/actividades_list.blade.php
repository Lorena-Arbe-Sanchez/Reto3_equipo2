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
