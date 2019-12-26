-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2019 a las 05:37:19
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

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
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `extracto` varchar(250) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `texto` text DEFAULT NULL,
  `thumb` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `titulo`, `extracto`, `fecha`, `texto`, `thumb`) VALUES
(1, 'Titulo PRIMER post', 'ï¿½Quï¿½ es Lorem Ipsum?Lorem Ipsum es simplemente...', '2019-12-19 12:44:40', 'ï¿½Quï¿½ es Lorem Ipsum?\r\nLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estï¿½ndar de las industrias desde el aï¿½o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usï¿½ una galerï¿½a de textos y los mezclï¿½ de tal manera que logrï¿½ hacer un libro de textos especimen', '2.png'),
(2, 'Titulo segundo post', '¿Qué es Lorem Ipsum?\r\nLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de ', '2019-12-19 12:44:19', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen', '3.PNG');

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

--
-- Volcado de datos para la tabla `choque`
--

INSERT INTO `choque` (`id`, `choque_code`, `idcliente`, `fecha_choque`, `idvehiculo`, `idempleado`, `descripcion`, `nombre_ter`, `dni_ter`, `registro_ter`, `patente_ter`, `marca_modelo_ter`, `poliza_ter`, `telefono_ter`, `celular_ter`, `fecha_carga`, `foto1`, `foto2`, `foto3`, `foto4`) VALUES
(1, '1', 2, '2019-11-06', 1, 2, 'faros no funcionan', 'rayan', '432334', '2018-07-08', '243', 'hyundai', '0054', '5678', '243', '2019-11-15 03:48:22', 'view/resources/images/1573855470_choque.jpg', 'view/resources/images/1573855482_carro-chocado.png', 'view/resources/images/1573855487_arreglado2.jpg', 'view/resources/images/1573855505_carro1.jpg');

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
(1, 'Dayanna', 'Espinosa Verplancken', '5538807266', 'dayanna@gmail.com', 22, 'KM-120', '2019-12-09', 'lindavista', 'Casas Aleman', 7590, 7580, 60, 'estudiante', 'trabajo', 1),
(2, 'Itzel', 'verplancken', '5560984629', 'itzel@gmail.com', 25, 'JWE-390', '2019-12-10', 'zaragoza', '', 7540, 0, 80, 'trabajo', 'estudiante', 1),
(5, 'karla', 'Espinosa', '(553) 990-5333', 'karla@gmail.com', 20, 'LM-08', '2019-12-12', 'srf', '', 7580, 0, 43, 'erf', 'sre', 1);

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
(1, 'EAGO', '890', '5000', 'eago@gmail.com', '5538792380', 'view/resources/images/1573851138_logoCar.png');

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
(27, 1, 1, '3', 'view/resources/images/1576900847_bicycle-1869176_1280.jpg', 'view/resources/images/1576900759_5dccf4af52288.png', 'view/resources/images/1576900753_foto_3.jpg', 'view/resources/images/1576900764_5dccf3a66f463.png', 'view/resources/images/1576900781_person-731492_1280.jpg', 'view/resources/images/1576900777_2.jpg', '2019-12-21 04:58:58'),
(36, 1, 28, '7', 'view/resources/images/1576902349_bicycle-1869176_1280.jpg', 'view/resources/images/1576902315_5dccf3a66f463.png', 'view/resources/images/vehiculo.jpg', 'view/resources/images/vehiculo.jpg', 'view/resources/images/vehiculo.jpg', 'view/resources/images/vehiculo.jpg', '2019-12-21 05:25:08'),
(38, 1576902953, 1576902953, '1576902953-1', 'view/resources/images/1576902958_3.jpg', 'view/resources/images/vehiculo.jpg', 'view/resources/images/vehiculo.jpg', 'view/resources/images/vehiculo.jpg', 'view/resources/images/vehiculo.jpg', 'view/resources/images/vehiculo.jpg', '2019-12-21 05:35:53');

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
(1, '543434', 'view/resources/images/1573849686_logoCar.png', 'Escuderia', 'AGO', 'admin', 'eago@gmail.com', '95ff079df7e19594fbaf65ecddb6f611c8ebdc25', 'AV SAN ANDRES', 'colchester', '9544534', '5533445340', '1', 1, 0, '2019-11-14 03:00:00'),
(2, '456576', 'view/resources/images/default.png', 'Richard', 'Stallman', 'Empleado', 'empleado@gmail.com', 'e27648bb570a44840960a403eafbeae8c4fdb172', 'av san juan', 'silcon valley', '323445', '552344565', '3', 1, 0, '2019-11-15 03:44:17');

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
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(22, 2, 1),
(23, 2, 3),
(24, 2, 4),
(25, 2, 5),
(26, 2, 6),
(27, 2, 7),
(28, 2, 8),
(29, 2, 9),
(30, 2, 10),
(339, 2, 1),
(340, 2, 3),
(341, 2, 4),
(342, 2, 5),
(343, 2, 6),
(344, 2, 7),
(345, 2, 8),
(346, 2, 9),
(347, 2, 10),
(436, 1, 1),
(437, 1, 2),
(438, 1, 3),
(439, 1, 4),
(440, 1, 5),
(441, 1, 6),
(442, 1, 7),
(443, 1, 8),
(444, 1, 9),
(445, 1, 10),
(446, 1, 11);

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
(1, 'ibm 2', '133', 1, '2019-11-14 03:45:58');

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
  `trasladistas` varchar(40) NOT NULL,
  `gasolina` float NOT NULL,
  `otros` varchar(40) NOT NULL,
  `vendedor` varchar(40) NOT NULL,
  `subtotal` float NOT NULL,
  `eago` float NOT NULL,
  `total` float NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `reparacion` varchar(50) NOT NULL,
  `trasladistas_admin` varchar(50) NOT NULL,
  `gasolina_admin` float NOT NULL,
  `otros_admin` varchar(50) NOT NULL,
  `asesor` varchar(50) NOT NULL,
  `vendedor_admin` varchar(50) NOT NULL,
  `subtotal_admin` float NOT NULL,
  `eago_admin` float NOT NULL,
  `total_admin` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estetica`
--

INSERT INTO `estetica` (`id`, `fecha_rep`, `idcliente`, `idvehiculo`, `datos`, `trasladistas`, `gasolina`, `otros`, `vendedor`, `subtotal`, `eago`, `total`, `fecha_carga`, `reparacion`, `trasladistas_admin`, `gasolina_admin`, `otros_admin`, `asesor`, `vendedor_admin`, `subtotal_admin`, `eago_admin`, `total_admin`) VALUES
(1, '2019-12-12', 1, 1, 'cambio de llantas y cambio de aceite', 'Jose', 50, '30', 'pepe', 80, 80, 160, '2019-12-16 13:45:42', '', '', 0, '', '', '', 0, 0, 0),
(2, '2019-12-17', 2, 28, 'arreglo de faros', 'jorge', 90, '20', 'pablo', 110, 50, 160, '2019-12-16 21:39:59', '', '', 0, '', '', '', 0, 0, 0);

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
  `trasladistas` varchar(50) NOT NULL,
  `gasolina` float NOT NULL,
  `subtotal` float NOT NULL,
  `eago` float NOT NULL,
  `total` float NOT NULL,
  `gestion` varchar(50) NOT NULL,
  `idcarro` int(11) NOT NULL,
  `gastos` float NOT NULL,
  `mensajeria` varchar(50) NOT NULL,
  `mesa` varchar(50) NOT NULL,
  `vendedor` varchar(50) NOT NULL,
  `general` varchar(50) NOT NULL,
  `subtotal_admin` float NOT NULL,
  `eago_admin` float NOT NULL,
  `total_admin` float NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gestoria`
--

INSERT INTO `gestoria` (`id`, `idcliente`, `idvehiculo`, `datos`, `fecha_ges`, `aplaca`, `bplaca`, `rplaca`, `tarjeta`, `otro`, `trasladistas`, `gasolina`, `subtotal`, `eago`, `total`, `gestion`, `idcarro`, `gastos`, `mensajeria`, `mesa`, `vendedor`, `general`, `subtotal_admin`, `eago_admin`, `total_admin`, `fecha_carga`) VALUES
(1, 1, 28, 'hdkasj', '2019-12-11', '2019-11-05', '2019-11-25', '2019-12-04', '2019-12-07', '80', 'Carlos', 10, 80, 20, 100, 'uhfe', 1, 20, 'ijio', '', 'hui', 'huih', 30, 40, 80, '2019-12-16 06:31:38'),
(3, 5, 1, 'gestoria', '2019-12-13', '2019-08-04', '2019-07-08', '2019-03-08', '2019-04-08', '40', 'jose', 90, 130, 70, 200, 'hfsj', 5, 20, 'hkjsd', '', 'fjsd', 'sfudh', 50, 60, 80, '2019-12-03 10:16:08'),
(7, 2, 28, 'kmfklsd', '2019-04-09', '2019-05-31', '2019-05-04', '2019-12-31', '2019-05-04', '345', 'sfg', 546, 12, 123, 4534, 'gdh', 2, 5, 'dfg', '', 'sd', 'sdg', 90, 50, 40, '2019-12-19 04:46:02');

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
  `datos` varchar(30) NOT NULL,
  `trasladistas` varchar(50) NOT NULL,
  `gasolina` float NOT NULL,
  `otros` varchar(50) NOT NULL,
  `vendedor` varchar(50) NOT NULL,
  `subtotal` float NOT NULL,
  `eago` float NOT NULL,
  `total` float NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id`, `fecha_man`, `idcliente`, `idvehiculo`, `datos`, `trasladistas`, `gasolina`, `otros`, `vendedor`, `subtotal`, `eago`, `total`, `fecha_carga`) VALUES
(1, '2019-12-12', 1, 1, 'motor, parabrisas', 'jose', 30, '20', 'carlos', 50, 20, 70, '2019-12-16 15:24:14'),
(2, '2019-12-16', 2, 28, 'asientos', 'jorge', 15, '10', 'carlos', 25, 60, 85, '2019-12-16 23:24:12');

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
(3, 'Taller'),
(4, 'Seguro'),
(5, 'Empresa'),
(6, 'Sector'),
(7, 'Vehiculo'),
(8, 'Tarjeta'),
(9, 'Reparaciones'),
(10, 'Choque'),
(11, 'Configuracion'),
(12, 'blog');

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

--
-- Volcado de datos para la tabla `reparaciones`
--

INSERT INTO `reparaciones` (`id`, `fecha_repa`, `idcliente`, `descripcion`, `idvehiculo`, `idtaller`, `fecha_carga`) VALUES
(1, '2019-09-15', 5, 'faros fallando', 1, 1, '2019-09-05 03:48:18'),
(2, '2019-12-01', 2, 'mantenimiento en los frenos', 1, 1, '2019-12-14 20:58:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id`, `nombre`, `idempresa`, `fecha_carga`) VALUES
(1, 'informatica', 1, '2019-11-15 03:46:32');

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
(1, 'informatica', '12', '2018-06-27', '2019-11-14 03:45:37');

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
(1, 'electronica', '22', 'av san andres', 'sillcon valley', '324354', '943546534', 1, '2019-11-14 03:45:04'),
(2, 'Escuderia', 'sf', 'montevideo', 'lindavista', '55779204', '5533445340', 2, '2019-12-20 00:27:17');

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

