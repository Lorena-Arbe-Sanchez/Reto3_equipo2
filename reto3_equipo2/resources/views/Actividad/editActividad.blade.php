@extends('layouts.public')

@section('title', 'Editar Actividad')

@section('content')

    <div class="row mx-3 mt-4">
        <div class="col">
            <div class="row">
                <form action="{{ route('actividad.showActividades') }}" method="GET">
                    <button type="submit" class="btn btn-success btn-secundario">Volver</button>
                </form>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h3>Editar actividad</h3>
                </div>
            </div>

            <!--Lista de actividades-->
            <div class="row mt-2">
                <div class="col d-flex justify-content-center">
                    <form class="border rounded p-4 w-75" action="{{route ("actividad.update", $datos->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $datos->id }}">

                        <div class="row justify-content-center gap-3">
                            <div class="col-3 d-flex flex-column">
                                <label for="titulo" class="form-label">Titulo *</label>
                                <input type="text" id="titulo" name="titulo" class="form-control" value="{{ $datos->titulo }}" required>
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="descripcion" class="form-label">Descripción *</label>
                                <textarea id="descripcion" name="descripcion" class="form-control" required>{{ $datos->descripcion }}</textarea>
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="idioma" class="form-label">Idioma *</label>
                                <input type="text" id="idioma" name="idioma" class="form-control" value="{{ $datos->idioma }}" required>
                            </div>
                        </div>

                        <div class="row justify-content-center gap-3 mt-2">
                            <div class="col-3 d-flex flex-column">
                                <label for="fecha_ini" class="form-label">Fecha inicio *</label>
                                <input type="date" id="fecha_ini" name="fecha_inicio" class="form-control" value="{{ $datos->fecha_inicio }}" required>
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="fecha_fin" class="form-label">Fecha final *</label>
                                <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" value="{{ $datos->fecha_fin }}" required>
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="hora_inicio" class="form-label">Hora inicio *</label>
                                <input type="text" id="hora_inicio" name="hora_inicio" class="form-control" value="{{ $datos->hora_inicio }}" required>
                            </div>
                        </div>

                        <div class="row justify-content-center gap-3 mt-2">
                            <div class="col-3 d-flex flex-column">
                                <label for="hora_fin" class="form-label">Hora fin *</label>
                                <input type="text" id="hora_fin" name="hora_fin" class="form-control" value="{{ $datos->hora_fin }}" required>
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="plazas_totales" class="form-label">Plazas totales *</label>
                                <input type="number" id="plazas_totales" name="plazas_totales" class="form-control" value="{{ $datos->plazas_totales }}" required>
                                <input type="hidden" id="plazas_disponibles" name="plazas_disponibles" class="form-control" value="{{ $datos->plazas_totales }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="plazas_minimas" class="form-label">Plazas mínimas *</label>
                                <input type="number" id="plazas_minimas" name="plazas_minimas" class="form-control" value="{{ $datos->plazas_minimas }}" required>
                            </div>
                        </div>

                        <div class="row justify-content-center gap-3 mt-2">
                            <div class="col-3 d-flex flex-column">
                                <label for="edad_minima" class="form-label">Edad mínima</label>
                                <input type="number" id="edad_minima" name="edad_minima" class="form-control" value="{{ $datos->edad_minima }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="edad_maxima" class="form-label">Edad máxima</label>
                                <input type="number" id="edad_maxima" name="edad_maxima" class="form-control" value="{{ $datos->edad_maxima }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="imagen" class="form-label">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                            </div>
                        </div>

                        <div class="row justify-content-center gap-3 mt-2">
                            <div class="col-3 d-flex flex-column">
                                <label for="dia_1" class="form-label">Día 1 *</label>
                                <input type="text" id="dia_1" name="dia_1" class="form-control" value="{{ $datos->dia_1 }}" required>
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="dia_2" class="form-label">Día 2</label>
                                <input type="text" id="dia_2" name="dia_2" class="form-control" value="{{ $datos->dia_2 }}">
                            </div>
                        </div>

                        <div class="row justify-content-center mt-4">
                            <button class="btn btn-success col-3">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer mt-5 pt-4 border-top text-center">
        <p class="text-muted">© 2025 All rights reserved</p>
    </div>

    @endsection

    </div>
    </body>
    </html>
