@extends('layouts.public')
@section('content')

    <div class="row mx-3 mt-4">
        <div class="col">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h3>Lista de personas inscritas</h3>
                </div>
            </div>

            <!--Filtros-->
            <div class="row mt-3">
                <div class="col d-flex justify-content-evenly">
                    <form>
                        <div class="form-group d-flex flex-direction-row align-items-center gap-2">
                            <label for="centro_civico" class="form-label mb-0">Centro civico</label>
                            <input type="text" class="form-control" id="centro_civico">
                        </div>
                    </form>
                    <form>
                        <div class="form-group d-flex flex-direction-row align-items-center gap-2">
                            <label for="actividad" class="form-label mb-0">Actividad</label>
                            <input type="text" class="form-control" id="actividad">
                        </div>
                    </form>
                </div>
            </div>

            <!--Lista de inscripciones-->
            <div class="row mt-2 w-75 mx-auto border rounded px-2 pb-2">
                @if($inscripciones->isEmpty())
                    <p class="mt-3">No hay inscripciones.</p>
                @else
                    <div class="col-12 mt-2 d-flex justify-content-around align-items-center border-bottom">
                        <strong class="col-2 my-2">Centro cívico</strong>
                        <strong class="col-2 my-2">Actividad</strong>
                        <strong class="col-2 my-2">DNI</strong>
                        <!--Este vacío es para que los otros tres ocupen el espacio necesario-->
                        <strong class="col-2 my-2"></strong>
                    </div>
                    @foreach($inscripciones as $inscripcion)
                        <div class="col-12 mt-2 d-flex justify-content-around align-items-center border-bottom">
                            <p class="col-2 my-2">{{ $inscripcion->actividad->centroCivico->nombre}}</p>
                            <p class="col-2 my-2">{{ $inscripcion->actividad->titulo }}</p>
                            <p class="col-2 my-2">{{ $inscripcion->ciudadano->dni }}</p>
                            <form action="{{ route('inscripcion.delete') }}" method="POST" class="col-2 my-2">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id_actividad" value="{{ $inscripcion->id_actividad }}">
                                <input type="hidden" name="id_ciudadano" value="{{ $inscripcion->id_ciudadano }}">
                                <button type="submit" class="btn btn-danger btn-destacado text-white">Borrar</button>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>

            <!--Paginación-->
            <div class="d-flex justify-content-center mt-3">
                {{ $inscripciones->links() }}
            </div>
        </div>
    </div>

@endsection

</div>
</body>
</html>
