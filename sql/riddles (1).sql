-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 mei 2026 om 14:23
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

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
(10, 'Je vindt een oud slot met een code van 3 cijfers. Op de muur staat: 4 + 2 = 42. Wat is de code?', '62', 'Denk aan het naast elkaar zetten van cijfers, niet optellen.', 1),
(11, 'Op een tafel ligt een kaars, een lucifer en een briefje met: “Ik brand maar ik ben geen vuur.” Wat ben ik?', 'Lamp', 'Het is iets dat licht geeft zonder vuur.', 1),
(12, 'Je hoort een tikkend geluid. Op de klok staat 21:00 maar de secondewijzer beweegt niet. Wat klopt er niet?', 'De klok is kapot', 'De tijd staat stil.', 1),
(13, 'Op een computerscherm staat: H2O + ? = IJs. Wat moet er bij het vraagteken?', 'Kou', 'Denk aan temperatuur.', 2),
(14, 'Een kast heeft 4 potjes: A, B, C en D. Alleen potje C is giftig. Welke pak je?', 'A', 'Niet de giftige.', 2),
(15, 'Een microscoop toont een code: 1-4-1-4. Op de muur staat: “Dubbel is één.” Wat is de code?', '14', 'Combineer dubbele cijfers.', 2),
(16, 'Op een monitor zie je 3 camera’s. Camera 1 knippert 2x, camera 2 knippert 4x, camera 3 knippert 6x. Wat is het patroon?', 'Even getallen', 'Het gaat per 2 omhoog.', 3),
(17, 'Een toetsenbord mist één toets. De hint zegt: “Het begint altijd hier.” Welke toets ontbreekt?', 'Escape', 'Denk aan computers.', 3),
(18, 'Op een scherm staat: 01001000. Wat betekent dit in tekst?', 'H', 'Het is ASCII in binair.', 3);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
