-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 08:26:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `disco_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `cat_title`) VALUES
(1, 'example 1'),
(2, 'example 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(10) NOT NULL,
  `product_price` float NOT NULL,
  `product_description` text NOT NULL,
  `products_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `product_title`, `product_category_id`, `product_price`, `product_description`, `products_image`) VALUES
(1, 'product 1', 1, 28, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ultrices purus et nisl tristique scelerisque. Pellentesque at diam cursus, ultrices erat nec, aliquam felis. Nunc fermentum accumsan magna, et suscipit quam pulvinar lobortis. Ut rutrum vulputate ligula, ut laoreet nulla viverra et. Nulla semper nisi velit, sed semper ex elementum at. Sed congue, ante ullamcorper egestas maximus, dolor mi condimentum purus, a consequat nulla nisl quis augue. Suspendisse nec porttitor urna. Maecenas blandit purus consequat mi eleifend gravida. Quisque posuere nisi rutrum rutrum egestas. Nullam tincidunt felis dolor, sed volutpat mi porttitor eget. Nunc fringilla, erat nec malesuada finibus, enim mauris euismod lectus, non euismod quam nunc eget quam. Aenean vel lorem lorem. ', 'https://placehold.co/300x150'),
(2, 'product 2', 1, 24, ' Vestibulum id diam metus. Aliquam malesuada luctus nisi, vitae rhoncus lorem. Curabitur consectetur, dolor quis faucibus ornare, justo neque ullamcorper velit, sit amet aliquet ex turpis quis erat. Praesent iaculis nibh at nulla dignissim finibus. Nunc sollicitudin velit ut sagittis efficitur. Etiam consectetur eros in dolor elementum lacinia vel vel mauris. Ut ultrices mi tortor, eu semper enim egestas sit amet. ', 'https://placehold.co/300x150');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'hola', 'hola@gmail.com', '1234'),
(2, 'adios', 'adios@gmail.com', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
