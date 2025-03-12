import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/listActividades.js',
                'resources/js/listCentros.js',
                'resources/js/listInscripciones.js',
                'resources/js/login.js',
                'resources/js/validar.js',
                'resources/js/validarCiudadano.js',
                'resources/js/validarUsuario.js'

            ],
            refresh: true,
        }),
    ],
});
