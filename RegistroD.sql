-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Fev-2025 às 11:37
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `testedd`
--
CREATE DATABASE IF NOT EXISTS `BancoDisciplina` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `BancoDisciplina`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE IF NOT EXISTS `TB_DISCIPLINA` (
  `CD_DISCIPLINA` int(8) NOT NULL AUTO_INCREMENT,
  `NM_DISCIPLINA` varchar(100) NOT NULL,
  `QT_CARGA_ANUAL` int(8) NOT NULL,
  `QT_CARGA_SEMANAL` int(8) NOT NULL,
  `NR_AVALIACAO` int(10) NOT NULL,
  `TP_DISCIPLINA` varchar(10) NOT NULL,
  PRIMARY KEY (`CD_DISCIPLINA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- ------------------------------------------------------