-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `controle_de_vendas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `formas_de_pagamento`
--

CREATE TABLE IF NOT EXISTS `formas_de_pagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(255) NOT NULL,
  `taxas` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `dataPedido` datetime DEFAULT NULL,
  `dataCompra` datetime DEFAULT NULL,
  `pedidoCOD` int(11) DEFAULT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `produto` varchar(255) DEFAULT NULL,
  `rastreioCOD` varchar(255) NOT NULL,
  `precoUSD` float DEFAULT NULL,
  `precoBRL` float DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
