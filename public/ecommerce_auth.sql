-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2025 at 11:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carte_postale`
--

CREATE TABLE `carte_postale` (
  `id` int(11) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `imagefront` varchar(255) DEFAULT NULL,
  `imageback` varchar(255) DEFAULT NULL,
  `prix` double NOT NULL,
  `quantite_stock` smallint(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carte_postale`
--

INSERT INTO `carte_postale` (`id`, `region_id`, `name`, `imagefront`, `imageback`, `prix`, `quantite_stock`, `created_at`, `updated_at`) VALUES
(1, 30, 'Sidi Bou Said-le port', 'port_sidi_bousaid.jpg', NULL, 1.5, 5, NULL, '2025-05-31 09:19:21'),
(2, 1, 'Djerba scene', 'Djerba_scene.jpg', NULL, 2.35, 1, NULL, '2025-05-30 23:56:09'),
(3, 7, 'Matmata', 'matmata.jpg', NULL, 1.25, 1, NULL, '2025-05-31 00:05:35'),
(5, 21, 'venise ultra rare', 'rare_venise.jpg', NULL, 50, 10, NULL, '2025-05-31 10:26:33'),
(6, 24, 'Carte colorisée Tokyo Japon', 'tokyo.jpg', NULL, 10, 2, NULL, NULL),
(8, 23, 'rare bali', 'rare_bali.jpg', NULL, 200, 2, NULL, '2025-05-31 00:27:47'),
(9, 28, 'sao paulo', 'sao_paulo.jpg', NULL, 15, 3, NULL, NULL),
(15, 31, 'Le Caire', 'kairo-6838a47b33e90.jpg', NULL, 5, 7, NULL, '2025-05-31 10:33:19'),
(16, 15, 'Tour Eiffel', 'Tour-Eiffel-683a313aeee43.png', NULL, 5, 3, '2025-05-31 00:29:14', '2025-05-31 00:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250509180046', '2025-05-09 20:01:07', 113),
('DoctrineMigrations\\Version20250509182953', '2025-05-09 20:42:10', 16),
('DoctrineMigrations\\Version20250529173140', '2025-05-30 12:31:46', 102),
('DoctrineMigrations\\Version20250530172152', '2025-05-30 19:22:58', 51);

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`id`, `name`, `created_at`, `updated_at`) VALUES
(21, 'Tunisia', NULL, NULL),
(24, 'Indonesia', NULL, NULL),
(26, 'Italy', NULL, NULL),
(28, 'France', NULL, NULL),
(29, 'Spain', NULL, NULL),
(32, 'Japan', NULL, NULL),
(33, 'Brazil', NULL, NULL),
(35, 'Egypte', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `pays_id` int(11) DEFAULT NULL,
  `name` varchar(40) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `pays_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 21, 'Djerba', NULL, NULL),
(5, 21, 'Tataouine', NULL, NULL),
(7, 21, 'Matmata', NULL, NULL),
(9, 29, 'Barcelona', NULL, NULL),
(11, 29, 'Madrid', NULL, NULL),
(13, 29, 'Grenade', NULL, NULL),
(15, 28, 'Paris', NULL, NULL),
(16, 28, 'Lyon', NULL, NULL),
(17, 28, 'Toulouse', NULL, NULL),
(18, 26, 'Rome', NULL, NULL),
(19, 26, 'Milan', NULL, NULL),
(21, 26, 'Venise', NULL, NULL),
(22, 24, 'Jakarta', NULL, NULL),
(23, 24, 'Bali', NULL, NULL),
(24, 32, 'Tokyo', NULL, NULL),
(25, 32, 'Kyoto', NULL, NULL),
(26, 32, 'Osaka', NULL, NULL),
(27, 33, 'Rio de Janeiro', NULL, NULL),
(28, 33, 'Sao Paulo', NULL, NULL),
(29, 33, 'Salvador', NULL, NULL),
(30, 21, 'Sidi Bou Said', NULL, NULL),
(31, 35, 'Le Caire', NULL, NULL),
(32, 29, 'Andalusia', NULL, NULL),
(33, 28, 'Toulouse', '2025-05-31 00:19:17', '2025-05-31 00:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `roles`, `password`, `email`, `username`) VALUES
(1, '[\"ROLE_ADMIN\"]', '$2y$13$e4z8j6ADbbL2nDf.POM20Ob7NgYV20axgQ5S96csyT3bv9N0kuCl6', 'admin1@gmail.com', 'admin1'),
(2, '[\"ROLE_ADMIN\"]', '$2y$13$TIOpQZXQBA6KI6O.rrd3zevP5PrlTZbMtE5iWu7RqqXYx9D3YwVDq', 'admin2@gmail.com', 'admin2'),
(4, '[]', '$2y$13$V/bugcS0wcWXaXcZB3MXKe6BFskEF5YkknSPImIIc1Ck43pRQr7Zm', 't39904146@gmail.com', 'test'),
(5, '[]', '$2y$13$3qctckenpoXI3EV3bFgLEe694Kh7TnjPW/GMhAmCNq.1mPGnpUZN6', 'user1@gmail.com', 'user1'),
(6, '[]', '$2y$13$Nwc8TdM/Ju4.LUoozB3zpeXEe58rZsaKkXjtt/u7dgoYvFnvoAss2', 'user2@gmail.com', 'user2'),
(7, '[]', '$2y$13$k1QINWFZ0grx1viaOWZ9W..8dDakZW82gx5qATUk1J/JOlQOeXvlm', 'mahdizamni83@gmail.com', 'mahdi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carte_postale`
--
ALTER TABLE `carte_postale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3EC4EB3F98260155` (`region_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F62F176A6E44244` (`pays_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carte_postale`
--
ALTER TABLE `carte_postale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carte_postale`
--
ALTER TABLE `carte_postale`
  ADD CONSTRAINT `FK_3EC4EB3F98260155` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `FK_F62F176A6E44244` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
