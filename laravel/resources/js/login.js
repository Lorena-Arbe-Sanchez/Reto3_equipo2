document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("loginForm");
    const darkModeToggle = document.getElementById("darkModeToggle");
    const body = document.body;
    const notification = document.getElementById("notification");
    const form = document.getElementById("loginForm");

    // Función para aplicar el modo oscuro
    function applyDarkMode(isDarkMode) {
        if (isDarkMode) {
            body.classList.add("dark-mode");
            darkModeToggle.querySelector("i").classList.replace("bi-moon-fill", "bi-sun-fill");
        } else {
            body.classList.remove("dark-mode");
            darkModeToggle.querySelector("i").classList.replace("bi-sun-fill", "bi-moon-fill");
        }
    }

    // Verificar el estado del modo oscuro al cargar la página
    const storedDarkMode = localStorage.getItem("darkMode");
    if (storedDarkMode === "true") {
        applyDarkMode(true);
    }

    // Dark mode toggle
    darkModeToggle.addEventListener("click", () => {
        body.classList.toggle("dark-mode");
        const isDarkMode = body.classList.contains("dark-mode");
        localStorage.setItem("darkMode", isDarkMode); // Guardar el estado en localStorage
        applyDarkMode(isDarkMode); // Aplicar el modo oscuro
    });

    if (notification) {
        notification.classList.add("show");
        setTimeout(() => {
            notification.classList.remove("show");
        }, 3000);
    }

    if (notification) {
        form.addEventListener("submit", function (event) {
            if (notification.classList.contains("show")) {
                event.preventDefault();
                console.log("Corrige los errores antes de continuar.");
            }
        });
    }
});
