

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine`
-- contraseña del administrador, admin
-- contraseña de serafina, serafina
--
CREATE DATABASE IF NOT EXISTS `cine` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `cine`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_butacasc`
--

CREATE TABLE IF NOT EXISTS `compra_butacasc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sesion_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `butaca` int(11) DEFAULT NULL,
  `id_factura` int(11) DEFAULT NULL,
  `qr_code` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sesion_id` (`sesion_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `id_factura` (`id_factura`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `compra_butacasc`
--

INSERT INTO `compra_butacasc` (`id`, `sesion_id`, `usuario_id`, `butaca`, `id_factura`, `qr_code`) VALUES
(1, 1, 1, 5, 1, NULL),
(2, 2, 5, 6, 2, NULL),
(3, 3, 2, 7, 3, NULL),
(4, 4, 4, 8, 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generoc`
--

CREATE TABLE IF NOT EXISTS `generoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `generoc`
--

INSERT INTO `generoc` (`id`, `nombre`) VALUES
(1, 'Acción'),
(2, 'Comedia'),
(3, 'Drama'),
(4, 'Ciencia Ficción'),
(5, 'Romance'),
(6, 'Suspense'),
(7, 'Terror'),
(8, 'Dibujos Animados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numeracionfacturasc`
--

CREATE TABLE IF NOT EXISTS `numeracionfacturasc` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) NOT NULL,
  PRIMARY KEY (`id_factura`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `numeracionfacturasc`
--

INSERT INTO `numeracionfacturasc` (`id_factura`, `numero_factura`) VALUES
(1, 1001),
(2, 1002),
(3, 1003),
(4, 1004);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculasc`
--

CREATE TABLE IF NOT EXISTS `peliculasc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `argumento` varchar(500) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cartel` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `clasificacion_edad` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `genero_id` (`genero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `peliculasc`
--

INSERT INTO `peliculasc` (`id`, `nombre`, `argumento`, `cartel`, `clasificacion_edad`, `genero_id`) VALUES
(1, 'Pelicula Acción', 'Argumento de Pelicula Acción', 'cartel_accion.jpg', 'Mayores 18', 1),
(2, 'Pelicula Comedia', 'Argumento de Pelicula Comedia', 'cartel_comedia.jpg', 'Mayores 13', 2),
(3, 'Pelicula Drama', 'Argumento de Pelicula Drama', 'cartel_drama.jpg', 'Mayores 13', 3),
(4, 'Pelicula Ciencia Ficción', 'Argumento de Pelicula Ciencia Ficción', 'cartel_cFiccion.jpg', 'Mayores 13', 4),
(5, 'Pelicula Romance', 'Argumento de Pelicula Romance', 'cartel_romance.jpg', 'Mayores 13', 5),
(6, 'Pelicula Suspense', 'Argumento de Pelicula Suspense', 'cartel_suspense.jpg', 'Mayores 18', 6),
(7, 'Pelicula Terror', 'Argumento de Pelicula Terror', 'cartel_terror.jpg', 'Mayores 18', 7),
(8, 'Pelicula Dibujos Animados', 'Argumento de Dibujos Animados', 'cartel_dibujos.jpg', 'Todos los públicos', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas_personalc`
--

CREATE TABLE IF NOT EXISTS `peliculas_personalc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pelicula_id` int(11) DEFAULT NULL,
  `personal_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pelicula_id` (`pelicula_id`),
  KEY `personal_id` (`personal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas_personalc`
--

INSERT INTO `peliculas_personalc` (`id`, `pelicula_id`, `personal_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 2),
(4, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personalc`
--

CREATE TABLE IF NOT EXISTS `personalc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `tipo` enum('Actor','Actriz','Director') COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `imagen` varchar(90) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `personalc`
--

INSERT INTO `personalc` (`id`, `nombre`, `tipo`, `imagen`) VALUES
(1, 'Actor 1', 'Actor', 'actor1.jpg'),
(2, 'Actor 2', 'Actor', 'actor2.jpg'),
(3, 'Actriz 1', 'Actriz', 'actriz1.jpg'),
(4, 'Director 1', 'Director', 'director1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salasc`
--

CREATE TABLE IF NOT EXISTS `salasc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `num_butacas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `salasc`
--

INSERT INTO `salasc` (`id`, `nombre`, `num_butacas`) VALUES
(1, 'Sala 3D', 120),
(2, 'Sala VIP', 90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesionesc`
--

CREATE TABLE IF NOT EXISTS `sesionesc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `sala_id` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `pelicula_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pelicula_id` (`pelicula_id`),
  KEY `sala_id` (`sala_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `sesionesc`
--

INSERT INTO `sesionesc` (`id`, `fecha`, `hora`, `sala_id`, `precio`, `pelicula_id`) VALUES
(1, '2023-12-18', '14:00:00', 1, '16.80', 1),
(2, '2023-12-18', '17:00:00', 1, '12.50', 2),
(3, '2023-12-18', '15:30:00', 2, '11.90', 3),
(4, '2023-12-18', '18:30:00', 2, '13.75', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosc`
--

CREATE TABLE IF NOT EXISTS `usuariosc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `NIF` varchar(9) COLLATE utf8mb4_spanish_ci NOT NULL,
  `activo` tinyint(1) DEFAULT 0,
  `avatar` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT 'default.jpg',
  `hash_pass` varchar(256) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol` enum('administrador','cliente') COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuariosc`
--

INSERT INTO `usuariosc` (`id`, `correo`, `nombre`, `apellidos`, `NIF`, `activo`, `avatar`, `hash_pass`, `rol`) VALUES
(1, 'venancioblanco2023@gmail.com', 'Serafina', 'Martín Marcos', '12345678a', 1, 'avatar1.jpg', '$2y$10$dERNtSx87UFoGPZSDtgysuKcsu0UvI5ogQ6rcXA9D0ITnupy.rsOu', 'cliente'),
(2, 'ejemplo2@example.com', 'Antonio', 'Rodríguez López', '98765432b', 0, 'avatar2.jpg', 'hash_pass_2', 'cliente'),
(3, 'admin@cine.com', 'Laura', 'Martínez García', '45678901c', 1, 'avatar3.jpg', '$2y$10$dVJvvi9YQq8ugT12sPYGROu37m19v8KKCs9PhDd9SY4Ulek38mZLC', 'administrador'),
(4, 'ejemplo4@example.com', 'Carlos', 'Fernández Sánchez', '34567890d', 1, 'avatar4.jpg', 'hash_pass_4', 'cliente'),
(5, 'ejemplo5@example.com', 'Sofía', 'López Hernández', '23456789e', 0, 'avatar5.jpg', 'hash_pass_5', 'cliente');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra_butacasc`
--
ALTER TABLE `compra_butacasc`
  ADD CONSTRAINT `compra_butacasc_ibfk_1` FOREIGN KEY (`sesion_id`) REFERENCES `sesionesc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_butacasc_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuariosc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_butacasc_ibfk_3` FOREIGN KEY (`id_factura`) REFERENCES `numeracionfacturasc` (`id_factura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peliculasc`
--
ALTER TABLE `peliculasc`
  ADD CONSTRAINT `peliculasc_ibfk_1` FOREIGN KEY (`genero_id`) REFERENCES `generoc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peliculas_personalc`
--
ALTER TABLE `peliculas_personalc`
  ADD CONSTRAINT `peliculas_personalc_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculasc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peliculas_personalc_ibfk_2` FOREIGN KEY (`personal_id`) REFERENCES `personalc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesionesc`
--
ALTER TABLE `sesionesc`
  ADD CONSTRAINT `sesionesc_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculasc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sesionesc_ibfk_2` FOREIGN KEY (`sala_id`) REFERENCES `salasc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
