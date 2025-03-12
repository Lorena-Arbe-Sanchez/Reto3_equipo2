document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formCiudadano").addEventListener("submit", function (event) {
        let isValid = true;
        let errorMessages = [];

        // Obtener valores
        const nombre = document.getElementById("nombre").value.trim();
        const apellidos = document.getElementById("apellidos").value.trim();
        const dni = document.getElementById("dni").value.trim();
        const direccion = document.getElementById("direccion").value.trim();
        const codigoPostal = document.getElementById("codigo_postal").value.trim();
        const juegoBarcos = document.getElementById("juego_barcos").value.trim();

        // Validaciones
        if (!nombre) errorMessages.push("El nombre es obligatorio.");
        if (!apellidos) errorMessages.push("Los apellidos son obligatorios.");
        if (!dni) {
            errorMessages.push("El DNI es obligatorio.");
        } else if (!/^[0-9]{8}[A-Z]$/.test(dni)) {
            errorMessages.push("El DNI debe tener 8 números seguidos de una letra mayúscula.");
        }
        if (!direccion) errorMessages.push("La dirección es obligatoria.");
        if (!codigoPostal) {
            errorMessages.push("El código postal es obligatorio.");
        } else if (!/^[0-9]{5}$/.test(codigoPostal)) {
            errorMessages.push("El código postal debe tener 5 dígitos.");
        }
        if (!juegoBarcos) errorMessages.push("El juego de barcos es obligatorio.");

        // Mostrar alert si hay errores y evitar envío
        if (errorMessages.length > 0) {
            event.preventDefault();
            alert("Errores encontrados:\n\n" + errorMessages.join("\n"));
        }
    });
});
