-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 12:01 PM
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
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carte_postale`
--

INSERT INTO `carte_postale` (`id`, `region_id`, `name`, `imagefront`, `imageback`, `prix`, `quantite_stock`, `created_at`, `updated_at`) VALUES
(1, 30, 'Sidi Bou Said-le port', 'port_sidi_bousaid', NULL, 1.2, 10, '2025-05-09 20:38:38', '2025-05-09 20:38:38'),
(2, 1, 'Djerba scene', 'Djerba_scene', NULL, 2.35, 3, '2025-05-09 20:48:35', '2025-05-09 20:48:35'),
(3, 7, 'Matmata', 'matmata', NULL, 1.25, 4, '2025-05-09 20:48:35', '2025-05-09 20:48:35'),
(4, 19, 'milano', 'milano', NULL, 3, 4, '2025-05-09 20:55:48', '2025-05-09 20:55:48'),
(5, 21, 'venise ultra rare', 'rare_venise', NULL, 50, 1, '2025-05-09 20:55:48', '2025-05-09 20:55:48'),
(6, 24, 'Carte colorisée Tokyo Japon', 'tokyo', NULL, 10, 2, '2025-05-09 20:59:44', '2025-05-09 20:59:44'),
(7, 25, 'kyoto scenery', 'kyoto', NULL, 3.5, 5, '2025-05-09 20:59:44', '2025-05-09 20:59:44'),
(8, 23, 'rare bali', 'rare_bali', NULL, 200, 1, '2025-05-09 21:04:06', '2025-05-09 21:04:06'),
(9, 28, 'sao paulo', 'sao_paulo', NULL, 15, 3, '2025-05-09 21:04:06', '2025-05-09 21:04:06');

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
('DoctrineMigrations\\Version20250509182953', '2025-05-09 20:42:10', 16);

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
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`id`, `name`, `created_at`, `updated_at`) VALUES
(21, 'Tunisia', '2025-05-09 20:41:38', '2025-05-09 20:41:38'),
(24, 'Indonesia', '2025-05-09 20:41:59', '2025-05-09 20:41:59'),
(26, 'Italy', '2025-05-09 20:42:12', '2025-05-09 20:42:12'),
(28, 'France', '2025-05-09 20:42:24', '2025-05-09 20:42:24'),
(29, 'Spain', '2025-05-09 20:42:36', '2025-05-09 20:42:36'),
(32, 'Japan', '2025-05-09 20:42:48', '2025-05-09 20:42:48'),
(33, 'Brazil', '2025-05-09 20:43:00', '2025-05-09 20:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `pays_id` int(11) DEFAULT NULL,
  `name` varchar(40) NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `pays_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 21, 'Djerba', '2025-05-09 20:43:39', '2025-05-09 20:43:39'),
(5, 21, 'Tataouine', '2025-05-09 20:43:51', '2025-05-09 20:43:51'),
(7, 21, 'Matmata', '2025-05-09 20:44:02', '2025-05-09 20:44:02'),
(9, 29, 'Barcelona', '2025-05-09 20:44:14', '2025-05-09 20:44:14'),
(11, 29, 'Madrid', '2025-05-09 20:44:25', '2025-05-09 20:44:25'),
(13, 29, 'Grenade', '2025-05-09 20:44:39', '2025-05-09 20:44:39'),
(15, 28, 'Paris', '2025-05-09 20:44:52', '2025-05-09 20:44:52'),
(16, 28, 'Lyon', '2025-05-09 20:45:01', '2025-05-09 20:45:01'),
(17, 28, 'Toulouse', '2025-05-09 20:45:11', '2025-05-09 20:45:11'),
(18, 26, 'Rome', '2025-05-09 20:45:20', '2025-05-09 20:45:20'),
(19, 26, 'Milan', '2025-05-09 20:45:29', '2025-05-09 20:45:29'),
(21, 26, 'Venise', '2025-05-09 20:45:39', '2025-05-09 20:45:39'),
(22, 24, 'Jakarta', '2025-05-09 20:45:50', '2025-05-09 20:45:50'),
(23, 24, 'Bali', '2025-05-09 20:45:59', '2025-05-09 20:45:59'),
(24, 32, 'Tokyo', '2025-05-09 20:46:09', '2025-05-09 20:46:09'),
(25, 32, 'Kyoto', '2025-05-09 20:46:20', '2025-05-09 20:46:20'),
(26, 32, 'Osaka', '2025-05-09 20:46:29', '2025-05-09 20:46:29'),
(27, 33, 'Rio de Janeiro', '2025-05-09 20:46:40', '2025-05-09 20:46:40'),
(28, NULL, 'Sao Paulo', '2025-05-09 20:46:49', '2025-05-09 20:46:49'),
(29, 33, 'Salvador', '2025-05-09 20:46:59', '2025-05-09 20:46:59'),
(30, 21, 'Sidi Bou Said', '2025-05-09 20:47:08', '2025-05-09 20:47:08');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carte_postale`
--
ALTER TABLE `carte_postale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
