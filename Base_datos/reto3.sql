-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 19-02-2025 a las 10:38:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reto3`
--
CREATE DATABASE IF NOT EXISTS `reto3` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `reto3`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--
-- Creación: 19-02-2025 a las 07:28:56
-- Última actualización: 19-02-2025 a las 09:38:06
--

DROP TABLE IF EXISTS `actividades`;
CREATE TABLE `actividades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `dia_1` char(1) NOT NULL,
  `dia_2` char(1) DEFAULT NULL,
  `hora_inicio` varchar(5) NOT NULL,
  `hora_fin` varchar(5) NOT NULL,
  `idioma` varchar(15) NOT NULL,
  `plazas_totales` int(11) NOT NULL,
  `plazas_disponibles` int(11) NOT NULL,
  `plazas_minimas` int(11) NOT NULL,
  `edad_minima` int(11) DEFAULT NULL,
  `edad_maxima` int(11) DEFAULT NULL,
  `imagen` varchar(350) DEFAULT NULL,
  `administrador_id` bigint(20) UNSIGNED DEFAULT NULL,
  `centro_civico_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- RELACIONES PARA LA TABLA `actividades`:
--   `administrador_id`
--       `administradores` -> `id`
--   `centro_civico_id`
--       `centros_civicos` -> `id`
--

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `titulo`, `descripcion`, `fecha_inicio`, `fecha_fin`, `dia_1`, `dia_2`, `hora_inicio`, `hora_fin`, `idioma`, `plazas_totales`, `plazas_disponibles`, `plazas_minimas`, `edad_minima`, `edad_maxima`, `imagen`, `administrador_id`, `centro_civico_id`, `created_at`, `updated_at`) VALUES
(1, 'Yoga Matutino', 'Clase de yoga para comenzar el día con energía y relajación.', '2025-03-01', '2025-06-01', 'L', NULL, '08:00', '09:30', 'Español', 20, 17, 5, 16, NULL, 'actividades/yoga.jpg', 1, 1, '2024-01-10 09:00:00', '2024-01-10 09:00:00'),
(2, 'Taller de Pintura', 'Aprende técnicas básicas de pintura acrílica y óleo.', '2025-04-05', '2025-07-05', 'M', 'J', '17:00', '19:00', 'Español', 15, 11, 5, 12, 30, 'actividades/pintura.jpg', 2, 2, '2024-01-10 09:00:00', '2024-01-10 09:00:00'),
(3, 'Club de Lectura', 'Discusión y análisis de libros de diferentes géneros.', '2025-05-10', '2025-09-10', 'V', NULL, '18:30', '20:00', 'Euskera', 10, 7, 3, 18, NULL, 'actividades/lectura.jpg', 1, 3, '2024-01-10 09:00:00', '2024-01-10 09:00:00'),
(4, 'Danza Moderna', 'Clases de danza contemporánea y expresión corporal.', '2025-03-15', '2025-07-15', 'L', 'J', '19:00', '20:30', 'Español', 20, 15, 8, 14, 35, 'actividades/danza.jpg', 2, 1, '2024-01-10 09:00:00', '2024-01-10 09:00:00'),
(5, 'Cocina Internacional', 'Aprende a preparar platos de diferentes países.', '2025-06-01', '2025-08-31', 'M', NULL, '16:00', '18:00', 'Español', 12, 6, 4, 18, NULL, 'actividades/cocina.jpg', 1, 1, '2024-01-10 09:00:00', '2024-01-10 09:00:00'),
(6, 'Inglés Conversacional', 'Clases prácticas para mejorar tu fluidez en inglés básico.', '2025-04-15', '2025-07-15', 'X', 'V', '10:00', '11:30', 'Inglés', 15, 11, 6, 8, 15, 'actividades/ingles.png', 2, 3, '2024-01-10 09:00:00', '2024-01-10 09:00:00'),
(7, 'Teatro para Principiantes', 'Ejercicios de improvisación y técnicas de actuación básicas.', '2025-05-01', '2025-08-01', 'J', NULL, '19:30', '21:00', 'Euskera', 18, 13, 7, 14, 40, 'actividades/teatro.jpg', 1, 2, '2024-01-10 09:00:00', '2024-01-10 09:00:00'),
(8, 'Fotografía Digital', 'Aprende a usar tu cámara y a editar fotos digitalmente.', '2025-06-15', '2025-09-15', 'V', NULL, '17:00', '19:00', 'Euskera', 14, 8, 5, 16, NULL, 'actividades/fotografia.jpg', 2, 3, '2024-01-10 09:00:00', '2024-01-10 09:00:00'),
(9, 'Jardinería Urbana', 'Taller práctico sobre cómo crear y mantener un huerto en la ciudad.', '2025-04-22', '2025-06-22', 'S', NULL, '10:00', '13:00', 'Español', 18, 12, 6, 16, NULL, 'actividades/jardineria.jpg', 1, 2, '2024-01-10 09:00:00', '2024-01-10 09:00:00'),
(10, 'Escritura Creativa', 'Explora diferentes técnicas y estilos para desarrollar tu potencial como escritor/a juvenil.', '2025-03-08', '2025-05-08', 'X', NULL, '17:30', '19:30', 'Español', 12, 6, 5, 12, 25, 'actividades/escritura.jpg', 2, 3, '2024-01-10 09:00:00', '2024-01-10 09:00:00'),
(11, 'Mindfulness y Meditación', 'Aprende a reducir el estrés y mejorar tu bienestar a través de la atención plena.', '2025-05-15', '2025-07-15', 'M', NULL, '19:00', '20:30', 'Español', 15, 2, 7, 18, NULL, 'actividades/mindfulness.jpg', 1, 1, '2024-01-10 09:00:00', '2024-01-10 09:00:00'),
(12, 'Informática para Mayores', 'Curso básico para aprender a usar el ordenador, internet y el correo electrónico.', '2025-04-01', '2025-06-30', 'L', 'M', '11:00', '12:30', 'Euskera', 10, 6, 5, 50, NULL, 'actividades/informatica.jpg', 2, 2, '2024-01-10 09:00:00', '2024-01-10 09:00:00'),
(13, 'Taller de Memoria', 'Ejercicios para mantener la memoria activa y mejorar la concentración.', '2025-06-05', '2025-08-31', 'X', NULL, '10:30', '12:00', 'Español', 15, 15, 5, 60, NULL, 'actividades/memoria.jpg', 1, 3, '2024-01-10 09:00:00', '2024-01-10 09:00:00'),
(14, 'Gimnasia Suave', 'Ejercicios de bajo impacto para mejorar la movilidad y la flexibilidad.', '2025-04-10', '2025-06-20', 'M', 'J', '09:00', '10:00', 'Euskera', 20, 20, 8, 50, NULL, 'actividades/gimnasia.jpg', 2, 1, '2024-01-10 09:00:00', '2024-01-10 09:00:00'),
(15, 'Historia del Arte', 'Recorrido por los principales movimientos artísticos a través de la historia.', '2025-03-15', '2025-05-30', 'V', NULL, '16:00', '17:30', 'Español', 12, 12, 4, 12, NULL, 'actividades/historia.jpg', 1, 2, '2024-01-10 09:00:00', '2024-01-10 09:00:00'),
(16, 'Taller de Crochet', 'Aprende las técnicas básicas para crear tus propios proyectos de crochet.', '2025-04-01', '2025-06-15', 'L', NULL, '17:00', '19:00', 'Euskera', 10, 10, 5, 13, NULL, 'actividades/crochet.jpg', 2, 3, '2024-01-10 09:00:00', '2024-01-10 09:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--
-- Creación: 19-02-2025 a las 07:28:55
-- Última actualización: 19-02-2025 a las 09:38:06
--

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE `administradores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `codigo_postal` varchar(5) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- RELACIONES PARA LA TABLA `administradores`:
--

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `apellidos`, `dni`, `direccion`, `codigo_postal`, `usuario`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Carlos', 'Fernández López', '28573649S', 'Calle Mayor, 10', '28001', 'carlosf', '$2y$12$aFvUE/Se1TYnETTboPV/JOUaAg6Lnt7xI7mzg4wwMunKIhaeYAaIS', '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(2, 'María', 'García Pérez', '49637285A', 'Avenida de la Paz, 5', '28002', 'mariag', '$2y$12$i/YjR6QHG37paP/SBd9OH.IKWEvkfJvAvAabyGisu0TmPCcd.lpXO', '2025-02-19 09:38:06', '2025-02-19 09:38:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--
-- Creación: 19-02-2025 a las 07:28:56
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `cache`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--
-- Creación: 19-02-2025 a las 07:28:56
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `cache_locks`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros_civicos`
--
-- Creación: 19-02-2025 a las 07:28:56
-- Última actualización: 19-02-2025 a las 09:38:06
--

DROP TABLE IF EXISTS `centros_civicos`;
CREATE TABLE `centros_civicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `codigo_postal` varchar(5) NOT NULL,
  `imagen` varchar(350) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- RELACIONES PARA LA TABLA `centros_civicos`:
--

--
-- Volcado de datos para la tabla `centros_civicos`
--

INSERT INTO `centros_civicos` (`id`, `nombre`, `telefono`, `correo`, `direccion`, `codigo_postal`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Centro Cívico Abetxuko', '945162656', 'cc.lakua.coo@vitoria-gasteiz.org', 'Plaza de la Cooperativa, 8', '01013', 'centros_civicos/abetxuko.png', '2010-01-10 09:00:00', '2010-01-10 09:00:00'),
(2, 'Centro Cívico Aldabe', '945161930', 'cc.aldabe.coo@vitoria-gasteiz.org', 'Calle Portal de Arriaga, 1-A', '01012', 'centros_civicos/aldabe.png', '2010-01-10 09:00:00', '2010-01-10 09:00:00'),
(3, 'Centro Cívico Arana', '945161734', 'cc.arana.coo@vitoria-gasteiz.org', 'Calle Aragón, 7', '01003', 'centros_civicos/arana.png', '2010-01-10 09:00:00', '2010-01-10 09:00:00'),
(4, 'Centro Cívico Ariznabarra', '945162650', 'cc.ariznabarra.coo@vitoria-gasteiz.org', 'Ariznabarra Kalea, 19', '01007', 'centros_civicos/ariznabarra.png', '2010-01-10 09:00:00', '2010-01-10 09:00:00'),
(5, 'Centro Cívico Arriaga', '945161770', 'cc.arriaga.coo@vitoria-gasteiz.org', 'Calle Francisco Javier De Landáburu, 9-A', '01010', 'centros_civicos/arriaga.png', '2010-01-10 09:00:00', '2010-01-10 09:00:00'),
(6, 'Centro Cívico El Campillo', '945161680', 'cc.el_campillo.coo@vitoria-gasteiz.org', 'Calle Santa María, 4', '01001', 'centros_civicos/el_campillo.png', '2010-01-10 09:00:00', '2010-01-10 09:00:00'),
(7, 'Centro Cívico El Pilar', '945161233', 'cc.el_pilar.coo@vitoria-gasteiz.org', 'Plaza de la Constitución, 5', '01012', 'centros_civicos/el_pilar.png', '2010-01-10 09:00:00', '2010-01-10 09:00:00'),
(8, 'Centro Cívico Hegoalde', '945161880', 'cc.hegoalde.coo@vitoria-gasteiz.org', 'Calle de Alberto Schommer, 10', '01006', 'centros_civicos/hegoalde.png', '2010-01-10 09:00:00', '2010-01-10 09:00:00'),
(9, 'Centro Cívico Ibaiondo', '945161813', 'cc.ibaiondo.coo@vitoria-gasteiz.org', 'Landaberde Kalea, 31', '01010', 'centros_civicos/ibaiondo.png', '2010-01-10 09:00:00', '2010-01-10 09:00:00'),
(10, 'Centro Cívico Iparralde', '945161750', 'cc.iparralde.coo@vitoria-gasteiz.org', 'Plaza Zuberoa, 1', '01002', 'centros_civicos/iparralde.png', '2010-01-10 09:00:00', '2010-01-10 09:00:00'),
(11, 'Centro Cívico Judimendi', '945161740', 'cc.judimendi.coo@vitoria-gasteiz.org', 'Avenida Judimendi, 26', '01002', 'centros_civicos/judimendi.png', '2010-01-10 09:00:00', '2010-01-10 09:00:00'),
(12, 'Centro Cívico Lakua', '945162630', 'cc.lakua.coo@vitoria-gasteiz.org', 'Senda Valentín Foronda, 9', '01010', 'centros_civicos/lakua.png', '2010-01-10 09:00:00', '2010-01-10 09:00:00'),
(13, 'Centro Cívico Salburua', '945161637', 'cc.salburua.coo@vitoria-gasteiz.org', 'Avenida Bratislava, 2', '01003', 'centros_civicos/salburua.png', '2010-01-10 09:00:00', '2010-01-10 09:00:00'),
(14, 'Centro Cívico Zabalgana', '945161630', 'cc.zabalgana.coo@vitoria-gasteiz.org', 'Juan Gris Kalea, 12', '01015', 'centros_civicos/zabalgana.png', '2010-01-10 09:00:00', '2010-01-10 09:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadanos`
--
-- Creación: 19-02-2025 a las 07:28:55
-- Última actualización: 19-02-2025 a las 09:38:05
--

DROP TABLE IF EXISTS `ciudadanos`;
CREATE TABLE `ciudadanos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `codigo_postal` varchar(5) NOT NULL,
  `juego_barcos` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- RELACIONES PARA LA TABLA `ciudadanos`:
--

--
-- Volcado de datos para la tabla `ciudadanos`
--

INSERT INTO `ciudadanos` (`id`, `nombre`, `apellidos`, `dni`, `fecha_nacimiento`, `direccion`, `codigo_postal`, `juego_barcos`, `created_at`, `updated_at`) VALUES
(1, 'Alicia', 'Sánchez Jiménez', '12345678Z', '1990-01-01', 'Calle Mayor, 123', '28001', '0J0T0Z3F8N8I8W0L3N6R9H4D5T5D9I0C', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(2, 'Bob', 'Williams Pérez', '98765432M', '2002-01-01', 'Avenida Central, 45', '08001', '8R9H5H7S6J9U8E4K6H1W6C2L8X3N6S7Q', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(3, 'César', 'Jiménez Gil', '45612378L', '1960-01-01', 'Plaza del Sol, 67', '41001', '5E1Z2B3A9J5C6S4G6G6E7F0B5G0L0P7D', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(4, 'Diana', 'Miller Martín', '32178965H', '1950-01-01', 'Calle Luna, 89', '30001', '8R1X4L4F8F8Y4A0I6H2T8T8D0N9N1F7E', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(5, 'Eugenia', 'García Pérez', '74125896J', '2010-01-01', 'Paseo de las Delicias, 10', '29001', '7B4Y8Q1C0U6O0J7J9H8S7P6W5N5J6I3I', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(6, 'Fernando', 'López García', '85296374D', '1985-05-15', 'Calle del Río, 24', '28002', '2C7E3T8B9E1Q8D8F3J0U0F4G4W5S6O5U', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(7, 'Gloria', 'Martínez Ruiz', '15935728Q', '1972-11-03', 'Travesía de la Paz, 1', '08002', '3A0D7A3P7Q5D0X4Q5B0K4W0Z6J8N4L2Y', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(8, 'Hugo', 'Fernández Gómez', '26354789T', '2005-08-22', 'Ronda de la Libertad, 78', '41002', '8V0E5O1T5A8K3A2F2V0L1K5K6P3B9E4C', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(9, 'Irene', 'Sanz Torres', '39586741X', '1998-03-10', 'Camino del Sol, 3', '30002', '7H9M5T3K1K3G5X2W9D5G7D5O6G1B2H0F', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(10, 'Javier', 'Díaz Álvarez', '67891234B', '2015-09-28', 'Plaza Mayor, 5', '29002', '0D6Q8E6E4W4G3L2F4E4T3E2X7L5N5F8J', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(11, 'Koldo', 'Ruiz Dominguez', '74136985V', '2015-04-22', 'Pasaje Maritimo, 134', '35002', '6I5S6C1Z4H0K7N9X0P6F6U0U8O9T9Q0J', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(12, 'Luis', 'Gutierrez Gonzalez', '85274196N', '1988-07-12', 'Callejon Esperanza, 15', '36002', '4D3J4O6F9I0X5C1G7B7E9P2S5U8W6T4O', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(13, 'Marina', 'Marin Flores', '96385274R', '1975-02-05', 'Avenida del Puerto, 22', '37002', '0M6Q2G5W4Y0R5Q1V5H7N1C1Y9S7D9R8G', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(14, 'Nicolas', 'Blazquez Maeso', '75315926K', '2000-06-18', 'Carretera Antigua, 45', '38002', '0W8L2V9W1I1Q8C3B2U0J5H9K9L8G1O5C', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(15, 'Olivia', 'Salazar Merino', '15948732G', '2012-10-30', 'Glorieta de las Estrellas, 12', '39002', '0D0G7Z2S7O5Q2A7O0W3T1D4S4X9D4P9C', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(16, 'Pedro', 'Martínez López', '26483957C', '1978-06-20', 'Calle del Campo, 56', '28003', '2E1P7O5T7N5K1Q3T6Y0K5Q0E7W4C6O3B', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(17, 'Raquel', 'Gómez Sánchez', '34821697P', '2001-04-12', 'Avenida de la Estación, 12', '08003', '1N6T3G4C4A8U0B0M1W8U4X5X8V7E4W3J', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(18, 'Santiago', 'Ruiz Pérez', '76823145F', '1965-12-01', 'Plaza de España, 8', '41003', '7U9X9X5F4T1F6K0S3P7V2B6Y6T0J4W5C', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(19, 'Teresa', 'Fernández García', '87951462Y', '1992-09-05', 'Paseo Marítimo, 34', '30003', '1B6G6V3R3O3K0D7Q9A3Q8T6R8W0H4T4W', '2025-02-19 09:38:05', '2025-02-19 09:38:05'),
(20, 'Víctor', 'Álvarez Jiménez', '91562483W', '2018-02-18', 'Calle del Olivo, 101', '29003', '0B0I0A6V0O0D4X9E8B2M6R8G2Q0G5S8G', '2025-02-19 09:38:05', '2025-02-19 09:38:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--
-- Creación: 19-02-2025 a las 07:28:55
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `failed_jobs`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--
-- Creación: 19-02-2025 a las 07:28:57
-- Última actualización: 19-02-2025 a las 09:38:06
--

DROP TABLE IF EXISTS `inscripciones`;
CREATE TABLE `inscripciones` (
  `id_actividad` bigint(20) UNSIGNED NOT NULL,
  `id_ciudadano` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `inscripciones`:
--   `id_actividad`
--       `actividades` -> `id`
--   `id_ciudadano`
--       `ciudadanos` -> `id`
--

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id_actividad`, `id_ciudadano`, `created_at`, `updated_at`) VALUES
(1, 6, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(1, 9, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(1, 12, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(2, 2, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(2, 8, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(2, 14, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(2, 17, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(3, 1, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(3, 7, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(3, 13, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(4, 2, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(4, 8, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(4, 9, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(4, 14, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(4, 17, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(5, 1, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(5, 6, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(5, 7, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(5, 9, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(5, 12, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(5, 13, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(6, 5, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(6, 10, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(6, 11, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(6, 15, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(7, 1, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(7, 2, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(7, 6, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(7, 8, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(7, 9, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(8, 1, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(8, 6, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(8, 9, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(8, 12, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(8, 14, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(8, 17, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(9, 1, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(9, 6, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(9, 9, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(9, 12, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(9, 13, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(9, 17, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(10, 2, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(10, 5, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(10, 8, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(10, 9, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(10, 14, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(10, 17, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(11, 1, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(11, 3, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(11, 4, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(11, 6, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(11, 7, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(11, 9, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(11, 12, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(11, 13, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(11, 14, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(11, 16, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(11, 17, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(11, 18, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(11, 19, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(12, 3, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(12, 4, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(12, 7, '2025-02-19 09:38:06', '2025-02-19 09:38:06'),
(12, 18, '2025-02-19 09:38:06', '2025-02-19 09:38:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--
-- Creación: 19-02-2025 a las 07:28:55
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `jobs`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--
-- Creación: 19-02-2025 a las 07:28:56
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `job_batches`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--
-- Creación: 19-02-2025 a las 07:28:55
-- Última actualización: 19-02-2025 a las 09:38:05
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `migrations`:
--

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_10_085338_create_ciudadanos_table', 1),
(5, '2025_02_10_085410_create_administradores_table', 1),
(6, '2025_02_10_085415_create_centros_civicos_table', 1),
(7, '2025_02_10_085423_create_actividades_table', 1),
(8, '2025_02_10_085504_create_inscripciones_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--
-- Creación: 19-02-2025 a las 07:28:56
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `password_reset_tokens`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--
-- Creación: 19-02-2025 a las 07:28:55
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `sessions`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--
-- Creación: 19-02-2025 a las 07:28:55
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `users`:
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividades_administrador_id_foreign` (`administrador_id`),
  ADD KEY `actividades_centro_civico_id_foreign` (`centro_civico_id`);

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `administradores_dni_unique` (`dni`),
  ADD UNIQUE KEY `administradores_usuario_unique` (`usuario`),
  ADD KEY `index_login` (`usuario`,`password`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `centros_civicos`
--
ALTER TABLE `centros_civicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciudadanos`
--
ALTER TABLE `ciudadanos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ciudadanos_dni_unique` (`dni`),
  ADD UNIQUE KEY `ciudadanos_juego_barcos_unique` (`juego_barcos`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id_actividad`,`id_ciudadano`),
  ADD KEY `inscripciones_id_ciudadano_foreign` (`id_ciudadano`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `centros_civicos`
--
ALTER TABLE `centros_civicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudadanos`
--
ALTER TABLE `ciudadanos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_administrador_id_foreign` FOREIGN KEY (`administrador_id`) REFERENCES `administradores` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `actividades_centro_civico_id_foreign` FOREIGN KEY (`centro_civico_id`) REFERENCES `centros_civicos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_id_actividad_foreign` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscripciones_id_ciudadano_foreign` FOREIGN KEY (`id_ciudadano`) REFERENCES `ciudadanos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
