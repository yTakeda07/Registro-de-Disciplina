
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



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




-- Estrutura da tabela ``

CREATE TABLE IF NOT EXISTS `semana` (
  `CD_SEMANA` int(8) NOT NULL AUTO_INCREMENT,
  `CD_DISCIPLINA` int(8) NOT NULL,
  `CD_ID_SEMANA` int(8) NOT NULL,
  `TP_SEMANA` varchar(10) NOT NULL,
  `NM_DISCIPLINA` varchar(100) NOT NULL, 
  `NM_ARQUIVO` VARCHAR(255) NOT NULL,
  `DS_ARQUIVO` varchar(255) NOT NULL,
  `DS_SEMANA` text NOT NULL,
  PRIMARY KEY (`CD_SEMANA`),
  FOREIGN KEY (`CD_DISCIPLINA`) REFERENCES `TB_DISCIPLINA`(`CD_DISCIPLINA`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;



