document.addEventListener('DOMContentLoaded', function() {
    const centroCivicoSelect = document.getElementById('centro_civico');
    const actividadSelect = document.getElementById('actividad');

    // Función para guardar los filtros en localStorage
    function guardarFiltros() {
        localStorage.setItem('centroCivicoId', centroCivicoSelect.value);
        localStorage.setItem('actividadId', actividadSelect.value);
    }

    // Función para cargar los filtros desde localStorage y aplicar el filtro
    function cargarFiltros() {
        const centroCivicoId = localStorage.getItem('centroCivicoId');
        const actividadId = localStorage.getItem('actividadId');

        // Establecer el valor del selector de Centro Cívico
        if (centroCivicoId) {
            centroCivicoSelect.value = centroCivicoId;
        }

        // Cargar actividades y establecer el valor del selector de Actividad
        cargarActividades(centroCivicoId, actividadId);
    }

    // Función para cargar actividades (todas o por centro) y seleccionar la actividad previamente seleccionada
    function cargarActividades(centroId, actividadId) {
        // Limpiar el selector de actividades
        actividadSelect.innerHTML = '<option value="">Todas</option>';

        let url = centroId ? `/actividad/centro/${centroId}` : '/actividad/todas';

        fetch(url)
            .then(response => response.json())
            .then(actividades => {
                actividades.forEach(actividad => {
                    const option = document.createElement('option');
                    option.value = actividad.id;
                    option.textContent = actividad.titulo;

                    if (actividadId && actividad.id === actividadId) {
                        option.selected = true;
                    }

                    actividadSelect.appendChild(option);
                });
            });
    }

    // Evento al cambiar el centro cívico
    centroCivicoSelect.addEventListener('change', function() {
        const centroId = this.value;
        cargarActividades(centroId);
        guardarFiltros();
    });

    // Evento al cambiar la actividad (solo guardar en localStorage)
    actividadSelect.addEventListener('change', guardarFiltros);

    // Cargar los filtros al cargar la página (esto iniciará proceso entero)
    cargarFiltros();
});
