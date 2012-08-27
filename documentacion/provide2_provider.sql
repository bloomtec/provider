-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-08-2012 a las 19:44:58
-- Versión del servidor: 5.1.61
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `provide2_provider`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autenticaciones`
--

CREATE TABLE IF NOT EXISTS `autenticaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `codigo_configuracion` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `autenticaciones`
--

INSERT INTO `autenticaciones` (`id`, `nombre`, `codigo_configuracion`) VALUES
(1, 'autenticacion_simple', ' 	$this->Auth->userModel = ''Usuario'';\r\n 	$this->Auth->loginError = "Nombre de usuario o password no validos";\r\n    $this->Auth->authError = "No tiene permisos para ingresar a esta sección";\r\n 		\r\n    $this->Auth->fields = array(\r\n        ''username'' => ''nombre_de_usuario'', \r\n        ''password'' => ''password''\r\n       );\r\n 	$this->Auth->loginAction = array(''controller'' => ''usuarios'', ''action'' => ''login'',"admin"=>true,''plugin''=>''autenticacion_simple'');');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linea_id` int(11) DEFAULT NULL,
  `posicion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `image_path` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `linea_id`, `posicion`, `nombre`, `image_path`) VALUES
(1, 2, 6, 'Mobiliario escolar', 'categorias/caja_verde.png'),
(2, 2, 1, 'Auditorios y Teatros  ', 'categorias/caja_azul.png'),
(4, 1, 5, 'Sistemas de archivo y almacenamiento', 'categorias/caja_verde.png'),
(5, 1, 7, 'Accesorios', 'categorias/caja_anaranjada.png'),
(6, 1, 3, 'Divisiones de oficina', 'categorias/caja_anaranjada.png'),
(7, 1, 4, 'Oficina abierta', 'categorias/caja_azul.png'),
(8, 1, 8, 'R.T.A - Listo para ensamblar', 'categorias/caja_verde.png'),
(9, 1, 9, 'Mesas de Conferencia', 'categorias/caja_anaranjada.png'),
(11, 2, 2, 'Ãreas comunes', 'categorias/caja_verde.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL,
  `autenticacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `utenticacionausar` (`autenticacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `autenticacion_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

CREATE TABLE IF NOT EXISTS `lineas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`id`, `nombre`, `posicion`) VALUES
(1, 'oficina', NULL),
(2, 'escolar', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `subcategoria_id` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  `beneficios` longtext,
  `acabados` text NOT NULL,
  `colores` text NOT NULL,
  `materiales` text NOT NULL,
  `dimensiones` text NOT NULL,
  `orden_en_categoria` int(11) DEFAULT NULL,
  `orden_en_subcategoria` int(11) DEFAULT NULL,
  `linea_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perteneceaunasubcategoria` (`subcategoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=154 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `subcategoria_id`, `nombre`, `codigo`, `image_path`, `beneficios`, `acabados`, `colores`, `materiales`, `dimensiones`, `orden_en_categoria`, `orden_en_subcategoria`, `linea_id`) VALUES
(9, 1, 1, 'Mesa trapezoidal NTC-4731', '2040020000', 'productos/mesa trapezoidal ntc 4731.jpg', 'Clase 1-2-3-4. Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies: En laca mate natural; FÃ³rmica ; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo\r\n', 'Estructura metÃ¡lica: Gris y Negro gofrado', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada o aglomerado.  \r\n', '', NULL, NULL, NULL),
(10, 1, 1, 'Mesa trapezoidal estÃ¡ndar', '2040010000', 'productos/Mesa-trapezoidal-Estandar.jpg', 'Clase 1-2-3-4. Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies: En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo\r\n', 'Estructura metÃ¡lica: Gris y Negro gofrado', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada o aglomerado.  \r\n', '', NULL, NULL, NULL),
(11, 1, 1, 'Pupitre unipersonal SP', '2040030000', 'productos/Pupitre Unipersonal tipo Berchmans.jpg', 'Aplica para primaria y secundaria. Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies: En laca mate natural; FÃ³rmica; Termoformado en PET o PVC. Pintura electrostÃ¡tica horneable con recubrimiento en polvo.	\r\n', ' Estructura metÃ¡lica: Gris y Negro gofrado', 'Metales: Tuberia Acero CR, 1", Cal.20; Lamina Acero CR, Cal.23.\r\nMaderas: Madera contrachapada o aglomerado.  \r\n', '', NULL, NULL, NULL),
(12, 1, 1, 'Asiento unipersonal o bipersonal SP', '2040040000', 'productos/Asiento-unipersonal-Especial.jpg', 'Clase 1-2-3-4. Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies: En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.	\r\n', 'Estructura metÃ¡lica: Gris y Negro gofrado.', 'Metales: Tuberia Acero CR, 1", Cal.20; Lamina Acero CR, Cal.23.\r\nMaderas: Madera contrachapada o aglomerado.  \r\n', '', NULL, NULL, NULL),
(13, 1, 1, 'Pupitre unipersonal NTC 4641', '2040060000', 'productos/Pupitre-Unipersonal-NTC-4641.jpg', 'Clase 1-2-3-4. Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies: En laca mate natural; FÃ³rmica; Termoformado PET o PVC..\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.\r\n', 'Estructura metÃ¡lica: Gris y Negro gofrado', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada o aglomerado.  \r\n', '', NULL, NULL, NULL),
(14, 1, 1, 'Pupitre bipersonal NTC 4641', '2040050000', 'productos/Pupitre-Bipersonal-NTC-4641..jpg', 'Clase 1-2-3-4. Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad		', 'Superficies: En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.			', 'Estructura metÃ¡lica: Gris y Negro gofrado', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada o aglomerado.  ', '', NULL, NULL, NULL),
(18, 1, 1, 'Asiento unipersonal o bipersonal espadar curvo', '2030040000', 'productos/asiento-4.jpg', 'Clase 1-2-3-4. Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies: En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.	\r\n', 'Estructura metÃ¡lica: Gris y Negro gofrado', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada o aglomerado.  \r\n', '', NULL, NULL, NULL),
(19, 1, 1, 'Asiento para profesor con espaldar curvo', '2030120000', 'productos/Asiento-5.jpg', 'Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies: En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.	\r\n', 'Estructura metÃ¡lica: Gris y Negro gofrado', 'Metales: Tuberia Acero CR, 1", Cal.20; Lamina Acero CR, Cal.23.\r\nMaderas: Madera contrachapada o aglomerado.  ', '', NULL, NULL, NULL),
(20, 1, 1, 'Butaco laboratorio NTC 4730 con espaldar', '2030090000', 'productos/Butaco-para-laboratorio-Giratorio-NTC-Con-espaldar-.jpg', 'Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies: En laca mate natural; FÃ³rmica o aglomerado; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.	\r\n', 'Estructura metÃ¡lica: Gris y Negro gofrado', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada o aglomerado.  \r\n', '', NULL, NULL, NULL),
(21, 1, 1, 'Butaco laboratorio NTC 4730 ', '2030100000', 'productos/Butaco-para-laboratorio-Giratorio-NTC-sin-espaldar-.jpg', 'Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies: En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.	\r\n', 'Estructura metÃ¡lica: Gris y Negro gofrado', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada o aglomerado.\r\n', '', NULL, NULL, NULL),
(22, 1, 1, 'Butaco para laboratorio estÃ¡ndar', '2030110000', 'productos/butaco.jpg', 'Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies: En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.	\r\n', 'Estructura metÃ¡lica: Gris y Negro gofrado', 'Metales: Tuberia Acero CR, 1", Cal.20; Lamina Acero CR, Cal.23.\r\nMaderas: Madera contrachapada o aglomerado\r\n', '', NULL, NULL, NULL),
(23, 1, 1, 'Escritorio profesor NTC 4640 ', '2020010000', 'productos/Escritorio-ComÃºn-Profesor-NTC-4640-2.jpg', 'Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies: En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo\r\n', 'Estructura metÃ¡lica: Gris y Negro gofrado', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada o aglomerado\r\n', '', NULL, NULL, NULL),
(24, 1, 1, 'Escritorio para profesor estÃ¡ndar de dos gavetas', '2020020000', 'productos/Escritorio para Profesor estandar de dos gavetas.jpg', 'Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies: En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo\r\n', 'Estructura metÃ¡lica: Gris y Negro gofrado', 'Metales: Tuberia Acero CR, 1", Cal.20; Lamina Acero CR, Cal.23.\r\nMaderas: Madera contrachapada o aglomerado.', '', NULL, NULL, NULL),
(25, 1, 1, 'Escritorio tubo oval', '2020040000', 'productos/Escritorio-Tipo-Fonade-.jpg', 'Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies: En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.		\r\n', 'Estructura metÃ¡lica: Gris y Negro gofrado', 'Metales: Tuberia Acero CR, 1", Cal.20; Lamina Acero CR, Cal.23.\r\nMaderas: Madera contrachapada o aglomerado.', '', NULL, NULL, NULL),
(26, 4, 4, 'Archivador pedestal 2x1 MetÃ¡lico EP-21', '1010010000', 'productos/archivador-pedestal-Ref.007.jpg', '2 Gavetas estandar y 1 archivo con riel extensible. Alto valor de diseÃ±o; AutonomÃ­a del puesto de trabajo; Facilidad de integraciÃ³n entre departamentos; Adaptabilidad al espacio; Configurable para el requerimiento del puesto de trabajo.', 'Frentes: MetÃ¡licos o Madera en FÃ³rmica con canto rÃ­gido o PVC alrededor; Termoformado en PET o PVC. Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.	\r\n', 'Estructura metÃ¡lica: Rojo, Blanco, Gris y Negro gofrado (Otros colores sujetos a disponibilidad).\r\n', 'Metales:Lamina Acero CR, Cal.22.\r\n', '', NULL, NULL, NULL),
(27, 4, 4, 'Archivador pedestal 1x1 MetÃ¡lico EP-11', '1010020000 ', 'productos/Archivador-Pedestal-REF-008.jpg', '1 Gaveta estandar, 1 Frente falso y 1 archivo con riel extensible. Alto valor de diseÃ±o; AutonomÃ­a del puesto de trabajo; Facilidad de integraciÃ³n entre departamentos; Adaptabilidad al espacio; Configurable para el requerimiento del puesto de trabajo', 'Frentes: MetÃ¡licos o Madera en FÃ³rmica con canto rÃ­gido o PVC alrededor; Termoformado en PET o PVC. Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.	\r\n', 'Estructura metÃ¡lica: Rojo, Blanco, Gris y Negro gofrado (Otros colores sujetos a disponibilidad).   ', 'Metales:Lamina Acero CR, Cal.22.   ', '', NULL, NULL, NULL),
(28, 4, 4, 'Archivador pedestal doble archivo metÃ¡lico EP-2A', '1010030000', 'productos/Archivador-Pedestal-REF-009.jpg', '2 Gavetas de archivo con riel extensible. Alto valor de diseÃ±o; AutonomÃ­a del puesto de trabajo; Facilidad de integraciÃ³n entre departamentos; Adaptabilidad al espacio; Configurable para el requerimiento del puesto de trabajo.', 'Frentes: MetÃ¡licos o Madera en FÃ³rmica con canto rÃ­gido o PVC alrededor; Termoformado en PET o PVC. Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.	\r\n', 'Estructura metÃ¡lica: Rojo, Blanco, Gris y Negro gofrado (Otros colores sujetos a disponibilidad). ', 'Metales:Lamina Acero CR, Cal.22.   	\r\n', '', NULL, NULL, NULL),
(29, 5, 5, 'Porta CPU', '2160010000', 'productos/porta-CPU.jpg', 'Alto valor de diseÃ±o; AutonomÃ­a del puesto de trabajo; Facilidad de integraciÃ³n entre departamentos; Adaptabilidad al espacio; Configurable para el requerimiento del puesto de trabajo.', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.   ', 'Estructura metÃ¡lica: Rojo, Blanco, Gris y Negro gofrado (Otros colores sujetos a disponibilidad).   ', 'Metales:Lamina Acero CR, Cal.22.   ', '', 1, NULL, NULL),
(35, 4, 4, 'Archivador vertical 2 Gavetas metÃ¡lico SV-002', '1030030000', 'productos/archivador-vertical-REF-EV-001.jpg', '2 Gavetas con riel balinera. Alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad.', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.  ', 'Estructura metÃ¡lica: Rojo, Blanco, Gris y Negro gofrado (Otros colores sujetos a disponibilidad).   ', 'Metales:Lamina Acero CR, Cal.22.   ', '', NULL, NULL, NULL),
(36, 4, 4, 'Archivador vertical 3 gavetas metÃ¡lico SV-003', '1030020000', 'productos/Archivador-Vertical-REF-EV-002.jpg', '3 Gavetas con riel balinera. Alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad.', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.  ', 'Estructura metÃ¡lica: Rojo, Blanco, Gris y Negro gofrado (Otros colores sujetos a disponibilidad).   ', 'Metales:Lamina Acero CR, Cal.22.   ', '', NULL, NULL, NULL),
(38, 4, 4, 'Archivador vertical 4 gavetas metÃ¡lico SV-004', '1030010000', 'productos/Archivador-Vertical-REF-EV-003.jpg', '4 Gavetas con riel balinera. Alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad.', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.  ', 'Estructura metÃ¡lica: Rojo, Blanco, Gris y Negro gofrado (Otros colores sujetos a disponibilidad). ', 'Metales:Lamina Acero CR, Cal.22.   ', '', NULL, NULL, NULL),
(39, 4, 4, 'Archivador vertical 2 gavetas metÃ¡lico EV-002', '1030070000', 'productos/Archivador-Vertical-REF-SV-001,-metalico.jpg', '2 Gavetas con riel extensible. Alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad.', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo. \r\n', 'Estructura metÃ¡lica: Gris metalizado, Negro texturado', 'Metales:Lamina Acero CR, Cal.22.   \r\n', '', NULL, NULL, NULL),
(40, 4, 4, 'Archivador vertical 2-3-4 gavetas mixto EVM-002', '1030070000M', 'productos/Archivador-Vertical-REF-SV-001,-madera.jpg', '2-3-4 Gavetas con frente en madera y riel extensible o riel balinera. Alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad.', 'Frentes: Madera en FÃ³rmica con canto rÃ­gido o PVC alrededor; Termoformado en PET o PVC.	\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.		\r\n', 'Estructura metÃ¡lica: Gris metalizado, Negro texturado.', 'Metales: Lamina Acero CR, Cal.23.\r\nMaderas: Madera contrachapada o aglomerado.		\r\n', '', NULL, NULL, NULL),
(41, 4, 4, 'Archivador vertical 3 gavetas metÃ¡lico EV-003', '1030060000', 'productos/Arch.-vertical-3-gavetas.jpg', '3 Gavetas con riel extensible. Alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad.', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris metalizado, Negro texturado', 'Metales: Lamina Acero CR, Cal.22.  ', '', NULL, NULL, NULL),
(42, 4, 4, 'Archivador vertical 4 gavetas metÃ¡lico EV-004', '1030040000', 'productos/Archivador-Vertical-REF-SV-003.jpg', '4 Gavetas con riel extensible. Alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad.', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris metalizado, Negro texturado', 'Metales: Lamina Acero CR, Cal.22.  \r\n', '', NULL, NULL, NULL),
(43, 4, 4, 'Archivador horizontal 2 gavetas metÃ¡lico EH-002', '1020010000', 'productos/archivador-horizontal-REF-SH-004.jpg', '2 Gavetas con riel extensible. Alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad.', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris metalizado, Negro texturado', 'Metales: Lamina Acero CR, Cal.22.  ', '', NULL, NULL, NULL),
(44, 4, 4, 'Archivador horizontal 3 gavetas metÃ¡lico EH-003', '1020020000', 'productos/archivador-horizontal-REF-SH-005.jpg', '3 Gavetas con riel extensible. Alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad.', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris metalizado, Negro texturado', 'Metales: Lamina Acero CR, Cal.22.  ', '', NULL, NULL, NULL),
(45, 4, 4, 'Archivador horizontal 4 gavetas metÃ¡lico EH-004', '1020030000', 'productos/archivador-horizontal-REF-SH-006.jpg', '4 Gavetas con riel extensible. Alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad.', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris metalizado, Negro texturado', 'Metales: Lamina Acero CR, Cal.22.  ', '', NULL, NULL, NULL),
(46, 4, 4, 'Locker metÃ¡lico de 2 puestos', '2010020000', 'productos/locker-de-2-puestos.jpg', 'Alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad.', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris metalizado, Negro texturado', 'Metales: Lamina Acero CR, Cal.22.  ', '', NULL, NULL, NULL),
(47, 4, 4, 'Locker metÃ¡lico de 6 puestos', '2010010000', 'productos/locker-de-6-puestos.jpg', 'Alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris metalizado, Negro texturado', 'Metales: Lamina Acero CR, Cal.22.  ', '', NULL, NULL, NULL),
(48, 4, 4, 'Locker de 9 puestos', '2010030000', 'productos/locker-de-9-puestos.jpg', 'Alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris metalizado, Negro texturado.', 'Metales: Lamina Acero CR, Cal.22.  ', '', NULL, NULL, NULL),
(49, 4, 4, 'Archivador rodante metÃ¡lico o mixto', '1070000000', 'productos/arch. Rodante Web.jpg', 'Alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad. Estructura en lÃ¡mina y estructura en estanterÃ­a', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo. Frentes en Madera contrachapada o aglomerado en FÃ³rmica o Termoformado en PET o PVC.', 'Estructura metÃ¡lica: Gris metalizado, Negro texturado		', 'Metales: Lamina Acero CR, Cal.22.  ', '', NULL, NULL, NULL),
(50, 4, 4, 'Folderama metÃ¡lico', '1050000000', 'productos/folderama.jpg', 'Alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad.', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris metalizado, Negro texturado.', 'Metales: Lamina Acero CR, Cal.22.  ', '', NULL, NULL, NULL),
(52, 2, 18, 'ISO ', '2080010000', 'productos/Silla-interlocutora-ISO-sin-brazo.jpg.jpg', 'Comodidad; ErgonomÃ­a; Durabilidad; Resistencia; Respaldo; Funcionalidad; Seguridad; Configurable, con brazo y sin brazo.', 'Concha plÃ¡stica en Polilpropileno, o Tapizado en Hilat Escorial.', 'Gama de colores Escorial Hilat\r\nConchas PP: rojo, azul, verde, blanco, negro', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada, Triplex.\r\nConchas: PP', '', 2, NULL, NULL),
(53, 2, 9, 'Silla ISO con superficie de trabajo fija', '2070010000', 'productos/Silla-interlocutora-ISO-brazo-fijo.jpg', 'Comodidad; ErgonomÃ­a; Durabilidad; Resistencia; Respaldo; Funcionalidad; Seguridad; Configurable, con brazo y sin brazo.', 'Concha plÃ¡stica en Polilpropileno, o Tapizado en Hilat Escorial.', 'Gama de colores Escorial Hilat\r\nConchas PP: rojo, azul, verde, blanco, negro', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada, Triplex.\r\nConchas: PP', '', 3, NULL, NULL),
(54, 2, 9, 'Silla ISO con superficie de trabajo abatible', '2100010000', 'productos/silla-interlocutora-ISO-con-brazo-abatible.jpg', 'Comodidad; ErgonomÃ­a; Durabilidad; Resistencia; Respaldo; Funcionalidad; Seguridad; Configurable, con brazo y sin brazo.', 'Concha plÃ¡stica en Polilpropileno, o Tapizado en Hilat Escorial.', 'Gama de colores Escorial Hilat\r\nConchas PP: rojo, azul, verde, blanco, negro', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada, Triplex.\r\nConchas: PP', '', 4, NULL, NULL),
(55, 2, 9, 'Silla  ISO con superficie de trabajo escualizable', '2090010000', 'productos/Silla-interlocutora-ISO-brazo-escualizable-abatible.jpg', 'Comodidad; ErgonomÃ­a; Durabilidad; Resistencia; Respaldo; Funcionalidad; Seguridad.', 'Concha plÃ¡stica en Polilpropileno, o Tapizado en Hilat Escorial.', 'Gama de colores Escorial Hilat\r\nConchas PP: rojo, azul, verde, blanco, negro', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada, Triplex.\r\nConchas: PP', '', 5, NULL, NULL),
(56, 2, 13, 'Silla para teatro', '2080010000', 'productos/Sillas-teatro.jpg', 'Comodidad; ErgonomÃ­a; Durabilidad; Resistencia; Respaldo; Funcionalidad; Seguridad; Configurable, con brazo y sin brazo.', 'Conchas en Polipropileno, injertos tapizados con Hilat Escorial, Superficies en FÃ³rmica con canto rÃ­gido alrededor; Tuberia en pintura electrostÃ¡tica horneable con recubrimiento en polvo. ', 'Gama de colores Escorial Hilat', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada, Triplex.\r\nConchas: PP', '', 1, NULL, NULL),
(57, 5, 5, 'ReposapiÃ©s', '2150010000', 'productos/reposapies.jpg', 'Alto valor de diseÃ±o; AutonomÃ­a del puesto de trabajo; Facilidad de integraciÃ³n entre departamentos; Adaptabilidad al espacio; Configurable para el requerimiento del puesto de trabajo. ', 'Superficies: En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo. ', 'Estructura metÃ¡lica: Rojo, Blanco, Gris y Negro gofrado (Otros colores sujetos a disponibilidad).\r\n', 'Metales: Tuberia Acero CR, 7/8" Cal.18; \r\nMaderas: Madera contrachapada. Superficie antideslizante en PVC.', '', 2, NULL, NULL),
(58, 5, 5, 'Papelera', '2140010000 (grande) ; 2140020000 (pequeÃ±a)', 'productos/papelera.jpg', 'Alto valor de diseÃ±o; AutonomÃ­a del puesto de trabajo; Facilidad de integraciÃ³n entre departamentos; Adaptabilidad al espacio; Configurable para el requerimiento del puesto de trabajo. ', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Rojo, Blanco, Gris y Negro gofrado (Otros colores sujetos a disponibilidad).\r\n', 'Metales: Lamina Acero CR, Cal.22.  ', '', 3, NULL, NULL),
(59, 5, 5, 'Basurera', '2130010000', 'productos/basurero.jpg', 'Alto valor de diseÃ±o; AutonomÃ­a del puesto de trabajo; Facilidad de integraciÃ³n entre departamentos; Adaptabilidad al espacio; Configurable para el requerimiento del puesto de trabajo. ', 'Superficies: En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo. ', 'Estructura metÃ¡lica: Rojo, Blanco, Gris y Negro gofrado (Otros colores sujetos a disponibilidad).\r\n', 'Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada y aglomerado.', '', 4, NULL, NULL),
(62, 1, 1, 'Asiento uni o bipersonal concha plÃ¡stica NTC 4641', '2030080000', 'productos/2030060000.jpg', 'Clase 1-2-3-4. Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris y Negro gofrado.', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\n', '', NULL, NULL, NULL),
(63, 1, 1, 'Mesa para computo x 2 puestos', '2090000000', 'productos/2090000000.jpg', 'Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies:  En laca mate natural; FÃ³rmica; Termoformado en PET o PVC..\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris y Negro gofrado.', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada o aglomerado.', '', NULL, NULL, NULL),
(64, 1, 1, 'Mesa para computo x 3 puestos', '2090010000', 'productos/2090010000.jpg', 'Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies:  En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris y Negro gofrado.', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada o aglomerado.', '', NULL, NULL, NULL),
(65, 1, 1, 'Modulo preescolar SP', '2100000000', 'productos/2100000000.jpg', 'Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies:  En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris y Negro gofrado.', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada o aglomerado.', '', NULL, NULL, NULL),
(66, 1, 1, 'Silla universitaria espaldar curvo ', '2040060000', 'productos/2040060000.jpg', 'Clase 3 y 4. Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies:  En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris y Negro gofrado.', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada o aglomerado.', '', NULL, NULL, NULL),
(67, 1, 1, 'Silla universitaria estÃ¡ndar', '2060010000', 'productos/2060010000.jpg', 'Clase 3 y 4. Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies:  En laca mate natural; FÃ³rmica ; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris y Negro gofrado.', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada o aglomerado.', '', NULL, NULL, NULL),
(68, 1, 1, 'Silla universitaria concha plÃ¡stica estÃ¡ndar', '2060040000', 'productos/2060040000.jpg', 'Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies:  En laca mate natural; FÃ³rmica con canto rÃ­gido alrededor; Termoformado.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris y Negro gofrado.', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada, Triplex.', '', NULL, NULL, NULL),
(69, 2, 9, 'Silla Isosped con superficie de trabajo fija', '', 'productos/Isosped-con-brazo.jpg', 'Brazo fijo o abatible', 'Con pintura electrostÃ¡tica.\r\nEstructura color negro Ref: 4-17. ', 'TuberÃ­a: negra\r\nPlÃ¡sticos en color: Negro, gris, verde y azul.', '', '', 6, NULL, NULL),
(70, 2, 9, 'Silla Espid con superficie de trabajo fija', '', 'productos/Espid-con-brazo.jpg', 'brazo fijo o abatible', 'Con pintura electrostÃ¡tica.\r\nEstructura color negro Ref: 4-18 \r\n', 'PlÃ¡sticos en color: Negro, azul, verde y gris.', 'Tubo rectangular de 7/8 calibre 18. \r\n', '', 7, NULL, NULL),
(71, 2, 9, 'Silla Risma con superficie de trabajo fija', '', 'productos/risma-con-brazo.jpg', 'Brazo abatible o abatible\r\nOpciÃ³n de asiento interno para tapizar. ', 'Con pintura electrostÃ¡tica.\r\nEstructura color negro Ref: 4-22.', 'PlÃ¡sticos en color: Negro, gris, verde y azul.', 'Tubo rectangular de 7/8 calibre 18. \r\n', '', 8, NULL, NULL),
(72, 2, 9, 'Silla IsÃ³celes con superficie de trabajo fija', '', 'productos/Isoceles.jpg', 'Brazo fijo y abatible ', 'Con pintura electrostÃ¡tica', 'Estructura color negro Ref: 4-8.', 'Tubo rectangular de 7/8 calibre 18. \r\n', '', 9, NULL, NULL),
(73, 2, 20, 'Uni con brazos', '', 'productos/Uni.jpg', '', 'Estructura metÃ¡lica: Pintura electroestÃ¡tica', 'Colores PP: cafÃ©, negro, amarillo y blanco', 'Espaldar y/o Asiento: En Polipropileno (PP), o tapizado en rojo y beige.\r\n', '', 10, NULL, NULL),
(74, 2, 20, 'Natal con brazos', '', 'productos/Natal.jpg', 'Silla fija', 'Asiento abatible tapizado en negro', 'Estructura Gris; Espaldar y brazos en Polipropileno color gris Ã³ negro', 'Estructura en hierro ', '', 11, NULL, NULL),
(75, 2, 18, 'IsÃ³celes', '', 'productos/Isoceles-sin-brazo.jpg', '', 'Tapizado espaldar y asiento:  PaÃ±o o sintetico con espuma en poliuretano de alta densidad', 'pintura electro estatica color negro o gris', 'Estructura: Tubo rectangular 7/8â€ Cal. 18 \r\n', '', 12, NULL, NULL),
(77, 2, 20, 'Isoceles con brazos', '', 'productos/Isoceles-con-brazo..jpg', '', 'Tapizado espaldar y asiento:  PaÃ±o o sintetico con espuma en poliuretano de alta densidad\r\n', 'pintura electro estatica color negro o gris\r\n', 'Estructura: Tubo rectangular 7/8â€ Cal. 18 \r\n', '', 13, NULL, NULL),
(79, 2, 18, 'Risma tapizada', '', 'productos/risma-tapizada.jpg', '', 'Tapizado asiento, Pintura electroestÃ¡tica', 'pintura electro estatica color negro o gris\r\n', '  PaÃ±o o sintetico con espuma en poliuretano de alta densidad\r\n\r\nEstructura: Tubo rectangular 7/8â€ Cal. 18 \r\n', '', 14, NULL, NULL),
(81, 2, 18, 'Risma', '', 'productos/risma...jpg', 'Aplilables', 'pintura electrostÃ¡tica', 'Estructura color negro\r\n\r\nPlÃ¡sticos en color: Negro, gris, verde y azul.\r\n', 'Tubo rectangular de 7/8 calibre 18. \r\n', '', 15, NULL, NULL),
(82, 2, 18, 'Venecia', '', 'productos/Venecia.jpg', '', 'pintura electrostÃ¡tica', 'Estructura color negro Ref: 4-21 \r\nPlÃ¡sticos en color: Negro, gris, verde y azul.', 'Tubo redondode 1 pulgada calibre 18. ', '', 16, NULL, NULL),
(83, 2, 18, 'Venecia tapizada', '', 'productos/Venecia-tapizada.jpg', 'Tapizado espaldar y/o asiento\r\n', 'Pintura electro estÃ¡tica \r\nTapizado: PaÃ±o o sintetico con espuma en poliuretano de alta densidad.', 'Pintura electro estatica color negro o gris\r\n', 'Estructura: Tubo redondode 1 pulgada calibre 18. ', '', 17, NULL, NULL),
(84, 2, 18, 'Venus', '', 'productos/Venus.jpg', '', 'pintura electrostÃ¡tica', 'Estructura color negro.\r\nPlÃ¡sticos en color: \r\nNegro, gris, verde, azul y rojo.', 'Tubo redondo 7/8 calibre 18', '', 18, NULL, NULL),
(85, 2, 18, 'Venus tapizada', '', 'productos/Venus-sin-brazo-tapizada.jpg', 'Tapizado espaldar y/o asiento', 'Pintura electro estatica ', 'Pintura electro estatica color negro o gris\r\n', 'Tapizado espaldar y/o asiento:  PaÃ±o o sintetico con espuma en poliuretano de alta densidad.\r\n\r\nEstructura: Tubo redondode 7/8â€ pulgada calibre 18. \r\n', '', 19, NULL, NULL),
(86, 2, 20, 'Venus con brazo', '', 'productos/Venus-con-brazo.jpg', 'Tapizado espaldar y asiento', 'Pintura electro estatica y Tapizado', 'Pintura electro estatica color negro o gris\r\n', 'Tapizado espaldar y asiento:  PaÃ±o o sintetico con espuma en poliuretano de alta densidad.\r\n\r\nEstructura: Tubo redondode 7/8â€ pulgada calibre 18. \r\n', '', 20, NULL, NULL),
(87, 2, 20, 'Joe con Brazos', '', 'productos/joe.jpg', 'Interlocutora', 'Tapizado en tela y malla\r\n\r\nPintura cromada\r\n', '', 'Estructura: Tubo redondode 7/8â€ pulgada calibre 18. \r\n', '', 21, NULL, NULL),
(88, 2, 20, 'Danny con brazos', '', 'productos/Danny.jpg', 'Interlocutora', 'Pintura cromada\r\nTapizado en tela y malla', '', 'Estructura: Tubo redondode 7/8â€ pulgada calibre 18. \r\n', '', 22, NULL, NULL),
(89, 2, 20, 'Billy con brazos', '', 'productos/Billy...jpg', 'Interlocutora', 'Tapizado en tela y malla\r\nPintura cromada', '', 'Estructura: Tubo redondode 7/8â€ pulgada calibre 18', '', 23, NULL, NULL),
(90, 2, 18, 'Isosped', '', 'productos/Isosped.jpg', '', 'pintura electrostÃ¡tica', 'Estructura color negro.\r\nPlÃ¡sticos en color: Negro, gris, verde y azul.', 'Tubo rectangular de 7/8 calibre 18. ', '', 24, NULL, NULL),
(91, 2, 18, 'Espid', '', 'productos/Espid.jpg', 'Se pueden apilar', 'pintura electrostÃ¡tica', 'Estructura color negro. \r\nPlÃ¡sticos en color: Negro, azul, verde y gris.\r\n', 'Tubo rectangular de 7/8 calibre 18. \r\n', '', 25, NULL, NULL),
(92, 2, 18, 'lonk', '', 'productos/lonk.jpg', 'Apilables en 12 unidades\r\n', 'Pintura electro estatica ', 'PlÃ¡stico color: negro, gris, verde y azul.\r\n', 'Estructura: Tubo redondo de 7/8â€ pulgada calibre 14. \r\n', '', 26, NULL, NULL),
(93, 2, 18, 'OriÃ³n', '', 'productos/Orion.jpg', '', 'pintura electrostÃ¡tica', 'Color negro.\r\nPlÃ¡sticos en color: Negro, gris, verde y azul.\r\n', 'Tubo redondo de 1 pulgada calibre 18. \r\n', '', 27, NULL, NULL),
(97, 11, 32, 'Tandem', '', 'productos/Tandem-Sillas.jpg', '', '', '', '', '', 10, NULL, '2'),
(98, 11, 32, 'Offis', '', 'productos/Offis.jpg', 'Tandem de 3 y 4 puestos; Sin tapizar\r\n', 'Cromado\r\n', '', '', '', 11, NULL, '2'),
(99, 11, 32, 'Offis, tapizada', '', 'productos/Offis-tapizada.jpg', 'Tandem de 3 y 4 puestos, Tapizado', 'Cromado\r\nTapizado: Cuero sintÃ©tico', '', '', '', 12, NULL, '2'),
(100, 6, 22, 'es_pacio', '1000000001', 'productos/espacio.jpg', 'EXPANSION SIN LÃMITES, adaptabilidad; RTA (Ready to Assembly) y PersonalizaciÃ³n lo hacen Ãºnico en el mercado; Versatilidad: Permite diferentes composiciones; ModulaciÃ³n de componentes con diferentes acabados;  Libertad: DisposiciÃ³n a criterio del usuario; Alto valor de diseÃ±o percibido con relaciÃ³n a su precio.', 'Acabados al natural / Pintura electrostÃ¡tica horneable con recubrimiento en polvo / Termoformado con diferentes texturas y colores.', 'Basados en las necesidades del cliente y disposiciÃ³n del mercado.', 'Estructura en LÃ¡mina de Acero CR; Paneles en Madera / AcrÃ­lico / Lamina MetÃ¡lica / Vidrio.', '', 1, NULL, NULL),
(101, 1, 1, 'Silla universitaria NTC 4734', '', 'productos/silla-universitaria-punta-baja-2.jpg', 'Clase 3 y 4. Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Superficies:  En laca mate natural; FÃ³rmica; Termoformado en PET o PVC.\r\nPintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris y Negro gofrado.', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada o aglomerado.', '', NULL, NULL, NULL),
(103, 6, 22, 'es_pacio (disposiciÃ³n lineal)', '1000000001', 'productos/lineal.jpg', 'Es_pacio, permite diferentes disposiciones adaptables  a las necesidades y requerimientos de sus usuarios.', 'Para llevar al mÃ¡ximo su personalizaciÃ³n, Es_pacio cuenta con diferentes materiales que se pueden combinar entre si:  AcrÃ­lico, Maderas y Metal son algunas de estas posibilidades.\r\n', '', '', '', 2, NULL, NULL),
(104, 6, 22, 'es_pacio (disposiciÃ³n a 90Âº)', '1000000001', 'productos/L.jpg', 'Es_pacio, permite diferentes disposiciones adaptables  a las necesidades y requerimientos de sus usuarios.', 'Para llevar al mÃ¡ximo su personalizaciÃ³n, Es_pacio cuenta con diferentes materiales que se pueden combinar entre si:  AcrÃ­lico, Maderas y Metal son algunas de estas posibilidades.\r\n', '', '', '', 3, NULL, NULL),
(105, 6, 22, 'es_pacio (disposiciÃ³n a 120Âº)', '1000000001', 'productos/120g.jpg', 'Es_pacio, permite diferentes disposiciones adaptables  a las necesidades y requerimientos de sus usuarios.', 'Para llevar al mÃ¡ximo su personalizaciÃ³n, Es_pacio cuenta con diferentes materiales que se pueden combinar entre si:  AcrÃ­lico, Maderas y Metal son algunas de estas posibilidades.\r\n', '', '', '', 4, NULL, NULL),
(108, 6, 23, 'Ovale', '', 'productos/ovale1.jpg', 'Versatilidad, excelente relaciÃ³n diseÃ±o - precio, estilo y funcionalidad.', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo / Termoformado con diferentes texturas y colores.', 'Blanco, negro, rojo, fucsia, verde, azul.', 'Estructura en LÃ¡mina de Acero CR; Paneles en Madera con recubrimiento tapizado o termoformado en PVC o PET, vidrio.', '', 7, NULL, NULL),
(109, 6, 23, 'Ovale', '', 'productos/ovale2.jpg', 'Versatilidad, excelente relaciÃ³n diseÃ±o - precio, estilo y funcionalidad.', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo / Termoformado con diferentes texturas y colores.   ', 'Blanco, negro, rojo, fucsia, verde, azul.', 'Estructura en LÃ¡mina de Acero CR; Paneles en Madera con recubrimiento tapizado o termoformado en PVC o PET, vidrio.', '', 8, NULL, NULL),
(110, 6, 23, 'Ovale', '', 'productos/ovale3.jpg', 'Versatilidad, excelente relaciÃ³n diseÃ±o - precio, estilo y funcionalidad. ', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo / Termoformado con diferentes texturas y colores. ', 'Blanco, negro, rojo, fucsia, verde, azul. ', 'Estructura en LÃ¡mina de Acero CR; Paneles en Madera con recubrimiento tapizado o termoformado en PVC o PET, vidrio.', '', 9, NULL, NULL),
(112, 6, 24, 'Ellise', '', 'productos/ellise2.jpg', 'Estilo, funcionalidad, resistencia, seguridad, durabilidad, respaldo.', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo / Termoformado con diferentes texturas y colores.  ', 'Blanco, negro, rojo, verde, azul.', 'Aluminio, LÃ¡mina de Acero CR; Paneles en Madera con recubrimiento tapizado o termoformado en PVC o PET, vidrio. ', '', 10, NULL, NULL),
(113, 6, 24, 'Ellise', '', 'productos/ellise3.jpg', 'Estilo, funcionalidad, resistencia, seguridad, durabilidad, respaldo. ', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo / Termoformado con diferentes texturas y colores.  ', 'Blanco, negro, rojo, verde, azul.', 'Aluminio, LÃ¡mina de Acero CR; Paneles en Madera con recubrimiento tapizado o termoformado en PVC o PET, vidrio.  ', '', 11, NULL, NULL),
(114, 6, 24, 'Ellise', '', 'productos/ellise4.jpg', 'Estilo, funcionalidad, resistencia, seguridad, durabilidad, respaldo. ', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo / Termoformado con diferentes texturas y colores.  ', 'Blanco, negro, rojo, verde, azul.', 'Aluminio, LÃ¡mina de Acero CR; Paneles en Madera con recubrimiento tapizado o termoformado en PVC o PET, vidrio.  ', '', 12, NULL, NULL),
(115, 6, 24, 'Ellise', '', 'productos/ellise1.jpg', 'Estilo, funcionalidad, resistencia, seguridad, durabilidad, respaldo.  ', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo / Termoformado con diferentes texturas y colores.  ', 'Blanco, negro, rojo, verde, azul  ', 'Aluminio, LÃ¡mina de Acero CR; Paneles en Madera con recubrimiento tapizado o termoformado en PVC o PET, vidrio.  ', '', 13, NULL, NULL),
(116, 6, 25, 'Sfera', '', 'productos/sfera1.jpg', 'Robustez, durabilidad, conectividad, aislamiento acÃºstico, resistencia, funcionalidad, respaldo, diversidad en acabados.', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo / Termoformado con diferentes texturas y colores.  ', 'Blanco, negro, rojo, verde, azul, amarillo.', 'Estructura en LÃ¡mina de Acero CR; Paneles en Madera con recubrimiento tapizado o termoformado en PVC o PET, vidrio. ', '', 14, NULL, NULL),
(117, 6, 25, 'Sfera', '', 'productos/sfera2.jpg', 'Robustez, durabilidad, conectividad, aislamiento acÃºstico, resistencia, funcionalidad, respaldo, diversidad en acabados. ', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo / Termoformado con diferentes texturas y colores.  ', 'Blanco, negro, rojo, verde, azul, amarillo.', 'Estructura en LÃ¡mina de Acero CR; Paneles en Madera con recubrimiento tapizado o termoformado en PVC o PET, vidrio.  ', '', 15, NULL, NULL),
(118, 6, 25, 'Sfera', '', 'productos/sfera3.jpg', 'Robustez, durabilidad, conectividad, aislamiento acÃºstico, resistencia, funcionalidad, respaldo, diversidad en acabados. ', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo / Termoformado con diferentes texturas y colores. ', 'Blanco, negro, rojo, verde, azul, amarillo. ', 'Estructura en LÃ¡mina de Acero CR; Paneles en Madera con recubrimiento tapizado o termoformado en PVC o PET, vidrio.  ', '', 16, NULL, NULL),
(119, 11, 32, 'Modulo de cafeterÃ­a', '', 'productos/MÃ³dulo-cafeteria-web.jpg', 'Modulo de cuatro puestos; Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo. ', 'Estructura metÃ¡lica: Gris y Negro gofrado. ', 'Metales: Tuberia Acero rectangular CR, 1"  x 2" Cal.18; Lamina Acero CR, Cal.18; Sillas en Polipropileno de alto impacto. Superficie: Madera contrachapada o aglomerado. Recubrimiento en fÃ³rmica con canto rÃ­gido o Termoformado en PET o PVC o Acero Inoxidable.', '', 13, NULL, '2'),
(120, 1, 1, 'Silla universitaria concha plÃ¡stica NTC 4734', '', 'productos/Silla-Universitaria-concha-plastica-WEB.jpg', 'Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad ', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo.', 'Estructura metÃ¡lica: Gris y Negro gofrado.', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22; Polipropileno de alto impacto', '', NULL, NULL, NULL),
(121, 1, 1, 'Tablero NTC 4726', '', 'productos/Tablero-NTC-web.jpg', 'Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad ', 'Madera: Aglomerado, enchapado en FÃ³rmica blanca o cuadriculada. ', 'Blanco.', 'Madera: Aglomerado. Contorno en aluminio. Esquinas con protector en polipropileno.', '', NULL, NULL, NULL),
(122, 1, 1, 'Asiento Unipersonal o Bipersonal  NTC  4641', '', 'productos/Asiento-Punta-Baja-NTC web.jpg', 'Clase 1-2-3-4. Seguridad; Durabilidad; Resistencia, Respaldo; Funcionalidad ', 'Superficies: En laca mate natural; FÃ³rmica; Termoformado en PET o PVC. Pintura electrostÃ¡tica horneable con recubrimiento en polvo. ', 'Estructura metÃ¡lica: Gris y Negro gofrado. ', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22. Maderas: Madera contrachapada o aglomerado. ', '', NULL, NULL, NULL),
(123, 7, 27, 'Tribus', '', 'productos/of2.jpg', 'Facilidad de integraciÃ³n, adaptabilidad al espacio, alto valor de diseÃ±o, autonomÃ­a del puesto de trabajo, versatilidad.', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo / Termoformado con diferentes texturas y colores.  ', 'Blanco, negro, rojo, verde, azul, amarillo. ', 'TuberÃ­a Acero CR, Â½â€, 7/8", 1â€, 1 Â½â€, 2â€  Cal.18; Lamina Acero CR, Cal.22. Madera con formica o termoformado en PVC o PET, acrÃ­lico	\r\n', '', NULL, NULL, NULL),
(124, 7, 27, 'Tribus', '', 'productos/of3.jpg', 'Facilidad de integraciÃ³n, adaptabilidad al espacio, alto valor de diseÃ±o, autonomÃ­a del puesto de trabajo, versatilidad. ', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo / Termoformado con diferentes texturas y colores.  ', 'Blanco, negro, rojo, verde, azul, amarillo.', 'TuberÃ­a Acero CR, Â½â€, 7/8", 1â€, 1 Â½â€, 2â€ Cal.18; Lamina Acero CR, Cal.22. Madera con formica o termoformado en PVC o PET, acrÃ­lico  ', '', NULL, NULL, NULL),
(125, 7, 27, 'Tribus', '', 'productos/of1.jpg', 'Facilidad de integraciÃ³n, adaptabilidad al espacio, alto valor de diseÃ±o, autonomÃ­a del puesto de trabajo, versatilidad.', 'Pintura electrostÃ¡tica horneable con recubrimiento en polvo / Termoformado con diferentes texturas y colores.  ', 'Blanco, negro, rojo, verde, azul, amarillo. ', 'TuberÃ­a Acero CR, Â½â€, 7/8", 1â€, 1 Â½â€, 2â€  Cal.18; Lamina Acero CR, Cal.22. Madera con fÃ³rmica o termoformado en PVC o PET, acrÃ­lico	\r\n', '', NULL, NULL, NULL),
(129, 8, 28, 'Nuestro Concepto R.T.A - Listo para ensamblar', '', 'productos/Web-RTA-concept.jpg', 'Nuestra lÃ­nea R.T.A estÃ¡ concebida para entragarle facilidades: facilidad de transporte, facilidad de armado por el usuario, facilidad de integraciÃ³n entre estaciones de trabajo, autonomÃ­a entre puestos de trabajo, adaptabilidad del espacio, alto valor de DiseÃ±o.\r\nâ€œRecibe tu R.T.A. en cajas, donde encontraras todas las piezas que te permitirÃ¡n armar fÃ¡cilmente tu producto finalâ€.\r\n', '', '', '', '', NULL, NULL, NULL),
(130, 8, 28, 'es_pacio ', '', 'productos/es_pacio.jpg', 'Es_pacio, permite diferentes disposiciones adaptables a las necesidades y requerimientos de sus usuarios. ', 'Para llevar al mÃ¡ximo su personalizaciÃ³n, Es_pacio cuenta con diferentes materiales que se pueden combinar entre si: AcrÃ­lico, Maderas y Metal son algunas de estas posibilidades.  ', '', '', '', NULL, NULL, NULL),
(131, 8, 28, 'Archivador RTA - Listo para ensamblar', '', 'productos/archivador.jpg', 'Nuestro archivador R.T.A estÃ¡ listo para ensamblar por usted mismo, con alta capacidad de almacenamiento; Modularidad; Durabilidad; Resistencia; Respaldo; Funcionalidad.  ', 'Superficies: Pintura electrostÃ¡tica horneable con recubrimiento en polvo.  ', 'Estructura metÃ¡lica: Gris metalizado, Negro texturado o segÃºn disponibilidad ', 'Metales: Lamina Acero CR, Cal.22.  ', '', NULL, NULL, NULL),
(132, 6, 22, 'DisposiciÃ³n en T', '', 'productos/Es_p T-web.jpg', 'Es_pacio, permite diferentes disposiciones adaptables a las necesidades y requerimientos de sus usuarios.', 'Para llevar al mÃ¡ximo su personalizaciÃ³n, Es_pacio cuenta con diferentes materiales que se pueden combinar entre si: AcrÃ­lico, Maderas y Metal son algunas de estas posibilidades. ', '', '', '', 5, NULL, NULL),
(134, 6, 22, 'DisposiciÃ³n en X', '', 'productos/Es_p X-web.jpg', ' Es_pacio, permite diferentes disposiciones adaptables a las necesidades y requerimientos de sus usuarios.', ' Para llevar al mÃ¡ximo su personalizaciÃ³n, Es_pacio cuenta con diferentes materiales que se pueden combinar entre si: AcrÃ­lico, Maderas y Metal son algunas de estas posibilidades. ', '', '', '', 6, NULL, NULL),
(141, 2, 13, 'basica', '', 'productos/basica.png', 'Comodidad; ErgonomÃ­a; Durabilidad; Resistencia; Respaldo; Funcionalidad; Seguridad; Configurable, con/sin superficie de trabajo.	  ', 'Espaldar y asiento en espuma rosada, tapizado en Escorial Hilat, brazo en triplex de 12 mm enchapado. ', 'Gama de colores Escorial Hilat	 ', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22. Maderas: Madera contrachapada, espuma', '', NULL, NULL, NULL),
(142, 2, 13, 'intermedia', '', 'productos/intermedia.png', 'Comodidad; ErgonomÃ­a; Durabilidad; Resistencia; Respaldo; Funcionalidad; Seguridad; Configurable, con/sin superficie de trabajo', 'Espaldar y asiento en espuma rosada, tapizado en Escorial Hilat, brazos inyectados', 'Gama de colores Escorial Hilat	  ', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22. Maderas: Madera contrachapada, espuma	  ', '', NULL, NULL, NULL),
(143, 2, 13, 'full 1', '', 'productos/full1.png', 'Comodidad; ErgonomÃ­a; Durabilidad; Resistencia; Respaldo; Funcionalidad; Seguridad; Configurable, con/sin superficie de trabajo', 'Espaldar y asiento en espuma inyectada, tapizado en Escorial Hilat, brazo inyectado, con contratapas', 'Gama de colores Escorial Hilat	  ', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22. Maderas: Madera contrachapada, espuma inyectada', '', NULL, NULL, NULL),
(144, 2, 13, 'full 2', '', 'productos/full2.png', 'Comodidad; ErgonomÃ­a; Durabilidad; Resistencia; Respaldo; Funcionalidad; Seguridad; Configurable, con/sin superficie de trabajo', 'Espaldar y asiento en espuma inyectada, tapizado en Escorial Hilat, brazos inyectados, sin contratapa', 'Gama de colores Escorial Hilat	  ', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22. Maderas: Madera contrachapada, espuma inyectada', '', NULL, NULL, NULL),
(145, 11, 32, 'ISO ', '2080010000', 'productos/Silla-interlocutora-ISO-sin-brazo.jpg.jpg', 'Comodidad; ErgonomÃ­a; Durabilidad; Resistencia; Respaldo; Funcionalidad; Seguridad; Configurable, con brazo y sin brazo.', 'Concha plÃ¡stica en Polilpropileno, o Tapizado en Hilat Escorial.', 'Gama de colores Escorial Hilat\r\nConchas PP: rojo, azul, verde, blanco, negro', 'Metales: Tuberia Acero CR, 7/8" Cal.18; Lamina Acero CR, Cal.22.\r\nMaderas: Madera contrachapada, Triplex.\r\nConchas: PP', '', 1, NULL, '2'),
(146, 11, 32, 'Risma', '', 'productos/risma...jpg', 'Aplilables', 'pintura electrostÃ¡tica', 'Estructura color negro\r\n\r\nPlÃ¡sticos en color: Negro, gris, verde y azul.', 'Tubo rectangular de 7/8 calibre 18. \r\n', '', 3, NULL, '2'),
(147, 11, 32, 'Venecia', '', 'productos/Venecia.jpg', '', 'pintura electrostÃ¡tica', 'Estructura color negro Ref: 4-21 \r\nPlÃ¡sticos en color: Negro, gris, verde y azul.', 'Tubo redondode 1 pulgada calibre 18. ', '', 4, NULL, '2'),
(148, 11, 32, 'Uni con brazos', '', 'productos/Uni.jpg', '', 'Estructura metÃ¡lica: Pintura electroestÃ¡tica', 'Colores PP: cafÃ©, negro, amarillo y blanco', 'Espaldar y/o Asiento: En Polipropileno (PP), o tapizado en rojo y beige.\r\n', '', 2, NULL, '2'),
(149, 11, 32, 'Venus', '', 'productos/Venus.jpg', '', 'pintura electrostÃ¡tica', 'Estructura color negro.\r\nPlÃ¡sticos en color: \r\nNegro, gris, verde, azul y rojo.', 'Tubo redondo 7/8 calibre 18', '', 5, NULL, '2'),
(150, 11, 32, 'Isosped', '', 'productos/Isosped.jpg', '', 'pintura electrostÃ¡tica', 'Estructura color negro.\r\nPlÃ¡sticos en color: Negro, gris, verde y azul.', 'Tubo rectangular de 7/8 calibre 18. ', '', 6, NULL, '2'),
(151, 11, 32, 'Espid', '', 'productos/Espid.jpg', 'Se pueden apilar', 'pintura electrostÃ¡tica', 'Estructura color negro. \r\nPlÃ¡sticos en color: Negro, azul, verde y gris.\r\n', 'Tubo rectangular de 7/8 calibre 18. \r\n', '', 7, NULL, '2'),
(152, 11, 32, 'lonk', '', 'productos/lonk.jpg', 'Apilables en 12 unidades\r\n', 'Pintura electro estatica ', 'PlÃ¡stico color: negro, gris, verde y azul.\r\n', 'Estructura: Tubo redondo de 7/8â€ pulgada calibre 14. \r\n', '', 8, NULL, '2'),
(153, 11, 32, 'OriÃ³n', '', 'productos/Orion.jpg', '', 'pintura electrostÃ¡tica', 'Color negro.\r\nPlÃ¡sticos en color: Negro, gris, verde y azul.\r\n', 'Tubo redondo de 1 pulgada calibre 18. \r\n', '', 9, NULL, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `image_path` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pertenecealacategorias` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `categoria_id`, `nombre`, `image_path`) VALUES
(1, 1, 'ninguna', ''),
(2, 2, 'ninguna', ''),
(4, 4, 'ninguna', ''),
(5, 5, 'ninguna', ''),
(9, 2, 'Sillas con superficie de trabajo', ''),
(13, 2, 'Sillas de auditorio', ''),
(18, 2, 'Sillas Interlocutoras', ''),
(19, 6, 'ninguna', ''),
(20, 2, 'Sillas Interlocutoras con Brazos', ''),
(21, 2, 'Sillas de Espera, Alimentos y Bebidas', ''),
(22, 6, 'es_pacio', ''),
(23, 6, 'Ovale', ''),
(24, 6, 'Ellise', ''),
(25, 6, 'Sfera', ''),
(26, 7, 'ninguna', ''),
(27, 7, 'Tribus', ''),
(28, 8, 'ninguna', ''),
(29, 9, 'ninguna', ''),
(32, 11, 'ninguna', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_de_usuario` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_de_usuario`, `password`) VALUES
(1, 'provider', '3c623d0ddd2a1b2563f8a04310ffd8b1be69b4b1');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `config`
--
ALTER TABLE `config`
  ADD CONSTRAINT `utenticacionausar` FOREIGN KEY (`autenticacion_id`) REFERENCES `autenticaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `perteneceaunasubcategoria` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `pertenecealacategorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
