-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Maio-2019 às 13:20
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pap2018`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `assunto`
--

CREATE TABLE `assunto` (
  `id_assunto` int(11) NOT NULL,
  `assunto` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `assunto`
--

INSERT INTO `assunto` (`id_assunto`, `assunto`) VALUES
(137, 'Como fazer ligação a base de dados com o visual basic?\r\nObrigado!'),
(138, 'Como faço ligação a base de dados em PHP?\r\nObg'),
(139, '\\dqdedwew'),
(140, ''),
(141, ''),
(142, ''),
(143, ''),
(144, ''),
(145, ''),
(146, 'Ola gostaria de Saber com se faz um if em JS?\r\nObrigado'),
(147, 'Ola gostaria de Saber com se faz um if em JS?\r\nObrigado'),
(148, 'asdasd'),
(149, 'asdasd'),
(150, 'asdasd'),
(151, 'asdasd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bans`
--

CREATE TABLE `bans` (
  `id_ban` int(11) NOT NULL,
  `nome_utilizador` varchar(200) NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `admin` varchar(200) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`, `type`) VALUES
(1, 'HTML', 2),
(2, 'PHP', 2),
(3, 'CSS', 2),
(4, 'JavaScript', 2),
(5, 'Pascal\r\n', 3),
(6, 'C', 3),
(7, 'C++', 3),
(8, 'Java', 3),
(9, 'Microsoft Acess', 4),
(10, 'Mysql', 4),
(11, 'Oracle\r\n', 4),
(12, 'Sugestões, Críticas ou Dúvidas relativas', 1),
(13, 'Visual Basic', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `id_respostas` int(11) NOT NULL,
  `resposta` varchar(10000) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `id_topico` int(11) NOT NULL,
  `aprovada` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`id_respostas`, `resposta`, `id_utilizador`, `id_topico`, `aprovada`) VALUES
(31, 'Tens que baixar um ferramenta', 24, 22, 0),
(32, '', 24, 22, 0),
(33, '<p>Teste2</p>', 24, 22, 0),
(34, '<p><span id=\"_mce_caret\" data-mce-bogus=\"1\" data-mce-type=\"format-caret\"><strong><em>asahfjhsjfsdkjfkjsdfgnksdnkfnksnksdgdsg</em></strong></span><br data-mce-bogus=\"1\"></p>', 24, 22, 0),
(35, '<p style=\"text-align: center;\" data-mce-style=\"text-align: center;\"><strong>Ola tudo bem??</strong></p>', 24, 22, 0),
(36, '<p>Boas</p>', 25, 23, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguir`
--

CREATE TABLE `seguir` (
  `id_seguir` int(11) NOT NULL,
  `id_utilizador_seguindo` int(11) NOT NULL,
  `id_utilizador_aseguir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `seguir`
--

INSERT INTO `seguir` (`id_seguir`, `id_utilizador_seguindo`, `id_utilizador_aseguir`) VALUES
(7, 25, 24),
(13, 24, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulo`
--

CREATE TABLE `titulo` (
  `id_titulo` int(11) NOT NULL,
  `titulo` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `titulo`
--

INSERT INTO `titulo` (`id_titulo`, `titulo`) VALUES
(139, ''),
(140, ''),
(147, 'asdas'),
(148, 'asdas'),
(149, 'asdas'),
(150, 'asdas'),
(143, 'asdasdasd'),
(144, 'asdasdasd'),
(145, 'Como se faz \"if\"?'),
(146, 'Como se faz \"if\"?'),
(138, 'dtfuyqgwefuigwhfe1'),
(137, 'Ligação a base de dados'),
(136, 'Ligação a base de dados pelo VB'),
(141, 'Ola'),
(142, 'Ola');

-- --------------------------------------------------------

--
-- Estrutura da tabela `topicos`
--

CREATE TABLE `topicos` (
  `id_topico` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_titulo` int(11) NOT NULL,
  `id_assunto` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `mostrar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `topicos`
--

INSERT INTO `topicos` (`id_topico`, `id_categoria`, `id_titulo`, `id_assunto`, `id_utilizador`, `mostrar`) VALUES
(22, 13, 136, 137, 25, 0),
(23, 10, 137, 138, 24, 0),
(31, 4, 145, 146, 24, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id_utilizador` int(11) NOT NULL,
  `nome_utilizador` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(11) NOT NULL,
  `foto` text NOT NULL,
  `type` int(11) NOT NULL,
  `data_registo` date NOT NULL,
  `sexo` text NOT NULL,
  `especialidade` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `foto_capa` text NOT NULL,
  `link_facebook` text NOT NULL,
  `link_web` text NOT NULL,
  `link_instagram` text NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id_utilizador`, `nome_utilizador`, `email`, `password`, `foto`, `type`, `data_registo`, `sexo`, `especialidade`, `bio`, `foto_capa`, `link_facebook`, `link_web`, `link_instagram`, `activo`) VALUES
(24, 'Bruno', 'santozito12@gmail.com', '123', 'Oxygen-Icons.org-Oxygen-Actions-document-edit.ico', 1, '2019-01-17', 'Masculino', '', 'Criador do Mega Forum e Administrador', 'default_capa.jpg', '', '', '', 1),
(25, 'Matias', 'obramatias@gmail.com', '123', 'transferir.jpg', 0, '2019-01-01', 'Masculino', 'Passar Tempo', 'Obras e fazer cimento', 'default_capa.jpg', '', '', '', 1),
(26, 'Marco Pinheiro', 'marcopinheiro3008@gmail.com', '123', 'default.png', 0, '2019-01-29', '', '', '', 'default_capa.jpg', '', '', '', 1),
(27, 'Ricardo Antonio', 'ricardogames@gmail.com', '123', 'default.png', 0, '2019-02-01', '', '', '', 'default_capa.jpg', '', '', '', 1),
(28, 'Asdurbal', 'quinta@gmail.com', '123', 'default.png', 0, '2019-02-06', '', '', '', 'default_capa.jpg', '', '', '', 1),
(30, 'Andre Antunes', 'andre233@gmail.com', '321', 'default.png', 0, '2019-02-08', '', '', '', 'default_capa.jpg', '', '', '', 1),
(31, 'ahjksdhasjd', '123@gmail.com', '123', 'default.png', 0, '2019-02-20', '', '', '', 'default_capa.jpg', '', '', '', 1),
(32, 'dasd', 'asd', 'sad', 'default.png', 0, '2019-02-20', '', '', '', 'default_capa.jpg', '', '', '', 1),
(35, 'asdas', '', '', 'default.png', 0, '2019-04-24', '', '', '', 'default_capa.jpg', '', '', '', 1),
(36, 'asd', 'asdasd', 'asdasd', 'default.png', 0, '2019-04-24', '', '', '', 'default_capa.jpg', '', '', '', 1),
(37, 'asd', '123', '123', 'default.png', 0, '2019-05-06', '', '', '', 'default_capa.jpg', '', '', '', 1),
(38, 'Mari Mello', 'marimello23@gmail.com', '321', 'default.png', 0, '2019-05-06', '', '', '', 'default_capa.jpg', '', '', '', 1),
(39, 'qwdq', 'qwdqw', 'qwdqd', 'default.png', 0, '2019-05-06', '', '', '', 'default_capa.jpg', '', '', '', 1),
(40, '', 'player23@gmail.com', '', 'default.png', 0, '2019-05-06', '', '', '', 'default_capa.jpg', '', '', '', 1),
(41, 'player23317', 'assada', '321', 'default.png', 0, '2019-05-06', '', '', '', 'default_capa.jpg', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assunto`
--
ALTER TABLE `assunto`
  ADD PRIMARY KEY (`id_assunto`),
  ADD KEY `assunto` (`assunto`(767));

--
-- Indexes for table `bans`
--
ALTER TABLE `bans`
  ADD PRIMARY KEY (`id_ban`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `categoria` (`categoria`);

--
-- Indexes for table `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id_respostas`),
  ADD KEY `id_utilizador` (`id_utilizador`),
  ADD KEY `id_topico` (`id_topico`);

--
-- Indexes for table `seguir`
--
ALTER TABLE `seguir`
  ADD PRIMARY KEY (`id_seguir`);

--
-- Indexes for table `titulo`
--
ALTER TABLE `titulo`
  ADD PRIMARY KEY (`id_titulo`),
  ADD KEY `titulo` (`titulo`);

--
-- Indexes for table `topicos`
--
ALTER TABLE `topicos`
  ADD PRIMARY KEY (`id_topico`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_titulo` (`id_titulo`),
  ADD KEY `id_assunto` (`id_assunto`),
  ADD KEY `id_utilizador` (`id_utilizador`);

--
-- Indexes for table `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id_utilizador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assunto`
--
ALTER TABLE `assunto`
  MODIFY `id_assunto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `bans`
--
ALTER TABLE `bans`
  MODIFY `id_ban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id_respostas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `seguir`
--
ALTER TABLE `seguir`
  MODIFY `id_seguir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `titulo`
--
ALTER TABLE `titulo`
  MODIFY `id_titulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `topicos`
--
ALTER TABLE `topicos`
  MODIFY `id_topico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id_utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `respostas_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizadores` (`id_utilizador`),
  ADD CONSTRAINT `respostas_ibfk_2` FOREIGN KEY (`id_topico`) REFERENCES `topicos` (`id_topico`);

--
-- Limitadores para a tabela `topicos`
--
ALTER TABLE `topicos`
  ADD CONSTRAINT `topicos_ibfk_1` FOREIGN KEY (`id_titulo`) REFERENCES `titulo` (`id_titulo`),
  ADD CONSTRAINT `topicos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `topicos_ibfk_3` FOREIGN KEY (`id_assunto`) REFERENCES `assunto` (`id_assunto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
