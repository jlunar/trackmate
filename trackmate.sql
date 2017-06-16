-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2017 a las 09:22:56
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trackmate`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `musica`
--

CREATE TABLE `musica` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creado` datetime NOT NULL,
  `autor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `musica`
--

INSERT INTO `musica` (`id`, `filename`, `creado`, `autor`, `genero`, `url`) VALUES
(57, 'Angel Heredia - Gringo (Original Mix).mp3', '2017-05-18 10:49:04', 'angel heredia', 'Tech house', 'upload/Angel Heredia - Gringo (Original Mix).mp3mp3'),
(58, 'Jacky UK Amelia Sear - Sensation feat. Amelia Sear Original Mix DFTD-www.groovytunes.org.mp3', '2017-05-18 10:51:45', 'jacky uk', 'Tech house', 'upload/Jacky UK Amelia Sear - Sensation feat. Amelia Sear Original Mix DFTD-www.groovytunes.org.mp3mp3'),
(59, 'Eddy M - Anabel Shosho Remix 303Lovers-www.groovytunes.org.mp3', '2017-05-18 12:46:26', 'eddy m', 'Tech house', 'upload/Eddy M - Anabel Shosho Remix 303Lovers-www.groovytunes.org.mp3mp3'),
(60, 'MANT - Ra (Original Mix) [ClapCrate.net].mp3', '2017-05-19 13:16:24', 'ra', 'Tech house', 'upload/MANT - Ra (Original Mix) [ClapCrate.net].mp3mp3'),
(61, 'Doctor Dru - Corner Ball (Original Mix) [mp320k.com].mp3', '2017-05-20 00:37:43', 'Doctor Dru', 'Tech house', 'upload/Doctor Dru - Corner Ball (Original Mix) [mp320k.com].mp3mp3'),
(62, 'Alex Bau - Press Mark Broom Repaint-www.groovytunes.org.mp3', '2017-05-24 11:37:45', 'Alex Bau', 'Techno', 'upload/Alex Bau - Press Mark Broom Repaint-www.groovytunes.org.mp3mp3'),
(63, 'Frank Savio Doryan Hell - Inside Original Mix Gate Null Recordings-www.groovytunes.org.mp3', '2017-05-24 11:38:06', 'Frank Sabio', 'Techno', 'upload/Frank Savio Doryan Hell - Inside Original Mix Gate Null Recordings-www.groovytunes.org.mp3mp3'),
(64, 'Joseph Capriati - Awake (Julian Jeweil Remix) [ClapCrate.com].mp3', '2017-05-24 12:07:34', 'Josep Capriati', 'Techno', 'upload/Joseph Capriati - Awake (Julian Jeweil Remix) [ClapCrate.com].mp3mp3'),
(65, 'Lander B-Morgue (Original Stick) www.myfreemp3.click .mp3', '2017-05-24 12:21:59', 'Lander B', 'Techno', 'upload/Lander B-Morgue (Original Stick) www.myfreemp3.click .mp3mp3'),
(66, 'Peppelino-Acidelic (Martin Lacroix Remix) www.myfreemp3.click .mp3', '2017-05-24 12:26:12', 'pepelino', 'Techno', 'upload/Peppelino-Acidelic (Martin Lacroix Remix) www.myfreemp3.click .mp3mp3'),
(67, 'Cleric - Unspoken Rules Original Mix Clergy-www.groovytunes.org.mp3', '2017-05-24 12:34:37', 'Cleric', 'Techno', 'upload/Cleric - Unspoken Rules Original Mix Clergy-www.groovytunes.org.mp3mp3'),
(68, 'Butch Dope Original Mix (mp3top100.net).mp3', '2017-05-29 18:47:43', 'Butch Dope', 'Deep House', 'upload/Butch Dope Original Mix (mp3top100.net).mp3mp3'),
(69, 'Fold Wallop Original Mix (mp3top100.net).mp3', '2017-05-29 18:47:54', 'fold', 'Deep House', 'upload/Fold Wallop Original Mix (mp3top100.net).mp3mp3'),
(70, 'Low Steppa The Joint Original Mix (mp3top100.net).mp3', '2017-05-29 18:48:04', 'Low', 'Deep House', 'upload/Low Steppa The Joint Original Mix (mp3top100.net).mp3mp3'),
(71, 'Kinky Movement Dont Hold Back Original mix Graal Radio (mp3top100.net).mp3', '2017-05-29 18:48:17', 'Kinky', 'Deep House', 'upload/Kinky Movement Dont Hold Back Original mix Graal Radio (mp3top100.net).mp3mp3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `clave`, `email`) VALUES
('', '', ''),
('antonio', 'moreno', 'pepe@pepe.es'),
('antonio1', '1', '1@1.com'),
('esther', '1234', 'esther'),
('esther2', '1', '1'),
('jesus', '1234', 'jesus@jesus.com'),
('jesusito', 'maria', 'mariabi'),
('jose', 'jose', 'jose@jose.com'),
('mama', 'mama', 'mama'),
('mamamamama', 'mamamama', 'mamamama'),
('mariana', '123', 'mariana@mariana.com'),
('mia', 'mia', 'mia'),
('mierde', 'sdfsdf', 'sdfsdf'),
('mio', 'mio', 'mio'),
('pedri', 'pedri', 'pedri'),
('pedrito', 'borrame', 'pedritoborrame@gmail.com'),
('pedro', '1234', 'pedro@pedro.es'),
('pepito', '', 'pepito@pepin.es'),
('prueba', '', 'prueba@borrame.es'),
('prueba2', 'prueba2', 'prueba@borrame.es'),
('tiaabuela', '1', '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `musica`
--
ALTER TABLE `musica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `musica`
--
ALTER TABLE `musica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
