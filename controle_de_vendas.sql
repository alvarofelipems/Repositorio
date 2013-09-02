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
-- Estrutura da tabela `emails_enviados`
--

CREATE TABLE IF NOT EXISTS `emails_enviados` (
  `modeloID` int(11) NOT NULL,
  `vendaID` int(11) NOT NULL,
  `enviadoEm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `emails_enviados`
--

INSERT INTO `emails_enviados` (`modeloID`, `vendaID`, `enviadoEm`) VALUES
(6, 1, '2013-08-24 15:25:18'),
(6, 1, '2013-08-24 16:01:40'),
(6, 1, '2013-08-24 16:02:46'),
(6, 1, '2013-08-24 16:03:16'),
(6, 1, '2013-08-24 16:04:15'),
(6, 1, '2013-08-24 16:04:50'),
(6, 1, '2013-08-24 17:12:40'),
(6, 1, '2013-08-24 17:13:27'),
(6, 1, '2013-08-24 17:13:37'),
(6, 1, '2013-08-24 17:14:26'),
(6, 1, '2013-08-24 17:14:36'),
(6, 1, '2013-08-26 11:27:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formas_de_pagamento`
--

CREATE TABLE IF NOT EXISTS `formas_de_pagamento` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(255) NOT NULL,
  `taxas` float DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `formas_de_pagamento`
--

INSERT INTO `formas_de_pagamento` (`ID`, `referencia`, `taxas`) VALUES
(1, 'Cartão de Credito', 6.38);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelos_de_email`
--

CREATE TABLE IF NOT EXISTS `modelos_de_email` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(255) NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `modelos_de_email`
--

INSERT INTO `modelos_de_email` (`ID`, `referencia`, `assunto`, `mensagem`) VALUES
(1, 'Teste', 'Você está recebendo esse email de teste.', 'Olá [cliente]');

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
  `rastreioCOD` varchar(255) DEFAULT NULL,
  `precoUSD` float NOT NULL DEFAULT '0',
  `cotacaoDolar` float NOT NULL DEFAULT '0',
  `precoBRL` float NOT NULL DEFAULT '0',
  `formaPagamento` int(11) NOT NULL,
  `cursto` float NOT NULL,
  `pagSeguro` float NOT NULL,
  `lucro` float NOT NULL,
  `lucroPercent` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`ID`, `dataPedido`, `dataCompra`, `pedidoCOD`, `cliente`, `email`, `produto`, `rastreioCOD`, `precoUSD`, `cotacaoDolar`, `precoBRL`, `formaPagamento`, `cursto`, `pagSeguro`, `lucro`, `lucroPercent`) VALUES
(1, '2013-08-24 11:15:26', '2013-08-24 11:15:26', 0, '', '', '', '', 0, 2.362, 0, 1, 0, 0, 0, 0),
(2, '2013-08-24 11:15:26', '2013-08-24 11:15:26', 0, '', '', '', '', 0, 2.362, 0, 1, 0, 0, 0, 0),
(3, '2013-08-24 09:19:07', '2013-08-24 09:19:07', 0, 'Álvaro Felipe Mendes Soares', 'alvarofelipems@gmail.com', 'Relógio', 'RB242924055CN', 10, 2, 150, 1, 0, 0, 0, 0),
(4, '2013-08-24 09:20:20', '2013-08-24 09:20:20', 0, 'Álvaro Felipe Mendes Soares', 'alvarofelipems@gmail.com', 'Relógio', '', 2, 2.362, 5, 1, 0, 0, 0, 0),
(5, '2013-08-24 09:22:11', '2013-08-24 09:22:11', 0, 'Álvaro Felipe Mendes Soares', 'alvarofelipems@gmail.com', 'Relógio', '', 2, 2.362, 5, 1, 0, 0, 0, 0),
(6, '2013-08-24 09:23:07', '2013-08-24 09:23:07', 0, 'Álvaro Felipe Mendes Soares', 'alvarofelipems@gmail.com', 'Relógio', '', 2, 2.362, 5, 1, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
