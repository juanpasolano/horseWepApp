-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-03-2013 a las 20:37:28
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `horse_backbone`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(123) NOT NULL,
  `phone` varchar(123) NOT NULL,
  `address` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `address`) VALUES
(1, 'Fransisco Perez', '3002145123', 'Finca La Union'),
(2, 'Pepito Mendieta', '3152456985', 'Hacienda Santa Ana'),
(3, 'Ernesto Rojas', '3125628452', 'Finca Porvenir'),
(4, 'Maria Oreja', '3201523652', 'Hacienda Prospero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horses`
--

CREATE TABLE IF NOT EXISTS `horses` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `name` varchar(123) NOT NULL,
  `type` varchar(123) NOT NULL,
  `color` varchar(123) NOT NULL,
  `client` varchar(123) NOT NULL,
  `image` varchar(123) NOT NULL,
  `birthdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Volcar la base de datos para la tabla `horses`
--

INSERT INTO `horses` (`id`, `name`, `type`, `color`, `client`, `image`, `birthdate`) VALUES
(1, 'Furoto', '2', '4', '2', '', '0000-00-00'),
(2, 'Merlano', '3', '4', '1', '', '0000-00-00'),
(28, 'asdasdasd', '2', '2', '', '', '0000-00-00'),
(29, 'asdasda', '', '', '', '', '0000-00-00');
