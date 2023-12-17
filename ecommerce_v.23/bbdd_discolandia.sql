-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2023 a las 09:56:55
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
-- Base de datos: `bbdd_discolandia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Pop nacional'),
(2, 'Pop internacional'),
(3, 'Rock nacional'),
(4, 'Rock internacional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `short_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `short_desc`, `product_image`) VALUES
(1, 'Hackney Diamonds Digipack', 4, 20.99, 21, 'Hackney Diamonds\' es el esperadísimo primer álbum de estudio de material nuevo de The Rolling Stones, desde \'A Bigger Bang\' de 2005; álbum que, casualmente, se publicaba el mismo día del anuncio de éste - 6 de septiembre - hace 18 años.', 'Intérprete The Rolling Stones \r\n', 'disco_rollingStone.jpg'),
(2, 'Iros todos a tomar por culo', 3, 27.99, 15, 'El primer álbum en directo \'\'IROS TODOS A TOMAR POR CULO\'\' de la banda de rock española EXTREMODURO se lanza en formato 2 LP vinilo en color negro. El álbum fue originalmente publicado por DRO el 21 de abril de 1997. De la gira que realizaron conjuntamente con la banda Platero y Tú, se grabó el audio de varias actuaciones que serían publicadas en su primer disco en directo, nuevamente producido por Iñaki \"Uoho\" Antón.', 'Intérprete Extremoduro', 'disco_extremoduro.jpg'),
(3, 'Héroe de leyenda ', 3, 21.99, 20, 'Reedición en formato vinilo + CD de \'Héroe de Leyenda\', el mini-Lp con el que debutaron discográficamente Héroes del Silencio en 1987. \r\n\r\nProducido por Gustavo Montesano y con arreglos de la propia banda, este fue el primer trabajo que publicaron con EMI. La acogida por parte de sus fans superó todas las expectativas, vendiendo más de 30.000 copias en su primera edición. Este hecho motivó que la discográfica lanzara una segunda tirada con una portada diferente y consolidara su compromiso para trabajar en lo que sería su primer álbum \'El mar no cesa\', que vio la luz al año siguiente.\'', 'Interprete Héroes del silencio', 'disco_heroesSilencio.jpg'),
(4, 'A las cinco en el Astoria ', 1, 14.99, 30, 'A las cinco en el Astoria es el quinto álbum de La Oreja de Van Gogh, uno de los grupos más influyentes del pop en español de la década de los 2000 y hoy convertidos en un auténtico mito de la música en nuestro país y en toda Latinoamérica, donde siguen siendo un fenómeno de masas.  Este disco, ahora reeditado en una cuidada edición vinilo, fue el primero de la nueva etapa de la banda española con la vocalista Leire Martínez, y recoge canciones tan laureadas como \"El Último Vals\", \"Inmortal\" o la imborrable \"Jueves\", temas todos ellos que siguen cautivando a los fans de siempre y a las nuevas generaciones.  Se trata de uno de los álbumes más vendidos del 2008, superando con creces el doble platino y permaneciendo más de 29 semanas en el top 10 de ventas. Además, le valió al grupo donostiarra una nueva nominación a los Latin Grammy.', 'Interprete La oreja de Van Gogh', 'disco_orejaVanGogh.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reports`
--

CREATE TABLE `reports` (
  `report_id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'hola', 'hola@miempresa.com\r\n', '1234'),
(2, 'caracola', 'caracola@miempresa.com', '5678');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indices de la tabla `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
