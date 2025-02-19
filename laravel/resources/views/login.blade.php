<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style/styles.css') }}">
</head>
<body>

<div class="login-container container-fluid vh-100 d-flex justify-content-center align-items-center">

    <div class="card shadow-lg">
        <div class="card-body p-5">
            <h2 class="card-title text-center mb-4">Iniciar Sesión</h2>
            <form id="loginForm" action="{{ route('administrador.login') }}" method="POST">

                <!-- Agregar un campo oculto con un token de seguridad. -->
                @csrf

                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" value="{{ old('usuario') }}" autocomplete="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Acceder</button>

            </form>
        </div>
    </div>

</div>

<button id="darkModeToggle" class="btn btn-dark position-fixed top-0 end-0 m-3">
    <i class="bi bi-moon-fill"></i>
</button>

<!-- Mensaje entrante de error. -->
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div id="notification" class="notification">{{ $error }}</div>
    @endforeach
@endif

<<<<<<< HEAD
</body>

@vite(['resources/js/login.js'])

=======
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const loginForm = document.getElementById("loginForm");
        const darkModeToggle = document.getElementById("darkModeToggle");
        const body = document.body;
        const notification = document.getElementById("notification");
        const form = document.getElementById("loginForm");

        /* TODO : Hacer la validación de datos antes de comprobar en BD.

        // Validar form
        loginForm.addEventListener("submit", (e) => {
            e.preventDefault()
            const usuario = document.getElementById("usuario").value
            const password = document.getElementById("password").value

            if (!isValidUsuario(usuario)) {
                alert("El usuario debe ser válido.")
            }

            if (password.length < 8) {
                alert("La contraseña debe tener como mínimo 8 caracteres.")
            }

            console.log("Login exitoso.")
        })

        // Validar usuario
        function isValidUsuario(usuario) {
            // Cualquier carácter alfanumérico.
            const usuarioRegex = /^[\w]+$/
            return usuarioRegex.test(usuario);
        }
         */

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

        // TODO : Bloquear el envío del formulario si hay notificaciones de error (para que no se reseteen las casillas y no se borren los datos introducidos)
        if (notification) {
            form.addEventListener("submit", function (event) {
                if (notification.classList.contains("show")) {
                    event.preventDefault();
                    console.log("Corrige los errores antes de continuar.");
                }
            });
        }
    });
</script>

</body>
>>>>>>> 0af21851df252ea80a62cb7c8a46a51167b75d09
</html>
