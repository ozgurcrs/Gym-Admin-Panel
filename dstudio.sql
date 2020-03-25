-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 25 Mar 2020, 00:28:08
-- Sunucu sürümü: 5.7.24
-- PHP Sürümü: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dstudio`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `egitmentab`
--

DROP TABLE IF EXISTS `egitmentab`;
CREATE TABLE IF NOT EXISTS `egitmentab` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TC` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `Phone` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `FirstName` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `Birthday` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `registration` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ID`) KEY_BLOCK_SIZE=1024
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `egitmentab`
--

INSERT INTO `egitmentab` (`ID`, `TC`, `Email`, `Phone`, `FirstName`, `Birthday`, `registration`) VALUES
(1, '33691527311', 'ozgurciris@gmail.com', '5395345454', 'Erhan', '2017-12-31', '23/07/2019');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `programlar`
--

DROP TABLE IF EXISTS `programlar`;
CREATE TABLE IF NOT EXISTS `programlar` (
  `ID_P` int(11) NOT NULL AUTO_INCREMENT,
  `uyeTC` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `ilaveTC` varchar(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Saat` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Tarih` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `egitmenTC` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) DEFAULT '0',
  `Person` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_P`) KEY_BLOCK_SIZE=1024
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `programlar`
--

INSERT INTO `programlar` (`ID_P`, `uyeTC`, `ilaveTC`, `Saat`, `Tarih`, `egitmenTC`, `durum`, `Person`) VALUES
(1, '33691527310', '-', '8', '2019-07-24', '33691527311', 1, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  `userTC` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `userEmail` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `userPhone` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `userBirth` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `userGender` int(10) NOT NULL,
  `userTime` int(50) NOT NULL,
  `userDate` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`) KEY_BLOCK_SIZE=1024
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`ID`, `userName`, `userTC`, `userEmail`, `userPhone`, `userBirth`, `userGender`, `userTime`, `userDate`, `status`) VALUES
(1, 'Özgür Çiriş', '33691527310', 'ozgurciris@gmail.com', '5325225522', '2019-11-30', 1, 7, '23/07/2019', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usersolcum`
--

DROP TABLE IF EXISTS `usersolcum`;
CREATE TABLE IF NOT EXISTS `usersolcum` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kilo` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `yag` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `su` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `kas` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `kemik` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `kcal` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `omuz` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `gogus` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `sagkol` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `solkol` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `bel` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `karin` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `basen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `icbacak` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `sagbacak` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `solbacak` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `userTC` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ID`) KEY_BLOCK_SIZE=1024
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
