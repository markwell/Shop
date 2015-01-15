-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Янв 15 2015 г., 21:26
-- Версия сервера: 5.6.21
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `Users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`) VALUES
(1, 'Итальянская кухня', 0),
(2, 'Китайская кухня', 0),
(3, 'Узбекская кухня', 0),
(4, 'Русская кухня', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(5) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `item`
--

INSERT INTO `item` (`id`, `name`, `price`, `category_id`, `available`, `description`, `image`) VALUES
(1, 'Gubadzhou', '500.00', 1, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(2, 'Gubadzhou', '500.00', 1, 1, 'Gabadzhou2 - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(3, 'Gubadzhou', '500.00', 1, 1, 'Gabadzhou3 - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(4, 'Gubadzhou', '180.00', 3, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(5, 'Gubadzhou', '200.00', 4, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(6, 'Gubadzhou', '500.00', 1, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(7, 'Gubadzhou', '500.00', 2, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(8, 'Gubadzhou', '500.00', 2, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(9, 'Gubadzhou', '500.00', 2, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(10, 'Gubadzhou', '500.00', 2, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(11, 'Gubadzhou', '500.00', 2, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(12, 'Gubadzhou', '500.00', 3, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(13, 'Gubadzhou', '500.00', 3, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(14, 'Gubadzhou', '500.00', 3, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(15, 'Gubadzhou', '500.00', 3, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(16, 'Gubadzhou', '500.00', 3, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(17, 'Gubadzhou', '500.00', 3, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(19, 'Gubadzhou', '500.00', 4, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(20, 'Gubadzhou', '500.00', 4, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(25, 'Gubadzhou', '500.00', 4, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(26, 'Gubadzhou', '500.00', 4, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(27, 'Gubadzhou', '500.00', 4, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(28, 'Gubadzhou', '500.00', 4, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(29, 'Gubadzhou', '500.00', 4, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png'),
(30, 'Gubadzhou', '500.00', 4, 1, 'Gabadzhou - known Chinese dishes. Represents the bits of meat fried in batter in starch and poured sweet and sour sauce. Preparing batter with water (water must be very hoodnoy), egg albumen, flour, and starch.', '/shop/images/food.png');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `item_id` int(5) NOT NULL,
  `price` double NOT NULL,
  `time` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `item_id`, `price`, `time`, `comment`) VALUES
(1, 36, 3, 0, 0, ''),
(2, 36, 2, 0, 0, ''),
(3, 36, 30, 0, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) unsigned NOT NULL,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_hash` varchar(32) NOT NULL,
  `user_ip` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_hash`, `user_ip`) VALUES
(42, 'fefur', 'cf6ebf3453bf1877ee3f1dce7bd1ec19', '', 0),
(36, 'mark', '7363a0d0604902af7b70b271a0b96480', '0a2e50962f71e733d23b6e7d391f8cc1', 0),
(38, 'fefu', '7363a0d0604902af7b70b271a0b96480', '', 0),
(39, 'fefufefu', '7363a0d0604902af7b70b271a0b96480', '', 0),
(40, 'fefuf', '7363a0d0604902af7b70b271a0b96480', '6f9355e6702ccaa9325a394e7cd966b2', 0),
(41, 'qwerty', 'cf6ebf3453bf1877ee3f1dce7bd1ec19', '8a86dfb29a173f741a4231de188956e4', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`), ADD KEY `parent_id` (`parent_id`);

--
-- Индексы таблицы `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `item`
--
ALTER TABLE `item`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
