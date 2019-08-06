SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE IF NOT EXISTS `videos` (
  `title` varchar(30) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '未知标题',
  `vid` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `coverAddr` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `createTime` bigint(20) NOT NULL,
  `des` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '无简介',
  `isLoginRequired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vid`),
  KEY `createTime` (`createTime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE IF NOT EXISTS `videos_ids` (
  `cn-shanghai` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `ap-northeast-1` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  KEY `cn-shanghai` (`cn-shanghai`),
  KEY `ap-northeast-1` (`ap-northeast-1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `video_watches` (
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'guest',
  `vid` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `usingNode` varchar(12) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'UNKNOWN',
  `time` bigint(20) NOT NULL DEFAULT '0',
  `accessId` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`accessId`),
  KEY `time` (`time`),
  KEY `username` (`username`),
  KEY `vid` (`vid`),
  KEY `usingNode` (`usingNode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `videos` ADD FULLTEXT KEY `title` (`title`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
