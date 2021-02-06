-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Fev-2021 às 00:38
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `localteste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `idContact` int(11) NOT NULL AUTO_INCREMENT,
  `idSchedule` int(11) NOT NULL,
  `nameContact` varchar(255) NOT NULL,
  `emailContact` varchar(255) NOT NULL,
  `addressContact` varchar(255) DEFAULT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idContact`),
  KEY `fk_contacts_schedule_idx` (`idSchedule`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contacts`
--

INSERT INTO `contacts` (`idContact`, `idSchedule`, `nameContact`, `emailContact`, `addressContact`, `createDate`) VALUES
(2, 1, 'Carolina Gaia', 'carolinagaiasouza@outlook.com.br', 'Rua Américo Scaranello 100, Wilson Bernardi - Sertãozinho - SP', '2021-02-05 23:07:07'),
(17, 1, 'Rodrigo Luiz Barbosa de Souza', 'rluizbarbosa@gmail.com', 'Rua Américo Scaranello 100, Wilson Bernardi - Sertãozinho - SP', '2021-02-05 23:06:24'),
(20, 1, 'Rodrigo Luiz', 'rluizbarbosa@gmail.com.br', 'Rua Américo Scaranello 100, Wilson Bernardi - Sertãozinho - SP', '2021-02-05 23:32:56'),
(21, 1, 'Amanda Barbosa', 'amanda@gmail.com', 'Rua Américo Scaranello 100, Wilson Bernardi - Sertãozinho - SP', '2021-02-05 23:33:14'),
(22, 1, 'Isaac Barbosa', 'isaac@gmail.com', 'Rua Fioravante Schierri 150, Centro - Sertãozihno', '2021-02-05 23:34:01'),
(23, 1, 'Giovana', 'gigi@gmail.com', 'Rua Américo Scaranello 100, Wilson Bernardi - Sertãozinho - SP', '2021-02-05 23:38:37'),
(24, 1, 'Carolina Gaia', 'carolinagaiasouza@outlook.com.br', 'Rua Américo Scaranello 100, Wilson Bernardi - Sertãozinho - SP', '2021-02-05 23:07:07'),
(25, 1, 'Rodrigo Luiz Barbosa de Souza', 'rluizbarbosa@gmail.com', 'Rua Américo Scaranello 100, Wilson Bernardi - Sertãozinho - SP', '2021-02-05 23:06:24'),
(26, 1, 'Rodrigo Luiz', 'rluizbarbosa@gmail.com.br', 'Rua Américo Scaranello 100, Wilson Bernardi - Sertãozinho - SP', '2021-02-05 23:32:56'),
(28, 1, 'Isaac Barbosa', 'isaac@gmail.com', 'Rua Fioravante Schierri 150, Centro - Sertãozihno', '2021-02-05 23:34:01'),
(29, 1, 'Giovana', 'gigi@gmail.com', 'Rua Américo Scaranello 100, Wilson Bernardi - Sertãozinho - SP', '2021-02-05 23:38:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `phones`
--

DROP TABLE IF EXISTS `phones`;
CREATE TABLE IF NOT EXISTS `phones` (
  `idPhone` int(11) NOT NULL AUTO_INCREMENT,
  `idContact` int(11) NOT NULL,
  `numberPhone` varchar(255) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idPhone`),
  KEY `fk_phones_contacts1_idx` (`idContact`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `phones`
--

INSERT INTO `phones` (`idPhone`, `idContact`, `numberPhone`, `createDate`) VALUES
(13, 17, '(16) 99274-0586', '2021-02-05 23:06:24'),
(14, 2, '(16) 99999-9999', '2021-02-05 23:07:07'),
(15, 2, '(16) 99999-9999', '2021-02-05 23:07:07'),
(16, 2, '(16) 99999-9999', '2021-02-05 23:07:07'),
(19, 20, '(16) 99274-0585', '2021-02-05 23:32:56'),
(20, 20, '(16) 99999-9999', '2021-02-05 23:32:56'),
(21, 20, '(16) 99999-9999', '2021-02-05 23:32:56'),
(22, 21, '(16) 99274-0585', '2021-02-05 23:33:14'),
(23, 23, '(16) 99999-9999', '2021-02-05 23:38:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `idSchedule` int(11) NOT NULL AUTO_INCREMENT,
  `nameSchedule` varchar(255) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idSchedule`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `schedule`
--

INSERT INTO `schedule` (`idSchedule`, `nameSchedule`, `createDate`) VALUES
(1, 'Agenda 1', '2021-02-05 10:01:05');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `fk_contacts_schedule` FOREIGN KEY (`idSchedule`) REFERENCES `schedule` (`idSchedule`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `fk_phones_contacts1` FOREIGN KEY (`idContact`) REFERENCES `contacts` (`idContact`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
