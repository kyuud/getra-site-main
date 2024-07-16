-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 31-Mar-2020 às 18:40
-- Versão do servidor: 8.0.16
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getra`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` bigint(20) NOT NULL,
  `url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=354 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id`, `title`, `position`, `url`, `image`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(348, 'Post 9', 2, 'asdasd', '202002070835105e3d4b6e933a8.png', 'adasdasd', 1, '2020-02-07 11:35:10', '2020-02-07 11:35:10', NULL),
(349, 'Post 7', 3, 'asdas', '202002070923345e3d56c66c167.png', 'awdawda', 0, '2020-02-07 12:23:34', '2020-02-07 12:23:43', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `highlights` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `neighborhood` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funfacts`
--

DROP TABLE IF EXISTS `funfacts`;
CREATE TABLE IF NOT EXISTS `funfacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logs_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(31, '2014_10_12_000000_create_users_table', 1),
(32, '2014_10_12_100000_create_password_resets_table', 1),
(33, '2019_08_19_000000_create_failed_jobs_table', 1),
(34, '2020_01_27_110731_create_standards_table', 1),
(35, '2020_01_28_145619_create_banners_table', 1),
(36, '2020_02_07_100421_create_roles_table', 2),
(37, '2020_02_07_100517_create_permissions_table', 2),
(38, '2020_03_03_154321_create_funfacts_table', 3),
(39, '2020_03_04_121618_create_companies_table', 3),
(40, '2020_03_05_092548_create_logs_table', 3),
(41, '2020_03_05_152511_create_portfolios_table', 3),
(42, '2020_03_05_171319_create_teams_table', 3),
(43, '2020_03_06_154034_create_blogs_table', 3),
(44, '2020_03_05_152511_create_services_table', 4),
(45, '2020_03_31_1524011_create_services_table', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `label`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 'super-adm', 'Super Administrador', '2020-02-11 20:04:16', '2020-02-11 20:04:16', NULL),
(30, 'user', 'Acesso ao Módulo de Usuário', '2020-02-13 19:21:01', '2020-02-13 19:21:01', NULL),
(31, 'user-create', 'Criar Usuário', '2020-02-13 19:21:01', '2020-02-13 19:21:01', NULL),
(32, 'user-destroyFake', 'Remover Usuário', '2020-02-13 19:21:01', '2020-02-13 19:21:01', NULL),
(33, 'user-clearTable', 'Limpar Tabela de Usuário', '2020-02-13 19:21:01', '2020-02-13 19:21:01', NULL),
(34, 'user-edit', 'Visualizar Detalhes de Usuário', '2020-02-13 19:21:01', '2020-02-13 19:21:01', NULL),
(35, 'user-update', 'Atualizar Usuário', '2020-02-13 19:21:01', '2020-02-13 19:21:01', NULL),
(36, 'user-trash', 'Acessar Lixeira de Usuário', '2020-02-13 19:21:01', '2020-02-13 19:21:01', NULL),
(37, 'user-editTrash', 'Visualizar Detalhes da Lixeira de Usuário', '2020-02-13 19:21:01', '2020-02-13 19:21:01', NULL),
(38, 'user-updateTrash', 'Atualizar Usuário da Lixeira', '2020-02-13 19:21:01', '2020-02-13 19:21:01', NULL),
(39, 'user-restore', 'Restaurar Usuário da Lixeira', '2020-02-13 19:21:01', '2020-02-13 19:21:01', NULL),
(40, 'user-destroy', 'Remover Usuário Permanentemente', '2020-02-13 19:21:01', '2020-02-13 19:21:01', NULL),
(41, 'user-clearTableForce', 'Limpar Tabela de Usuário Permanentemente', '2020-02-13 19:21:01', '2020-02-13 19:21:01', NULL),
(42, 'banner', 'Acesso ao Módulo de Banner', '2020-02-13 19:22:17', '2020-02-13 21:29:49', NULL),
(43, 'banner-create', 'Criar Banner', '2020-02-13 19:22:17', '2020-02-13 19:22:17', NULL),
(44, 'banner-destroyFake', 'Remover Banner', '2020-02-13 19:22:17', '2020-02-13 19:22:17', NULL),
(45, 'banner-clearTable', 'Limpar Tabela de Banner', '2020-02-13 19:22:17', '2020-02-13 19:22:17', NULL),
(46, 'banner-edit', 'Visualizar Detalhes de Banner', '2020-02-13 19:22:17', '2020-02-13 19:22:17', NULL),
(47, 'banner-update', 'Atualizar Banner', '2020-02-13 19:22:17', '2020-02-13 19:22:17', NULL),
(48, 'banner-trash', 'Acessar Lixeira de Banner', '2020-02-13 19:22:17', '2020-02-13 19:22:17', NULL),
(49, 'banner-editTrash', 'Visualizar Detalhes da Lixeira de Banner', '2020-02-13 19:22:17', '2020-02-13 19:22:17', NULL),
(50, 'banner-updateTrash', 'Atualizar Banner da Lixeira', '2020-02-13 19:22:17', '2020-02-13 19:22:17', NULL),
(51, 'banner-restore', 'Restaurar Banner da Lixeira', '2020-02-13 19:22:17', '2020-02-13 19:22:17', NULL),
(52, 'banner-destroy', 'Remover Banner Permanentemente', '2020-02-13 19:22:17', '2020-02-13 19:22:17', NULL),
(53, 'banner-clearTableForce', 'Limpar Tabela de Banner Permanentemente', '2020-02-13 19:22:17', '2020-02-13 19:22:17', NULL),
(54, 'permission', 'Acesso ao Módulo de Permissão', '2020-02-13 19:28:18', '2020-02-13 19:28:18', NULL),
(55, 'permission-create', 'Criar Permissão', '2020-02-13 19:28:18', '2020-02-13 19:28:18', NULL),
(56, 'permission-destroyFake', 'Remover Permissão', '2020-02-13 19:28:18', '2020-02-13 19:28:18', NULL),
(57, 'permission-clearTable', 'Limpar Tabela de Permissão', '2020-02-13 19:28:18', '2020-02-13 19:28:18', NULL),
(58, 'permission-edit', 'Visualizar Detalhes de Permissão', '2020-02-13 19:28:18', '2020-02-13 19:28:18', NULL),
(59, 'permission-update', 'Atualizar Permissão', '2020-02-13 19:28:18', '2020-02-13 19:28:18', NULL),
(60, 'permission-trash', 'Acessar Lixeira de Permissão', '2020-02-13 19:28:18', '2020-02-13 19:28:18', NULL),
(61, 'permission-editTrash', 'Visualizar Detalhes da Lixeira de Permissão', '2020-02-13 19:28:18', '2020-02-13 19:28:18', NULL),
(62, 'permission-updateTrash', 'Atualizar Permissão da Lixeira', '2020-02-13 19:28:18', '2020-02-13 19:28:18', NULL),
(63, 'permission-restore', 'Restaurar Permissão da Lixeira', '2020-02-13 19:28:18', '2020-02-13 19:28:18', NULL),
(64, 'permission-destroy', 'Remover Permissão Permanentemente', '2020-02-13 19:28:18', '2020-02-13 19:28:18', NULL),
(65, 'permission-clearTableForce', 'Limpar Tabela de Permissão Permanentemente', '2020-02-13 19:28:18', '2020-02-13 19:28:18', NULL),
(66, 'role', 'Acesso ao Módulo de Papel', '2020-02-13 19:28:30', '2020-02-13 19:28:30', NULL),
(67, 'role-create', 'Criar Papel', '2020-02-13 19:28:30', '2020-02-13 19:28:30', NULL),
(68, 'role-destroyFake', 'Remover Papel', '2020-02-13 19:28:30', '2020-02-13 19:28:30', NULL),
(69, 'role-clearTable', 'Limpar Tabela de Papel', '2020-02-13 19:28:30', '2020-02-13 19:28:30', NULL),
(70, 'role-edit', 'Visualizar Detalhes de Papel', '2020-02-13 19:28:30', '2020-02-13 19:28:30', NULL),
(71, 'role-update', 'Atualizar Papel', '2020-02-13 19:28:30', '2020-02-13 19:28:30', NULL),
(72, 'role-trash', 'Acessar Lixeira de Papel', '2020-02-13 19:28:30', '2020-02-13 19:28:30', NULL),
(73, 'role-editTrash', 'Visualizar Detalhes da Lixeira de Papel', '2020-02-13 19:28:30', '2020-02-13 19:28:30', NULL),
(74, 'role-updateTrash', 'Atualizar Papel da Lixeira', '2020-02-13 19:28:30', '2020-02-13 19:28:30', NULL),
(75, 'role-restore', 'Restaurar Papel da Lixeira', '2020-02-13 19:28:30', '2020-02-13 19:28:30', NULL),
(76, 'role-destroy', 'Remover Papel Permanentemente', '2020-02-13 19:28:30', '2020-02-13 19:28:30', NULL),
(77, 'role-clearTableForce', 'Limpar Tabela de Papel Permanentemente', '2020-02-13 19:28:30', '2020-02-13 19:28:30', NULL),
(78, 'permission-role', 'Acesso ao Módulo de Permissão a Papel', '2020-02-13 19:28:48', '2020-02-13 19:28:48', NULL),
(79, 'permission-role-create', 'Criar Permissão a Papel', '2020-02-13 19:28:48', '2020-02-13 19:28:48', NULL),
(80, 'permission-role-destroyFake', 'Remover Permissão a Papel', '2020-02-13 19:28:48', '2020-02-13 19:28:48', NULL),
(81, 'permission-role-clearTable', 'Limpar Tabela de Permissão a Papel', '2020-02-13 19:28:48', '2020-02-13 19:28:48', NULL),
(82, 'permission-role-edit', 'Visualizar Detalhes de Permissão a Papel', '2020-02-13 19:28:48', '2020-02-13 19:28:48', NULL),
(83, 'permission-role-update', 'Atualizar Permissão a Papel', '2020-02-13 19:28:48', '2020-02-13 19:28:48', NULL),
(84, 'permission-role-trash', 'Acessar Lixeira de Permissão a Papel', '2020-02-13 19:28:48', '2020-02-13 19:28:48', NULL),
(85, 'permission-role-editTrash', 'Visualizar Detalhes da Lixeira de Permissão a Papel', '2020-02-13 19:28:48', '2020-02-13 19:28:48', NULL),
(86, 'permission-role-updateTrash', 'Atualizar Permissão a Papel da Lixeira', '2020-02-13 19:28:48', '2020-02-13 19:28:48', NULL),
(87, 'permission-role-restore', 'Restaurar Permissão a Papel da Lixeira', '2020-02-13 19:28:48', '2020-02-13 19:28:48', NULL),
(88, 'permission-role-destroy', 'Remover Permissão a Papel Permanentemente', '2020-02-13 19:28:48', '2020-02-13 19:28:48', NULL),
(89, 'permission-role-clearTableForce', 'Limpar Tabela de Permissão a Papel Permanentemente', '2020-02-13 19:28:48', '2020-02-13 19:28:48', NULL),
(90, 'role-user', 'Acesso ao Módulo de Papel a Usuário', '2020-02-13 19:29:06', '2020-02-13 19:29:06', NULL),
(91, 'role-user-create', 'Criar Papel a Usuário', '2020-02-13 19:29:06', '2020-02-13 19:29:06', NULL),
(92, 'role-user-destroyFake', 'Remover Papel a Usuário', '2020-02-13 19:29:06', '2020-02-13 19:29:06', NULL),
(93, 'role-user-clearTable', 'Limpar Tabela de Papel a Usuário', '2020-02-13 19:29:06', '2020-02-13 19:29:06', NULL),
(94, 'role-user-edit', 'Visualizar Detalhes de Papel a Usuário', '2020-02-13 19:29:06', '2020-02-13 19:29:06', NULL),
(95, 'role-user-update', 'Atualizar Papel a Usuário', '2020-02-13 19:29:06', '2020-02-13 19:29:06', NULL),
(96, 'role-user-trash', 'Acessar Lixeira de Papel a Usuário', '2020-02-13 19:29:06', '2020-02-13 19:29:06', NULL),
(97, 'role-user-editTrash', 'Visualizar Detalhes da Lixeira de Papel a Usuário', '2020-02-13 19:29:06', '2020-02-13 19:29:06', NULL),
(98, 'role-user-updateTrash', 'Atualizar Papel a Usuário da Lixeira', '2020-02-13 19:29:06', '2020-02-13 19:29:06', NULL),
(99, 'role-user-restore', 'Restaurar Papel a Usuário da Lixeira', '2020-02-13 19:29:06', '2020-02-13 19:29:06', NULL),
(100, 'role-user-destroy', 'Remover Papel a Usuário Permanentemente', '2020-02-13 19:29:06', '2020-02-13 19:29:06', NULL),
(101, 'role-user-clearTableForce', 'Limpar Tabela de Papel a Usuário Permanentemente', '2020-02-13 19:29:06', '2020-02-13 19:29:06', NULL),
(102, 'acl', 'Acesso a ACL', '2020-02-13 19:30:05', '2020-02-13 19:30:05', NULL),
(104, 'trash', 'Acesso ao Módulo da Lixeira', '2020-02-14 18:54:40', '2020-02-14 18:54:40', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2460 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2424, 48, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2425, 72, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2426, 96, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2427, 36, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2428, 102, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2429, 104, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2430, 42, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2431, 66, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2432, 90, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2433, 54, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2434, 30, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2435, 47, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2436, 50, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2437, 71, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2438, 95, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2439, 98, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2440, 74, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2441, 35, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2442, 43, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2443, 31, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2444, 39, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2445, 49, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2446, 73, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2447, 97, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2448, 37, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2449, 46, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2450, 70, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2451, 94, 1, '2020-02-17 18:13:12', '2020-02-17 18:13:12', NULL),
(2452, 34, 1, '2020-02-17 18:13:13', '2020-02-17 18:13:13', NULL),
(2453, 42, 9, '2020-02-17 18:14:09', '2020-02-17 18:14:09', NULL),
(2454, 47, 9, '2020-02-17 18:14:09', '2020-02-17 18:14:09', NULL),
(2455, 43, 9, '2020-02-17 18:14:09', '2020-02-17 18:14:09', NULL),
(2456, 46, 9, '2020-02-17 18:14:09', '2020-02-17 18:14:09', NULL),
(2457, 42, 3, '2020-02-17 18:14:30', '2020-02-17 18:14:30', NULL),
(2458, 46, 3, '2020-02-17 18:14:30', '2020-02-17 18:14:30', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'adm', 'Administrador', '2020-02-07 14:00:00', '2020-02-10 20:13:05', NULL),
(3, 'super-basico', 'Usuário Super Básico', '2020-02-10 20:07:59', '2020-02-10 20:13:12', NULL),
(6, 'super-adm', 'Super Administrador', '2020-02-11 20:04:58', '2020-02-11 20:04:58', NULL),
(9, 'basico', 'Básico', '2020-02-13 21:31:00', '2020-02-13 21:31:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  KEY `role_user_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 6, 4, '2020-02-11 20:05:25', '2020-02-11 20:05:25', NULL),
(12, 1, 7, '2020-02-13 13:43:19', '2020-02-14 17:35:25', NULL),
(16, 6, 6, '2020-02-13 21:08:56', '2020-02-17 12:58:04', NULL),
(18, 9, 6, '2020-02-13 21:31:46', '2020-02-13 21:31:46', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `standards`
--

DROP TABLE IF EXISTS `standards`;
CREATE TABLE IF NOT EXISTS `standards` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Charles de Azevedo Júnior', '202002061646465e3c6d26dbd92.jpg', 'charles@stoledo.com.br', NULL, '$2y$10$1LDlyIwheTQjrbaoJQHALezX3cvSr3NyQC9IyJLXrYejjAXL8D30m', 1, 'asztxi683Rvr5ibhB9jTTEs1KJiJW1u1NAvt7qo7vjA97ZBN7Mvn6OxJeC1A', '2020-02-06 19:46:46', '2020-02-14 20:18:40', NULL),
(6, 'Clearlison Nóbrega', '202002111707395e43098b088db.jpg', 'clearlison@stoledo.com.br', NULL, '$2y$10$7lblEc1gg42OIvSz.0YPvuWYUO6qmOiJ6yxfwFp3Vn7E44dKcwhJO', 1, 'NbxJMd7QTgctH9Kmfe8gyUinte7A4t1YhhL0UDF8a2rBrTYoRRUhmhyOCvb0', '2020-02-11 20:07:39', '2020-02-14 20:08:19', NULL),
(7, 'Cris Henrique', '202002120853125e43e728da079.jpg', 'cris@stoledo.com.br', NULL, '$2y$10$GKQPw0gTaQbiahBCakp8fOprZcgfMDa59e7PieKw.5OJjCmW4TroK', 1, NULL, '2020-02-11 20:56:27', '2020-02-13 17:44:19', NULL),
(8, 'Joca da Silva', '202002121051315e4402e37f170.jpg', 'joca@stoledo.com.br', NULL, '$2y$10$pZ.vkCYAbXOmJk/FUYL0Q.wktHux9gOHdh3l6EjRfvYEDRCodHmAu', 1, NULL, '2020-02-12 12:39:51', '2020-02-13 17:44:33', NULL),
(9, 'Carlar Cordeiro', '202002131527035e4594f7a40e4.jpg', 'carla@stoledo.com.br', NULL, '$2y$10$beI8mcq/CdzeMD/T6CUbaetT5SvAn0m01Sr5SiSVwCthMcIM3ijXG', 1, 'x3Po6nc8Z5EGk3bqQAijsiiZEAs45QBS2c2YisDf2hpD2crCrlNAXdjEBQoS', '2020-02-13 18:27:03', '2020-02-14 20:15:02', NULL),
(10, 'Jucelino Pereira', '202002140959455e4699c18719d.jpg', 'jucelino@stoledo.com.br', NULL, '$2y$10$gnNQ0LerhsAHu3H5GaZSP.LwnTPPx.PsGijwA.HI9BZnCfICb6Ru.', 1, NULL, '2020-02-14 12:59:45', '2020-02-14 12:59:45', NULL),
(11, 'Dayane', '202002141001515e469a3f34d21.jpg', 'dayane@stoledo.com.br', NULL, '$2y$10$E3Hqz8GK54.AOvfg7nrud.tktVbplZNElUaI1F86OcC6Slo8PFL2.', 1, NULL, '2020-02-14 13:01:51', '2020-02-14 13:01:51', NULL),
(12, 'Andreza', '202002141002235e469a5f5bd71.jpg', 'andreza@stoledo.com.br', NULL, '$2y$10$gFhRms4MmjytxUtg3eV4yOUuRcivwBrgoRlz8dvzf7fsePoaRSapm', 1, NULL, '2020-02-14 13:02:23', '2020-02-14 13:02:23', NULL),
(13, 'Kevin', '202002141002505e469a7a766f9.jpg', 'kevin@stoledo.com.br', NULL, '$2y$10$mt6r8tcJRkrb5N75Pi.yt.ZWd3W1KvdcGXKawnq.g.KfS7Y5bFNhK', 1, NULL, '2020-02-14 13:02:50', '2020-02-14 13:02:50', NULL),
(14, 'Marta Severina', '202002141024535e469fa57e5d6.jpg', 'c37575024575037891537@sandbox.pagseguro.com.br', NULL, '$2y$10$hwzB1oxblrCeC7JTJ2boU.qXFkoskjP.vIlmczp/MYK67Fw4J7VK6', 1, NULL, '2020-02-14 13:24:53', '2020-02-14 13:24:53', NULL),
(15, 'Maria Agripino', '202002141025435e469fd73ab1c.jpg', 'magripino@gmail.com', NULL, '$2y$10$InEkjUvSREjuCkia/z2z9.CXUacfSHCKRXz/JpO305bEl6u1xJ5oC', 1, NULL, '2020-02-14 13:25:43', '2020-02-14 13:25:43', NULL),
(16, 'Adriano França', '202002141026485e46a018f3942.jpg', 'adriano@stoledo.com.br', NULL, '$2y$10$nzliK4n6VkLC1jLqd0cIredpl0d0/L.LAogh8hiOm7Nsqy49Ot/7y', 1, NULL, '2020-02-14 13:26:49', '2020-02-14 13:26:49', NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
