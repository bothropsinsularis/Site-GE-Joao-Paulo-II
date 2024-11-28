-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/10/2024 às 02:08
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jpii`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `cover_image`) VALUES
(1, 'Eventos Distritais', 'imagem_2024-10-01_095117857.png'),
(2, 'Acampamentos', 'imagem_2024-10-01_165824769.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `body` varchar(2000) NOT NULL,
  `data` date NOT NULL,
  `userid` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `idcomentario` int(11) NOT NULL,
  `anexos` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` int(11) DEFAULT NULL,
  `resposta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `body`, `data`, `userid`, `tipo`, `idcomentario`, `anexos`, `created_at`, `post_id`, `resposta_id`) VALUES
(37, '11111111111111111', '2024-09-30', 9, 0, 42, '', '2024-09-30 16:33:13', NULL, NULL),
(38, '22222222222', '2024-09-30', 9, 0, 41, '', '2024-09-30 17:53:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `event_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `event_date`, `created_by`, `created_at`) VALUES
(1, 'sdffd', 'sdfsdfsdfsd', '2024-09-10', 1, '2024-09-09 10:14:37'),
(2, 'sdfsdfd', 'sdfsdf', '2024-10-09', 1, '2024-09-17 12:33:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoriaid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `images`
--

INSERT INTO `images` (`id`, `title`, `filename`, `description`, `categoria`, `created_at`, `categoriaid`, `userid`) VALUES
(1, 'Elo 2019', 'imagem_2024-10-01_095350365.png', NULL, 'Eventos Distritais', '2024-10-01 12:59:19', NULL, 9),
(2, 'Ponta de Flecha 2024', 'imagem_2024-10-01_122504675.png', NULL, 'Eventos Distritais', '2024-10-01 15:25:06', NULL, 9),
(3, 'Ponta de Flecha 2024', 'imagem_2024-10-01_122552171.png', NULL, 'Eventos Distritais', '2024-10-01 15:25:53', NULL, 9),
(4, 'Ponta de Flecha 2024', 'imagem_2024-10-01_122611649.png', NULL, 'Eventos Distritais', '2024-10-01 15:26:12', NULL, 9),
(5, 'Atividade Sobre Religiões', 'imagem_2024-10-01_170059635.png', NULL, 'Eventos Distritais', '2024-10-01 20:01:07', NULL, 9),
(6, 'Treinamento de Ciclismo', 'imagem_2024-10-01_170234160.png', NULL, 'Eventos Distritais', '2024-10-01 20:02:39', NULL, 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tipo` enum('topico','comentario','resposta') NOT NULL,
  `item_id` int(11) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `data` datetime DEFAULT current_timestamp(),
  `lida` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `notificacoes`
--

INSERT INTO `notificacoes` (`id`, `userid`, `tipo`, `item_id`, `mensagem`, `data`, `lida`) VALUES
(3, 9, 'resposta', 37, 'Você recebeu uma resposta!', '2024-09-30 13:47:00', 0),
(4, 9, 'resposta', 37, 'Você recebeu uma resposta!', '2024-09-30 13:48:33', 0),
(5, 9, 'resposta', 37, 'Você recebeu uma resposta!', '2024-09-30 14:50:48', 0),
(6, 9, 'resposta', 38, 'Você recebeu uma resposta!', '2024-09-30 14:53:56', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `descricao` varchar(2000) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `categoria` varchar(60) NOT NULL,
  `preco` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `quantidade`, `categoria`, `preco`, `foto`) VALUES
(184, 'Corda', 'Corda Multifilamento Pp Carga Caminhão Carretinha   COMPRIMENTO: 10 METROS  DIÂMETRO: 8mm  Garantia do vendedor: 30 dias', 50, 'utilidades', 30, '9a05c8c10fd7bbb63efa8470648d6f32.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `comentario_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `resposta` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `respostas`
--

INSERT INTO `respostas` (`id`, `comentario_id`, `usuario_id`, `resposta`, `data`) VALUES
(1, 37, 9, '111111111111111', '2024-09-30 16:33:16'),
(2, 37, 6, '222222222222222222', '2024-09-30 16:33:53'),
(3, 37, 9, '2222222222222', '2024-09-30 16:47:00'),
(4, 37, 9, '2222222222', '2024-09-30 16:48:33'),
(5, 37, 9, '33333333333333', '2024-09-30 17:50:48'),
(6, 38, 9, '4444444444444444444', '2024-09-30 17:53:56');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(400) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `status` varchar(1) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `username`, `nome`, `email`, `senha`, `descricao`, `tipo`, `status`, `foto`) VALUES
(1, '', 'João', 'joao_gomes@gmail.com', 'senha123', '', '1', '0', '../public/imagens'),
(5, '', 'Teste', 'teste@gmail.com', 'teste123456', '', '1', '0', ''),
(6, '', 'Ademilson212345', 'adm@gmail.com', '12345678', '', '2', '0', 'f2d9d3267c620e4cedfc0804fe497945.jpg'),
(9, '', 'admin', 'admin', 'admin', '', '3', '0', '518c92adb3f96fba53e483f0667ef4a2.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `topico`
--

CREATE TABLE `topico` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `body` varchar(2000) NOT NULL,
  `data` date NOT NULL,
  `anexos` varchar(500) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `topico`
--

INSERT INTO `topico` (`id`, `nome`, `body`, `data`, `anexos`, `userid`) VALUES
(44, 'Como fazer o nó direito', 'O nó direito é um dos mais simples de se fazer e um dos mais conhecidos também, nomeado por várias pessoas como pai dos nós. O nó direito é o símbolo da força e a união da fraternidade que une escoteiros de todas as nacionalidades. Entretanto, ele é muito usado em trabalho em altura e requer atenção ao executar a manobra, no entanto, a maioria dos trabalhadores executam a técnica errada e acabam fazendo um nó cego. A diferença de um nó cego e um nó direito é que o nó cego pode se soltar sozinho. Ele tem as principais características positivas de um nó. Essa amarração serve para unir as duas pontas da corda, visando formar uma corda maior ou uma alça. A única desvantagem desse nó é que ele só ficará firme se você utilizar cordas de material sintético e com a mesma largura. Esse é um dos principais nós, e deve ser bem dominado em qualquer situação, principalmente se a vida de alguém for colocada em risco em função do nó feito.        O nó direito e vários outros são utilizados para executar trabalho em altura, exercício que só pode ser proferido se o profissional estiver devidamente habilitado seguindo os parâmetros do Ministério. Existem cursos específicos para nós e amarrações, no entanto, o curso NR 35 Trabalho em altura – Online / Curso NR 35 Multiplicador – Trabalho em altura – Online, aplicado pela MA Consultoria e treinamentos, aborda todo esse conteúdo de forma fácil e prática, inovando totalmente a forma que conhecemos de estudar!', '2024-10-04', '', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `useridcoment` (`userid`),
  ADD KEY `fk_post` (`post_id`),
  ADD KEY `resposta_id` (`resposta_id`);

--
-- Índices de tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_images_categoria` (`categoriaid`),
  ADD KEY `fk_images_usuario` (`userid`);

--
-- Índices de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentario_id` (`comentario_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `topico`
--
ALTER TABLE `topico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `topico`
--
ALTER TABLE `topico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`resposta_id`) REFERENCES `comentarios` (`id`),
  ADD CONSTRAINT `fk_post` FOREIGN KEY (`post_id`) REFERENCES `topico` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `useridcoment` FOREIGN KEY (`userid`) REFERENCES `tbl_usuarios` (`id`);

--
-- Restrições para tabelas `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_categoria` FOREIGN KEY (`categoriaid`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_images_usuario` FOREIGN KEY (`userid`) REFERENCES `tbl_usuarios` (`id`);

--
-- Restrições para tabelas `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD CONSTRAINT `notificacoes_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `tbl_usuarios` (`id`);

--
-- Restrições para tabelas `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `respostas_ibfk_1` FOREIGN KEY (`comentario_id`) REFERENCES `comentarios` (`id`),
  ADD CONSTRAINT `respostas_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `tbl_usuarios` (`id`);

--
-- Restrições para tabelas `topico`
--
ALTER TABLE `topico`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `tbl_usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
