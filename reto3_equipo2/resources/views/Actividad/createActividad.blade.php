@extends('layouts.public')
@section('content')

    <div class="row mx-3 mt-4">
        <div class="col">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h3>Crear actividad</h3>
                </div>
            </div>

            <!--Lista de actividades-->
            <div class="row mt-2">
                <div class="col d-flex justify-content-center">
                    <form action="{{route("actividad.save")}}" method="post" class="border rounded p-4 w-75">
                        @csrf

                        <div class="row justify-content-center gap-3">
                            <div class="col-3 d-flex flex-column">
                                <label for="titulo" class="form-label">Titulo</label>
                                <input type="text" id="titulo" name="titulo" class="form-control">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="idioma" class="form-label">Idioma</label>
                                <input type="text" id="idioma" name="idioma" class="form-control">
                            </div>
                        </div>

                        <div class="row justify-content-center gap-3 mt-2">
                            <div class="col-3 d-flex flex-column">
                                <label for="fecha_ini" class="form-label">Fecha inicio</label>
                                <input type="date" id="fecha_ini" name="fecha_inicio" class="form-control">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="fecha_fin" class="form-label">Fecha final</label>
                                <input type="date" id="fecha_fin" name="fecha_fin" class="form-control">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="hora_inicio" class="form-label">Horario Inicio</label>
                                <input type="text" id="hora_inicio" name="hora_inicio" class="form-control">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="hora_fin" class="form-label">Horario Fin</label>
                                <input type="text" id="hora_fin" name="hora_fin" class="form-control">
                            </div>
                        </div>

                        <div class="row justify-content-center gap-3 mt-2">
                            <div class="col-3 d-flex flex-column">
                                <label for="plazas_totales" class="form-label">Plazas totales</label>
                                <input type="number" id="plazas_totales" name="plazas_totales" class="form-control">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="plazas_minimas" class="form-label">Plazas mínimas</label>
                                <input type="number" id="plazas_minimas" name="plazas_minimas" class="form-control">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="edad_minima" class="form-label">Edad mínima</label>
                                <input type="number" id="edad_minima" name="edad_minima" class="form-control">
                            </div>
                        </div>

                        <div class="row justify-content-center gap-3 mt-2">
                            <div class="col-3 d-flex flex-column">
                                <label for="edad_maxima" class="form-label">Edad máxima</label>
                                <input type="number" id="edad_maxima" name="edad_maxima" class="form-control">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="dia1" class="form-label">Día 1</label>
                                <input type="date" id="dia1" name="dia_1" class="form-control">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="dia2" class="form-label">Día 2</label>
                                <input type="date" id="dia2" name="dia_2" class="form-control">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn text-white mt-4 w-25">Crear Actividad</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

</div>
</body>
</html>
