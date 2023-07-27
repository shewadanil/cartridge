-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: database:3306
-- Время создания: Июл 27 2023 г., 04:45
-- Версия сервера: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004
-- Версия PHP: 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `docker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cartridge`
--

CREATE TABLE `cartridge` (
  `id` int(10) UNSIGNED NOT NULL,
  `model` tinytext NOT NULL,
  `barcode` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `service` tinytext NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cartridge`
--

INSERT INTO `cartridge` (`id`, `model`, `barcode`, `date`, `service`, `price`) VALUES
(62, 'xp', 132154, '2023-07-11', 'Заправка', 300),
(63, 'xp-1', 132154, '2023-07-26', 'Заправка', 300);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nikname` varchar(128) NOT NULL,
  `passwordHach` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `authToken` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `nikname`, `passwordHach`, `role`, `authToken`) VALUES
(1, 'remza', '$2y$10$Kbu.nd.LIL2FPNK1IfXp0OG2LYfvCqwctneZ8tEoRKh8RKrna6DkO', 'admin', '286ef208286ef0f58b3943ec8ac1143c8a27c1c67d9c9f4f1520eebd304dc398c6577014d1d5699f');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cartridge`
--
ALTER TABLE `cartridge`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nikname` (`nikname`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cartridge`
--
ALTER TABLE `cartridge`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
