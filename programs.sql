-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 21 2016 г., 22:18
-- Версия сервера: 10.0.22-MariaDB-log
-- Версия PHP: 5.5.31-pl0-gentoo

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ox2445`
--

-- --------------------------------------------------------

--
-- Структура таблицы `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(11) NOT NULL COMMENT 'ID программы',
  `name` varchar(50) NOT NULL COMMENT 'Название программы',
  `description` varchar(255) NOT NULL COMMENT 'Описание',
  `sdesc` varchar(60) NOT NULL COMMENT 'Короткое описание',
  `author` varchar(30) NOT NULL COMMENT 'Автор',
  `version` varchar(15) NOT NULL COMMENT 'Версия',
  `category` varchar(11) NOT NULL COMMENT 'Категория',
  `pastebin_url` varchar(200) NOT NULL COMMENT 'Pastebin',
  `git_url` varchar(255) DEFAULT NULL,
  `forum_url` varchar(200) NOT NULL COMMENT 'Форум',
  `rating` int(11) NOT NULL DEFAULT '0' COMMENT 'Рейтинг',
  `downloads` int(11) NOT NULL DEFAULT '0',
  `tags` varchar(255) DEFAULT NULL COMMENT 'Теги',
  `deps` varchar(255) DEFAULT NULL COMMENT 'Зависимости',
  `time` date NOT NULL COMMENT 'Время публикации'
) ENGINE=Aria DEFAULT CHARSET=utf8 PAGE_CHECKSUM=1;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID программы';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
