-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 10 2023 г., 10:13
-- Версия сервера: 5.7.39
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `truegames`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE `tovar` (
  `id` int(11) NOT NULL,
  `title` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `img` text COLLATE utf8mb4_unicode_ci,
  `category` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`id`, `title`, `price`, `img`, `category`) VALUES
(1, 'Playstation', 14324, 'https://www.spieltimes.com/wp-content/uploads/2022/11/Sony-PlayStation-5-Pro-and-Slim-Which-one-should-I-get-4.jpg', 'приставки'),
(37, 'GamePad Purple', 12999, '/img/BETA_TOVAR_DS4_ELECTRIC_PURPLE_1.jpg', '0'),
(38, 'GamePad Hukki', 14999, '/img/ggv.jpg', '0'),
(39, 'XBOX 360', 14000, '/img/99893.0x500.jpg', '0'),
(40, 'бяка', 300, '/img/1_194433.jpg', '0');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
