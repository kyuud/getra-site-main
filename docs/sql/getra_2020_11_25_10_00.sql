-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Nov-2020 às 14:00
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_getra`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anamneses`
--

CREATE TABLE `anamneses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `digpdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `anamneses`
--

INSERT INTO `anamneses` (`id`, `employee_id`, `pdf`, `digpdf`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '202011191507385fb6b46aa7b3a.pdf', '202011191507415fb6b46dd8fe1.pdf', 1, '2020-11-19 18:07:45', '2020-11-19 18:07:45', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `appraisals`
--

CREATE TABLE `appraisals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `start` datetime NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` datetime NOT NULL,
  `deadline` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `appraisals`
--

INSERT INTO `appraisals` (`id`, `company_id`, `start`, `titulo`, `validity`, `deadline`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2020-11-19 00:00:00', 'Laudo técnico 123', '2020-12-31 00:00:00', 12, 1, '2020-11-19 18:14:40', '2020-11-19 18:14:40', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `asos`
--

CREATE TABLE `asos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `digpdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xml` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `asos`
--

INSERT INTO `asos` (`id`, `employee_id`, `doctor_id`, `pdf`, `digpdf`, `xml`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 4, '202011191504165fb6b3a0c9e73.pdf', '202011191504185fb6b3a29622d.pdf', 'ASO191120201504165fb6b3a0c611b.xml', 1, '2020-11-19 18:04:20', '2020-11-19 18:04:20', NULL),
(2, 1, 4, '202011191505195fb6b3df25645.pdf', '202011191505205fb6b3e0e51a5.pdf', 'ASO191120201505195fb6b3df21abb.xml', 1, '2020-11-19 18:05:23', '2020-11-19 18:05:23', NULL);

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
(354, '...', 1, 'www', '202004160037465e97d30a42d98.jpeg', '...', 0, '2020-04-16 03:37:46', '2020-07-13 20:41:12', NULL),
(355, '...', 2, 'www', '202004160040235e97d3a7ba023.jpeg', '...', 1, '2020-04-16 03:40:23', '2020-04-16 03:40:23', NULL),
(356, '...', 3, 'www', '202004160041095e97d3d5f32c1.jpeg', '...', 1, '2020-04-16 03:41:10', '2020-04-16 03:41:10', NULL),
(357, 'asd', 1, 'www', '202007011218495efca959272b0.jpeg', 'asd', 1, '2020-07-01 15:18:49', '2020-07-01 15:18:58', '2020-07-01 12:07:58'),
(358, 'www', 3, 'www', '202007131147285f0c7400bad80.jpg', 'www', 1, '2020-07-13 14:47:28', '2020-07-13 14:47:28', NULL);

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
(1, 'Visita técnica dos alunos do CEAS', '202004160111105e97dade4cdc5.jpg', 'Fonte: Assessoria de Comunicação', '<p>Alunos do CEAS fazem visita técnica na manhã desta quarta-feira na Getra<br></p>', '<p style=\"text-align: left;\">A Getra recebeu na manhã desta quarta-feira (29), a visita técnica dos alunos do curso de Saúde e Segurança do Trabalho do Ceas Escola Técnica. Uma manhã super proveitosa, onde os alunos puderam conhecer nossos profissionais, como também as nossas instalações e a rotina da nossa empresa, que preza pela competência no trabalho que executa. Com toda certeza os alunos saíram dessa visita com um olhar diferenciado acerca da Saúde e Segurança do Trabalho que foi a profissão escolhida por eles. Nossos colaboradores se sentem lisonjeados em poder colaborar com esses alunos.</p>', 1, '2020-04-16 04:11:10', '2020-08-24 14:07:34', NULL),
(2, 'Lombalgia lidera motivo de afastamento do trabalho', '202004160112405e97db385b91b.jpg', 'Fonte: https://www.contabeis.com.br/', '<p>Incômodo nas costas é o principal motivo que afasta trabalhadores dos seus postos<br></p>', '<p style=\"text-align: left;\">Levantamento do Instituto Nacional do Seguro Social (INSS) aponta crescimento de 6% no volume de afastamento de trabalhadores por doenças ou complicações de saúde. Com mais de 83 mil casos, lombalgia (dor na região lombar) é a principal causa.</p><p style=\"text-align: left;\">A falta de um programa de acompanhamento postural e uso correto dos equipamentos fornecidos pelas empresas estão entre os principais motivos que levam milhares de trabalhadores aos consultórios médicos com dores na região da lombar.</p><p style=\"text-align: left;\">Dados da Organização Mundial de Saúde (OMS) apontam que que lombalgia é a segunda maior causa de visita aos consultórios médicos, perde apenas para dor de cabeça.</p><p style=\"text-align: left;\">\"Na maioria das vezes, especialmente em pacientes jovens e de meia idade, a lombalgia, famosa dor nas costas, é um sintoma de uma contratura muscular ou distensão muscular, que normalmente estão ligadas a coisas muito próximas do nosso dia a dia, como postura inadequada ao desempenhar atividades corriqueiras, como pegar peso de mal jeito sem uma postura adequada da coluna”, afirma&nbsp; Angelo Guarçoni, médico neurocirurgião e de coluna.</p><p style=\"text-align: left;\">Seja por realizar um trabalho repetitivo, excesso de tempo em uma determinada posição ou mesmo forçar um exercício na academia, não é incomum encontrar alguém sofrendo de dores na lombar. Na grande maioria das vezes, esse incômodo é localizado, porém, em pequenos casos, pode ser sintoma de uma doença mais grave, principalmente em idosos.</p><p style=\"text-align: left;\">Uma visita ao consultório logo no início pode ser suficiente para diagnóstico e tratamento adequado, evitando o agravamento do caso. “Só o especialista consegue definir o que é essa dor. Se é uma lombalgia vinda de uma contratura muscular, má postura, ou se é referente a algum outro problema de saúde como pedra nos rins, infecções urinárias ou hérnia de disco”, destaca o médico.</p><p style=\"text-align: left;\">Além da lombalgia, fraturas nos pés, nas mãos, transtornos de discos invertebrais, leiomioma do útero lideram nos motivos que afastam trabalhadores de suas funções.</p>', 1, '2020-04-16 04:12:40', '2020-08-14 14:26:43', NULL),
(3, 'O que é Engenharia de Segurança do Trabalho?', '202004160113535e97db81b5e04.png', 'Fonte: https://www.educamaisbrasil.com.br/', '<p>Saiba mais sobre o curso e o mercado de trabalho dessa profissão<br></p>', '<p style=\"text-align: left;\">O Engenheiro de Segurança do Trabalho é o profissional responsável por coordenar e efetuar análise de projetos a serem implantados, em conjunto com as áreas técnicas, recomendando alterações, visando reduzir ou eliminar os riscos de acidentes e doenças ocupacionais. Além disso, orienta a Comissão Interna de Prevenção de Acidentes (CIPA) das empresas e fornece instruções aos funcionários sobre o uso de equipamentos de proteção individual (EPIs).&nbsp;</p><p style=\"text-align: left;\">O que estudar para ser Engenheiro de Segurança do Trabalho?</p><p style=\"text-align: left;\">Segundo a Lei 7410/85 para exercer a profissão na área, é necessário fazer um curso de graduação em Arquitetura ou Engenharia – nas modalidades civil, eletricista, mecânica e metalúrgica, química, geologia e minas e agrimensura, com duração média de 4 a 5 anos, e depois fazer uma pós-graduação em Engenharia de Segurança do Trabalho.&nbsp;</p><p style=\"text-align: left;\">Durante o curso, o aluno irá se deparar com matérias específicas sobre a integração do homem ao ambiente de trabalho, normas e legislação, prevenção de riscos, ética e cidadania, relação com o Conselho Regional de Engenharia e Agronomia (CREA), dentre outras.</p>', 1, '2020-04-16 04:13:53', '2020-08-14 14:27:01', NULL),
(4, 'Dia dos Engenheiros e TST', '202007131637095f0cb7e541a63.png', 'http://www.protecao.com.br/', 'Dia dos Engenheiros e TSTs é comemorado no dia 27', '<div style=\"text-align: left;\">27 de novembro, é uma data marcante entre os prevencionistas: é o Dia do Técnico e do Engenheiro de Segurança do Trabalho. A data celebra o dia em que ambas as profissões foram regularizadas pelo Ministério do Trabalho por meio da Lei nº 7.410, de 27 de novembro de 1985. Tanto os engenheiros quanto os técnicos de Segurança do Trabalho vêm atuando junto a outros profissionais da área em busca de melhores condições nos ambientes laborais. Embora a lei tenha saído somente na década de 1980, ambos já desempenhavam suas funções muito antes desta data, iniciando timidamente a partir da criação das CIPAs em 1944, ganhando maior impulso com a regulamentação dos SESMTs em 1972 e finalmente com a publicação das NRs em 1978.</div>', 1, '2020-07-13 19:37:09', '2020-08-14 14:26:29', NULL),
(5, 'Dia do Médico do Trabalho', '202007131647475f0cba6317255.png', 'http://revistacipa.com.br/', 'Dia do Médico do Trabalho', '<div style=\"text-align: left;\">Os médicos do trabalho em todo o mundo celebram, nesta sexta-feira, uma data especial para a especialidade. Trata-se do Dia do Médico do Trabalho, comemorado no dia 4 de outubro em homenagem ao nascimento do médico italiano Bernardino Ramazzini (1633-1714).Para a ANAMT, a escolha da data é a consolidação do exercício da profissão. A celebração vem de encontro ao anseio de por em evidência a atuação do médico da área e sua responsabilidade na manutenção de condições ideais de trabalho. Mais do que celebrar a Medicina do Trabalho, o 4 de outubro é dia de honrar o legado de Ramazzini, reafirmando nosso compromisso com esta especialidade médica que lida com as relações entre homens e mulheres trabalhadores e seus respectivos ofícios, visando não somente a prevenção dos acidentes e das doenças do trabalho, mas a promoção da saúde e da qualidade de vida. Há mais de 300 anos, Ramazzini, considerado o precursor da especialidade, começou a pavimentar rumos que seguimos até hoje: o estabelecido de ligações entre determinadas ocupações e as enfermidades sofridas pelas profissionais que as praticavam.</div>', 1, '2020-07-13 19:47:47', '2020-08-14 14:26:13', NULL),
(6, 'Titulo', '202008241121175f43ccdda2eb6.jpg', 'Getra', '<p>Teste</p>', '<p>Teste</p>', 1, '2020-08-24 14:21:17', '2020-08-24 14:22:00', '2020-08-24 11:08:00'),
(7, 'Como prevenir acidentes no trabalho em altura?', '202008241141175f43d18dd82bd.jpg', 'Getra', '<p><span style=\"color: rgb(119, 119, 119); font-family: Arial; font-size: 14.6667px; white-space: pre-wrap;\">A melhor maneira de evitar acidentes é seguindo as disposições da NR 35.</span><br></p>', '<p dir=\"ltr\" style=\"line-height: 1.2; margin-top: 0pt; margin-bottom: 7.2pt;\" id=\"docs-internal-guid-124c5b80-7fff-0fd1-cb31-ad05f7f04cb7\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(119, 119, 119); font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Como prevenir acidentes no trabalho em altura?</span><span style=\"font-size: 11pt; font-family: Arial; color: rgb(119, 119, 119); font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\"><br></span><span style=\"font-size: 11pt; font-family: Arial; color: rgb(119, 119, 119); font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\"><br></span><span style=\"font-size: 11pt; font-family: Arial; color: rgb(119, 119, 119); font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\"><br></span><span style=\"font-size: 11pt; font-family: Arial; color: rgb(119, 119, 119); font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Quando o trabalhador exerce suas atividades em locais que estão acima de 2 metros do nível inferior, seja o solo ou não, é considerado trabalho em altura. O que regula essa área é a Norma Regulamentadora n.º 35 (NR 35). O trabalho realizado sob essas condições tem alguns riscos, como por exemplo quedas de escadas ou andaimes, são comuns, infelizmente. </span><span style=\"font-size: 11pt; font-family: Arial; color: rgb(119, 119, 119); font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\"><br></span><span style=\"font-size: 11pt; font-family: Arial; color: rgb(119, 119, 119); font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\"><br></span><span style=\"font-size: 11pt; font-family: Arial; color: rgb(119, 119, 119); font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Toda atividade requer cuidados e equipamentos específicos, priorizando a segurança e o bem estar dos colaboradores. A melhor maneira de evitar acidentes é seguindo as disposições da NR 35. O que dará segurança para os funcionários mas também para organização que garante estar cumprindo todas as diretrizes. É essencial que haja capacitação e treinamento de todos os empregados que trabalharão nas atividades em altura. A carga horária deve ser de 8 horas</span><span style=\"font-size: 11pt; font-family: Arial; color: rgb(119, 119, 119); font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\"><br></span><span style=\"font-size: 11pt; font-family: Arial; color: rgb(119, 119, 119); font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\"><br></span><span style=\"font-size: 11pt; font-family: Arial; color: rgb(119, 119, 119); font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">A NR 35 lista responsabilidades tanto do patrão quanto dos empregados para garantir a proteção de todos que frequentam o local de trabalho. Estas são algumas das obrigações.</span></p>', 1, '2020-08-24 14:41:17', '2020-08-24 14:41:47', '2020-08-24 11:08:47'),
(8, 'Como prevenir acidentes no trabalho em altura?', '202008241153165f43d45c635f8.jpg', 'Getra', '<div style=\"text-align: justify;\"><span style=\"font-size: 12px; color: rgb(119, 119, 119); font-family: Arial;\">Toda atividade requer cuidados e equipamentos específicos, priorizando a segurança e o bem estar dos colaboradores. A melhor maneira de evitar acidentes é seguindo as disposições da NR 35. O que dará segurança para os funcionários mas também para organização que garante estar cumprindo todas as diretrizes. É essencial que haja capacitação e treinamento de todos os empregados que trabalharão nas atividades em altura. A carga horária deve ser de 8 horas</span></div>', '<div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b>Como prevenir acidentes no trabalho em altura?   Quando o trabalhador exerce suas atividades em locais que estão acima de 2 metros do nível inferior, seja o solo ou não, é considerado trabalho em altura. O que regula essa área é a Norma Regulamentadora n.º 35 (NR 35). O trabalho realizado sob essas condições tem alguns riscos, como por exemplo quedas de escadas ou andaimes, são comuns, infelizmente.   Toda atividade requer cuidados e equipamentos específicos, priorizando a segurança e o bem estar dos colaboradores. A melhor maneira de evitar acidentes é seguindo as disposições da NR 35. O que dará segurança para os funcionários mas também para organização que garante estar cumprindo todas as diretrizes. É essencial que haja capacitação e treinamento de todos os empregados que trabalharão nas atividades em altura. A carga horária deve ser de 8 horas  A NR 35 lista responsabilidades tanto do patrão quanto dos empregados para garantir a proteção de todos que frequentam o local de trabalho. Estas são algumas das obrigações do empregador:</b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><br></b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>garantir que sejam implementadas as medidas de proteção da NR;</b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><br></b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>desenvolver um procedimento de operações para as atividades em altura;</b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><br></b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>acompanhar o cumprimento das medidas de proteção da NR e das empresas de segurança do trabalho;</b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><br></b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>garantir que os empregados tenham informações atualizadas sobre os riscos da atividade e de todas as medidas de segurança;</b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><br></b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>assegurar que o trabalho em altura seja sempre feito sob supervisão, de acordo com a análise de riscos e a atividade bem como um plano de resgate de vítimas de eventual acidente.</b></span></font></div><div style=\"text-align: left;\">        </div><div style=\"text-align: left;\"><b style=\"font-size: 12px; color: rgb(119, 119, 119); font-family: Arial;\">Já para os empregados, essas são algumas responsabilidades:</b></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><br></b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>cumprir todas as disposições da lei e das normas a respeito do trabalho em altura, inclusive as obrigatoriedades que o empregador impõe;</b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><br></b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>colaborar sempre com o empregador garantindo que as medidas de segurança estejam sendo implementadas;</b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><br></b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>interromper suas atividades sempre que for constatada uma evidência de riscos graves para a sua segurança e saúde bem como demais envolvidos;</b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><br></b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>zelar pela própria segurança e também das outras pessoas que frequentam os locais em que há trabalho em altura.</b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b><br></b></span></font></div><div style=\"text-align: left;\"><font color=\"#777777\" face=\"Arial\"><span style=\"font-size: 12px;\"><b>Para que todas as medidas sejam eficazes também é necessário o uso de EPI’S, alguns mais genéricos outros específicos, como cinto de segurança do tipo paraquedista; trava quedas; talabartes (ajustáveis, simples e duplos tipo Y);linhas de vida vertical e horizontal; ancoragens; capacete com jugular; botina; luva de segurança.</b></span></font></div>', 1, '2020-08-24 14:53:16', '2020-08-24 17:18:37', NULL);

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
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `cpf`, `crm`, `pis`, `specialty`, `uf`, `phone`, `email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Guilherme Cézar Soares', '03900737410', '9901', '123123', 'asdad', 'PB', 12312, 'a@a.com', 1, '2020-08-27 19:27:54', '2020-08-27 20:24:52', '2020-08-27 17:08:52'),
(2, 'Thiago Barbosa de Carvalho', '69037892272', '8333', '123213', 'dasdad', 'PB', 123123, 'asd@s.com', 1, '2020-08-27 19:30:17', '2020-08-27 20:24:52', '2020-08-27 17:08:52'),
(3, 'asdasd', '12312', '123213', '121323', 'asdasd', 'ad', 123213, 'a@a.com', 1, '2020-08-27 20:25:13', '2020-08-28 20:04:40', '2020-08-28 17:08:40'),
(4, 'Guilherme Cézar Soares', '03900737410', '9901', '123', 'asda', 'PB', 12312, 'a@a.com', 1, '2020-08-28 20:05:37', '2020-08-28 20:05:37', NULL),
(5, 'Thiago Barbosa de Carvalho', '69037892272', '8333', '123', 'asd', 'PB', 84123, 'a@d.com', 1, '2020-08-28 20:06:13', '2020-08-28 20:06:13', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matricula` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `employees`
--

INSERT INTO `employees` (`id`, `company_id`, `name`, `occupation`, `age`, `rg`, `cpf`, `nis`, `matricula`, `sex`, `birth`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Clearlison Nóbrega Costa', 'Desenvolvedor', '27', '012345678', '09531127484', '0321655548', '2154', 'Masculino', '1993-08-31', 1, '2020-11-19 17:59:33', '2020-11-24 17:45:58', NULL),
(2, 2, 'José Alexandre Lima Boga', 'Técnico de Segurança', '35', '321654987', '09532254187', '123456789', '2424', 'Masculino', '1985-01-24', 1, '2020-11-24 18:31:23', '2020-11-24 18:31:23', NULL);

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
-- Estrutura da tabela `financials`
--

CREATE TABLE `financials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duedate` datetime NOT NULL,
  `lifevalue` double DEFAULT NULL,
  `qtd` bigint(20) NOT NULL,
  `detached` double DEFAULT NULL,
  `discounts` double NOT NULL,
  `fees` double NOT NULL,
  `obs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `financials`
--

INSERT INTO `financials` (`id`, `company_id`, `city`, `email`, `duedate`, `lifevalue`, `qtd`, `detached`, `discounts`, `fees`, `obs`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Pocinhos', 'joca@gmail.com', '2020-11-15 00:00:00', NULL, 50, 5, 10, 325, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2020-11-19 18:17:34', '2020-11-19 18:17:34', NULL);

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
(1, 'Cidades', 19, 1, '2020-04-16 03:56:35', '2020-07-13 15:08:34', NULL),
(2, 'Atendimentos', 2458, 1, '2020-04-16 03:56:45', '2020-07-13 15:08:57', NULL),
(3, 'Palestras', 471, 1, '2020-04-16 03:56:56', '2020-07-13 15:08:48', NULL),
(4, 'Equipes', 9, 1, '2020-04-16 03:57:09', '2020-07-13 15:08:12', NULL);

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
(50, 4, '177.10.201.171', 1, '2020-07-13 13:52:35', '2020-07-13 13:52:35', NULL),
(51, 4, '177.10.201.171', 1, '2020-07-13 17:32:49', '2020-07-13 17:32:49', NULL),
(52, 4, '177.10.201.171', 1, '2020-07-17 18:01:18', '2020-07-17 18:01:18', NULL),
(53, 17, '177.10.201.171', 1, '2020-07-22 12:24:41', '2020-07-22 12:24:41', NULL),
(54, 4, '177.10.201.171', 1, '2020-07-22 12:25:58', '2020-07-22 12:25:58', NULL),
(57, 4, '177.10.201.171', 1, '2020-07-22 14:54:24', '2020-07-22 14:54:24', NULL),
(58, 19, '177.10.201.171', 1, '2020-07-22 14:55:59', '2020-07-22 14:55:59', NULL),
(59, 17, '177.10.201.171', 1, '2020-07-23 20:02:25', '2020-07-23 20:02:25', NULL),
(60, 4, '177.10.201.171', 1, '2020-07-24 11:38:13', '2020-07-24 11:38:13', NULL),
(61, 18, '177.10.201.171', 1, '2020-07-24 16:53:42', '2020-07-24 16:53:42', NULL),
(62, 4, '177.10.201.171', 1, '2020-07-27 13:55:33', '2020-07-27 13:55:33', NULL),
(63, 18, '177.10.201.171', 1, '2020-07-27 14:34:36', '2020-07-27 14:34:36', NULL),
(64, 4, '177.10.201.171', 1, '2020-07-28 11:32:21', '2020-07-28 11:32:21', NULL),
(65, 4, '177.10.201.171', 1, '2020-08-05 20:02:10', '2020-08-05 20:02:10', NULL),
(66, 4, '177.10.201.171', 1, '2020-08-07 18:58:18', '2020-08-07 18:58:18', NULL),
(67, 7, '177.10.201.171', 1, '2020-08-12 12:46:30', '2020-08-12 12:46:30', NULL),
(68, 7, '177.10.201.171', 1, '2020-08-14 14:25:05', '2020-08-14 14:25:05', NULL),
(70, 7, '177.10.201.171', 1, '2020-08-24 11:42:35', '2020-08-24 11:42:35', NULL),
(71, 4, '177.10.201.171', 1, '2020-08-24 11:43:44', '2020-08-24 11:43:44', NULL),
(72, 4, '177.10.201.171', 1, '2020-08-24 11:47:45', '2020-08-24 11:47:45', NULL),
(74, 4, '177.10.201.171', 1, '2020-08-24 11:54:28', '2020-08-24 11:54:28', NULL),
(75, 4, '177.10.201.171', 1, '2020-08-24 11:56:08', '2020-08-24 11:56:08', NULL),
(77, 4, '177.10.201.171', 1, '2020-08-24 11:59:19', '2020-08-24 11:59:19', NULL),
(80, 4, '177.10.201.171', 1, '2020-08-24 12:03:36', '2020-08-24 12:03:36', NULL),
(81, 7, '177.10.201.171', 1, '2020-08-24 12:04:17', '2020-08-24 12:04:17', NULL),
(82, 4, '177.10.201.171', 1, '2020-08-24 12:04:32', '2020-08-24 12:04:32', NULL),
(84, 7, '177.10.201.171', 1, '2020-08-24 13:24:04', '2020-08-24 13:24:04', NULL),
(86, 4, '177.10.201.171', 1, '2020-08-24 13:43:22', '2020-08-24 13:43:22', NULL),
(87, 4, '177.10.201.171', 1, '2020-08-24 13:55:09', '2020-08-24 13:55:09', NULL),
(88, 4, '177.10.201.171', 1, '2020-08-24 14:06:56', '2020-08-24 14:06:56', NULL),
(89, 4, '191.3.181.150', 1, '2020-08-24 14:10:25', '2020-08-24 14:10:25', NULL),
(90, 4, '177.10.201.171', 1, '2020-08-24 14:33:00', '2020-08-24 14:33:00', NULL),
(91, 4, '177.10.201.171', 1, '2020-08-24 17:12:59', '2020-08-24 17:12:59', NULL),
(92, 7, '177.10.201.171', 1, '2020-08-24 20:54:31', '2020-08-24 20:54:31', NULL),
(93, 7, '177.10.201.171', 1, '2020-08-27 20:03:59', '2020-08-27 20:03:59', NULL),
(94, 7, '177.10.201.171', 1, '2020-08-27 20:30:58', '2020-08-27 20:30:58', NULL),
(95, 7, '177.10.203.78', 1, '2020-08-28 02:25:53', '2020-08-28 02:25:53', NULL),
(96, 7, '177.10.201.171', 1, '2020-08-28 11:03:57', '2020-08-28 11:03:57', NULL),
(97, 7, '177.10.201.171', 1, '2020-08-28 18:47:30', '2020-08-28 18:47:30', NULL),
(98, 7, '177.10.201.171', 1, '2020-08-31 12:24:00', '2020-08-31 12:24:00', NULL),
(99, 7, '177.10.201.171', 1, '2020-08-31 14:57:06', '2020-08-31 14:57:06', NULL),
(100, 4, '177.10.201.171', 1, '2020-08-31 17:14:42', '2020-08-31 17:14:42', NULL),
(101, 7, '177.10.201.171', 1, '2020-08-31 20:33:37', '2020-08-31 20:33:37', NULL),
(102, 4, '177.10.201.171', 1, '2020-08-31 20:59:27', '2020-08-31 20:59:27', NULL),
(103, 7, '177.10.201.171', 1, '2020-09-03 12:58:11', '2020-09-03 12:58:11', NULL),
(104, 25, '177.10.201.171', 1, '2020-09-03 13:25:09', '2020-09-03 13:25:09', NULL),
(105, 7, '177.10.201.171', 1, '2020-09-11 19:05:30', '2020-09-11 19:05:30', NULL),
(106, 25, '177.10.201.171', 1, '2020-09-11 19:08:07', '2020-09-11 19:08:07', NULL),
(107, 7, '177.10.201.171', 1, '2020-09-16 18:07:17', '2020-09-16 18:07:17', NULL),
(108, 7, '177.10.201.171', 1, '2020-09-17 11:59:45', '2020-09-17 11:59:45', NULL),
(109, 25, '177.10.201.171', 1, '2020-09-23 19:06:40', '2020-09-23 19:06:40', NULL),
(110, 7, '177.10.201.171', 1, '2020-10-06 13:16:57', '2020-10-06 13:16:57', NULL),
(111, 7, '177.10.201.171', 1, '2020-10-19 18:51:28', '2020-10-19 18:51:28', NULL),
(112, 7, '177.10.201.171', 1, '2020-10-19 20:38:43', '2020-10-19 20:38:43', NULL),
(113, 7, '177.10.201.171', 1, '2020-10-20 13:41:14', '2020-10-20 13:41:14', NULL),
(114, 27, '177.10.201.171', 1, '2020-10-20 13:50:36', '2020-10-20 13:50:36', NULL),
(115, 7, '177.10.201.171', 1, '2020-10-20 13:52:26', '2020-10-20 13:52:26', NULL),
(116, 27, '177.10.201.171', 1, '2020-10-20 13:55:42', '2020-10-20 13:55:42', NULL),
(117, 18, '177.10.201.171', 1, '2020-10-20 14:01:07', '2020-10-20 14:01:07', NULL),
(118, 4, '177.10.201.171', 1, '2020-10-20 14:02:27', '2020-10-20 14:02:27', NULL),
(119, 27, '177.10.201.171', 1, '2020-10-20 14:03:08', '2020-10-20 14:03:08', NULL),
(120, 4, '177.10.201.171', 1, '2020-10-20 14:04:35', '2020-10-20 14:04:35', NULL),
(121, 27, '177.10.201.171', 1, '2020-10-20 14:05:19', '2020-10-20 14:05:19', NULL),
(122, 28, '177.10.201.171', 1, '2020-10-20 14:34:00', '2020-10-20 14:34:00', NULL),
(123, 18, '177.10.201.171', 1, '2020-10-20 14:37:31', '2020-10-20 14:37:31', NULL),
(124, 27, '177.10.201.171', 1, '2020-10-20 14:41:57', '2020-10-20 14:41:57', NULL),
(125, 28, '177.10.201.171', 1, '2020-10-20 19:15:21', '2020-10-20 19:15:21', NULL),
(126, 4, '177.10.201.171', 1, '2020-10-20 20:42:56', '2020-10-20 20:42:56', NULL),
(127, 7, '177.10.201.171', 1, '2020-10-21 19:08:07', '2020-10-21 19:08:07', NULL),
(128, 27, '177.10.201.171', 1, '2020-10-21 19:15:45', '2020-10-21 19:15:45', NULL),
(129, 18, '177.10.201.171', 1, '2020-10-22 16:17:22', '2020-10-22 16:17:22', NULL),
(130, 7, '177.10.201.171', 1, '2020-10-26 14:58:19', '2020-10-26 14:58:19', NULL),
(131, 18, '177.10.201.171', 1, '2020-10-27 11:18:20', '2020-10-27 11:18:20', NULL),
(132, 7, '177.10.201.171', 1, '2020-11-03 14:38:05', '2020-11-03 14:38:05', NULL),
(133, 4, '177.10.201.171', 1, '2020-11-05 13:20:48', '2020-11-05 13:20:48', NULL),
(134, 19, '181.223.174.58', 1, '2020-11-05 14:46:18', '2020-11-05 14:46:18', NULL),
(135, 19, '181.223.174.58', 1, '2020-11-05 15:36:21', '2020-11-05 15:36:21', NULL),
(136, 7, '177.10.201.171', 1, '2020-11-09 12:39:23', '2020-11-09 12:39:23', NULL),
(137, 18, '177.10.201.171', 1, '2020-11-12 14:19:16', '2020-11-12 14:19:16', NULL),
(138, 19, '177.10.201.171', 1, '2020-11-16 13:53:02', '2020-11-16 13:53:02', NULL),
(139, 4, '177.10.201.171', 1, '2020-11-16 14:30:17', '2020-11-16 14:30:17', NULL),
(140, 4, '177.10.201.171', 1, '2020-11-16 17:15:50', '2020-11-16 17:15:50', NULL),
(141, 7, '177.10.201.171', 1, '2020-11-19 17:13:12', '2020-11-19 17:13:12', NULL),
(142, 4, '177.10.201.171', 1, '2020-11-19 17:52:59', '2020-11-19 17:52:59', NULL),
(143, 4, '177.10.201.171', 1, '2020-11-19 18:02:51', '2020-11-19 18:02:51', NULL),
(144, 4, '127.0.0.1', 1, '2020-11-19 19:01:15', '2020-11-19 19:01:15', NULL),
(145, 4, '127.0.0.1', 1, '2020-11-23 13:36:49', '2020-11-23 13:36:49', NULL),
(146, 4, '127.0.0.1', 1, '2020-11-23 17:27:16', '2020-11-23 17:27:16', NULL),
(147, 4, '127.0.0.1', 1, '2020-11-24 11:00:09', '2020-11-24 11:00:09', NULL),
(148, 4, '127.0.0.1', 1, '2020-11-24 17:38:46', '2020-11-24 17:38:46', NULL),
(149, 4, '127.0.0.1', 1, '2020-11-25 11:26:39', '2020-11-25 11:26:39', NULL);

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
(96, '2020_04_22_173401_create_employees_table', 7),
(97, '2020_04_28_113750_create_doctors_table', 7),
(99, '2020_05_26_105124_create_anamneses_table', 7),
(100, '2020_05_26_105153_create_periodicals_table', 7),
(101, '2020_05_26_105233_create_screenings_table', 7),
(102, '2020_05_20_100638_create_asos_table', 8),
(103, '2020_10_22_154123_create_appraisals_table', 9),
(104, '2020_10_22_154123_create_financials_table', 9),
(105, '2020_10_22_154123_create_trainings_table', 9),
(106, '2020_04_16_191201_create_system_companies_table', 10);

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
-- Estrutura da tabela `periodicals`
--

CREATE TABLE `periodicals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(21, 'super-adm', 'Super Administrador', '2020-02-11 23:04:16', '2020-02-11 23:04:16', NULL),
(30, 'user', 'Acesso ao Módulo de Usuário', '2020-02-13 22:21:01', '2020-02-13 22:21:01', NULL),
(31, 'user-create', 'Criar Usuário', '2020-02-13 22:21:01', '2020-02-13 22:21:01', NULL),
(32, 'user-destroyFake', 'Remover Usuário', '2020-02-13 22:21:01', '2020-02-13 22:21:01', NULL),
(33, 'user-clearTable', 'Limpar Tabela de Usuário', '2020-02-13 22:21:01', '2020-02-13 22:21:01', NULL),
(34, 'user-edit', 'Visualizar Detalhes de Usuário', '2020-02-13 22:21:01', '2020-02-13 22:21:01', NULL),
(35, 'user-update', 'Atualizar Usuário', '2020-02-13 22:21:01', '2020-02-13 22:21:01', NULL),
(36, 'user-trash', 'Acessar Lixeira de Usuário', '2020-02-13 22:21:01', '2020-02-13 22:21:01', NULL),
(37, 'user-editTrash', 'Visualizar Detalhes da Lixeira de Usuário', '2020-02-13 22:21:01', '2020-02-13 22:21:01', NULL),
(38, 'user-updateTrash', 'Atualizar Usuário da Lixeira', '2020-02-13 22:21:01', '2020-02-13 22:21:01', NULL),
(39, 'user-restore', 'Restaurar Usuário da Lixeira', '2020-02-13 22:21:01', '2020-02-13 22:21:01', NULL),
(40, 'user-destroy', 'Remover Usuário Permanentemente', '2020-02-13 22:21:01', '2020-02-13 22:21:01', NULL),
(41, 'user-clearTableForce', 'Limpar Tabela de Usuário Permanentemente', '2020-02-13 22:21:01', '2020-02-13 22:21:01', NULL),
(42, 'banner', 'Acesso ao Módulo de Banner', '2020-02-13 22:22:17', '2020-02-14 00:29:49', NULL),
(43, 'banner-create', 'Criar Banner', '2020-02-13 22:22:17', '2020-02-13 22:22:17', NULL),
(44, 'banner-destroyFake', 'Remover Banner', '2020-02-13 22:22:17', '2020-02-13 22:22:17', NULL),
(45, 'banner-clearTable', 'Limpar Tabela de Banner', '2020-02-13 22:22:17', '2020-02-13 22:22:17', NULL),
(46, 'banner-edit', 'Visualizar Detalhes de Banner', '2020-02-13 22:22:17', '2020-02-13 22:22:17', NULL),
(47, 'banner-update', 'Atualizar Banner', '2020-02-13 22:22:17', '2020-02-13 22:22:17', NULL),
(48, 'banner-trash', 'Acessar Lixeira de Banner', '2020-02-13 22:22:17', '2020-02-13 22:22:17', NULL),
(49, 'banner-editTrash', 'Visualizar Detalhes da Lixeira de Banner', '2020-02-13 22:22:17', '2020-02-13 22:22:17', NULL),
(50, 'banner-updateTrash', 'Atualizar Banner da Lixeira', '2020-02-13 22:22:17', '2020-02-13 22:22:17', NULL),
(51, 'banner-restore', 'Restaurar Banner da Lixeira', '2020-02-13 22:22:17', '2020-02-13 22:22:17', NULL),
(52, 'banner-destroy', 'Remover Banner Permanentemente', '2020-02-13 22:22:17', '2020-02-13 22:22:17', NULL),
(53, 'banner-clearTableForce', 'Limpar Tabela de Banner Permanentemente', '2020-02-13 22:22:17', '2020-02-13 22:22:17', NULL),
(54, 'permission', 'Acesso ao Módulo de Permissão', '2020-02-13 22:28:18', '2020-02-13 22:28:18', NULL),
(55, 'permission-create', 'Criar Permissão', '2020-02-13 22:28:18', '2020-02-13 22:28:18', NULL),
(56, 'permission-destroyFake', 'Remover Permissão', '2020-02-13 22:28:18', '2020-02-13 22:28:18', NULL),
(57, 'permission-clearTable', 'Limpar Tabela de Permissão', '2020-02-13 22:28:18', '2020-02-13 22:28:18', NULL),
(58, 'permission-edit', 'Visualizar Detalhes de Permissão', '2020-02-13 22:28:18', '2020-02-13 22:28:18', NULL),
(59, 'permission-update', 'Atualizar Permissão', '2020-02-13 22:28:18', '2020-02-13 22:28:18', NULL),
(60, 'permission-trash', 'Acessar Lixeira de Permissão', '2020-02-13 22:28:18', '2020-02-13 22:28:18', NULL),
(61, 'permission-editTrash', 'Visualizar Detalhes da Lixeira de Permissão', '2020-02-13 22:28:18', '2020-02-13 22:28:18', NULL),
(62, 'permission-updateTrash', 'Atualizar Permissão da Lixeira', '2020-02-13 22:28:18', '2020-02-13 22:28:18', NULL),
(63, 'permission-restore', 'Restaurar Permissão da Lixeira', '2020-02-13 22:28:18', '2020-02-13 22:28:18', NULL),
(64, 'permission-destroy', 'Remover Permissão Permanentemente', '2020-02-13 22:28:18', '2020-02-13 22:28:18', NULL),
(65, 'permission-clearTableForce', 'Limpar Tabela de Permissão Permanentemente', '2020-02-13 22:28:18', '2020-02-13 22:28:18', NULL),
(66, 'role', 'Acesso ao Módulo de Papel', '2020-02-13 22:28:30', '2020-02-13 22:28:30', NULL),
(67, 'role-create', 'Criar Papel', '2020-02-13 22:28:30', '2020-02-13 22:28:30', NULL),
(68, 'role-destroyFake', 'Remover Papel', '2020-02-13 22:28:30', '2020-02-13 22:28:30', NULL),
(69, 'role-clearTable', 'Limpar Tabela de Papel', '2020-02-13 22:28:30', '2020-02-13 22:28:30', NULL),
(70, 'role-edit', 'Visualizar Detalhes de Papel', '2020-02-13 22:28:30', '2020-02-13 22:28:30', NULL),
(71, 'role-update', 'Atualizar Papel', '2020-02-13 22:28:30', '2020-02-13 22:28:30', NULL),
(72, 'role-trash', 'Acessar Lixeira de Papel', '2020-02-13 22:28:30', '2020-02-13 22:28:30', NULL),
(73, 'role-editTrash', 'Visualizar Detalhes da Lixeira de Papel', '2020-02-13 22:28:30', '2020-02-13 22:28:30', NULL),
(74, 'role-updateTrash', 'Atualizar Papel da Lixeira', '2020-02-13 22:28:30', '2020-02-13 22:28:30', NULL),
(75, 'role-restore', 'Restaurar Papel da Lixeira', '2020-02-13 22:28:30', '2020-02-13 22:28:30', NULL),
(76, 'role-destroy', 'Remover Papel Permanentemente', '2020-02-13 22:28:30', '2020-02-13 22:28:30', NULL),
(77, 'role-clearTableForce', 'Limpar Tabela de Papel Permanentemente', '2020-02-13 22:28:30', '2020-02-13 22:28:30', NULL),
(78, 'permission-role', 'Acesso ao Módulo de Permissão a Papel', '2020-02-13 22:28:48', '2020-02-13 22:28:48', NULL),
(79, 'permission-role-create', 'Criar Permissão a Papel', '2020-02-13 22:28:48', '2020-02-13 22:28:48', NULL),
(80, 'permission-role-destroyFake', 'Remover Permissão a Papel', '2020-02-13 22:28:48', '2020-02-13 22:28:48', NULL),
(81, 'permission-role-clearTable', 'Limpar Tabela de Permissão a Papel', '2020-02-13 22:28:48', '2020-02-13 22:28:48', NULL),
(82, 'permission-role-edit', 'Visualizar Detalhes de Permissão a Papel', '2020-02-13 22:28:48', '2020-02-13 22:28:48', NULL),
(83, 'permission-role-update', 'Atualizar Permissão a Papel', '2020-02-13 22:28:48', '2020-02-13 22:28:48', NULL),
(84, 'permission-role-trash', 'Acessar Lixeira de Permissão a Papel', '2020-02-13 22:28:48', '2020-02-13 22:28:48', NULL),
(85, 'permission-role-editTrash', 'Visualizar Detalhes da Lixeira de Permissão a Papel', '2020-02-13 22:28:48', '2020-02-13 22:28:48', NULL),
(86, 'permission-role-updateTrash', 'Atualizar Permissão a Papel da Lixeira', '2020-02-13 22:28:48', '2020-02-13 22:28:48', NULL),
(87, 'permission-role-restore', 'Restaurar Permissão a Papel da Lixeira', '2020-02-13 22:28:48', '2020-02-13 22:28:48', NULL),
(88, 'permission-role-destroy', 'Remover Permissão a Papel Permanentemente', '2020-02-13 22:28:48', '2020-02-13 22:28:48', NULL),
(89, 'permission-role-clearTableForce', 'Limpar Tabela de Permissão a Papel Permanentemente', '2020-02-13 22:28:48', '2020-02-13 22:28:48', NULL),
(90, 'role-user', 'Acesso ao Módulo de Papel a Usuário', '2020-02-13 22:29:06', '2020-02-13 22:29:06', NULL),
(91, 'role-user-create', 'Criar Papel a Usuário', '2020-02-13 22:29:06', '2020-02-13 22:29:06', NULL),
(92, 'role-user-destroyFake', 'Remover Papel a Usuário', '2020-02-13 22:29:06', '2020-02-13 22:29:06', NULL),
(93, 'role-user-clearTable', 'Limpar Tabela de Papel a Usuário', '2020-02-13 22:29:06', '2020-02-13 22:29:06', NULL),
(94, 'role-user-edit', 'Visualizar Detalhes de Papel a Usuário', '2020-02-13 22:29:06', '2020-02-13 22:29:06', NULL),
(95, 'role-user-update', 'Atualizar Papel a Usuário', '2020-02-13 22:29:06', '2020-02-13 22:29:06', NULL),
(96, 'role-user-trash', 'Acessar Lixeira de Papel a Usuário', '2020-02-13 22:29:06', '2020-02-13 22:29:06', NULL),
(97, 'role-user-editTrash', 'Visualizar Detalhes da Lixeira de Papel a Usuário', '2020-02-13 22:29:06', '2020-02-13 22:29:06', NULL),
(98, 'role-user-updateTrash', 'Atualizar Papel a Usuário da Lixeira', '2020-02-13 22:29:06', '2020-02-13 22:29:06', NULL),
(99, 'role-user-restore', 'Restaurar Papel a Usuário da Lixeira', '2020-02-13 22:29:06', '2020-02-13 22:29:06', NULL),
(100, 'role-user-destroy', 'Remover Papel a Usuário Permanentemente', '2020-02-13 22:29:06', '2020-02-13 22:29:06', NULL),
(101, 'role-user-clearTableForce', 'Limpar Tabela de Papel a Usuário Permanentemente', '2020-02-13 22:29:06', '2020-02-13 22:29:06', NULL),
(102, 'acl', 'Acesso a ACL', '2020-02-13 22:30:05', '2020-02-13 22:30:05', NULL),
(104, 'trash', 'Acesso ao Módulo da Lixeira', '2020-02-14 21:54:40', '2020-02-14 21:54:40', NULL),
(105, 'blog', 'Acesso ao Módulo de Blogs', '2020-07-17 16:18:02', '2020-07-17 16:18:02', NULL),
(106, 'blog-create', 'Criar Blogs', '2020-07-17 16:18:02', '2020-07-17 16:18:02', NULL),
(107, 'blog-destroyFake', 'Remover Blogs', '2020-07-17 16:18:02', '2020-07-17 16:18:02', NULL),
(108, 'blog-clearTable', 'Limpar Tabela de Blogs', '2020-07-17 16:18:02', '2020-07-17 16:18:02', NULL),
(109, 'blog-edit', 'Visualizar Detalhes de Blogs', '2020-07-17 16:18:02', '2020-07-17 16:18:02', NULL),
(110, 'blog-update', 'Atualizar Blogs', '2020-07-17 16:18:02', '2020-07-17 16:18:02', NULL),
(111, 'blog-trash', 'Acessar Lixeira de Blogs', '2020-07-17 16:18:02', '2020-07-17 16:18:02', NULL),
(112, 'blog-editTrash', 'Visualizar Detalhes da Lixeira de Blogs', '2020-07-17 16:18:02', '2020-07-17 16:18:02', NULL),
(113, 'blog-updateTrash', 'Atualizar Blogs da Lixeira', '2020-07-17 16:18:02', '2020-07-17 16:18:02', NULL),
(114, 'blog-restore', 'Restaurar Blogs da Lixeira', '2020-07-17 16:18:02', '2020-07-17 16:18:02', NULL),
(115, 'blog-destroy', 'Remover Blogs Permanentemente', '2020-07-17 16:18:02', '2020-07-17 16:18:02', NULL),
(116, 'blog-clearTableForce', 'Limpar Tabela de Blogs Permanentemente', '2020-07-17 16:18:02', '2020-07-17 16:18:02', NULL),
(117, 'company', 'Acesso ao Módulo de Endereços', '2020-07-17 16:22:26', '2020-07-17 16:22:26', NULL),
(118, 'company-create', 'Criar Endereços', '2020-07-17 16:22:26', '2020-07-17 16:22:26', NULL),
(119, 'company-destroyFake', 'Remover Endereços', '2020-07-17 16:22:26', '2020-07-17 16:22:26', NULL),
(120, 'company-clearTable', 'Limpar Tabela de Endereços', '2020-07-17 16:22:26', '2020-07-17 16:22:26', NULL),
(121, 'company-edit', 'Visualizar Detalhes de Endereços', '2020-07-17 16:22:26', '2020-07-17 16:22:26', NULL),
(122, 'company-update', 'Atualizar Endereços', '2020-07-17 16:22:26', '2020-07-17 16:22:26', NULL),
(123, 'company-trash', 'Acessar Lixeira de Endereços', '2020-07-17 16:22:26', '2020-07-17 16:22:26', NULL),
(124, 'company-editTrash', 'Visualizar Detalhes da Lixeira de Endereços', '2020-07-17 16:22:26', '2020-07-17 16:22:26', NULL),
(125, 'company-updateTrash', 'Atualizar Endereços da Lixeira', '2020-07-17 16:22:26', '2020-07-17 16:22:26', NULL),
(126, 'company-restore', 'Restaurar Endereços da Lixeira', '2020-07-17 16:22:26', '2020-07-17 16:22:26', NULL),
(127, 'company-destroy', 'Remover Endereços Permanentemente', '2020-07-17 16:22:26', '2020-07-17 16:22:26', NULL),
(128, 'company-clearTableForce', 'Limpar Tabela de Endereços Permanentemente', '2020-07-17 16:22:26', '2020-07-17 16:22:26', NULL),
(129, 'funfact', 'Acesso ao Módulo de Fatos interessantes', '2020-07-17 16:24:07', '2020-07-17 16:24:07', NULL),
(130, 'funfact-create', 'Criar Fatos interessantes', '2020-07-17 16:24:07', '2020-07-17 16:24:07', NULL),
(131, 'funfact-destroyFake', 'Remover Fatos interessantes', '2020-07-17 16:24:07', '2020-07-17 16:24:07', NULL),
(132, 'funfact-clearTable', 'Limpar Tabela de Fatos interessantes', '2020-07-17 16:24:07', '2020-07-17 16:24:07', NULL),
(133, 'funfact-edit', 'Visualizar Detalhes de Fatos interessantes', '2020-07-17 16:24:07', '2020-07-17 16:24:07', NULL),
(134, 'funfact-update', 'Atualizar Fatos interessantes', '2020-07-17 16:24:07', '2020-07-17 16:24:07', NULL),
(135, 'funfact-trash', 'Acessar Lixeira de Fatos interessantes', '2020-07-17 16:24:07', '2020-07-17 16:24:07', NULL),
(136, 'funfact-editTrash', 'Visualizar Detalhes da Lixeira de Fatos interessantes', '2020-07-17 16:24:07', '2020-07-17 16:24:07', NULL),
(137, 'funfact-updateTrash', 'Atualizar Fatos interessantes da Lixeira', '2020-07-17 16:24:07', '2020-07-17 16:24:07', NULL),
(138, 'funfact-restore', 'Restaurar Fatos interessantes da Lixeira', '2020-07-17 16:24:07', '2020-07-17 16:24:07', NULL),
(139, 'funfact-destroy', 'Remover Fatos interessantes Permanentemente', '2020-07-17 16:24:07', '2020-07-17 16:24:07', NULL),
(140, 'funfact-clearTableForce', 'Limpar Tabela de Fatos interessantes Permanentemente', '2020-07-17 16:24:07', '2020-07-17 16:24:07', NULL),
(141, 'portfolio', 'Acesso ao Módulo de Portifolio', '2020-07-17 16:25:44', '2020-07-17 16:25:44', NULL),
(142, 'portfolio-create', 'Criar Portifolio', '2020-07-17 16:25:44', '2020-07-17 16:25:44', NULL),
(143, 'portfolio-destroyFake', 'Remover Portifolio', '2020-07-17 16:25:44', '2020-07-17 16:25:44', NULL),
(144, 'portfolio-clearTable', 'Limpar Tabela de Portifolio', '2020-07-17 16:25:44', '2020-07-17 16:25:44', NULL),
(145, 'portfolio-edit', 'Visualizar Detalhes de Portifolio', '2020-07-17 16:25:44', '2020-07-17 16:25:44', NULL),
(146, 'portfolio-update', 'Atualizar Portifolio', '2020-07-17 16:25:44', '2020-07-17 16:25:44', NULL),
(147, 'portfolio-trash', 'Acessar Lixeira de Portifolio', '2020-07-17 16:25:44', '2020-07-17 16:25:44', NULL),
(148, 'portfolio-editTrash', 'Visualizar Detalhes da Lixeira de Portifolio', '2020-07-17 16:25:44', '2020-07-17 16:25:44', NULL),
(149, 'portfolio-updateTrash', 'Atualizar Portifolio da Lixeira', '2020-07-17 16:25:44', '2020-07-17 16:25:44', NULL),
(150, 'portfolio-restore', 'Restaurar Portifolio da Lixeira', '2020-07-17 16:25:44', '2020-07-17 16:25:44', NULL),
(151, 'portfolio-destroy', 'Remover Portifolio Permanentemente', '2020-07-17 16:25:44', '2020-07-17 16:25:44', NULL),
(152, 'portfolio-clearTableForce', 'Limpar Tabela de Portifolio Permanentemente', '2020-07-17 16:25:44', '2020-07-17 16:25:44', NULL),
(153, 'service', 'Acesso ao Módulo de Serviços', '2020-07-17 16:26:26', '2020-07-17 16:26:26', NULL),
(154, 'service-create', 'Criar Serviços', '2020-07-17 16:26:26', '2020-07-17 16:26:26', NULL),
(155, 'service-destroyFake', 'Remover Serviços', '2020-07-17 16:26:26', '2020-07-17 16:26:26', NULL),
(156, 'service-clearTable', 'Limpar Tabela de Serviços', '2020-07-17 16:26:26', '2020-07-17 16:26:26', NULL),
(157, 'service-edit', 'Visualizar Detalhes de Serviços', '2020-07-17 16:26:26', '2020-07-17 16:26:26', NULL),
(158, 'service-update', 'Atualizar Serviços', '2020-07-17 16:26:26', '2020-07-17 16:26:26', NULL),
(159, 'service-trash', 'Acessar Lixeira de Serviços', '2020-07-17 16:26:26', '2020-07-17 16:26:26', NULL),
(160, 'service-editTrash', 'Visualizar Detalhes da Lixeira de Serviços', '2020-07-17 16:26:26', '2020-07-17 16:26:26', NULL),
(161, 'service-updateTrash', 'Atualizar Serviços da Lixeira', '2020-07-17 16:26:26', '2020-07-17 16:26:26', NULL),
(162, 'service-restore', 'Restaurar Serviços da Lixeira', '2020-07-17 16:26:26', '2020-07-17 16:26:26', NULL),
(163, 'service-destroy', 'Remover Serviços Permanentemente', '2020-07-17 16:26:26', '2020-07-17 16:26:26', NULL),
(164, 'service-clearTableForce', 'Limpar Tabela de Serviços Permanentemente', '2020-07-17 16:26:26', '2020-07-17 16:26:26', NULL),
(165, 'system-companies', 'Acesso ao Módulo de Empresa-Sistema', '2020-07-17 16:49:58', '2020-07-17 16:49:58', NULL),
(166, 'system-companies-create', 'Criar Empresa-Sistema', '2020-07-17 16:49:58', '2020-07-17 16:49:58', NULL),
(167, 'system-companies-destroyFake', 'Remover Empresa-Sistema', '2020-07-17 16:49:58', '2020-07-17 16:49:58', NULL),
(168, 'system-companies-clearTable', 'Limpar Tabela de Empresa-Sistema', '2020-07-17 16:49:58', '2020-07-17 16:49:58', NULL),
(169, 'system-companies-edit', 'Visualizar Detalhes de Empresa-Sistema', '2020-07-17 16:49:58', '2020-07-17 16:49:58', NULL),
(170, 'system-companies-update', 'Atualizar Empresa-Sistema', '2020-07-17 16:49:58', '2020-07-17 16:49:58', NULL),
(171, 'system-companies-trash', 'Acessar Lixeira de Empresa-Sistema', '2020-07-17 16:49:58', '2020-07-17 16:49:58', NULL),
(172, 'system-companies-editTrash', 'Visualizar Detalhes da Lixeira de Empresa-Sistema', '2020-07-17 16:49:58', '2020-07-17 16:49:58', NULL),
(173, 'system-companies-updateTrash', 'Atualizar Empresa-Sistema da Lixeira', '2020-07-17 16:49:58', '2020-07-17 16:49:58', NULL),
(174, 'system-companies-restore', 'Restaurar Empresa-Sistema da Lixeira', '2020-07-17 16:49:58', '2020-07-17 16:49:58', NULL),
(175, 'system-companies-destroy', 'Remover Empresa-Sistema Permanentemente', '2020-07-17 16:49:58', '2020-07-17 16:49:58', NULL),
(176, 'system-companies-clearTableForce', 'Limpar Tabela de Empresa-Sistema Permanentemente', '2020-07-17 16:49:58', '2020-07-17 16:49:58', NULL),
(177, 'employees', 'Acesso ao Módulo de Funcionários', '2020-07-17 16:52:20', '2020-07-17 16:52:20', NULL),
(178, 'employees-create', 'Criar Funcionários', '2020-07-17 16:52:20', '2020-07-17 16:52:20', NULL),
(179, 'employees-destroyFake', 'Remover Funcionários', '2020-07-17 16:52:20', '2020-07-17 16:52:20', NULL),
(180, 'employees-clearTable', 'Limpar Tabela de Funcionários', '2020-07-17 16:52:20', '2020-07-17 16:52:20', NULL),
(181, 'employees-edit', 'Visualizar Detalhes de Funcionários', '2020-07-17 16:52:20', '2020-07-17 16:52:20', NULL),
(182, 'employees-update', 'Atualizar Funcionários', '2020-07-17 16:52:20', '2020-07-17 16:52:20', NULL),
(183, 'employees-trash', 'Acessar Lixeira de Funcionários', '2020-07-17 16:52:20', '2020-07-17 16:52:20', NULL),
(184, 'employees-editTrash', 'Visualizar Detalhes da Lixeira de Funcionários', '2020-07-17 16:52:20', '2020-07-17 16:52:20', NULL),
(185, 'employees-updateTrash', 'Atualizar Funcionários da Lixeira', '2020-07-17 16:52:20', '2020-07-17 16:52:20', NULL),
(186, 'employees-restore', 'Restaurar Funcionários da Lixeira', '2020-07-17 16:52:20', '2020-07-17 16:52:20', NULL),
(187, 'employees-destroy', 'Remover Funcionários Permanentemente', '2020-07-17 16:52:20', '2020-07-17 16:52:20', NULL),
(188, 'employees-clearTableForce', 'Limpar Tabela de Funcionários Permanentemente', '2020-07-17 16:52:20', '2020-07-17 16:52:20', NULL),
(189, 'doctors', 'Acesso ao Módulo de Médicos', '2020-07-17 16:53:39', '2020-07-17 16:53:39', NULL),
(190, 'doctors-create', 'Criar Médicos', '2020-07-17 16:53:39', '2020-07-17 16:53:39', NULL),
(191, 'doctors-destroyFake', 'Remover Médicos', '2020-07-17 16:53:39', '2020-07-17 16:53:39', NULL),
(192, 'doctors-clearTable', 'Limpar Tabela de Médicos', '2020-07-17 16:53:39', '2020-07-17 16:53:39', NULL),
(193, 'doctors-edit', 'Visualizar Detalhes de Médicos', '2020-07-17 16:53:39', '2020-07-17 16:53:39', NULL),
(194, 'doctors-update', 'Atualizar Médicos', '2020-07-17 16:53:39', '2020-07-17 16:53:39', NULL),
(195, 'doctors-trash', 'Acessar Lixeira de Médicos', '2020-07-17 16:53:39', '2020-07-17 16:53:39', NULL),
(196, 'doctors-editTrash', 'Visualizar Detalhes da Lixeira de Médicos', '2020-07-17 16:53:39', '2020-07-17 16:53:39', NULL),
(197, 'doctors-updateTrash', 'Atualizar Médicos da Lixeira', '2020-07-17 16:53:39', '2020-07-17 16:53:39', NULL),
(198, 'doctors-restore', 'Restaurar Médicos da Lixeira', '2020-07-17 16:53:39', '2020-07-17 16:53:39', NULL),
(199, 'doctors-destroy', 'Remover Médicos Permanentemente', '2020-07-17 16:53:39', '2020-07-17 16:53:39', NULL),
(200, 'doctors-clearTableForce', 'Limpar Tabela de Médicos Permanentemente', '2020-07-17 16:53:39', '2020-07-17 16:53:39', NULL),
(201, 'aso', 'Acesso ao Módulo de Asos', '2020-07-17 16:54:04', '2020-07-17 16:54:04', NULL),
(202, 'aso-create', 'Criar Asos', '2020-07-17 16:54:04', '2020-07-17 16:54:04', NULL),
(203, 'aso-destroyFake', 'Remover Asos', '2020-07-17 16:54:04', '2020-07-17 16:54:04', NULL),
(204, 'aso-clearTable', 'Limpar Tabela de Asos', '2020-07-17 16:54:04', '2020-07-17 16:54:04', NULL),
(205, 'aso-edit', 'Visualizar Detalhes de Asos', '2020-07-17 16:54:04', '2020-07-17 16:54:04', NULL),
(206, 'aso-update', 'Atualizar Asos', '2020-07-17 16:54:04', '2020-07-17 16:54:04', NULL),
(207, 'aso-trash', 'Acessar Lixeira de Asos', '2020-07-17 16:54:04', '2020-07-17 16:54:04', NULL),
(208, 'aso-editTrash', 'Visualizar Detalhes da Lixeira de Asos', '2020-07-17 16:54:04', '2020-07-17 16:54:04', NULL),
(209, 'aso-updateTrash', 'Atualizar Asos da Lixeira', '2020-07-17 16:54:04', '2020-07-17 16:54:04', NULL),
(210, 'aso-restore', 'Restaurar Asos da Lixeira', '2020-07-17 16:54:04', '2020-07-17 16:54:04', NULL),
(211, 'aso-destroy', 'Remover Asos Permanentemente', '2020-07-17 16:54:04', '2020-07-17 16:54:04', NULL),
(212, 'aso-clearTableForce', 'Limpar Tabela de Asos Permanentemente', '2020-07-17 16:54:04', '2020-07-17 16:54:04', NULL),
(213, 'anamnese', 'Acesso ao Módulo de Anamneses', '2020-07-17 16:54:29', '2020-07-17 16:54:29', NULL),
(214, 'anamnese-create', 'Criar Anamneses', '2020-07-17 16:54:29', '2020-07-17 16:54:29', NULL),
(215, 'anamnese-destroyFake', 'Remover Anamneses', '2020-07-17 16:54:29', '2020-07-17 16:54:29', NULL),
(216, 'anamnese-clearTable', 'Limpar Tabela de Anamneses', '2020-07-17 16:54:29', '2020-07-17 16:54:29', NULL),
(217, 'anamnese-edit', 'Visualizar Detalhes de Anamneses', '2020-07-17 16:54:29', '2020-07-17 16:54:29', NULL),
(218, 'anamnese-update', 'Atualizar Anamneses', '2020-07-17 16:54:29', '2020-07-17 16:54:29', NULL),
(219, 'anamnese-trash', 'Acessar Lixeira de Anamneses', '2020-07-17 16:54:29', '2020-07-17 16:54:29', NULL),
(220, 'anamnese-editTrash', 'Visualizar Detalhes da Lixeira de Anamneses', '2020-07-17 16:54:29', '2020-07-17 16:54:29', NULL),
(221, 'anamnese-updateTrash', 'Atualizar Anamneses da Lixeira', '2020-07-17 16:54:29', '2020-07-17 16:54:29', NULL),
(222, 'anamnese-restore', 'Restaurar Anamneses da Lixeira', '2020-07-17 16:54:29', '2020-07-17 16:54:29', NULL),
(223, 'anamnese-destroy', 'Remover Anamneses Permanentemente', '2020-07-17 16:54:29', '2020-07-17 16:54:29', NULL),
(224, 'anamnese-clearTableForce', 'Limpar Tabela de Anamneses Permanentemente', '2020-07-17 16:54:29', '2020-07-17 16:54:29', NULL),
(225, 'screening', 'Acesso ao Módulo de Triagens', '2020-07-17 16:55:13', '2020-07-17 16:55:13', NULL),
(226, 'screening-create', 'Criar Triagens', '2020-07-17 16:55:13', '2020-07-17 16:55:13', NULL),
(227, 'screening-destroyFake', 'Remover Triagens', '2020-07-17 16:55:13', '2020-07-17 16:55:13', NULL),
(228, 'screening-clearTable', 'Limpar Tabela de Triagens', '2020-07-17 16:55:13', '2020-07-17 16:55:13', NULL),
(229, 'screening-edit', 'Visualizar Detalhes de Triagens', '2020-07-17 16:55:13', '2020-07-17 16:55:13', NULL),
(230, 'screening-update', 'Atualizar Triagens', '2020-07-17 16:55:13', '2020-07-17 16:55:13', NULL),
(231, 'screening-trash', 'Acessar Lixeira de Triagens', '2020-07-17 16:55:13', '2020-07-17 16:55:13', NULL),
(232, 'screening-editTrash', 'Visualizar Detalhes da Lixeira de Triagens', '2020-07-17 16:55:13', '2020-07-17 16:55:13', NULL),
(233, 'screening-updateTrash', 'Atualizar Triagens da Lixeira', '2020-07-17 16:55:13', '2020-07-17 16:55:13', NULL),
(234, 'screening-restore', 'Restaurar Triagens da Lixeira', '2020-07-17 16:55:13', '2020-07-17 16:55:13', NULL),
(235, 'screening-destroy', 'Remover Triagens Permanentemente', '2020-07-17 16:55:13', '2020-07-17 16:55:13', NULL),
(236, 'screening-clearTableForce', 'Limpar Tabela de Triagens Permanentemente', '2020-07-17 16:55:13', '2020-07-17 16:55:13', NULL),
(237, 'system', 'Acesso ao módulo sistema', '2020-07-17 17:31:08', '2020-07-17 17:31:08', NULL),
(238, 'profile', 'Acesso ao Módulo de perfis', '2020-10-21 21:49:51', '2020-10-21 21:49:51', NULL),
(239, 'profile-create', 'Criar perfis', '2020-10-21 21:49:51', '2020-10-21 21:49:51', NULL),
(240, 'profile-destroyFake', 'Remover perfis', '2020-10-21 21:49:51', '2020-10-21 21:49:51', NULL),
(241, 'profile-clearTable', 'Limpar Tabela de perfis', '2020-10-21 21:49:51', '2020-10-21 21:49:51', NULL),
(242, 'profile-edit', 'Visualizar Detalhes de perfis', '2020-10-21 21:49:51', '2020-10-21 21:49:51', NULL),
(243, 'profile-update', 'Atualizar perfis', '2020-10-21 21:49:51', '2020-10-21 21:49:51', NULL),
(244, 'profile-trash', 'Acessar Lixeira de perfis', '2020-10-21 21:49:51', '2020-10-21 21:49:51', NULL),
(245, 'profile-editTrash', 'Visualizar Detalhes da Lixeira de perfis', '2020-10-21 21:49:51', '2020-10-21 21:49:51', NULL),
(246, 'profile-updateTrash', 'Atualizar perfis da Lixeira', '2020-10-21 21:49:51', '2020-10-21 21:49:51', NULL),
(247, 'profile-restore', 'Restaurar perfis da Lixeira', '2020-10-21 21:49:51', '2020-10-21 21:49:51', NULL),
(248, 'profile-destroy', 'Remover perfis Permanentemente', '2020-10-21 21:49:51', '2020-10-21 21:49:51', NULL),
(249, 'profile-clearTableForce', 'Limpar Tabela de perfis Permanentemente', '2020-10-21 21:49:51', '2020-10-21 21:49:51', NULL);

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
(2453, 42, 9, '2020-02-17 21:14:09', '2020-02-17 21:14:09', NULL),
(2454, 47, 9, '2020-02-17 21:14:09', '2020-02-17 21:14:09', NULL),
(2455, 43, 9, '2020-02-17 21:14:09', '2020-02-17 21:14:09', NULL),
(2456, 46, 9, '2020-02-17 21:14:09', '2020-02-17 21:14:09', NULL),
(2457, 42, 3, '2020-02-17 21:14:30', '2020-02-17 21:14:30', NULL),
(2458, 46, 3, '2020-02-17 21:14:30', '2020-02-17 21:14:30', NULL),
(3507, 219, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3508, 207, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3509, 48, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3510, 111, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3511, 171, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3512, 123, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3513, 135, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3514, 183, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3515, 195, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3516, 72, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3517, 96, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3518, 60, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3519, 84, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3520, 147, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3521, 159, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3522, 231, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3523, 36, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3524, 104, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3525, 213, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3526, 201, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3527, 42, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3528, 105, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3529, 165, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3530, 117, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3531, 129, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3532, 177, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3533, 189, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3534, 141, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3535, 153, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3536, 225, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3537, 30, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3538, 237, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3539, 218, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3540, 221, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3541, 206, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3542, 209, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3543, 47, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3544, 50, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3545, 110, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3546, 113, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3547, 170, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3548, 173, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3549, 122, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3550, 125, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3551, 134, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3552, 137, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3553, 182, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3554, 185, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3555, 194, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3556, 197, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3557, 71, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3558, 95, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3559, 98, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3560, 74, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3561, 59, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3562, 83, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3563, 86, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3564, 62, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3565, 146, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3566, 149, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3567, 158, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3568, 161, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3569, 230, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3570, 233, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3571, 35, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3572, 38, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3573, 214, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3574, 202, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3575, 43, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3576, 106, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3577, 166, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3578, 118, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3579, 130, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3580, 178, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3581, 190, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3582, 67, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3583, 91, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3584, 55, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3585, 79, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3586, 142, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3587, 154, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3588, 226, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3589, 31, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3590, 216, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3591, 204, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3592, 45, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3593, 108, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3594, 168, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3595, 120, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3596, 132, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3597, 180, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3598, 192, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3599, 69, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3600, 93, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3601, 57, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3602, 81, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3603, 144, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3604, 156, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3605, 228, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3606, 215, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3607, 203, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3608, 44, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3609, 107, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3610, 167, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3611, 119, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3612, 131, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3613, 179, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3614, 191, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3615, 68, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3616, 92, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3617, 56, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3618, 80, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3619, 143, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3620, 155, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3621, 227, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3622, 222, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3623, 210, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3624, 51, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3625, 114, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3626, 174, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3627, 126, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3628, 138, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3629, 186, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3630, 198, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3631, 99, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3632, 75, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3633, 87, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3634, 63, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3635, 150, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3636, 162, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3637, 234, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3638, 39, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3639, 220, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3640, 208, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3641, 49, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3642, 112, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3643, 172, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3644, 124, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3645, 136, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3646, 184, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3647, 196, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3648, 73, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3649, 97, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3650, 61, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3651, 85, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3652, 148, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3653, 160, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3654, 232, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3655, 37, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3656, 217, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3657, 205, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3658, 46, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3659, 109, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3660, 169, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3661, 121, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3662, 133, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3663, 181, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3664, 193, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3665, 70, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3666, 94, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3667, 58, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3668, 82, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3669, 145, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3670, 157, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3671, 229, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(3672, 34, 1, '2020-07-20 16:14:56', '2020-07-20 16:14:56', NULL),
(4344, 219, 12, '2020-10-20 14:33:00', '2020-10-20 14:33:00', NULL),
(4345, 207, 12, '2020-10-20 14:33:00', '2020-10-20 14:33:00', NULL),
(4346, 48, 12, '2020-10-20 14:33:01', '2020-10-20 14:33:01', NULL),
(4347, 111, 12, '2020-10-20 14:33:01', '2020-10-20 14:33:01', NULL),
(4348, 171, 12, '2020-10-20 14:33:01', '2020-10-20 14:33:01', NULL),
(4349, 123, 12, '2020-10-20 14:33:01', '2020-10-20 14:33:01', NULL),
(4350, 135, 12, '2020-10-20 14:33:01', '2020-10-20 14:33:01', NULL),
(4351, 183, 12, '2020-10-20 14:33:01', '2020-10-20 14:33:01', NULL),
(4352, 195, 12, '2020-10-20 14:33:01', '2020-10-20 14:33:01', NULL),
(4353, 72, 12, '2020-10-20 14:33:01', '2020-10-20 14:33:01', NULL),
(4354, 96, 12, '2020-10-20 14:33:01', '2020-10-20 14:33:01', NULL),
(4355, 60, 12, '2020-10-20 14:33:01', '2020-10-20 14:33:01', NULL),
(4356, 84, 12, '2020-10-20 14:33:01', '2020-10-20 14:33:01', NULL),
(4357, 147, 12, '2020-10-20 14:33:01', '2020-10-20 14:33:01', NULL),
(4358, 159, 12, '2020-10-20 14:33:01', '2020-10-20 14:33:01', NULL),
(4359, 231, 12, '2020-10-20 14:33:01', '2020-10-20 14:33:01', NULL),
(4360, 36, 12, '2020-10-20 14:33:01', '2020-10-20 14:33:01', NULL),
(4361, 104, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4362, 213, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4363, 201, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4364, 42, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4365, 105, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4366, 165, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4367, 117, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4368, 129, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4369, 177, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4370, 189, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4371, 141, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4372, 153, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4373, 225, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4374, 237, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4375, 218, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4376, 221, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4377, 206, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4378, 209, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4379, 47, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4380, 50, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4381, 110, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4382, 113, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4383, 170, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4384, 173, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4385, 122, 12, '2020-10-20 14:33:02', '2020-10-20 14:33:02', NULL),
(4386, 125, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4387, 134, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4388, 137, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4389, 182, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4390, 185, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4391, 194, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4392, 197, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4393, 71, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4394, 95, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4395, 98, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4396, 74, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4397, 59, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4398, 83, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4399, 86, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4400, 62, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4401, 146, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4402, 149, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4403, 158, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4404, 161, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4405, 230, 12, '2020-10-20 14:33:03', '2020-10-20 14:33:03', NULL),
(4406, 233, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4407, 35, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4408, 38, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4409, 214, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4410, 202, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4411, 43, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4412, 106, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4413, 166, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4414, 118, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4415, 130, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4416, 178, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4417, 190, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4418, 67, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4419, 91, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4420, 55, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4421, 79, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4422, 142, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4423, 154, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4424, 226, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4425, 31, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4426, 216, 12, '2020-10-20 14:33:04', '2020-10-20 14:33:04', NULL),
(4427, 204, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4428, 45, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4429, 108, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4430, 168, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4431, 120, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4432, 132, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4433, 180, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4434, 192, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4435, 69, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4436, 93, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4437, 57, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4438, 81, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4439, 144, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4440, 156, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4441, 228, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4442, 33, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4443, 215, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4444, 203, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4445, 44, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4446, 107, 12, '2020-10-20 14:33:05', '2020-10-20 14:33:05', NULL),
(4447, 167, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4448, 119, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4449, 131, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4450, 179, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4451, 191, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4452, 68, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4453, 92, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4454, 56, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4455, 80, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4456, 143, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4457, 155, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4458, 227, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4459, 32, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4460, 222, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4461, 210, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4462, 51, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4463, 114, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4464, 174, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4465, 126, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4466, 138, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4467, 186, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4468, 198, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4469, 99, 12, '2020-10-20 14:33:06', '2020-10-20 14:33:06', NULL),
(4470, 75, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4471, 87, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4472, 63, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4473, 150, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4474, 162, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4475, 234, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4476, 39, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4477, 220, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4478, 208, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4479, 49, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4480, 112, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4481, 172, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4482, 124, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4483, 136, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4484, 184, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4485, 196, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4486, 73, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4487, 97, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4488, 61, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4489, 85, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4490, 148, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4491, 160, 12, '2020-10-20 14:33:07', '2020-10-20 14:33:07', NULL),
(4492, 232, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4493, 37, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4494, 217, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4495, 205, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4496, 46, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4497, 109, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4498, 169, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4499, 121, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4500, 133, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4501, 181, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4502, 193, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4503, 70, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4504, 94, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4505, 58, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4506, 82, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4507, 145, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4508, 157, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4509, 229, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4510, 34, 12, '2020-10-20 14:33:08', '2020-10-20 14:33:08', NULL),
(4678, 219, 11, '2020-10-21 19:12:49', '2020-10-21 19:12:49', NULL),
(4679, 207, 11, '2020-10-21 19:12:49', '2020-10-21 19:12:49', NULL),
(4680, 48, 11, '2020-10-21 19:12:49', '2020-10-21 19:12:49', NULL),
(4681, 111, 11, '2020-10-21 19:12:49', '2020-10-21 19:12:49', NULL),
(4682, 171, 11, '2020-10-21 19:12:49', '2020-10-21 19:12:49', NULL),
(4683, 123, 11, '2020-10-21 19:12:49', '2020-10-21 19:12:49', NULL),
(4684, 135, 11, '2020-10-21 19:12:49', '2020-10-21 19:12:49', NULL),
(4685, 183, 11, '2020-10-21 19:12:49', '2020-10-21 19:12:49', NULL),
(4686, 195, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4687, 72, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4688, 96, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4689, 60, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4690, 84, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4691, 147, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4692, 159, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4693, 231, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4694, 36, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4695, 104, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4696, 213, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4697, 201, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4698, 42, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4699, 105, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4700, 165, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4701, 117, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4702, 129, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4703, 177, 11, '2020-10-21 19:12:50', '2020-10-21 19:12:50', NULL),
(4704, 189, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4705, 238, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4706, 141, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4707, 153, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4708, 225, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4709, 237, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4710, 218, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4711, 221, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4712, 206, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4713, 209, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4714, 47, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4715, 50, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4716, 110, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4717, 113, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4718, 170, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4719, 173, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4720, 122, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4721, 125, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4722, 134, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4723, 137, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4724, 182, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4725, 185, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4726, 194, 11, '2020-10-21 19:12:51', '2020-10-21 19:12:51', NULL),
(4727, 197, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4728, 71, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4729, 95, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4730, 98, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4731, 74, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4732, 243, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4733, 59, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4734, 83, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4735, 86, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4736, 62, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4737, 146, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4738, 149, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4739, 158, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4740, 161, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4741, 230, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4742, 233, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4743, 35, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4744, 38, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4745, 214, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4746, 202, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4747, 43, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4748, 106, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4749, 166, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4750, 118, 11, '2020-10-21 19:12:52', '2020-10-21 19:12:52', NULL),
(4751, 130, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4752, 178, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4753, 190, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4754, 67, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4755, 91, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4756, 55, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4757, 79, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4758, 142, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4759, 154, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4760, 226, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4761, 31, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4762, 216, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4763, 204, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4764, 45, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4765, 108, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4766, 168, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4767, 120, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4768, 132, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4769, 180, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4770, 192, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4771, 69, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4772, 93, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4773, 57, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4774, 81, 11, '2020-10-21 19:12:53', '2020-10-21 19:12:53', NULL),
(4775, 144, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4776, 156, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4777, 228, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4778, 33, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4779, 215, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4780, 203, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4781, 44, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4782, 107, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4783, 167, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4784, 119, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4785, 131, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4786, 179, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4787, 191, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4788, 68, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4789, 92, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4790, 56, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4791, 80, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4792, 143, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4793, 155, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4794, 227, 11, '2020-10-21 19:12:54', '2020-10-21 19:12:54', NULL),
(4795, 32, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4796, 222, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4797, 210, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4798, 51, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4799, 114, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4800, 174, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4801, 126, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4802, 138, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4803, 186, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4804, 198, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4805, 99, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4806, 75, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4807, 87, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4808, 63, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4809, 150, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4810, 162, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4811, 234, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4812, 39, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4813, 220, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4814, 208, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4815, 49, 11, '2020-10-21 19:12:55', '2020-10-21 19:12:55', NULL),
(4816, 112, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4817, 172, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4818, 124, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4819, 136, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4820, 184, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4821, 196, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4822, 73, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4823, 97, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4824, 61, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4825, 85, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4826, 148, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4827, 160, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4828, 232, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4829, 37, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4830, 217, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4831, 205, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4832, 46, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4833, 109, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4834, 169, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4835, 121, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4836, 133, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4837, 181, 11, '2020-10-21 19:12:56', '2020-10-21 19:12:56', NULL),
(4838, 193, 11, '2020-10-21 19:12:57', '2020-10-21 19:12:57', NULL),
(4839, 70, 11, '2020-10-21 19:12:57', '2020-10-21 19:12:57', NULL),
(4840, 94, 11, '2020-10-21 19:12:57', '2020-10-21 19:12:57', NULL),
(4841, 242, 11, '2020-10-21 19:12:57', '2020-10-21 19:12:57', NULL),
(4842, 58, 11, '2020-10-21 19:12:57', '2020-10-21 19:12:57', NULL),
(4843, 82, 11, '2020-10-21 19:12:57', '2020-10-21 19:12:57', NULL),
(4844, 145, 11, '2020-10-21 19:12:57', '2020-10-21 19:12:57', NULL),
(4845, 157, 11, '2020-10-21 19:12:57', '2020-10-21 19:12:57', NULL),
(4846, 229, 11, '2020-10-21 19:12:57', '2020-10-21 19:12:57', NULL),
(4847, 34, 11, '2020-10-21 19:12:57', '2020-10-21 19:12:57', NULL),
(4848, 219, 10, '2020-10-21 19:13:14', '2020-10-21 19:13:14', NULL),
(4849, 207, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4850, 48, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4851, 111, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4852, 171, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4853, 123, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4854, 135, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4855, 183, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4856, 195, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4857, 72, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4858, 96, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4859, 60, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4860, 84, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4861, 147, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4862, 159, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4863, 231, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4864, 36, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4865, 104, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4866, 213, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4867, 201, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4868, 42, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4869, 105, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4870, 165, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4871, 117, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4872, 129, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4873, 177, 10, '2020-10-21 19:13:15', '2020-10-21 19:13:15', NULL),
(4874, 189, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4875, 238, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4876, 141, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4877, 153, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4878, 225, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4879, 237, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4880, 218, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4881, 221, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4882, 206, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4883, 209, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4884, 47, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4885, 50, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4886, 110, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4887, 113, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4888, 170, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4889, 173, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4890, 122, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4891, 125, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4892, 134, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4893, 137, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4894, 182, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4895, 185, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4896, 194, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4897, 197, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4898, 71, 10, '2020-10-21 19:13:16', '2020-10-21 19:13:16', NULL),
(4899, 95, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4900, 98, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4901, 74, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4902, 243, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4903, 59, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4904, 83, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4905, 86, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4906, 62, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4907, 146, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4908, 149, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4909, 158, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4910, 161, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4911, 230, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4912, 233, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4913, 35, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4914, 38, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4915, 214, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4916, 202, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4917, 43, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4918, 106, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4919, 166, 10, '2020-10-21 19:13:17', '2020-10-21 19:13:17', NULL),
(4920, 118, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4921, 130, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4922, 178, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4923, 190, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4924, 67, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4925, 91, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4926, 55, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4927, 79, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4928, 142, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4929, 154, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4930, 226, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4931, 31, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4932, 216, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4933, 204, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4934, 45, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4935, 108, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4936, 168, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4937, 120, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4938, 132, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4939, 180, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4940, 192, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4941, 69, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4942, 93, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4943, 57, 10, '2020-10-21 19:13:18', '2020-10-21 19:13:18', NULL),
(4944, 81, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4945, 144, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4946, 156, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4947, 228, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4948, 33, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4949, 215, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4950, 203, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4951, 44, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4952, 107, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4953, 167, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4954, 119, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4955, 131, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4956, 179, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4957, 191, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4958, 68, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4959, 92, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4960, 56, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4961, 80, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4962, 143, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4963, 155, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4964, 227, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4965, 32, 10, '2020-10-21 19:13:19', '2020-10-21 19:13:19', NULL),
(4966, 222, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4967, 210, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4968, 51, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4969, 114, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4970, 174, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4971, 126, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4972, 138, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4973, 186, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4974, 198, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4975, 99, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4976, 75, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4977, 87, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4978, 63, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4979, 150, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4980, 162, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4981, 234, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4982, 39, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4983, 220, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4984, 208, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4985, 49, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4986, 112, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4987, 172, 10, '2020-10-21 19:13:20', '2020-10-21 19:13:20', NULL),
(4988, 124, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(4989, 136, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(4990, 184, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(4991, 196, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(4992, 73, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(4993, 97, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(4994, 61, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(4995, 85, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(4996, 148, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(4997, 160, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(4998, 232, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(4999, 37, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(5000, 217, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(5001, 205, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(5002, 46, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(5003, 109, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(5004, 169, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(5005, 121, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(5006, 133, 10, '2020-10-21 19:13:21', '2020-10-21 19:13:21', NULL),
(5007, 181, 10, '2020-10-21 19:13:22', '2020-10-21 19:13:22', NULL),
(5008, 193, 10, '2020-10-21 19:13:22', '2020-10-21 19:13:22', NULL),
(5009, 70, 10, '2020-10-21 19:13:22', '2020-10-21 19:13:22', NULL),
(5010, 94, 10, '2020-10-21 19:13:22', '2020-10-21 19:13:22', NULL),
(5011, 242, 10, '2020-10-21 19:13:22', '2020-10-21 19:13:22', NULL),
(5012, 58, 10, '2020-10-21 19:13:22', '2020-10-21 19:13:22', NULL),
(5013, 82, 10, '2020-10-21 19:13:22', '2020-10-21 19:13:22', NULL),
(5014, 145, 10, '2020-10-21 19:13:22', '2020-10-21 19:13:22', NULL),
(5015, 157, 10, '2020-10-21 19:13:22', '2020-10-21 19:13:22', NULL),
(5016, 229, 10, '2020-10-21 19:13:22', '2020-10-21 19:13:22', NULL),
(5017, 34, 10, '2020-10-21 19:13:22', '2020-10-21 19:13:22', NULL);

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
(3, 'Sicoob', '202004160059325e97d824e3406.png', 'Sicoob', 1, '2020-04-16 03:59:33', '2020-09-11 19:13:22', NULL),
(4, 'Brazil Atacado', '202004160059515e97d837055fc.png', 'Brazil Atacado', 1, '2020-04-16 03:59:51', '2020-09-11 19:24:47', NULL),
(5, 'Cipan', '202004160100145e97d84e1bbc7.png', 'Cipan', 1, '2020-04-16 04:00:14', '2020-04-16 04:00:14', NULL),
(6, 'Vitamassa', '202004160100405e97d8682e03b.png', 'Vitamassa', 1, '2020-04-16 04:00:40', '2020-04-16 04:00:40', NULL),
(7, 'Rally Motos', '202004160100555e97d877b7ee1.png', 'Rally Motos', 1, '2020-04-16 04:00:58', '2020-09-11 19:29:50', NULL),
(8, 'Redepharma', '202004160101095e97d88599598.png', 'Redepharma', 1, '2020-04-16 04:01:09', '2020-09-11 19:32:57', NULL),
(9, 'Pbnet', '202004160101285e97d8985361b.png', 'Pbnet', 1, '2020-04-16 04:01:28', '2020-08-05 20:02:24', '2020-08-05 17:08:24'),
(10, 'BL Atacado', '202004160101435e97d8a70b9d5.png', 'BL Atacado', 1, '2020-04-16 04:01:43', '2020-09-11 19:36:48', NULL),
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
(21, 'Infoway', '202004160105585e97d9a659136.png', 'Infoway', 1, '2020-04-16 04:05:58', '2020-09-11 19:34:06', NULL),
(22, 'Produtos Real', '202004160106375e97d9cdad3be.png', 'Produtos Real', 1, '2020-04-16 04:06:37', '2020-04-16 04:06:37', NULL),
(23, 'Central da Economia', '202004160106525e97d9dc7c53d.png', 'Central da Economia', 1, '2020-04-16 04:06:52', '2020-04-16 04:06:52', NULL),
(24, 'SS Toledo', '202004160107105e97d9eec50d4.png', 'SS Toledo', 1, '2020-04-16 04:07:10', '2020-04-16 04:07:10', NULL),
(25, 'C&T Digital', '202004160107275e97d9ff5a067.png', 'C&T Digital', 1, '2020-04-16 04:07:27', '2020-04-16 04:07:27', NULL),
(26, 'C&T Consultores e Associados', '202004160107485e97da148250f.png', 'C&T Consultores e Associados', 1, '2020-04-16 04:07:48', '2020-04-16 04:07:48', NULL),
(27, 'CDBR Certificadora', '202004160108145e97da2e9e31e.png', 'CDBR Certificadora', 1, '2020-04-16 04:08:14', '2020-04-16 04:08:14', NULL),
(28, 'SToledo', '202004160108305e97da3ebbf38.png', 'SToledo', 1, '2020-04-16 04:08:30', '2020-04-16 04:08:30', NULL),
(29, 'Vitória Supermercado', '202007131706155f0cbeb73e73c.jpg', 'Vitória Supermercado', 1, '2020-07-13 20:06:15', '2020-07-13 20:06:15', NULL),
(30, 'Varejão Padre Cicero', '202007131709055f0cbf61bfaae.jpg', 'Varejão Padre Cicero', 1, '2020-07-13 20:09:05', '2020-07-13 20:09:05', NULL),
(31, 'Sacolão Supermercado', '202007131710355f0cbfbb0ec95.jpg', 'Sacolão Supermercado', 1, '2020-07-13 20:10:35', '2020-07-13 20:10:35', NULL),
(32, 'Compre Mais Rede de Supermercados', '202007131718375f0cc19dc4f02.jpg', 'Compre Mais Rede de Supermercados', 1, '2020-07-13 20:18:37', '2020-07-13 20:18:37', NULL),
(33, 'Supermercado Mini Preço', '202007131719145f0cc1c2d283e.jpg', 'Supermercado Mini Preço', 1, '2020-07-13 20:19:14', '2020-07-13 20:19:14', NULL),
(34, 'Logos', '202007131720305f0cc20e70284.jpg', 'Logos', 1, '2020-07-13 20:20:30', '2020-09-11 19:36:23', NULL),
(35, 'Granja Santa Clara', '202007131722145f0cc27639331.jpg', 'Granja Santa Clara', 1, '2020-07-13 20:22:14', '2020-07-13 20:22:14', NULL),
(36, 'Prontanalise', '202007131726095f0cc361a087d.png', 'Prontanalise', 1, '2020-07-13 20:26:09', '2020-07-13 20:26:09', NULL),
(37, 'Master Supermercado', '202007131726525f0cc38c5b851.jpg', 'Master Supermercado', 1, '2020-07-13 20:26:52', '2020-07-13 20:26:52', NULL),
(38, 'Catamais', '202007131727375f0cc3b94dd05.jpg', 'Catamais', 1, '2020-07-13 20:27:37', '2020-09-11 19:28:22', NULL),
(39, 'O Filezão', '202007131732395f0cc4e758bb6.jpg', 'O Filezão', 1, '2020-07-13 20:32:39', '2020-07-13 20:32:39', NULL),
(40, 'Chinatown Campina Grande', '202007240906535f1acedd009d8.jpg', 'Chinatown Campina Grande', 1, '2020-07-24 12:06:53', '2020-07-24 12:06:53', NULL),
(41, 'Lojão Paraíba Center', '202007240907235f1acefb073ce.jpg', 'Lojão Paraíba Center', 1, '2020-07-24 12:07:23', '2020-07-24 12:07:23', NULL),
(42, 'Marpeças', '202008051709485f2b120c1507f.png', 'Marpeças', 1, '2020-08-05 20:09:48', '2020-09-11 19:31:15', NULL),
(43, 'Verbo da Vida', '202009031051275f50f4df17400.png', 'Verbo da Vida', 1, '2020-09-03 13:51:27', '2020-09-03 13:51:27', NULL),
(44, 'ProSangue', '202009031058265f50f682cfd33.png', 'ProSangue', 1, '2020-09-03 13:58:26', '2020-09-03 13:58:26', NULL),
(45, 'UCD', '202009031101045f50f720e910d.jpg', 'UCD', 1, '2020-09-03 14:01:04', '2020-09-03 14:01:04', NULL),
(46, 'Centro de Diagnóstico', '202009031108055f50f8c5ed7a1.png', 'Centro de Diagnóstico', 1, '2020-09-03 14:08:05', '2020-09-03 14:08:05', NULL),
(47, 'SFiscal', '202009031110175f50f9492d668.png', 'SFiscal', 1, '2020-09-03 14:10:17', '2020-09-03 14:10:17', NULL),
(48, 'RHEMA', '202009031113175f50f9fd677b2.jpg', 'RHEMA', 1, '2020-09-03 14:13:17', '2020-09-03 14:13:17', NULL),
(49, 'Sicoob', '202009111618385f5bcd8e244e1.jpg', 'Sicoob', 0, '2020-09-11 19:18:38', '2020-09-11 19:21:38', NULL),
(50, 'Esperança União', '202009111622215f5bce6daf253.png', 'Esperança União', 1, '2020-09-11 19:22:21', '2020-09-11 19:22:21', NULL);

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
(9, 'basico', 'Básico', '2020-02-13 21:31:00', '2020-02-13 21:31:00', NULL),
(10, 'enfermeira', 'Enfermeira', '2020-10-20 14:06:21', '2020-10-20 14:06:21', NULL),
(11, 'tecnico-enfermagem', 'Técnica de Enfermagem', '2020-10-20 14:07:20', '2020-10-20 14:07:20', NULL),
(12, 'atendimento', 'Atendimento', '2020-10-20 14:07:33', '2020-10-20 14:19:46', NULL);

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
(12, 6, 7, '2020-02-13 13:43:19', '2020-08-31 17:19:07', NULL),
(16, 6, 6, '2020-02-13 21:08:56', '2020-02-17 12:58:04', NULL),
(18, 9, 6, '2020-02-13 21:31:46', '2020-02-13 21:31:46', NULL),
(19, 6, 19, '2020-07-17 17:38:10', '2020-07-17 17:38:10', NULL),
(20, 1, 17, '2020-07-17 17:38:22', '2020-07-17 17:38:22', NULL),
(21, 1, 18, '2020-07-17 17:38:35', '2020-10-20 14:17:40', '2020-10-20 11:10:40'),
(22, 6, 7, '2020-07-17 20:26:43', '2020-07-17 20:27:03', '2020-07-17 14:07:03'),
(23, 6, 7, '2020-07-17 20:28:51', '2020-07-17 20:28:59', '2020-07-17 14:07:59'),
(25, 6, 25, '2020-09-03 13:23:11', '2020-09-03 13:23:11', NULL),
(26, 6, 26, '2020-09-03 13:23:22', '2020-09-03 13:23:22', NULL),
(27, 10, 18, '2020-10-20 13:49:10', '2020-10-20 14:17:53', NULL),
(28, 6, 30, '2020-10-20 13:49:19', '2020-10-20 13:49:19', NULL),
(29, 11, 28, '2020-10-20 13:49:31', '2020-10-20 14:18:08', NULL),
(30, 11, 27, '2020-10-20 13:49:49', '2020-10-20 14:18:45', NULL),
(31, 12, 29, '2020-10-20 14:19:27', '2020-10-20 14:19:27', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `screenings`
--

CREATE TABLE `screenings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `digpdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `screenings`
--

INSERT INTO `screenings` (`id`, `employee_id`, `pdf`, `digpdf`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '202011191509125fb6b4c8773ab.pdf', '202011191509135fb6b4c9cc306.pdf', 1, '2020-11-19 18:09:15', '2020-11-19 18:09:15', NULL);

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
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `neighborhood` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `system_companies`
--

INSERT INTO `system_companies` (`id`, `name`, `cnpj`, `fantasyname`, `street`, `number`, `neighborhood`, `complement`, `city`, `state`, `email`, `phone`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Agencia SS Toledo', '02233139000100', 'Agencia SS Toledo', 'José Elpídio da Costa Monteiro', '107', 'São José', 'C', 'Campina Grande', 'Paraíba', 'stoledo@stoledo.com.br', '9-9178-1479', 1, '2020-11-19 17:56:39', '2020-11-19 17:56:39', NULL),
(2, 'Getra - Gestão e Segurança do Trabalho LTDA', '00215400012154', 'Getra', 'José Elpídio da Costa Monteiro', '106', 'São José', NULL, 'Campina Grande', 'Paraíba', 'comercial@getra.com.br', '33334444', 1, '2020-11-24 18:29:42', '2020-11-24 18:29:42', NULL);

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
-- Estrutura da tabela `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `start` datetime NOT NULL,
  `treinamento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtd` bigint(20) NOT NULL,
  `deadline` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `trainings`
--

INSERT INTO `trainings` (`id`, `company_id`, `start`, `treinamento`, `tipo`, `qtd`, `deadline`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2020-01-01 00:00:00', 'treinamento1', 'tipo2', 10, 6, 1, '2020-11-19 18:15:47', '2020-11-19 18:15:47', NULL);

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
(4, 'Charles de Azevedo Júnior', '202002061646465e3c6d26dbd92.jpg', 'charles@stoledo.com.br', NULL, '$2y$10$kjuGf0JbWFG9T9eW9O1GYe.go9ItyfH60C1RwaKSPHqhwBVbUY75a', 1, 'XcSgivs3Rt9vac0d7LY9j22mN0WVR53eZPekwVUpDg2EwAag7aIAtRkPWKwB', '2020-02-06 19:46:46', '2020-11-25 12:30:20', NULL),
(6, 'Clearlison Nóbrega', '202002111707395e43098b088db.jpg', 'clearlison@stoledo.com.br', NULL, '$2y$10$4qrSfF4Lb0mDsdyZhZOvCeRtXKYCL0MOGgabkXkpS7nb7VWFssJSS', 1, 'NbxJMd7QTgctH9Kmfe8gyUinte7A4t1YhhL0UDF8a2rBrTYoRRUhmhyOCvb0', '2020-02-11 20:07:39', '2020-08-31 17:20:31', NULL),
(7, 'Cris Henrique', '202002120853125e43e728da079.jpg', 'crishenrique@stoledo.com.br', NULL, '$2y$10$AV/Udl1Eg382MdwcaKhCJuDnwFkg2LO6jIeleDIhws9HZ5s0cE7EK', 1, NULL, '2020-02-11 20:56:27', '2020-08-31 17:18:49', NULL),
(12, 'Andreza', '202002141002235e469a5f5bd71.jpg', 'andreza@stoledo.com.br', NULL, '$2y$10$gFhRms4MmjytxUtg3eV4yOUuRcivwBrgoRlz8dvzf7fsePoaRSapm', 1, NULL, '2020-02-14 13:02:23', '2020-02-14 13:02:23', NULL),
(17, 'Jucy', '202007221148155f1851af0e967.jpg', 'jucy@getra.com.br', NULL, '$2y$10$RVFRc6Al32GGlE4.GKjuCekoh6g4gQzsA/8R/6utbaEHYMYPFflv3', 1, NULL, '2020-07-22 14:48:15', '2020-07-22 14:48:15', NULL),
(18, 'Lais', '202007221148495f1851d1333a7.jpg', 'enfermeira01@getra.com.br', NULL, '$2y$10$9jcKr2YN9PEaHgda1k0aw.L9341OdaTaNLwl28MXe4uJms7dbdVCy', 1, NULL, '2020-07-22 14:48:49', '2020-10-20 14:00:42', NULL),
(19, 'Sidney S. Toledo', '202007221155105f18534ec514b.jpg', 'sidney@getra.com.br', NULL, '$2y$10$GZxo.V8S8VxaFDW/fOeRRubq7YwTIb5RQcrPlkvVbc7z910ruWggW', 1, NULL, '2020-07-22 14:55:10', '2020-11-05 13:21:57', NULL),
(25, 'Carla Cordeiro', '202009031022185f50ee0a7b138.jpg', 'contato2.stoledo@gmail.com', NULL, '$2y$10$EndH8MWfVxuvujDxPNJ4.uCmeStdu4vzUDfO2TihRarS69kAl4uKa', 1, NULL, '2020-09-03 13:22:18', '2020-09-03 13:22:18', NULL),
(26, 'Dayane', '202009031022565f50ee30e8d84.jpg', 'atendimento.stoledo@gmail.com', NULL, '$2y$10$HWb001V0oNR7E0M2NNOi9OnFJM6DvCOIANJmo8kygfHH06x.LO61W', 1, NULL, '2020-09-03 13:22:56', '2020-09-03 13:22:56', NULL),
(27, 'Joana Leandro Ribeiro de Sousa', '202010201044555f8ee9d7bc1a9.png', 'tec03@getra.com.br', NULL, '$2y$10$MSQm486JYCHAOeU7YkFbgu.9dKrSmETmCP7owCseLkWSihgQbAYUq', 1, NULL, '2020-10-20 13:44:55', '2020-10-20 13:44:55', NULL),
(28, 'Mikaelly Cristina Souza Lima', '202010201045475f8eea0b920e8.png', 'enfermeira@getra.com.br', NULL, '$2y$10$VomsEzGmOJl7WqWWT2ZQFOcB6M8MTgpd/f48VNJS2pu4ljUzyQzA2', 1, NULL, '2020-10-20 13:45:47', '2020-10-20 13:45:47', NULL),
(29, 'Silvia de Cassia de Farias Barbosa', '202010201046505f8eea4ab1c73.jpg', 'atendimento@getra.com.br', NULL, '$2y$10$gfQTaqpMPX4MWDhNK0lLW.MXNcNA2aRoZfRApjIKHUPh4BwhvOuVS', 1, NULL, '2020-10-20 13:46:50', '2020-10-20 14:16:46', NULL),
(30, 'Deywrhamany Oliveira', '202010201047525f8eea88c48cf.png', 'comercial@getra.com.br', NULL, '$2y$10$xjkNF7oZGl/eQluZzdzDu.IXE3Qi4jnpnmCiVyi9KiYcITYtug55u', 1, NULL, '2020-10-20 13:47:52', '2020-10-20 14:35:55', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anamneses`
--
ALTER TABLE `anamneses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anamneses_employee_id_foreign` (`employee_id`);

--
-- Índices para tabela `appraisals`
--
ALTER TABLE `appraisals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appraisals_company_id_foreign` (`company_id`);

--
-- Índices para tabela `asos`
--
ALTER TABLE `asos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asos_employee_id_foreign` (`employee_id`),
  ADD KEY `asos_doctor_id_foreign` (`doctor_id`);

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
-- Índices para tabela `financials`
--
ALTER TABLE `financials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `financials_company_id_foreign` (`company_id`);

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
-- Índices para tabela `periodicals`
--
ALTER TABLE `periodicals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periodicals_employee_id_foreign` (`employee_id`);

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
-- Índices para tabela `screenings`
--
ALTER TABLE `screenings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `screenings_employee_id_foreign` (`employee_id`);

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
-- Índices para tabela `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_company_id_foreign` (`company_id`);

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
-- AUTO_INCREMENT de tabela `anamneses`
--
ALTER TABLE `anamneses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `appraisals`
--
ALTER TABLE `appraisals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `asos`
--
ALTER TABLE `asos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=359;

--
-- AUTO_INCREMENT de tabela `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `financials`
--
ALTER TABLE `financials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funfacts`
--
ALTER TABLE `funfacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de tabela `periodicals`
--
ALTER TABLE `periodicals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT de tabela `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5018;

--
-- AUTO_INCREMENT de tabela `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `screenings`
--
ALTER TABLE `screenings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT de tabela `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para despejos de tabelas
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
