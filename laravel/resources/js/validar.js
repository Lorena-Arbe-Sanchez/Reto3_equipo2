document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formulario").addEventListener("submit", function (event) {
        event.preventDefault(); // Evita el envío del formulario

        let errores = [];

        let titulo = document.getElementById("titulo").value.trim();
        let descripcion = document.getElementById("descripcion").value.trim();
        let idioma = document.getElementById("idioma").value.trim();
        let fecha_ini = document.getElementById("fecha_ini").value.trim();
        let fecha_fin = document.getElementById("fecha_fin").value.trim();
        let hora_inicio = document.getElementById("hora_inicio").value.trim();
        let hora_fin = document.getElementById("hora_fin").value.trim();
        let plazas_totales = document.getElementById("plazas_totales").value.trim();
        let plazas_minimas = document.getElementById("plazas_minimas").value.trim();
        let dia1 = document.getElementById("dia_1").value.trim();
        let dia2 = document.getElementById("dia_2").value.trim();
        let edad_minima = document.getElementById("edad_minima").value.trim();
        let edad_maxima = document.getElementById("edad_maxima").value.trim();
        let imagen = document.getElementById("imagen").files[0];

        // Validar Título
        if (titulo === "" || titulo.length > 30) {
            errores.push("El título es obligatorio y no puede superar 30 caracteres.");
        }

        // Validar Descripción
        if (descripcion === "" || descripcion.length > 300) {
            errores.push("La descripción es obligatoria y no puede superar 300 caracteres.");
        }

        // Validar Fecha de inicio y fin
        if (fecha_ini === "") {
            errores.push("La fecha de inicio es obligatoria.");
        }
        if (fecha_fin === "") {
            errores.push("La fecha de fin es obligatoria.");
        }
        if (fecha_ini > fecha_fin) {
            errores.push("La fecha de inicio debe ser anterior o igual a la fecha de fin.");
        }

        // Validar días de la semana (L, M, X, J, V, S, D)
        let diasValidos = ["L", "M", "X", "J", "V", "S", "D"];
        if (!diasValidos.includes(dia1)) {
            errores.push("El día 1 debe ser un valor válido (L, M, X, J, V, S, D).");
        }
        if (dia2 !== "" && !diasValidos.includes(dia2)) {
            errores.push("El día 2 debe ser un valor válido (L, M, X, J, V, S, D) o estar vacío.");
        }

        // Validar Horas
        if (hora_inicio === "") {
            errores.push("La hora de inicio es obligatoria.");
        }
        if (hora_fin === "") {
            errores.push("La hora de fin es obligatoria.");
        }

        // Validar Idioma
        if (idioma === "" || idioma.length > 15) {
            errores.push("El idioma es obligatorio y no puede superar 15 caracteres.");
        }

        // Validar Plazas
        if (plazas_totales === "" || isNaN(plazas_totales) || plazas_totales < 1) {
            errores.push("Las plazas totales son obligatorias y deben ser un número mayor que 0.");
        }
        if (plazas_minimas === "" || isNaN(plazas_minimas) || plazas_minimas < 1) {
            errores.push("Las plazas mínimas son obligatorias y deben ser un número mayor que 0.");
        }

        // Validar Edades
        if (edad_minima !== "" && (isNaN(edad_minima) || edad_minima < 0)) {
            errores.push("La edad mínima debe ser un número positivo.");
        }
        if (edad_maxima !== "" && (isNaN(edad_maxima) || edad_maxima < 0)) {
            errores.push("La edad máxima debe ser un número positivo.");
        }
        if (edad_minima !== "" && edad_maxima !== "" && parseInt(edad_minima) > parseInt(edad_maxima)) {
            errores.push("La edad mínima no puede ser mayor que la edad máxima.");
        }


        // Validar Imagen
        if (imagen) {
            let formatosValidos = ["image/jpeg", "image/png", "image/jpg", "image/gif", "image/svg+xml"];
            if (!formatosValidos.includes(imagen.type)) {
                errores.push("El formato de la imagen no es válido. Solo se permiten JPEG, PNG, JPG, GIF o SVG.");
            }
            if (imagen.size > 2048000) { // 2MB en bytes
                errores.push("La imagen no puede superar los 2MB.");
            }
        }

        // Mostrar errores y evitar envío si hay errores
        if (errores.length > 0) {
            alert(errores.join("\n"));
            return;
        }

        // Si no hay errores, se puede enviar el formulario
        this.submit();
    });
});
