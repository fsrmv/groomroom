-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 20 2021 г., 12:42
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `grumroom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cats`
--

CREATE TABLE `cats` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(550) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cats`
--

INSERT INTO `cats` (`c_id`, `c_name`) VALUES
(1, 'Стрижка'),
(2, 'Мытье'),
(3, 'Педикюр');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `o_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `o_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_cat` int(11) NOT NULL,
  `o_status` enum('Новая','Обработка данных','Услуга оказана') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Новая',
  `o_img1` varchar(550) COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_img2` varchar(550) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_user` int(11) NOT NULL,
  `o_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`o_id`, `o_timestamp`, `o_name`, `o_desc`, `o_cat`, `o_status`, `o_img1`, `o_img2`, `o_user`, `o_comment`) VALUES
(1, '2021-10-01 08:23:48', 'Пупи', 'Пупи нужно помыть жопу', 2, 'Услуга оказана', '3.jpg', NULL, 1, NULL),
(3, '2021-10-20 09:15:37', 'Локи', 'Локи нужно помыть жепу и дать успокоительное а то он бешенный', 1, 'Новая', '399a24373a892146d4a8f3ddacbf5733.jpg', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_fio` varchar(550) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_login` varchar(550) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_email` varchar(550) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_pass` varchar(550) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`u_id`, `u_fio`, `u_login`, `u_email`, `u_pass`, `u_is_admin`) VALUES
(1, 'Админов Админ Админович', 'admin', 'admin@mail.ru', 'a8b3fcda42f979d5a85f6f99064fb9b3', 1),
(2, 'Тест Тестович', 'test', 'test@test.ru', '098f6bcd4621d373cade4e832627b4f6', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`c_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `o_cat` (`o_cat`),
  ADD KEY `o_user` (`o_user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_login` (`u_login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cats`
--
ALTER TABLE `cats`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`o_user`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`o_cat`) REFERENCES `cats` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
