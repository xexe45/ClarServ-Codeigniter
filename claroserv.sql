-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2018 a las 05:19:00
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `claroserv`
--
CREATE DATABASE IF NOT EXISTS `claroserv` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `claroserv`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_cliente` (IN `nombres_e` VARCHAR(255), IN `apellidos_e` VARCHAR(255), IN `dni_e` CHAR(8), IN `telefono_e` VARCHAR(15), IN `telefono_opcional_e` VARCHAR(15), IN `direccion_e` TEXT, IN `correo_e` TEXT, IN `codigo_e` INT, IN `plan_id_e` INT, IN `precio_mes_oferta_e` FLOAT, IN `precio_normal_e` FLOAT, IN `user_id_e` INT, IN `fecha_instalacion_e` DATE, IN `observaciones_e` TEXT, OUT `res` BOOLEAN)  BEGIN
declare exit handler
  for SQLEXCEPTION
begin
rollback;
set res=false;
end;
start transaction;
set @id_cliente = (select id from clientes where dni = dni_e);

if @id_cliente > 0 then
INSERT INTO `acuerdo`(codigo,cliente_id,plan_id,precio_mes_oferta,precio_normal,user_id,fecha_registro,fecha_instalacion,observaciones)
VALUES(codigo_e,@id_cliente,plan_id_e,precio_mes_oferta_e,precio_normal_e,user_id_e,NOW(),fecha_instalacion_e,observaciones_e);

else
INSERT INTO `clientes`(nombres,apellidos,dni,telefono,telefono_opcional,direccion,correo_electronico,created_at)
VALUES(nombres_e,apellidos_e,dni_e,telefono_e,telefono_opcional_e,direccion_e,correo_e,NOW());
SET @cliente_id = LAST_INSERT_ID();
INSERT INTO `acuerdo`(codigo,cliente_id,plan_id,precio_mes_oferta,precio_normal,user_id,fecha_registro,fecha_instalacion,observaciones)
VALUES(codigo_e,@cliente_id,plan_id_e,precio_mes_oferta_e,precio_normal_e,user_id_e,NOW(),fecha_instalacion_e,observaciones_e);
end if;

commit;
set res=true;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_cliente_interesado` (IN `nombre_e` VARCHAR(255), IN `apellidos_e` VARCHAR(255), IN `telefono_e` VARCHAR(20), IN `direccion_e` TEXT, IN `descripcion_e` TEXT, OUT `res` BOOLEAN)  BEGIN
declare exit handler
  for SQLEXCEPTION
begin
rollback;
set res=false;
end;
start transaction;
INSERT INTO `cliente_interesado`(nombre,apellidos,telefono,direccion,descripcion,created_at)
VALUES(nombre_e,apellidos_e,telefono_e,direccion_e,descripcion_e,NOW());
commit;
set res=true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_modulo` (IN `modulo_e` VARCHAR(255), OUT `res` BOOLEAN)  BEGIN
declare exit handler
  for SQLEXCEPTION
begin
rollback;
set res=false;
end;
start transaction;
INSERT INTO `modulos`(modulo)
VALUES(modulo_e);
commit;
set res=true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_rol` (IN `rol_e` VARCHAR(100), IN `descripcion_e` TEXT, OUT `res` BOOLEAN)  BEGIN
declare exit handler
  for SQLEXCEPTION
begin
rollback;
set res=false;
end;
start transaction;
INSERT INTO `roles`(rol,descripcion,created_at)
VALUES(rol_e,descripcion_e,now());
commit;
set res=true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_servicio` (IN `nombre_e` VARCHAR(255), IN `descripcion_e` TEXT, IN `precio_mes_oferta_e` DECIMAL(8,2), IN `precio_normal_e` DECIMAL(8,2), OUT `res` BOOLEAN)  BEGIN
declare exit handler
  for SQLEXCEPTION
begin
rollback;
set res=false;
end;
start transaction;
INSERT INTO `planes`(nombre,descripcion,precio_mes_oferta,precio_normal,created_at)
VALUES(nombre_e,descripcion_e,precio_mes_oferta_e,precio_normal_e,now());
commit;
set res=true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_user` (IN `nombre_e` VARCHAR(255), IN `apellidos_e` VARCHAR(255), IN `dni_e` CHAR(8), IN `telefono_e` VARCHAR(15), IN `telefono_opcional_e` VARCHAR(15), IN `direccion_e` TEXT, IN `rol_id_e` INT, IN `email_e` VARCHAR(255), IN `clave_e` TEXT, OUT `res` BOOLEAN)  BEGIN
declare exit handler
  for SQLEXCEPTION
