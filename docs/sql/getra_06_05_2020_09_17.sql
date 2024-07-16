-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Maio-2020 às 14:16
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `getra`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` bigint(20) NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id`, `title`, `position`, `url`, `image`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(348, 'Post 9', 2, 'asdasd', '202002070835105e3d4b6e933a8.png', 'adasdasd', 1, '2020-02-07 11:35:10', '2020-04-16 03:23:51', '2020-04-16 00:04:51'),
(349, 'Post 7', 3, 'asdas', '202002070923345e3d56c66c167.png', 'awdawda', 0, '2020-02-07 12:23:34', '2020-04-16 03:23:51', '2020-04-16 00:04:51'),
(354, '...', 1, 'www', '202004160037465e97d30a42d98.jpeg', '...', 1, '2020-04-16 03:37:46', '2020-04-16 03:37:46', NULL),
(355, '...', 2, 'www', '202004160040235e97d3a7ba023.jpeg', '...', 1, '2020-04-16 03:40:23', '2020-04-16 03:40:23', NULL),
(356, '...', 3, 'www', '202004160041095e97d3d5f32c1.jpeg', '...', 1, '2020-04-16 03:41:10', '2020-04-16 03:41:10', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `highlights` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `abstract`, `highlights`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Visita técnica dos alunos do CEAS', '202004160111105e97dade4cdc5.jpg', 'Fonte: Assessoria de Comunicação', '<p>Alunos do CEAS fazem visita técnica na manhã desta quarta-feira na Getra<br></p>', '<p>A Getra recebeu na manhã desta quarta-feira (29), a visita técnica dos alunos do curso de Saúde e Segurança do Trabalho do Ceas Escola Técnica. Uma manhã super proveitosa, onde os alunos puderam conhecer nossos profissionais, como também as nossas instalações e a rotina da nossa empresa, que preza pela competência no trabalho que executa. Com toda certeza os alunos saíram dessa visita com um olhar diferenciado acerca da Saúde e Segurança do Trabalho que foi a profissão escolhida por eles. Nossos colaboradores se sentem lisonjeados em poder colaborar com esses alunos.</p>', 1, '2020-04-16 04:11:10', '2020-04-16 04:11:10', NULL),
(2, 'Lombalgia lidera motivo de afastamento do trabalho', '202004160112405e97db385b91b.jpg', 'Fonte: https://www.contabeis.com.br/', '<p>Incômodo nas costas é o principal motivo que afasta trabalhadores dos seus postos<br></p>', '<p>Levantamento do Instituto Nacional do Seguro Social (INSS) aponta crescimento de 6% no volume de afastamento de trabalhadores por doenças ou complicações de saúde. Com mais de 83 mil casos, lombalgia (dor na região lombar) é a principal causa.</p><p>A falta de um programa de acompanhamento postural e uso correto dos equipamentos fornecidos pelas empresas estão entre os principais motivos que levam milhares de trabalhadores aos consultórios médicos com dores na região da lombar.</p><p>Dados da Organização Mundial de Saúde (OMS) apontam que que lombalgia é a segunda maior causa de visita aos consultórios médicos, perde apenas para dor de cabeça.</p><p>\"Na maioria das vezes, especialmente em pacientes jovens e de meia idade, a lombalgia, famosa dor nas costas, é um sintoma de uma contratura muscular ou distensão muscular, que normalmente estão ligadas a coisas muito próximas do nosso dia a dia, como postura inadequada ao desempenhar atividades corriqueiras, como pegar peso de mal jeito sem uma postura adequada da coluna”, afirma&nbsp; Angelo Guarçoni, médico neurocirurgião e de coluna.</p><p>Seja por realizar um trabalho repetitivo, excesso de tempo em uma determinada posição ou mesmo forçar um exercício na academia, não é incomum encontrar alguém sofrendo de dores na lombar. Na grande maioria das vezes, esse incômodo é localizado, porém, em pequenos casos, pode ser sintoma de uma doença mais grave, principalmente em idosos.</p><p>Uma visita ao consultório logo no início pode ser suficiente para diagnóstico e tratamento adequado, evitando o agravamento do caso. “Só o especialista consegue definir o que é essa dor. Se é uma lombalgia vinda de uma contratura muscular, má postura, ou se é referente a algum outro problema de saúde como pedra nos rins, infecções urinárias ou hérnia de disco”, destaca o médico.</p><p>Além da lombalgia, fraturas nos pés, nas mãos, transtornos de discos invertebrais, leiomioma do útero lideram nos motivos que afastam trabalhadores de suas funções.</p>', 1, '2020-04-16 04:12:40', '2020-04-16 04:12:40', NULL),
(3, 'O que é Engenharia de Segurança do Trabalho?', '202004160113535e97db81b5e04.png', 'Fonte: https://www.educamaisbrasil.com.br/', '<p>Saiba mais sobre o curso e o mercado de trabalho dessa profissão<br></p>', '<p>O Engenheiro de Segurança do Trabalho é o profissional responsável por coordenar e efetuar análise de projetos a serem implantados, em conjunto com as áreas técnicas, recomendando alterações, visando reduzir ou eliminar os riscos de acidentes e doenças ocupacionais. Além disso, orienta a Comissão Interna de Prevenção de Acidentes (CIPA) das empresas e fornece instruções aos funcionários sobre o uso de equipamentos de proteção individual (EPIs).&nbsp;</p><p>O que estudar para ser Engenheiro de Segurança do Trabalho?</p><p>Segundo a Lei 7410/85 para exercer a profissão na área, é necessário fazer um curso de graduação em Arquitetura ou Engenharia – nas modalidades civil, eletricista, mecânica e metalúrgica, química, geologia e minas e agrimensura, com duração média de 4 a 5 anos, e depois fazer uma pós-graduação em Engenharia de Segurança do Trabalho.&nbsp;</p><p>Durante o curso, o aluno irá se deparar com matérias específicas sobre a integração do homem ao ambiente de trabalho, normas e legislação, prevenção de riscos, ética e cidadania, relação com o Conselho Regional de Engenharia e Agronomia (CREA), dentre outras.</p>', 1, '2020-04-16 04:13:53', '2020-04-16 04:13:53', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `companies`
--

INSERT INTO `companies` (`id`, `street`, `number`, `plus`, `neighborhood`, `cep`, `city`, `state`, `phone`, `mobile`, `email`, `whatsapp`, `facebook`, `twitter`, `instagram`, `youtube`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rua José Elpídio da Costa Monteiro', '92,', ',', 'São José', '58400-424', 'Campina Grande', 'Paraíba', '(83) 3201-1446', '+55 (83) 9 9988-1495', 'getra@getra.com.br', '+5583999881495', 'https://www.facebook.com/getragestao/', NULL, 'https://www.instagram.com/getragestao/', 'www', 1, '2020-04-16 04:35:37', '2020-04-16 04:35:37', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `crm`, `specialty`, `phone`, `email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'médico 1', '12312312312', 'especialidade 1', 12312312312, 'email1@email.com', 1, '2020-05-06 12:15:11', '2020-05-06 12:15:11', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `employeename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` bigint(20) NOT NULL,
  `cpf` bigint(20) NOT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `employees`
--

INSERT INTO `employees` (`id`, `company_id`, `employeename`, `occupation`, `age`, `rg`, `cpf`, `sex`, `birth`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'funcionario 1', 'cargo 1', '30', 12312312312, 12312312312, 'masculino', '16/09/1989', 1, '2020-05-06 01:34:56', '2020-05-06 01:34:56', NULL),
(2, 2, 'funcionario 2', 'cargo 2', '27', 32132132132, 32132132132, 'feminino', '11/01/1993', 1, '2020-05-06 01:36:11', '2020-05-06 01:36:11', NULL),
(3, 1, 'funcionário 3', 'cargo 3', '25', 21312332112, 21312332112, 'masculino', '21312332112', 1, '2020-05-06 11:22:49', '2020-05-06 11:22:49', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funfacts`
--

CREATE TABLE `funfacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `funfacts`
--

INSERT INTO `funfacts` (`id`, `title`, `value`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cidades', 12, 1, '2020-04-16 03:56:35', '2020-04-16 03:56:35', NULL),
(2, 'Atendimentos', 347, 1, '2020-04-16 03:56:45', '2020-04-16 03:56:45', NULL),
(3, 'Palestras', 95, 1, '2020-04-16 03:56:56', '2020-04-16 03:56:56', NULL),
(4, 'Equipes', 6, 1, '2020-04-16 03:57:09', '2020-04-16 03:57:09', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `ip`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, '::1', 1, '2020-05-05 19:27:11', '2020-05-05 19:27:11', NULL),
(2, 4, '::1', 1, '2020-05-06 01:22:24', '2020-05-06 01:22:24', NULL),
(3, 4, '::1', 1, '2020-05-06 11:19:57', '2020-05-06 11:19:57', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(45, '2020_03_31_1524011_create_services_table', 5),
(64, '2020_04_16_191201_create_system_companies_table', 6),
(65, '2020_04_22_173401_create_employees_table', 6),
(66, '2020_04_28_113750_create_doctors_table', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `image`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Giraffas', '202004160058375e97d7ede1142.png', 'Giraffas', 1, '2020-04-16 03:58:37', '2020-04-16 03:58:37', NULL),
(2, 'Divino Fogão', '202004160059095e97d80dd4164.png', 'Divino Fogão', 1, '2020-04-16 03:59:10', '2020-04-16 03:59:10', NULL),
(3, 'União', '202004160059325e97d824e3406.png', 'União', 1, '2020-04-16 03:59:33', '2020-04-16 03:59:33', NULL),
(4, 'Catamais', '202004160059515e97d837055fc.png', 'Catamais', 1, '2020-04-16 03:59:51', '2020-04-16 03:59:51', NULL),
(5, 'Cipan', '202004160100145e97d84e1bbc7.png', 'Cipan', 1, '2020-04-16 04:00:14', '2020-04-16 04:00:14', NULL),
(6, 'Vitamassa', '202004160100405e97d8682e03b.png', 'Vitamassa', 1, '2020-04-16 04:00:40', '2020-04-16 04:00:40', NULL),
(7, 'Marpeças', '202004160100555e97d877b7ee1.png', 'Marpeças', 1, '2020-04-16 04:00:58', '2020-04-16 04:00:58', NULL),
(8, 'Info Way', '202004160101095e97d88599598.png', 'Info Way', 1, '2020-04-16 04:01:09', '2020-04-16 04:01:09', NULL),
(9, 'Pbnet', '202004160101285e97d8985361b.png', 'Pbnet', 1, '2020-04-16 04:01:28', '2020-04-16 04:01:28', NULL),
(10, 'Logos', '202004160101435e97d8a70b9d5.png', 'Logos', 1, '2020-04-16 04:01:43', '2020-04-16 04:01:43', NULL),
(11, 'Prontanalise', '202004160102005e97d8b8cb940.png', 'Prontanalise', 1, '2020-04-16 04:02:00', '2020-04-16 04:02:00', NULL),
(12, 'CB.', '202004160102215e97d8cd85591.png', 'CB.', 1, '2020-04-16 04:02:21', '2020-04-16 04:02:21', NULL),
(13, 'Queiroga e Mayer', '202004160102525e97d8ecd69c5.png', 'Queiroga e Mayer', 1, '2020-04-16 04:02:52', '2020-04-16 04:02:52', NULL),
(14, 'Sabor Sertanejo', '202004160103105e97d8fe70429.png', 'Sabor Sertanejo', 1, '2020-04-16 04:03:11', '2020-04-16 04:03:11', NULL),
(15, 'Cicatriza', '202004160103295e97d911cd6b1.png', 'Cicatriza', 1, '2020-04-16 04:03:29', '2020-04-16 04:03:29', NULL),
(16, 'Rede Bella', '202004160103465e97d922afede.png', 'Rede Bella', 1, '2020-04-16 04:03:46', '2020-04-16 04:03:46', NULL),
(17, 'CS Club', '202004160104415e97d959dfc62.png', 'CS Club', 1, '2020-04-16 04:04:41', '2020-04-16 04:04:41', NULL),
(18, 'Casa Alves', '202004160105025e97d96e27f40.png', 'Casa Alves', 1, '2020-04-16 04:05:02', '2020-04-16 04:05:02', NULL),
(19, 'Alfa Ville', '202004160105215e97d9814efa6.png', 'Alfa Ville', 1, '2020-04-16 04:05:21', '2020-04-16 04:05:21', NULL),
(20, 'AllMed', '202004160105395e97d993675a0.png', 'AllMed', 1, '2020-04-16 04:05:39', '2020-04-16 04:05:39', NULL),
(21, 'Rede Pharma', '202004160105585e97d9a659136.png', 'Rede Pharma', 1, '2020-04-16 04:05:58', '2020-04-16 04:05:58', NULL),
(22, 'Produtos Real', '202004160106375e97d9cdad3be.png', 'Produtos Real', 1, '2020-04-16 04:06:37', '2020-04-16 04:06:37', NULL),
(23, 'Central da Economia', '202004160106525e97d9dc7c53d.png', 'Central da Economia', 1, '2020-04-16 04:06:52', '2020-04-16 04:06:52', NULL),
(24, 'SS Toledo', '202004160107105e97d9eec50d4.png', 'SS Toledo', 1, '2020-04-16 04:07:10', '2020-04-16 04:07:10', NULL),
(25, 'C&T Digital', '202004160107275e97d9ff5a067.png', 'C&T Digital', 1, '2020-04-16 04:07:27', '2020-04-16 04:07:27', NULL),
(26, 'C&T Consultores e Associados', '202004160107485e97da148250f.png', 'C&T Consultores e Associados', 1, '2020-04-16 04:07:48', '2020-04-16 04:07:48', NULL),
(27, 'CDBR Certificadora', '202004160108145e97da2e9e31e.png', 'CDBR Certificadora', 1, '2020-04-16 04:08:14', '2020-04-16 04:08:14', NULL),
(28, 'SToledo', '202004160108305e97da3ebbf38.png', 'SToledo', 1, '2020-04-16 04:08:30', '2020-04-16 04:08:30', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`id`, `title`, `image`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Palestras', '202004160053365e97d6c05481a.png', 'Palestra e consultoria para uso dos Equipamentos de Proteção Individual', 1, '2020-04-16 03:53:36', '2020-04-16 03:53:36', NULL),
(2, 'Exames Ocupacionais', '202004160053575e97d6d569ed3.png', 'Admissionais; Periódicos; Mudança de função; Retorno ao trabalho e Demissionais', 1, '2020-04-16 03:53:57', '2020-04-16 03:53:57', NULL),
(3, 'PPRA', '202004160054145e97d6e618941.png', 'Programa de Prevenção de Riscos Ambientais', 1, '2020-04-16 03:54:14', '2020-04-16 03:54:14', NULL),
(4, 'PCMSO', '202004160054455e97d70529a05.png', 'Programa de Controle Médico e Saúde Ocupacional', 1, '2020-04-16 03:54:45', '2020-04-16 03:54:45', NULL),
(5, 'PPP', '202004160055025e97d716093e2.png', 'Perfil Profissiográfico Previdenciário', 1, '2020-04-16 03:55:02', '2020-04-16 03:55:02', NULL),
(6, 'LTCAT', '202004160055285e97d730c2004.png', 'Insalubridade e Periculosidade e Laudo Técnico das Condições Ambientais do Trabalho', 1, '2020-04-16 03:55:28', '2020-04-16 03:55:28', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `standards`
--

CREATE TABLE `standards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_companies`
--

CREATE TABLE `system_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fantasyname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `system_companies`
--

INSERT INTO `system_companies` (`id`, `name`, `cnpj`, `fantasyname`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'empresa 1', '12312312312', 'nome fantasia 1', 1, '2020-05-06 01:33:18', '2020-05-06 01:33:18', NULL),
(2, 'empresa 2', '32132132132', 'nome fantasia 2', 1, '2020-05-06 01:33:44', '2020-05-06 01:33:44', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_company_id_foreign` (`company_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funfacts`
--
ALTER TABLE `funfacts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_user_id_foreign` (`user_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Índices para tabela `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Índices para tabela `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `standards`
--
ALTER TABLE `standards`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `system_companies`
--
ALTER TABLE `system_companies`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT de tabela `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funfacts`
--
ALTER TABLE `funfacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de tabela `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2460;

--
-- AUTO_INCREMENT de tabela `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `standards`
--
ALTER TABLE `standards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `system_companies`
--
ALTER TABLE `system_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `system_companies` (`id`) ON DELETE CASCADE;

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
