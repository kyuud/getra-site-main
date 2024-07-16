-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 10/07/2020 às 17:06
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
(1, 'Visita técnica dos alunos do CEAS', '202004160111105e97dade4cdc5.jpg', 'Fonte: Assessoria de Comunicação', '<p>Alunos do CEAS fazem visita técnica na manhã desta quarta-feira na Getra<br></p>', '<p>A Getra recebeu na manhã desta quarta-feira (29), a visita técnica dos alunos do curso de Saúde e Segurança do Trabalho do Ceas Escola Técnica. Uma manhã super proveitosa, onde os alunos puderam conhecer nossos profissionais, como também as nossas instalações e a rotina da nossa empresa, que preza pela competência no trabalho que executa. Com toda certeza os alunos saíram dessa visita com um olhar diferenciado acerca da Saúde e Segurança do Trabalho que foi a profissão escolhida por eles. Nossos colaboradores se sentem lisonjeados em poder colaborar com esses alunos.</p>', 1, '2020-04-16 04:11:10', '2020-04-16 04:11:10', NULL),
(2, 'Lombalgia lidera motivo de afastamento do trabalho', '202004160112405e97db385b91b.jpg', 'Fonte: https://www.contabeis.com.br/', '<p>Incômodo nas costas é o principal motivo que afasta trabalhadores dos seus postos<br></p>', '<p>Levantamento do Instituto Nacional do Seguro Social (INSS) aponta crescimento de 6% no volume de afastamento de trabalhadores por doenças ou complicações de saúde. Com mais de 83 mil casos, lombalgia (dor na região lombar) é a principal causa.</p><p>A falta de um programa de acompanhamento postural e uso correto dos equipamentos fornecidos pelas empresas estão entre os principais motivos que levam milhares de trabalhadores aos consultórios médicos com dores na região da lombar.</p><p>Dados da Organização Mundial de Saúde (OMS) apontam que que lombalgia é a segunda maior causa de visita aos consultórios médicos, perde apenas para dor de cabeça.</p><p>\"Na maioria das vezes, especialmente em pacientes jovens e de meia idade, a lombalgia, famosa dor nas costas, é um sintoma de uma contratura muscular ou distensão muscular, que normalmente estão ligadas a coisas muito próximas do nosso dia a dia, como postura inadequada ao desempenhar atividades corriqueiras, como pegar peso de mal jeito sem uma postura adequada da coluna”, afirma&nbsp; Angelo Guarçoni, médico neurocirurgião e de coluna.</p><p>Seja por realizar um trabalho repetitivo, excesso de tempo em uma determinada posição ou mesmo forçar um exercício na academia, não é incomum encontrar alguém sofrendo de dores na lombar. Na grande maioria das vezes, esse incômodo é localizado, porém, em pequenos casos, pode ser sintoma de uma doença mais grave, principalmente em idosos.</p><p>Uma visita ao consultório logo no início pode ser suficiente para diagnóstico e tratamento adequado, evitando o agravamento do caso. “Só o especialista consegue definir o que é essa dor. Se é uma lombalgia vinda de uma contratura muscular, má postura, ou se é referente a algum outro problema de saúde como pedra nos rins, infecções urinárias ou hérnia de disco”, destaca o médico.</p><p>Além da lombalgia, fraturas nos pés, nas mãos, transtornos de discos invertebrais, leiomioma do útero lideram nos motivos que afastam trabalhadores de suas funções.</p>', 1, '2020-04-16 04:12:40', '2020-04-16 04:12:40', NULL),
(3, 'O que é Engenharia de Segurança do Trabalho?', '202004160113535e97db81b5e04.png', 'Fonte: https://www.educamaisbrasil.com.br/', '<p>Saiba mais sobre o curso e o mercado de trabalho dessa profissão<br></p>', '<p>O Engenheiro de Segurança do Trabalho é o profissional responsável por coordenar e efetuar análise de projetos a serem implantados, em conjunto com as áreas técnicas, recomendando alterações, visando reduzir ou eliminar os riscos de acidentes e doenças ocupacionais. Além disso, orienta a Comissão Interna de Prevenção de Acidentes (CIPA) das empresas e fornece instruções aos funcionários sobre o uso de equipamentos de proteção individual (EPIs).&nbsp;</p><p>O que estudar para ser Engenheiro de Segurança do Trabalho?</p><p>Segundo a Lei 7410/85 para exercer a profissão na área, é necessário fazer um curso de graduação em Arquitetura ou Engenharia – nas modalidades civil, eletricista, mecânica e metalúrgica, química, geologia e minas e agrimensura, com duração média de 4 a 5 anos, e depois fazer uma pós-graduação em Engenharia de Segurança do Trabalho.&nbsp;</p><p>Durante o curso, o aluno irá se deparar com matérias específicas sobre a integração do homem ao ambiente de trabalho, normas e legislação, prevenção de riscos, ética e cidadania, relação com o Conselho Regional de Engenharia e Agronomia (CREA), dentre outras.</p>', 1, '2020-04-16 04:13:53', '2020-04-16 04:13:53', NULL);

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
  `crm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `doctors` (`id`, `name`, `crm`, `specialty`, `phone`, `email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'teste', '12312312312', 'cardiologista', 221133112, 'email@email.com', 1, '2020-05-26 14:57:50', '2020-07-02 13:12:42', '2020-07-02 10:07:42'),
