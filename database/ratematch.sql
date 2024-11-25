-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/11/2024 às 12:01
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
  `idpartidas` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) NOT NULL UNIQUE,
  `senha` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL UNIQUE,
  `foto` blob DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `avaliacao_idavaliacao` int(11) NOT NULL,
  `administrador` tinyint(4) DEFAULT NULL,
  `usuario` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idlogin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `partidas`
--

CREATE TABLE `partidas` (
  `idpartidas` int(11) NOT NULL,
  `data` varchar(15) DEFAULT NULL,
  `hora` varchar(10) DEFAULT NULL,
  `estadio` varchar(100) DEFAULT NULL,
  `idtimeCasa` varchar(50) NOT NULL DEFAULT '',
  `idtimeVis` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `partidas`
--

INSERT INTO `partidas` (`idpartidas`, `data`, `hora`, `estadio`, `idtimeCasa`, `idtimeVis`) VALUES
(1, '04/12/2024', NULL, 'Beira Rio', '2', '6'),
(2, '04/12/2024', NULL, 'Mineirão', '10', '16'),
(3, '04/12/2024', NULL, 'Barradão', '20', '1'),
(4, '04/12/2024', NULL, 'Maracanã', '13', '11'),
(5, '04/12/2024', NULL, 'São Januário', '19', '5'),
(6, '04/12/2024', NULL, 'Neo Química Arena', '8', '12'),
(7, '04/12/2024', NULL, 'Morumbis', '18', '15'),
(8, '04/12/2024', NULL, 'Arena da Baixada', '7', '17'),
(9, '04/12/2024', NULL, 'Antônio Accioly', '4', '14'),
(10, '04/12/2024', NULL, 'Heriberto Hülse', '9', '3'),
(11, '08/12/2024', NULL, 'Arena do Grêmio', '1', '8'),
(12, '08/12/2024', NULL, 'Arena MRV', '5', '7'),
(13, '08/12/2024', NULL, 'Arena Fonte Nova', '12', '4'),
(14, '08/12/2024', NULL, 'Maracanã', '3', '20'),
(15, '08/12/2024', NULL, 'Nilton Santos', '6', '18'),
(16, '08/12/2024', NULL, 'Allianz Parque', '16', '13'),
(17, '08/12/2024', NULL, 'Arena Red Bull', '17', '9'),
(18, '08/12/2024', NULL, 'Arena Castelão', '14', '2'),
(19, '08/12/2024', NULL, 'Arena Pantanal', '11', '19'),
(20, '08/12/2024', NULL, 'Estádio Alfredo Jaconi', '15', '10');

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
(17, 'Bragantino', 'bragantino.jpg', 'RBG', 'bragantino.jpg', 'bragantino.jpg'),
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
  ADD PRIMARY KEY (`idpartidas`);

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
  MODIFY `idpartidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