begin
rollback;
set res=false;
end;
start transaction;
INSERT INTO `users`(nombre,apellidos,dni,telefono,telefono_opcional,direccion,rol_id,email,password,created_at)
VALUES(nombre_e,apellidos_e,dni_e,telefono_e,telefono_opcional_e,direccion_e,rol_id_e,email_e,clave_e,NOW());
commit;
set res=true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_clientes` ()  BEGIN
select c.id as v1, CONCAT(c.nombres,' ',c.apellidos,' ',c.dni) as v4, c.telefono as v5, c.telefono_opcional as v6,
c.direccion as v7, c.correo_electronico as v8, a.id as v9,a.codigo as v10, a.plan_id as v11, a.precio_mes_oferta as v12, 
a.precio_normal as v13,a.user_id as v14,a.fecha_registro as v15, a.fecha_instalacion as v16, a.observaciones as v17,p.nombre as v18,
concat(u.nombre,' ',u.apellidos) as v19
from clientes c inner join acuerdo a on c.id = a.cliente_id
inner join planes p on a.plan_id = p.id
inner join users u on a.user_id = u.id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_clientes_interesados` ()  BEGIN
select id as v1, nombre as v2, apellidos as v3, telefono as v4, direccion as v5, descripcion as v6,
created_at as v7
from cliente_interesado;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_cliente_by_dni` (IN `dni_e` CHAR(8))  BEGIN
select id as v1, nombres as v2, apellidos as v3, dni as v4, telefono as v5, telefono_opcional as v6,
direccion as v7, correo_electronico as v8
from clientes
where dni=dni_e;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_modulos` ()  BEGIN
select id as v1, modulo as v2, created_at as v3
from modulos;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_roles` ()  BEGIN
select id as v1, rol as v2, descripcion as v3
from roles;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_servicio` ()  BEGIN
select id as v1, nombre as v2, descripcion as v3, precio_mes_oferta as v4, precio_normal as v5,
estado as v6, created_at as v7, updated_at as v8
from planes;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_servicios` ()  BEGIN
select id as v1, nombre as v2, descripcion as v3, precio_mes_oferta as v4, precio_normal as v5,
estado as v6, created_at as v7, updated_at as v8
from planes;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_usuarios` ()  BEGIN
select u.id as v1, u.nombre as v2, u.apellidos as v3, u.dni as v4, u.telefono as v5, u.telefono_opcional as v6,
u.direccion as v7, u.rol_id as v8, r.rol as v9,u.email as v10, u.estado as v11, u.created_at as v12, u.updated_at as v13
from users u inner join roles r on u.rol_id = r.id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_migrar_cliente` (IN `idcliente_e` INT, IN `nombres_e` VARCHAR(255), IN `apellidos_e` VARCHAR(255), IN `dni_e` CHAR(8), IN `telefono_e` VARCHAR(15), IN `telefono_opcional_e` VARCHAR(15), IN `direccion_e` TEXT, IN `correo_e` TEXT, IN `codigo_e` INT, IN `plan_id_e` INT, IN `precio_mes_oferta_e` FLOAT, IN `precio_normal_e` FLOAT, IN `user_id_e` INT, IN `fecha_instalacion_e` DATE, IN `observaciones_e` TEXT, OUT `res` BOOLEAN)  BEGIN
declare exit handler
  for SQLEXCEPTION
begin
rollback;
set res=false;
end;
start transaction;
set @id_cliente = (select id from clientes where dni = dni_e);

if @id_cliente > 0 then
INSERT INTO `acuerdo`(codigo,cliente_id,plan_id,precio_mes_oferta,precio_normal,user_id,fecha_registro,fecha_instalacion,observaciones)
VALUES(codigo_e,@id_cliente,plan_id_e,precio_mes_oferta_e,precio_normal_e,user_id_e,NOW(),fecha_instalacion_e,observaciones_e);

DELETE FROM cliente_interesado WHERE id = idcliente_e;
else
INSERT INTO `clientes`(nombres,apellidos,dni,telefono,telefono_opcional,direccion,correo_electronico,created_at)
VALUES(nombres_e,apellidos_e,dni_e,telefono_e,telefono_opcional_e,direccion_e,correo_e,NOW());
SET @cliente_id = LAST_INSERT_ID();
INSERT INTO `acuerdo`(codigo,cliente_id,plan_id,precio_mes_oferta,precio_normal,user_id,fecha_registro,fecha_instalacion,observaciones)
VALUES(codigo_e,@cliente_id,plan_id_e,precio_mes_oferta_e,precio_normal_e,user_id_e,NOW(),fecha_instalacion_e,observaciones_e);
DELETE FROM cliente_interesado WHERE id = idcliente_e;
end if;

commit;
set res=true;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_cliente_interesado` (IN `idcliente_e` INT, IN `nombre_e` VARCHAR(255), IN `apellidos_e` VARCHAR(255), IN `telefono_e` VARCHAR(20), IN `direccion_e` TEXT, IN `descripcion_e` TEXT, OUT `res` BOOLEAN)  BEGIN
declare exit handler
  for SQLEXCEPTION
