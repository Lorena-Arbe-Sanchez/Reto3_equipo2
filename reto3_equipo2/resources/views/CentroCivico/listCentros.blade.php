@extends('layouts.public')
@section('content')

    <div class="row mx-3 mt-4">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h3>Elige tu centro cívico:</h3>
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
                                <a href="#" class="btn btn-success text-white">Ver actividades</a>
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
                    <a href="#" class="btn btn-success text-white">Ver todas</a>
                </div>
            </div>
        </div>
    </div>

    @endsection

    </div>
    </body>
    </html>
