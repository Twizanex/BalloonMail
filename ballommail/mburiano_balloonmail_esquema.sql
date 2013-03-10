-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-11-2011 a las 05:52:23
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
-- Estructura de tabla para la tabla `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
CREATE TABLE IF NOT EXISTS `bitacora` (
  `id` int(11) NOT NULL auto_increment,
  `texto` varchar(450) default NULL,
  `fechaHora` datetime default NULL,
  `link` varchar(200) default NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_Bitacora_Usuarios1` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `claveslenguajes`
--

DROP TABLE IF EXISTS `claveslenguajes`;
CREATE TABLE IF NOT EXISTS `claveslenguajes` (
  `id` int(11) NOT NULL auto_increment,
  `clave` varchar(50) NOT NULL,
  `idIdioma` int(11) NOT NULL,
  `valor` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_ClavesLenguajes_Idiomas1` (`idIdioma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conexiones`
--

DROP TABLE IF EXISTS `conexiones`;
CREATE TABLE IF NOT EXISTS `conexiones` (
  `id` int(11) NOT NULL auto_increment,
  `fecha` datetime default NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

DROP TABLE IF EXISTS `contactos`;
CREATE TABLE IF NOT EXISTS `contactos` (
  `id` int(11) NOT NULL auto_increment,
  `aceptado` varchar(45) default '0',
  `fechaHoraAceptacion` datetime default NULL,
  `bloqueado` int(11) default '0',
  `fechaHoraBloqueo` datetime default NULL,
  `idUsuario` int(11) NOT NULL,
  `idUsuarioContacto` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_Contactos_Usuarios1` (`idUsuario`),
  KEY `fk_Contactos_Usuarios2` (`idUsuarioContacto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `continentes`
--

DROP TABLE IF EXISTS `continentes`;
CREATE TABLE IF NOT EXISTS `continentes` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corrientes`
--

DROP TABLE IF EXISTS `corrientes`;
CREATE TABLE IF NOT EXISTS `corrientes` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(450) default NULL,
  `active` tinyint(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corrientesusuarios`
--

DROP TABLE IF EXISTS `corrientesusuarios`;
CREATE TABLE IF NOT EXISTS `corrientesusuarios` (
  `id` int(11) NOT NULL auto_increment,
  `idCorriente` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_Corriente_has_Usuarios_Corriente1` (`idCorriente`),
  KEY `fk_Corriente_has_Usuarios_Usuarios1` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Relacion muchos a muchos entre usuarios y corrientes' AUTO_INCREMENT=84 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `idPais` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_Estados_Paises1` (`idPais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4080 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosciviles`
--

DROP TABLE IF EXISTS `estadosciviles`;
CREATE TABLE IF NOT EXISTS `estadosciviles` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `globos`
--

DROP TABLE IF EXISTS `globos`;
CREATE TABLE IF NOT EXISTS `globos` (
  `idGlobo` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY  (`idGlobo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

DROP TABLE IF EXISTS `idiomas`;
CREATE TABLE IF NOT EXISTS `idiomas` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) NOT NULL,
  `code` varchar(2) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomausuarioslectura`
--

DROP TABLE IF EXISTS `idiomausuarioslectura`;
CREATE TABLE IF NOT EXISTS `idiomausuarioslectura` (
  `id` int(11) NOT NULL auto_increment,
  `idIdioma` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_IdiomaUsuariosLectura_Idiomas1` (`idIdioma`),
  KEY `fk_IdiomaUsuariosLectura_Usuarios1` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` int(11) NOT NULL auto_increment,
  `asunto` varchar(45) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  `fechaHoraCreacion` datetime default NULL,
  `aceptaRespuesta` int(11) default '0',
  `publicarBitacora` int(11) default '0',
  `soltarCielo` int(11) default '1',
  `idIdioma` int(11) NOT NULL,
  `idCorriente` int(11) default NULL,
  `idUsuario` int(11) NOT NULL COMMENT 'Usuario que lo creo',
  `idGlobo` int(11) default NULL,
  `idTipoMensaje` int(11) NOT NULL,
  `idMensajeRespuesta` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_Mensajes_Idiomas1` (`idIdioma`),
  KEY `fk_Mensajes_Corriente1` (`idCorriente`),
  KEY `fk_Mensajes_Usuarios2` (`idUsuario`),
  KEY `fk_Mensajes_Globos1` (`idGlobo`),
  KEY `fk_Mensajes_TiposMensajes1` (`idTipoMensaje`),
  KEY `fk_Mensajes_Mensajes1` (`idMensajeRespuesta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajesarchivosadjuntos`
--

DROP TABLE IF EXISTS `mensajesarchivosadjuntos`;
CREATE TABLE IF NOT EXISTS `mensajesarchivosadjuntos` (
  `id` int(11) NOT NULL auto_increment,
  `archivo` varchar(150) NOT NULL,
  `idMensaje` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_MensajesArchivosAdjuntos_Mensajes1` (`idMensaje`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Adjuntos' AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajesdestinatarios`
--

DROP TABLE IF EXISTS `mensajesdestinatarios`;
CREATE TABLE IF NOT EXISTS `mensajesdestinatarios` (
  `id` int(11) NOT NULL auto_increment,
  `leido` int(11) default NULL,
  `fechaHoraRecepcion` datetime default NULL,
  `fechaHoraEnvio` datetime default NULL,
  `idMensaje` int(11) NOT NULL,
  `idDestinatario` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_MensajesDestinatarios_Mensajes1` (`idMensaje`),
  KEY `fk_MensajesDestinatarios_Usuarios1` (`idDestinatario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

DROP TABLE IF EXISTS `paises`;
CREATE TABLE IF NOT EXISTS `paises` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `idContinente` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_Paises_Continentes1` (`idContinente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE IF NOT EXISTS `perfiles` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='administrador, usuario' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

DROP TABLE IF EXISTS `procesos`;
CREATE TABLE IF NOT EXISTS `procesos` (
  `id` int(11) NOT NULL auto_increment,
  `fecha` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposmensajes`
--

DROP TABLE IF EXISTS `tiposmensajes`;
CREATE TABLE IF NOT EXISTS `tiposmensajes` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Sugerencias, privados, abusos, al cielo' AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `fk_Bitacora_Usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `claveslenguajes`
--
ALTER TABLE `claveslenguajes`
  ADD CONSTRAINT `fk_ClavesLenguajes_Idiomas1` FOREIGN KEY (`idIdioma`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `fk_Contactos_Usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Contactos_Usuarios2` FOREIGN KEY (`idUsuarioContacto`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `corrientesusuarios`
--
ALTER TABLE `corrientesusuarios`
  ADD CONSTRAINT `fk_Corriente_has_Usuarios_Corriente1` FOREIGN KEY (`idCorriente`) REFERENCES `corrientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Corriente_has_Usuarios_Usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `fk_Estados_Paises1` FOREIGN KEY (`idPais`) REFERENCES `paises` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `idiomausuarioslectura`
--
ALTER TABLE `idiomausuarioslectura`
  ADD CONSTRAINT `fk_IdiomaUsuariosLectura_Idiomas1` FOREIGN KEY (`idIdioma`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_IdiomaUsuariosLectura_Usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `fk_Mensajes_Corriente1` FOREIGN KEY (`idCorriente`) REFERENCES `corrientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mensajes_Globos1` FOREIGN KEY (`idGlobo`) REFERENCES `globos` (`idGlobo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mensajes_Idiomas1` FOREIGN KEY (`idIdioma`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mensajes_Mensajes1` FOREIGN KEY (`idMensajeRespuesta`) REFERENCES `mensajes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mensajes_TiposMensajes1` FOREIGN KEY (`idTipoMensaje`) REFERENCES `tiposmensajes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mensajes_Usuarios2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mensajesarchivosadjuntos`
--
ALTER TABLE `mensajesarchivosadjuntos`
  ADD CONSTRAINT `fk_MensajesArchivosAdjuntos_Mensajes1` FOREIGN KEY (`idMensaje`) REFERENCES `mensajes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mensajesdestinatarios`
--
ALTER TABLE `mensajesdestinatarios`
  ADD CONSTRAINT `fk_MensajesDestinatarios_Mensajes1` FOREIGN KEY (`idMensaje`) REFERENCES `mensajes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_MensajesDestinatarios_Usuarios1` FOREIGN KEY (`idDestinatario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paises`
--
ALTER TABLE `paises`
  ADD CONSTRAINT `fk_Paises_Continentes1` FOREIGN KEY (`idContinente`) REFERENCES `continentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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


ALTER TABLE `corrientes` ADD COLUMN `active` TINYINT UNSIGNED NOT NULL DEFAULT true AFTER `descripcion`;

