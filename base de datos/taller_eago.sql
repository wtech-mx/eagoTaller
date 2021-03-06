-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2020 a las 20:58:17
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller_eago`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `nombre`, `idempresa`, `fecha_carga`) VALUES
(1, 'informatica', 1, '2019-11-15 03:46:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `extracto` varchar(250) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `texto` text DEFAULT NULL,
  `thumb` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choque`
--

CREATE TABLE `choque` (
  `id` int(11) NOT NULL,
  `choque_code` varchar(100) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `fecha_choque` date NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `nombre_ter` varchar(255) NOT NULL,
  `dni_ter` varchar(20) NOT NULL,
  `registro_ter` date NOT NULL,
  `patente_ter` varchar(30) NOT NULL,
  `marca_modelo_ter` varchar(255) NOT NULL,
  `poliza_ter` varchar(50) NOT NULL,
  `telefono_ter` varchar(50) NOT NULL,
  `celular_ter` varchar(50) NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `foto4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `apellido` text CHARACTER SET latin1 NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `edad` int(10) NOT NULL,
  `id_empresa` int(10) NOT NULL,
  `idvehiculo` varchar(50) NOT NULL,
  `manejo` date NOT NULL,
  `colTrabajo` varchar(50) NOT NULL,
  `colCasa` varchar(50) NOT NULL,
  `cpTrabajo` int(10) NOT NULL,
  `cpCasa` int(10) NOT NULL,
  `km` float NOT NULL,
  `entidad` varchar(50) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `telefono`, `correo`, `edad`, `id_empresa`, `idvehiculo`, `manejo`, `colTrabajo`, `colCasa`, `cpTrabajo`, `cpCasa`, `km`, `entidad`, `tipo`, `status`) VALUES
(1, 'dayanna', 'Espinosa', '(553) 990-7266', 'dayannaespinosa54@gmail.com', 25, 2, '', '2020-02-13', 'aeropuerto', 'upiicsa', 7580, 7580, 43, 'Mexicano', '2', 0),
(3, 'josue', 'Espinosa', '(553) 990-7266', 'josue@gmail.com', 25, 0, '', '0000-00-00', '', '', 7580, 0, 0, '', '3', 0),
(4, 'karla', 'Espinosa', '(553) 990-7266', 'karla@gmail.com', 25, 0, '', '2020-02-06', '', '', 7580, 0, 0, '', '2', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `dni` varchar(80) DEFAULT NULL,
  `actividad_economica` varchar(255) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre`, `dni`, `actividad_economica`, `email`, `telefono`, `imagen`) VALUES
