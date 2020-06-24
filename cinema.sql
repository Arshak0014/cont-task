-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 25 2020 г., 00:05
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cinema`
--

-- --------------------------------------------------------

--
-- Структура таблицы `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `present_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `show_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `booking`
--

INSERT INTO `booking` (`id`, `cinema_id`, `present_id`, `place_id`, `show_date`) VALUES
(1, 5, 18, 18, '2020-06-16'),
(248, 5, 18, 9, '2020-06-16'),
(249, 3, 3, 6, '2020-06-17'),
(250, 5, 9, 1, '2020-06-16'),
(251, 3, 4, 14, '2020-06-16'),
(252, 6, 6, 12, '2020-06-17'),
(253, 4, 2, 17, '2020-06-16'),
(254, 4, 19, 21, '2020-06-16'),
(255, 4, 5, 17, '2020-06-16'),
(256, 4, 19, 22, '2020-06-16'),
(257, 4, 5, 19, '2020-06-16'),
(258, 4, 5, 18, '2020-06-16'),
(259, 6, 10, 22, '2020-06-17'),
(260, 6, 8, 17, '2020-06-16'),
(261, 6, 20, 60, '2020-06-16'),
(262, 3, 3, 5, '2020-06-17'),
(263, 3, 3, 7, '2020-06-17'),
(264, 4, 5, 20, '2020-06-16'),
(265, 3, 4, 15, '2020-06-16'),
(266, 3, 4, 16, '2020-06-16'),
(267, 3, 4, 17, '2020-06-16'),
(268, 3, 16, 6, '2020-06-17'),
(269, 3, 16, 8, '2020-06-17'),
(270, 3, 4, 7, '2020-06-16'),
(271, 3, 4, 6, '2020-06-16'),
(272, 3, 3, 8, '2020-06-17'),
(273, 3, 16, 19, '2020-06-17');

-- --------------------------------------------------------

--
-- Структура таблицы `cinemas`
--

CREATE TABLE `cinemas` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `places` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cinemas`
--

INSERT INTO `cinemas` (`id`, `name`, `slug`, `description`, `city`, `image`, `address`, `places`) VALUES
(3, 'Prince Charles Cinema', 'prince-charles-cinema', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 'London', '1920.jpg', '7 Leicester Pl, West End, London WC2H 7BY, United Kingdom', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36'),
(4, 'Le Brady', 'le-brady', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 'Paris', 'def452d8be5295356a0e1a9acdec31ea.jpg', '39 Boulevard de Strasbourg, 75010 Paris, France', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48'),
(5, 'UGC Cine Cite les Halles', 'ugc-cine-cite-les-halles', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 'Paris', 'SP-3773-CinemaParis-Inn.jpg', '101 Rue Berger, 75001 Paris, France', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36'),
(6, 'Rome Cinemas 8', 'rome-cinemas-8', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 'Rome', 'rome-theaters-770x578.jpg', 'Rome St 548', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60');

-- --------------------------------------------------------

--
-- Структура таблицы `presents`
--

CREATE TABLE `presents` (
  `id` int(11) NOT NULL,
  `cinemas_id` int(11) NOT NULL,
  `film_name` varchar(100) NOT NULL,
  `film_year` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `show_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `presents`
--

INSERT INTO `presents` (`id`, `cinemas_id`, `film_name`, `film_year`, `image`, `show_date`) VALUES
(1, 5, 'The King of Staten Island', '2020', 'joker.jpg', '2020-06-15'),
(2, 4, 'Artemis Fowl', '2020', 'once-upon.jpg', '2020-06-16'),
(3, 3, 'Little Women', '2019', 'wonder.jpg', '2020-06-17'),
(4, 3, 'Uncut Gems', '2020', 'joker.jpg', '2020-06-16'),
(5, 4, 'Joker 2019', '2019', 'joker.jpg', '2020-06-16'),
(6, 6, 'Wonder Woman 1984', '2020', '58585.jpg', '2020-06-17'),
(7, 3, 'Booksmart', '2020', 'wonder.jpg', '2020-06-18'),
(8, 6, 'Portrait of a Lady on Fire', '2020', 'once-upon.jpg', '2020-06-16'),
(9, 5, 'Once Upon a Time in Hollywood', '2020', 'joker.jpg', '2020-06-16'),
(10, 6, 'Once Upon a Time in Hollywood', '2020', 'once-upon.jpg', '2020-06-17'),
(11, 3, 'Booksmart', '2020', 'wonder.jpg', '2020-06-18'),
(12, 4, 'Little Women', '2019', 'joker.jpg', '2020-06-17'),
(13, 6, 'Artemis Fowl', '2020', 'once-upon.jpg', '2020-06-16'),
(14, 4, 'Once Upon a Time in Hollywood', '2020', 'joker.jpg', '2020-06-18'),
(15, 3, 'Artemis Fowl', '2020', 'once-upon.jpg', '2020-06-19'),
(16, 3, 'Artemis Fowl', '2020', 'once-upon.jpg', '2020-06-17'),
(17, 5, 'Portrait of a Lady on Fire', '2020', 'once-upon.jpg', '2020-06-18'),
(18, 5, 'Artemis Fowl', '2020', 'once-upon.jpg', '2020-06-16'),
(19, 4, 'Artemis Fowl', '2020', 'wonder.jpg', '2020-06-16'),
(20, 6, 'Artemis Fowl', '2020', 'joker.jpg', '2020-06-16'),
(21, 4, 'Titanic', '1996', 'joker.jpg', '2020-06-22');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cinema_id` (`cinema_id`),
  ADD KEY `present_id` (`present_id`);

--
-- Индексы таблицы `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `presents`
--
ALTER TABLE `presents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cinemas_id` (`cinemas_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT для таблицы `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `presents`
--
ALTER TABLE `presents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`present_id`) REFERENCES `presents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`cinema_id`) REFERENCES `cinemas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cinemas`
--
ALTER TABLE `cinemas`
  ADD CONSTRAINT `cinemas_ibfk_1` FOREIGN KEY (`id`) REFERENCES `presents` (`cinemas_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