begin
rollback;
set res=false;
end;
start transaction;
UPDATE cliente_interesado set nombre = nombre_e, apellidos = apellidos_e, telefono = telefono_e,
direccion = direccion_e, descripcion = descripcion_e
WHERE id = idcliente_e;
commit;
set res=true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_rol` (IN `idrol_e` INT, IN `rol_e` VARCHAR(100), IN `descripcion_e` TEXT, OUT `res` BOOLEAN)  BEGIN
declare exit handler
  for SQLEXCEPTION
begin
rollback;
set res=false;
end;
start transaction;
UPDATE `roles` set rol=rol_e,descripcion=descripcion_e
WHERE id = idrol_e;
commit;
set res=true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_servicio` (IN `id_e` INT, IN `nombre_e` VARCHAR(255), IN `descripcion_e` TEXT, IN `precio_mes_oferta_e` DECIMAL(8,2), IN `precio_normal_e` DECIMAL(8,2), IN `estado_e` CHAR(1), OUT `res` BOOLEAN)  BEGIN
declare exit handler
  for SQLEXCEPTION
begin
rollback;
set res=false;
end;
start transaction;
UPDATE `planes`set nombre = nombre_e,descripcion = descripcion_e,
precio_mes_oferta = precio_mes_oferta_e,precio_normal = precio_normal_e,
estado = estado_e
WHERE id = id_e;
commit;
set res=true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_user` (IN `id_e` INT, IN `nombre_e` VARCHAR(255), IN `apellidos_e` VARCHAR(255), IN `dni_e` CHAR(8), IN `telefono_e` VARCHAR(15), IN `telefono_opcional_e` VARCHAR(15), IN `direccion_e` TEXT, IN `rol_id_e` INT, IN `email_e` VARCHAR(255), IN `estado_e` CHAR(1), OUT `res` BOOLEAN)  BEGIN
declare exit handler
  for SQLEXCEPTION
begin
rollback;
set res=false;
end;
start transaction;
UPDATE users set nombre = nombre_e, apellidos = apellidos_e, dni = dni_e, telefono = telefono_e,
telefono_opcional = telefono_opcional_e, direccion = direccion_e, rol_id = rol_id_e,
email = email_e, estado = estado_e
WHERE id = id_e;
commit;
set res=true;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acuerdo`
--

