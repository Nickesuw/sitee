CREATE DATABASE logins;

USE logins;

CREATE TABLE users( id INT NOT NULL, fname VARCHAR(30) NOT NULL, lname VARCHAR(30) NOT NULL, np VARCHAR(30) NOT NULL, mail VARCHAR(30) NOT NULL, ps VARCHAR(30) NOT NULL, PRIMARY KEY(id));


CREATE TABLE `cart` (
                        `id` int(11) NOT NULL,
                        `user_id` int(11) NOT NULL,
                        `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `products` (
                            `id` int(6) NOT NULL,
                            `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `price` int(11) NOT NULL,
                            `img` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `name`, `price`, `img`) VALUES
                                                          (1, 'Салат Цезарь', 426, 'img/cesar.png'),
                                                            (2, 'Рис с курицей', 480, 'img/rise.png');

-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 03 2022 г., 03:36
-- Версия сервера: 10.4.24-MariaDB-log
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `logins`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
                        `id` int(11) NOT NULL,
                        `user_id` int(11) NOT NULL,
                        `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`) VALUES
    (8, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
                            `id` int(6) NOT NULL,
                            `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `price` int(11) NOT NULL,
                            `img` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `img`) VALUES
                                                          (1, 'Салат Цезарь', 426, 'img/cesar.png'),
                                                          (2, 'Рис с курицей', 480, 'img/rise.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `fname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `lname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `np` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `mail` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `ps` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `np`, `mail`, `ps`) VALUES
    (1, 'Test', 'Test', '1234556', 'test@gmail.com', '1234');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
    MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
