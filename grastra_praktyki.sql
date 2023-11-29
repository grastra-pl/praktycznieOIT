-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mariadb106.grastra.nazwa.pl:3306
-- Czas generowania: 28 Lis 2023, 19:24
-- Wersja serwera: 10.6.14-MariaDB-log
-- Wersja PHP: 7.2.24-0ubuntu0.18.04.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `grastra_praktyki`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `avg_game_rating`
--

CREATE TABLE `avg_game_rating` (
  `game_id` int(11) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `avg_game_rating`
--

INSERT INTO `avg_game_rating` (`game_id`, `rating`) VALUES
(1, 4.5),
(2, 4.5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bare_minimum`
--

CREATE TABLE `bare_minimum` (
  `id` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modification_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci;

--
-- Zrzut danych tabeli `bare_minimum`
--

INSERT INTO `bare_minimum` (`id`, `creation_time`, `modification_time`, `deleted`) VALUES
(1, '0000-00-00 00:00:00', '2022-11-18 17:15:30', 0),
(2, '0000-00-00 00:00:00', '2022-11-18 17:15:44', 0),
(3, '0000-00-00 00:00:00', '2022-11-18 17:15:47', 0),
(4, '0000-00-00 00:00:00', '2022-11-19 23:48:14', 0),
(5, '0000-00-00 00:00:00', '2022-11-19 23:48:50', 0),
(6, '2022-11-19 23:49:58', '2022-11-19 23:49:58', 0),
(7, '2022-11-19 23:54:11', '2022-11-19 23:54:11', 0),
(8, '2022-11-20 18:08:03', '2022-11-20 18:08:03', 0),
(9, '2022-11-20 21:20:22', '2022-11-20 21:20:22', 0),
(10, '2022-11-20 21:44:32', '2022-11-20 21:44:32', 0),
(11, '2022-11-20 21:54:54', '2022-11-20 21:54:54', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `commodity`
--

CREATE TABLE `commodity` (
  `id` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modification_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci;

--
-- Zrzut danych tabeli `commodity`
--

INSERT INTO `commodity` (`id`, `creation_time`, `modification_time`, `deleted`, `name`) VALUES
(1, '0000-00-00 00:00:00', '2022-12-01 17:30:42', 0, 'drewno'),
(2, '0000-00-00 00:00:00', '2022-12-01 17:31:28', 0, 'kamienie'),
(3, '0000-00-00 00:00:00', '2022-12-01 17:31:39', 0, 'mięso');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `game_platform_id` int(11) NOT NULL,
  `game_type_id` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modification_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(30) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `screenshot` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci;

--
-- Zrzut danych tabeli `game`
--

INSERT INTO `game` (`id`, `author_id`, `game_platform_id`, `game_type_id`, `creation_time`, `modification_time`, `deleted`, `name`, `description`, `screenshot`) VALUES
(1, 1, 1, 1, '0000-00-00 00:00:00', '2023-05-30 20:20:12', 0, 'Kółko i krzyżyk', '', ''),
(3, 1, 1, 1, '0000-00-00 00:00:00', '2023-06-02 15:34:42', 0, 'Kolko i krzyzyk123', '', ''),
(4, 1, 1, 1, '0000-00-00 00:00:00', '2023-06-12 09:23:03', 0, 'Wisielec123', '', ''),
(5, 3, 1, 1, '0000-00-00 00:00:00', '2023-06-01 08:45:24', 0, 'Zgadnij liczbe', '', ''),
(6, 3, 1, 1, '0000-00-00 00:00:00', '2023-06-01 13:42:10', 0, 'Snake', '', ''),
(7, 3, 1, 1, '0000-00-00 00:00:00', '2023-06-01 08:57:03', 0, 'Memory', '', ''),
(8, 4, 1, 1, '0000-00-00 00:00:00', '2023-06-02 06:24:34', 0, 'Labirynt', '', ''),
(9, 4, 1, 1, '0000-00-00 00:00:00', '2023-06-02 10:24:53', 0, 'Gra', '', ''),
(10, 3, 1, 1, '0000-00-00 00:00:00', '2023-06-02 15:20:14', 0, '1234', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `game_platform`
--

CREATE TABLE `game_platform` (
  `id` int(11) NOT NULL,
  `name` varchar(24) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `game_platform`
--

INSERT INTO `game_platform` (`id`, `name`, `description`) VALUES
(1, 'html', 'Gra w html / css / js');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `game_rating`
--

CREATE TABLE `game_rating` (
  `game_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `game_rating`
--

INSERT INTO `game_rating` (`game_id`, `player_id`, `rating`) VALUES
(3, 1, 3),
(3, 3, 3),
(4, 1, 4),
(4, 3, 1),
(5, 3, 1),
(6, 1, 5),
(6, 3, 1),
(7, 3, 1),
(7, 4, 1),
(8, 1, 3),
(8, 4, 3),
(9, 3, 5),
(10, 3, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `game_type`
--

CREATE TABLE `game_type` (
  `id` int(11) NOT NULL,
  `name` varchar(24) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `game_type`
--

INSERT INTO `game_type` (`id`, `name`, `description`) VALUES
(1, 'logiczna', 'Gra logiczna');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modification_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(65) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'xxxx',
  `banned` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci;

--
-- Zrzut danych tabeli `player`
--

INSERT INTO `player` (`id`, `creation_time`, `modification_time`, `deleted`, `name`, `password`, `banned`) VALUES
(1, '0000-00-00 00:00:00', '2023-05-12 12:46:22', 0, 'player1', '$2a$12$spzicuEtC1tf7Lmw3TbWV.tjbEW1qarPhthjiYabNQ7ULfQWy37TS', 0),
(2, '0000-00-00 00:00:00', '2023-05-21 16:30:41', 0, 'Player2', '$2a$12$spzicuEtC1tf7Lmw3TbWV.tjbEW1qarPhthjiYabNQ7ULfQWy37TS', 0),
(3, '0000-00-00 00:00:00', '2023-05-30 20:38:14', 0, 'player3', 'xxxx', 0),
(4, '0000-00-00 00:00:00', '2023-05-30 20:38:43', 0, 'player4', 'xxxx', 0),
(5, '0000-00-00 00:00:00', '2023-05-30 20:38:55', 0, 'player5', 'xxxx', 0),
(6, '0000-00-00 00:00:00', '2023-05-30 20:39:13', 0, 'player6', 'xxxx', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modification_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `game_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci;

--
-- Zrzut danych tabeli `score`
--

INSERT INTO `score` (`id`, `creation_time`, `modification_time`, `deleted`, `game_id`, `player_id`, `value`) VALUES
(1, '2023-05-15 13:51:59', '2023-05-15 13:51:59', 0, 1, 1, 100),
(9, '0000-00-00 00:00:00', '2023-05-16 15:44:16', 0, 3, 1, 100),
(14, '0000-00-00 00:00:00', '2023-05-28 13:34:47', 0, 2, 1, 8),
(15, '0000-00-00 00:00:00', '2023-05-28 13:42:52', 0, 2, 1, 4),
(16, '0000-00-00 00:00:00', '2023-05-28 13:45:22', 0, 2, 1, 7),
(17, '0000-00-00 00:00:00', '2023-05-28 13:47:27', 0, 2, 1, 9),
(18, '0000-00-00 00:00:00', '2023-05-28 13:51:19', 0, 2, 1, 3),
(19, '0000-00-00 00:00:00', '2023-05-28 14:07:25', 0, 2, 1, 6),
(20, '0000-00-00 00:00:00', '2023-05-28 19:27:39', 0, 5, 1, 20),
(21, '0000-00-00 00:00:00', '2023-05-28 19:40:41', 0, 5, 1, 18),
(22, '0000-00-00 00:00:00', '2023-05-28 19:42:52', 0, 5, 1, 16),
(28, '0000-00-00 00:00:00', '2023-05-30 08:52:02', 0, 4, 1, 5),
(30, '0000-00-00 00:00:00', '2023-05-30 09:22:31', 0, 4, 1, 5),
(44, '0000-00-00 00:00:00', '2023-05-30 10:06:26', 0, 2, 1, 200),
(45, '0000-00-00 00:00:00', '2023-05-30 10:06:32', 0, 2, 1, 200),
(48, '0000-00-00 00:00:00', '2023-05-30 12:12:22', 0, 2, 1, 5),
(49, '0000-00-00 00:00:00', '2023-05-30 12:12:30', 0, 2, 1, 5),
(50, '0000-00-00 00:00:00', '2023-05-30 12:15:20', 0, 3, 1, 6),
(51, '0000-00-00 00:00:00', '2023-05-30 12:21:32', 0, 3, 1, 6),
(52, '0000-00-00 00:00:00', '2023-05-30 12:23:38', 0, 3, 1, 5),
(53, '0000-00-00 00:00:00', '2023-05-30 12:24:58', 0, 1, 1, 200),
(57, '0000-00-00 00:00:00', '2023-05-30 12:26:16', 0, 3, 1, 8),
(60, '0000-00-00 00:00:00', '2023-05-30 12:40:35', 0, 3, 1, 1),
(65, '0000-00-00 00:00:00', '2023-05-30 13:13:57', 0, 1, 1, 100),
(66, '0000-00-00 00:00:00', '2023-05-30 13:14:07', 0, 1, 1, 200),
(67, '0000-00-00 00:00:00', '2023-05-30 13:24:33', 0, 3, 1, 2),
(68, '0000-00-00 00:00:00', '2023-05-30 13:26:21', 0, 3, 1, 2),
(69, '0000-00-00 00:00:00', '2023-05-30 13:34:53', 0, 3, 1, 1),
(70, '0000-00-00 00:00:00', '2023-05-30 13:35:14', 0, 1, 1, 200),
(71, '0000-00-00 00:00:00', '2023-05-30 13:35:32', 0, 1, 1, 50),
(72, '0000-00-00 00:00:00', '2023-05-30 13:36:08', 0, 1, 1, 100),
(73, '0000-00-00 00:00:00', '2023-05-30 13:41:23', 0, 3, 1, 1),
(74, '0000-00-00 00:00:00', '2023-05-30 13:42:50', 0, 3, 1, 2),
(75, '0000-00-00 00:00:00', '2023-05-30 14:28:51', 0, 5, 1, 10),
(76, '0000-00-00 00:00:00', '2023-05-30 14:32:31', 0, 5, 1, 19),
(77, '0000-00-00 00:00:00', '2023-05-30 14:41:16', 0, 5, 1, 27),
(78, '0000-00-00 00:00:00', '2023-05-30 14:44:51', 0, 3, 1, 1),
(79, '0000-00-00 00:00:00', '2023-05-30 14:45:01', 0, 1, 1, 200),
(80, '0000-00-00 00:00:00', '2023-05-30 14:45:01', 0, 1, 1, 200),
(81, '0000-00-00 00:00:00', '2023-05-30 14:45:35', 0, 5, 1, 28),
(82, '0000-00-00 00:00:00', '2023-05-30 14:48:35', 0, 5, 1, 21),
(84, '0000-00-00 00:00:00', '2023-05-30 18:21:33', 0, 4, 1, 12),
(85, '0000-00-00 00:00:00', '2023-05-30 18:30:19', 0, 1, 1, 200),
(86, '0000-00-00 00:00:00', '2023-05-30 18:31:01', 0, 3, 1, 11),
(87, '0000-00-00 00:00:00', '2023-05-30 18:31:21', 0, 4, 1, 5),
(88, '0000-00-00 00:00:00', '2023-05-30 18:32:06', 0, 5, 1, 28),
(91, '0000-00-00 00:00:00', '2023-05-30 18:42:25', 0, 3, 1, 1),
(94, '0000-00-00 00:00:00', '2023-05-30 19:20:27', 0, 2, 1, 50),
(95, '2023-11-28 16:49:03', '2023-11-28 16:49:03', 0, 2, 2, 100),
(96, '2023-11-28 16:51:26', '2023-11-28 16:51:26', 0, 4, 3, 100),
(97, '2023-11-28 17:43:00', '2023-11-28 17:43:00', 0, 10, 6, -100),
(98, '2023-11-28 17:43:33', '2023-11-28 17:43:33', 0, 1, 1, 100),
(99, '2023-11-28 17:44:15', '2023-11-28 17:44:15', 0, 1, 1, 100),
(100, '2023-11-28 18:02:20', '2023-11-28 18:02:20', 0, 2, 2, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `raw_value` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modification_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `task`
--

INSERT INTO `task` (`id`, `raw_value`, `creation_time`, `modification_time`, `deleted`) VALUES
(1, 12, '0000-00-00 00:00:00', '2023-05-26 10:20:23', 0),
(2, 2, '0000-00-00 00:00:00', '2023-05-26 10:20:51', 0),
(3, 35, '0000-00-00 00:00:00', '2023-05-26 12:25:51', 0),
(4, 3, '0000-00-00 00:00:00', '2023-05-26 12:26:05', 0),
(5, 25, '0000-00-00 00:00:00', '2023-05-26 12:27:06', 0),
(6, 25, '0000-00-00 00:00:00', '2023-05-26 12:29:18', 0),
(7, 25, '0000-00-00 00:00:00', '2023-05-26 12:34:00', 0),
(8, 25, '0000-00-00 00:00:00', '2023-05-26 15:07:51', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `creation_time` timestamp NULL DEFAULT NULL,
  `modification_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `avg_game_rating`
--
ALTER TABLE `avg_game_rating`
  ADD PRIMARY KEY (`game_id`);

--
-- Indeksy dla tabeli `bare_minimum`
--
ALTER TABLE `bare_minimum`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `commodity`
--
ALTER TABLE `commodity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeksy dla tabeli `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_platform_id` (`game_platform_id`),
  ADD KEY `game_type_id` (`game_type_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indeksy dla tabeli `game_platform`
--
ALTER TABLE `game_platform`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `game_rating`
--
ALTER TABLE `game_rating`
  ADD UNIQUE KEY `game_id` (`game_id`,`player_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indeksy dla tabeli `game_type`
--
ALTER TABLE `game_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indeksy dla tabeli `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `bare_minimum`
--
ALTER TABLE `bare_minimum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `commodity`
--
ALTER TABLE `commodity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `game_platform`
--
ALTER TABLE `game_platform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `game_type`
--
ALTER TABLE `game_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT dla tabeli `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`game_platform_id`) REFERENCES `game_platform` (`id`),
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`game_type_id`) REFERENCES `game_type` (`id`),
  ADD CONSTRAINT `game_ibfk_3` FOREIGN KEY (`author_id`) REFERENCES `player` (`id`);

--
-- Ograniczenia dla tabeli `game_rating`
--
ALTER TABLE `game_rating`
  ADD CONSTRAINT `game_rating_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `game_rating_ibfk_2` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`);

--
-- Ograniczenia dla tabeli `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `FK_player` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
