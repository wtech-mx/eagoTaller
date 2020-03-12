-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2020 a las 21:30:58
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `apellido` text CHARACTER SET latin1 NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `edad` int(10) NOT NULL,
  `placa` varchar(50) NOT NULL,
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

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `telefono`, `correo`, `edad`, `placa`, `manejo`, `colTrabajo`, `colCasa`, `cpTrabajo`, `cpCasa`, `km`, `entidad`, `tipo`, `status`) VALUES
(1, 'dayanna', 'Espinosa', '(553) 990-7266', 'karla@gmail.com', 22, '', '2020-12-15', 'zaragoza', '', 7580, 0, 0, 'Mexicano', 'premium', 0),
(2, 'Ricardo', 'Espinosa', '(553) 990-7266', 'ricardo@gmail.com', 25, '', '2020-01-30', 'aeropuerto', '', 7580, 0, 0, 'Mexicano', '5', 0);

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
-- Estructura de tabla para la tabla `documentacion`
--

CREATE TABLE `documentacion` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `documento_code` varchar(100) CHARACTER SET latin1 NOT NULL,
  `foto1` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto2` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto3` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto4` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto5` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto6` varchar(255) CHARACTER SET latin1 NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentacion`
--

INSERT INTO `documentacion` (`id`, `idcliente`, `idvehiculo`, `documento_code`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`, `fecha_carga`) VALUES
(2, 1, 3, '1579135711-1', 'view/resources/images/documentos/1583990204_SL275_OH.pdf', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/1583990827_producto4.1.jpeg', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', 'view/resources/images/documentos/doc.png', '2020-01-16 01:48:31'),
(48, 1, 6, '6', 'view/resources/images/documentos/1583383925_LogosinF.png', 'view/resources/images/documentos/1583337304_cotizacion.pdf', 'view/resources/images/documentos/1583339853_Hoja Membretada.pdf', 'view/resources/images/documentos/1583383894_foto_2.jpg', 'view/resources/images/documentos/1583383886_comuni.png', 'view/resources/images/documentos/doc.png', '2020-03-04 16:54:46'),
(51, 1, 6, '4', 'view/resources/images/documentos/1584043804_bicycle-1869176_1280.jpg', 'view/resources/images/documentos/1583542808_Minuta Diciembre.pdf', 'view/resources/images/documentos/1584043813_cotizacion.pdf', 'view/resources/images/documentos/1583553157_Hoja Membretada (1).pdf', 'view/resources/images/documentos/1583553169_1.png', 'view/resources/images/documentos/1583553194_Tarjetas-personales.pdf', '2020-03-05 05:53:31');

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
(1, '543434', 'view/resources/images/1573849686_logoCar.png', 'Escuderia', 'AGO', 'admin', 'eago@gmail.com', '76e086b0c582427ea275bbdbde6a5e3852e516e7', 'AV SAN ANDRES', 'colchester', '9544534', '5533445340', '1', 1, 0, '2019-11-14 03:00:00');

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
(13, 1, 1),
(14, 1, 2),
(15, 1, 3),
(16, 1, 4),
(17, 1, 5),
(18, 1, 6),
(19, 1, 7),
(20, 1, 8),
(21, 1, 9),
(22, 1, 10),
(23, 1, 11),
(24, 1, 12),
(25, 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cuit` varchar(30) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `cuit`, `estado`, `fecha_carga`) VALUES
(1, 'Itzel', '54', 1, '2020-01-30 18:32:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estetica`
--

CREATE TABLE `estetica` (
  `id` int(11) NOT NULL,
  `fecha_rep` date NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `datos` varchar(100) CHARACTER SET latin1 NOT NULL,
  `idtrasladista` int(11) NOT NULL,
  `gasolina` float NOT NULL,
  `otros` varchar(40) NOT NULL,
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
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estetica`
--

INSERT INTO `estetica` (`id`, `fecha_rep`, `idcliente`, `idvehiculo`, `datos`, `idtrasladista`, `gasolina`, `otros`, `vendedor`, `fecha_carga`, `reparacion`, `trasladistas_admin`, `gasolina_admin`, `otros_admin`, `asesor`, `vendedor_admin`, `subtotal_admin`, `eago_admin`, `total_admin`, `estado`, `idtaller`, `origen`, `foto1`, `foto2`, `foto3`, `foto4`, `status`) VALUES
(10, '2020-10-20', 1, 6, 'estetica', 1, 0, '46', 'pepe', '2020-03-11 00:32:28', '', '', '', '', '', '', '', '', '', 0, 1, 'CDMX', 'view/resources/images/gastos/1584032673_ayuda.jpg', 'view/resources/images/gastos/1584032676_5dccf3a66f463.png', 'view/resources/images/gastos/1583898007_pngocean.com.png', 'view/resources/images/gastos/1583887524_3.jpg', 0),
(11, '2020-05-20', 2, 6, 'asientos', 1, 0, 'ou', 'pepe', '2020-03-11 01:18:03', '', '', '', '', '', '', '', '', '', 0, 1, 'CDMX', 'view/resources/images/gastos/1584035195_LogosinF.png', 'view/resources/images/gastos/1584034912_producto4.1.jpeg', 'view/resources/images/gastos/1584035199_servicio.jpg', '', 0),
(12, '2020-02-29', 2, 3, 'wet', 19, 0, '03', 'pepe', '2020-03-12 18:04:02', '', '', '', '', '', '', '', '', '', 0, 1, 'CDMX', 'view/resources/images/gastos/1584035600_equipo.jpg', 'view/resources/images/gastos/1584035603_person-731492_1280.jpg', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestoria`
--

CREATE TABLE `gestoria` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `datos` varchar(30) CHARACTER SET latin1 NOT NULL,
  `fecha_ges` date NOT NULL,
  `aplaca` date NOT NULL,
  `bplaca` date NOT NULL,
  `rplaca` date NOT NULL,
  `tarjeta` date NOT NULL,
  `otro` varchar(50) CHARACTER SET latin1 NOT NULL,
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
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gestoria`
--

INSERT INTO `gestoria` (`id`, `idcliente`, `idvehiculo`, `datos`, `fecha_ges`, `aplaca`, `bplaca`, `rplaca`, `tarjeta`, `otro`, `idtrasladista`, `gasolina`, `gestion`, `idcarro`, `gastos`, `mensajeria`, `mesa`, `vendedor`, `general`, `trasladista_admin`, `subtotal_admin`, `eago_admin`, `total_admin`, `estado`, `fecha_carga`, `idtaller`, `origen`, `foto1`, `foto2`, `foto3`, `foto4`, `status`) VALUES
(1, 2, 3, 'asientos', '2020-02-06', '2020-02-06', '2020-09-05', '2020-04-25', '2020-08-05', 'jfje', 19, 0, '', 0, 30, '20', '', '', '50', 30, 130, 60, 190, 2, '2020-01-31 21:00:23', 1, 'Av Instituto PolitÃ©cnico Nacional 5160, Magdalena de las Salinas, Gustavo A. Madero, 07760 Ciudad de MÃ©xico, CDMX', '', '', '', '', 0);

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
  `idcliente` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `idtaller` int(11) NOT NULL,
  `datos` varchar(30) NOT NULL,
  `idtrasladista` int(11) NOT NULL,
  `gasolina` float NOT NULL,
  `otros` varchar(50) NOT NULL,
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
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id`, `fecha_man`, `idcliente`, `idvehiculo`, `idtaller`, `datos`, `idtrasladista`, `gasolina`, `otros`, `vendedor`, `trasladista_admin`, `otro_admin`, `fecha_carga`, `subtotal`, `eago`, `total`, `estado`, `origen`, `foto1`, `foto2`, `foto3`, `foto4`, `status`) VALUES
(6, '2020-01-30', 1, 3, 1, 'asientos', 19, 52, '25', 'pedro', 30, 30, '2020-01-30 22:36:42', 300, 20, 320, 2, 'Norte 45 853-b, Industrial Vallejo, Azcapotzalco, 02300 Ciudad de MÃ©xico, CDMX', '', '', '', '', 0),
(7, '2020-02-26', 2, 3, 1, 'asientos', 1, 20, '43', 'miguel', 50, 30, '2020-01-31 21:03:26', 100, 60, 160, 2, 'Av Fortuna 101, Magdalena de las Salinas, Gustavo A. Madero, 07760 Ciudad de MÃ©xico, CDMX', '', '', '', '', 0);

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
(13, 'Comprobacion Gastos');

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
(1, 'Escuderia', 'Federativa', 'Puerto ensenada nÃºmero 24', 'Ciudad de MÃ©xico', '(553) 990-7266', '(553) 990-7266', 1, '2020-01-31 20:11:22');

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
  `telefono` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trasladista`
--

INSERT INTO `trasladista` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `status`, `created_at`) VALUES
(1, 'Escuderia', 'AGO', 'eago@gmail.com', '9544534', 1, '2019-11-14 03:00:00'),
(19, 'Veronica', 'Espinosa', 'veronica@gmail.com', '(553) 990-7266', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traslados`
--

CREATE TABLE `traslados` (
  `id` int(11) NOT NULL,
  `fecha_tras` date NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `datos` varchar(30) CHARACTER SET latin1 NOT NULL,
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
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `traslados`
--

INSERT INTO `traslados` (`id`, `fecha_tras`, `idcliente`, `idvehiculo`, `datos`, `gasolina`, `casetas`, `idtrasladista`, `vendedor`, `origen`, `destino`, `autobus`, `gasolina_admin`, `casetas_admin`, `trasladistas_admin`, `vendedor_admin`, `subtotal_admin`, `eago_admin`, `total_admin`, `estado`, `fecha_carga`, `idtaller`, `foto1`, `foto2`, `foto3`, `foto4`, `status`) VALUES
(1, '2020-02-06', 2, 3, 'asientos', 0, 0, 1, 'pablo', 'Av Instituto PolitÃ©cnico Nacional 5120, Maximino Avila Camacho, Gustavo A. Madero, 07380 Ciudad de MÃ©xico, CDMX', 'Faja de Oro 165, Petrolera, Azcapotzalco, 02480 Ciudad de MÃ©xico, CDMX', '', 0, 0, '', '', 0, 0, 0, 0, '2020-01-31 20:47:33', 1, '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `vehiculo_code` varchar(100) NOT NULL,
  `patente` varchar(40) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `nro_chasis` varchar(30) NOT NULL,
  `nro_motor` varchar(30) NOT NULL,
  `vto_vtv` date NOT NULL,
  `idseguro` int(11) NOT NULL,
  `color` varchar(30) NOT NULL,
  `foto4` varchar(255) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `idcliente`, `vehiculo_code`, `patente`, `marca`, `modelo`, `nro_chasis`, `nro_motor`, `vto_vtv`, `idseguro`, `color`, `foto4`, `estado`, `foto1`, `foto2`, `foto3`, `fecha_carga`) VALUES
(3, 1, '1', 'LO-300', 'ferrari', '2019', 'fjgh', '245', '2025-12-12', 1, 'blanco', 'view/resources/images/vehiculos/1579135611_4.jpg', 1, 'view/resources/images/vehiculos/1579135606_2.jpg', 'view/resources/images/vehiculos/1579135614_5dccf3a66f463.png', 'view/resources/images/vehiculos/1579135608_3.jpg', '2020-01-16 01:46:23'),
(5, 2, '2', 'LO-652', 'benz', 'dgfh', '25', '245', '2020-06-30', 1, 'blanco', 'view/resources/images/vehiculos/vehiculo.jpg', 1, 'view/resources/images/vehiculos/1580498025_3.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', '2020-01-31 20:13:06'),
(6, 2, '3', 'KM-120', 'mazda', '2019', 'fjgh', '00099', '2020-02-06', 1, 'blanco', 'view/resources/images/vehiculos/1582855782_equipo.jpg', 1, 'view/resources/images/vehiculos/1582855774_ayuda.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', 'view/resources/images/vehiculos/vehiculo.jpg', '2020-02-28 03:08:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verificacion`
--

CREATE TABLE `verificacion` (
  `id` int(11) NOT NULL,
  `fecha_veri` date NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `idtaller` int(11) NOT NULL,
  `datos` varchar(30) CHARACTER SET latin1 NOT NULL,
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
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `verificacion`
--

INSERT INTO `verificacion` (`id`, `fecha_veri`, `idcliente`, `idvehiculo`, `idtaller`, `datos`, `fecha_carga`, `derechos`, `otros`, `idtrasladista`, `vendedor`, `derechos_admin`, `otros_admin`, `trasladistas_admin`, `vendedor_admin`, `subtotal_admin`, `eago_admin`, `total_admin`, `estado`, `origen`, `foto1`, `foto2`, `foto3`, `foto4`, `status`) VALUES
(1, '2020-02-05', 1, 3, 1, 'asientos', '2020-01-31 19:39:45', 'twe', '10', 1, 'pepe', 'asd', '20', '20', '30', 70, 10, 80, 2, 'Av. 100 Metros, Av Fortuna Esq, Magdalena de las Salinas, Gustavo A. Madero, 07760 Ciudad de MÃ©xico, CDMX', '', '', '', '', 0),
(2, '2020-05-30', 1, 6, 1, 'oikl', '2020-03-03 04:46:08', 'twe', '43', 1, 'carlos', '', '', '', '', 0, 0, 0, 0, 'CDMX', '', '', '', '', 0);

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `empleado_permisos`
--
ALTER TABLE `empleado_permisos`
  MODIFY `idempleado_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estetica`
--
ALTER TABLE `estetica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `traslados`
--
ALTER TABLE `traslados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `verificacion`
--
ALTER TABLE `verificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
