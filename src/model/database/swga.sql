-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 26-Maio-2021 às 09:54
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
-- Database: `swga`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agend`
--

DROP TABLE IF EXISTS `agend`;
CREATE TABLE IF NOT EXISTS `agend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_actividade` varchar(50) NOT NULL,
  `important` varchar(30) NOT NULL,
  `intervenients` varchar(150) NOT NULL,
  `data_actividade` date NOT NULL,
  `hour` time NOT NULL,
  `user` int(11) NOT NULL,
  `detalhes` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agend`
--

INSERT INTO `agend` (`id`, `name_actividade`, `important`, `intervenients`, `data_actividade`, `hour`, `user`, `detalhes`, `created_at`) VALUES
(7, 'Ramo', 'Teste', 'Sozinho', '2021-10-12', '11:12:00', 5, 'Teste Actividade Nova', '2021-05-26 07:12:54'),
(8, 'compras', 'Extremo', 'Sozinho', '2222-12-12', '12:01:00', 6, '1211', '2021-05-26 10:52:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historic`
--

DROP TABLE IF EXISTS `historic`;
CREATE TABLE IF NOT EXISTS `historic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agend_named` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `type_user`
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
(1, 'LuÃ­s Caputo', 'luiscaputo15@gmail.com', '1', '9c33f32e61ac74238c1d1931ea7d3c55', '2021-05-25 11:02:18'),
(2, 'Natanael', 'natanael@gmail.com', '1', '0598b1501d6d05e727b1601c51bab310', '2021-05-25 11:04:20'),
(3, 'testemd5', 'teste@gmail.com', '3', '202cb962ac59075b964b07152d234b70', '2021-05-25 11:07:28'),
(4, 'Franclin da silva', 'ff@gmail.com', '2', '202cb962ac59075b964b07152d234b70', '2021-05-25 11:54:02'),
(5, 'Natan Igor', 'Natanael@gmail.com', 'Pedreiro', '202cb962ac59075b964b07152d234b70', '2021-05-25 15:29:16'),
(6, 'Natanael Igor', 'testeteste@gmail.com', 'Estudante', '9407c826d8e3c07ad37cb2d13d1cb641', '2021-05-26 10:51:52');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agend`
--
ALTER TABLE `agend`
  ADD CONSTRAINT `agend_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
