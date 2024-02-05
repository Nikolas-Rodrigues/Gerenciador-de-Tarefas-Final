-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05/02/2024 às 01:09
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telefone` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`Id`, `Nome`, `Email`, `Telefone`) VALUES
(1, 'Carlo Collodi', 'Carlo.collodi@gmail.com', '48956789012'),
(3, 'Ana Silva', 'ana.silva@gmail.com', '48988543434'),
(2, 'Lucas Paz', 'lucas.paz@gmail.com', '11940028922'),
(4, 'Pedro Santos', 'pedro.santos@gmail.com', '48981239192'),
(6, 'Roberto Carlos', 'roberto.carlos@gmail.com', '48993345566'),
(5, 'Luiz Junior', 'luiz.junior@gmail.com', '48988415828'),
(7, 'Mariana Costa', 'mariana.costa@gmail.com', '11954321012'),
(8, 'Rafael Oliveira', 'rafael.oliveira@gmail.com', '11987654321'),
(9, 'Carla Pereira', 'carla.pereira@gmail.com', '47923452345'),
(10, 'Bruno Martins', 'bruno.martins@gmail.com', '87912345678');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefa`
--

DROP TABLE IF EXISTS `tarefa`;
CREATE TABLE IF NOT EXISTS `tarefa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Id_Do_Responsavel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Prioridade` varchar(255) NOT NULL,
  `Estado` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tarefa`
--

INSERT INTO `tarefa` (`id`, `Descricao`, `Id_Do_Responsavel`, `Prioridade`, `Estado`) VALUES
(23, 'Organizar folha de pagamento', '4', 'Baixa', 'Pendente'),
(18, 'Refil da tinta da Impressora', '6', 'Media', 'Em andamento'),
(8, 'Treinar estagiario', '4', 'Media', 'Em andamento'),
(10, 'Reuniao com Diretoria', '2', 'Alta', 'Concluida'),
(11, 'Enviar Relatoria de Consumo', '5', 'Media', 'Pendente'),
(20, 'Refil da tinta da Impressora', '3', 'Alta', 'Pendente'),
(13, 'Limpar a sala', '8', 'Baixa', 'Pendente'),
(14, 'Comprar galao de agua', '10', 'Alta', 'Em andamento'),
(15, 'Levar encomendas', '9', 'Media', 'Concluida'),
(22, 'Refil da tinta da Impressora', '3', 'Alta', 'Pendente'),
(24, 'Organizar folha de pagamento', '3', 'Alta', 'Pendente'),
(25, 'Organizar folha de pagamento', '2', 'Alta', 'Pendente'),
(34, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '22', 'Alta', 'Pendente');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
