@extends('layouts.public')
@section('content')

    <div class="row mx-3 mt-4">
        <div class="col">
            <div class="row">
                <form action="{{ route('centros.listCentros') }}" method="GET">
                    <button type="submit" class="btn btn-success btn-secundario">Volver</button>
                </form>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h3>Crear actividad</h3>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row mt-2">
                <div class="col d-flex justify-content-center">
                    <form action="{{route("actividad.store")}}" method="post" class="border rounded p-4 w-75" enctype="multipart/form-data">
                        @csrf

                        <div class="row justify-content-center gap-3">
                            <div class="col-3 d-flex flex-column">
                                <label for="titulo" class="form-label">Título *</label>
                                <input type="text" id="titulo" name="titulo" class="form-control border border-dark" value="{{ old('titulo') }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="descripcion" class="form-label">Descripción *</label>
                                <textarea id="descripcion" name="descripcion" class="form-control border border-dark">{{ old('descripcion') }}</textarea>
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="idioma" class="form-label">Idioma *</label>
                                <input type="text" id="idioma" name="idioma" class="form-control border border-dark" value="{{ old('idioma') }}">

                                <!-- TODO : Que sea un select con 3 opciones: "Español" / "Euskera" / "Inglés" -->
{{--                                <select class="form-select border border-dark" id="idioma" name="idioma">--}}
{{--                                    <option value="Español">{{ old('idioma') }}</option>--}}
{{--                                    <option value="Euskera">{{ old('idioma') }}</option>--}}
{{--                                    <option value="Inglés">{{ old('idioma') }}</option>--}}
{{--                                </select>--}}
                            </div>
                        </div>

                        <div class="row justify-content-center gap-3 mt-2">
                            <div class="col-3 d-flex flex-column">
                                <label for="fecha_ini" class="form-label">Fecha de inicio *</label>
                                <input type="date" id="fecha_ini" name="fecha_inicio" class="form-control border border-dark" value="{{ old('fecha_inicio') }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="fecha_fin" class="form-label">Fecha final *</label>
                                <input type="date" id="fecha_fin" name="fecha_fin" class="form-control border border-dark" value="{{ old('fecha_fin') }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="hora_inicio" class="form-label">Hora de inicio *</label>
                                <input type="text" id="hora_inicio" name="hora_inicio" class="form-control border border-dark" value="{{ old('hora_inicio') }}">
                            </div>
                        </div>

                        <div class="row justify-content-center gap-3 mt-2">
                            <div class="col-3 d-flex flex-column">
                                <label for="hora_fin" class="form-label">Hora finalización *</label>
                                <input type="text" id="hora_fin" name="hora_fin" class="form-control border border-dark" value="{{ old('hora_fin') }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="plazas_totales" class="form-label">Plazas totales *</label>
                                <input type="number" id="plazas_totales" name="plazas_totales" class="form-control border border-dark" value="{{ old('plazas_totales') }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="plazas_minimas" class="form-label">Plazas mínimas *</label>
                                <input type="number" id="plazas_minimas" name="plazas_minimas" class="form-control border border-dark" value="{{ old('plazas_minimas') }}">
                            </div>
                        </div>

                        <div class="row justify-content-center gap-3 mt-2">
                            <div class="col-3 d-flex flex-column">
                                <label for="dia1" class="form-label">Día semanal 1 *</label>
                                <input type="text" id="dia1" name="dia_1" class="form-control border border-dark" value="{{ old('dia_1') }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="dia2" class="form-label">Día semanal 2</label>
                                <input type="text" id="dia2" name="dia_2" class="form-control" value="{{ old('dia_2') }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="centro_civico_id" class="form-label">Centro cívico *</label>
                                <select class="form-select border border-dark" id="centro_civico" name="centro_civico_id">
                                    @foreach ($centroCivicos as $centro)
                                        <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center gap-3 mt-2">
                            <div class="col-3 d-flex flex-column">
                                <label for="edad_minima" class="form-label">Edad mínima</label>
                                <input type="number" id="edad_minima" name="edad_minima" class="form-control" value="{{ old('edad_minima') }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="edad_maxima" class="form-label">Edad máxima</label>
                                <input type="number" id="edad_maxima" name="edad_maxima" class="form-control" value="{{ old('edad_maxima') }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="imagen" class="form-label">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-success text-white mt-4 w-25">Crear Actividad</button>
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
