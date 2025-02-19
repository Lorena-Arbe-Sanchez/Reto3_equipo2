document.addEventListener('DOMContentLoaded', function() {

    // Guardar los valores de los filtros en localStorage antes de enviar el formulario
    const filtroForm = document.getElementById('filtroForm');
    if (filtroForm) {
        filtroForm.addEventListener('submit', function() {
            localStorage.setItem('centro_civico', document.getElementById('centro_civico').value);
            localStorage.setItem('edad', document.getElementById('edad').value);
            localStorage.setItem('idioma', document.getElementById('idioma').value);
            localStorage.setItem('horario', document.getElementById('horario').value);
            localStorage.setItem('textoBusqueda', document.getElementById('textoBusqueda').value);
        });

        // Restaurar los valores de los filtros desde localStorage al cargar la página
        document.getElementById('centro_civico').value = localStorage.getItem('centro_civico') || '';
        document.getElementById('edad').value = localStorage.getItem('edad') || '';
        document.getElementById('idioma').value = localStorage.getItem('idioma') || 'todos';
        document.getElementById('horario').value = localStorage.getItem('horario') || '';
        document.getElementById('textoBusqueda').value = localStorage.getItem('textoBusqueda') || '';
    }

    const contenedorDni = document.getElementById('contenedorDni');
    if (contenedorDni) {
        contenedorDni.style.visibility = 'hidden';
    }

    // Eventos y lógica existente (apuntarse/inscribirse, resetear, etc.)

    const apuntarseButtons = document.querySelectorAll('[data-bs-toggle="modal"]');

    apuntarseButtons.forEach(button => {
        button.addEventListener('click', function(event) {

            event.preventDefault();

            const actividadData = JSON.parse(this.dataset.actividad);

            // Actualizar el contenido del modal con los datos de la actividad
            document.getElementById('modal-actividad-id').textContent = actividadData.id;
            document.getElementById('modal-actividad-titulo').textContent = actividadData.titulo;
            document.getElementById('modal-actividad-descripcion').textContent = actividadData.descripcion;
            document.getElementById('modal-actividad-idioma').textContent = actividadData.idioma;
            document.getElementById('modal-actividad-horario').textContent = `${actividadData.hora_inicio} - ${actividadData.hora_fin}`;
            document.getElementById('modal-actividad-plazas').textContent = `${actividadData.plazas_disponibles}/${actividadData.plazas_totales}`;
            const edadMinima = actividadData.edad_minima === null ? "∞" : actividadData.edad_minima;
            const edadMaxima = actividadData.edad_maxima === null ? "∞" : actividadData.edad_maxima;
            document.getElementById('modal-actividad-edades').textContent = `${edadMinima} - ${edadMaxima}`;

            // Actualizar la imagen del modal con la de la actividad seleccionada
            const modalImagen = document.getElementById('modal-actividad-imagen');
            modalImagen.src = actividadData.imagen ? `/storage/${actividadData.imagen}` : `/storage/actividades/pintura.png`;
            modalImagen.alt = `Imagen de ${actividadData.titulo}`;

            // Evento del botón "Inscribirse" en el primer modal
            const confirmarApuntarseBtn = document.querySelector('#confirmarApuntarse');
            confirmarApuntarseBtn.addEventListener('click', () => {
                // Mostrar el segundo modal (de la inscripción)
                var inscripcionModal = new bootstrap.Modal(document.getElementById('inscripcionFormModal'));
                inscripcionModal.show();
            });

            var contenedorDni = document.getElementById('contenedorDni');
            var casillaDni = document.getElementById('casillaDni');

            // Evento del botón de confirmar la inscripción en el primer modal
            const confirmarConfirmacionBtn = document.querySelector('#confirmarConfirmacion');
            confirmarConfirmacionBtn.addEventListener('click', async () => {

                // Solamente si el DNI está visible lo validará y permitirá realizar la inscripción. Si no, mostrará su casilla.

                if (contenedorDni.style.visibility === 'hidden') {
                    // Mostrar casilla del DNI a rellenar
                    contenedorDni.style.visibility = 'visible';
                }
                else {
                    // Validar el DNI y realizar inscripción

                    const dni = casillaDni.value;
                    const dniRegex = /^[0-9]{8}[A-Z]$/;

                    if (dni.length !== 9 || !dniRegex.test(dni)) {
                        // todo : Ponerlo como mensaje lateral (mirar login en modo claro)
                        alert("El DNI debe tener 8 números seguidos de una letra mayúscula.");
                        casillaDni.focus();
                    }
                    else {
                        // Se establecerán los datos de "casillaDni" y de "id_actividad" del formulario, y se creará una fila en 'inscripciones'.
                        document.querySelector('#inscripcionFormModal form input[name="id_actividad"]').value = document.getElementById('modal-actividad-id').textContent;
                        // Enviar el formulario
                        document.querySelector('#inscripcionFormModal form').submit();
                        // Si vuelve aquí es que la inserción ha salido bien y se puede continuar.
                        casillaDni.value = "";
                        contenedorDni.style.visibility = 'hidden';
                    }
                }

            });

        });
    });

    const resetearFiltrosBtn = document.getElementById('resetearFiltrosBtn');
    if (resetearFiltrosBtn) {
        resetearFiltrosBtn.addEventListener('click', function() {
            // Resetear cada campo individualmente
            document.getElementById('centro_civico').value = "";
            document.getElementById('edad').value = "";
            document.getElementById('idioma').value = "todos";
            document.getElementById('horario').value = "";
            document.getElementById('textoBusqueda').value = "";

            // Disparar el evento 'submit' para que se recargue la página con los valores por defecto
            document.getElementById('filtroForm').submit();
        });
    }

    // Temporizadores para los mensajes (de 5 segundos)
    const successMessage = document.getElementById('success-message');
    if (successMessage) {
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 5000);
    }

    const dangerMessage = document.getElementById('danger-message');
    if (dangerMessage) {
        setTimeout(function() {
            dangerMessage.style.display = 'none';
        }, 5000);
    }

});
