-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2024 a las 07:02:53
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
-- Base de datos: `discolandia_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buyer`
--

CREATE TABLE `buyer` (
  `order_transaction_id` varchar(255) NOT NULL,
  `buyer_name` varchar(255) NOT NULL,
  `buyer_surnames` varchar(255) NOT NULL,
  `buyer_email` varchar(255) NOT NULL,
  `buyer_phone` varchar(255) NOT NULL,
  `buyer_country` varchar(255) NOT NULL,
  `buyer_province` varchar(255) NOT NULL,
  `buyer_municipality` varchar(255) NOT NULL,
  `buyer_fulladdress` varchar(255) NOT NULL,
  `buyer_postalcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `buyer`
--

INSERT INTO `buyer` (`order_transaction_id`, `buyer_name`, `buyer_surnames`, `buyer_email`, `buyer_phone`, `buyer_country`, `buyer_province`, `buyer_municipality`, `buyer_fulladdress`, `buyer_postalcode`) VALUES
('659b579318982', 'Antonio', 'Del Moral', 'antonio@gmail.com', '678678678', 'España', 'Madrid', 'Madrid', 'Gailieo galilei 15', '3406'),
('659b59f2100cc', 'Evaristo', 'Del Real', 'evaristo@gmail.com', '678654321', 'España', 'Salamanca', 'Salamanca', 'Galileo Galilei', '4564'),
('659c2aa408dd4', 'Maria', 'De la Solera', 'mariasol@gmail.com', '6785464', 'España', 'Soria', 'Soria', 'De los montes del carbon, 17, 3ºB', '54328');

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
(4, 'Rock internacional'),
(5, 'Jazz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `merchandising`
--

CREATE TABLE `merchandising` (
  `merchand_id` int(11) NOT NULL,
  `merchand_title` varchar(100) NOT NULL,
  `merchand_category_id` int(11) NOT NULL,
  `merchand_price` float NOT NULL,
  `merchand_quantitiy` int(11) NOT NULL,
  `merchand_description` text NOT NULL,
  `merchand_short_desc` text NOT NULL,
  `merchand_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `merchandising`
--

INSERT INTO `merchandising` (`merchand_id`, `merchand_title`, `merchand_category_id`, `merchand_price`, `merchand_quantitiy`, `merchand_description`, `merchand_short_desc`, `merchand_image`) VALUES
(1000, 'Extremoduro', 3, 20, 4, 'Extremoduro fue un grupo español de rock fundado por Roberto Iniesta en la ciudad extremeña de Plasencia en 1987 que se mantuvo activo hasta su disolución en diciembre de 2019 .', 'Camiseta de extremoduro', 'Extremoduro_camiseta.jpg '),
(1001, 'Heroes del Silencio ', 3, 15, 6, 'Héroes del Silencio fue un grupo español de rock radicado en Zaragoza, formado inicialmente por Juan Valdivia y Enrique Bunbury, y completado con  Joaquín Cardiel y Pedro Andreu, a mediados de los años 80. ', 'Camiseta de Heroes del Silencio', 'HeroesSilencio_camiseta.jpg'),
(1002, 'Oreja de Van Gogh ', 1, 10, 7, 'La Oreja de Van Gogh es un grupo musical de género pop rock originario de San Sebastián, País Vasco, España. Su trayectoria en el mundo de la música comenzó formalmente en 1996.', 'Camiseta de la Oreja de Van Gogh', 'OrejaVanGogh_camiseta.jpg '),
(1003, 'Rolling Stones ', 4, 40, 8, 'The Rolling Stones, más conocido en el mundo hispano hablante como los Rolling Stones, es un grupo británico de rock originario de Londres.\r\n', 'Camiseta de los Rolling Stones', 'RollingStones_camiseta.jpg '),
(1004, 'Stevie Nicks ', 4, 20, 6, 'Stephanie Lynn \"Stevie\" Nicks es una cantante y compositora estadounidense, conocida tanto por su trabajo con Fleetwood Mac como por su extensa carrera solista. Es una de las pocas artistas de rock que ha mantenido una larga carrera en solitario formando parte al mismo tiempo de una banda exitosa.', 'Camiseta de Stevie Nicks', 'StevieNicks_camiseta.jpg '),
(1005, 'Taylor Swift ', 2, 10, 5, 'Taylor Alison Swift es una cantautora, productora, directora, actriz y empresaria estadounidense. Criada en Wyomissing, se mudó a Nashville a los 14 años para realizar una carrera de música country.', 'Camiseta de Taylor Swift', 'taylorSwift_camiseta.jpg'),
(1006, 'LP', 4, 15, 6, 'Laura Pergolizzi, conocida artísticamente como LP, es una cantautora y compositora estadounidense. Entre sus trabajos, destaca el exitoso sencillo «Lost on You».​ Ha lanzado, hasta la fecha, seis álbumes y tres EP.', 'Camiseta de LP', 'lp_camiseta.jpg'),
(1007, 'Depeche mode', 4, 30, 6, 'Depeche Mode, es una de las bandas más influyentes, queridas y de mayor venta de todos los tiempos. Ha vendido más de 100 millones de discos y ha tocado en directo para más de 30 millones de fans en todo el mundo.', 'Camisa de Depeche Mode', 'depecheMode_camiseta.jpg'),
(1009, 'Norah Jones', 5, 15, 6, 'Norah Jones, es una cantante, compositora, pianista y actriz estadounidense. Una voz joven y sugerente, plena de cálida sensualidad, cantando casi como si desvelara algún íntimo secreto. ', 'Camiseta Norah Jones.', 'camiseta_norahJones.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `order_transaction_id` varchar(255) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`order_transaction_id`, `order_quantity`, `order_amount`, `order_status`) VALUES
('659b579318982', 6, 91.97, 'pending send'),
('659b59f2100cc', 4, 97.98, 'pending send');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
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
(1, 'Hackney Diamonds Digipack', 4, 20.99, 20, 'Hackney Diamonds es el esperadísimo primer álbum de estudio de material nuevo de The Rolling Stones, desde A Bigger Bang de 2005; álbum que, casualmente, se publicaba el mismo día del anuncio de éste - 6 de septiembre - hace 18 años.', 'The Rolling Stones', 'disco_rollingStone.jpg'),
(2, 'Iros todos a tomar por culo', 3, 27.99, 15, 'El primer álbum en directo de la banda de rock española se lanza en formato 2 LP vinilo en color negro. El álbum fue originalmente publicado por DRO el 21 de abril de 1997. ', 'Extremoduro', 'disco_extremoduro.jpg'),
(3, 'Héroe de leyenda ', 3, 21.99, 20, 'Producido por Gustavo Montesano y con arreglos de la propia banda, este fue el primer trabajo que publicaron con EMI. La acogida por parte de sus fans superó todas las expectativas, vendiendo más de 30.000 copias en su primera edición. ', 'Héroes del silencio', 'disco_heroesSilencio.jpg'),
(4, 'A las cinco en el Astoria ', 1, 14.99, 10, 'A las cinco en el Astoria es el quinto álbum de La Oreja de Van Gogh. Este disco, ahora reeditado en una cuidada edición vinilo, fue el primero de la nueva etapa de la banda española con la vocalista Leire Martínez.', 'La oreja de Van Gogh', 'disco_orejaVanGogh.jpg'),
(5, 'Live In Concert The 24 Karat Gold Tour ', 4, 17.99, 9, 'Disco en directo de Stevie Nicks, la cantante de Fleetwood Mac. Contiene 17 canciones, entre ellas los hits \'Stand Back\', \'Rhiannon\', \'Landslide\', \'Gypsy\' y \'Edge of Seventeen\' . Este disco es la banda sonora de la película concierto del mismo título que  se estrenó en España el 21 de octubre.', 'Stevie Nicks ', 'disco_stevieNicks.jpg\r\n'),
(6, 'Midnights: Mahogany Edition', 2, 22.99, 11, 'Taylor Swift pública el 21/10 su nuevo álbum, \"Midnights\". Disponibles varias versiones y formatos: Todos con  13 canciones escritas en mitad de la noche: Las historias de 13 noches sin dormir.', 'Taylor Swift ', 'disco_taylorSwift.jpg'),
(7, 'LP - 2Vinilo Lost On You (Opaque Gold)', 4, 30.99, 8, 'El álbum \"Lost On You\" de LP se lanza en formato 2 LP vinilo en color dorado. El álbum fue publicado originalmente en 2016 y es un viaje conmovedor a través de las complejidades del amor y la nostalgia. Muestra la voz distintiva y emotiva de la artista en un contexto de influencias folk, rock y pop. ', 'LP', 'disco_lp.png'),
(8, ' Memento Mori ', 4, 17.99, 6, 'Memento Mori es así un álbum de transformación, construido con Andy en vida y que tristemente se ha llenado de un significado muy especial con el fallecimiento de este. Es el décimo quinto álbum del grupo inglés.', 'Depeche Mode', 'dicos_depecheMode.jpg'),
(9, 'Kind Of Blue ', 5, 18.99, 7, 'En agosto de 1959 se publicó el álbum titulado Kind of Blue, editado por Columbia Records. El trompetista Miles Davis dirigió a un elenco de los mejores músicos de jazz de su tiempo: John Coltrane, Bill Evans, Cannonball Adderley, Paul Chambers y Jimmy Cobb (además de Wynton Kelly, pianista en una de las pistas). ', 'Miles Davis', 'disco_Miles Davis.jpg'),
(10, 'Live At Ronnie Scotts ', 5, 17.99, 8, 'Ganadora de múltiples premios Grammy, Norah Jones ofrece un concierto en vivo agotado en el mundialmente famoso Ronnie Scott\'s Jazz Club de Londres.', 'Norah Jones', 'disco_Nora_Jones.jpg');

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
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `merchandising`
--
ALTER TABLE `merchandising`
  ADD PRIMARY KEY (`merchand_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `merchandising`
--
ALTER TABLE `merchandising`
  MODIFY `merchand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
