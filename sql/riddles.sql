-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 28 mei 2026 om 13:43
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escaperoom`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `riddles`
--

CREATE TABLE `riddles` (
  `id` int(11) NOT NULL,
  `riddle` varchar(255) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `hint` varchar(255) DEFAULT NULL,
  `roomId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `riddles`
--

INSERT INTO `riddles` (`id`, `riddle`, `answer`, `hint`, `roomId`) VALUES
(19, 'Ik ben zwart-wit en ik eet bijna alleen maar bamboe. Welk dier ben ik?', 'Panda', 'Je ziet mij vaak zittend eten. Ik leef in Azië.', 1),
(20, 'Ik ben snel, heb strepen en lijk op een paard. Wie ben ik?', 'Zebra', 'Mijn strepen helpen mij om te verdwijnen in een groep.', 1),
(21, 'Ik hang graag ondersteboven en slaap overdag. Wat ben ik?', 'Vleermuis', 'Ik gebruik echolocatie om te vliegen.', 1),
(22, 'In veel games moet je dit verzamelen om sterker te worden. Wat is het?', 'Experience', 'Denk aan RPG’s: je krijgt het door vijanden te verslaan.', 2),
(23, 'Hoe noem je het als een gamewereld steeds opnieuw wordt gemaakt en nooit hetzelfde is?', 'Procedural generation', 'Minecraft heeft dit ook.', 2),
(24, 'In games heb je vaak drie levensbalken: health, stamina en…?', 'Mana', 'Het bepaalt hoeveel speciale aanvallen je kunt doen.', 2),
(25, 'Ik ben de grootste planeet in ons zonnestelsel. Welke planeet ben ik?', 'Jupiter', 'Ik heb een grote rode vlek.', 3),
(26, 'Hoe heet de kracht die ervoor zorgt dat planeten om de zon blijven draaien?', 'Zwaartekracht', 'Het trekt alles naar elkaar toe.', 3),
(27, 'Wat is de naam van onze sterrenstelsel?', 'Melkweg', 'Het klinkt als iets dat je kunt drinken.', 3);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `riddles`
--
ALTER TABLE `riddles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `riddles`
--
ALTER TABLE `riddles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
