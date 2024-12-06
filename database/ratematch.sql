-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Dez-2024 às 02:05
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ratematch`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `idavaliacao` int(11) NOT NULL,
  `comentario` longtext DEFAULT NULL,
  `idpartidas` int(11) NOT NULL DEFAULT 0,
  `idlogin` int(11) NOT NULL,
  `idperfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`idavaliacao`, `comentario`, `idpartidas`, `idlogin`, `idperfil`) VALUES
(1, NULL, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL,
  `user` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `avaliacao_idavaliacao` int(11) NOT NULL,
  `administrador` tinyint(4) DEFAULT NULL,
  `usuario` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`idlogin`, `user`, `senha`, `email`, `nome`, `avaliacao_idavaliacao`, `administrador`, `usuario`) VALUES
(1, '_viniross', '827ccb0eea8a706c4c34a16891f84e7b', 'viniciusrossws@gmail.com', 'Vinícius Ross', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `partidas`
--

CREATE TABLE `partidas` (
  `idpartidas` int(11) NOT NULL,
  `data` varchar(15) DEFAULT NULL,
  `hora` varchar(10) DEFAULT NULL,
  `estadio` varchar(100) DEFAULT NULL,
  `idtimeCasa` varchar(50) NOT NULL DEFAULT '',
  `idtimeVis` varchar(50) NOT NULL DEFAULT '',
  `header` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `partidas`
--

INSERT INTO `partidas` (`idpartidas`, `data`, `hora`, `estadio`, `idtimeCasa`, `idtimeVis`, `header`) VALUES
(1, '', NULL, '', '', '', ''),
(2, '', NULL, '', '', '', ''),
(3, '', NULL, '', '', '', ''),
(4, '', NULL, '', '', '', ''),
(5, '', NULL, '', '', '', ''),
(6, '', NULL, '', '', '', ''),
(7, '', NULL, '', '', '', ''),
(8, '', NULL, '', '', '', ''),
(9, '', NULL, '', '', '', ''),
(10, '', NULL, '', '', '', ''),
(11, '08/12/2024', '16:00', 'Arena do Grêmio', '1', '8', 'grecor.jpg'),
(12, '08/12/2024', '16:00', 'Arena MRV', '5', '7', 'camcap.jpg'),
(13, '08/12/2024', '16:00', 'Arena Fonte Nova', '12', '4', 'bahacg.jpg'),
(14, '08/12/2024', '16:00', 'Maracanã', '3', '20', 'flavit.jpg'),
(15, '08/12/2024', '16:00', 'Nilton Santos', '6', '18', 'botsao.jpg'),
(16, '08/12/2024', '16:00', 'Allianz Parque', '16', '13', 'palflu.jpeg'),
(17, '08/12/2024', '16:00', 'Arena Red Bull', '17', '9', 'bgccri.jpg'),
(18, '08/12/2024', '16:00', 'Arena Castelão', '14', '2', 'fortint.jpg'),
(19, '08/12/2024', '16:00', 'Arena Pantanal', '11', '19', 'cuivas.jpg'),
(20, '08/12/2024', '16:00', 'Estádio Alfredo Jaconi', '15', '10', 'juvcru.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `idperfil` int(11) NOT NULL,
  `iduser` int(11) NOT NULL DEFAULT 0,
  `idfoto` int(11) NOT NULL DEFAULT 0,
  `descricao` longtext DEFAULT NULL,
  `capa` varchar(255) DEFAULT NULL,
  `idlogin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idperfil`, `iduser`, `idfoto`, `descricao`, `capa`, `idlogin`) VALUES
(1, 1, 0, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `times`
--

CREATE TABLE `times` (
  `idtime` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `escudo` varchar(255) DEFAULT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  `estadio` varchar(100) DEFAULT NULL,
  `mascote` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `times`
--

INSERT INTO `times` (`idtime`, `nome`, `escudo`, `sigla`, `estadio`, `mascote`) VALUES
(1, 'Grêmio', 'gremio.png', 'GRE', 'gremio.png', 'gremio.png'),
(2, 'Internacional', 'internacional.png', 'INT', 'internacional.png', 'internacional.png'),
(3, 'Flamengo', 'flamengo.png', 'FLA', 'flamengo.png', 'flamengo.png'),
(4, 'Atlético GO', 'atleticogo.png', 'ACG', 'atleticogo.png', 'atleticogo.png'),
(5, 'Atlético MG', 'atleticomg.png', 'CAM', 'atleticomg.png', 'atleticomg.png'),
(6, 'Botafogo', 'botafogo.png', 'BOT', 'botafogo.png', 'botafogo.png'),
(7, 'Athletico PR', 'athleticopr.png', 'CAP', 'athleticopr.png', 'athleticopr.png'),
(8, 'Corinthians', 'corinthians.png', 'COR', 'corinthians.png', 'corinthians.png'),
(9, 'Criciúma', 'criciuma.png', 'CRI', 'criciuma.png', 'criciuma.png'),
(10, 'Cruzeiro', 'cruzeiro.png', 'CRU', 'cruzeiro.png', 'cruzeiro.png'),
(11, 'Cuiaba', 'cuiaba.png', 'CUI', 'cuiaba.png', 'cuiaba.png'),
(12, 'Bahia', 'bahia.png', 'BAH', 'bahia.png', 'bahia.png'),
(13, 'Fluminense', 'fluminense.png', 'FLU', 'fluminense.png', 'fluminense.png'),
(14, 'Fortaleza', 'fortaleza.png', 'FOR', 'fortaleza.png', 'fortaleza.png'),
(15, 'Juventude', 'juventude.png', 'JUV', 'juventude.png', 'juventude.png'),
(16, 'Palmeiras', 'palmeiras.png', 'PAL', 'palmeiras.png', 'palmeiras.png'),
(17, 'Bragantino', 'bragantino.png', 'RBG', 'bragantino.png', 'bragantino.png'),
(18, 'São Paulo', 'saopaulo.png', 'SAO', 'saopaulo.png', 'saopaulo.png'),
(19, 'Vasco', 'vasco.png', 'VAS', 'vasco.png', 'vasco.png'),
(20, 'Vitória', 'vitoria.png', 'VIT', 'vitoria.png', 'vitoria.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`idavaliacao`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idlogin`),
  ADD KEY `fk_login_avaliacao1_idx` (`avaliacao_idavaliacao`);

--
-- Índices para tabela `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`idpartidas`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idperfil`),
  ADD KEY `fk_idlogin` (`idlogin`);

--
-- Índices para tabela `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`idtime`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `idavaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `partidas`
--
ALTER TABLE `partidas`
  MODIFY `idpartidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idperfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `times`
--
ALTER TABLE `times`
  MODIFY `idtime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_login_avaliacao1` FOREIGN KEY (`avaliacao_idavaliacao`) REFERENCES `avaliacao` (`idavaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `fk_idlogin` FOREIGN KEY (`idlogin`) REFERENCES `login` (`idlogin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
