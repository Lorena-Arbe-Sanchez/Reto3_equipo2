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
                @foreach ($centroCivicos as $centro)
                    <div class="col-md-4 mt-2">
                        <div class="card">
                            <img class="card-img-top" src="" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{ $centro->nombre }}</h5>
                                <p class="card-text">{{ $centro->direccion }}</p>  <!-- Muestra la dirección -->
                                <a href="#" class="btn text-white">Ver actividades</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if (count($centroCivicos) == 0)
                    <div class="col">
                        <p>No se encontraron centros cívicos.</p>
                    </div>
                @endif
            </div>

            <div class="row mt-4">
                <div class="col d-flex justify-content-end">
                    <a href="#" class="btn text-white">Ver todas</a>
                </div>
            </div>
        </div>
    </div>

@endsection
