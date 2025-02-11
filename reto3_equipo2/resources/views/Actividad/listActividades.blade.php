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
            <div class="row mt-3">
                <div class="col d-flex justify-content-evenly">
                    <form>
                        <div class="form-group d-flex flex-direction-row align-items-center gap-2">
                            <label for="centro_civico">Centros</label>
                            <select class="form-control" id="centro_civico">
                                <option value="c_1">Centro 1</option>
                                <option value="c_2">Centro 2</option>
                                <option value="c_3">Centro 3</option>
                                <option value="c_4">Centro 4</option>
                                <option value="c_5">Centro 5</option>
                            </select>
                        </div>
                    </form>
                    <form>
                        <div class="form-group d-flex flex-direction-row align-items-center gap-2">
                            <label for="edad">Edad</label>
                            <input type="text" class="form-control" id="edad">
                        </div>
                    </form>
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
                    <form>
                        <div class="form-group d-flex flex-direction-row align-items-center gap-2">
                            <label for="horario">Horario</label>
                            <input class="form-control" id="horario">
                        </div>
                    </form>
                </div>
            </div>

            <!--Lista de actividades-->
            <div class="row mt-2">
                <div class="col-12 mt-2 border rounded d-flex flex-direction-row justify-content-between align-items-center">
                    <p class="mt-2">Ciudadano 1</p>
                    <p class="mt-2">Actividad 1</p>
                    <a href="#" class="btn text-white my-2">Apuntarse</a>
                </div>

                <div class="col-12 mt-2 border rounded d-flex flex-direction-row justify-content-between align-items-center">
                    <p class="mt-2">Ciudadano 1</p>
                    <p class="mt-2">Actividad 1</p>
                    <a href="#" class="btn text-white my-2">Apuntarse</a>
                </div>

                <div class="col-12 mt-2 border rounded d-flex flex-direction-row justify-content-between align-items-center">
                    <p class="mt-2">Ciudadano 1</p>
                    <p class="mt-2">Actividad 1</p>
                    <a href="#" class="btn text-white my-2">Apuntarse</a>
                </div>

                <div class="col-12 mt-2 border rounded d-flex flex-direction-row justify-content-between align-items-center">
                    <p class="mt-2">Ciudadano 1</p>
                    <p class="mt-2">Actividad 1</p>
                    <a href="#" class="btn text-white my-2">Apuntarse</a>
                </div>

                <div class="col-12 mt-2 border rounded d-flex flex-direction-row justify-content-between align-items-center">
                    <p class="mt-2">Ciudadano 1</p>
                    <p class="mt-2">Actividad 1</p>
                    <a href="#" class="btn text-white my-2">Apuntarse</a>
                </div>
            </div>
        </div>
    </div>

@endsection
<!-- Bootstrap JS (Opcional si necesitas funcionalidades JS de Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
