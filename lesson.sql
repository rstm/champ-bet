-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 14 2018 г., 02:17
-- Версия сервера: 10.1.32-MariaDB
-- Версия PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lesson`
--

-- --------------------------------------------------------

--
-- Структура таблицы `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `command1` varchar(50) NOT NULL,
  `command2` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL,
  `score1` int(11) DEFAULT NULL,
  `score2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `matches`
--

INSERT INTO `matches` (`id`, `command1`, `command2`, `datetime`, `score1`, `score2`) VALUES
(1, 'RUSSIA', 'SAUDI ARABIA', '2018-06-14 18:00:00', NULL, NULL),
(2, 'EGYPT', 'URUGUAY', '2018-06-15 15:00:00', NULL, NULL),
(3, 'PORTUGAL', 'SPAIN', '2018-06-15 18:00:00', NULL, NULL),
(4, 'MOROCCO', 'IRAN', '2018-06-15 18:00:00', NULL, NULL),
(5, 'FRANCE', 'AUSTRALIA', '2018-06-16 13:00:00', NULL, NULL),
(6, 'PERU', 'DENMARK', '2018-06-16 19:00:00', NULL, NULL),
(7, 'ARGENTINA', 'ICELAND', '2018-06-16 16:00:00', NULL, NULL),
(8, 'CROATIA', 'NIGERIA', '2018-06-16 22:00:00', NULL, NULL),
(9, 'BRAZIL', 'SWITZERLAND', '2018-06-17 21:00:00', NULL, NULL),
(10, 'COSTA RICA', 'SERBIA', '2018-06-17 15:00:00', NULL, NULL),
(11, 'GERMANY', 'MEXICO', '2018-06-17 18:00:00', NULL, NULL),
(12, 'SWEDEN', 'KOREA REPUBLIC', '2018-06-18 15:00:00', NULL, NULL),
(13, 'BELGIUM', 'PANAMA', '2018-06-18 18:00:00', NULL, NULL),
(14, 'TUNISIA', 'ENGLAND', '2018-06-18 21:00:00', NULL, NULL),
(15, 'POLAND', 'SENEGAL', '2018-06-19 18:00:00', NULL, NULL),
(16, 'COLOMBIA', 'JAPAN', '2018-06-19 15:00:00', NULL, NULL),
(17, 'RUSSIA', 'EGYPT', '2018-06-19 21:00:00', NULL, NULL),
(18, 'URUGUAY', 'SAUDI ARABIA', '2018-06-20 18:00:00', NULL, NULL),
(19, 'PORTUGAL', 'MOROCCO', '2018-06-20 15:00:00', NULL, NULL),
(20, 'IRAN', 'SPAIN', '2018-06-20 21:00:00', NULL, NULL),
(21, 'FRANCE', 'PERU', '2018-06-21 18:00:00', NULL, NULL),
(22, 'DENMARK', 'AUSTRALIA', '2018-06-21 15:00:00', NULL, NULL),
(23, 'ARGENTINA', 'CROATIA	', '2018-06-21 21:00:00', NULL, NULL),
(24, 'NIGERIA', 'ICELAND', '2018-06-22 18:00:00', NULL, NULL),
(25, 'BRAZIL', 'COSTA RICA', '2018-06-22 15:00:00', NULL, NULL),
(26, 'SERBIA', 'SWITZERLAND', '2018-06-22 21:00:00', NULL, NULL),
(27, 'GERMANY', 'SWEDEN', '2018-06-23 21:00:00', NULL, NULL),
(28, 'KOREA REPUBLIC', 'MEXICO', '2018-06-23 18:00:00', NULL, NULL),
(29, 'BELGIUM', 'TUNISIA', '2018-06-23 15:00:00', NULL, NULL),
(30, 'ENGLAND', 'PANAMA', '2018-06-24 15:00:00', NULL, NULL),
(31, 'POLAND', 'COLOMBIA', '2018-06-24 21:00:00', NULL, NULL),
(32, 'JAPAN', 'SENEGAL', '2018-06-24 18:00:00', NULL, NULL),
(33, 'URUGUAY', 'RUSSIA', '2018-06-25 17:00:00', NULL, NULL),
(34, 'SAUDI ARABIA', 'EGYPT', '2018-06-25 17:00:00', NULL, NULL),
(35, 'IRAN', 'PORTUGAL', '2018-06-25 21:00:00', NULL, NULL),
(36, 'SPAIN', 'MOROCCO', '2018-06-25 21:00:00', NULL, NULL),
(37, 'DENMARK', 'FRANCE', '2018-06-26 17:00:00', NULL, NULL),
(38, 'AUSTRALIA', 'PERU', '2018-06-26 17:00:00', NULL, NULL),
(39, 'NIGERIA', 'ARGENTINA', '2018-06-26 21:00:00', NULL, NULL),
(40, 'ICELAND', 'CROATIA', '2018-06-26 21:00:00', NULL, NULL),
(41, 'SERBIA', 'BRAZIL', '2018-06-27 21:00:00', NULL, NULL),
(42, 'SWITZERLAND', 'COSTA RICA', '2018-06-27 21:00:00', NULL, NULL),
(43, 'KOREA REPUBLIC', 'GERMANY', '2018-06-27 17:00:00', NULL, NULL),
(44, 'MEXICO', 'SWEDEN', '2018-06-27 17:00:00', NULL, NULL),
(45, 'ENGLAND', 'BELGIUM', '2018-06-28 21:00:00', NULL, NULL),
(46, 'PANAMA', 'TUNISIA', '2018-06-28 21:00:00', NULL, NULL),
(47, 'JAPAN', 'POLAND', '2018-06-28 17:00:00', NULL, NULL),
(48, 'SENEGAL', 'COLOMBIA', '2018-06-28 17:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `match_id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate1` int(11) NOT NULL,
  `rate2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `signup`
--

CREATE TABLE `signup` (
  `user_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `match_id` (`match_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `signup`
--
ALTER TABLE `signup`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rates_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `signup` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
