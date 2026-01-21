-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-01-2025 a las 18:53:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `andrei`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `nombre`) VALUES
(1, 'Acccion'),
(2, 'Aventura'),
(3, 'Carreras'),
(4, 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,      -- Hacemos que 'id' sea AUTO_INCREMENT
  `nombre` varchar(30) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `codigo_barras` varchar(20) NOT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Fecha de adición automática
  PRIMARY KEY (`id`)                           -- Definimos 'id' como clave primaria
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

-- Inserción de datos en la tabla 'juegos'
INSERT INTO juegos (id, nombre, precio, codigo_barras, genero_id, cantidad) VALUES
(1, 'The Legend of Zelda: Tears of the Kingdom', 59.99, '1234567890123', 2, 150),
(2, 'EA Sports FC 24', 69.99, '1234567890124', 1, 200),
(3, 'Hogwarts Legacy', 59.99, '1234567890125', 2, 180),
(4, 'Super Mario Bros. Wonder', 59.99, '1234567890126', 2, 170),
(5, 'Spider-Man 2 (2023)', 69.99, '1234567890127', 1, 160),
(6, 'Resident Evil 4 (2023)', 59.99, '1234567890128', 4, 140),
(7, 'F1 23', 69.99, '1234567890129', 3, 130),
(8, 'Final Fantasy XVI', 69.99, '1234567890130', 2, 120),
(9, 'Call of Duty: MW3', 69.99, '1234567890131', 1, 110),
(10, 'Assassin’s Creed Mirage', 59.99, '1234567890132', 2, 100),
(11, 'NBA 2K24', 69.99, '1234567890133', 1, 90),
(12, 'Just Dance 2024 Edition', 49.99, '1234567890134', 2, 80),
(13, 'Star Wars Jedi: Survivor', 59.99, '1234567890135', 2, 70),
(14, 'Super Mario RPG', 59.99, '1234567890136', 2, 60),
(15, 'Pikmin 4', 59.99, '1234567890137', 2, 50),
(16, 'Diablo IV', 69.99, '1234567890138', 2, 40),
(17, 'Sonic Superstars', 59.99, '1234567890139', 2, 30),
(18, 'Metroid Prime Remastered', 59.99, '1234567890140', 2, 20),
(19, 'Kirby’s Return to Dream Land Deluxe', 59.99, '1234567890141', 2, 10),
(20, 'Avatar: Frontiers of Pandora', 69.99, '1234567890142', 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `nombre_completo`, `email`, `telefono`, `password`) VALUES
(1, 'andrei', 'Andrei Munteanu', 'andrei@local.com', '602348756', '1234'),
(2, 'andru', 'Andru Popa', 'andru@local.com', '680379024', '4321'),
(3, 'JP', 'Juan Pablo', 'jp@local.com', '603479216', '5678');

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;