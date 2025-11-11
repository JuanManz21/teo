-- Base de datos: `natural_delying`
--
CREATE DATABASE IF NOT EXISTS `natural_delying` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `natural_delying`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_items`
--
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Jugo de Fresa', 5000.00, 'IMG_Jugos/jugo_fresa.jpg'),
(2, 'Jugo de Guanábana', 6000.00, 'IMG_Jugos/jugo_guanabana.jpg'),
(3, 'Jugo de Guayaba', 4500.00, 'IMG_Jugos/jugo_guayaba.jpg'),
(4, 'Jugo de Mango', 5500.00, 'IMG_Jugos/jugo_mango.jpg'),
(5, 'Jugo de Mora', 5000.00, 'IMG_Jugos/jugo_mora.jpg'),
(6, 'Soda de Corozo', 4000.00, 'IMG_Jugos/soda_corozo.jpg'),
(7, 'Soda de Limón', 3500.00, 'IMG_Jugos/soda_limon.png'),
(8, 'Soda de Naranja', 3500.00, 'IMG_Jugos/soda_naranja.jpg'),
(9, 'Soda de Uva', 4000.00, 'IMG_Jugos/soda_uva.png'),
(10, 'Arándanos Rojos', 2000.00, 'IMG_Frutos_Secos/arandanos_rojos.png'),
(11, 'Arándanos', 2500.00, 'IMG_Frutos_Secos/arandanos.png'),
(12, 'Bananos', 1000.00, 'IMG_Frutos_Secos/banano.png'),
(13, 'Kiwi', 1500.00, 'IMG_Frutos_Secos/kivi.png'),
(14, 'Mango', 2000.00, 'IMG_Frutos_Secos/mago.png'),
(15, 'Moras', 1800.00, 'IMG_Frutos_Secos/moras.png'),
(16, 'Piña', 2200.00, 'IMG_Frutos_Secos/piña.png'),
(17, 'Uvas Verdes', 2800.00, 'IMG_Frutos_Secos/uvas_verdes.png'),
(18, 'Fresas', 2000.00, 'IMG_Frutos_Secos/fresas_2.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `role`) VALUES
(1, 'admin@gmail.com', '$2y$10$3.g0fB0G.p6j.8/a5/Yy4.0nZ2.d.9Z.z9M.i7k.L6G', '2024-05-22 19:42:08', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;
