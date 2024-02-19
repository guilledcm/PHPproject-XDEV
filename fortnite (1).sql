-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2024 a las 16:37:38
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
-- Base de datos: `fortnite`
--

CREATE database fortnite;
use fortnite;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Legendario'),
(2, 'Épico'),
(3, 'Raro'),
(4, 'Poco Común'),
(5, 'Común');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`item_id`, `name`, `description`, `price`, `category_id`, `image_url`) VALUES
(1, 'Black Knight', 'Un guerrero oscuro y misterioso del pasado medieval.', 2000, 1, 'C:\\\\xampp\\\\htdocs\\\\fortniteshop\\\\images\\\\black_night.jpg'),
(2, 'Sparkle Specialist', 'Brilla en la batalla con estilo disco.', 1500, 2, 'images/sparkle_specialist.jpg'),
(3, 'Brite Bomber', 'Colorida y lista para la acción.', 1200, 3, 'images/brite_bomber.jpg'),
(4, 'Recon Scout', 'Explorador experto del terreno.', 800, 4, 'images/recon_scout.jpg'),
(5, 'Renegade Raider', 'Rara skin de la temporada 1, para los verdaderos OG.', 1500, 1, 'images/renegade_raider.jpg'),
(6, 'Raven', 'Misterioso y sombrío como la noche.', 2000, 1, 'images/raven.jpg'),
(7, 'Red Knight', 'El terror de los campos de batalla.', 2000, 1, 'images/red_knight.jpg'),
(8, 'Dark Voyager', 'Perdido en la inmensidad del espacio.', 1500, 2, 'images/dark_voyager.jpg'),
(9, 'Drift', 'De otro mundo y listo para la aventura.', 1500, 2, 'images/drift.jpg'),
(10, 'Omega', 'Equipado hasta los dientes y listo para el fin del mundo.', 2000, 2, 'images/omega.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_category` (`category_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
