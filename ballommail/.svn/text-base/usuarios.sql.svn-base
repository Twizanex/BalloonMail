-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-11-2011 a las 06:55:19
-- Versión del servidor: 5.0.92
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mburiano_balloonmail`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `nombres` varchar(45) default '',
  `apellidos` varchar(45) default '',
  `email` varchar(100) default NULL,
  `contrasenia` varchar(32) default NULL,
  `sexo` char(1) default NULL,
  `fechaNacimiento` date default NULL,
  `fechaAlta` date default NULL,
  `foto` varchar(100) default NULL,
  `idPais` int(11) default NULL,
  `idEstado` int(11) default NULL,
  `idEstadoCivil` int(11) default NULL,
  `idPerfil` int(11) NOT NULL default '0',
  `aceptaRespuestasDefecto` tinyint(1) default NULL,
  `recibeMensajesCorrientes` tinyint(1) default NULL,
  `recibeMensajesGenerales` tinyint(1) default NULL,
  `publicaEnBitacora` tinyint(1) default NULL,
  `idIdiomaEscrituraDefecto` int(11) default NULL,
  `idIdiomaLecturaDefecto` int(11) default NULL,
  `ingresaPorPrimeraVez` tinyint(1) default NULL,
  `bloqueado` tinyint(1) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_IdiomasUsuarios_EstadosCiviles1` (`idEstadoCivil`),
  KEY `fk_Usuarios_Estados1` (`idEstado`),
  KEY `fk_Usuarios_Paises1` (`idPais`),
  KEY `fk_Usuarios_Perfiles1` (`idPerfil`),
  KEY `fk_Usuarios_Idiomas1` (`idIdiomaEscrituraDefecto`),
  KEY `fk_Usuarios_Idiomas2` (`idIdiomaLecturaDefecto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `email`, `contrasenia`, `sexo`, `fechaNacimiento`, `fechaAlta`, `foto`, `idPais`, `idEstado`, `idEstadoCivil`, `idPerfil`, `aceptaRespuestasDefecto`, `recibeMensajesCorrientes`, `recibeMensajesGenerales`, `publicaEnBitacora`, `idIdiomaEscrituraDefecto`, `idIdiomaLecturaDefecto`, `ingresaPorPrimeraVez`, `bloqueado`) VALUES
(1, 'Margarita', 'Buriano', 'mburiano@gmail.com', 'bebf85e9d259361589edbe1e77e2bf4f', 'F', '1977-03-16', '2011-11-07', 'perfil1.png', 181, 3124, NULL, 1, 1, 1, 1, 1, 4, 2, NULL, 0),
(2, 'Daniel', 'Daniel', 'daniel@hotmail.com', '698d51a19d8a121ce581499d7b701668', 'M', '1996-05-04', '2011-11-07', 'perfil1.png', 55, 841, NULL, 1, 1, 1, 0, 1, 2, NULL, NULL, 0),
(3, 'Sole', 'Vazquez', 'sosol_bcn@hotmail.com', 'b42baa86b637e1de79baea8dd02bd11f', 'F', '1979-05-24', '2011-11-08', NULL, 175, 2876, NULL, 1, 1, 1, 1, 1, 2, 2, NULL, 0),
(4, 'isabel', 'torner aparicio', 'isabeltorner@yahoo.es', 'ba073cf122db79a88eef1f4c7c0c7089', 'F', '1947-03-01', '2011-11-10', NULL, 175, 2876, NULL, 1, 1, 1, 0, 1, NULL, NULL, NULL, 0),
(5, 'Ximena ', 'Vazquez Torner', 'ximena_vazquez_torner@hotmail.com', 'fef1f68f6ada6e01d5e2f5633a27f4cb', 'F', '1972-03-18', '2011-11-10', 'perfil1.png', 175, 2876, NULL, 1, 1, 1, 0, 1, 6, 2, NULL, 0),
(6, 'Martin', 'Vazquez Torner', 'martinmvt@hotmail.com', '50c5691ec99c967d661174ef33eeb5bc', 'M', '1973-07-28', '2011-11-13', NULL, 175, 2876, NULL, 1, 1, 1, 0, 1, NULL, NULL, NULL, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_IdiomasUsuarios_EstadosCiviles1` FOREIGN KEY (`idEstadoCivil`) REFERENCES `estadosciviles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuarios_Estados1` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuarios_Idiomas1` FOREIGN KEY (`idIdiomaEscrituraDefecto`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuarios_Idiomas2` FOREIGN KEY (`idIdiomaLecturaDefecto`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuarios_Paises1` FOREIGN KEY (`idPais`) REFERENCES `paises` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuarios_Perfiles1` FOREIGN KEY (`idPerfil`) REFERENCES `perfiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
