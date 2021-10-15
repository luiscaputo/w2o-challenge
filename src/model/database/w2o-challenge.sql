-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 15-Out-2021 às 01:04
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `w2o-challenge`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `collaborator`
--
-- Criação: 13-Out-2021 às 21:58
-- Última actualização: 15-Out-2021 às 01:02
--

DROP TABLE IF EXISTS `collaborator`;
CREATE TABLE IF NOT EXISTS `collaborator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `completeName` varchar(250) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `birthDate` date NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `collaborator`
--

INSERT INTO `collaborator` (`id`, `completeName`, `phone`, `email`, `birthDate`, `createdAt`, `updatedAt`) VALUES
(3, 'TesteColaborator', '923355668', 'testee@teste.com', '2002-04-20', '2021-10-15 02:02:31', '2021-10-15 02:02:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `collaboratorcompanys`
--
-- Criação: 14-Out-2021 às 20:18
-- Última actualização: 15-Out-2021 às 01:03
--

DROP TABLE IF EXISTS `collaboratorcompanys`;
CREATE TABLE IF NOT EXISTS `collaboratorcompanys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `collaboratorId` int(11) DEFAULT NULL,
  `companyId` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `collaboratorId` (`collaboratorId`),
  KEY `companyId` (`companyId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `collaboratorcompanys`
--

INSERT INTO `collaboratorcompanys` (`id`, `collaboratorId`, `companyId`, `createdAt`, `updatedAt`) VALUES
(13, 1, 1, '2021-10-15 02:03:01', '2021-10-15 02:03:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `company`
--
-- Criação: 13-Out-2021 às 21:53
-- Última actualização: 15-Out-2021 às 01:01
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `socialReason` text NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `location` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `company`
--

INSERT INTO `company` (`id`, `socialReason`, `cnpj`, `phone`, `email`, `location`, `createdAt`, `updatedAt`) VALUES
(6, 'TesteEmpresa', '00000000', '957541189', 'teste@gmail.com', 'SÃ£o Paulo Av. 21 de Janeiro Morro Bento', '2021-10-15 02:01:54', '2021-10-15 02:01:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `type_user`
--
-- Criação: 13-Out-2021 às 20:58
--

DROP TABLE IF EXISTS `type_user`;
CREATE TABLE IF NOT EXISTS `type_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--
-- Criação: 13-Out-2021 às 20:58
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ocupation` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `ocupation`, `password`, `created_at`) VALUES
(1, 'LuÃ­s Caputo', 'luiscaputo15@gmail.com', '1', 'e10adc3949ba59abbe56e057f20f883e', '2021-05-25 11:02:18'),
(2, 'Natanael', 'natanael@gmail.com', '1', '0598b1501d6d05e727b1601c51bab310', '2021-05-25 11:04:20'),
(3, 'testemd5', 'teste@gmail.com', '3', '202cb962ac59075b964b07152d234b70', '2021-05-25 11:07:28'),
(4, 'Franclin da silva', 'ff@gmail.com', '2', '202cb962ac59075b964b07152d234b70', '2021-05-25 11:54:02'),
(5, 'Natan Igor', 'Natanael@gmail.com', 'Pedreiro', '202cb962ac59075b964b07152d234b70', '2021-05-25 15:29:16'),
(6, 'Natanael Igor', 'testeteste@gmail.com', 'Estudante', '9407c826d8e3c07ad37cb2d13d1cb641', '2021-05-26 10:51:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
