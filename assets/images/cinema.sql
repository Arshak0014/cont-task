-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 16 2020 г., 01:16
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
-- Структура таблицы `cinemas`
--

CREATE TABLE `cinemas` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cinemas`
--

INSERT INTO `cinemas` (`id`, `name`, `slug`, `description`, `city`, `image`, `address`) VALUES
(3, 'Prince Charles Cinema', 'prince-charles-cinema', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 'London', '1920.jpg', '7 Leicester Pl, West End, London WC2H 7BY, United Kingdom'),
(4, 'Le Brady', 'le-brady', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 'Paris', 'def452d8be5295356a0e1a9acdec31ea.jpg', '39 Boulevard de Strasbourg, 75010 Paris, France'),
(5, 'UGC Cine Cite les Halles', 'ugc-cine-cite-les-halles', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 'Paris', 'SP-3773-CinemaParis-Inn.jpg', '101 Rue Berger, 75001 Paris, France'),
(6, 'Rome Cinemas 8', 'rome-cinemas-8', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 'Rome', 'rome-theaters-770x578.jpg', 'Rome St 548');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(20, 6, 'Artemis Fowl', '2020', 'joker.jpg', '2020-06-16');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT для таблицы `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `presents`
--
ALTER TABLE `presents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cinemas`
--
ALTER TABLE `cinemas`
  ADD CONSTRAINT `cinemas_ibfk_1` FOREIGN KEY (`id`) REFERENCES `presents` (`cinemas_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
