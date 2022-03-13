-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 13 2022 г., 14:15
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `storage_api`
--

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`file_id`, `name`, `folder_id`, `author_id`, `url`) VALUES
(9, 'omegalul9rgghj', 3, 1, 'public/uploads/Screenshot_11.png');

-- --------------------------------------------------------

--
-- Структура таблицы `filescoauthors`
--

CREATE TABLE `filescoauthors` (
  `file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `folders`
--

CREATE TABLE `folders` (
  `folder_id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `folders`
--

INSERT INTO `folders` (`folder_id`, `name`, `parent_id`, `author_id`) VALUES
(1, 'omega', 0, 1),
(2, 'omega', 0, 1),
(3, 'omegalul', 0, 1),
(4, 'omegalul9', 3, 1),
(5, 'omegalul9r622caa7b5bf6c', 3, 1),
(6, 'omegalul9rg', 3, 1),
(7, 'omegalul9rg622caa996fc86', 3, 1),
(8, 'omegalul9rgghj', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `folderscoauthors`
--

CREATE TABLE `folderscoauthors` (
  `user_id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `folderscoauthors`
--

INSERT INTO `folderscoauthors` (`user_id`, `folder_id`) VALUES
(2, 2),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `login` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `login`, `email`, `password`, `api_token`) VALUES
(1, 'Sasha', 'sasha@mail.ru', 'kekovovov', '622c9f85a5815622c9f85a5816'),
(2, 'Tanya', 'tanya@mail.ru', 'kekovovov', '622cb58ca776d622cb58ca776e'),
(3, 'Oleg', 'Kekov', '123123', '622dcc0472551622dcc0472553'),
(4, 'oleg', '123', '123123', '622dcc8334e70622dcc8334e72'),
(5, 'Enter your login', 'Enter your email', 'Enter your password', '622dcd746ee04622dcd746ee06'),
(8, 'Enter your login', '12345', 'Enter your password', '622dcd9c2b04b622dcd9c2b04d'),
(9, '12365', '2347', '34583458', '622dcdc2bbc7a622dcdc2bbc7c');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `folder_id` (`folder_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Индексы таблицы `filescoauthors`
--
ALTER TABLE `filescoauthors`
  ADD KEY `file_id` (`file_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`folder_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Индексы таблицы `folderscoauthors`
--
ALTER TABLE `folderscoauthors`
  ADD PRIMARY KEY (`user_id`,`folder_id`),
  ADD KEY `folder_id` (`folder_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `api_token` (`api_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `folders`
--
ALTER TABLE `folders`
  MODIFY `folder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`folder_id`) REFERENCES `folders` (`folder_id`),
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `filescoauthors`
--
ALTER TABLE `filescoauthors`
  ADD CONSTRAINT `filescoauthors_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`file_id`),
  ADD CONSTRAINT `filescoauthors_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `folders`
--
ALTER TABLE `folders`
  ADD CONSTRAINT `folders_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `folderscoauthors`
--
ALTER TABLE `folderscoauthors`
  ADD CONSTRAINT `folderscoauthors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `folderscoauthors_ibfk_2` FOREIGN KEY (`folder_id`) REFERENCES `folders` (`folder_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
