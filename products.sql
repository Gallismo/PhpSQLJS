-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 21 2021 г., 17:51
-- Версия сервера: 10.5.11-MariaDB
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testtask`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_NAME` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PRODUCT_PRICE` int(11) NOT NULL,
  `PRODUCT_ARTICLE` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PRODUCT_QUANTITY` int(11) DEFAULT 0,
  `DATE_CREATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `VISIBILITY` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`ID`, `PRODUCT_ID`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `PRODUCT_ARTICLE`, `PRODUCT_QUANTITY`, `DATE_CREATE`, `VISIBILITY`) VALUES
(1, 12, 'Milk', 210, '5338047457886', 1000, '2021-11-20 05:37:13', 1),
(2, 15, 'Bread', 210, '4900337705821', 1003, '2021-11-20 05:37:33', 1),
(3, 30, 'Chocolate', 210, '7321573944328', 1008, '2021-11-20 05:37:56', 1),
(4, 45, 'Meat', 500, '9077727611077', 1000, '2021-11-20 05:38:14', 0),
(45, 14, 'Milk', 210, '5338047457883', 1000, '2021-11-20 00:37:13', 0),
(46, 16, 'Bread', 210, '4900337705825', 1002, '2021-11-20 00:37:33', 1),
(47, 37, 'Chocolate', 210, '7321573944329', 999, '2021-11-20 00:37:56', 1),
(48, 49, 'Meat', 500, '9077727611072', 982, '2021-11-20 00:38:14', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `PRODUCT_ID` (`PRODUCT_ID`),
  ADD UNIQUE KEY `PRODUCT_ARTICLE` (`PRODUCT_ARTICLE`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
