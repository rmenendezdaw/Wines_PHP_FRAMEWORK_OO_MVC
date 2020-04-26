-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-03-2020 a las 23:01:00
-- Versión del servidor: 5.7.28-0ubuntu0.18.04.4
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Wines`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `type` varchar(30) NOT NULL,
  `img` varchar(200) NOT NULL,
  `more_visited` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`type`, `img`, `more_visited`) VALUES
('Red', 'view/img/categories/red.png', 4),
('White', 'view/img/categories/white.png', 0),
('Pink', 'view/img/categories/pink.png', 2),
('Blue', 'view/img/categories/blue.png', 8),
('Cava', 'view/img/categories/cava.png', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cellar`
--

CREATE TABLE `cellar` (
  `idcellar` varchar(5) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cellar`
--

INSERT INTO `cellar` (`idcellar`, `name`, `latitude`, `longitude`) VALUES
('AGR01', 'Agribergium', 40.180532, -1.105251),
('ALSO1', 'Alto Sotillo', 27.885111, -15.630523),
('ALT01', 'Aalto', 39.759574, -4.391144),
('BAR01', 'Barcillo', 41.343963, 2.019642),
('PIN01', 'Pingon', 42.326819, -1.873628),
('PRO01', 'Protots', 39.426293, -0.454178),
('REQ01', 'Requiem', 42.462977, -7.416766);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wines`
--

CREATE TABLE `wines` (
  `code` varchar(6) NOT NULL,
  `name` varchar(15) NOT NULL,
  `mark` varchar(15) NOT NULL,
  `type` varchar(15) NOT NULL,
  `grades` int(5) NOT NULL,
  `origin` varchar(20) NOT NULL,
  `year` int(4) NOT NULL,
  `img_wine` varchar(100) NOT NULL,
  `idcellar` varchar(45) DEFAULT NULL,
  `more_visited` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `wines`
--

INSERT INTO `wines` (`code`, `name`, `mark`, `type`, `grades`, `origin`, `year`, `img_wine`, `idcellar`, `more_visited`) VALUES
('0000-A', 'Frexenet', 'Mikelo', 'Red', 11, 'Palencia', 1998, '', NULL, 4),
('0000-U', 'Gavilondo', 'Rioja', 'Red', 12, 'Barcelona', 2000, 'img', 'AGR01', 1),
('0001-B', 'Cavila', 'Verdana', 'Blue', 12, 'Carcaixent', 1994, '', NULL, 2),
('0002-A', 'Dameron', 'Rioja', 'Red', 11, 'Bogota', 1990, 'view/img/carousel/four.jpeg', NULL, 3),
('0003-A', 'Teren', 'Neho', 'White', 12, 'Madrid', 1979, 'view/img/carousel/second.jpeg', 'ALSO1', 0),
('0005-C', 'Chenten', 'Miscel', 'Red', 12, 'Canarias', 1997, '', 'ALT01', 0),
('0010-A', 'Orlo', 'Verdana', 'White', 11, 'Vigo', 1998, '', 'REQ01', 0),
('0011-A', 'Tabat', 'Rosen', 'Pink', 13, 'Francia', 1983, 'view/img/carousel/third.jpeg', NULL, 0),
('0017-A', 'Vulter', 'Rosen', 'Red', 12, 'Carcaixent', 1998, 'img', 'PRO01', 0),
('1111-C', 'Vain', 'Rioja', 'Red', 12, 'Bulgaria', 1977, 'view/img/carousel/first.jpeg', NULL, 0),
('1234-A', 'Toro', 'Rioja', 'Red', 12, 'Barcelona', 2000, 'img', 'BAR01', 0),
('1234-B', 'Toret', 'Neho', 'Pink', 12, 'Barcelona', 1998, '', NULL, 0),
('1235-B', 'Lancer', 'Neho', 'Red', 12, 'Bogota', 1990, '', 'AGR01', 0),
('2222-B', 'Sanil', 'Rioja', 'Red', 12, 'Valencia', 1990, '', 'PIN01', 0),
('2222-D', 'Gallego', 'Rio', 'White', 12, 'Toledo', 1995, '', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cellar`
--
ALTER TABLE `cellar`
  ADD PRIMARY KEY (`idcellar`);

--
-- Indices de la tabla `wines`
--
ALTER TABLE `wines`
  ADD PRIMARY KEY (`code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;