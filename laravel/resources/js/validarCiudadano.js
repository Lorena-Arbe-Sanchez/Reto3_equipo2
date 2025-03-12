document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        let isValid = true;
        const errors = {};

        // Obtener valores
        const nombre = document.getElementById("nombre").value.trim();
        const apellidos = document.getElementById("apellidos").value.trim();
        const dni = document.getElementById("dni").value.trim();
        const direccion = document.getElementById("direccion").value.trim();
        const codigoPostal = document.getElementById("codigo_postal").value.trim();
        const juegoBarcos = document.getElementById("juego_barcos").value.trim();

        // Validaciones
        if (!nombre) errors.nombre = "El nombre es obligatorio.";
        if (!apellidos) errors.apellidos = "Los apellidos son obligatorios.";
        if (!dni) {
            errors.dni = "El DNI es obligatorio.";
        } else if (!/^[0-9]{8}[A-Z]$/.test(dni)) {
            errors.dni = "El DNI debe tener 8 números seguidos de una letra mayúscula.";
        }


        if (!direccion) errors.direccion = "La dirección es obligatoria.";
        if (!codigoPostal) {
            errors.codigo_postal = "El código postal es obligatorio.";
        } else if (!/^[0-9]{5}$/.test(codigoPostal)) {
            errors.codigo_postal = "El código postal debe tener 5 dígitos.";
        }

        if (!juegoBarcos) errors.juego_barcos = "El juego de barcos es obligatorio.";

        // Mostrar errores y evitar envío
        document.querySelectorAll(".error-message").forEach(el => el.remove());

        Object.keys(errors).forEach(field => {
            isValid = false;
            const input = document.getElementById(field);
            if (input) {
                const errorDiv = document.createElement("div");
                errorDiv.classList.add("text-danger", "error-message");
                errorDiv.textContent = errors[field];
                input.parentNode.appendChild(errorDiv);
            }
        });

        if (!isValid) event.preventDefault();
    });
});
