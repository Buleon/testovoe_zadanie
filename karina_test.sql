-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 23 2019 г., 12:33
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `karina_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `business_step`
--

CREATE TABLE IF NOT EXISTS `business_step` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `business_step`
--

INSERT INTO `business_step` (`id`, `name`) VALUES
(1, 'Получение согласия клиента'),
(2, 'Согласование службой безопасности'),
(3, 'Оформление документов'),
(4, 'Подпись документов клиентом'),
(5, 'Регистрация данных в системе');

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `fio`) VALUES
(1, 'Иванов Петр Сидорович'),
(2, 'Петров Иван Александрович'),
(3, 'Николаев Олег Евгеньевич'),
(4, 'Кондратьев Александр Петрович'),
(5, 'Борисов Илья Геннадьевич'),
(6, 'Маслов Георгий Анатольевич');

-- --------------------------------------------------------

--
-- Структура таблицы `list_status_process`
--

CREATE TABLE IF NOT EXISTS `list_status_process` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `id_steps` int(11) NOT NULL,
  `id_result` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `list_status_process`
--

INSERT INTO `list_status_process` (`id`, `id_client`, `id_steps`, `id_result`, `date`) VALUES
(10, 1, 1, NULL, '2019-10-22 16:11:45'),
(11, 1, 1, NULL, '2019-10-22 16:11:59'),
(12, 1, 1, NULL, '2019-10-22 16:13:44'),
(13, 1, 1, 2, '2019-10-22 16:14:33'),
(14, 2, 3, NULL, '2019-10-22 16:15:51'),
(15, 0, 0, NULL, '2019-10-22 22:45:40'),
(16, 0, 0, NULL, '2019-10-22 22:45:43');

-- --------------------------------------------------------

--
-- Структура таблицы `result_steps`
--

CREATE TABLE IF NOT EXISTS `result_steps` (
  `id_result_steps` int(11) NOT NULL AUTO_INCREMENT,
  `id_business_step` int(11) NOT NULL,
  `name_result_step` varchar(64) COLLATE utf8mb4_bin NOT NULL,
  `break` tinyint(1) DEFAULT NULL,
  `transfer` int(11) NOT NULL,
  PRIMARY KEY (`id_result_steps`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `result_steps`
--

INSERT INTO `result_steps` (`id_result_steps`, `id_business_step`, `name_result_step`, `break`, `transfer`) VALUES
(1, 1, 'Согласие получено', 0, 2),
(2, 1, 'Отказ', 1, 0),
(3, 2, 'Согласовано', 0, 3),
(4, 2, 'Не согласовано', 1, 0),
(5, 3, 'Документы оформлены', 0, 4),
(6, 3, 'На доработку в службу безопасности', 0, 2),
(7, 4, 'Документы подписаны', 0, 5),
(8, 4, 'Отказ клиента', 1, 0),
(9, 5, 'Данные внесены', 1, 0),
(10, 5, 'Ошибка в документах', 0, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
