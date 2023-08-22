-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 22 2023 г., 11:07
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `company`
--

-- --------------------------------------------------------

--
-- Структура таблицы `commercial_events`
--

CREATE TABLE `commercial_events` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `commercial_events`
--

INSERT INTO `commercial_events` (`id`, `title`, `description`, `event_date`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Тур 1', 'Описание тура 1', '2222-03-21', 'Место 1', '2023-08-19 10:05:00', '2023-08-19 10:05:00'),
(2, 'Тур 2', 'Описание тура 2', '2023-09-20', 'Место 2', '2023-08-19 10:05:00', '2023-08-19 10:05:00'),
(3, 'Тур 3', 'Описание тура 3', '2023-09-25', 'Место 3', '2023-08-19 10:05:00', '2023-08-19 10:05:00');

-- --------------------------------------------------------

--
-- Структура таблицы `event_categories`
--

CREATE TABLE `event_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `event_categories`
--

INSERT INTO `event_categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Баскетбол', 3, '2023-08-19 10:03:58', '2023-08-19 10:03:58'),
(2, 'Телефон', 4, '2023-08-19 10:03:58', '2023-08-19 10:03:58'),
(3, 'Спорт', NULL, '2023-08-19 10:03:58', '2023-08-19 10:03:58'),
(4, 'Электроника ', NULL, '2023-08-19 10:03:58', '2023-08-19 10:03:58');

-- --------------------------------------------------------

--
-- Структура таблицы `event_participants`
--

CREATE TABLE `event_participants` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `event_participants`
--

INSERT INTO `event_participants` (`id`, `event_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-08-19 10:05:42', '2023-08-19 10:05:42'),
(2, 2, 2, '2023-08-19 10:05:42', '2023-08-19 10:05:42'),
(3, 3, 3, '2023-08-19 10:05:42', '2023-08-19 10:05:42');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_08_19_071141_create_user_events_table', 1),
(3, '2023_08_19_071251_create_event_categories_table', 1),
(4, '2023_08_19_071330_create_event_participants_table', 1),
(5, '2023_08_19_071421_create_commercial_events_table', 1),
(6, '2023_08_19_100919_create_users_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john@example.com', '2023-08-19 10:10:51', '$2y$10$WuTIg9iBBsRok4UhGk7qgOOB0oiKnpd/8znFqUoqKg.LzPiySGVD.', NULL, '2023-08-19 10:10:51', '2023-08-19 10:10:51'),
(2, 'Jane Smith', 'jane@example.com', '2023-08-19 10:10:51', '$2y$10$WuTIg9iBBsRok4UhGk7qgOOB0oiKnpd/8znFqUoqKg.LzPiySGVD.', NULL, '2023-08-19 10:10:51', '2023-08-19 10:10:51'),
(3, 'Alice Johnson', 'alice@example.com', '2023-08-19 10:10:51', '$2y$10$WuTIg9iBBsRok4UhGk7qgOOB0oiKnpd/8znFqUoqKg.LzPiySGVD.', NULL, '2023-08-19 10:10:51', '2023-08-19 10:10:51');

-- --------------------------------------------------------

--
-- Структура таблицы `user_events`
--

CREATE TABLE `user_events` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_participants` int UNSIGNED NOT NULL,
  `max_participants` int UNSIGNED NOT NULL,
  `min_age` int UNSIGNED DEFAULT NULL,
  `max_age` int UNSIGNED DEFAULT NULL,
  `gender_specific` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_events`
--

INSERT INTO `user_events` (`id`, `title`, `description`, `event_date`, `start_time`, `end_time`, `location`, `min_participants`, `max_participants`, `min_age`, `max_age`, `gender_specific`, `created_at`, `updated_at`) VALUES
(1, 'Мероприятие 1', 'Описание мероприятия 1', '2023-09-15', '11:11:00', '11:12:00', 'Место 1', 20, 40, 18, 37, 0, '2023-08-19 11:06:51', '2023-08-19 11:06:51'),
(2, 'Мероприятие 2', 'Описание мероприятия 2', '2023-09-20', '00:00:00', '00:00:00', 'Место 2', 30, 50, 25, 45, 1, '2023-08-19 11:06:51', '2023-08-19 11:06:51'),
(3, 'Мероприятие 3', 'Описание мероприятия 3', '2023-09-25', '00:00:00', '00:00:00', 'Место 3', 10, 20, 21, 25, 0, '2023-08-19 11:06:51', '2023-08-19 11:06:51');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `commercial_events`
--
ALTER TABLE `commercial_events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Индексы таблицы `event_participants`
--
ALTER TABLE `event_participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_participants_ibfk_1` (`user_id`),
  ADD KEY `event_participants_ibfk_2` (`event_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `user_events`
--
ALTER TABLE `user_events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `commercial_events`
--
ALTER TABLE `commercial_events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `event_participants`
--
ALTER TABLE `event_participants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user_events`
--
ALTER TABLE `user_events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `event_categories`
--
ALTER TABLE `event_categories`
  ADD CONSTRAINT `event_categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `event_categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `event_participants`
--
ALTER TABLE `event_participants`
  ADD CONSTRAINT `event_participants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `event_participants_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `commercial_events` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
