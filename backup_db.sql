-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5311
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para sd
CREATE DATABASE IF NOT EXISTS `sd` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sd`;

-- Copiando estrutura para tabela sd.ingresso
CREATE TABLE IF NOT EXISTS `ingresso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `sync` bigint(20) NOT NULL,
  `time_emitido` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sd.ingresso: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `ingresso` DISABLE KEYS */;
INSERT INTO `ingresso` (`id`, `hash`, `file`, `status`, `sync`, `time_emitido`) VALUES
	(1, '1c86770fa5d721b407a2c06f43822642', '1c86770fa5d721b407a2c06f43822642.jpeg', 'EMITIDO', 1540939248, 1540939246),
	(2, 'c0b5195e43bdcfca7c5a18bebe10b384', 'c0b5195e43bdcfca7c5a18bebe10b384.jpeg', 'EMITIDO', 1541023014, 1541023013),
	(3, 'c2952159a6910cbd055df9e9696a9101', 'c2952159a6910cbd055df9e9696a9101.jpeg', 'ACESSO PERMITIDO', 1541037084, 1541036037);
/*!40000 ALTER TABLE `ingresso` ENABLE KEYS */;

-- Copiando estrutura para tabela sd.login
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `time` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sd.login: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id`, `login`, `senha`, `time`) VALUES
	(1, 'breno.cruvinel', '321', 1537116487),
	(3, 'usuario', 'teste', 1537123755),
	(4, 'teste', '123', 1537269058),
	(6, 'testees', '12123', 1537445331);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
