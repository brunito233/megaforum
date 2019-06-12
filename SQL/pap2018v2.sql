-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jun-2019 às 11:44
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
(170, '<p>Ola boa Tarde tou a come&ccedil;ar o 12&ordm; em informatica e gostava de ter ideias para a minha pap&nbsp;<br />Podem me dizer ideias??</p>'),
(173, '<p>Ol&aacute; Boa Tarde eu tenho o seguinte codigo em PHP e nao consigo executar...<br />Da o seguinte erro:&nbsp;<strong style=\"font-family: \'Times New Roman\';\">Notice</strong><span style=\"font-family: \'Times New Roman\';\">: Undefined variable: nome in&nbsp;</span><strong style=\"font-family: \'Times New Roman\';\">C:\\xampp\\htdocs\\index233.php</strong><span style=\"font-family: \'Times New Roman\';\">&nbsp;on line&nbsp;</span><strong style=\"font-family: \'Times New Roman\';\">9</strong></p>\r\n<p>Codigo:</p>');

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

--
-- Extraindo dados da tabela `bans`
--

INSERT INTO `bans` (`id_ban`, `nome_utilizador`, `motivo`, `admin`, `data`) VALUES
(2, 'alberto', 'Conteudo Improrio', 'Bruno Santos', '2019-05-20'),
(3, 'rubs23', 'Conteudo Improrio', 'Bruno Santos', '2019-05-30');

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
(5, 'C++', 3),
(6, 'C', 3),
(7, 'Java', 3),
(8, 'Pascal', 3),
(9, 'SQL', 4),
(10, 'Microsoft Acess', 4),
(11, 'Oracle ', 4),
(12, 'Sugestões, Duvidas relativamnete ao Forum', 1),
(13, 'Visual Basic', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes`
--

CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL,
  `id_topico` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `likes`
--

INSERT INTO `likes` (`id_like`, `id_topico`, `id_utilizador`, `type`) VALUES
(47, 39, 25, 0),
(49, 39, 24, 0),
(50, 40, 24, 0),
(51, 41, 24, 0),
(53, 42, 25, 0),
(54, 43, 43, 0),
(55, 43, 24, 0),
(56, 42, 43, 0),
(57, 46, 24, 0),
(58, 46, 25, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes_respostas`
--

CREATE TABLE `likes_respostas` (
  `id_like_resposta` int(11) NOT NULL,
  `id_resposta` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `likes_respostas`
--

INSERT INTO `likes_respostas` (`id_like_resposta`, `id_resposta`, `id_utilizador`) VALUES
(5, 14, 24),
(6, 14, 25),
(7, 15, 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `id_respostas` int(11) NOT NULL,
  `resposta` varchar(10000) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `id_topico` int(11) NOT NULL,
  `hora` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`id_respostas`, `resposta`, `id_utilizador`, `id_topico`, `hora`) VALUES
(14, '<p>OlÃ¡&nbsp;<strong>Matias</strong><span id=\"_mce_caret\" data-mce-bogus=\"1\" data-mce-type=\"format-caret\">, aqui tens a soluÃ§Ã£o:</span></p><p><span id=\"_mce_caret\" data-mce-bogus=\"1\" data-mce-type=\"format-caret\"><code></code></span><font face=\"monospace\">&lt;!DOCTYPE html&gt;<br data-mce-bogus=\"1\"></font></p><p><font face=\"monospace\">&lt;html lang=\"pt\" dir=\"ltr\"&gt;</font></p><p><font face=\"monospace\">&nbsp; &lt;head&gt;</font></p><p><font face=\"monospace\">&nbsp; &nbsp; &lt;meta charset=\"utf-8\"&gt;</font></p><p><font face=\"monospace\">&nbsp; &nbsp; &lt;title&gt;&lt;/title&gt;</font></p><p><font face=\"monospace\">&nbsp; &lt;/head&gt;</font></p><p><font face=\"monospace\">&nbsp; &lt;body&gt;</font></p><p><font face=\"monospace\">&nbsp; &nbsp; &lt;?php</font></p><p><font face=\"monospace\">&nbsp; &nbsp; &nbsp; $nome = \"Matias\";</font></p><p><font face=\"monospace\">&nbsp; &nbsp; &nbsp; echo $nome;</font></p><p><font face=\"monospace\">&nbsp; &nbsp; ?&gt;</font></p><p><font face=\"monospace\">&nbsp; &lt;/body&gt;</font></p><p><font face=\"monospace\">&lt;/html&gt;</font></p>', 24, 46, '2019-06-05 15:56:00'),
(15, '<p>Obrigado&nbsp;<strong>Bruno Santos&nbsp;</strong>pela ajuda!<br>AbraÃ§o.&nbsp;</p>', 25, 46, '2019-06-05 15:58:09');

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
(169, 'Erro em PHP');

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
(46, 2, 169, 173, 25, 0);

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
(24, 'Bruno Miguel', 'santozito12@gmail.com', '123', 'Oxygen-Icons.org-Oxygen-Actions-document-edit.ico', 1, '2019-01-17', 'Masculino', 'Passar Tempo', 'Criador do Mega Forum e Administrador', 'default_capa.jpg', '', '', '', 1),
(25, 'Matias', 'obramatias@gmail.com', '123', 'transferir.jpg', 0, '2019-01-01', 'Masculino', 'Passar Tempo', 'Hardware', 'default_capa.jpg', '', '', '', 1),
(26, 'Marco Pinheiro', 'marcopinheiro3008@gmail.com', '123', 'default.png', 0, '2019-01-29', '', '', '', 'default_capa.jpg', '', '', '', 1),
(27, 'Ricardo Antonio', 'ricardogames@gmail.com', '123', 'default.png', 0, '2019-02-01', '', '', '', 'default_capa.jpg', '', '', '', 1),
(28, 'Rita Almeida', 'almeida89@gmail.com', '123', 'default.png', 0, '2019-02-06', '', '', '', 'default_capa.jpg', '', '', '', 1),
(30, 'Andre Antunes', 'andre233@gmail.com', '321', 'default.png', 0, '2019-02-08', '', '', '', 'default_capa.jpg', '', '', '', 1),
(38, 'Mari Mello', 'marimello23@gmail.com', '321', 'default.png', 0, '2019-05-06', 'Femenino', '', '', 'default_capa.jpg', '', '', '', 1),
(42, 'alberto', 'runito@gmail.com', '123', 'default.png', 0, '2019-05-10', '', '', '', 'default_capa.jpg', '', '', '', 0),
(43, 'rubs23', 'rubs23@gmail.com', '321', 'default.png', 0, '2019-05-30', 'Masculino', '', '', 'default_capa.jpg', '', '', '', 0);

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
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`);

--
-- Indexes for table `likes_respostas`
--
ALTER TABLE `likes_respostas`
  ADD PRIMARY KEY (`id_like_resposta`);

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
  MODIFY `id_assunto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `bans`
--
ALTER TABLE `bans`
  MODIFY `id_ban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `likes_respostas`
--
ALTER TABLE `likes_respostas`
  MODIFY `id_like_resposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id_respostas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `seguir`
--
ALTER TABLE `seguir`
  MODIFY `id_seguir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `titulo`
--
ALTER TABLE `titulo`
  MODIFY `id_titulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `topicos`
--
ALTER TABLE `topicos`
  MODIFY `id_topico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id_utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
