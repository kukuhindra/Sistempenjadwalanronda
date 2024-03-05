-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for blok1
CREATE DATABASE IF NOT EXISTS `blok1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `blok1`;

-- Dumping structure for table blok1.absensi
CREATE TABLE IF NOT EXISTS `absensi` (
  `id_absensi` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal_detail` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu_berangkat` time DEFAULT NULL,
  `waktu_pulang` time DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_absensi`),
  KEY `FK_absensi_jadwal` (`id_jadwal_detail`) USING BTREE,
  CONSTRAINT `FK_absensi_jadwal_detail` FOREIGN KEY (`id_jadwal_detail`) REFERENCES `jadwal_detail` (`id_jadwal_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table blok1.absensi: ~3 rows (approximately)
INSERT INTO `absensi` (`id_absensi`, `id_jadwal_detail`, `tanggal`, `waktu_berangkat`, `waktu_pulang`, `Status`, `denda`) VALUES
	(45, 37, '2024-03-01', '15:18:07', '15:19:04', ' Hadir', 0),
	(46, 38, '2024-03-01', '15:19:01', NULL, 'Tidak Hadir', 5000),
	(47, 39, '2024-03-05', '03:24:35', '03:24:43', ' Hadir', 0);

-- Dumping structure for table blok1.jadwal
CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `hari` varchar(50) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table blok1.jadwal: ~7 rows (approximately)
INSERT INTO `jadwal` (`id_jadwal`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
	(12, 'senen', '23:49:57', '01:49:59'),
	(13, 'selasa', '23:50:09', '01:50:11'),
	(14, 'rabu', NULL, NULL),
	(15, 'kamis', NULL, NULL),
	(16, 'jumat', NULL, NULL),
	(17, 'sabtu', NULL, NULL),
	(18, 'minggu', NULL, NULL);

-- Dumping structure for table blok1.jadwal_detail
CREATE TABLE IF NOT EXISTS `jadwal_detail` (
  `id_jadwal_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal_detail`),
  KEY `FK__jadwal` (`id_jadwal`),
  KEY `FK__user` (`id_user`),
  CONSTRAINT `FK__jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`),
  CONSTRAINT `FK__user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table blok1.jadwal_detail: ~4 rows (approximately)
INSERT INTO `jadwal_detail` (`id_jadwal_detail`, `id_jadwal`, `id_user`) VALUES
	(35, 14, 123581),
	(36, 15, 0),
	(37, 16, 123580),
	(38, 16, 123585),
	(39, 13, 123586);

-- Dumping structure for table blok1.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table blok1.transaksi: ~3 rows (approximately)
INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `jumlah`) VALUES
	(144, '2024-02-27', 35000),
	(145, '2024-02-28', 20000),
	(148, '2024-03-01', 2000),
	(149, '2024-03-05', 30000);

-- Dumping structure for table blok1.transaksi_list
CREATE TABLE IF NOT EXISTS `transaksi_list` (
  `id_list` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_list`),
  KEY `FK_transaksi_detail_user` (`id_user`),
  CONSTRAINT `FK_transaksi_detail_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=257 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table blok1.transaksi_list: ~4 rows (approximately)
INSERT INTO `transaksi_list` (`id_list`, `id_user`, `tanggal`, `nominal`) VALUES
	(250, 0, '2024-02-27', 5000),
	(251, 0, '2024-02-27', 30000),
	(252, 0, '2024-02-28', 20000),
	(255, 123580, '2024-03-01', 2000),
	(256, 0, '2024-03-05', 30000);

-- Dumping structure for table blok1.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `no_rmh` int(11) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=123587 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table blok1.user: ~5 rows (approximately)
INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `no_rmh`, `telepon`, `level`) VALUES
	(0, 'Kukuh Indra K', 'kukuh', 'e10adc3949ba59abbe56e057f20f883e', 8, '082246778103', 1),
	(123580, 'Andri Mugi Nugroho', 'andri', 'e10adc3949ba59abbe56e057f20f883e', 7, '049374835', 2),
	(123581, 'Margo setiawan', 'margo', 'e10adc3949ba59abbe56e057f20f883e', 6, '35346547658', 3),
	(123585, 'kukkk', 'kuk', '25d55ad283aa400af464c76d713c07ad', 543, '4234235', 2),
	(123586, 'hfgeuswa', 'anjay', 'e10adc3949ba59abbe56e057f20f883e', 854, '8438246287', 1);

-- Dumping structure for trigger blok1.transaksi_list_after_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `transaksi_list_after_delete` AFTER DELETE ON `transaksi_list` FOR EACH ROW BEGIN
UPDATE transaksi
SET jumlah = jumlah-OLD.nominal WHERE tanggal = old.tanggal;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger blok1.user_after_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `user_after_delete` BEFORE DELETE ON `user` FOR EACH ROW BEGIN
DELETE FROM transaksi_list WHERE id_user = old.id_user;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
