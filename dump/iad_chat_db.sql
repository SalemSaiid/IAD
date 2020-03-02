SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `users` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_online` BOOLEAN
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `users` (`id`, `username`,  `email`,  `password`, `is_online`) VALUES
(1, 'William', 'william@email.com', '$2y$10$ON6kmuoHvNzxztKsZOGOqO46B7b7HfZIY2xVtl.AeXpAB/Eup97ka', true),
(2, 'Marc', 'marc@email.com', '$2y$10$ON6kmuoHvNzxztKsZOGOqO46B7b7HfZIY2xVtl.AeXpAB/Eup97ka', false),
(3, 'John', 'john@email.com', '$2y$10$ON6kmuoHvNzxztKsZOGOqO46B7b7HfZIY2xVtl.AeXpAB/Eup97ka', true);

CREATE TABLE `messages` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
   created  DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `messages` (`username`,  `message`,  `created`) VALUES
('William', 'Hi  :)', '2020-01-01 10:10:10'),
('John', 'how are you ?', '2020-01-01 10:42:10'),
('William', 'Not bad, thanks. And you?','2020-01-01 12:10:10');