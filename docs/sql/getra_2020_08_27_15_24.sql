-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 27/08/2020 às 18:22
-- Versão do servidor: 5.7.26
-- Versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Banco de dados: `getra`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `anamneses`
--

CREATE TABLE `anamneses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `asos`
--

CREATE TABLE `asos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `asos`
--

INSERT INTO `asos` (`id`, `employee_id`, `doctor_id`, `pdf`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '202008271223505f47d0066f86c.pdf', 1, '2020-08-27 15:24:16', '2020-08-27 17:43:31', '2020-08-27 14:08:31'),
(2, 1, 1, '202008271442155f47f07747b8b.pdf', 1, '2020-08-27 17:42:33', '2020-08-27 17:43:31', '2020-08-27 14:08:31'),
(3, 1, 2, '202008271444085f47f0e86e72f.pdf', 1, '2020-08-27 17:44:26', '2020-08-27 17:44:26', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` bigint(20) NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `banners`
--

INSERT INTO `banners` (`id`, `title`, `position`, `url`, `image`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(354, '...', 1, 'www', '202004160037465e97d30a42d98.jpeg', '...', 1, '2020-04-16 03:37:46', '2020-04-16 03:37:46', NULL),
(355, '...', 2, 'www', '202004160040235e97d3a7ba023.jpeg', '...', 1, '2020-04-16 03:40:23', '2020-04-16 03:40:23', NULL),
(356, '...', 3, 'www', '202004160041095e97d3d5f32c1.jpeg', '...', 1, '2020-04-16 03:41:10', '2020-04-16 03:41:10', NULL),
(357, 'asd', 1, 'www', '202007011218495efca959272b0.jpeg', 'asd', 1, '2020-07-01 15:18:49', '2020-07-01 15:18:58', '2020-07-01 12:07:58');

-- --------------------------------------------------------

--
-- Estrutura para tabela `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `highlights` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `abstract`, `highlights`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Visita técnica dos alunos do CEAS', '202004160111105e97dade4cdc5.jpg', 'Fonte: Assessoria de Comunicação', 'Alunos do CEAS fazem visita técnica na manhã desta quarta-feira na Getra', 'A Getra recebeu na manhã desta quarta-feira (29), a visita técnica dos alunos do curso de Saúde e Segurança do Trabalho do Ceas Escola Técnica. Uma manhã super proveitosa, onde os alunos puderam conhecer nossos profissionais, como também as nossas instalações e a rotina da nossa empresa, que preza pela competência no trabalho que executa. Com toda certeza os alunos saíram dessa visita com um olhar diferenciado acerca da Saúde e Segurança do Trabalho que foi a profissão escolhida por eles. Nossos colaboradores se sentem lisonjeados em poder colaborar com esses alunos.', 1, '2020-04-16 04:11:10', '2020-04-16 04:11:10', NULL),
(2, 'Lombalgia lidera motivo de afastamento do trabalho', '202004160112405e97db385b91b.jpg', 'Fonte: https://www.contabeis.com.br/', 'Incômodo nas costas é o principal motivo que afasta trabalhadores dos seus postos', '<div style=\"text-align: left;\">Levantamento do Instituto Nacional do Seguro Social (INSS) aponta crescimento de 6% no volume de afastamento de trabalhadores por doenças ou complicações de saúde. Com mais de 83 mil casos, lombalgia (dor na região lombar) é a principal causa.</div><p></p><p style=\"text-align: left;\">A falta de um programa de acompanhamento postural e uso correto dos equipamentos fornecidos pelas empresas estão entre os principais motivos que levam milhares de trabalhadores aos consultórios médicos com dores na região da lombar.</p><p style=\"text-align: left;\">Dados da Organização Mundial de Saúde (OMS) apontam que que lombalgia é a segunda maior causa de visita aos consultórios médicos, perde apenas para dor de cabeça.</p><p style=\"text-align: left;\">\"Na maioria das vezes, especialmente em pacientes jovens e de meia idade, a lombalgia, famosa dor nas costas, é um sintoma de uma contratura muscular ou distensão muscular, que normalmente estão ligadas a coisas muito próximas do nosso dia a dia, como postura inadequada ao desempenhar atividades corriqueiras, como pegar peso de mal jeito sem uma postura adequada da coluna”, afirma&nbsp; Angelo Guarçoni, médico neurocirurgião e de coluna.</p><p style=\"text-align: left;\">Seja por realizar um trabalho repetitivo, excesso de tempo em uma determinada posição ou mesmo forçar um exercício na academia, não é incomum encontrar alguém sofrendo de dores na lombar. Na grande maioria das vezes, esse incômodo é localizado, porém, em pequenos casos, pode ser sintoma de uma doença mais grave, principalmente em idosos.</p><p style=\"text-align: left;\">Uma visita ao consultório logo no início pode ser suficiente para diagnóstico e tratamento adequado, evitando o agravamento do caso. “Só o especialista consegue definir o que é essa dor. Se é uma lombalgia vinda de uma contratura muscular, má postura, ou se é referente a algum outro problema de saúde como pedra nos rins, infecções urinárias ou hérnia de disco”, destaca o médico.</p><p style=\"text-align: left;\">Além da lombalgia, fraturas nos pés, nas mãos, transtornos de discos invertebrais, leiomioma do útero lideram nos motivos que afastam trabalhadores de suas funções.</p>', 1, '2020-04-16 04:12:40', '2020-08-14 14:14:22', NULL),
(3, 'O que é Engenharia de Segurança do Trabalho?', '202004160113535e97db81b5e04.png', 'Fonte: https://www.educamaisbrasil.com.br/', 'Saiba mais sobre o curso e o mercado de trabalho dessa profissão', '<div style=\"text-align: left;\">O Engenheiro de Segurança do Trabalho é o profissional responsável por coordenar e efetuar análise de projetos a serem implantados, em conjunto com as áreas técnicas, recomendando alterações, visando reduzir ou eliminar os riscos de acidentes e doenças ocupacionais. Além disso, orienta a Comissão Interna de Prevenção de Acidentes (CIPA) das empresas e fornece instruções aos funcionários sobre o uso de equipamentos de proteção individual (EPIs).&nbsp;</div><p></p><p style=\"text-align: left;\">O que estudar para ser Engenheiro de Segurança do Trabalho?</p><p style=\"text-align: left;\">Segundo a Lei 7410/85 para exercer a profissão na área, é necessário fazer um curso de graduação em Arquitetura ou Engenharia – nas modalidades civil, eletricista, mecânica e metalúrgica, química, geologia e minas e agrimensura, com duração média de 4 a 5 anos, e depois fazer uma pós-graduação em Engenharia de Segurança do Trabalho.&nbsp;</p><p style=\"text-align: left;\">Durante o curso, o aluno irá se deparar com matérias específicas sobre a integração do homem ao ambiente de trabalho, normas e legislação, prevenção de riscos, ética e cidadania, relação com o Conselho Regional de Engenharia e Agronomia (CREA), dentre outras.</p>', 1, '2020-04-16 04:13:53', '2020-08-14 14:14:02', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `companies`
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
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `companies`
--

INSERT INTO `companies` (`id`, `street`, `number`, `plus`, `neighborhood`, `cep`, `city`, `state`, `phone`, `mobile`, `email`, `whatsapp`, `facebook`, `twitter`, `instagram`, `youtube`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rua José Elpídio da Costa Monteiro', '92,', ',', 'São José', '58400-424', 'Campina Grande', 'Paraíba', '(83) 3201-1446', '+55 (83) 9 9988-1495', 'getra@getra.com.br', '+5583999881495', 'https://www.facebook.com/getragestao/', NULL, 'https://www.instagram.com/getragestao/', 'www', 1, '2020-04-16 04:35:37', '2020-04-16 04:35:37', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `cpf`, `crm`, `pis`, `specialty`, `uf`, `phone`, `email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Guilherme Cézar Soares', '03900737410', '9901', '123123', 'asdad', 'PB', 12312, 'a@a.com', 1, '2020-08-27 16:27:54', '2020-08-27 16:31:52', NULL),
(2, 'Thiago Barbosa de Carvalho', '69037892272', '8333', '123213', 'dasdad', 'PB', 123123, 'asd@s.com', 1, '2020-08-27 16:30:17', '2020-08-27 16:32:47', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` bigint(20) NOT NULL,
  `cpf` bigint(20) NOT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricula` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `employees`
--

INSERT INTO `employees` (`id`, `company_id`, `name`, `occupation`, `age`, `rg`, `cpf`, `nis`, `matricula`, `sex`, `birth`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'adas', 'asdads', '112', 123, 12226, '12312', '12312', 'adeqw', '1111-11-11', 1, '2020-08-27 16:09:45', '2020-08-27 16:09:45', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funfacts`
--

CREATE TABLE `funfacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `funfacts`
--

INSERT INTO `funfacts` (`id`, `title`, `value`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cidades', 12, 1, '2020-04-16 03:56:35', '2020-04-16 03:56:35', NULL),
(2, 'Atendimentos', 347, 1, '2020-04-16 03:56:45', '2020-04-16 03:56:45', NULL),
(3, 'Palestras', 95, 1, '2020-04-16 03:56:56', '2020-04-16 03:56:56', NULL),
(4, 'Equipes', 6, 1, '2020-04-16 03:57:09', '2020-04-16 03:57:09', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `ip`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, '::1', 1, '2020-05-05 19:27:11', '2020-05-05 19:27:11', NULL),
(2, 4, '::1', 1, '2020-05-06 01:22:24', '2020-05-06 01:22:24', NULL),
(3, 4, '::1', 1, '2020-05-06 11:19:57', '2020-05-06 11:19:57', NULL),
(4, 4, '::1', 1, '2020-05-19 13:00:11', '2020-05-19 13:00:11', NULL),
(5, 4, '::1', 1, '2020-05-19 13:00:53', '2020-05-19 13:00:53', NULL),
(6, 4, '::1', 1, '2020-05-19 17:16:41', '2020-05-19 17:16:41', NULL),
(7, 4, '::1', 1, '2020-05-20 10:58:03', '2020-05-20 10:58:03', NULL),
(8, 4, '::1', 1, '2020-05-20 17:26:15', '2020-05-20 17:26:15', NULL),
(9, 4, '::1', 1, '2020-05-21 11:28:51', '2020-05-21 11:28:51', NULL),
(10, 4, '::1', 1, '2020-05-22 11:29:42', '2020-05-22 11:29:42', NULL),
(11, 4, '::1', 1, '2020-05-22 17:28:46', '2020-05-22 17:28:46', NULL),
(12, 4, '::1', 1, '2020-05-25 11:11:05', '2020-05-25 11:11:05', NULL),
(13, 4, '::1', 1, '2020-05-25 17:14:10', '2020-05-25 17:14:10', NULL),
(14, 4, '::1', 1, '2020-05-25 19:33:10', '2020-05-25 19:33:10', NULL),
(15, 4, '::1', 1, '2020-05-26 11:36:39', '2020-05-26 11:36:39', NULL),
(16, 4, '::1', 1, '2020-05-26 17:20:56', '2020-05-26 17:20:56', NULL),
(17, 4, '::1', 1, '2020-05-27 12:38:40', '2020-05-27 12:38:40', NULL),
(18, 4, '::1', 1, '2020-05-27 17:57:38', '2020-05-27 17:57:38', NULL),
(19, 4, '::1', 1, '2020-05-28 11:13:48', '2020-05-28 11:13:48', NULL),
(20, 4, '::1', 1, '2020-05-28 17:31:51', '2020-05-28 17:31:51', NULL),
(21, 4, '::1', 1, '2020-06-24 11:15:17', '2020-06-24 11:15:17', NULL),
(22, 4, '::1', 1, '2020-06-24 17:42:52', '2020-06-24 17:42:52', NULL),
(23, 4, '::1', 1, '2020-06-24 20:38:22', '2020-06-24 20:38:22', NULL),
(24, 4, '::1', 1, '2020-06-25 11:32:45', '2020-06-25 11:32:45', NULL),
(25, 4, '127.0.0.1', 1, '2020-06-25 17:49:21', '2020-06-25 17:49:21', NULL),
(26, 4, '::1', 1, '2020-06-25 18:03:51', '2020-06-25 18:03:51', NULL),
(27, 7, '127.0.0.1', 1, '2020-06-25 19:38:55', '2020-06-25 19:38:55', NULL),
(28, 4, '127.0.0.1', 1, '2020-06-25 19:40:04', '2020-06-25 19:40:04', NULL),
(29, 4, '127.0.0.1', 1, '2020-06-26 11:32:10', '2020-06-26 11:32:10', NULL),
(30, 4, '127.0.0.1', 1, '2020-06-26 14:22:10', '2020-06-26 14:22:10', NULL),
(31, 4, '127.0.0.1', 1, '2020-06-26 17:05:53', '2020-06-26 17:05:53', NULL),
(32, 4, '127.0.0.1', 1, '2020-06-29 11:51:13', '2020-06-29 11:51:13', NULL),
(33, 4, '127.0.0.1', 1, '2020-06-29 17:10:52', '2020-06-29 17:10:52', NULL),
(34, 4, '127.0.0.1', 1, '2020-06-29 20:20:29', '2020-06-29 20:20:29', NULL),
(35, 4, '127.0.0.1', 1, '2020-06-30 11:16:45', '2020-06-30 11:16:45', NULL),
(36, 4, '127.0.0.1', 1, '2020-06-30 17:10:41', '2020-06-30 17:10:41', NULL),
(37, 4, '127.0.0.1', 1, '2020-07-01 11:24:53', '2020-07-01 11:24:53', NULL),
(38, 4, '127.0.0.1', 1, '2020-07-01 12:57:46', '2020-07-01 12:57:46', NULL),
(39, 4, '127.0.0.1', 1, '2020-07-02 11:22:44', '2020-07-02 11:22:44', NULL),
(40, 4, '127.0.0.1', 1, '2020-07-02 17:17:37', '2020-07-02 17:17:37', NULL),
(41, 4, '127.0.0.1', 1, '2020-07-03 11:26:49', '2020-07-03 11:26:49', NULL),
(42, 4, '127.0.0.1', 1, '2020-07-06 12:01:05', '2020-07-06 12:01:05', NULL),
(43, 4, '127.0.0.1', 1, '2020-07-06 17:13:42', '2020-07-06 17:13:42', NULL),
(44, 4, '127.0.0.1', 1, '2020-07-07 11:28:25', '2020-07-07 11:28:25', NULL),
(45, 4, '127.0.0.1', 1, '2020-07-07 18:37:56', '2020-07-07 18:37:56', NULL),
(46, 4, '127.0.0.1', 1, '2020-07-08 11:12:14', '2020-07-08 11:12:14', NULL),
(47, 4, '127.0.0.1', 1, '2020-07-09 11:33:09', '2020-07-09 11:33:09', NULL),
(48, 4, '127.0.0.1', 1, '2020-07-10 12:54:58', '2020-07-10 12:54:58', NULL),
(49, 4, '127.0.0.1', 1, '2020-07-10 16:34:25', '2020-07-10 16:34:25', NULL),
(50, 4, '127.0.0.1', 1, '2020-07-17 11:03:33', '2020-07-17 11:03:33', NULL),
(51, 18, '127.0.0.1', 1, '2020-07-17 14:39:04', '2020-07-17 14:39:04', NULL),
(52, 7, '127.0.0.1', 1, '2020-07-17 14:45:07', '2020-07-17 14:45:07', NULL),
(53, 4, '127.0.0.1', 1, '2020-07-17 14:46:56', '2020-07-17 14:46:56', NULL),
(54, 7, '127.0.0.1', 1, '2020-07-17 17:24:48', '2020-07-17 17:24:48', NULL),
(55, 7, '127.0.0.1', 1, '2020-07-17 17:30:17', '2020-07-17 17:30:17', NULL),
(56, 4, '127.0.0.1', 1, '2020-07-17 17:31:08', '2020-07-17 17:31:08', NULL),
(57, 7, '127.0.0.1', 1, '2020-07-17 17:34:31', '2020-07-17 17:34:31', NULL),
(58, 20, '127.0.0.1', 1, '2020-07-17 17:36:41', '2020-07-17 17:36:41', NULL),
(59, 4, '127.0.0.1', 1, '2020-07-17 17:37:56', '2020-07-17 17:37:56', NULL),
(60, 7, '127.0.0.1', 1, '2020-07-17 17:58:17', '2020-07-17 17:58:17', NULL),
(61, 4, '127.0.0.1', 1, '2020-07-17 18:08:42', '2020-07-17 18:08:42', NULL),
(62, 4, '127.0.0.1', 1, '2020-07-17 20:38:09', '2020-07-17 20:38:09', NULL),
(63, 4, '127.0.0.1', 1, '2020-07-20 12:00:02', '2020-07-20 12:00:02', NULL),
(64, 17, '127.0.0.1', 1, '2020-07-20 12:47:24', '2020-07-20 12:47:24', NULL),
(65, 4, '127.0.0.1', 1, '2020-07-20 13:11:46', '2020-07-20 13:11:46', NULL),
(66, 17, '127.0.0.1', 1, '2020-07-21 12:28:08', '2020-07-21 12:28:08', NULL),
(67, 4, '127.0.0.1', 1, '2020-07-21 17:58:28', '2020-07-21 17:58:28', NULL),
(68, 4, '127.0.0.1', 1, '2020-07-22 11:04:24', '2020-07-22 11:04:24', NULL),
(69, 4, '127.0.0.1', 1, '2020-07-23 11:17:20', '2020-07-23 11:17:20', NULL),
(70, 4, '127.0.0.1', 1, '2020-07-23 13:26:59', '2020-07-23 13:26:59', NULL),
(71, 4, '127.0.0.1', 1, '2020-07-23 18:36:56', '2020-07-23 18:36:56', NULL),
(72, 4, '127.0.0.1', 1, '2020-07-24 11:50:03', '2020-07-24 11:50:03', NULL),
(73, 4, '127.0.0.1', 1, '2020-07-27 11:34:30', '2020-07-27 11:34:30', NULL),
(74, 4, '127.0.0.1', 1, '2020-07-27 17:36:02', '2020-07-27 17:36:02', NULL),
(75, 4, '127.0.0.1', 1, '2020-07-28 11:28:08', '2020-07-28 11:28:08', NULL),
(76, 4, '127.0.0.1', 1, '2020-07-28 15:57:02', '2020-07-28 15:57:02', NULL),
(77, 4, '127.0.0.1', 1, '2020-07-30 14:25:02', '2020-07-30 14:25:02', NULL),
(78, 4, '127.0.0.1', 1, '2020-07-30 20:01:50', '2020-07-30 20:01:50', NULL),
(79, 4, '127.0.0.1', 1, '2020-07-31 11:00:48', '2020-07-31 11:00:48', NULL),
(80, 4, '127.0.0.1', 1, '2020-07-31 17:07:41', '2020-07-31 17:07:41', NULL),
(81, 4, '127.0.0.1', 1, '2020-08-03 11:20:44', '2020-08-03 11:20:44', NULL),
(82, 4, '127.0.0.1', 1, '2020-08-03 18:54:51', '2020-08-03 18:54:51', NULL),
(83, 4, '127.0.0.1', 1, '2020-08-04 12:02:41', '2020-08-04 12:02:41', NULL),
(84, 4, '127.0.0.1', 1, '2020-08-04 17:39:14', '2020-08-04 17:39:14', NULL),
(85, 4, '127.0.0.1', 1, '2020-08-05 12:34:00', '2020-08-05 12:34:00', NULL),
(86, 4, '127.0.0.1', 1, '2020-08-05 17:09:02', '2020-08-05 17:09:02', NULL),
(87, 4, '127.0.0.1', 1, '2020-08-06 11:42:58', '2020-08-06 11:42:58', NULL),
(88, 4, '127.0.0.1', 1, '2020-08-06 17:10:51', '2020-08-06 17:10:51', NULL),
(89, 4, '127.0.0.1', 1, '2020-08-07 11:18:39', '2020-08-07 11:18:39', NULL),
(90, 4, '127.0.0.1', 1, '2020-08-07 13:55:27', '2020-08-07 13:55:27', NULL),
(91, 4, '127.0.0.1', 1, '2020-08-07 17:17:20', '2020-08-07 17:17:20', NULL),
(92, 4, '127.0.0.1', 1, '2020-08-07 20:23:46', '2020-08-07 20:23:46', NULL),
(93, 4, '127.0.0.1', 1, '2020-08-10 11:37:46', '2020-08-10 11:37:46', NULL),
(94, 4, '127.0.0.1', 1, '2020-08-11 13:23:14', '2020-08-11 13:23:14', NULL),
(95, 7, '127.0.0.1', 1, '2020-08-12 13:09:06', '2020-08-12 13:09:06', NULL),
(96, 7, '127.0.0.1', 1, '2020-08-13 13:35:55', '2020-08-13 13:35:55', NULL),
(97, 7, '127.0.0.1', 1, '2020-08-14 11:25:02', '2020-08-14 11:25:02', NULL),
(98, 7, '127.0.0.1', 1, '2020-08-14 19:54:27', '2020-08-14 19:54:27', NULL),
(99, 7, '127.0.0.1', 1, '2020-08-17 11:22:53', '2020-08-17 11:22:53', NULL),
(100, 7, '127.0.0.1', 1, '2020-08-17 17:11:47', '2020-08-17 17:11:47', NULL),
(101, 7, '127.0.0.1', 1, '2020-08-18 11:25:43', '2020-08-18 11:25:43', NULL),
(102, 7, '127.0.0.1', 1, '2020-08-18 17:47:17', '2020-08-18 17:47:17', NULL),
(103, 7, '127.0.0.1', 1, '2020-08-18 19:52:14', '2020-08-18 19:52:14', NULL),
(104, 7, '127.0.0.1', 1, '2020-08-19 11:06:29', '2020-08-19 11:06:29', NULL),
(105, 7, '127.0.0.1', 1, '2020-08-19 13:16:25', '2020-08-19 13:16:25', NULL),
(106, 7, '127.0.0.1', 1, '2020-08-19 19:50:46', '2020-08-19 19:50:46', NULL),
(107, 7, '127.0.0.1', 1, '2020-08-20 11:24:36', '2020-08-20 11:24:36', NULL),
(108, 7, '127.0.0.1', 1, '2020-08-20 17:41:52', '2020-08-20 17:41:52', NULL),
(109, 7, '127.0.0.1', 1, '2020-08-21 11:38:49', '2020-08-21 11:38:49', NULL),
(110, 7, '127.0.0.1', 1, '2020-08-21 17:11:57', '2020-08-21 17:11:57', NULL),
(111, 7, '127.0.0.1', 1, '2020-08-24 11:29:44', '2020-08-24 11:29:44', NULL),
(112, 7, '127.0.0.1', 1, '2020-08-24 17:23:04', '2020-08-24 17:23:04', NULL),
(113, 7, '127.0.0.1', 1, '2020-08-25 13:23:25', '2020-08-25 13:23:25', NULL),
(114, 7, '127.0.0.1', 1, '2020-08-25 18:57:16', '2020-08-25 18:57:16', NULL),
(115, 7, '127.0.0.1', 1, '2020-08-26 11:12:01', '2020-08-26 11:12:01', NULL),
(116, 7, '127.0.0.1', 1, '2020-08-26 14:58:07', '2020-08-26 14:58:07', NULL),
(117, 7, '127.0.0.1', 1, '2020-08-26 20:27:47', '2020-08-26 20:27:47', NULL),
(118, 7, '127.0.0.1', 1, '2020-08-27 11:02:31', '2020-08-27 11:02:31', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
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
(81, '2020_04_16_191201_create_system_companies_table', 6),
(85, '2020_05_26_105124_create_anamneses_table', 6),
(86, '2020_05_26_105153_create_periodicals_table', 6),
(88, '2020_05_20_100638_create_asos_table', 7),
(89, '2020_05_26_105233_create_screenings_table', 8),
(95, '2020_04_22_173401_create_employees_table', 9),
(99, '2020_04_28_113750_create_doctors_table', 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `periodicals`
--

CREATE TABLE `periodicals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissions`
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
-- Despejando dados para a tabela `permissions`
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
(104, 'trash', 'Acesso ao Módulo da Lixeira', '2020-02-14 18:54:40', '2020-02-14 18:54:40', NULL),
(105, 'blog', 'Acesso ao Módulo de Blogs', '2020-07-17 13:18:02', '2020-07-17 13:18:02', NULL),
(106, 'blog-create', 'Criar Blogs', '2020-07-17 13:18:02', '2020-07-17 13:18:02', NULL),
(107, 'blog-destroyFake', 'Remover Blogs', '2020-07-17 13:18:02', '2020-07-17 13:18:02', NULL),
(108, 'blog-clearTable', 'Limpar Tabela de Blogs', '2020-07-17 13:18:02', '2020-07-17 13:18:02', NULL),
(109, 'blog-edit', 'Visualizar Detalhes de Blogs', '2020-07-17 13:18:02', '2020-07-17 13:18:02', NULL),
(110, 'blog-update', 'Atualizar Blogs', '2020-07-17 13:18:02', '2020-07-17 13:18:02', NULL),
(111, 'blog-trash', 'Acessar Lixeira de Blogs', '2020-07-17 13:18:02', '2020-07-17 13:18:02', NULL),
(112, 'blog-editTrash', 'Visualizar Detalhes da Lixeira de Blogs', '2020-07-17 13:18:02', '2020-07-17 13:18:02', NULL),
(113, 'blog-updateTrash', 'Atualizar Blogs da Lixeira', '2020-07-17 13:18:02', '2020-07-17 13:18:02', NULL),
(114, 'blog-restore', 'Restaurar Blogs da Lixeira', '2020-07-17 13:18:02', '2020-07-17 13:18:02', NULL),
(115, 'blog-destroy', 'Remover Blogs Permanentemente', '2020-07-17 13:18:02', '2020-07-17 13:18:02', NULL),
(116, 'blog-clearTableForce', 'Limpar Tabela de Blogs Permanentemente', '2020-07-17 13:18:02', '2020-07-17 13:18:02', NULL),
(117, 'company', 'Acesso ao Módulo de Endereços', '2020-07-17 13:22:26', '2020-07-17 13:22:26', NULL),
(118, 'company-create', 'Criar Endereços', '2020-07-17 13:22:26', '2020-07-17 13:22:26', NULL),
(119, 'company-destroyFake', 'Remover Endereços', '2020-07-17 13:22:26', '2020-07-17 13:22:26', NULL),
(120, 'company-clearTable', 'Limpar Tabela de Endereços', '2020-07-17 13:22:26', '2020-07-17 13:22:26', NULL),
(121, 'company-edit', 'Visualizar Detalhes de Endereços', '2020-07-17 13:22:26', '2020-07-17 13:22:26', NULL),
(122, 'company-update', 'Atualizar Endereços', '2020-07-17 13:22:26', '2020-07-17 13:22:26', NULL),
(123, 'company-trash', 'Acessar Lixeira de Endereços', '2020-07-17 13:22:26', '2020-07-17 13:22:26', NULL),
(124, 'company-editTrash', 'Visualizar Detalhes da Lixeira de Endereços', '2020-07-17 13:22:26', '2020-07-17 13:22:26', NULL),
(125, 'company-updateTrash', 'Atualizar Endereços da Lixeira', '2020-07-17 13:22:26', '2020-07-17 13:22:26', NULL),
(126, 'company-restore', 'Restaurar Endereços da Lixeira', '2020-07-17 13:22:26', '2020-07-17 13:22:26', NULL),
(127, 'company-destroy', 'Remover Endereços Permanentemente', '2020-07-17 13:22:26', '2020-07-17 13:22:26', NULL),
(128, 'company-clearTableForce', 'Limpar Tabela de Endereços Permanentemente', '2020-07-17 13:22:26', '2020-07-17 13:22:26', NULL),
(129, 'funfact', 'Acesso ao Módulo de Fatos interessantes', '2020-07-17 13:24:07', '2020-07-17 13:24:07', NULL),
(130, 'funfact-create', 'Criar Fatos interessantes', '2020-07-17 13:24:07', '2020-07-17 13:24:07', NULL),
(131, 'funfact-destroyFake', 'Remover Fatos interessantes', '2020-07-17 13:24:07', '2020-07-17 13:24:07', NULL),
(132, 'funfact-clearTable', 'Limpar Tabela de Fatos interessantes', '2020-07-17 13:24:07', '2020-07-17 13:24:07', NULL),
(133, 'funfact-edit', 'Visualizar Detalhes de Fatos interessantes', '2020-07-17 13:24:07', '2020-07-17 13:24:07', NULL),
(134, 'funfact-update', 'Atualizar Fatos interessantes', '2020-07-17 13:24:07', '2020-07-17 13:24:07', NULL),
(135, 'funfact-trash', 'Acessar Lixeira de Fatos interessantes', '2020-07-17 13:24:07', '2020-07-17 13:24:07', NULL),
(136, 'funfact-editTrash', 'Visualizar Detalhes da Lixeira de Fatos interessantes', '2020-07-17 13:24:07', '2020-07-17 13:24:07', NULL),
(137, 'funfact-updateTrash', 'Atualizar Fatos interessantes da Lixeira', '2020-07-17 13:24:07', '2020-07-17 13:24:07', NULL),
(138, 'funfact-restore', 'Restaurar Fatos interessantes da Lixeira', '2020-07-17 13:24:07', '2020-07-17 13:24:07', NULL),
(139, 'funfact-destroy', 'Remover Fatos interessantes Permanentemente', '2020-07-17 13:24:07', '2020-07-17 13:24:07', NULL),
(140, 'funfact-clearTableForce', 'Limpar Tabela de Fatos interessantes Permanentemente', '2020-07-17 13:24:07', '2020-07-17 13:24:07', NULL),
(141, 'portfolio', 'Acesso ao Módulo de Portifolio', '2020-07-17 13:25:44', '2020-07-17 13:25:44', NULL),
(142, 'portfolio-create', 'Criar Portifolio', '2020-07-17 13:25:44', '2020-07-17 13:25:44', NULL),
(143, 'portfolio-destroyFake', 'Remover Portifolio', '2020-07-17 13:25:44', '2020-07-17 13:25:44', NULL),
(144, 'portfolio-clearTable', 'Limpar Tabela de Portifolio', '2020-07-17 13:25:44', '2020-07-17 13:25:44', NULL),
(145, 'portfolio-edit', 'Visualizar Detalhes de Portifolio', '2020-07-17 13:25:44', '2020-07-17 13:25:44', NULL),
(146, 'portfolio-update', 'Atualizar Portifolio', '2020-07-17 13:25:44', '2020-07-17 13:25:44', NULL),
(147, 'portfolio-trash', 'Acessar Lixeira de Portifolio', '2020-07-17 13:25:44', '2020-07-17 13:25:44', NULL),
(148, 'portfolio-editTrash', 'Visualizar Detalhes da Lixeira de Portifolio', '2020-07-17 13:25:44', '2020-07-17 13:25:44', NULL),
(149, 'portfolio-updateTrash', 'Atualizar Portifolio da Lixeira', '2020-07-17 13:25:44', '2020-07-17 13:25:44', NULL),
(150, 'portfolio-restore', 'Restaurar Portifolio da Lixeira', '2020-07-17 13:25:44', '2020-07-17 13:25:44', NULL),
(151, 'portfolio-destroy', 'Remover Portifolio Permanentemente', '2020-07-17 13:25:44', '2020-07-17 13:25:44', NULL),
(152, 'portfolio-clearTableForce', 'Limpar Tabela de Portifolio Permanentemente', '2020-07-17 13:25:44', '2020-07-17 13:25:44', NULL),
(153, 'service', 'Acesso ao Módulo de Serviços', '2020-07-17 13:26:26', '2020-07-17 13:26:26', NULL),
(154, 'service-create', 'Criar Serviços', '2020-07-17 13:26:26', '2020-07-17 13:26:26', NULL),
(155, 'service-destroyFake', 'Remover Serviços', '2020-07-17 13:26:26', '2020-07-17 13:26:26', NULL),
(156, 'service-clearTable', 'Limpar Tabela de Serviços', '2020-07-17 13:26:26', '2020-07-17 13:26:26', NULL),
(157, 'service-edit', 'Visualizar Detalhes de Serviços', '2020-07-17 13:26:26', '2020-07-17 13:26:26', NULL),
(158, 'service-update', 'Atualizar Serviços', '2020-07-17 13:26:26', '2020-07-17 13:26:26', NULL),
(159, 'service-trash', 'Acessar Lixeira de Serviços', '2020-07-17 13:26:26', '2020-07-17 13:26:26', NULL),
(160, 'service-editTrash', 'Visualizar Detalhes da Lixeira de Serviços', '2020-07-17 13:26:26', '2020-07-17 13:26:26', NULL),
(161, 'service-updateTrash', 'Atualizar Serviços da Lixeira', '2020-07-17 13:26:26', '2020-07-17 13:26:26', NULL),
(162, 'service-restore', 'Restaurar Serviços da Lixeira', '2020-07-17 13:26:26', '2020-07-17 13:26:26', NULL),
(163, 'service-destroy', 'Remover Serviços Permanentemente', '2020-07-17 13:26:26', '2020-07-17 13:26:26', NULL),
(164, 'service-clearTableForce', 'Limpar Tabela de Serviços Permanentemente', '2020-07-17 13:26:26', '2020-07-17 13:26:26', NULL),
(165, 'system-companies', 'Acesso ao Módulo de Empresa-Sistema', '2020-07-17 13:49:58', '2020-07-17 13:49:58', NULL),
(166, 'system-companies-create', 'Criar Empresa-Sistema', '2020-07-17 13:49:58', '2020-07-17 13:49:58', NULL),
(167, 'system-companies-destroyFake', 'Remover Empresa-Sistema', '2020-07-17 13:49:58', '2020-07-17 13:49:58', NULL),
(168, 'system-companies-clearTable', 'Limpar Tabela de Empresa-Sistema', '2020-07-17 13:49:58', '2020-07-17 13:49:58', NULL),
(169, 'system-companies-edit', 'Visualizar Detalhes de Empresa-Sistema', '2020-07-17 13:49:58', '2020-07-17 13:49:58', NULL),
(170, 'system-companies-update', 'Atualizar Empresa-Sistema', '2020-07-17 13:49:58', '2020-07-17 13:49:58', NULL),
(171, 'system-companies-trash', 'Acessar Lixeira de Empresa-Sistema', '2020-07-17 13:49:58', '2020-07-17 13:49:58', NULL),
(172, 'system-companies-editTrash', 'Visualizar Detalhes da Lixeira de Empresa-Sistema', '2020-07-17 13:49:58', '2020-07-17 13:49:58', NULL),
(173, 'system-companies-updateTrash', 'Atualizar Empresa-Sistema da Lixeira', '2020-07-17 13:49:58', '2020-07-17 13:49:58', NULL),
(174, 'system-companies-restore', 'Restaurar Empresa-Sistema da Lixeira', '2020-07-17 13:49:58', '2020-07-17 13:49:58', NULL),
(175, 'system-companies-destroy', 'Remover Empresa-Sistema Permanentemente', '2020-07-17 13:49:58', '2020-07-17 13:49:58', NULL),
(176, 'system-companies-clearTableForce', 'Limpar Tabela de Empresa-Sistema Permanentemente', '2020-07-17 13:49:58', '2020-07-17 13:49:58', NULL),
(177, 'employees', 'Acesso ao Módulo de Funcionários', '2020-07-17 13:52:20', '2020-07-17 13:52:20', NULL),
(178, 'employees-create', 'Criar Funcionários', '2020-07-17 13:52:20', '2020-07-17 13:52:20', NULL),
(179, 'employees-destroyFake', 'Remover Funcionários', '2020-07-17 13:52:20', '2020-07-17 13:52:20', NULL),
(180, 'employees-clearTable', 'Limpar Tabela de Funcionários', '2020-07-17 13:52:20', '2020-07-17 13:52:20', NULL),
(181, 'employees-edit', 'Visualizar Detalhes de Funcionários', '2020-07-17 13:52:20', '2020-07-17 13:52:20', NULL),
(182, 'employees-update', 'Atualizar Funcionários', '2020-07-17 13:52:20', '2020-07-17 13:52:20', NULL),
(183, 'employees-trash', 'Acessar Lixeira de Funcionários', '2020-07-17 13:52:20', '2020-07-17 13:52:20', NULL),
(184, 'employees-editTrash', 'Visualizar Detalhes da Lixeira de Funcionários', '2020-07-17 13:52:20', '2020-07-17 13:52:20', NULL),
(185, 'employees-updateTrash', 'Atualizar Funcionários da Lixeira', '2020-07-17 13:52:20', '2020-07-17 13:52:20', NULL),
(186, 'employees-restore', 'Restaurar Funcionários da Lixeira', '2020-07-17 13:52:20', '2020-07-17 13:52:20', NULL),
(187, 'employees-destroy', 'Remover Funcionários Permanentemente', '2020-07-17 13:52:20', '2020-07-17 13:52:20', NULL),
(188, 'employees-clearTableForce', 'Limpar Tabela de Funcionários Permanentemente', '2020-07-17 13:52:20', '2020-07-17 13:52:20', NULL),
(189, 'doctors', 'Acesso ao Módulo de Médicos', '2020-07-17 13:53:39', '2020-07-17 13:53:39', NULL),
(190, 'doctors-create', 'Criar Médicos', '2020-07-17 13:53:39', '2020-07-17 13:53:39', NULL),
(191, 'doctors-destroyFake', 'Remover Médicos', '2020-07-17 13:53:39', '2020-07-17 13:53:39', NULL),
(192, 'doctors-clearTable', 'Limpar Tabela de Médicos', '2020-07-17 13:53:39', '2020-07-17 13:53:39', NULL),
(193, 'doctors-edit', 'Visualizar Detalhes de Médicos', '2020-07-17 13:53:39', '2020-07-17 13:53:39', NULL),
(194, 'doctors-update', 'Atualizar Médicos', '2020-07-17 13:53:39', '2020-07-17 13:53:39', NULL),
(195, 'doctors-trash', 'Acessar Lixeira de Médicos', '2020-07-17 13:53:39', '2020-07-17 13:53:39', NULL),
(196, 'doctors-editTrash', 'Visualizar Detalhes da Lixeira de Médicos', '2020-07-17 13:53:39', '2020-07-17 13:53:39', NULL),
(197, 'doctors-updateTrash', 'Atualizar Médicos da Lixeira', '2020-07-17 13:53:39', '2020-07-17 13:53:39', NULL),
(198, 'doctors-restore', 'Restaurar Médicos da Lixeira', '2020-07-17 13:53:39', '2020-07-17 13:53:39', NULL),
(199, 'doctors-destroy', 'Remover Médicos Permanentemente', '2020-07-17 13:53:39', '2020-07-17 13:53:39', NULL),
(200, 'doctors-clearTableForce', 'Limpar Tabela de Médicos Permanentemente', '2020-07-17 13:53:39', '2020-07-17 13:53:39', NULL),
(201, 'aso', 'Acesso ao Módulo de Asos', '2020-07-17 13:54:04', '2020-07-17 13:54:04', NULL),
(202, 'aso-create', 'Criar Asos', '2020-07-17 13:54:04', '2020-07-17 13:54:04', NULL),
(203, 'aso-destroyFake', 'Remover Asos', '2020-07-17 13:54:04', '2020-07-17 13:54:04', NULL),
(204, 'aso-clearTable', 'Limpar Tabela de Asos', '2020-07-17 13:54:04', '2020-07-17 13:54:04', NULL),
(205, 'aso-edit', 'Visualizar Detalhes de Asos', '2020-07-17 13:54:04', '2020-07-17 13:54:04', NULL),
(206, 'aso-update', 'Atualizar Asos', '2020-07-17 13:54:04', '2020-07-17 13:54:04', NULL),
(207, 'aso-trash', 'Acessar Lixeira de Asos', '2020-07-17 13:54:04', '2020-07-17 13:54:04', NULL),
(208, 'aso-editTrash', 'Visualizar Detalhes da Lixeira de Asos', '2020-07-17 13:54:04', '2020-07-17 13:54:04', NULL),
(209, 'aso-updateTrash', 'Atualizar Asos da Lixeira', '2020-07-17 13:54:04', '2020-07-17 13:54:04', NULL),
(210, 'aso-restore', 'Restaurar Asos da Lixeira', '2020-07-17 13:54:04', '2020-07-17 13:54:04', NULL),
(211, 'aso-destroy', 'Remover Asos Permanentemente', '2020-07-17 13:54:04', '2020-07-17 13:54:04', NULL),
(212, 'aso-clearTableForce', 'Limpar Tabela de Asos Permanentemente', '2020-07-17 13:54:04', '2020-07-17 13:54:04', NULL),
(213, 'anamnese', 'Acesso ao Módulo de Anamneses', '2020-07-17 13:54:29', '2020-07-17 13:54:29', NULL),
(214, 'anamnese-create', 'Criar Anamneses', '2020-07-17 13:54:29', '2020-07-17 13:54:29', NULL),
(215, 'anamnese-destroyFake', 'Remover Anamneses', '2020-07-17 13:54:29', '2020-07-17 13:54:29', NULL),
(216, 'anamnese-clearTable', 'Limpar Tabela de Anamneses', '2020-07-17 13:54:29', '2020-07-17 13:54:29', NULL),
(217, 'anamnese-edit', 'Visualizar Detalhes de Anamneses', '2020-07-17 13:54:29', '2020-07-17 13:54:29', NULL),
(218, 'anamnese-update', 'Atualizar Anamneses', '2020-07-17 13:54:29', '2020-07-17 13:54:29', NULL),
(219, 'anamnese-trash', 'Acessar Lixeira de Anamneses', '2020-07-17 13:54:29', '2020-07-17 13:54:29', NULL),
(220, 'anamnese-editTrash', 'Visualizar Detalhes da Lixeira de Anamneses', '2020-07-17 13:54:29', '2020-07-17 13:54:29', NULL),
(221, 'anamnese-updateTrash', 'Atualizar Anamneses da Lixeira', '2020-07-17 13:54:29', '2020-07-17 13:54:29', NULL),
(222, 'anamnese-restore', 'Restaurar Anamneses da Lixeira', '2020-07-17 13:54:29', '2020-07-17 13:54:29', NULL),
(223, 'anamnese-destroy', 'Remover Anamneses Permanentemente', '2020-07-17 13:54:29', '2020-07-17 13:54:29', NULL),
(224, 'anamnese-clearTableForce', 'Limpar Tabela de Anamneses Permanentemente', '2020-07-17 13:54:29', '2020-07-17 13:54:29', NULL),
(225, 'screening', 'Acesso ao Módulo de Triagens', '2020-07-17 13:55:13', '2020-07-17 13:55:13', NULL),
(226, 'screening-create', 'Criar Triagens', '2020-07-17 13:55:13', '2020-07-17 13:55:13', NULL),
(227, 'screening-destroyFake', 'Remover Triagens', '2020-07-17 13:55:13', '2020-07-17 13:55:13', NULL),
(228, 'screening-clearTable', 'Limpar Tabela de Triagens', '2020-07-17 13:55:13', '2020-07-17 13:55:13', NULL),
(229, 'screening-edit', 'Visualizar Detalhes de Triagens', '2020-07-17 13:55:13', '2020-07-17 13:55:13', NULL),
(230, 'screening-update', 'Atualizar Triagens', '2020-07-17 13:55:13', '2020-07-17 13:55:13', NULL),
(231, 'screening-trash', 'Acessar Lixeira de Triagens', '2020-07-17 13:55:13', '2020-07-17 13:55:13', NULL),
(232, 'screening-editTrash', 'Visualizar Detalhes da Lixeira de Triagens', '2020-07-17 13:55:13', '2020-07-17 13:55:13', NULL),
(233, 'screening-updateTrash', 'Atualizar Triagens da Lixeira', '2020-07-17 13:55:13', '2020-07-17 13:55:13', NULL),
(234, 'screening-restore', 'Restaurar Triagens da Lixeira', '2020-07-17 13:55:13', '2020-07-17 13:55:13', NULL),
(235, 'screening-destroy', 'Remover Triagens Permanentemente', '2020-07-17 13:55:13', '2020-07-17 13:55:13', NULL),
(236, 'screening-clearTableForce', 'Limpar Tabela de Triagens Permanentemente', '2020-07-17 13:55:13', '2020-07-17 13:55:13', NULL),
(237, 'system', 'Acesso ao módulo sistema', '2020-07-17 14:31:08', '2020-07-17 14:31:08', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `permission_role`
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
-- Despejando dados para a tabela `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2453, 42, 9, '2020-02-17 18:14:09', '2020-02-17 18:14:09', NULL),
(2454, 47, 9, '2020-02-17 18:14:09', '2020-02-17 18:14:09', NULL),
(2455, 43, 9, '2020-02-17 18:14:09', '2020-02-17 18:14:09', NULL),
(2456, 46, 9, '2020-02-17 18:14:09', '2020-02-17 18:14:09', NULL),
(2457, 42, 3, '2020-02-17 18:14:30', '2020-02-17 18:14:30', NULL),
(2458, 46, 3, '2020-02-17 18:14:30', '2020-02-17 18:14:30', NULL),
(3507, 219, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3508, 207, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3509, 48, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3510, 111, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3511, 171, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3512, 123, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3513, 135, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3514, 183, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3515, 195, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3516, 72, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3517, 96, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3518, 60, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3519, 84, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3520, 147, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3521, 159, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3522, 231, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3523, 36, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3524, 104, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3525, 213, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3526, 201, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3527, 42, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3528, 105, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3529, 165, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3530, 117, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3531, 129, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3532, 177, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3533, 189, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3534, 141, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3535, 153, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3536, 225, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3537, 30, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3538, 237, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3539, 218, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3540, 221, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3541, 206, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3542, 209, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3543, 47, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3544, 50, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3545, 110, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3546, 113, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3547, 170, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3548, 173, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3549, 122, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3550, 125, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3551, 134, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3552, 137, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3553, 182, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3554, 185, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3555, 194, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3556, 197, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3557, 71, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3558, 95, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3559, 98, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3560, 74, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3561, 59, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3562, 83, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3563, 86, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3564, 62, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3565, 146, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3566, 149, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3567, 158, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3568, 161, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3569, 230, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3570, 233, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3571, 35, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3572, 38, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3573, 214, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3574, 202, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3575, 43, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3576, 106, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3577, 166, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3578, 118, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3579, 130, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3580, 178, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3581, 190, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3582, 67, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3583, 91, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3584, 55, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3585, 79, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3586, 142, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3587, 154, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3588, 226, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3589, 31, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3590, 216, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3591, 204, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3592, 45, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3593, 108, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3594, 168, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3595, 120, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3596, 132, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3597, 180, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3598, 192, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3599, 69, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3600, 93, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3601, 57, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3602, 81, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3603, 144, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3604, 156, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3605, 228, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3606, 215, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3607, 203, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3608, 44, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3609, 107, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3610, 167, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3611, 119, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3612, 131, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3613, 179, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3614, 191, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3615, 68, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3616, 92, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3617, 56, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3618, 80, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3619, 143, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3620, 155, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3621, 227, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3622, 222, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3623, 210, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3624, 51, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3625, 114, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3626, 174, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3627, 126, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3628, 138, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3629, 186, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3630, 198, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3631, 99, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3632, 75, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3633, 87, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3634, 63, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3635, 150, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3636, 162, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3637, 234, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3638, 39, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3639, 220, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3640, 208, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3641, 49, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3642, 112, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3643, 172, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3644, 124, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3645, 136, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3646, 184, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3647, 196, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3648, 73, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3649, 97, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3650, 61, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3651, 85, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3652, 148, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3653, 160, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3654, 232, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3655, 37, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3656, 217, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3657, 205, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3658, 46, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3659, 109, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3660, 169, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3661, 121, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3662, 133, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3663, 181, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3664, 193, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3665, 70, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3666, 94, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3667, 58, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3668, 82, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3669, 145, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3670, 157, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3671, 229, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL),
(3672, 34, 1, '2020-07-20 13:14:56', '2020-07-20 13:14:56', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `portfolios`
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
(28, 'SToledo', '202004160108305e97da3ebbf38.png', 'SToledo', 1, '2020-04-16 04:08:30', '2020-04-16 04:08:30', NULL),
(29, 'Lojão Paraíba Center', '202007240906175f1aceb9f1911.jpg', 'Lojão Paraíba Center', 1, '2020-07-24 12:06:18', '2020-07-24 12:06:18', NULL),
(30, 'Chinatown Campina Grande', '202007240908345f1acf42687b7.jpg', 'Chinatown Campina Grande', 1, '2020-07-24 12:08:34', '2020-07-24 12:08:34', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `roles`
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
-- Despejando dados para a tabela `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'adm', 'Administrador', '2020-02-07 14:00:00', '2020-02-10 20:13:05', NULL),
(3, 'super-basico', 'Usuário Super Básico', '2020-02-10 20:07:59', '2020-02-10 20:13:12', NULL),
(6, 'super-adm', 'Super Administrador', '2020-02-11 20:04:58', '2020-02-11 20:04:58', NULL),
(9, 'basico', 'Básico', '2020-02-13 21:31:00', '2020-02-13 21:31:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `role_user`
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
-- Despejando dados para a tabela `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 6, 4, '2020-02-11 20:05:25', '2020-02-11 20:05:25', NULL),
(12, 1, 7, '2020-02-13 13:43:19', '2020-02-14 17:35:25', NULL),
(16, 6, 6, '2020-02-13 21:08:56', '2020-02-17 12:58:04', NULL),
(18, 9, 6, '2020-02-13 21:31:46', '2020-07-17 14:32:13', '2020-07-17 11:07:13'),
(19, 6, 19, '2020-07-17 14:38:10', '2020-07-17 14:38:10', NULL),
(20, 1, 17, '2020-07-17 14:38:22', '2020-07-17 14:38:22', NULL),
(21, 1, 18, '2020-07-17 14:38:35', '2020-07-17 14:38:35', NULL),
(22, 6, 7, '2020-07-17 17:26:43', '2020-07-17 17:27:03', '2020-07-17 14:07:03'),
(23, 6, 7, '2020-07-17 17:28:51', '2020-07-17 17:28:59', '2020-07-17 14:07:59'),
(24, 6, 20, '2020-07-17 17:35:19', '2020-07-17 17:35:19', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `screenings`
--

CREATE TABLE `screenings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `services`
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
-- Estrutura para tabela `standards`
--

CREATE TABLE `standards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `system_companies`
--

CREATE TABLE `system_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fantasyname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `system_companies`
--

INSERT INTO `system_companies` (`id`, `name`, `cnpj`, `fantasyname`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Stoledo', '12312312312', 'SStoledo', 1, '2020-08-27 14:51:53', '2020-08-27 14:51:53', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Charles de Azevedo Júnior', '202002061646465e3c6d26dbd92.jpg', 'charles@stoledo.com.br', NULL, '$2y$10$1LDlyIwheTQjrbaoJQHALezX3cvSr3NyQC9IyJLXrYejjAXL8D30m', 1, '9ZPKSBM3NDU597mT1o6tBKbPmEzDeDm0RIRVrLZQjYt8ZdRZ7lxuLsil9b0k', '2020-02-06 19:46:46', '2020-02-14 20:18:40', NULL),
(6, 'Clearlison Nóbrega', '202002111707395e43098b088db.jpg', 'clearlison@stoledo.com.br', NULL, '$2y$10$7lblEc1gg42OIvSz.0YPvuWYUO6qmOiJ6yxfwFp3Vn7E44dKcwhJO', 1, 'NbxJMd7QTgctH9Kmfe8gyUinte7A4t1YhhL0UDF8a2rBrTYoRRUhmhyOCvb0', '2020-02-11 20:07:39', '2020-02-14 20:08:19', NULL),
(7, 'Cris Henrique', '202002120853125e43e728da079.jpg', 'cris@stoledo.com.br', NULL, '$2y$10$GKQPw0gTaQbiahBCakp8fOprZcgfMDa59e7PieKw.5OJjCmW4TroK', 1, NULL, '2020-02-11 20:56:27', '2020-02-13 17:44:19', NULL),
(8, 'Joca da Silva', '202002121051315e4402e37f170.jpg', 'joca@stoledo.com.br', NULL, '$2y$10$pZ.vkCYAbXOmJk/FUYL0Q.wktHux9gOHdh3l6EjRfvYEDRCodHmAu', 1, NULL, '2020-02-12 12:39:51', '2020-07-17 14:34:27', '2020-07-17 11:07:27'),
(9, 'Carla Cordeiro', '202002131527035e4594f7a40e4.jpg', 'carla@stoledo.com.br', NULL, '$2y$10$.g1FEoaDAXcUhs0d/5IR7eHt.AY8YHRnQLq0tThtru37qg.dRn0BC', 1, 'x3Po6nc8Z5EGk3bqQAijsiiZEAs45QBS2c2YisDf2hpD2crCrlNAXdjEBQoS', '2020-02-13 18:27:03', '2020-07-17 14:35:17', NULL),
(10, 'Jucelino Pereira', '202002140959455e4699c18719d.jpg', 'jucelino@stoledo.com.br', NULL, '$2y$10$gnNQ0LerhsAHu3H5GaZSP.LwnTPPx.PsGijwA.HI9BZnCfICb6Ru.', 1, NULL, '2020-02-14 12:59:45', '2020-07-17 14:34:27', '2020-07-17 11:07:27'),
(11, 'Dayane', '202002141001515e469a3f34d21.jpg', 'dayane@stoledo.com.br', NULL, '$2y$10$E3Hqz8GK54.AOvfg7nrud.tktVbplZNElUaI1F86OcC6Slo8PFL2.', 1, NULL, '2020-02-14 13:01:51', '2020-02-14 13:01:51', NULL),
(12, 'Andreza', '202002141002235e469a5f5bd71.jpg', 'andreza@stoledo.com.br', NULL, '$2y$10$gFhRms4MmjytxUtg3eV4yOUuRcivwBrgoRlz8dvzf7fsePoaRSapm', 1, NULL, '2020-02-14 13:02:23', '2020-02-14 13:02:23', NULL),
(13, 'Kevin', '202002141002505e469a7a766f9.jpg', 'kevin@stoledo.com.br', NULL, '$2y$10$mt6r8tcJRkrb5N75Pi.yt.ZWd3W1KvdcGXKawnq.g.KfS7Y5bFNhK', 1, NULL, '2020-02-14 13:02:50', '2020-02-14 13:02:50', NULL),
(14, 'Marta Severina', '202002141024535e469fa57e5d6.jpg', 'c37575024575037891537@sandbox.pagseguro.com.br', NULL, '$2y$10$hwzB1oxblrCeC7JTJ2boU.qXFkoskjP.vIlmczp/MYK67Fw4J7VK6', 1, NULL, '2020-02-14 13:24:53', '2020-07-17 14:34:37', '2020-07-17 11:07:37'),
(15, 'Maria Agripino', '202002141025435e469fd73ab1c.jpg', 'magripino@gmail.com', NULL, '$2y$10$InEkjUvSREjuCkia/z2z9.CXUacfSHCKRXz/JpO305bEl6u1xJ5oC', 1, NULL, '2020-02-14 13:25:43', '2020-07-17 14:34:37', '2020-07-17 11:07:37'),
(16, 'Adriano França', '202002141026485e46a018f3942.jpg', 'adriano@stoledo.com.br', NULL, '$2y$10$nzliK4n6VkLC1jLqd0cIredpl0d0/L.LAogh8hiOm7Nsqy49Ot/7y', 1, NULL, '2020-02-14 13:26:49', '2020-02-14 13:26:49', NULL),
(17, 'Jucy', '202007171136315f11b76f4f93f.jpg', 'jucy@getra.com.br', NULL, '$2y$10$l1vjzX0EELPkqnDJfPWreel8LRBwHiAYjr78AEBNltMw8ykWJwWpK', 1, NULL, '2020-07-17 14:36:31', '2020-07-17 14:36:31', NULL),
(18, 'Laís', '202007171137115f11b79707d24.jpg', 'lais@getra.com.br', NULL, '$2y$10$J4i8uDRyTvwVfpLXLAyMN.LOv/oaIY8FT7rylfwa9Mn4nhRe98GWS', 1, NULL, '2020-07-17 14:37:11', '2020-07-17 14:37:11', NULL),
(19, 'Sidney', '202007171137515f11b7bfc0c83.jpg', 'sidney@getra.com.br', NULL, '$2y$10$AsO4lrUCHscw8Yj1dgSeDOL3DwCLrIV.n6rdfgHykavnWkZ7e7CyS', 1, NULL, '2020-07-17 14:37:51', '2020-07-20 12:46:46', NULL),
(20, 'teste', '202007171435055f11e149dd90a.jpg', 'teste@teste.com', NULL, '$2y$10$74vl/gR8PMy4i61I6y9S/ub8Rmi0waS0tIr5aHElD0BJM57TdcQj.', 1, NULL, '2020-07-17 17:35:05', '2020-07-20 12:00:32', '2020-07-20 09:07:32');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `anamneses`
--
ALTER TABLE `anamneses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anamneses_employee_id_foreign` (`employee_id`);

--
-- Índices de tabela `asos`
--
ALTER TABLE `asos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asos_employee_id_foreign` (`employee_id`),
  ADD KEY `asos_doctor_id_foreign` (`doctor_id`);

--
-- Índices de tabela `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_company_id_foreign` (`company_id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `funfacts`
--
ALTER TABLE `funfacts`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_user_id_foreign` (`user_id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `periodicals`
--
ALTER TABLE `periodicals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periodicals_employee_id_foreign` (`employee_id`);

--
-- Índices de tabela `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Índices de tabela `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Índices de tabela `screenings`
--
ALTER TABLE `screenings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `screenings_employee_id_foreign` (`employee_id`);

--
-- Índices de tabela `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `standards`
--
ALTER TABLE `standards`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `system_companies`
--
ALTER TABLE `system_companies`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `anamneses`
--
ALTER TABLE `anamneses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `asos`
--
ALTER TABLE `asos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de tabela `periodicals`
--
ALTER TABLE `periodicals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT de tabela `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3673;

--
-- AUTO_INCREMENT de tabela `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `screenings`
--
ALTER TABLE `screenings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `anamneses`
--
ALTER TABLE `anamneses`
  ADD CONSTRAINT `anamneses_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `asos`
--
ALTER TABLE `asos`
  ADD CONSTRAINT `asos_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asos_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `system_companies` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `periodicals`
--
ALTER TABLE `periodicals`
  ADD CONSTRAINT `periodicals_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `screenings`
--
ALTER TABLE `screenings`
  ADD CONSTRAINT `screenings_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
