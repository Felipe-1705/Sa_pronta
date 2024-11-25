-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/11/2024 às 01:27
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sa_felipe`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categ` int(11) NOT NULL,
  `desc_categ` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id_categ`, `desc_categ`) VALUES
(1, 'Processador'),
(2, 'Placa Mãe'),
(6, 'Mouse'),
(9, 'Memória Ram'),
(10, 'Teclado'),
(11, 'Monitor'),
(12, 'Cooler'),
(13, 'placa de video');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login_usuarios`
--

CREATE TABLE `login_usuarios` (
  `id_login` int(3) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nivel` varchar(18) DEFAULT NULL,
  `funcionario` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `login_usuarios`
--

INSERT INTO `login_usuarios` (`id_login`, `usuario`, `senha`, `nivel`, `funcionario`) VALUES
(38, 'jersos', '123544', 'Administrador', 'Jerso'),
(41, 'teste', '123', 'Administrador', 'testante'),
(43, 'felps', '123', 'Funcionário', 'felipe');

-- --------------------------------------------------------

--
-- Estrutura para tabela `os`
--

CREATE TABLE `os` (
  `id_os` int(3) NOT NULL,
  `os_data_inicio` date NOT NULL,
  `os_data_fim` date DEFAULT NULL,
  `os_previsto` date NOT NULL,
  `os_descriçao` text NOT NULL,
  `os_atribuido` varchar(30) NOT NULL,
  `os_sit` varchar(20) NOT NULL,
  `os_preco` decimal(10,0) NOT NULL,
  `os_prod_1` varchar(50) NOT NULL,
  `os_prod_2` varchar(50) DEFAULT NULL,
  `os_prod_3` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `os`
--

INSERT INTO `os` (`id_os`, `os_data_inicio`, `os_data_fim`, `os_previsto`, `os_descriçao`, `os_atribuido`, `os_sit`, `os_preco`, `os_prod_1`, `os_prod_2`, `os_prod_3`) VALUES
(1, '2024-11-01', '2024-11-16', '2024-11-29', 'trocar placa mãe e fazer limpeza do gabinete.', '3', 'atrasado', 0, '', NULL, NULL),
(7, '2024-11-09', NULL, '2024-11-14', 'mama', 'testante', '', 6924, '1', '1', NULL),
(8, '2024-11-09', NULL, '2024-11-12', 'a', 'Jerso', '', 1, '6', '6', NULL),
(9, '2024-11-09', NULL, '2024-11-11', 'a', 'testante', '', 1, '1', '6', NULL),
(10, '2024-11-09', NULL, '2024-11-20', '123', 'testante', 'Em Andamento', 123, '5', '6', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_prod` int(11) NOT NULL,
  `desc_prod` varchar(50) DEFAULT NULL,
  `qntd_prod` int(11) DEFAULT NULL,
  `prec_prod` decimal(10,2) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_prod`, `desc_prod`, `qntd_prod`, `prec_prod`, `categoria`) VALUES
(1, 'RTX', 3, 2000.00, 'placa de video'),
(2, 'ryzen 5 rtx on sla oq', 123, 2500.00, 'placa'),
(3, 'LG 144hz', 4, 200.00, 'Monitor'),
(4, 'BackLit Preto', 2, 300.00, 'Teclado'),
(5, 'teclado redragon', 123, 300.00, 'Teclado'),
(6, '3090 nvidea', 123, 3500.99, 'placa de video');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categ`);

--
-- Índices de tabela `login_usuarios`
--
ALTER TABLE `login_usuarios`
  ADD PRIMARY KEY (`id_login`);

--
-- Índices de tabela `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id_os`),
  ADD KEY `fk_cod_login` (`os_atribuido`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_prod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `login_usuarios`
--
ALTER TABLE `login_usuarios`
  MODIFY `id_login` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `os`
--
ALTER TABLE `os`
  MODIFY `id_os` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
