-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table todoweb.mark: ~2 rows (approximately)
INSERT INTO `mark` (`id`, `mark`) VALUES
	(1, 'Incomplete'),
	(2, 'Complete'),
	(3, 'Cancel');

-- Dumping data for table todoweb.objective: ~5 rows (approximately)
INSERT INTO `objective` (`o_id`, `priority_id`, `User_id`, `heading`, `description`, `set_date`, `end_date`, `status_id`) VALUES
	(14, 1, 13, 'Understand and Usage of voice', 'Understand how to improve your vocal usage to maintain a favourable conversation and as well as to attract audiences', '2024-01-01', '2025-01-01', 1),
	(16, 1, 13, 'Understanding of Frequency, Energy and Vibrations', 'Get an indepth understanding of the true purpose of the frequency levels, energy levels and demensions ', '2024-01-01', '2025-01-01', 1),
	(17, 1, 13, 'Master Lucid Dreaming', 'Nothing more to say', '2024-01-01', '2025-01-01', 1),
	(18, 2, 13, 'Examination Preparation', 'be ready for the upcoming OOP examination and do your best to succeed to the maximum', '2024-01-01', '2024-01-31', 1),
	(19, 1, 13, 'Trading', 'Learn the discipline which lies within trading , the emotional control and the analysis of data presented', '2024-01-01', '2025-01-01', 1);

-- Dumping data for table todoweb.priority: ~4 rows (approximately)
INSERT INTO `priority` (`id`, `name`) VALUES
	(1, 'Annual'),
	(2, 'High'),
	(3, 'Medium'),
	(4, 'Low');

-- Dumping data for table todoweb.status: ~4 rows (approximately)
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Incompleted'),
	(2, 'Completed'),
	(3, 'Canceled');

-- Dumping data for table todoweb.user: ~0 rows (approximately)
INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `password`, `created_date`, `birth_date`, `secretcode`) VALUES
	(13, 'pulesh', 'aponso', 'Pulesh', 'asdas', '2024-01-01', '2005-08-10', 'asdas');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
