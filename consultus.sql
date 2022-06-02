-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jun-2022 às 17:19
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `consultus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `CPF_paciente` bigint(11) NOT NULL,
  `CRM_med` bigint(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `id_consulta` int(11) NOT NULL,
  `especialidade` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`CPF_paciente`, `CRM_med`, `data`, `hora`, `id_consulta`, `especialidade`) VALUES
(31632, 31629, '2022-06-01', '07:40:00', 25, 'Dermatologista'),
(31628, 31631, '2022-06-01', '07:40:00', 28, 'ClÃ­nico Geral'),
(31628, 31630, '2022-06-01', '07:40:00', 30, 'Dermatologista'),
(31628, 31629, '2022-05-31', '08:00:00', 31, 'Dermatologista'),
(31627, 31636, '2022-06-16', '09:00:00', 36, 'Pediatra');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_user` bigint(6) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `tipo_user` int(1) NOT NULL,
  `email` varchar(20) NOT NULL,
  `CPF` int(11) NOT NULL,
  `CRM` int(11) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_user`, `nome`, `login`, `senha`, `tipo_user`, `email`, `CPF`, `CRM`, `ativo`) VALUES
(31625, 'Rafael Barbosa', 'admin', '123', 1, 'admin@admin.com', 2147483647, NULL, 1),
(31627, 'João Lucas', 'paciente1', 'paciente1', 3, 'joao@email.com', 1254747369, NULL, 1),
(31628, 'Lucas', 'paciente2', 'paciente2', 3, 'lucas@email.com', 21324147, NULL, 1),
(31629, 'Camila', 'medico2', 'medico2', 2, 'camila@email.com', 352315632, 3442, 1),
(31630, 'Rhaissa', 'medico3', 'medico3', 2, 'rha@rha.com', 3452421, 324123, 1),
(31631, 'Kicia Lacerda', 'vet1', 'vet1', 2, 'kicia@vet.com', 432234456, 436472, 1),
(31632, 'Maria', 'paciente3', 'paciente3', 3, 'maria@maria.com', 43678543, NULL, 1),
(31636, 'Isabela Silva', 'medica1', 'medica1', 2, 'isabela@gmail.com', 1234556767, 34253, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `CPF_paciente` (`CPF_paciente`),
  ADD KEY `CRM_med` (`CRM_med`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` bigint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31637;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`CPF_paciente`) REFERENCES `usuario` (`id_user`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`CRM_med`) REFERENCES `usuario` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