CREATE TABLE `acuerdo` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `precio_mes_oferta` float NOT NULL,
  `precio_normal` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_instalacion` date NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `acuerdo`
--

INSERT INTO `acuerdo` (`id`, `codigo`, `cliente_id`, `plan_id`, `precio_mes_oferta`, `precio_normal`, `user_id`, `fecha_registro`, `fecha_instalacion`, `observaciones`) VALUES
(1, 1128304, 1, 1, 59, 119, 1, '2018-01-23 03:00:14', '2018-01-26', 'Todo correcto'),
(2, 1128305, 2, 3, 99, 199, 1, '2018-01-27 00:25:34', '2018-01-30', 'Todo correcto'),
(3, 1128306, 1, 3, 99, 199, 1, '2018-01-27 00:28:09', '2018-01-31', 'Todo correcto'),
(4, 1128307, 4, 3, 99, 199, 1, '2018-02-02 21:58:26', '2018-01-31', 'Todo correcto.'),
(5, 1128308, 5, 2, 74, 149, 1, '2018-02-02 21:59:02', '2018-02-05', 'Todo correcto'),
(6, 1128309, 6, 1, 59, 119, 5, '2018-02-02 23:17:32', '2018-02-06', 'A partir del medio día.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `dni` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_opcional` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `correo_electronico` text COLLATE utf8_spanish_ci,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `dni`, `telefono`, `telefono_opcional`, `direccion`, `correo_electronico`, `created_at`, `updated_at`) VALUES
(1, 'Roco Reynaldo', 'Lachira Flores', '12345673', '0732084', '', 'AA.HH. José Olaya j-12', 'roco@gmail.com', '2018-01-23 03:00:14', '2018-01-23 08:00:14'),
(2, 'Leonidas', 'Carrasco Zapata', '12345679', '967099190', '', 'Urb. La Alborada j-15', 'leonidad@gmail.com', '2018-01-27 00:25:34', '2018-01-27 05:25:34'),
(4, 'Arnold', 'Villaramarín Contreras', '70351234', '965011102', '', 'Urb. Los Geranios l-10', 'arnold@gmail.com', '2018-01-27 00:39:15', '2018-01-27 05:39:15'),
(5, 'Marcela', 'Ato Peña', '02980717', '073209082', '309089', 'AA.HH Los Algarrobos m-12', 'marcela@gmail.com', '2018-02-02 21:59:02', '2018-02-03 02:59:02'),
(6, 'Elmer', 'Chunga Carranza', '12345678', '967099108', '', 'Av. Lopez Alburjar k-19', 'elchunga@gmail.com', '2018-02-02 23:17:32', '2018-02-03 04:17:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_interesado`
--

CREATE TABLE `cliente_interesado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente_interesado`
--

INSERT INTO `cliente_interesado` (`id`, `nombre`, `apellidos`, `telefono`, `direccion`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Juan', 'Perez López', '969066163', 'Urb.Piura z-12', 'Interesado en el plan 3Play de 4Mb', '2018-01-21 14:01:12', '2018-01-21 19:29:03'),
(3, 'Juan', 'Torres Lopez', '967099194', 'Urb. Los Titanes I-12', 'Interesado en el paquete 3MB', '2018-02-02 23:08:21', '2018-02-03 04:08:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos`
--

CREATE TABLE `metodos` (
  `id` int(11) NOT NULL,
  `modulo_id` int(11) NOT NULL,
  `metodo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `metodos`
--

INSERT INTO `metodos` (`id`, `modulo_id`, `metodo`, `created_at`) VALUES
(1, 1, 'index', '2018-01-20 05:41:44'),
(2, 2, 'index', '2018-01-20 05:41:50'),
(3, 2, 'add', '2018-01-20 05:41:50'),
(4, 2, 'lista', '2018-01-20 05:41:50'),
(5, 3, 'index', '2018-01-20 05:41:56'),
(6, 3, 'add', '2018-01-20 05:41:56'),
(7, 3, 'update', '2018-01-20 05:41:56'),
(8, 3, 'lista', '2018-01-20 05:41:56'),
(9, 4, 'index', '2018-01-20 05:42:00'),
(10, 4, 'add', '2018-01-20 05:42:00'),
(11, 4, 'update', '2018-01-20 05:42:00'),
(12, 4, 'lista', '2018-01-20 05:42:00'),
(13, 5, 'index', '2018-01-20 05:42:05'),
(14, 5, 'add', '2018-01-20 05:42:05'),
(15, 5, 'update', '2018-01-20 05:42:05'),
(16, 5, 'lista', '2018-01-20 05:42:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL,
  `modulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id`, `modulo`, `created_at`) VALUES
(1, 'HomeController', '2018-01-20 05:41:44'),
(2, 'ModulosController', '2018-01-20 05:41:50'),
(3, 'RolController', '2018-01-20 05:41:56'),
(4, 'ServicioController', '2018-01-20 05:42:00'),
(5, 'UserController', '2018-01-20 05:42:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `precio_mes_oferta` decimal(8,2) NOT NULL,
  `precio_normal` decimal(8,2) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'A',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `nombre`, `descripcion`, `precio_mes_oferta`, `precio_normal`, `estado`, `created_at`, `updated_at`) VALUES
(1, '2 Play 8Mb', 'Internet de hasta 8 Megas con descarga ilimitada + Telefonía multidestino 400.', '59.00', '119.00', 'A', '2018-01-18 23:34:02', '2018-01-19 04:34:02'),
(2, '3 Play 4Mb', 'Internet de hasta 4 Mbps con descarga ilimitada + Telefonía multidestino 100 + Hogar Básico 1 TV + 98 canales SD + 10 canales HD + 1 Decho Básico HD', '74.00', '149.00', 'A', '2018-01-18 23:37:54', '2018-01-19 04:37:54'),
(3, '3 Play 8MB', 'Internet de hasta 8Mbps con descarga ilimitada + Telefonía multidestino 400 + Hogar Digital 1 TV + 98 canales SD + 49 canales HD + Claro VOD + 1 Deco HD', '99.00', '199.00', 'A', '2018-01-19 00:15:55', '2018-01-24 18:22:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'Encargado de todos los módulos del sistema', '2018-01-17 02:18:22', '2018-01-18 00:55:25'),
(2, 'usuario de campo', 'Encargado de registrar clientes en campo', '2018-01-17 02:20:03', '2018-01-17 17:41:34'),
(3, 'desarrollador', 'Programador del sistema.', '2018-01-17 12:46:33', '2018-01-17 17:46:33'),
(4, 'asistente', 'asistente del administrador', '2018-01-17 12:48:39', '2018-01-17 17:48:39'),
(5, 'call-center', 'Encargada de realizar llamadas a posibles Clientes.', '2018-01-18 08:58:50', '2018-01-20 00:14:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `dni` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_opcional` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `rol_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'A',
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellidos`, `dni`, `telefono`, `telefono_opcional`, `direccion`, `rol_id`, `email`, `estado`, `password`, `created_at`, `updated_at`) VALUES
(1, 'César', 'Lachira Córdova', '70365818', '965088183', '073201084', 'Jose Olaya j-12 Piura', 1, 'lachiracesar@gmail.com', 'A', '$2a$08$3uWDDed3OSQm9WjQq48uW.AgVU0ugVovpx.KSUXyV5Vx.zU.utr6C', '2018-01-17 19:59:22', '2018-01-18 00:59:22'),
(2, 'Alex', 'Lachira Córdova', '77160406', '969657100', '073201084', 'Jose Olaya j-12', 2, 'alexor@gmail.com', 'A', '$2a$08$6zoUIbfMWwmiljB084HwJeBSPi9Rt3rlgifuN7UjbGNWSUjbQk5/y', '2018-01-17 20:46:55', '2018-01-18 03:38:19'),
(3, 'Fernando Alejandro', 'Regentte Medina', '49856321', '974933192', '', 'Urb.Miraflores G-10', 2, 'fregente@gmail.com', 'A', '$2a$08$I8eRaHhO7Y.nf4nWGFqujO6BDglj7jpAg3aFPNOxuhsfp1qTnQXkO', '2018-01-19 19:19:46', '2018-01-20 00:19:46'),
(5, 'Jhon', 'Ipanaque Moran', '78912930', '993011228', '', 'Sechura', 4, 'jhon@gmail.com', 'A', '$2a$08$vYFjhGIKC0zs1vpu./Huz.klgyjP0xx4hMlpAvVIKddCTxeqKNgR.', '2018-01-19 19:22:11', '2018-01-20 00:22:11'),
(6, 'Maria Rosa', 'Lopez Cárdenas', '02459418', '073301923', '', 'AA.HH. 18 de Mayo A12', 5, 'maria@gmail.com', 'A', '$2a$08$qsJOXUhzmLaP4LF5x0yrRe8jZvXuZb6uhIFvswmnhjSu0fiuYCL2O', '2018-01-19 19:23:21', '2018-01-21 18:59:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acuerdo`
--
ALTER TABLE `acuerdo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `cliente_interesado`
--
ALTER TABLE `cliente_interesado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telefono` (`telefono`);

--
-- Indices de la tabla `metodos`
--
ALTER TABLE `metodos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modulo` (`modulo`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rol` (`rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acuerdo`
--
ALTER TABLE `acuerdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cliente_interesado`
--
ALTER TABLE `cliente_interesado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `metodos`
--
ALTER TABLE `metodos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
