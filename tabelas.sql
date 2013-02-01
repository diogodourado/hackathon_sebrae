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
-- Banco de Dados: `sebrae`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens`
--

CREATE TABLE IF NOT EXISTS `postagens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` int(10) unsigned NOT NULL,
  `local` varchar(50) NOT NULL,
  `texto` varchar(200) NOT NULL,
  `cor` varchar(10) NOT NULL DEFAULT '#FF9',
  `ordem` int(10) unsigned NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario` (`usuario`,`local`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `postagens`
--

INSERT INTO `postagens` (`id`, `usuario`, `local`, `texto`, `cor`, `ordem`, `data`) VALUES
(10, 1, 'atividades', 'teste', '#FF9', 1, '2013-02-01 10:57:58'),
(11, 1, 'canais', 'teste', '#FF9', 1, '2013-02-01 11:00:54'),
(12, 1, 'atividades', 'teste', '#FF9', 2, '2013-02-01 11:18:51'),
(4, 2, 'atividades', 'alternativo mesmo', '#FF9', 1, '2013-02-01 07:46:59'),
(5, 2, 'proposta', 'bacana demais!!', '#FF9', 1, '2013-02-01 07:47:06'),
(6, 2, 'segmento', 'globo!! ;)', '#FF9', 1, '2013-02-01 07:47:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(240) NOT NULL,
  `nome` varchar(240) NOT NULL,
  `negocio` varchar(240) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nome`, `negocio`) VALUES
(1, 'diogo@dourado.net', 'Diogo', 'Campus Party'),
(2, 'teste@teste.com', 'Maria', 'Projeto Alternativo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
