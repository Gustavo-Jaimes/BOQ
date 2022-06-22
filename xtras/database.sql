-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2021 a las 17:27:50
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `meetbikes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(10) NOT NULL,
  `orden` int(2) NOT NULL DEFAULT 0,
  `titulo` varchar(300) DEFAULT NULL,
  `txt` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `video` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `orden`, `titulo`, `txt`, `fecha`, `video`) VALUES
(6, 0, 'Hola mundo', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2020-02-21', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogpic`
--

CREATE TABLE `blogpic` (
  `id` int(10) NOT NULL,
  `item` int(10) NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `blogpic`
--

INSERT INTO `blogpic` (`id`, `item`, `titulo`, `url`, `orden`) VALUES
(8, 6, NULL, NULL, 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `id` int(10) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` int(2) DEFAULT NULL,
  `txt` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `folder` int(1) NOT NULL DEFAULT 1,
  `txt1` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `calendario`
--

INSERT INTO `calendario` (`id`, `fecha`, `hora`, `txt`, `folder`, `txt1`) VALUES
(16, '2020-01-21', NULL, 'hi', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendariopic`
--

CREATE TABLE `calendariopic` (
  `id` int(10) NOT NULL,
  `producto` int(10) NOT NULL,
  `titulo` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `title` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `txt` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `orden` int(2) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carousel`
--

CREATE TABLE `carousel` (
  `id` int(10) NOT NULL,
  `orden` int(2) DEFAULT NULL,
  `titulo` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `txt` text COLLATE latin1_general_ci DEFAULT NULL,
  `url` text COLLATE latin1_general_ci DEFAULT NULL,
  `video` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `carousel`
--

INSERT INTO `carousel` (`id`, `orden`, `titulo`, `txt`, `url`, `video`, `imagen`) VALUES
(22, 99, NULL, NULL, NULL, NULL, '667279896.png'),
(26, 99, NULL, NULL, NULL, NULL, '814475401.png'),
(28, 99, NULL, NULL, NULL, NULL, '894418935.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carousel2`
--

CREATE TABLE `carousel2` (
  `id` int(10) NOT NULL,
  `orden` int(2) DEFAULT NULL,
  `titulo` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `txt` text COLLATE latin1_general_ci DEFAULT NULL,
  `url` text COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(2) NOT NULL,
  `title` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `description` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `prodspag` int(5) DEFAULT NULL,
  `sliderhmin` int(5) DEFAULT 0,
  `sliderhmax` int(5) DEFAULT 1000,
  `sliderproporcion` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `slideranim` int(1) DEFAULT NULL,
  `slidertextos` int(1) DEFAULT NULL,
  `paypalemail` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `destinatario1` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `destinatario2` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `remitente` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `remitentepass` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `remitentehost` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `remitenteport` varchar(5) COLLATE latin1_spanish_ci DEFAULT NULL,
  `remitenteseguridad` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono1` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `facebook` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `instagram` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `youtube` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `envio` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `envioglobal` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `iva` int(2) DEFAULT NULL,
  `incremento` int(2) DEFAULT NULL,
  `bank` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `tyct1` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tyct2` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tyct3` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tyct4` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tyc1` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `tyc2` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `tyc3` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `tyc4` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `pdf1` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `imagen1` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `imagen2` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `imagen3` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `about1` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `about2` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `about3` text COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `title`, `description`, `prodspag`, `sliderhmin`, `sliderhmax`, `sliderproporcion`, `slideranim`, `slidertextos`, `paypalemail`, `destinatario1`, `destinatario2`, `remitente`, `remitentepass`, `remitentehost`, `remitenteport`, `remitenteseguridad`, `telefono`, `telefono1`, `facebook`, `instagram`, `youtube`, `envio`, `envioglobal`, `iva`, `incremento`, `bank`, `tyct1`, `tyct2`, `tyct3`, `tyct4`, `tyc1`, `tyc2`, `tyc3`, `tyc4`, `pdf1`, `imagen1`, `imagen2`, `imagen3`, `about1`, `about2`, `about3`) VALUES
(1, 'SDK', 'Software de desarrollo Wozial', 4, 100, 2000, '3:1', 2, 0, 'business@wozial.com', 'oscar@wozial.com', NULL, 'contacto@eshot.mx', 'LeGuaGua@ElPerrito', 'mail.eshot.mx', '465', 'SSL', '3323381792', '3323381792', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://pinterest.com.mx/', '0', '0', 16, 0, 'Bancomer', 'Aviso de privacidad', 'Métodos de pago', 'Devoluciones y envío', 'Términos y condiciones', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id nulla ac libero viverra laoreet. Duis varius scelerisque nunc at feugiat. Sed viverra est non fringilla pellentesque. Sed dictum suscipit tristique. In ultricies neque vel aliquam pharetra. Aliquam magna dolor, accumsan a mi id, commodo consequat purus. Nullam lobortis erat a tempor blandit.</p>\r\n<p>Quisque semper turpis in erat cursus, id auctor nisi sollicitudin. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer at blandit lectus. Pellentesque aliquet velit sem, vitae mollis eros tempor vel. Duis id orci in nulla viverra dignissim at a sem. Mauris iaculis nisl nec enim rhoncus iaculis. Curabitur dapibus fringilla quam, sed blandit ipsum accumsan nec. Donec ac elit lobortis purus sagittis convallis quis et est. Praesent vitae sagittis felis, ac sagittis tortor. Cras tortor lectus, molestie consequat ipsum id, efficitur ullamcorper felis. Sed sapien ipsum, rutrum a odio id, gravida ultrices neque. Nullam finibus mi vel ante dignissim auctor.</p>\r\n<p>In nec diam in ipsum dictum auctor quis sit amet sapien. Mauris augue enim, volutpat a malesuada id, hendrerit vitae neque. Aliquam erat volutpat. Etiam ut finibus neque. Nulla et finibus felis. Etiam vestibulum orci id nisl iaculis sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fermentum rutrum mi non faucibus. Nulla molestie urna eu orci malesuada dictum. Integer eros dui, tempor ac ipsum a, consectetur facilisis sem. Proin placerat porttitor velit sed mattis. Suspendisse ut erat orci. In hac habitasse platea dictumst.</p>\r\n<p>Aenean cursus maximus odio, vel pharetra leo condimentum vel. In nec molestie massa. Suspendisse a tellus ultrices massa laoreet facilisis ac ultricies neque. Curabitur fringilla nunc sed interdum fermentum. Etiam egestas maximus arcu nec dictum. Integer ornare ligula ipsum, sit amet consequat justo euismod porta. Suspendisse a quam lorem. Donec ac ornare tortor. Suspendisse leo tortor, fringilla ut imperdiet ac, pulvinar nec eros. Etiam dignissim mauris sapien, vitae pulvinar nibh placerat dignissim. Pellentesque vitae vulputate nisl. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam elementum tempor lorem, blandit aliquam ipsum commodo id. Nam dictum iaculis neque, quis tempus tortor luctus sit amet.</p>\r\n<p>Suspendisse porta enim purus, sit amet accumsan ligula molestie quis. Cras rhoncus ultricies odio. Aliquam imperdiet dapibus aliquet. Curabitur et ullamcorper eros. Fusce ut massa sit amet dolor suscipit tincidunt. Phasellus at tincidunt massa. Praesent ac imperdiet est, ac laoreet libero. Ut in turpis velit. Morbi non diam dui.</p>', '<p>Quisque semper turpis in erat cursus, id auctor nisi sollicitudin. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer at blandit lectus. Pellentesque aliquet velit sem, vitae mollis eros tempor vel. Duis id orci in nulla viverra dignissim at a sem. Mauris iaculis nisl nec enim rhoncus iaculis. Curabitur dapibus fringilla quam, sed blandit ipsum accumsan nec. Donec ac elit lobortis purus sagittis convallis quis et est. Praesent vitae sagittis felis, ac sagittis tortor. Cras tortor lectus, molestie consequat ipsum id, efficitur ullamcorper felis. Sed sapien ipsum, rutrum a odio id, gravida ultrices neque. Nullam finibus mi vel ante dignissim auctor.</p>\r\n<p>In nec diam in ipsum dictum auctor quis sit amet sapien. Mauris augue enim, volutpat a malesuada id, hendrerit vitae neque. Aliquam erat volutpat. Etiam ut finibus neque. Nulla et finibus felis. Etiam vestibulum orci id nisl iaculis sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fermentum rutrum mi non faucibus. Nulla molestie urna eu orci malesuada dictum. Integer eros dui, tempor ac ipsum a, consectetur facilisis sem. Proin placerat porttitor velit sed mattis. Suspendisse ut erat orci. In hac habitasse platea dictumst.</p>\r\n<p>Aenean cursus maximus odio, vel pharetra leo condimentum vel. In nec molestie massa. Suspendisse a tellus ultrices massa laoreet facilisis ac ultricies neque. Curabitur fringilla nunc sed interdum fermentum. Etiam egestas maximus arcu nec dictum. Integer ornare ligula ipsum, sit amet consequat justo euismod porta. Suspendisse a quam lorem. Donec ac ornare tortor. Suspendisse leo tortor, fringilla ut imperdiet ac, pulvinar nec eros. Etiam dignissim mauris sapien, vitae pulvinar nibh placerat dignissim. Pellentesque vitae vulputate nisl. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam elementum tempor lorem, blandit aliquam ipsum commodo id. Nam dictum iaculis neque, quis tempus tortor luctus sit amet.</p>', '<p>Quisque semper turpis in erat cursus, id auctor nisi sollicitudin. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer at blandit lectus. Pellentesque aliquet velit sem, vitae mollis eros tempor vel. Duis id orci in nulla viverra dignissim at a sem. Mauris iaculis nisl nec enim rhoncus iaculis. Curabitur dapibus fringilla quam, sed blandit ipsum accumsan nec. Donec ac elit lobortis purus sagittis convallis quis et est. Praesent vitae sagittis felis, ac sagittis tortor. Cras tortor lectus, molestie consequat ipsum id, efficitur ullamcorper felis. Sed sapien ipsum, rutrum a odio id, gravida ultrices neque. Nullam finibus mi vel ante dignissim auctor.</p>\r\n<p>In nec diam in ipsum dictum auctor quis sit amet sapien. Mauris augue enim, volutpat a malesuada id, hendrerit vitae neque. Aliquam erat volutpat. Etiam ut finibus neque. Nulla et finibus felis. Etiam vestibulum orci id nisl iaculis sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fermentum rutrum mi non faucibus. Nulla molestie urna eu orci malesuada dictum. Integer eros dui, tempor ac ipsum a, consectetur facilisis sem. Proin placerat porttitor velit sed mattis. Suspendisse ut erat orci. In hac habitasse platea dictumst.</p>\r\n<p>Aenean cursus maximus odio, vel pharetra leo condimentum vel. In nec molestie massa. Suspendisse a tellus ultrices massa laoreet facilisis ac ultricies neque. Curabitur fringilla nunc sed interdum fermentum. Etiam egestas maximus arcu nec dictum. Integer ornare ligula ipsum, sit amet consequat justo euismod porta. Suspendisse a quam lorem. Donec ac ornare tortor. Suspendisse leo tortor, fringilla ut imperdiet ac, pulvinar nec eros. Etiam dignissim mauris sapien, vitae pulvinar nibh placerat dignissim. Pellentesque vitae vulputate nisl. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam elementum tempor lorem, blandit aliquam ipsum commodo id. Nam dictum iaculis neque, quis tempus tortor luctus sit amet.</p>\r\n<p>Suspendisse porta enim purus, sit amet accumsan ligula molestie quis. Cras rhoncus ultricies odio. Aliquam imperdiet dapibus aliquet. Curabitur et ullamcorper eros. Fusce ut massa sit amet dolor suscipit tincidunt. Phasellus at tincidunt massa. Praesent ac imperdiet est, ac laoreet libero. Ut in turpis velit. Morbi non diam dui.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id nulla ac libero viverra laoreet. Duis varius scelerisque nunc at feugiat. Sed viverra est non fringilla pellentesque. Sed dictum suscipit tristique. In ultricies neque vel aliquam pharetra. Aliquam magna dolor, accumsan a mi id, commodo consequat purus. Nullam lobortis erat a tempor blandit.</p>\r\n<p>In nec diam in ipsum dictum auctor quis sit amet sapien. Mauris augue enim, volutpat a malesuada id, hendrerit vitae neque. Aliquam erat volutpat. Etiam ut finibus neque. Nulla et finibus felis. Etiam vestibulum orci id nisl iaculis sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fermentum rutrum mi non faucibus. Nulla molestie urna eu orci malesuada dictum. Integer eros dui, tempor ac ipsum a, consectetur facilisis sem. Proin placerat porttitor velit sed mattis. Suspendisse ut erat orci. In hac habitasse platea dictumst.</p>\r\n<p>Aenean cursus maximus odio, vel pharetra leo condimentum vel. In nec molestie massa. Suspendisse a tellus ultrices massa laoreet facilisis ac ultricies neque. Curabitur fringilla nunc sed interdum fermentum. Etiam egestas maximus arcu nec dictum. Integer ornare ligula ipsum, sit amet consequat justo euismod porta. Suspendisse a quam lorem. Donec ac ornare tortor. Suspendisse leo tortor, fringilla ut imperdiet ac, pulvinar nec eros. Etiam dignissim mauris sapien, vitae pulvinar nibh placerat dignissim. Pellentesque vitae vulputate nisl. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam elementum tempor lorem, blandit aliquam ipsum commodo id. Nam dictum iaculis neque, quis tempus tortor luctus sit amet.</p>', NULL, NULL, NULL, '808594938.jpg', '<p>Somos una una empresa mexicana de orgullo familiar fundada en 1997 por los hermanos S&aacute;nchez M&aacute;rquez. Con una gran iniciativa, los hermanos S&aacute;nchez, comenzaron con una peque&ntilde;a f&aacute;brica y una tienda ubicada en el coraz&oacute;n de la zona tur&iacute;stica de Tlaquepaque, Jalisco, M&eacute;xico.</p>\r\n<p>La Gama de productos era muy b&aacute;sica pero muy interesante, lo cual les ayudo a tener una muy buena acept&aacute;cion y el reconocimiento de los clientes Nacionales y Extranjeros.</p>\r\n<p>R&aacute;pidamente fueron aumentando su oferta de productos, lo cual los llev&oacute; a abrir m&aacute;s f&aacute;brica de producci&oacute;n y buscar la ampliaci&oacute;n de la que ser&iacute;a la primera tienda CASA PIEL.</p>', '<p>En nuestras tiendas contamos con una extensa variedad de art&iacute;culoes con un surtido en diferentes texturas, colores y modelos.</p>\r\n<p>Actualmente CASA PIEL ofrece m&aacute;s de 1,000 productos diferentes, siendo cada uno de trabajo artesanal y consideramos cada pieza &uacute;nica y especial, ya que las marcas de la piel hacen que cada pieza lleve un estampado, dise&ntilde;o y color irrepetible a&uacute;n cuendo el molde sea el mismo.</p>', '<p>Habremos logrado satisfacer el gusto delicado del mercado nacional y del extranjero, sinti&eacute;ndonos orgullosos de que el producto hecho en M&eacute;xico sea del agrado de pa&iacute;ses como Canad&aacute;, Estados Unidos y algunos pa&iacute;ses de Europa.</p>\r\n<p>Manejando la m&aacute;s alta calidad en cada uno de nuestros productos hechos con pieles seleccionadas especialmente para nuestos clientes.</p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupones`
--

CREATE TABLE `cupones` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `txt` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descuento` int(2) DEFAULT NULL,
  `vigencia` date DEFAULT NULL,
  `alta` date DEFAULT NULL,
  `usos` int(11) NOT NULL DEFAULT 0,
  `estatus` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cupones`
--

INSERT INTO `cupones` (`id`, `codigo`, `txt`, `descuento`, `vigencia`, `alta`, `usos`, `estatus`) VALUES
(2, 'EFRA', 'D&iacute;a del bicho', 10, '2020-10-26', '2020-05-20', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT 99,
  `estatus` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `imagen`, `url`, `orden`, `estatus`) VALUES
(5, NULL, '715810788.png', NULL, 99, 0),
(6, NULL, '586530400.png', NULL, 99, 0),
(7, NULL, '363189181.png', NULL, 99, 0),
(8, NULL, '632311841.png', NULL, 99, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faq`
--

CREATE TABLE `faq` (
  `id` int(5) NOT NULL,
  `orden` int(2) NOT NULL,
  `pregunta` text NOT NULL,
  `respuesta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `producto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias`
--

CREATE TABLE `galerias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(2) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `galerias`
--

INSERT INTO `galerias` (`id`, `titulo`, `orden`) VALUES
(3, 'instalaciones', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeriaspic`
--

CREATE TABLE `galeriaspic` (
  `id` int(11) NOT NULL,
  `producto` int(11) DEFAULT NULL,
  `alt` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(2) NOT NULL DEFAULT 99,
  `imagen` varchar(191) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guias`
--

CREATE TABLE `guias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `orden` int(11) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `guias`
--

INSERT INTO `guias` (`id`, `titulo`, `orden`) VALUES
(1, 'guia bicicletas', 99),
(2, 'guias cascos', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guiaspic`
--

CREATE TABLE `guiaspic` (
  `id` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `alt` varchar(200) DEFAULT NULL,
  `imagen` varchar(200) NOT NULL,
  `orden` int(11) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `guiaspic`
--

INSERT INTO `guiaspic` (`id`, `producto`, `alt`, `imagen`, `orden`) VALUES
(6, 2, NULL, '830.jpg', 99),
(7, 1, NULL, '829.png', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ipn`
--

CREATE TABLE `ipn` (
  `id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(50) DEFAULT NULL,
  `txn_id` varchar(50) DEFAULT NULL,
  `pedido` int(10) DEFAULT NULL,
  `ipn` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) NOT NULL,
  `idmd5` varchar(50) DEFAULT NULL,
  `uid` int(10) NOT NULL DEFAULT 0,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `estatus` int(1) NOT NULL DEFAULT 0,
  `cupon` varchar(30) DEFAULT NULL,
  `invisible` int(1) NOT NULL DEFAULT 0,
  `papelera` int(1) NOT NULL DEFAULT 0,
  `notify` int(1) NOT NULL DEFAULT 0,
  `guia` varchar(20) DEFAULT NULL,
  `linkguia` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `dom` int(11) NOT NULL DEFAULT 0,
  `factura` int(11) DEFAULT 0,
  `tabla` text DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `importe` decimal(10,2) DEFAULT NULL,
  `envio` decimal(15,2) DEFAULT NULL,
  `comprobante` varchar(50) DEFAULT NULL,
  `imagen` varchar(10) DEFAULT NULL,
  `ipn` varchar(50) DEFAULT NULL,
  `calle` varchar(100) DEFAULT NULL,
  `noexterior` varchar(50) DEFAULT NULL,
  `nointerior` varchar(50) DEFAULT NULL,
  `entrecalles` varchar(200) DEFAULT NULL,
  `pais` varchar(20) DEFAULT 'Mexico',
  `estado` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `idmd5`, `uid`, `nombre`, `email`, `estatus`, `cupon`, `invisible`, `papelera`, `notify`, `guia`, `linkguia`, `fecha`, `dom`, `factura`, `tabla`, `cantidad`, `importe`, `envio`, `comprobante`, `imagen`, `ipn`, `calle`, `noexterior`, `nointerior`, `entrecalles`, `pais`, `estado`, `municipio`, `colonia`, `cp`) VALUES
(2, 'c81e728d9d4c2f636f067f89cc14862c', 3, 'oscar', 'oscar@wozial.com', 0, '', 1, 0, 0, NULL, NULL, '2021-06-11 10:30:08', 0, 0, '\n    <table style=\"width: 100%;\" cellspacing=\"2\" border=\"0\" bgcolor=\"grey\">\n      <tr style=\"background-color:#FFF;\">\n        <td style=\"width: 25%; padding:8px;\">Producto</td>\n        <td style=\"width: 9%; padding:8px;\">Talla</td>\n        <td style=\"width: 9%; padding:8px;\">Color</td>\n        <td style=\"width: 14%; padding:8px; text-align: center;\">Cantidad</td>\n        <td style=\"width: 14%; padding:8px; text-align: right; \">Precio lista</td>\n        <td style=\"width: 14%; padding:8px; text-align: right; \">Precio final</td>\n        <td style=\"width: 15%; padding:8px; text-align: right; \">Importe</td>\n      </tr>\n        <tr style=\"background-color:#FFF;\">\n          <td style=\"padding: 8px;\">\n            2 - bici2\n          </td>\n          <td style=\"padding: 8px;\">\n            Chico\n          </td>\n          <td style=\"padding: 8px;\">\n            Grey\n          </td>\n          <td style=\"padding: 8px; text-align: center;\">\n            1\n          </td>\n          <td style=\"padding: 8px; text-align: right;\">\n            60,000.00\n          </td>\n          <td style=\"padding: 8px; text-align: right;\">\n            48,000.00\n          </td>\n          <td style=\"padding: 8px; text-align: right;\">\n            48,000.00\n          </td>\n        </tr>\n      <tr style=\"background-color:#EEE;\">\n        <td style=\"padding: 8px; text-align: left; \" colspan=\"3\">\n          Envío global\n        </td>\n        <td style=\"padding: 8px; text-align: center; \">\n          1\n        </td>\n        <td style=\"padding: 8px; text-align: right; \" colspan=\"2\">\n          50.00\n        </td>\n        <td style=\"padding: 8px; text-align: right; \">\n          50.00\n        </td>\n      </tr>\n      <tr style=\"background-color:#FFF;\">\n        <td style=\"padding: 8px; text-align: left;\" colspan=\"3\">\n          Envío por pieza\n        </td>\n        <td style=\"padding: 8px; text-align: center;\">\n          1\n        </td>\n        <td style=\"padding: 8px; text-align: right;\" colspan=\"2\">\n          100.00\n        </td>\n        <td style=\"padding: 8px; text-align: right;\">\n          100.00\n        </td>\n      </tr>\n        <tr style=\"background-color:#EEE;\">\n          <td colspan=\"6\" style=\"padding: 8px;text-align:right;\">\n            Total\n          </td>\n          <td style=\"padding: 8px;text-align:right;\">\n            48,150.00\n          </td>\n        </tr>\n        \n    </table>', 1, '48150.00', NULL, NULL, NULL, NULL, 'jiji', '45', '', 'jojo', 'México', 'jalisco', 'tlaquepaque', 'juntas', '45590'),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 3, 'oscar', 'oscar@wozial.com', 0, '', 0, 0, 0, NULL, NULL, '2021-06-11 12:27:35', 0, 0, '\n    <table style=\"width: 100%;\" cellspacing=\"2\" border=\"0\" bgcolor=\"grey\">\n      <tr style=\"background-color:#FFF;\">\n        <td style=\"width: 25%; padding:8px;\">Producto</td>\n        <td style=\"width: 9%; padding:8px;\">Talla</td>\n        <td style=\"width: 9%; padding:8px;\">Color</td>\n        <td style=\"width: 14%; padding:8px; text-align: center;\">Cantidad</td>\n        <td style=\"width: 14%; padding:8px; text-align: right; \">Precio lista</td>\n        <td style=\"width: 14%; padding:8px; text-align: right; \">Precio final</td>\n        <td style=\"width: 15%; padding:8px; text-align: right; \">Importe</td>\n      </tr>\n        <tr style=\"background-color:#FFF;\">\n          <td style=\"padding: 8px;\">\n            1 - bici\n          </td>\n          <td style=\"padding: 8px;\">\n            Mediano\n          </td>\n          <td style=\"padding: 8px;\">\n            Negro\n          </td>\n          <td style=\"padding: 8px; text-align: center;\">\n            1\n          </td>\n          <td style=\"padding: 8px; text-align: right;\">\n            9,000.00\n          </td>\n          <td style=\"padding: 8px; text-align: right;\">\n            9,000.00\n          </td>\n          <td style=\"padding: 8px; text-align: right;\">\n            9,000.00\n          </td>\n        </tr>\n        <tr style=\"background-color:#EEE;\">\n          <td style=\"padding: 8px;\">\n            2 - bici2\n          </td>\n          <td style=\"padding: 8px;\">\n            Chico\n          </td>\n          <td style=\"padding: 8px;\">\n            Grey\n          </td>\n          <td style=\"padding: 8px; text-align: center;\">\n            1\n          </td>\n          <td style=\"padding: 8px; text-align: right;\">\n            60,000.00\n          </td>\n          <td style=\"padding: 8px; text-align: right;\">\n            48,000.00\n          </td>\n          <td style=\"padding: 8px; text-align: right;\">\n            48,000.00\n          </td>\n        </tr>\n        <tr style=\"background-color:#FFF;\">\n          <td colspan=\"6\" style=\"padding: 8px;text-align:right;\">\n            Total\n          </td>\n          <td style=\"padding: 8px;text-align:right;\">\n            57,000.00\n          </td>\n        </tr>\n        \n    </table>', 2, '57000.00', NULL, NULL, NULL, NULL, 'jiji', '45', '', 'jojo', 'México', 'jalisco', 'tlaquepaque', 'juntas', '45590'),
(4, 'a87ff679a2f3e71d9181a67b7542122c', 4, 'lizbeth', 'lix@hotmail.com', 0, '', 0, 0, 0, NULL, NULL, '2021-06-11 15:08:25', 0, 0, '\n    <table style=\"width: 100%;\" cellspacing=\"2\" border=\"0\" bgcolor=\"grey\">\n      <tr style=\"background-color:#FFF;\">\n        <td style=\"width: 25%; padding:8px;\">Producto</td>\n        <td style=\"width: 9%; padding:8px;\">Talla</td>\n        <td style=\"width: 9%; padding:8px;\">Color</td>\n        <td style=\"width: 14%; padding:8px; text-align: center;\">Cantidad</td>\n        <td style=\"width: 14%; padding:8px; text-align: right; \">Precio lista</td>\n        <td style=\"width: 14%; padding:8px; text-align: right; \">Precio final</td>\n        <td style=\"width: 15%; padding:8px; text-align: right; \">Importe</td>\n      </tr>\n        <tr style=\"background-color:#FFF;\">\n          <td style=\"padding: 8px;\">\n            2 - bici2\n          </td>\n          <td style=\"padding: 8px;\">\n            Mediano\n          </td>\n          <td style=\"padding: 8px;\">\n            Grey\n          </td>\n          <td style=\"padding: 8px; text-align: center;\">\n            1\n          </td>\n          <td style=\"padding: 8px; text-align: right;\">\n            60,000.00\n          </td>\n          <td style=\"padding: 8px; text-align: right;\">\n            48,000.00\n          </td>\n          <td style=\"padding: 8px; text-align: right;\">\n            48,000.00\n          </td>\n        </tr>\n        <tr style=\"background-color:#EEE;\">\n          <td colspan=\"6\" style=\"padding: 8px;text-align:right;\">\n            Total\n          </td>\n          <td style=\"padding: 8px;text-align:right;\">\n            48,000.00\n          </td>\n        </tr>\n        \n    </table>', 1, '48000.00', NULL, NULL, NULL, NULL, '', '', '', '', 'Mexico', '', '', '', ''),
(5, 'e4da3b7fbbce2345d7772b0674a318d5', 3, 'oscar', 'oscar@wozial.com', 0, '', 0, 0, 0, NULL, NULL, '2021-06-14 13:13:21', 0, 0, '\n    <table style=\"width: 100%;\" cellspacing=\"2\" border=\"0\" bgcolor=\"grey\">\n      <tr style=\"background-color:#FFF;\">\n        <td style=\"width: 25%; padding:8px;\">Producto</td>\n        <td style=\"width: 9%; padding:8px;\">Talla</td>\n        <td style=\"width: 9%; padding:8px;\">Color</td>\n        <td style=\"width: 14%; padding:8px; text-align: center;\">Cantidad</td>\n        <td style=\"width: 14%; padding:8px; text-align: right; \">Precio lista</td>\n        <td style=\"width: 14%; padding:8px; text-align: right; \">Precio final</td>\n        <td style=\"width: 15%; padding:8px; text-align: right; \">Importe</td>\n      </tr>\n        <tr style=\"background-color:#FFF;\">\n          <td style=\"padding: 8px;\">\n            2 - bici2\n          </td>\n          <td style=\"padding: 8px;\">\n            Mediano\n          </td>\n          <td style=\"padding: 8px;\">\n            Negro\n          </td>\n          <td style=\"padding: 8px; text-align: center;\">\n            1\n          </td>\n          <td style=\"padding: 8px; text-align: right;\">\n            60,000.00\n          </td>\n          <td style=\"padding: 8px; text-align: right;\">\n            48,000.00\n          </td>\n          <td style=\"padding: 8px; text-align: right;\">\n            48,000.00\n          </td>\n        </tr>\n        <tr style=\"background-color:#EEE;\">\n          <td colspan=\"6\" style=\"padding: 8px;text-align:right;\">\n            Total\n          </td>\n          <td style=\"padding: 8px;text-align:right;\">\n            48,000.00\n          </td>\n        </tr>\n        \n    </table>', 1, '48000.00', NULL, NULL, NULL, NULL, 'jiji', '45', '', 'jojo', 'México', 'jalisco', 'tlaquepaque', 'juntas', '45590');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidosdetalle`
--

CREATE TABLE `pedidosdetalle` (
  `id` int(11) NOT NULL,
  `pedido` int(11) DEFAULT NULL,
  `producto` int(11) DEFAULT NULL,
  `item` int(11) DEFAULT NULL,
  `productotxt` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(15,2) DEFAULT NULL,
  `importe` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidosdetalle`
--

INSERT INTO `pedidosdetalle` (`id`, `pedido`, `producto`, `item`, `productotxt`, `cantidad`, `precio`, `importe`) VALUES
(5, 2, 17, 114, '2 | bici2 | Chico | Grey', 1, '48000.00', '48000.00'),
(6, 3, 16, 99, '1 | bici | Mediano | Negro', 1, '9000.00', '9000.00'),
(7, 3, 17, 114, '2 | bici2 | Chico | Grey', 1, '48000.00', '48000.00'),
(8, 4, 17, 112, '2 | bici2 | Mediano | Grey', 1, '48000.00', '48000.00'),
(9, 5, 17, 111, '2 | bici2 | Mediano | Negro', 1, '48000.00', '48000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `categoria` int(2) DEFAULT NULL,
  `clasif` int(2) DEFAULT NULL,
  `tipotalla` int(11) DEFAULT NULL,
  `marca` int(2) DEFAULT NULL,
  `title` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `metadescription` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` decimal(20,2) DEFAULT NULL,
  `descuento` int(2) NOT NULL DEFAULT 0,
  `titulo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sku` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `txt` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `material` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `inicio` int(1) NOT NULL DEFAULT 0,
  `favoritos` int(255) NOT NULL DEFAULT 0,
  `estatus` int(1) NOT NULL DEFAULT 1,
  `fecha` date DEFAULT NULL,
  `orden` int(2) DEFAULT 99,
  `forro` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `herraje` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `relacionados` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `especificaciones` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `guia` int(11) DEFAULT NULL,
  `geometry` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria`, `clasif`, `tipotalla`, `marca`, `title`, `metadescription`, `precio`, `descuento`, `titulo`, `sku`, `txt`, `material`, `imagen`, `inicio`, `favoritos`, `estatus`, `fecha`, `orden`, `forro`, `herraje`, `relacionados`, `especificaciones`, `guia`, `geometry`) VALUES
(16, 24, NULL, 2, 3, 'bici', 'bici', '9000.00', 0, 'bici', '1', '', '', NULL, 0, 0, 1, '2021-05-24', 99, NULL, NULL, NULL, NULL, NULL, 1),
(17, 27, NULL, 2, 3, 'bici2', 'bici2', '60000.00', 20, 'bici2', '2', '<p>La Roscoe 8 es una r&iacute;gida de pista para quien busca diversi&oacute;n en la tierra. Sus llantas mid-fat de 27.5+, su transmisi&oacute;n 1x12 de rango amplio y su tijera de suspensi&oacute;n de 120 mm te permiten disfrutar de todas las pistas, desde el singletrack firme hasta la tierra suelta. Es una bici de monta&ntilde;a para senderos relajada, equipada con especificaciones de alta calidad, que est&aacute; lista para la fiesta.</p>', '', NULL, 0, 1, 1, '2021-05-24', 99, NULL, NULL, '', '', 1, 1),
(18, 26, NULL, 7, 3, 'prueba', 'prueba', '0.00', 0, 'Habit Waves', '3', '<p>The head angle is slack, the stays are short and the seat angle is steep. It&rsquo;s that long, low modern geometry that helps you wring a little more flow out of every kind of trail.</p>', '', NULL, 0, 1, 1, '2021-05-24', 99, NULL, NULL, ',16,17', '<div class=\"highlights thrives-built\">\r\n<div id=\"PositioningPhrase\">\r\n<h3><strong>Your New Trail Boss.</strong></h3>\r\n<p>A trail bike with its priorities on point: playful agility, progressive design, and killer capability &ndash; your&nbsp;favorite&nbsp;trails have never&nbsp;been more fun.</p>\r\n</div>\r\n<h3><strong>Where it thrives</strong></h3>\r\n<p>Challenging trails, up and down hills</p>\r\n<h3><strong>What it&#039;s built for</strong></h3>\r\n<p>Traction, handling, durability</p>\r\n</div>\r\n<div class=\"highlights\">\r\n<h3 style=\"text-align: left;\"><strong>Highlights</strong></h3>\r\n<ul>\r\n<li>SmartForm C1 Alloy frame</li>\r\n<li>Rockshox Yari RC 140mm fork / Deluxe Select shock</li>\r\n<li>SRAM SX Eagle 12-speed drivetrain / DownLow dropper post</li>\r\n</ul>\r\n</div>', 1, 1),
(19, 9, NULL, 3, 3, 'prueba', 'prueba3', '0.00', 0, 'prueba3', '4', '', '', NULL, 0, 1, 1, '2021-05-24', 99, NULL, NULL, NULL, NULL, NULL, 0),
(20, 9, NULL, 3, 3, 'prueba6', 'prueba6', '0.00', 0, 'prueba6', '5', '1', '', NULL, 0, 1, 0, '2021-05-24', 99, NULL, NULL, NULL, NULL, NULL, 0),
(21, 9, NULL, 3, 3, 'prueba12', 'prueba', '0.00', 0, 'prueba7', '6', '1', '', NULL, 0, 0, 0, '2021-05-24', 99, NULL, NULL, NULL, NULL, NULL, 0),
(22, 9, NULL, 3, 3, 'prueba', 'prueba', '0.00', 0, 'prueba', '7', '1', '', NULL, 0, 0, 0, '2021-05-24', 99, NULL, NULL, NULL, NULL, NULL, 0),
(28, 27, NULL, 2, 3, 'google', '', '60000.00', 10, 'hola', '5', '<p>La E-Caliber 9.8 XT es una bici de monta&ntilde;a el&eacute;ctrica de carbono ligera que se maneja (y se ve) como una bici de cross country tradicional. Est&aacute; dise&ntilde;ada con la misma tecnolog&iacute;a de nivel de competici&oacute;n de la Supercaliber, incluyendo nuestro amortiguador integrado IsoStrut exclusivo, y tiene un elegante sistema de propulsi&oacute;n Fazua que ofrece un peque&ntilde;o impulso cuando m&aacute;s lo necesitas.</p>', '', NULL, 0, 0, 1, '2021-06-01', 99, NULL, NULL, NULL, NULL, NULL, 0),
(49, 35, NULL, 6, 3, '', '', '0.00', 0, 'Casco Vento auro', '2021rocki', '', '', NULL, 0, 0, 1, '2021-06-14', 99, NULL, NULL, '', '<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 49.7039%;\">espe1</td>\r\n<td style=\"width: 49.7039%;\">espe2</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 49.7039%;\">txt1</td>\r\n<td style=\"width: 49.7039%;\">txt2</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 49.7039%;\">espe3</td>\r\n<td style=\"width: 49.7039%;\">espe4</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 49.7039%;\">\r\n<p>City streets, village lanes, beautiful backroads</p>\r\n</td>\r\n<td style=\"width: 49.7039%;\">\r\n<div id=\"PositioningPhrase\">\r\n<p>An&nbsp;electric-bike&nbsp;built for the city streets, the town pathways,&nbsp;and the great open&nbsp;roads. You are&nbsp;just&nbsp;one ride away from a good mood.</p>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 2, 0),
(50, 35, NULL, 6, 3, '', '', '0.00', 0, 'Casco vento demon', '2021CAM-2', '<p>Los&nbsp;cascos&nbsp;dise&ntilde;ados para&nbsp;ciclismo<strong> </strong>de monta&ntilde;a&nbsp;cuentan con ventilaci&oacute;n que funciona muy bien aun a velocidades bajas. Este tipo de&nbsp;cascos&nbsp;ofrecen una mayor protecci&oacute;n en la nuca. La mayor&iacute;a incorpora viseras para proteger del sol, qu&eacute; en muchos casos pueden quitarse y ponerse f&aacute;cilmente.</p>', '', NULL, 0, 0, 1, '2021-06-15', 99, NULL, NULL, ',49', NULL, NULL, 0),
(52, 35, NULL, 6, 3, '', '', '0.00', 0, 'casco vento speed', '2021', '', '', NULL, 0, 0, 1, '2021-06-15', 99, NULL, NULL, '', '', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoscat`
--

CREATE TABLE `productoscat` (
  `id` int(11) NOT NULL,
  `parent` int(2) NOT NULL,
  `txt` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `imagen` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `imagenhover` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `estatus` int(1) NOT NULL DEFAULT 0,
  `orden` int(2) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `productoscat`
--

INSERT INTO `productoscat` (`id`, `parent`, `txt`, `imagen`, `imagenhover`, `estatus`, `orden`) VALUES
(9, 0, 'BIKES', NULL, NULL, 0, 99),
(15, 0, 'REFACCIONES', NULL, NULL, 0, 99),
(16, 0, 'ROPA', NULL, NULL, 0, 99),
(17, 0, 'ACCESORIOS', NULL, NULL, 0, 99),
(24, 9, 'ROAD', '2021-06-03912252884.png', NULL, 0, 99),
(25, 9, 'MOUNTAIN', '2021-06-03455826310.jpg', NULL, 0, 99),
(26, 9, 'ACTIVE', '2021-06-03349256272.png', NULL, 0, 99),
(27, 9, 'ELECTRIC', '2021-06-03794037250.jpg', NULL, 0, 99),
(28, 9, 'KIDS', '2021-06-03633186285.jpg', NULL, 0, 99),
(31, 9, 'PRUEBA1', '2021-06-09791247846.png', NULL, 0, 99),
(33, 9, 'PRUEBA2', '2021-06-09166195378.jpg', NULL, 0, 99),
(34, 16, 'Camisas', NULL, NULL, 0, 99),
(35, 17, 'Cascos', NULL, NULL, 0, 99),
(36, 17, 'Guantes', NULL, NULL, 0, 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoscolor`
--

CREATE TABLE `productoscolor` (
  `id` int(11) NOT NULL,
  `txt` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `imagen` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `name` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `productoscolor`
--

INSERT INTO `productoscolor` (`id`, `txt`, `imagen`, `name`) VALUES
(1, '#000000', NULL, 'Negro'),
(2, '#919191', '2019-10-11541970347.jpg', 'Grey'),
(3, '#e67d37', NULL, 'naranja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosexistencias`
--

CREATE TABLE `productosexistencias` (
  `id` int(11) NOT NULL,
  `producto` int(11) DEFAULT NULL,
  `talla` int(11) DEFAULT NULL,
  `color` int(11) DEFAULT NULL,
  `existencias` int(11) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL DEFAULT 0.00,
  `estatus` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productosexistencias`
--

INSERT INTO `productosexistencias` (`id`, `producto`, `talla`, `color`, `existencias`, `precio`, `estatus`) VALUES
(12, 1, 3, 2, 10, '0.00', 1),
(11, 1, 3, 1, 10, '0.00', 1),
(10, 1, 1, 2, -9, '0.00', 1),
(9, 1, 1, 1, -1, '0.00', 1),
(8, 1, 2, 2, 10, '0.00', 1),
(7, 1, 2, 1, 10, '0.00', 1),
(13, 2, 2, 1, -1, '0.00', 1),
(14, 2, 2, 2, 0, '0.00', 0),
(15, 2, 1, 1, -1, '0.00', 1),
(16, 2, 1, 2, 0, '0.00', 0),
(17, 2, 1, 2, 0, '0.00', 0),
(18, 2, 3, 1, 10, '0.00', 1),
(19, 2, 3, 2, 0, '0.00', 0),
(20, 2, 3, 2, 0, '0.00', 0),
(21, 3, 2, 1, 0, '0.00', 1),
(22, 3, 2, 2, 0, '0.00', 0),
(23, 3, 1, 1, 0, '0.00', 1),
(24, 3, 1, 2, 0, '0.00', 0),
(25, 3, 3, 1, 0, '0.00', 1),
(26, 3, 3, 2, 0, '0.00', 0),
(27, 4, 2, 1, 0, '0.00', 0),
(28, 4, 2, 2, 0, '0.00', 0),
(29, 4, 1, 1, 0, '0.00', 0),
(30, 4, 1, 2, 0, '0.00', 0),
(31, 4, 3, 1, 0, '0.00', 0),
(32, 4, 3, 2, 0, '0.00', 0),
(33, 5, 2, 1, 0, '0.00', 0),
(34, 5, 2, 2, 0, '0.00', 0),
(35, 5, 1, 1, 0, '0.00', 0),
(36, 5, 1, 2, 0, '0.00', 0),
(37, 5, 3, 1, 0, '0.00', 0),
(38, 5, 3, 2, 0, '0.00', 0),
(39, 6, 2, 1, 0, '0.00', 0),
(40, 6, 2, 2, 0, '0.00', 0),
(41, 6, 1, 1, 0, '0.00', 0),
(42, 6, 1, 2, 0, '0.00', 0),
(43, 6, 3, 1, 0, '0.00', 0),
(44, 6, 3, 2, 0, '0.00', 0),
(45, 7, 2, 1, 0, '0.00', 0),
(46, 7, 2, 2, 0, '0.00', 0),
(47, 7, 1, 1, 0, '0.00', 0),
(48, 7, 1, 2, 0, '0.00', 0),
(49, 7, 3, 1, 0, '0.00', 0),
(50, 7, 3, 2, 0, '0.00', 0),
(51, 8, 2, 1, 0, '0.00', 0),
(52, 8, 2, 2, 0, '0.00', 0),
(53, 8, 1, 1, 0, '0.00', 0),
(54, 8, 1, 2, 0, '0.00', 0),
(55, 8, 3, 1, 0, '0.00', 0),
(56, 8, 3, 2, 0, '0.00', 0),
(57, 9, 2, 1, 0, '0.00', 0),
(58, 9, 2, 2, 0, '0.00', 0),
(59, 9, 1, 1, 0, '0.00', 0),
(60, 9, 1, 2, 0, '0.00', 0),
(61, 9, 3, 1, 0, '0.00', 0),
(62, 9, 3, 2, 0, '0.00', 0),
(63, 10, 2, 1, 0, '0.00', 0),
(64, 10, 2, 2, 0, '0.00', 0),
(65, 10, 1, 1, 0, '0.00', 0),
(66, 10, 1, 2, 0, '0.00', 0),
(67, 10, 3, 1, 0, '0.00', 0),
(68, 10, 3, 2, 0, '0.00', 0),
(69, 11, 2, 1, 0, '0.00', 0),
(70, 11, 2, 2, 0, '0.00', 0),
(71, 11, 1, 1, 0, '0.00', 0),
(72, 11, 1, 2, 0, '0.00', 0),
(73, 11, 3, 1, 0, '0.00', 0),
(74, 11, 3, 2, 0, '0.00', 0),
(75, 12, 2, 1, 0, '0.00', 0),
(76, 12, 2, 2, 0, '0.00', 0),
(77, 12, 1, 1, 0, '0.00', 0),
(78, 12, 1, 2, 0, '0.00', 0),
(79, 12, 3, 1, 0, '0.00', 0),
(80, 12, 3, 2, 0, '0.00', 0),
(81, 13, 2, 1, 0, '0.00', 0),
(82, 13, 2, 2, 0, '0.00', 0),
(83, 13, 1, 1, 0, '0.00', 0),
(84, 13, 1, 2, 0, '0.00', 0),
(85, 13, 3, 1, 0, '0.00', 0),
(86, 13, 3, 2, 0, '0.00', 0),
(87, 14, 2, 1, 0, '0.00', 0),
(88, 14, 2, 2, 0, '0.00', 0),
(89, 14, 1, 1, 0, '0.00', 0),
(90, 14, 1, 2, 0, '0.00', 0),
(91, 14, 3, 1, 0, '0.00', 0),
(92, 14, 3, 2, 0, '0.00', 0),
(93, 15, 2, 1, 0, '0.00', 0),
(94, 15, 2, 2, 0, '0.00', 0),
(95, 15, 1, 1, 0, '0.00', 0),
(96, 15, 1, 2, 0, '0.00', 0),
(97, 15, 3, 1, 0, '0.00', 0),
(98, 15, 3, 2, 0, '0.00', 0),
(99, 16, 2, 1, 3, '0.00', 1),
(100, 16, 2, 2, 0, '0.00', 0),
(101, 16, 1, 1, 0, '0.00', 0),
(102, 16, 1, 2, 0, '0.00', 0),
(103, 16, 3, 1, 0, '0.00', 0),
(104, 16, 3, 2, 0, '0.00', 0),
(105, 28, 2, 1, 0, '0.00', 0),
(106, 28, 2, 2, 0, '0.00', 0),
(107, 28, 1, 1, 0, '0.00', 0),
(108, 28, 1, 2, 0, '0.00', 0),
(109, 28, 3, 1, 0, '0.00', 0),
(110, 28, 3, 2, 0, '0.00', 0),
(111, 17, 2, 1, 7, '0.00', 1),
(112, 17, 2, 2, 8, '0.00', 1),
(113, 17, 1, 1, 0, '0.00', 0),
(114, 17, 1, 2, 1, '0.00', 1),
(115, 17, 3, 1, 0, '0.00', 0),
(116, 17, 3, 2, 0, '0.00', 0),
(117, 49, 8, 1, 0, '0.00', 0),
(118, 49, 8, 2, 0, '0.00', 0),
(119, 49, 9, 1, 0, '0.00', 0),
(120, 49, 9, 2, 0, '0.00', 0),
(121, 49, 10, 1, 0, '0.00', 0),
(122, 49, 10, 2, 0, '0.00', 0),
(123, 49, 11, 1, 0, '0.00', 0),
(124, 49, 11, 2, 0, '0.00', 0),
(125, 49, 12, 1, 0, '0.00', 0),
(126, 49, 12, 2, 0, '0.00', 0),
(127, 49, 8, 3, 3, '0.00', 1),
(128, 49, 9, 3, 2, '0.00', 1),
(129, 49, 10, 3, 0, '0.00', 0),
(130, 49, 11, 3, 0, '0.00', 0),
(131, 49, 12, 3, 0, '0.00', 0),
(132, 16, 2, 3, 0, '0.00', 0),
(133, 16, 1, 3, 0, '0.00', 0),
(134, 16, 3, 3, 0, '0.00', 0),
(135, 50, 8, 1, 0, '0.00', 0),
(136, 50, 8, 2, 0, '0.00', 0),
(137, 50, 8, 3, 0, '0.00', 0),
(138, 50, 9, 1, 0, '0.00', 0),
(139, 50, 9, 2, 0, '0.00', 0),
(140, 50, 9, 3, 0, '0.00', 0),
(141, 50, 10, 1, 0, '0.00', 0),
(142, 50, 10, 2, 0, '0.00', 0),
(143, 50, 10, 3, 0, '0.00', 0),
(144, 50, 11, 1, 0, '0.00', 0),
(145, 50, 11, 2, 0, '0.00', 0),
(146, 50, 11, 3, 0, '0.00', 0),
(147, 50, 12, 1, 0, '0.00', 0),
(148, 50, 12, 2, 0, '0.00', 0),
(149, 50, 12, 3, 0, '0.00', 0),
(150, 51, 8, 1, 0, '0.00', 0),
(151, 51, 8, 2, 0, '0.00', 0),
(152, 51, 8, 3, 0, '0.00', 0),
(153, 51, 9, 1, 0, '0.00', 0),
(154, 51, 9, 2, 0, '0.00', 0),
(155, 51, 9, 3, 0, '0.00', 0),
(156, 51, 10, 1, 0, '0.00', 0),
(157, 51, 10, 2, 0, '0.00', 0),
(158, 51, 10, 3, 0, '0.00', 0),
(159, 51, 11, 1, 0, '0.00', 0),
(160, 51, 11, 2, 0, '0.00', 0),
(161, 51, 11, 3, 0, '0.00', 0),
(162, 51, 12, 1, 0, '0.00', 0),
(163, 51, 12, 2, 0, '0.00', 0),
(164, 51, 12, 3, 0, '0.00', 0),
(165, 52, 8, 1, 0, '0.00', 0),
(166, 52, 8, 2, 0, '0.00', 0),
(167, 52, 8, 3, 0, '0.00', 0),
(168, 52, 9, 1, 0, '0.00', 0),
(169, 52, 9, 2, 0, '0.00', 0),
(170, 52, 9, 3, 0, '0.00', 0),
(171, 52, 10, 1, 0, '0.00', 0),
(172, 52, 10, 2, 0, '0.00', 0),
(173, 52, 10, 3, 0, '0.00', 0),
(174, 52, 11, 1, 0, '0.00', 0),
(175, 52, 11, 2, 0, '0.00', 0),
(176, 52, 11, 3, 0, '0.00', 0),
(177, 52, 12, 1, 0, '0.00', 0),
(178, 52, 12, 2, 0, '0.00', 0),
(179, 52, 12, 3, 0, '0.00', 0),
(180, 17, 2, 3, 0, '0.00', 0),
(181, 17, 1, 3, 0, '0.00', 0),
(182, 17, 3, 3, 0, '0.00', 0),
(183, 18, 13, 1, 0, '0.00', 0),
(184, 18, 13, 2, 0, '0.00', 0),
(185, 18, 13, 3, 0, '0.00', 0),
(186, 18, 14, 1, 0, '0.00', 0),
(187, 18, 14, 2, 2, '0.00', 1),
(188, 18, 14, 3, 0, '0.00', 0),
(189, 18, 15, 1, 0, '0.00', 0),
(190, 18, 15, 2, 0, '0.00', 0),
(191, 18, 15, 3, 0, '0.00', 0),
(192, 18, 16, 1, 0, '0.00', 0),
(193, 18, 16, 2, 0, '0.00', 0),
(194, 18, 16, 3, 0, '0.00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosmarcas`
--

CREATE TABLE `productosmarcas` (
  `id` int(11) NOT NULL,
  `txt` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(2) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productosmarcas`
--

INSERT INTO `productosmarcas` (`id`, `txt`, `imagen`, `orden`) VALUES
(3, 'Patito', '477175676.png', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productospic`
--

CREATE TABLE `productospic` (
  `id` int(10) NOT NULL,
  `producto` int(10) NOT NULL,
  `titulo` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `title` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `txt` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `orden` int(2) NOT NULL DEFAULT 99,
  `imagen` varchar(191) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `productospic`
--

INSERT INTO `productospic` (`id`, `producto`, `titulo`, `title`, `txt`, `orden`, `imagen`) VALUES
(13, 1, NULL, NULL, NULL, 99, NULL),
(14, 2, NULL, NULL, NULL, 99, NULL),
(15, 3, NULL, NULL, NULL, 99, NULL),
(16, 9, NULL, NULL, NULL, 99, NULL),
(17, 10, NULL, NULL, NULL, 99, NULL),
(20, 11, NULL, NULL, NULL, 99, NULL),
(21, 13, NULL, NULL, NULL, 99, NULL),
(22, 7, NULL, NULL, NULL, 99, NULL),
(23, 8, NULL, NULL, NULL, 99, NULL),
(24, 14, NULL, NULL, NULL, 99, NULL),
(25, 1, NULL, NULL, NULL, 99, NULL),
(26, 1, NULL, NULL, NULL, 99, NULL),
(28, 15, NULL, NULL, NULL, 99, NULL),
(30, 15, NULL, NULL, NULL, 99, NULL),
(31, 15, NULL, NULL, NULL, 99, NULL),
(32, 1, NULL, NULL, NULL, 99, NULL),
(47, 16, NULL, NULL, NULL, 99, '303417464.png'),
(48, 17, NULL, NULL, NULL, 99, '853749062.jpg'),
(49, 17, NULL, NULL, NULL, 99, '339126930.jpg'),
(50, 49, NULL, NULL, NULL, 99, '808196528.jpg'),
(51, 50, NULL, NULL, NULL, 99, '945454540.jpg'),
(52, 52, NULL, NULL, NULL, 99, '848922774.jpg'),
(53, 18, NULL, NULL, NULL, 99, '255716768.png'),
(54, 18, NULL, NULL, NULL, 99, '494215489.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productostalla`
--

CREATE TABLE `productostalla` (
  `id` int(11) NOT NULL,
  `txt` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `tipo` varchar(30) COLLATE latin1_spanish_ci DEFAULT 'Chamarras',
  `orden` int(2) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `productostalla`
--

INSERT INTO `productostalla` (`id`, `txt`, `tipo`, `orden`) VALUES
(1, 'Chico', '2', 1),
(2, 'Mediano', '2', 0),
(3, 'Grande', '2', 2),
(8, '21', '6', 99),
(9, '22', '6', 99),
(10, '23', '6', 99),
(11, '24', '6', 99),
(12, '25', '6', 99),
(13, 'SM', '7', 99),
(14, 'MD', '7', 99),
(15, 'LG', '7', 99),
(16, 'XL', '7', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productostallaclasif`
--

CREATE TABLE `productostallaclasif` (
  `id` int(11) NOT NULL,
  `txt` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(2) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productostallaclasif`
--

INSERT INTO `productostallaclasif` (`id`, `txt`, `orden`) VALUES
(2, 'Ropa', 99),
(6, 'casco', 99),
(7, 'bicicletas', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productostallarel`
--

CREATE TABLE `productostallarel` (
  `id` int(10) NOT NULL,
  `producto` int(2) DEFAULT NULL,
  `talla` int(3) DEFAULT NULL,
  `espalda` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `manga` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `largo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `busto` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cintura` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(191) NOT NULL,
  `orden` int(11) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `titulo`, `orden`) VALUES
(2, 'inicio1', 99),
(3, 'inicio2', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccionesdetalle`
--

CREATE TABLE `seccionesdetalle` (
  `id` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `txt` text DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 0,
  `orden` int(11) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seccionesdetalle`
--

INSERT INTO `seccionesdetalle` (`id`, `producto`, `titulo`, `txt`, `url`, `estatus`, `orden`) VALUES
(7, 2, 'trail', 'Lorem ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estandar de las industrias desde el año 1500. elit.', 'http://localhost/meetbikes/site/25_0_0_tienda_wozial', 0, 99),
(15, 3, 'DEMO RIDE', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia labore repudiandae iusto provident eius ex vitae numquam quis, est laboriosam, porro laudantium molestiae voluptatem ad libero. Minima veniam eveniet iusto?', 'agenda', 0, 99),
(16, 2, 'trail data', 'Lorem ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estandar de las industrias desde el año 1500. elit.', '26_0_0_tienda_wozial', 0, 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(10) NOT NULL,
  `categoria` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `txt` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `txtdetalle` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` int(1) NOT NULL DEFAULT 0,
  `fecha` date DEFAULT NULL,
  `orden` int(2) DEFAULT 99,
  `imagen` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lat` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lon` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `categoria`, `titulo`, `txt`, `txtdetalle`, `estatus`, `fecha`, `orden`, `imagen`, `lat`, `lon`) VALUES
(1, NULL, 'Wozial', '<p>Probando</p>', NULL, 0, '2019-10-11', 99, '217932748.jpg', '20.667703809107746', '-103.34699871873852');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id` int(10) NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `txt` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(2) DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`id`, `titulo`, `email`, `fecha`, `txt`, `imagen`, `orden`) VALUES
(1, 'Efra', 'ing_efrain@yahoo.com', '2019-10-12', '<p>Probando</p>', '705694155.jpg', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `user` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pass` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `fecha`, `nivel`) VALUES
(1, 'efra', '12eb5fef578326a527019871e4ca1c35', '2019-09-16 00:00:00', 2),
(24, 'rosi', '12eb5fef578326a527019871e4ca1c35', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nivel` int(1) NOT NULL DEFAULT 0,
  `distribuidor` int(1) NOT NULL DEFAULT 0,
  `alta` date DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `udate` timestamp NOT NULL DEFAULT current_timestamp(),
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `facebook` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `empresa` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rfc` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `calle` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `noexterior` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nointerior` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `entrecalles` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pais` varchar(100) COLLATE utf8_spanish_ci DEFAULT 'Mexico',
  `estado` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `municipio` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `colonia` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cp` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `calle2` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `noexterior2` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nointerior2` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `entrecalles2` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pais2` varchar(100) COLLATE utf8_spanish_ci DEFAULT 'Mexico',
  `estado2` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `municipio2` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `colonia2` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cp2` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nivel`, `distribuidor`, `alta`, `fecha`, `udate`, `nombre`, `email`, `telefono`, `facebook`, `pass`, `empresa`, `rfc`, `calle`, `noexterior`, `nointerior`, `entrecalles`, `pais`, `estado`, `municipio`, `colonia`, `cp`, `calle2`, `noexterior2`, `nointerior2`, `entrecalles2`, `pais2`, `estado2`, `municipio2`, `colonia2`, `cp2`, `imagen`) VALUES
(1, 0, 0, '2019-10-31', '2020-05-21 02:49:06', '2021-03-29 17:34:34', 'Efra', 'ing_efrain@yahoo.com', '3314305376', NULL, '12eb5fef578326a527019871e4ca1c35', 'Wozial', 'GOME771206PJ9', 'Rio Juarez', '1906', 'L 43', 'Rio Medellin e Insurgentes', 'México', 'Jalisco', 'Guadalajara', 'El Rosario', '44898', NULL, NULL, NULL, NULL, 'Mexico', NULL, NULL, NULL, NULL, NULL),
(2, 0, 0, '2019-10-31', '2019-10-31 00:36:56', '2021-03-29 17:34:34', 'ROSA AURELIA', 'rosyreyess@hotmail.com', '3317114960', NULL, '12eb5fef578326a527019871e4ca1c35', 'Wozial', 'RESR720608', 'RIO ATOTNILCO', '1149', 'Rio Juarez 1906 int L 43', 'Autlán y Amealco', 'México', 'Jalisco', 'Guadalajara', 'Altas', '44898', NULL, NULL, NULL, NULL, 'Mexico', NULL, NULL, NULL, NULL, NULL),
(3, 0, 0, '2021-06-10', '2021-06-14 18:09:33', '2021-06-10 22:49:33', 'oscar', 'oscar@wozial.com', '4545454545', NULL, 'f2dbc7b4bbbf165698fc942364027139', 'wozial', '', 'jiji', '45', '', 'jojo', 'México', 'jalisco', 'tlaquepaque', 'juntas', '45590', NULL, NULL, NULL, NULL, 'Mexico', NULL, NULL, NULL, NULL, '202106149571674.png'),
(4, 0, 0, '2021-06-11', '2021-06-11 16:27:07', '2021-06-11 18:56:18', 'lizbeth', 'lix@hotmail.com', '4545454582', NULL, 'f2dbc7b4bbbf165698fc942364027139', NULL, NULL, NULL, NULL, NULL, NULL, 'Mexico', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mexico', NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `blogpic`
--
ALTER TABLE `blogpic`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calendariopic`
--
ALTER TABLE `calendariopic`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carousel2`
--
ALTER TABLE `carousel2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cupones`
--
ALTER TABLE `cupones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galerias`
--
ALTER TABLE `galerias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeriaspic`
--
ALTER TABLE `galeriaspic`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `guias`
--
ALTER TABLE `guias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `guiaspic`
--
ALTER TABLE `guiaspic`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ipn`
--
ALTER TABLE `ipn`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidosdetalle`
--
ALTER TABLE `pedidosdetalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productoscat`
--
ALTER TABLE `productoscat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `productoscolor`
--
ALTER TABLE `productoscolor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `productosexistencias`
--
ALTER TABLE `productosexistencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productosmarcas`
--
ALTER TABLE `productosmarcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productospic`
--
ALTER TABLE `productospic`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productostalla`
--
ALTER TABLE `productostalla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `productostallaclasif`
--
ALTER TABLE `productostallaclasif`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productostallarel`
--
ALTER TABLE `productostallarel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seccionesdetalle`
--
ALTER TABLE `seccionesdetalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `blogpic`
--
ALTER TABLE `blogpic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `calendariopic`
--
ALTER TABLE `calendariopic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `carousel2`
--
ALTER TABLE `carousel2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cupones`
--
ALTER TABLE `cupones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `galerias`
--
ALTER TABLE `galerias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `galeriaspic`
--
ALTER TABLE `galeriaspic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `guias`
--
ALTER TABLE `guias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `guiaspic`
--
ALTER TABLE `guiaspic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ipn`
--
ALTER TABLE `ipn`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedidosdetalle`
--
ALTER TABLE `pedidosdetalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `productoscat`
--
ALTER TABLE `productoscat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `productoscolor`
--
ALTER TABLE `productoscolor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productosexistencias`
--
ALTER TABLE `productosexistencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT de la tabla `productosmarcas`
--
ALTER TABLE `productosmarcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productospic`
--
ALTER TABLE `productospic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `productostalla`
--
ALTER TABLE `productostalla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productostallaclasif`
--
ALTER TABLE `productostallaclasif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productostallarel`
--
ALTER TABLE `productostallarel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `seccionesdetalle`
--
ALTER TABLE `seccionesdetalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;