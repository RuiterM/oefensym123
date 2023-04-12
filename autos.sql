-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 apr 2023 om 10:13
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oefensym`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `autos`
--

DROP TABLE IF EXISTS `autos`;
CREATE TABLE `autos` (
  `id` int(11) NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kleur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gewicht` int(11) NOT NULL,
  `prijs` int(11) NOT NULL,
  `voorraad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `autos`
--

INSERT INTO `autos` (`id`, `model`, `type`, `kleur`, `gewicht`, `prijs`, `voorraad`) VALUES
(1, 'Volkswagen', 'Up', 'Blauw', 945, 18140, 3),
(2, 'Porsche', '911', 'Wit', 1075, 123396, 2),
(3, 'Volkswagen', 'Tiguan', 'Zilver', 1510, 36635, 4),
(4, 'Mini', 'Cooper S', 'Geel', 1185, 57000, 5),
(6, 'bmw', '1 serie', '3', 1300, 13000, 5);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `autos`
--
ALTER TABLE `autos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
