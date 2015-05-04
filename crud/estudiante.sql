-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2014 a las 01:04:14
-- Versión del servidor: 5.6.15-log
-- Versión de PHP: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `estudiante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospersonales`
--

CREATE TABLE IF NOT EXISTS `datospersonales` (
  `CEDULA` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRES` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDOS` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `FECHA_NAC` date NOT NULL,
  `TEL` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `DIR` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`CEDULA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datospersonales`
--

INSERT INTO `datospersonales` (`CEDULA`, `NOMBRES`, `APELLIDOS`, `FECHA_NAC`, `TEL`, `DIR`) VALUES
('213213213', 'Jordan Mol', 'A', '1984-09-07', '321321', 'Calle 7'),
('2251251325', 'JUAN CA', 'GALINDO', '2014-09-11', '8888-8888', 'ARJ AP 125'),
('2273744', 'PERCI JUN', 'ALVARES', '1972-05-05', '2222-2222', '55 RIOS');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
