CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modification_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(30) COLLATE utf8mb3_polish_ci DEFAULT NULL,
  `description` text COLLATE utf8mb3_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci;

INSERT INTO `game` (`id`, `creation_time`, `modification_time`, `deleted`, `name`, `description`) VALUES
(1, '0000-00-00 00:00:00', '2023-05-12 15:00:19', 0, 'kółko i krzyżyk', 'kółko i krzyżyk');

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modification_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(30) CHARACTER SET utf8mb3 NOT NULL,
  `password` varchar(65) CHARACTER SET utf8mb3 NOT NULL DEFAULT 'xxxx',
  `banned` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci;

INSERT INTO `player` (`id`, `creation_time`, `modification_time`, `deleted`, `name`, `password`, `banned`) VALUES
(1, '0000-00-00 00:00:00', '2023-05-12 14:46:22', 0, 'player1', '$2a$12$spzicuEtC1tf7Lmw3TbWV.tjbEW1qarPhthjiYabNQ7ULfQWy37TS', 0);

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modification_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `game_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci;

ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `player_id` (`player_id`);
INSERT INTO `score` (`id`, `creation_time`, `modification_time`, `deleted`, `game_id`, `player_id`, `value`) VALUES
(1, '0000-00-00 00:00:00', '2023-05-12 15:40:48', 0, 1, 1, 100),
(2, '0000-00-00 00:00:00', '2023-05-12 15:41:59', 0, 1, 1, -100),
(3, '0000-00-00 00:00:00', '2023-05-12 16:36:48', 0, 1, 1, 0),
(4, '0000-00-00 00:00:00', '2023-05-12 16:36:48', 0, 1, 1, 100);