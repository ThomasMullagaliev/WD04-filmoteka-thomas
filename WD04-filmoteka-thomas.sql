-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 01 2018 г., 12:59
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `WD04-filmoteka-thomas`
--

-- --------------------------------------------------------

--
-- Структура таблицы `filmoteka`
--

CREATE TABLE `filmoteka` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `genre` varchar(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `filmoteka`
--

INSERT INTO `filmoteka` (`id`, `name`, `genre`, `year`) VALUES
(3, 'Такси1', 'боевик', 2014),
(4, 'Такси 2', 'боевик', 2015),
(6, 'Такси 5', 'боевик', 2015);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `filmoteka`
--
ALTER TABLE `filmoteka`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `filmoteka`
--
ALTER TABLE `filmoteka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
