-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2025 a las 20:00
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `natural_delying`
--
CREATE DATABASE IF NOT EXISTS `natural_delying` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `natural_delying`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

-- Contraseña para admin es 'admin'
INSERT INTO `users` (`id`, `username`, `password`, `is_admin`) VALUES
(1, 'admin', '$2y$10$IF83.nS1/n29v0Pz0Y.fl.dFkQRtYgK.Csl95SFNpt9aQ6G65Ea32', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`name`, `price`, `image`, `category`) VALUES
('Jugo de Fresa', 5000.00, 'IMG_Jugos/jugo_fresa.jpg', 'jugo'),
('Jugo de Guanábana', 5000.00, 'IMG_Jugos/jugo_guanabana.jpg', 'jugo'),
('Jugo de Guayaba', 5000.00, 'IMG_Jugos/jugo_guayaba.jpg', 'jugo'),
('Jugo de Mango', 5000.00, 'IMG_Jugos/jugo_mango.jpg', 'jugo'),
('Jugo de Mora', 5000.00, 'IMG_Jugos/jugo_mora.jpg', 'jugo'),
('Soda de Corozo', 6000.00, 'IMG_Jugos/soda_corozo.jpg', 'jugo'),
('Soda de Limón', 6000.00, 'IMG_Jugos/soda_limon.png', 'jugo'),
('Soda de Naranja', 6000.00, 'IMG_Jugos/soda_naranja.jpg', 'jugo'),
('Soda de Uva', 6000.00, 'IMG_Jugos/soda_uva.png', 'jugo'),
('Almendras', 10000.00, 'IMG_Frutos_Secos/almendras.jpg', 'fruto-seco'),
('Nueces', 12000.00, 'IMG_Frutos_Secos/nueces.jpg', 'fruto-seco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `products` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;
