-- --------------------------------------------------------
-- 主機:                           localhost
-- 伺服器版本:                        5.7.24 - MySQL Community Server (GPL)
-- 伺服器操作系統:                      Win64
-- HeidiSQL 版本:                  10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 傾印 crud 的資料庫結構
CREATE DATABASE IF NOT EXISTS `crud` /*!40100 DEFAULT CHARACTER SET utf32 */;
USE `crud`;

-- 傾印  表格 crud.users 結構
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf32;

-- 正在傾印表格  crud.users 的資料：~14 rows (約數)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `birthday`, `email`, `phone`) VALUES
	(1, 'Benjamin H. Barrett', '1970-02-16', 'BenjaminHBarrett@jourrapide.com', '0975-619086'),
	(2, 'Dorothy B. Hogan', '1998-07-17', 'DorothyBHogan@teleworm.us', '0943-637691'),
	(3, 'Raymond A. Walters', '1999-02-27', 'RaymondAWalters@dayrep.com', '0942-094252'),
	(4, 'Elida D. Vaughn', '2007-10-23', 'ElidaDVaughn@teleworm.us', '0901-950748'),
	(5, 'Elizabeth W. Maurer', '1989-08-08', 'ElizabethWMaurer@jourrapide.com', '0977-391214'),
	(6, 'Paula D. Cheatham', '1992-04-01', 'PaulaDCheatham@armyspy.com', '0940-768446'),
	(7, 'Retha L. Holmes', '1994-09-01', 'RethaLHolmes@teleworm.us', '0967-547265'),
	(8, 'Shane P. Spencer', '1980-06-19', 'ShanePSpencer@jourrapide.com', '0966-567097'),
	(9, 'James B. Greene', '1979-07-09', 'JamesBGreene@rhyta.com', '0948-754602'),
	(10, 'Ronda K. Wiley', '1970-12-25', 'RondaKWiley@teleworm.us', '0983-868012'),
	(11, 'Jose I. Spoon', '1975-05-05', 'JoseISpoon@armyspy.com', '0901-079644'),
	(12, 'Cecelia N. Bell', '1974-12-03', 'CeceliaNBell@teleworm.us', '0980-203151'),
	(13, 'Joan L. Dickerson', '1992-08-02', 'JoanLDickerson@rhyta.com', '0974-289666'),
	(14, 'Anthony K. Dudley', '1972-02-08', 'AnthonyKDudley@teleworm.us', '0981-401322'),
	(15, 'Danny T. Driggers', '1980-12-19', 'DannyTDriggers@armyspy.com', '0979-234280'),
	(16, 'William L. Moore', '1966-02-06', 'WilliamLMoore@jourrapide.com', '0962-624519'),
	(17, 'Dwayne T. Ballard', '1986-03-03', 'DwayneTBallard@jourrapide.com', '0945-894331'),
	(18, 'Paul W. White', '1968-09-19', 'PaulWWhite@armyspy.com', '0965-815960'),
	(19, 'Dawn D. Ortega', '1953-08-31', 'DawnDOrtega@dayrep.com', '0909-083583'),
	(20, 'Margaret A. Smallwood', '1974-01-01', 'MargaretASmallwood@rhyta.com', '0900-678510'),
	(21, 'Logan E. Kirkley', '1966-06-30', 'LoganEKirkley@teleworm.us', '0998-613150'),
	(22, 'Joann J. Grimes', '1976-10-05', 'JoannJGrimes@dayrep.com', '0999-518154'),
	(23, 'Daniel L. Norred', '1966-05-08', 'DanielLNorred@jourrapide.com', '0941-960922');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
