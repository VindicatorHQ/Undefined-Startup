-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 jun 2019 om 11:44
-- Serverversie: 10.1.36-MariaDB
-- PHP-versie: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamereview`
--
CREATE DATABASE IF NOT EXISTS `gamereview` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gamereview`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `summary` varchar(1000) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `publication_date` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `games`
--

INSERT INTO `games` (`id`, `title`, `summary`, `rating`, `publication_date`) VALUES
(1, 'DOOM 2016', 'Ik verwachtte dus dat deze nieuwe DOOM - simpelweg DOOM genaamd - ook weer zou beginnen met een filmachtige intro waarbij de sfeer en het plot vastgesteld zouden worden; waarbij door middel van lange cinematics zou worden uitgelegd wat er op Mars gebeurd is en waarom Ã©Ã©n man het moet opnemen tegen de legers van de hel. LOL, nope!', '10', '2019-06-14'),
(2, 'Warframe heeft 5,5 miljoen gebruikers!', 'De free-to-play third-person MMO Warframe heeft de 5,5 miljoen accounts bereikt. Dit heugelijke feit gaat gevierd worden met een twaalfde update voor de game. Deze nieuwe update zorgt voor een nieuwe game mode, een nieuw personage, een aantal tweaks en nieuwe wapens. Warframe is naast de PC ook uitgekomen op de PS4. Verder zijn er geruchten dat de game ook nog naar de Xbox One gaat komen.', '9', '2019-06-13'),
(3, 'DOOM Eternal release date bekend!', 'Bethesda liet vanavond een verhaaltrailer zien van Doom Eternal en zoals je verwacht is het een aaneenschakeling van demonen die op gruwelijke manieren uit de weg worden geruimd. Je speelt weer als de Doom Slayer die zich ditmaal door verschillende dimensies met nieuwe werelden moet zien te worstelen, en zelfs even langs gaat in de hemel. Uiterkaard kom je nieuwe en bekende demonen tegen die je met talloze wapens kan afslachten. Doom Eternal komt op 22 november uit voor PS4, Xbox One en PC', '8', '2019-06-10');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

DROP TABLE IF EXISTS `gebruikers`;
CREATE TABLE IF NOT EXISTS `gebruikers` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'vindicator', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
