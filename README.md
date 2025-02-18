# Centros cívicos

## Introducción

El Ayuntamiento de Vitoria-Gasteiz ha solicitado el desarrollo de una aplicación web que facilite a los ciudadanos la consulta e inscripción en actividades organizadas en los centros cívicos de la ciudad. Como referencia, desean una solución similar (pero no idéntica) a la disponible en su sede electrónica: [https://sedeelectronica.vitoria-gasteiz.org](https://sedeelectronica.vitoria-gasteiz.org/).

---

## Características principales

- **Consulta de actividades:** Los ciudadanos podrán consultar todas las actividades disponibles en los centros cívicos.
- **Inscripción en actividades:** Los ciudadanos podrán inscribirse en las actividades de su interés.

---

## Funcionalidades principales

### Para ciudadanos:
- **Consulta de actividades disponibles** con filtros por:
  - Ubicación
  - Edad
  - Idioma
  - Horario
- **Inscripción en actividades.**

### Para administradores:
- **Gestión de actividades:** Creación, modificación y eliminación de actividades.
- **Gestión de inscripciones y participantes:** Consulta y administración de las inscripciones y los participantes.

---

## Posibles innovaciones

- 

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

### 1. Clonar el Repositorio

```bash
git clone https://github.com/Lorena-Arbe-Sanchez/Reto3_equipo2.git
cd Reto3_equipo2
```

### 2. Instalar Dependencias

```bash
composer install
npm install
```

### 3. Configurar el Archivo .env

Copiar el archivo `.env.example` a `.env` y configurar las variables necesarias, como la conexión a la base de datos.

### 4. Generar la Clave de la Aplicación

```bash
php artisan key:generate
```

### 5. Migrar la Base de Datos

```bash
php artisan migrate
```

### 6. Compilar los Recursos

```bash
npm run dev
```

---

## Uso

- **Iniciar el servidor:** Ejecutar `php artisan serve` y acceder a la aplicación en `http://localhost:8000`.
- **Acceso de administrador:** Las credenciales de un administrador de ejemplo son: "carlosf" y "contra123".

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