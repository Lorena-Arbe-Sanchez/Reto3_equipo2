# Centros cívicos

## Introducción

El Ayuntamiento de Vitoria-Gasteiz ha solicitado el desarrollo de una aplicación web que facilite a los ciudadanos la consulta e inscripción en actividades organizadas en los centros cívicos de la ciudad. Como referencia, desean una solución similar (pero no idéntica) a la disponible en su sede electrónica: [https://sedeelectronica.vitoria-gasteiz.org](https://sedeelectronica.vitoria-gasteiz.org/).

---

## Características

- **Consulta de actividades:** Los ciudadanos podrán consultar todas las actividades disponibles en los centros cívicos.
- **Inscripción en actividades:** Los ciudadanos podrán inscribirse en las actividades de su interés.

---

## Funcionalidades principales

### Para ciudadanos:
- **Consulta de actividades ofertadas** con filtros por:
  - Ubicación
  - Edad
  - Idioma
  - Horario
- **Inscripción en actividades** de interés.

### Para administradores:
- **Gestión de actividades** (creación, modificación y eliminación).
- **Consulta de participantes inscritos.**

---

## Posibles innovaciones

- **Implementadas:**
  - **Visualización de centros:** Poder visualizar aparte de las actividades ofertadas, también el listado de centros disponibles (con sus datos) y la navegación directa a sus actividades.
  - **Consulta de inscripciones y posibilidad de eliminación:** Tener la opción de eliminar las inscripciones deseadas del listado con filtros de la ventana correspondiente.
  - **Creación de ciudadanos:** Poder crear ciudadanos, para que en el caso de no querer/poder inscribirse en una actividad mediante el código de la TMC (que es igual que el número de DNI), se pueda inscribir con sus datos personales.

- **Mejoras de cara al futuro:**
  - **Juego de barcos:** Implementación de la inscripción a una actividad mediante el juego de barcos de la TMC (combinación de 16 caracteres numéricos y 16 letras, cada número asociado a una letra, como proceso de autenticación). 
  - **Cambio de idioma:** Conseguir programar la funcionalidad del cambio de idioma en la página, mediante las dos opciones del header. 
  - **Mis actividades:** Ofrecer la posibilidad de visualizar y gestionar las actividades creadas por el administrador logueado, para poder acceder a ellas más fácilmente.
  - **Adición de ventanas y funcionalidades:** Crear una ventana principal con un carrousel y un menú de navegación para poder acceder posteriormente a otras ventanas u opciones.
  - **Notificaciones automáticas:** Envío de notificaciones a los usuarios (mediante una nueva columna llamada "correo" en "ciudadanos") para informar sobre sus inscripciones realizadas en las actividades, anunciando nuevas actividades o cambios en las existentes. 
  - **Integración con redes sociales:** Permitir a los usuarios compartir actividades en sus redes sociales. 
  - **Sistema de valoración:** Los usuarios pueden valorar y dejar comentarios sobre las actividades en las que han participado. 
  - **Aplicación móvil:** Desarrollo de una aplicación móvil complementaria para facilitar el acceso a las funciones principales desde cualquier dispositivo.

---

## Estructura del proyecto

```plaintext
.
├── app
│   ├── Http
│   ├── Models
│   └── Providers
├── bootstrap
├── config
├── database
│   ├── factories
│   ├── migrations
│   └── seeders
├── public
├── resources
│   ├── css
│   ├── js
│   └── views
├── routes
├── storage
├── tests
└── vendor
```

---

## Documentación

- **Guía de usuario:** Instrucciones detalladas para los usuarios sobre cómo utilizar la aplicación.
- **Guía de administración:** Instrucciones para los administradores sobre cómo gestionar las actividades y las inscripciones.
- **Manual de despliegue:** Documentación del despliegue utilizado en la aplicación, incluyendo explicaciones detalladas e imágenes.

---

## Tecnologías utilizadas

- **Laravel:** Framework de PHP utilizado para el desarrollo de la aplicación.
- **MySQL:** Base de datos utilizada para almacenar la información de las actividades y los usuarios.
- **JavaScript:** Lenguaje utilizado para el desarrollo del front-end de la aplicación.
- **Bootstrap:** Framework CSS utilizado para el diseño y la maquetación de la aplicación.

---

## Instalación y configuración

### 1. Clonar el repositorio y cambiar de directorio

```bash
cd C:\xampp\htdocs
git clone https://github.com/Lorena-Arbe-Sanchez/Reto3_equipo2.git
cd Reto3_equipo2
cd laravel
```

### 2. Iniciar la aplicación "XAMPP"

Iniciar los servicios (pulsando "Start") de **Apache** y **MySQL** desde el panel de control.

### 3. Instalar dependencias

```bash
composer install
npm install
```

### 4. Configurar archivo .env

Configurar las variables necesarias, como la conexión a la base de datos.

### 5. Compilar recursos

```bash
npm run build
npm run dev
```

### 6. Generar claves

Ejecutar estos comandos en caso de ser necesario debido a errores en la ventana.

```bash
php artisan key:generate
php artisan jwt:secret
```

### 7. Migrar la base de datos

Crear la Database en la parte superior derecha de PhpStorm (name `reto3`, port `3307`, user `root`) y ejecutar:

```bash
php artisan migrate
```

---

### 8. Poblar la base de datos con datos iniciales

```bash
php artisan db:seed
```

---

### 9. Crear enlace simbólico para recursos estáticos (imágenes y estilos)

```bash
php artisan storage:link
```

---

## Uso

- **Iniciar el servidor:** Ejecutar `php artisan serve` y acceder a la aplicación en `http://localhost:8000`.
- **Acceso de administrador:** Las credenciales de un administrador de prueba son: "carlosf" y "contra123".

---

## Más documentación

- [Figma](https://www.figma.com/design/hePF8rcjsbKDYCFhA7iP3i/Dise%C3%B1os?node-id=0-1&t=fbZAAqFQxlsKT93G-1)

---

## Autores

- 👨‍💻 [@Aritz Saiz González](https://github.com/AritzSaiz)
- 👨‍💻 [@Julen Corpas Domínguez](https://github.com/JulenCorpas2004)
- 👩‍💻 [@Lorena Arbé Sánchez](https://github.com/Lorena-Arbe-Sanchez)

---

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.

---

> 🚀 **¡Gracias por usar nuestra aplicación!**  
> 💡 *Si tienes preguntas o sugerencias, no dudes en contactarnos.*