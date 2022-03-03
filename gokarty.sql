-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Mar 2022, 14:54
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `gokarty`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `czas`
--

CREATE TABLE `czas` (
  `czas_id` int(11) NOT NULL,
  `przejazd_id` int(11) NOT NULL,
  `czas` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gokart`
--

CREATE TABLE `gokart` (
  `gokart_id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `gokart`
--

INSERT INTO `gokart` (`gokart_id`, `nazwa`) VALUES
(1, 'Czerwony Szybki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miasto`
--

CREATE TABLE `miasto` (
  `miasto_id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `miasto`
--

INSERT INTO `miasto` (`miasto_id`, `nazwa`) VALUES
(1, 'Limanowa'),
(2, 'Stara Wieś'),
(3, 'Nowy Sącz');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przejazd`
--

CREATE TABLE `przejazd` (
  `przejazd_id` int(11) NOT NULL,
  `zawodnik_id` int(11) NOT NULL,
  `gokart_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `zawody_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status_zawodnika`
--

CREATE TABLE `status_zawodnika` (
  `status_zawodnika_id` int(11) NOT NULL,
  `stan` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `status_zawodnika`
--

INSERT INTO `status_zawodnika` (`status_zawodnika_id`, `stan`) VALUES
(1, 'jechał'),
(2, 'jedzie'),
(3, 'nie jechał'),
(4, 'zakończono');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status_zawodow`
--

CREATE TABLE `status_zawodow` (
  `status_zawodow_id` int(11) NOT NULL,
  `status` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `status_zawodow`
--

INSERT INTO `status_zawodow` (`status_zawodow_id`, `status`) VALUES
(1, 'zakończone'),
(2, 'w trakcie'),
(3, 'zaplanowane');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `szkola`
--

CREATE TABLE `szkola` (
  `szkola_id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `miasto_id` int(11) NOT NULL,
  `akronim` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `szkola`
--

INSERT INTO `szkola` (`szkola_id`, `nazwa`, `miasto_id`, `akronim`) VALUES
(1, 'Zespół Szkół Technicznych i Ogólnokształcacych im. Jana Pawła II', 1, 'ZSTiO Limanowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zawodnik`
--

CREATE TABLE `zawodnik` (
  `zawodnik_id` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `data_urodzenia` date NOT NULL,
  `szkola_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zawodnik`
--

INSERT INTO `zawodnik` (`zawodnik_id`, `imie`, `nazwisko`, `data_urodzenia`, `szkola_id`) VALUES
(1, 'Tomasz', 'Hajto', '1972-10-16', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zawody`
--

CREATE TABLE `zawody` (
  `zawody_id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `data_rozpoczecia` date NOT NULL,
  `data_zakonczenia` date NOT NULL,
  `status_zawodow_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `czas`
--
ALTER TABLE `czas`
  ADD PRIMARY KEY (`czas_id`),
  ADD KEY `przejazd_id` (`przejazd_id`);

--
-- Indeksy dla tabeli `gokart`
--
ALTER TABLE `gokart`
  ADD PRIMARY KEY (`gokart_id`);

--
-- Indeksy dla tabeli `miasto`
--
ALTER TABLE `miasto`
  ADD PRIMARY KEY (`miasto_id`);

--
-- Indeksy dla tabeli `przejazd`
--
ALTER TABLE `przejazd`
  ADD PRIMARY KEY (`przejazd_id`),
  ADD KEY `przejazd_gokart` (`gokart_id`),
  ADD KEY `przejazd_status` (`status_id`),
  ADD KEY `przejazd_zawodnik` (`zawodnik_id`),
  ADD KEY `przejazd_zawody` (`zawody_id`);

--
-- Indeksy dla tabeli `status_zawodnika`
--
ALTER TABLE `status_zawodnika`
  ADD PRIMARY KEY (`status_zawodnika_id`);

--
-- Indeksy dla tabeli `status_zawodow`
--
ALTER TABLE `status_zawodow`
  ADD PRIMARY KEY (`status_zawodow_id`);

--
-- Indeksy dla tabeli `szkola`
--
ALTER TABLE `szkola`
  ADD PRIMARY KEY (`szkola_id`),
  ADD KEY `szkola_miasto` (`miasto_id`);

--
-- Indeksy dla tabeli `zawodnik`
--
ALTER TABLE `zawodnik`
  ADD PRIMARY KEY (`zawodnik_id`),
  ADD KEY `zawodnicy_szkola` (`szkola_id`);

--
-- Indeksy dla tabeli `zawody`
--
ALTER TABLE `zawody`
  ADD PRIMARY KEY (`zawody_id`),
  ADD KEY `zawody_status` (`status_zawodow_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `czas`
--
ALTER TABLE `czas`
  MODIFY `czas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `gokart`
--
ALTER TABLE `gokart`
  MODIFY `gokart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `miasto`
--
ALTER TABLE `miasto`
  MODIFY `miasto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `przejazd`
--
ALTER TABLE `przejazd`
  MODIFY `przejazd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `status_zawodnika`
--
ALTER TABLE `status_zawodnika`
  MODIFY `status_zawodnika_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `status_zawodow`
--
ALTER TABLE `status_zawodow`
  MODIFY `status_zawodow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `szkola`
--
ALTER TABLE `szkola`
  MODIFY `szkola_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `zawodnik`
--
ALTER TABLE `zawodnik`
  MODIFY `zawodnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `zawody`
--
ALTER TABLE `zawody`
  MODIFY `zawody_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `czas`
--
ALTER TABLE `czas`
  ADD CONSTRAINT `czas_ibfk_1` FOREIGN KEY (`przejazd_id`) REFERENCES `przejazd` (`przejazd_id`);

--
-- Ograniczenia dla tabeli `przejazd`
--
ALTER TABLE `przejazd`
  ADD CONSTRAINT `przejazd_gokart` FOREIGN KEY (`gokart_id`) REFERENCES `gokart` (`gokart_id`),
  ADD CONSTRAINT `przejazd_status` FOREIGN KEY (`status_id`) REFERENCES `status_zawodnika` (`status_zawodnika_id`),
  ADD CONSTRAINT `przejazd_zawodnik` FOREIGN KEY (`zawodnik_id`) REFERENCES `zawodnik` (`zawodnik_id`),
  ADD CONSTRAINT `przejazd_zawody` FOREIGN KEY (`zawody_id`) REFERENCES `zawody` (`zawody_id`);

--
-- Ograniczenia dla tabeli `szkola`
--
ALTER TABLE `szkola`
  ADD CONSTRAINT `szkola_miasto` FOREIGN KEY (`miasto_id`) REFERENCES `miasto` (`miasto_id`);

--
-- Ograniczenia dla tabeli `zawodnik`
--
ALTER TABLE `zawodnik`
  ADD CONSTRAINT `zawodnicy_szkola` FOREIGN KEY (`szkola_id`) REFERENCES `szkola` (`szkola_id`);

--
-- Ograniczenia dla tabeli `zawody`
--
ALTER TABLE `zawody`
  ADD CONSTRAINT `zawody_status` FOREIGN KEY (`status_zawodow_id`) REFERENCES `status_zawodow` (`status_zawodow_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
