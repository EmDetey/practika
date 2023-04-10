-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 10 2023 г., 11:02
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
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `korzina`
--

CREATE TABLE `korzina` (
  `id` int(11) NOT NULL,
  `tovar_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `korzina`
--

INSERT INTO `korzina` (`id`, `tovar_id`, `user_id`, `img`, `title`, `price`) VALUES
(59, 38, 1, '/img/ggv.jpg', 'GamePad', 14999),
(60, 37, 1, '/img/BETA_TOVAR_DS4_ELECTRIC_PURPLE_1.jpg', 'GamePad', 12999),
(61, 1, 1, 'https://www.spieltimes.com/wp-content/uploads/2022/11/Sony-PlayStation-5-Pro-and-Slim-Which-one-should-I-get-4.jpg', 'Playstation', 14324),
(62, 39, 1, '/img/99893.0x500.jpg', 'XBOX', 14000),
(63, 40, 1, '/img/1_194433.jpg', 'Говно', 30000),
(64, 38, 1, '/img/ggv.jpg', 'GamePad', 14999),
(65, 39, 1, '/img/99893.0x500.jpg', 'XBOX', 14000),
(66, 38, 1, '/img/ggv.jpg', 'GamePad', 14999),
(67, 40, 1, '/img/1_194433.jpg', 'Говно', 30000);

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

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sername` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passwords` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `sername`, `login`, `email`, `passwords`) VALUES
(1, 'Alexandr', 'Nesterov', 'admin', 'kfcrjdsqqpfzw@gmail.com', 'admin777'),
(2, 'Serega', 'Safronof', 'login', 'gg@gmail.com', '123123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `korzina`
--
ALTER TABLE `korzina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tovar_id` (`tovar_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `korzina`
--
ALTER TABLE `korzina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `korzina`
--
ALTER TABLE `korzina`
  ADD CONSTRAINT `korzina_ibfk_1` FOREIGN KEY (`tovar_id`) REFERENCES `tovar` (`id`),
  ADD CONSTRAINT `korzina_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