(4, 'medico', '12312312312', 'cardiologista', 12312312312, 'email@email.com', 1, '2020-06-26 18:04:53', '2020-06-29 18:03:05', '2020-06-29 15:06:05'),
(5, 'qwe', '12312312312', 'sdadasd', 12312312312, 'a@a.com', 1, '2020-07-01 13:04:21', '2020-07-02 13:12:42', '2020-07-02 10:07:42'),
(6, 'medico', '12312312312', 'cardiologista', 12312312312, 'email@email.com', 1, '2020-07-07 20:48:43', '2020-07-10 16:51:18', '2020-07-10 13:07:18'),
(7, 'asdasd', '1231', 'asdasd', 12312312, 'das@asd.com', 1, '2020-07-10 17:02:20', '2020-07-10 17:05:12', '2020-07-10 14:07:12');

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

INSERT INTO `employees` (`id`, `company_id`, `name`, `occupation`, `age`, `rg`, `cpf`, `sex`, `birth`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 'funcionario 2', 'cargo 2', '27', 12312312312, 12312312312, 'feminino', '1993-01-11', 1, '2020-05-26 14:57:17', '2020-07-02 13:20:09', '2020-07-02 10:07:09'),
(3, 3, 'teste', 'teste', '30', 32132132121, 32132132121, 'teste', '1989-09-16', 1, '2020-06-25 17:57:11', '2020-06-29 15:02:21', '2020-06-25 16:06:27'),
(6, 26, 'cris henrique', 'software engenier', '30', 32132132121, 32132132121, 'masculino', '1989-09-16', 1, '2020-06-26 17:33:29', '2020-07-02 13:20:09', '2020-07-02 10:07:09'),
(7, 27, 'charles', 'software engenier', '28', 32132132121, 32132132121, 'masculino', '1993-05-26', 1, '2020-06-26 17:33:38', '2020-07-02 13:20:09', '2020-07-02 10:07:09'),
(8, 34, 'cris henrique', 'analista de sistemas', '30', 12312312312, 12312312312, 'masculino', '1989-09-16', 1, '2020-06-29 13:45:39', '2020-07-02 13:20:09', '2020-07-02 10:07:09'),
(9, 36, 'lais', 'enfermeira', '26', 12312312312, 12312312312, 'feminino', '1993-07-25', 1, '2020-07-02 13:22:36', '2020-07-10 16:51:10', '2020-07-10 13:07:10'),
(10, 37, 'charles', 'software engenier', '28', 32132132121, 32132132121, 'masculino', '1993-05-26', 1, '2020-07-02 13:47:10', '2020-07-10 16:51:10', '2020-07-10 13:07:10'),
(11, 37, 'cris henrique', 'analista de sistemas', '30', 12312312312, 12312312312, 'masculino', '1989-09-16', 1, '2020-07-02 13:47:25', '2020-07-10 16:51:10', '2020-07-10 13:07:10'),
(12, 39, 'asdasd', 'asd', '31', 12312312312, 12312312312, 'qwe', '1988-09-16', 1, '2020-07-10 16:53:57', '2020-07-10 17:05:06', '2020-07-10 14:07:06'),
(13, 39, 'asca', 'asc', '33', 123, 123, 'sadas', '2000-11-11', 1, '2020-07-10 17:02:54', '2020-07-10 17:05:06', '2020-07-10 14:07:06');

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
(49, 4, '127.0.0.1', 1, '2020-07-10 16:34:25', '2020-07-10 16:34:25', NULL);

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
(82, '2020_04_22_173401_create_employees_table', 6),
(83, '2020_04_28_113750_create_doctors_table', 6),
(85, '2020_05_26_105124_create_anamneses_table', 6),
(86, '2020_05_26_105153_create_periodicals_table', 6),
(88, '2020_05_20_100638_create_asos_table', 7),
(89, '2020_05_26_105233_create_screenings_table', 8);

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

