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
                            <label for="ciudadano" class="form-label mb-0">Ciudadano</label>
                            <input type="text" class="form-control" id="ciudadano">
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

            <!--Lista de actividades-->
            <div class="row mt-2 w-75 mx-auto border rounded px-2 pb-2">
                <div class="col-12 mt-2 border rounded d-flex flex-direction-row justify-content-around align-items-center">
                    <p class="my-2">Ciudadano 1</p>
                    <p class="my-2">Actividad 1</p>
                </div>

                <div class="col-12 mt-2 border rounded d-flex flex-direction-row justify-content-around align-items-center">
                    <p class="my-2">Ciudadano 1</p>
                    <p class="my-2">Actividad 1</p>
                </div>

                <div class="col-12 mt-2 border rounded d-flex flex-direction-row justify-content-around align-items-center">
                    <p class="my-2">Ciudadano 1</p>
                    <p class="my-2">Actividad 1</p>
                </div>

                <div class="col-12 mt-2 border rounded d-flex flex-direction-row justify-content-around align-items-center">
                    <p class="my-2">Ciudadano 1</p>
                    <p class="my-2">Actividad 1</p>
                </div>

                <div class="col-12 mt-2 border rounded d-flex flex-direction-row justify-content-around align-items-center">
                    <p class="my-2">Ciudadano 1</p>
                    <p class="my-2">Actividad 1</p>
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
