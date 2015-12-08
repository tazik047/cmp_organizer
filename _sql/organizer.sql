-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 26 2015 г., 01:01
-- Версия сервера: 5.5.44
-- Версия PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `organizer`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserId` int(11) NOT NULL,
  `Password` text NOT NULL,
  `Email` text NOT NULL,
  `Content_Type` text,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Структура таблицы `eventtype`
--

CREATE TABLE IF NOT EXISTS `eventtype` (
  `EventTypeId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Name` text NOT NULL,
  `Color` text NOT NULL,
  PRIMARY KEY (EventTypeId),
  FOREIGN KEY (UserId) REFERENCES user(UserId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `EventId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `EventTypeId` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `Notification` text NOT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  PRIMARY KEY (EventId),
  FOREIGN KEY (EventTypeId) REFERENCES eventtype(EventTypeId),
  FOREIGN KEY (UserId) REFERENCES user(UserId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `ProfileId` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `Surname` text NOT NULL,
  PRIMARY KEY (ProfileId),
  FOREIGN KEY (ProfileId) REFERENCES user(UserId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`UserId`, `Password`, `Email`) VALUES
(1, 'admin666', 'admin');

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `event`
--
ALTER TABLE `event`
  MODIFY `EventId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `eventtype`
--
ALTER TABLE `eventtype`
  MODIFY `EventTypeId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