--
-- Volcado de datos para la tabla `tarjeta`
--

INSERT INTO `tarjeta` (`id`, `numero`, `vencimiento`, `idvehiculo`, `fecha_carga`) VALUES
(1, 'vcx346', '2020-07-10', 1, '2019-11-15 03:47:49');

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
  `trasladistas` text NOT NULL,
  `vendedor` text NOT NULL,
  `subtotal` float NOT NULL,
  `total` float NOT NULL,
  `autobus` varchar(50) NOT NULL,
  `gasolina_admin` float NOT NULL,
  `casetas_admin` float NOT NULL,
  `trasladistas_admin` varchar(50) NOT NULL,
  `vendedor_admin` varchar(50) NOT NULL,
  `subtotal_admin` float NOT NULL,
  `eago_admin` float NOT NULL,
  `total_admin` float NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `traslados`
--

INSERT INTO `traslados` (`id`, `fecha_tras`, `idcliente`, `idvehiculo`, `datos`, `gasolina`, `casetas`, `trasladistas`, `vendedor`, `subtotal`, `total`, `autobus`, `gasolina_admin`, `casetas_admin`, `trasladistas_admin`, `vendedor_admin`, `subtotal_admin`, `eago_admin`, `total_admin`, `fecha_carga`) VALUES
(1, '2019-12-06', 1, 1, 'jaja', 500, 208, 'Josue Adrian', 'Charls Verplancken', 708, 908, '498', 12, 50, 'Brandon', 'sdf', 80, 30, 1500, '2019-12-14 15:26:21'),
(2, '2019-12-24', 1, 1, 'pko', 90, 234, 'Joel', 'Diana', 312, 4342, '', 0, 0, '', '', 0, 0, 0, '2019-12-14 22:30:52');

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
(1, 1, '1', 'KM-120', 'hyundai', '21332', 'xcdds23', 'xvcvrerx3', '2019-10-10', 1, 'blanco', 'view/resources/images/1576820475_person-731492_1280.jpg', 1, 'view/resources/images/1576820460_snow-3066167_1280.jpg', 'view/resources/images/1576820469_foto_3.jpg', 'view/resources/images/1576820464_sign-741813_1280.jpg', '2019-11-25 03:46:37'),
(28, 2, '2', 'LO-300', 'audi', '2016', 'pñl', '0932', '2019-03-17', 1, 'negro', 'view/resources/images/1576820433_bicycle-1869176_1280.jpg', 2, 'view/resources/images/1576820439_LogosinF.png', 'view/resources/images/1576820430_foto_1.jpg', 'view/resources/images/1576820445_sign-741813_1280.jpg', '2019-12-17 07:05:38'),
(51, 5, '6', 'dfg', 'jjkdgf', 'jfd', 'sdg', 'sdfg', '2019-08-14', 1, 'todos', 'view/resources/images/1576820401_3.jpg', 1, 'view/resources/images/1576820319_2.jpg', 'view/resources/images/1576820394_5dccf4af52288.png', 'view/resources/images/1576820390_4.jpg', '2019-12-20 05:58:40'),
(54, 5, '4', 'gfhj', 'fg', 'dgfh', 'dfg', 'dg', '2019-03-14', 1, 'negro', 'view/resources/images/vehiculo.jpg', 1, 'view/resources/images/1576890436_5dccf4af52288.png', 'view/resources/images/vehiculo.jpg', 'view/resources/images/vehiculo.jpg', '2019-12-21 02:06:21'),
(60, 5, '5', '976', 'audi', '2016', 'kl.s', '00099', '2019-09-12', 1, 'azul', 'view/resources/images/1576891852_5dccf3a66f463.png', 1, 'view/resources/images/1576891860_4.jpg', 'view/resources/images/1576891856_foto_2.jpg', 'view/resources/images/1576891864_bicycle-1869176_1280.jpg', '2019-12-21 02:30:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verificacion`
--

CREATE TABLE `verificacion` (
  `id` int(11) NOT NULL,
  `fecha_veri` date NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `datos` varchar(30) CHARACTER SET latin1 NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `derechos` varchar(50) NOT NULL,
  `otros` varchar(50) NOT NULL,
  `trasladistas` varchar(40) NOT NULL,
  `vendedor` varchar(40) NOT NULL,
  `idcarro` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `eago` double NOT NULL,
  `total` double NOT NULL,
  `derechos_admin` varchar(30) NOT NULL,
  `otros_admin` varchar(30) NOT NULL,
  `trasladistas_admin` varchar(30) NOT NULL,
  `vendedor_admin` varchar(30) NOT NULL,
  `subtotal_admin` float NOT NULL,
  `eago_admin` float NOT NULL,
  `total_admin` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `verificacion`
--

INSERT INTO `verificacion` (`id`, `fecha_veri`, `idcliente`, `idvehiculo`, `datos`, `fecha_carga`, `derechos`, `otros`, `trasladistas`, `vendedor`, `idcarro`, `subtotal`, `eago`, `total`, `derechos_admin`, `otros_admin`, `trasladistas_admin`, `vendedor_admin`, `subtotal_admin`, `eago_admin`, `total_admin`) VALUES
(1, '2019-12-03', 1, 1, 'jdf', '2019-12-12 05:12:12', 'jkds', 'opad', 'Jose ', 'Carlos', 1, 200, 500, 700, 'rer', '34', 'gfhd', 'dfg', 345, 3453, 24565),
(2, '2019-11-13', 2, 1, 'kñ', '2019-12-14 22:06:17', 'mlk', 'pl', 'Daniel', 'Gerardo', 2, 1000, 300, 1300, '', '', '', '', 0, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
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
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguro`
--
ALTER TABLE `seguro`
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
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `choque`
--
ALTER TABLE `choque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleado_permisos`
--
ALTER TABLE `empleado_permisos`
  MODIFY `idempleado_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=447;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estetica`
--
ALTER TABLE `estetica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `gestoria`
--
ALTER TABLE `gestoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `kind`
--
ALTER TABLE `kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `seguro`
--
ALTER TABLE `seguro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `traslados`
--
ALTER TABLE `traslados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `verificacion`
--
ALTER TABLE `verificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado_permisos`
--
ALTER TABLE `empleado_permisos`
  ADD CONSTRAINT `empleado_permisos_ibfk_1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`id`),
  ADD CONSTRAINT `empleado_permisos_ibfk_2` FOREIGN KEY (`idpermiso`) REFERENCES `permisos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;