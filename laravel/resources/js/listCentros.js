document.addEventListener('DOMContentLoaded', function() {

    // Código para que el foco no se mantenga y se pueda ocultar el modal de la información al cerrarlo.

    const masInfoModal = document.getElementById('masInfoModal');

    masInfoModal.addEventListener('hide.bs.modal', function (event) {
        // Intentar encontrar el elemento que tiene el foco y quitarlo
        const focusedElement = document.activeElement;
        if (focusedElement) {
            focusedElement.blur(); // Remover el foco del elemento
        }
    });

    // Código para mostrar los datos del centro cívico seleccionado.
    const masInfoButton = document.querySelectorAll('[data-bs-toggle="modal"]');

    masInfoButton.forEach(button => {
        button.addEventListener('click', function(event) {

            event.preventDefault();

            const centroData = JSON.parse(this.dataset.centro);

            // Actualizar el contenido del modal con los datos del centro
            document.getElementById('modal-centro-id').textContent = centroData.id;
            document.getElementById('modal-centro-nombre').textContent = centroData.nombre;
            document.getElementById('modal-centro-telefono').textContent = centroData.telefono;
            document.getElementById('modal-centro-correo').textContent = centroData.correo;
            document.getElementById('modal-centro-direccion').textContent = centroData.direccion;
            document.getElementById('modal-centro-codigo').textContent = centroData.codigo_postal;

            // Actualizar la imagen del modal con la del centro seleccionado
            const modalImagen = document.getElementById('modal-centro-imagen');
            modalImagen.src = centroData.imagen ? `/storage/${centroData.imagen}` : `/storage/centros_civicos/default.png`;
            modalImagen.alt = `Imagen de ${centroData.titulo}`;

        });
    });

});
