-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2025 a las 08:24:04
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cotizacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cli_clientes`
--

CREATE TABLE `cli_clientes` (
  `id_cliente` int(11) NOT NULL,
  `cli_nombre` varchar(258) NOT NULL,
  `cli_apellido` varchar(255) NOT NULL,
  `cli_correo` varchar(150) NOT NULL,
  `cli_contacto` varchar(15) DEFAULT NULL,
  `cli_direccion` text DEFAULT NULL,
  `cli_empresa` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cli_clientes`
--

INSERT INTO `cli_clientes` (`id_cliente`, `cli_nombre`, `cli_apellido`, `cli_correo`, `cli_contacto`, `cli_direccion`, `cli_empresa`, `created_at`, `updated_at`) VALUES
(21, 'Juan', 'Pérez', 'juan.perez@example.com', '1234567890', 'Calle 1, Ciudad A', 'Empresa A', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(22, 'María', 'Gómez', 'maria.gomez@example.com', '0987654321', 'Calle 2, Ciudad B', 'Empresa B', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(23, 'Carlos', 'López', 'carlos.lopez@example.com', '1122334455', 'Calle 3, Ciudad C', 'Empresa C', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(24, 'Ana', 'Martínez', 'ana.martinez@example.com', '2233445566', 'Calle 4, Ciudad D', 'Empresa D', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(25, 'Luis', 'Hernández', 'luis.hernandez@example.com', '3344556677', 'Calle 5, Ciudad E', 'Empresa E', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(26, 'Sofía', 'Ramírez', 'sofia.ramirez@example.com', '4455667788', 'Calle 6, Ciudad F', 'Empresa F', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(27, 'Miguel', 'Torres', 'miguel.torres@example.com', '5566778899', 'Calle 7, Ciudad G', 'Empresa G', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(28, 'Laura', 'Vargas', 'laura.vargas@example.com', '6677889900', 'Calle 8, Ciudad H', 'Empresa H', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(29, 'Jorge', 'Castro', 'jorge.castro@example.com', '7788990011', 'Calle 9, Ciudad I', 'Empresa I', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(30, 'Elena', 'Morales', 'elena.morales@example.com', '8899001122', 'Calle 10, Ciudad J', 'Empresa J', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(31, 'Pedro', 'Rojas', 'pedro.rojas@example.com', '9900112233', 'Calle 11, Ciudad K', 'Empresa K', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(32, 'Lucía', 'Díaz', 'lucia.diaz@example.com', '1011121314', 'Calle 12, Ciudad L', 'Empresa L', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(33, 'Andrés', 'Ortiz', 'andres.ortiz@example.com', '1213141516', 'Calle 13, Ciudad M', 'Empresa M', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(34, 'Valeria', 'Suárez', 'valeria.suarez@example.com', '1314151617', 'Calle 14, Ciudad N', 'Empresa N', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(35, 'Ricardo', 'Mendoza', 'ricardo.mendoza@example.com', '1415161718', 'Calle 15, Ciudad O', 'Empresa O', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(36, 'Gabriela', 'Cruz', 'gabriela.cruz@example.com', '1516171819', 'Calle 16, Ciudad P', 'Empresa P', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(37, 'Fernando', 'Reyes', 'fernando.reyes@example.com', '1617181920', 'Calle 17, Ciudad Q', 'Empresa Q', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(38, 'Isabel', 'Flores', 'isabel.flores@example.com', '1718192021', 'Calle 18, Ciudad R', 'Empresa R', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(39, 'Diego', 'Silva', 'diego.silva@example.com', '1819202122', 'Calle 19, Ciudad S', 'Empresa S', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(40, 'Camila', 'Navarro', 'camila.navarro@example.com', '1920212223', 'Calle 20, Ciudad T', 'Empresa T', '2025-04-02 05:35:15', '2025-04-02 05:35:15'),
(41, 'Andres', 'Ortega', 'andres@gmail.com', '0997790472', 'San Carlos', 'Digital World', '2025-04-02 06:10:49', '2025-04-02 06:10:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `em_nombre` varchar(100) NOT NULL,
  `em_fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `em_nombre`, `em_fecha`) VALUES
(1, 'Startup o Emprendimiento', '2025-03-25 18:54:57'),
(2, 'Pequeña o Mediana Empresa (PYME)', '2025-03-25 18:54:57'),
(3, 'Empresa grande', '2025-03-25 18:55:11'),
(4, 'Multinacional', '2025-03-25 18:55:11'),
(5, 'SAS', '2025-04-02 03:21:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `ser_nombre` varchar(100) NOT NULL,
  `ser_fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `ser_nombre`, `ser_fecha`) VALUES
(1, 'Consultoría Integral / Consultoría 360 y Formación Integral PDP', '2025-03-25 17:35:27'),
(2, 'Delegado de Protección de Datos Personales (DPO)', '2025-03-25 17:35:27'),
(3, 'Fee mensual PDP', '2025-03-25 17:35:41'),
(4, 'Auditoría Corporativa PDP', '2025-03-25 17:35:41'),
(5, 'Entrenamiento práctico PDP', '2025-03-25 17:35:53'),
(6, 'Formación Avanzada In-Company PDP', '2025-03-25 17:35:53'),
(7, 'Mini Empresas', '2025-04-02 03:22:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `use_usuario` varchar(55) NOT NULL,
  `use_password` varchar(255) NOT NULL,
  `use_nombre` varchar(120) NOT NULL,
  `use_apellido` varchar(120) NOT NULL,
  `use_rol` int(11) DEFAULT NULL,
  `use_contacto` varchar(20) DEFAULT NULL,
  `use_correo` varchar(100) NOT NULL,
  `use_fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `usu_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `use_usuario`, `use_password`, `use_nombre`, `use_apellido`, `use_rol`, `use_contacto`, `use_correo`, `use_fecha`, `usu_estado`) VALUES
(1, 'andres', 'andres123', 'Andrés', 'Ortega', 1, '0997790472', 'andresortegapindo@gmail.com', '2025-03-25 17:27:16', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cli_clientes`
--
ALTER TABLE `cli_clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cli_correo` (`cli_correo`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `use_usuario` (`use_usuario`),
  ADD UNIQUE KEY `use_correo` (`use_correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cli_clientes`
--
ALTER TABLE `cli_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
