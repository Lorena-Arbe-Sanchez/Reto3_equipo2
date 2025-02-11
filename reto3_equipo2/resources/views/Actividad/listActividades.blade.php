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
                            <select class="form-control" id="centro_civico">
                                <option value="">Todas</option>

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
                            <select class="form-control" id="idioma">
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
                @foreach ($actividades as $actividad)
                    <div class="col-12 mt-2 border rounded d-flex flex-direction-row justify-content-between align-items-center">
                        <p class="mt-2">{{ $actividad->titulo }}</p>
                        <p class="mt-2">{{ $actividad->descripcion }}</p>
                        <a href="#" class="btn btn-primary text-white my-2">Apuntarse</a>
                    </div>
                @endforeach
            </div>

            <!--
            <div class="row mt-4">
                <div class="col d-flex justify-content-end">
                    <a href="" class="btn btn-primary text-white">Ver todas</a>
                </div>
            </div>
            -->
        </div>
    </div>

@endsection

</div>
</body>
</html>