(1, 'EAGO', '890', 'Administrador', 'eago@gmail.com', '5538792380', 'view/resources/images/1573851138_logoCar.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `mensaje` varchar(100) NOT NULL,
  `servicio` int(11) NOT NULL,
  `entidad` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` float NOT NULL DEFAULT 0,
  `servicio2` int(11) NOT NULL,
  `entidad2` int(11) NOT NULL,
  `cantidad2` int(11) NOT NULL,
  `descripcion2` varchar(100) NOT NULL,
  `precio2` varchar(100) NOT NULL,
  `servicio3` int(11) NOT NULL,
  `entidad3` int(11) NOT NULL,
  `cantidad3` int(11) UNSIGNED ZEROFILL NOT NULL,
  `descripcion3` varchar(100) NOT NULL,
  `precio3` varchar(100) NOT NULL,
  `servicio4` int(11) NOT NULL,
  `entidad4` int(11) NOT NULL,
  `cantidad4` int(11) NOT NULL,
  `descripcion4` varchar(100) NOT NULL,
  `precio4` varchar(100) NOT NULL,
  `servicio5` int(11) NOT NULL,
  `entidad5` int(11) NOT NULL,
  `cantidad5` int(11) NOT NULL,
  `descripcion5` varchar(100) NOT NULL,
  `precio5` varchar(100) NOT NULL,
  `subtotal` float NOT NULL,
  `total` float NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`id`, `nombre`, `correo`, `mensaje`, `servicio`, `entidad`, `cantidad`, `descripcion`, `precio`, `servicio2`, `entidad2`, `cantidad2`, `descripcion2`, `precio2`, `servicio3`, `entidad3`, `cantidad3`, `descripcion3`, `precio3`, `servicio4`, `entidad4`, `cantidad4`, `descripcion4`, `precio4`, `servicio5`, `entidad5`, `cantidad5`, `descripcion5`, `precio5`, `subtotal`, `total`, `fecha_carga`) VALUES
(1, 'Itzel', 'itzel@gmail.com', 'gfhfhg', 4, 1, 5, 'alta placas', 520, 1, 1, 15, 'veracruz', '', 1, 1, 00000000006, 'hghg', '3000', 1, 1, 5, 'ssf', '', 1, 1, 0, 'gh', '', 4000, 6000, '2020-03-25 02:28:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentacion`
--

CREATE TABLE `documentacion` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `documento_code` varchar(100) CHARACTER SET latin1 NOT NULL,
  `foto1` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto2` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto3` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto4` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto5` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto6` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto7` varchar(255) NOT NULL,
  `foto8` varchar(255) NOT NULL,
  `foto9` varchar(255) NOT NULL,
  `foto10` varchar(255) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentacion`
--

INSERT INTO `documentacion` (`id`, `id_cliente`, `id_empresa`, `idvehiculo`, `documento_code`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`, `foto7`, `foto8`, `foto9`, `foto10`, `fecha_carga`) VALUES
(7, 1, 2, 3, '1585184491-1', 'view/resources/images/documentos/1586811335_ayuda.jpg', 'view/resources/images/documentos/1586811397_cotizacion.pdf', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', '2020-03-26 02:01:31'),
(9, 1, 2, 3, '2', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/1586835054_cotizacion.pdf', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', '2020-03-26 02:14:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `registro` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `kind` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `dni`, `imagen`, `nombre`, `apellido`, `username`, `email`, `password`, `domicilio`, `localidad`, `telefono`, `celular`, `registro`, `status`, `kind`, `created_at`) VALUES
(1, '543434', 'view/resources/images/1573849686_logoCar.png', 'Escuderia', 'AGO', 'admin', 'eago@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'AV SAN ANDRES', 'colchester', '9544534', '5533445340', '1', 1, 0, '2019-11-14 03:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_permisos`
--

CREATE TABLE `empleado_permisos` (
  `idempleado_permiso` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado_permisos`
--

INSERT INTO `empleado_permisos` (`idempleado_permiso`, `idempleado`, `idpermiso`) VALUES
(27, 1, 1),
(28, 1, 2),
(29, 1, 3),
(30, 1, 4),
(31, 1, 5),
(32, 1, 6),
(33, 1, 7),
(34, 1, 8),
(37, 1, 9),
(38, 1, 10),
(39, 1, 11),
(40, 1, 12),
(42, 1, 13),
(43, 1, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre`, `correo`, `telefono`, `estado`, `fecha_carga`) VALUES
(1, 'Itzel', 'dayannaespinosa54@gmail.com', '(553) 990-7266', 1, '2020-01-30 18:32:16'),
(7, 'Itzel', 'itzel@gmail.com', '(553) 990-7266', 1, '2020-04-19 22:41:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `clave` varchar(2) NOT NULL COMMENT 'CVE_ENT - Clave de la entidad',
  `nombre` varchar(40) NOT NULL COMMENT 'NOM_ENT - Nombre de la entidad',
  `abrev` varchar(10) NOT NULL COMMENT 'NOM_ABR - Nombre abreviado de la entidad',
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Estados de la República Mexicana';

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `clave`, `nombre`, `abrev`, `activo`) VALUES
(1, '01', 'Aguascalientes', 'Ags.', 1),
(2, '02', 'Baja California', 'BC', 1),
(3, '03', 'Baja California Sur', 'BCS', 1),
(4, '04', 'Campeche', 'Camp.', 1),
(5, '05', 'Coahuila de Zaragoza', 'Coah.', 1),
(6, '06', 'Colima', 'Col.', 1),
(7, '07', 'Chiapas', 'Chis.', 1),
(8, '08', 'Chihuahua', 'Chih.', 1),
(9, '09', 'Ciudad de México', 'CDMX', 1),
(10, '10', 'Durango', 'Dgo.', 1),
(11, '11', 'Guanajuato', 'Gto.', 1),
(12, '12', 'Guerrero', 'Gro.', 1),
(13, '13', 'Hidalgo', 'Hgo.', 1),
(14, '14', 'Jalisco', 'Jal.', 1),
(15, '15', 'México', 'Mex.', 1),
(16, '16', 'Michoacán de Ocampo', 'Mich.', 1),
(17, '17', 'Morelos', 'Mor.', 1),
(18, '18', 'Nayarit', 'Nay.', 1),
(19, '19', 'Nuevo León', 'NL', 1),
(20, '20', 'Oaxaca', 'Oax.', 1),
(21, '21', 'Puebla', 'Pue.', 1),
(22, '22', 'Querétaro', 'Qro.', 1),
(23, '23', 'Quintana Roo', 'Q. Roo', 1),
(24, '24', 'San Luis Potosí', 'SLP', 1),
(25, '25', 'Sinaloa', 'Sin.', 1),
(26, '26', 'Sonora', 'Son.', 1),
(27, '27', 'Tabasco', 'Tab.', 1),
(28, '28', 'Tamaulipas', 'Tamps.', 1),
(29, '29', 'Tlaxcala', 'Tlax.', 1),
(30, '30', 'Veracruz de Ignacio de la Llave', 'Ver.', 1),
(31, '31', 'Yucatán', 'Yuc.', 1),
(32, '32', 'Zacatecas', 'Zac.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estetica`
--

CREATE TABLE `estetica` (
  `id` int(11) NOT NULL,
  `fecha_rep` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `datos` varchar(100) CHARACTER SET latin1 NOT NULL,
  `idtrasladista` int(11) NOT NULL,
  `gasolina` float NOT NULL,
  `otros` varchar(40) NOT NULL,
  `personal` varchar(300) NOT NULL,
  `observaciones` varchar(40) NOT NULL,
  `vendedor` varchar(40) NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `reparacion` varchar(100) NOT NULL,
  `trasladistas_admin` varchar(100) NOT NULL,
  `gasolina_admin` varchar(100) NOT NULL,
  `otros_admin` varchar(50) NOT NULL,
  `asesor` varchar(50) NOT NULL,
  `vendedor_admin` varchar(100) NOT NULL,
  `subtotal_admin` varchar(100) NOT NULL,
  `eago_admin` varchar(100) NOT NULL,
  `total_admin` varchar(100) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `idtaller` int(11) NOT NULL,
  `origen` varchar(200) NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `foto4` varchar(255) NOT NULL,
  `foto5` varchar(255) NOT NULL,
  `foto6` varchar(255) NOT NULL,
  `foto7` varchar(255) NOT NULL,
  `foto8` varchar(255) NOT NULL,
  `foto9` varchar(255) NOT NULL,
  `foto10` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estetica`
--

INSERT INTO `estetica` (`id`, `fecha_rep`, `id_cliente`, `id_empresa`, `idvehiculo`, `datos`, `idtrasladista`, `gasolina`, `otros`, `personal`, `observaciones`, `vendedor`, `fecha_carga`, `reparacion`, `trasladistas_admin`, `gasolina_admin`, `otros_admin`, `asesor`, `vendedor_admin`, `subtotal_admin`, `eago_admin`, `total_admin`, `estado`, `idtaller`, `origen`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`, `foto7`, `foto8`, `foto9`, `foto10`, `status`) VALUES
(1, '2020-02-02', 1, 0, 1, 'asientos', 1, 0, '60626', '', '', 'carlos', '2020-03-21 17:45:59', '200', '50', '45', '151', '51', '84', '676', '95', '676', 2, 1, 'CDMX', 'view/resources/images/gastos/este/1587414401_bicycle-1869176_1280.jpg', 'view/resources/images/gastos/este/1587336849_2.jpg', '', '', 'view/resources/images/gastos/este/1587337040_ayuda.jpg', '', '', '', '', '', 1),
(2, '2020-05-06', 3, 7, 12, 'asientos', 1, 0, '', ' jhgjghj\r\njkh\r\nhjkhjk\r\nfhgtfhgfh\r\nytuytu', '   hf', '', '2020-04-21 20:15:08', '', '', '', '', '', '', '', '', '', 0, 1, '', '', '', '', '', '', '', '', '', '', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestoria`
--

CREATE TABLE `gestoria` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `datos` varchar(30) CHARACTER SET latin1 NOT NULL,
  `fecha_ges` date NOT NULL,
  `aplaca` date NOT NULL,
  `bplaca` date NOT NULL,
  `rplaca` date NOT NULL,
  `tarjeta` date NOT NULL,
  `otro` varchar(50) CHARACTER SET latin1 NOT NULL,
  `observaciones` varchar(300) NOT NULL,
  `personal` varchar(40) NOT NULL,
  `idtrasladista` int(11) NOT NULL,
  `gasolina` float NOT NULL,
  `gestion` varchar(50) NOT NULL,
  `idcarro` int(11) NOT NULL,
  `gastos` float NOT NULL,
  `mensajeria` varchar(50) NOT NULL,
  `mesa` varchar(50) NOT NULL,
  `vendedor` varchar(50) NOT NULL,
  `general` varchar(50) NOT NULL,
  `trasladista_admin` float NOT NULL,
  `subtotal_admin` float NOT NULL,
  `eago_admin` float NOT NULL,
  `total_admin` float NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `idtaller` int(11) NOT NULL,
  `origen` varchar(200) NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `foto4` varchar(255) NOT NULL,
  `foto5` varchar(255) NOT NULL,
  `foto6` varchar(255) NOT NULL,
  `foto7` varchar(255) NOT NULL,
  `foto8` varchar(255) NOT NULL,
  `foto9` varchar(255) NOT NULL,
  `foto10` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gestoria`
--

INSERT INTO `gestoria` (`id`, `id_cliente`, `id_empresa`, `idvehiculo`, `datos`, `fecha_ges`, `aplaca`, `bplaca`, `rplaca`, `tarjeta`, `otro`, `observaciones`, `personal`, `idtrasladista`, `gasolina`, `gestion`, `idcarro`, `gastos`, `mensajeria`, `mesa`, `vendedor`, `general`, `trasladista_admin`, `subtotal_admin`, `eago_admin`, `total_admin`, `estado`, `fecha_carga`, `idtaller`, `origen`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`, `foto7`, `foto8`, `foto9`, `foto10`, `status`) VALUES
(1, 1, 2, 1, 'asientos', '2020-07-06', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 1, 0, '', 0, 0, '', '', '', '', 0, 0, 0, 0, 0, '2020-03-26 00:11:46', 1, '', 'view/resources/images/gastos/ges/1587493073_2.jpg', 'view/resources/images/gastos/ges/1587493075_3.jpg', 'view/resources/images/gastos/ges/1587493079_4.jpg', 'view/resources/images/gastos/ges/1587493083_5dccf3a66f463.png', '', 'view/resources/images/gastos/ges/1587493090_ayuda.jpg', '', 'view/resources/images/gastos/ges/1587493182_prodcto4.jpg', '', 'view/resources/images/gastos/ges/1587493188_sus.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kind`
--

CREATE TABLE `kind` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id` int(11) NOT NULL,
  `fecha_man` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `idtaller` int(11) NOT NULL,
  `datos` varchar(30) NOT NULL,
  `idtrasladista` int(11) NOT NULL,
  `gasolina` float NOT NULL,
  `otros` varchar(50) NOT NULL,
  `observaciones` varchar(50) NOT NULL,
  `personal` varchar(300) NOT NULL,
  `vendedor` varchar(50) NOT NULL,
  `trasladista_admin` double NOT NULL,
  `otro_admin` double NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `subtotal` double NOT NULL,
  `eago` double NOT NULL,
  `total` double NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `origen` varchar(200) NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `foto4` varchar(255) NOT NULL,
  `foto5` varchar(255) NOT NULL,
  `foto6` varchar(255) NOT NULL,
  `foto7` varchar(255) NOT NULL,
  `foto8` varchar(255) NOT NULL,
  `foto9` varchar(255) NOT NULL,
  `foto10` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`) VALUES
(1, 'Dashboard'),
(2, 'Empleados'),
(3, 'Clientes'),
(4, 'Documentacion'),
(5, 'Empresa'),
(6, 'Gestor Admin'),
(7, 'Vehiculo'),
(8, 'Slide'),
(9, 'Blog'),
(10, 'Servicios'),
(11, 'Configuracion'),
(12, 'Trasladista'),
(13, 'Comprobacion Gastos'),
(14, 'Cotizacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparaciones`
--

CREATE TABLE `reparaciones` (
  `id` int(11) NOT NULL,
  `fecha_repa` date NOT NULL,
  `idcliente` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `idtaller` int(11) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguro`
--

CREATE TABLE `seguro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `poliza` varchar(25) NOT NULL,
  `vencimiento` date NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguro`
--

INSERT INTO `seguro` (`id`, `nombre`, `poliza`, `vencimiento`, `fecha_carga`) VALUES
(1, 'Escuderia', 'EAGO', '2025-12-12', '2020-01-16 01:46:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`) VALUES
(1, 'Mantenimiento'),
(2, 'Mecanica/Estetica'),
(3, 'Gestoria'),
(4, 'Traslados'),
(5, 'Verificacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `boton` varchar(255) NOT NULL,
  `folder` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cuit` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `localidad` varchar(255) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`id`, `nombre`, `cuit`, `direccion`, `localidad`, `telefono`, `celular`, `estado`, `fecha_carga`) VALUES
(1, 'Escuderia', 'Federativa', 'Puerto ensenada nÃºmero 24', 'Ciudad de MÃ©xico', '(553) 990-7266', '(553) 990-7266', 1, '2020-03-26 00:14:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE `tarjeta` (
  `id` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `vencimiento` date NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trasladista`
--

CREATE TABLE `trasladista` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trasladista`
--

INSERT INTO `trasladista` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `status`, `created_at`) VALUES
(1, 'dayanna', 'jj', 'itzel@gmail.com', '5538807266', 1, '2020-03-20 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traslados`
--

CREATE TABLE `traslados` (
  `id` int(11) NOT NULL,
  `fecha_tras` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `datos` varchar(30) CHARACTER SET latin1 NOT NULL,
  `observaciones` varchar(30) NOT NULL,
  `personal` varchar(300) NOT NULL,
  `gasolina` int(20) NOT NULL,
  `casetas` int(20) NOT NULL,
  `idtrasladista` int(11) NOT NULL,
  `vendedor` text NOT NULL,
  `origen` varchar(200) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `autobus` varchar(50) NOT NULL,
  `gasolina_admin` float NOT NULL,
  `casetas_admin` float NOT NULL,
  `trasladistas_admin` varchar(50) NOT NULL,
  `vendedor_admin` varchar(50) NOT NULL,
  `subtotal_admin` float NOT NULL,
  `eago_admin` float NOT NULL,
  `total_admin` float NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `idtaller` int(11) NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `foto4` varchar(255) NOT NULL,
  `foto5` varchar(255) NOT NULL,
  `foto6` varchar(255) NOT NULL,
  `foto7` varchar(255) NOT NULL,
  `foto8` varchar(255) NOT NULL,
  `foto9` varchar(255) NOT NULL,
  `foto10` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `vehiculo_code` varchar(100) NOT NULL,
  `patente` varchar(40) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `submarca` varchar(255) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `nro_chasis` varchar(30) NOT NULL,
  `nro_motor` varchar(30) NOT NULL,
  `vto_vtv` date NOT NULL,
  `color` varchar(30) NOT NULL,
  `seguro` varchar(255) NOT NULL,
  `poliza` varchar(255) NOT NULL,
  `vencimiento` date NOT NULL,
  `foto4` varchar(255) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `foto5` varchar(255) NOT NULL,
  `foto6` varchar(255) NOT NULL,
  `foto7` varchar(255) NOT NULL,
  `foto8` varchar(255) NOT NULL,
  `foto9` varchar(255) NOT NULL,
  `foto10` varchar(255) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `id_cliente`, `id_empresa`, `vehiculo_code`, `patente`, `marca`, `submarca`, `modelo`, `nro_chasis`, `nro_motor`, `vto_vtv`, `color`, `seguro`, `poliza`, `vencimiento`, `foto4`, `estado`, `foto1`, `foto2`, `foto3`, `foto5`, `foto6`, `foto7`, `foto8`, `foto9`, `foto10`, `fecha_carga`) VALUES
(1, 1, 1, '1', 'LO-300', 'benz', 'add', '2019', 'ofl', '0932', '2020-02-03', '33', '897', 'EAGO', '2020-02-02', '1584808891-1', 1, 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', '2020-03-21 17:41:31'),
(3, 1, 2, '2', 'ASL-093', 'ferrari', 'add', '2019', 'fjgh', '245', '2020-05-08', 'blanco', '897', '', '0000-00-00', 'view/resources/images/vehiculos/1585166992_1.jpeg', 1, 'view/resources/images/vehiculos/1585167056_4.jpeg', 'view/resources/images/vehiculos/1585166982_3.jpeg', 'view/resources/images/vehiculos/1585166986_4.jpeg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', '2020-03-25 20:56:18'),
(11, 0, 2, '3', '976', 'ferrari', 'add', 'dgfh', 'fjgh', 'sdfg', '2020-06-04', '', '897', '', '0000-00-00', '1585179422-1', 1, 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', '2020-03-26 00:37:02'),
(12, 3, 2, '3', 'ASL-093', 'benz', 'add', '2019', 'fjgh', '', '2020-09-04', '', '', '', '0000-00-00', '1585179465-1', 1, 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', '2020-03-26 00:37:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_cliente`
--

CREATE TABLE `vehiculo_cliente` (
  `idvehiculo_cliente` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo_cliente`
--

INSERT INTO `vehiculo_cliente` (`idvehiculo_cliente`, `idcliente`, `idvehiculo`) VALUES
(1, 7, 3),
(2, 4, 9),
(3, 7, 2),
(10, 4, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verificacion`
--

CREATE TABLE `verificacion` (
  `id` int(11) NOT NULL,
  `fecha_veri` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `idtaller` int(11) NOT NULL,
  `datos` varchar(30) CHARACTER SET latin1 NOT NULL,
  `observaciones` varchar(30) NOT NULL,
  `personal` varchar(300) NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `derechos` varchar(50) NOT NULL,
  `otros` varchar(50) NOT NULL,
  `idtrasladista` int(11) NOT NULL,
  `vendedor` varchar(40) NOT NULL,
  `derechos_admin` varchar(30) NOT NULL,
  `otros_admin` varchar(30) NOT NULL,
  `trasladistas_admin` varchar(30) NOT NULL,
  `vendedor_admin` varchar(30) NOT NULL,
  `subtotal_admin` float NOT NULL,
  `eago_admin` float NOT NULL,
  `total_admin` float NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `origen` varchar(200) NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `foto4` varchar(255) NOT NULL,
  `foto5` varchar(255) NOT NULL,
  `foto6` varchar(255) NOT NULL,
  `foto7` varchar(255) NOT NULL,
  `foto8` varchar(255) NOT NULL,
  `foto9` varchar(255) NOT NULL,
  `foto10` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `verificacion`
--

INSERT INTO `verificacion` (`id`, `fecha_veri`, `id_cliente`, `id_empresa`, `idvehiculo`, `idtaller`, `datos`, `observaciones`, `personal`, `fecha_carga`, `derechos`, `otros`, `idtrasladista`, `vendedor`, `derechos_admin`, `otros_admin`, `trasladistas_admin`, `vendedor_admin`, `subtotal_admin`, `eago_admin`, `total_admin`, `estado`, `origen`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`, `foto7`, `foto8`, `foto9`, `foto10`, `status`) VALUES
(1, '2020-02-20', 1, 0, 1, 0, 'asientos', '', '', '2020-03-21 17:46:37', 'twe', '', 1, 'ter', 'hnjkn', '200', '100', '100', 400, 200, 600, 2, 'CDMX', '', '', '', '', '', '', '', '', '', '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `choque`
--
ALTER TABLE `choque`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado_permisos`
--
ALTER TABLE `empleado_permisos`
  ADD PRIMARY KEY (`idempleado_permiso`),
  ADD KEY `idempleado` (`idempleado`),
  ADD KEY `idpermiso` (`idpermiso`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `estetica`
--
ALTER TABLE `estetica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gestoria`
--
ALTER TABLE `gestoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `kind`
--
ALTER TABLE `kind`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguro`
--
ALTER TABLE `seguro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trasladista`
--
ALTER TABLE `trasladista`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `traslados`
--
ALTER TABLE `traslados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo_cliente`
--
ALTER TABLE `vehiculo_cliente`
  ADD PRIMARY KEY (`idvehiculo_cliente`);

--
-- Indices de la tabla `verificacion`
--
ALTER TABLE `verificacion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `choque`
--
ALTER TABLE `choque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `empleado_permisos`
--
ALTER TABLE `empleado_permisos`
  MODIFY `idempleado_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estetica`
--
ALTER TABLE `estetica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `gestoria`
--
ALTER TABLE `gestoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `kind`
--
ALTER TABLE `kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguro`
--
ALTER TABLE `seguro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trasladista`
--
ALTER TABLE `trasladista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `traslados`
--
ALTER TABLE `traslados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `vehiculo_cliente`
--
ALTER TABLE `vehiculo_cliente`
  MODIFY `idvehiculo_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `verificacion`
--
ALTER TABLE `verificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
