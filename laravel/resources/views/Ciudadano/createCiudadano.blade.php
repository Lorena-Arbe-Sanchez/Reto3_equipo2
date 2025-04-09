@extends('layouts.public')

@section('title', 'Crear Ciudadano')

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
                    <h3>Crear ciudadano</h3>
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
                    <form id="formCiudadano" action="{{route("ciudadano.store")}}" method="post" class="border rounded p-4 w-75" enctype="multipart/form-data">
                        @csrf

                        <div class="row justify-content-center gap-3">
                            <div class="col-3 d-flex flex-column">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control border border-dark" value="{{ old('nombre') }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input id="apellidos" name="apellidos" class="form-control border border-dark">{{ old('apellidos') }}
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" id="dni" name="dni" class="form-control border border-dark" value="{{ old('dni') }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="dni" class="form-label">Fecha nacimiento</label>
                                <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control border border-dark" value="{{ old('fecha_nacimiento') }}" placeholder="YYYY-MM-DD">
                            </div>
                        </div>

                        <div class="row justify-content-center gap-3 mt-2">
                            <div class="col-3 d-flex flex-column">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" id="direccion" name="direccion" class="form-control border border-dark" value="{{ old('direccion') }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="codigo_postal" class="form-label">Código postal</label>
                                <input type="text" id="codigo_postal" name="codigo_postal" class="form-control border border-dark" value="{{ old('codigo_postal') }}">
                            </div>

                            <div class="col-3 d-flex flex-column">
                                <label for="juego_barcos" class="form-label">Juego barcos</label>
                                <input type="text" id="juego_barcos" name="juego_barcos" class="form-control border border-dark" value="{{ old('juego_barcos') }}">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-success text-white mt-4 w-25">Crear Ciudadano</button>
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
        @vite(['resources/js/validarCiudadano.js'])

    </html>
