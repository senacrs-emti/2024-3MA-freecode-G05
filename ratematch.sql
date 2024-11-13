-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/11/2024 às 12:45
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
-- Banco de dados: `ratematch`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `idavaliacao` int(11) NOT NULL,
  `nota` int(11) DEFAULT NULL,
  `comentario` longtext DEFAULT NULL,
  `idpartidastimes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL,
  `user` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `foto` blob DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `avaliacao_idavaliacao` int(11) NOT NULL,
  `administrador` tinyint(4) DEFAULT NULL,
  `usuario` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `partidas`
--

CREATE TABLE `partidas` (
  `idpartidas` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `hora` datetime DEFAULT NULL,
  `estadio` varchar(100) DEFAULT NULL,
  `time_idtime` int(11) NOT NULL,
  `avaliacao_idavaliacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `patidastimes`
--

CREATE TABLE `patidastimes` (
  `idpatidasTimes` int(11) NOT NULL,
  `idpartida` int(11) DEFAULT NULL,
  `idtimeCasa` int(11) DEFAULT NULL,
  `idtimeVis` int(11) DEFAULT NULL,
  `partidas_idpartidas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `times`
--

CREATE TABLE `times` (
  `idtime` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `escudo` varchar(255) DEFAULT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  `estadio` varchar(100) DEFAULT NULL,
  `mascote` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `times`
--

INSERT INTO `times` (`idtime`, `nome`, `escudo`, `sigla`, `estadio`, `mascote`) VALUES
(1, 'Grêmio', 'gremio.jpg', 'GRE', 'gremio.jpg', 'gremio.jpg'),
(2, 'Internacional', 'internacional.jpg', 'INT', 'internacional.jpg', 'internacional.jpg'),
(3, 'Flamengo', 'flamengo.jpg', 'FLA', 'flamengo.jpg', 'flamengo.jpg'),
(4, 'Atlético GO', 'atletico-go.jpg', 'ACG', 'atletico-go.jpg', 'atletico-go.jpg'),
(5, 'Atlético MG', 'atletico-mg.jpg', 'CAM', 'atletico-mg.jpg', 'atletico-mg.jpg'),
(6, 'Botafogo', 'botafogo.jpg', 'BOT', 'botafogo.jpg', 'botafogo.jpg'),
(7, 'Athletico PR', 'athletico-pr.jpg', 'CAP', 'athletico-pr.jpg', 'athletico-pr.jpg'),
(8, 'Corinthians', 'corinthians.jpg', 'COR', 'corinthians.jpg', 'corinthians.jpg'),
(9, 'Criciúma', 'criciuma.jpg', 'CRI', 'criciuma.jpg', 'criciuma.jpg'),
(10, 'Cruzeiro', 'cruzeiro.jpg', 'CRU', 'cruzeiro.jpg', 'cruzeiro.jpg'),
(11, 'Cuiaba', 'cuiaba.jpg', 'CUI', 'cuiaba.jpg', 'cuiaba.jpg'),
(12, 'Bahia', 'bahia.jpg', 'BAH', 'bahia.jpg', 'bahia.jpg'),
(13, 'Fluminense', 'fluminense.jpg', 'FLU', 'fluminense.jpg', 'fluminense.jpg'),
(14, 'Fortaleza', 'fortaleza.jpg', 'FOR', 'fortaleza.jpg', 'fortaleza.jpg'),
(15, 'Juventude', 'juventude.jpg', 'JUV', 'juventude.jpg', 'juventude.jpg'),
(16, 'Palmeiras', 'palmeiras.jpg', 'PAL', 'palmeiras.jpg', 'palmeiras.jpg'),
(17, 'Bragantino', 'bragantino.jpg', 'BRA', 'bragantino.jpg', 'bragantino.jpg'),
(18, 'São Paulo', 'saopaulo.jpg', 'SAO', 'saopaulo.jpg', 'saopaulo.jpg'),
(19, 'Vasco', 'vasco.jpg', 'VAS', 'vasco.jpg', 'vasco.jpg'),
(20, 'Vitória', 'vitoria.jpg', 'VIT', 'vitoria.jpg', 'vitoria.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`idavaliacao`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idlogin`),
  ADD KEY `fk_login_avaliacao1_idx` (`avaliacao_idavaliacao`);

--
-- Índices de tabela `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`idpartidas`),
  ADD KEY `fk_partidas_time1_idx` (`time_idtime`),
  ADD KEY `fk_partidas_avaliacao1_idx` (`avaliacao_idavaliacao`);

--
-- Índices de tabela `patidastimes`
--
ALTER TABLE `patidastimes`
  ADD PRIMARY KEY (`idpatidasTimes`),
  ADD KEY `fk_patidasTimes_partidas_idx` (`partidas_idpartidas`);

--
-- Índices de tabela `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`idtime`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `idavaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `partidas`
--
ALTER TABLE `partidas`
  MODIFY `idpartidas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `patidastimes`
--
ALTER TABLE `patidastimes`
  MODIFY `idpatidasTimes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `times`
--
ALTER TABLE `times`
  MODIFY `idtime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_login_avaliacao1` FOREIGN KEY (`avaliacao_idavaliacao`) REFERENCES `avaliacao` (`idavaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `partidas`
--
ALTER TABLE `partidas`
  ADD CONSTRAINT `fk_partidas_avaliacao1` FOREIGN KEY (`avaliacao_idavaliacao`) REFERENCES `avaliacao` (`idavaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partidas_time1` FOREIGN KEY (`time_idtime`) REFERENCES `times` (`idtime`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `patidastimes`
--
ALTER TABLE `patidastimes`
  ADD CONSTRAINT `fk_patidasTimes_partidas` FOREIGN KEY (`partidas_idpartidas`) REFERENCES `partidas` (`idpartidas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