--
-- Despejando dados para a tabela `periodicals`
--

INSERT INTO `periodicals` (`id`, `pdf`, `employee_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, '202006291412025efa20e21b5cd.pdf', 7, 1, '2020-06-29 17:12:23', '2020-07-01 15:05:25', '2020-07-01 12:07:25'),
(10, '202007011123355efc9c6766fc0.pdf', 7, 1, '2020-07-01 14:23:56', '2020-07-01 15:06:00', '2020-07-01 12:07:00'),
(11, '202007011130115efc9df31504a.pdf', 7, 1, '2020-07-01 14:30:31', '2020-07-01 15:06:00', '2020-07-01 12:07:00'),
(12, '202007031500565eff7258c39a7.pdf', 10, 1, '2020-07-03 18:01:17', '2020-07-06 12:58:35', '2020-07-06 09:07:35'),
(13, '202007031507375eff73e9cd3c4.pdf', 9, 1, '2020-07-03 18:07:53', '2020-07-06 12:58:35', '2020-07-06 09:07:35'),
(14, '202007031509205eff74508cb05.pdf', 9, 1, '2020-07-03 18:09:36', '2020-07-06 12:58:35', '2020-07-06 09:07:35'),
(15, '202007031511005eff74b4e579b.pdf', 9, 1, '2020-07-03 18:11:16', '2020-07-06 12:58:35', '2020-07-06 09:07:35'),
(16, '202007031516205eff75f4b5a15.pdf', 10, 1, '2020-07-03 18:16:42', '2020-07-06 12:58:35', '2020-07-06 09:07:35'),
(17, '202007031517215eff763112f96.pdf', 10, 1, '2020-07-03 18:17:42', '2020-07-06 12:58:35', '2020-07-06 09:07:35'),
(18, '202007031518285eff76740639f.pdf', 10, 1, '2020-07-03 18:18:47', '2020-07-06 12:58:35', '2020-07-06 09:07:35'),
(19, '202007060959265f03202edd003.pdf', 10, 1, '2020-07-06 12:59:48', '2020-07-06 12:59:48', NULL),
(20, '202007061008155f03223f0924a.pdf', 10, 1, '2020-07-06 13:08:36', '2020-07-06 13:08:36', NULL);

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
(104, 'trash', 'Acesso ao Módulo da Lixeira', '2020-02-14 18:54:40', '2020-02-14 18:54:40', NULL);

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
(28, 'SToledo', '202004160108305e97da3ebbf38.png', 'SToledo', 1, '2020-04-16 04:08:30', '2020-04-16 04:08:30', NULL);

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
(18, 9, 6, '2020-02-13 21:31:46', '2020-02-13 21:31:46', NULL);

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
(1, 'empresa 11', '12312312313', 'nome fantasia 11', 1, '2020-05-26 14:56:01', '2020-06-29 14:09:28', '2020-06-24 08:06:09'),
(2, 'teste', '32132132121', 'teste', 1, '2020-05-26 14:56:17', '2020-06-29 14:12:59', '2020-06-24 08:06:09'),
(3, 'Stoledo', '12312312312', 'SStoledo', 1, '2020-06-25 11:55:39', '2020-07-02 13:19:58', '2020-07-02 10:07:58'),
(5, 'cdbr', '12312312312', 'cdbr', 1, '2020-06-25 17:53:29', '2020-06-25 17:53:45', '2020-06-25 14:06:45'),
(6, 'cdbr', '12312312312', 'cdbr', 1, '2020-06-25 17:54:24', '2020-06-25 17:54:42', '2020-06-25 14:06:42'),
(7, 'cdbr', '12312312312', 'cdbr', 1, '2020-06-25 17:55:17', '2020-06-25 18:10:07', '2020-06-25 15:06:07'),
(8, 'getra', '21312312312', 'getra', 1, '2020-06-25 18:08:14', '2020-06-25 18:10:07', '2020-06-25 15:06:07'),
(9, 'getra', '21312312312', 'getra', 1, '2020-06-25 18:08:50', '2020-06-25 18:10:07', '2020-06-25 15:06:07'),
(10, 'getra', '21312312312', 'getra', 1, '2020-06-25 18:09:54', '2020-06-25 18:10:07', '2020-06-25 15:06:07'),
(11, 'stoledo', '32132132121', 'stoledo', 1, '2020-06-25 19:04:04', '2020-06-25 19:17:36', '2020-06-25 16:06:36'),
(12, 'asd', '12312312312', 'ads', 1, '2020-06-25 19:20:22', '2020-06-25 19:20:45', '2020-06-25 16:06:45'),
(13, 'stoledo', '32132132121', 'stoledo', 1, '2020-06-25 19:22:46', '2020-06-25 19:23:21', '2020-06-25 16:06:21'),
(14, 'stoledo', '32132132121', 'stoledo', 1, '2020-06-25 19:25:07', '2020-06-25 19:26:03', '2020-06-25 16:06:03'),
(15, 'stoledo', '32132132121', 'stoledo', 1, '2020-06-25 19:26:32', '2020-06-25 19:26:42', '2020-06-25 16:06:42'),
(16, 'getra', '21312312312', 'getra', 1, '2020-06-25 19:30:46', '2020-06-25 19:34:16', '2020-06-25 16:06:16'),
(17, 'empresa sdsadad', '12312312312', 'nome fantasia tal', 1, '2020-06-25 19:33:52', '2020-06-25 19:34:10', '2020-06-25 16:06:10'),
(18, 'stoledo', '32132132121', 'stoledo', 1, '2020-06-25 19:34:32', '2020-06-25 19:34:42', '2020-06-25 16:06:42'),
(19, 'stoledo', '12312312312', 'stoledo', 1, '2020-06-25 20:08:53', '2020-06-25 20:16:21', '2020-06-25 17:06:21'),
(20, 'stoledo', '12312312312', 'stoledo', 1, '2020-06-25 20:09:29', '2020-06-25 20:16:21', '2020-06-25 17:06:21'),
(21, 'getra', '32132132121', 'getra', 1, '2020-06-25 20:19:30', '2020-06-25 20:38:21', '2020-06-25 17:06:21'),
(22, 'getra', '32132132121', 'getra', 1, '2020-06-25 20:38:51', '2020-06-25 20:39:00', '2020-06-25 17:06:00'),
(23, 'stoledo', '12312312312', 'stoledo', 1, '2020-06-26 14:52:54', '2020-06-26 14:53:20', '2020-06-26 11:06:20'),
(24, 'getra', '32132132121', 'getra', 1, '2020-06-26 14:53:11', '2020-06-26 17:19:30', '2020-06-26 14:06:30'),
(25, 'getra', '32132132121', 'getra', 1, '2020-06-26 17:20:30', '2020-06-26 17:20:39', '2020-06-26 14:06:39'),
(26, 'stoledo', '32132132121', 'stoledo', 1, '2020-06-26 17:24:30', '2020-06-26 20:33:19', '2020-06-26 17:06:19'),
(27, 'getra', '32132132121', 'getra', 1, '2020-06-26 17:24:44', '2020-07-02 13:19:58', '2020-07-02 10:07:58'),
(28, 'stoledo', '12312312312', 'stoledo', 1, '2020-06-26 19:13:24', '2020-06-26 19:13:34', '2020-06-26 16:06:34'),
(29, 'getra', '32132132121', 'getra', 1, '2020-06-26 20:32:34', '2020-07-02 13:19:58', '2020-07-02 10:07:58'),
(30, 'getra', '32132132121', 'getra', 1, '2020-06-26 20:33:52', '2020-07-02 13:19:58', '2020-07-02 10:07:58'),
(31, 'stoledo', '12312312312', 'stoledo', 1, '2020-06-26 20:34:40', '2020-06-26 20:39:01', '2020-06-26 17:06:01'),
(32, 'getra', '32132132121', 'getra', 1, '2020-06-26 20:37:34', '2020-07-02 13:19:58', '2020-07-02 10:07:58'),
(33, 'stoledo', '12312312312', 'stoledo', 1, '2020-06-26 20:41:37', '2020-06-26 20:42:12', '2020-06-26 17:06:12'),
(34, 'stoledo', '12312312312', 'stoledo', 1, '2020-06-29 13:44:52', '2020-07-02 13:19:58', '2020-07-02 10:07:58'),
(35, 'stoledo', '12312312312', 'stoledo', 1, '2020-06-29 13:45:12', '2020-07-02 13:19:58', '2020-07-02 10:07:58'),
(36, 'getra', '32132132121', 'getra', 1, '2020-07-02 13:20:51', '2020-07-10 16:47:18', '2020-07-10 13:07:18'),
(37, 'stoledo', '12312312312', 'stoledo', 1, '2020-07-02 13:46:16', '2020-07-10 16:47:18', '2020-07-10 13:07:18'),
(38, 'stoledo', '12312312312', 'stoledo', 1, '2020-07-02 13:46:39', '2020-07-10 16:47:18', '2020-07-10 13:07:18'),
(39, 'asd', '12312312312', 'asd', 1, '2020-07-10 16:53:05', '2020-07-10 17:04:52', '2020-07-10 14:07:52'),
(40, 'asda', '123123123123', 'asdas', 1, '2020-07-10 17:03:25', '2020-07-10 17:04:52', '2020-07-10 14:07:52');

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
(4, 'Charles de Azevedo Júnior', '202002061646465e3c6d26dbd92.jpg', 'charles@stoledo.com.br', NULL, '$2y$10$1LDlyIwheTQjrbaoJQHALezX3cvSr3NyQC9IyJLXrYejjAXL8D30m', 1, 'YX6hoDdLozvUiLMT6hw1TS9IhUA0GgdY0VcjXBC0qHmwdtTBlteXnRD4pVMw', '2020-02-06 19:46:46', '2020-02-14 20:18:40', NULL),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de tabela `asos`
--
ALTER TABLE `asos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `periodicals`
--
ALTER TABLE `periodicals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de tabela `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2459;

--
-- AUTO_INCREMENT de tabela `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `screenings`
--
ALTER TABLE `screenings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
