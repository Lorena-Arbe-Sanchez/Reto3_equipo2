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
                    @foreach($inscripciones as $inscripcion)
                        <div class="col-12 mt-2 border rounded d-flex justify-content-around align-items-center">
                            <p class="my-2">{{ $inscripcion->actividad->titulo }}</p>
                            <p class="my-2">{{ $inscripcion->ciudadano->nombre }}</p>
                            <p class="my-2">{{ $inscripcion->ciudadano->nombre }}</p>
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
<!-- Bootstrap JS (Opcional si necesitas funcionalidades JS de Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
