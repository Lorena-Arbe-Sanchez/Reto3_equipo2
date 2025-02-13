@extends('layouts.public')
@section('content')

    <div class="row mx-3 mt-4">
        <div class="col">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h3>Editar actividad</h3>
                </div>
            </div>

            <!--Lista de actividades-->
            <div class="row mt-2">
                <div class="col d-flex justify-content-center">
                    <form class="border rounded p-4 w-75" action="{{route ("actividad.update")}}" method="post">
                        <div class="row justify-content-center gap-3">
                            <div class="col-3 d-flex flex-column">
                                <label for="titulo" class="form-label">Titulo</label>
                                <input type="text" id="titulo" class="form-control" value="{{ $datos->titulo }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea id="descripcion" class="form-control">{{ $datos->descripcion }}</textarea>
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="idioma" class="form-label">Idioma</label>
                                <input type="text" id="idioma" class="form-control" value="{{ $datos->idioma }}">
                            </div>
                        </div>

                        <div class="row justify-content-center gap-3 mt-2">
                            <div class="col-3 d-flex flex-column">
                                <label for="fecha_ini" class="form-label">Fecha inicio</label>
                                <input type="date" id="fecha_ini" class="form-control" value="{{ $datos->fecha_inicio }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="fecha_fin" class="form-label">Fecha final</label>
                                <input type="date" id="fecha_fin" class="form-control" value="{{ $datos->fecha_fin }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="horario" class="form-label">Horario</label>
                                <input type="text" id="horario" class="form-control" value="{{ $datos->hora_inicio }}">
                            </div>
                        </div>

                        <div class="row justify-content-center gap-3 mt-2">
                            <div class="col-3 d-flex flex-column">
                                <label for="plazas_totales" class="form-label">Plazas totales</label>
                                <input type="number" id="plazas_totales" class="form-control" value="{{ $datos->plazas_totales }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="plazas_minimas" class="form-label">Plazas mínimas</label>
                                <input type="number" id="plazas_minimas" class="form-control" value="{{ $datos->plazas_minimas }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="edad_minima" class="form-label">Edad mínima</label>
                                <input type="number" id="edad_minima" class="form-control" value="{{ $datos->edad_minima }}">
                            </div>
                        </div>

                        <div class="row justify-content-center gap-3 mt-2">
                            <div class="col-3 d-flex flex-column">
                                <label for="edad_maxima" class="form-label">Edad máxima</label>
                                <input type="number" id="edad_maxima" class="form-control" value="{{ $datos->edad_maxima }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="dia1" class="form-label">Día 1</label>
                                <input type="text" id="dia1" class="form-control" value="{{ $datos->dia_1 }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="dia2" class="form-label">Día 2</label>
                                <input type="text" id="dia2" class="form-control" value="{{ $datos->dia_2 }}">
                            </div>
                        </div>

                        <button class="row justify-content-center" >Aceptar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection

    </div>
    </body>
    </html>
