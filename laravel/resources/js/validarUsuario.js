document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("loginForm");

    loginForm.addEventListener("submit", function (event) {
        const usuario = document.getElementById("usuario").value.trim();
        const password = document.getElementById("password").value.trim();

        if (usuario === "" || password === "") {
            event.preventDefault(); // Evita que se envíe el formulario
            alert("Por favor, completa todos los campos.");
        }
    });


});
