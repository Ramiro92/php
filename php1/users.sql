-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2017 a las 00:04:03
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `carnet` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `trabajograduacion` date NOT NULL,
  `egreso` date NOT NULL,
  `graduacion` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`carnet`, `id`, `first_name`, `last_name`, `image`, `trabajograduacion`, `egreso`, `graduacion`) VALUES
(0, 18, 'Joseph', 'Harman', '1.jpg', '0000-00-00', '0000-00-00', '0000-00-00'),
(0, 19, 'John', 'Moss', '4.jpg', '2017-07-28', '0000-00-00', '0000-00-00'),
(0, 20, 'Lillie', 'Ferrarium', '3.jpg', '0000-00-00', '0000-00-00', '0000-00-00'),
(0, 21, 'Yolanda', 'Green', '5.jpg', '0000-00-00', '0000-00-00', '0000-00-00'),
(0, 22, 'Cara', 'Gariepy', '7.jpg', '0000-00-00', '0000-00-00', '0000-00-00'),
(0, 23, 'Christine', 'Johnson', '11.jpg', '0000-00-00', '0000-00-00', '0000-00-00'),
(0, 24, 'Alana', 'Decruze', '12.jpg', '0000-00-00', '0000-00-00', '0000-00-00'),
(0, 25, 'Krista', 'Correa', '13.jpg', '0000-00-00', '0000-00-00', '0000-00-00'),
(0, 26, 'Charles', 'Martin', '14.jpg', '0000-00-00', '0000-00-00', '0000-00-00'),
(0, 70, 'Cindy', 'Canady', '18211.jpg', '0000-00-00', '0000-00-00', '0000-00-00'),
(0, 73, 'Daphne', 'Frost', '8288.jpg', '0000-00-00', '0000-00-00', '0000-00-00'),
(0, 69, 'Frank', 'Lemons', '22610.jpg', '0000-00-00', '0000-00-00', '0000-00-00'),
(0, 66, 'Margaret', 'Ault', '14365.jpg', '0000-00-00', '0000-00-00', '0000-00-00'),
(0, 71, 'Christina', 'Wilke', '9248.jpg', '0000-00-00', '0000-00-00', '0000-00-00'),
(0, 68, 'Roy', 'Newton', '27282.jpg', '0000-00-00', '0000-00-00', '0000-00-00'),
(2011, 74, 'Ramiro', 'Amaya', '19420.jpg', '2017-07-30', '0000-00-00', '0000-00-00'),
(0, 75, '', '', '', '2017-07-13', '0000-00-00', '0000-00-00'),
(0, 76, '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(0, 77, '', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(2011, 78, 'Jorge', 'Reyes', '11722.jpg', '2017-07-27', '0000-00-00', '0000-00-00'),
(23, 79, 'JorgeA', 'Amaya', '25176.jpg', '2017-07-01', '2017-11-30', '2018-05-12'),
(0, 81, 'Hendrix', 'Alberto', '24037.jpg', '2017-07-13', '2017-07-14', '2017-07-21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
