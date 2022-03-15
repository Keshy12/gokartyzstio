-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Mar 2022, 11:32
-- Wersja serwera: 10.4.19-MariaDB
-- Wersja PHP: 8.0.7

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
-- Struktura tabeli dla tabeli `archiwum`
--

CREATE TABLE `archiwum` (
  `archiwum_id` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `gokart_id` int(11) NOT NULL,
  `czas` text COLLATE utf8_polish_ci DEFAULT NULL,
  `szkola_id` int(11) NOT NULL,
  `zawody_id` int(11) NOT NULL
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
(1, 'Czerwony Podstawowy'),
(2, 'Pomarańczowy Podstawowy');

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
(1, 'Limanowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status_przejazdu`
--

CREATE TABLE `status_przejazdu` (
  `status_przejazdu_id` int(11) NOT NULL,
  `status` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `status_przejazdu`
--

INSERT INTO `status_przejazdu` (`status_przejazdu_id`, `status`) VALUES
(1, 'jechal'),
(2, 'jedzie'),
(3, 'nie jechal'),
(4, 'dyskwalifikacja');

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
(1, 'zaplanowane'),
(2, 'w trakcie'),
(3, 'zakonczone');

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
(1, 'Zespół Szkół Technicznych i Ogólnokształcacych im. Jana Pawła II', 1, 'ZSTIO Limanowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tm_przejazd`
--

CREATE TABLE `tm_przejazd` (
  `tm_przejazd_id` int(11) NOT NULL,
  `tm_zawodnik_id` int(11) NOT NULL,
  `status_przejazdu_id` int(11) NOT NULL,
  `gokart_id` int(11) NOT NULL,
  `czas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `tm_przejazd`
--

INSERT INTO `tm_przejazd` (`tm_przejazd_id`, `tm_zawodnik_id`, `status_przejazdu_id`, `gokart_id`, `czas`) VALUES
(1, 1, 1, 2, 0),
(2, 2, 1, 1, 0),
(3, 3, 1, 1, 0),
(4, 4, 1, 1, 0),
(5, 5, 2, 2, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tm_zawodnik`
--

CREATE TABLE `tm_zawodnik` (
  `tm_zawodnik_id` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `data_urodzenia` date NOT NULL,
  `szkola_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `tm_zawodnik`
--

INSERT INTO `tm_zawodnik` (`tm_zawodnik_id`, `imie`, `nazwisko`, `data_urodzenia`, `szkola_id`) VALUES
(1, 'Mariusz', 'Trynkiewicz', '2013-06-12', 1),
(2, 'Janusz', 'Mikker', '2022-03-09', 1),
(3, 'Kuba', 'Duda', '2022-03-15', 1),
(4, 'Marcin', 'Stożke', '2022-03-17', 1),
(5, 'Vladimir', 'Putler', '2022-03-16', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `uzytkownik_id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`uzytkownik_id`, `login`, `haslo`) VALUES
(1, 'zstio', '89420ef764ba98728f16a21c5da122f25fdc936b535bbf0d5ccf1ba0ec6dab3b'),
(2, 'sedzia', '89420ef764ba98728f16a21c5da122f25fdc936b535bbf0d5ccf1ba0ec6dab3b');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zawody`
--

CREATE TABLE `zawody` (
  `zawody_id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `data_rozpoczecia` date NOT NULL,
  `data_zakonczenia` date DEFAULT NULL,
  `status_zawodow_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zawody`
--

INSERT INTO `zawody` (`zawody_id`, `nazwa`, `data_rozpoczecia`, `data_zakonczenia`, `status_zawodow_id`) VALUES
(1, 'Zawody Klasy 1-3 2022', '2022-03-17', '2022-04-14', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `archiwum`
--
ALTER TABLE `archiwum`
  ADD PRIMARY KEY (`archiwum_id`),
  ADD KEY `FK_74` (`szkola_id`),
  ADD KEY `FK_77` (`gokart_id`),
  ADD KEY `FK_82` (`zawody_id`);

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
-- Indeksy dla tabeli `status_przejazdu`
--
ALTER TABLE `status_przejazdu`
  ADD PRIMARY KEY (`status_przejazdu_id`);

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
  ADD KEY `FK_32` (`miasto_id`);

--
-- Indeksy dla tabeli `tm_przejazd`
--
ALTER TABLE `tm_przejazd`
  ADD PRIMARY KEY (`tm_przejazd_id`),
  ADD KEY `FK_60` (`tm_zawodnik_id`),
  ADD KEY `FK_63` (`gokart_id`),
  ADD KEY `FK_66` (`status_przejazdu_id`);

--
-- Indeksy dla tabeli `tm_zawodnik`
--
ALTER TABLE `tm_zawodnik`
  ADD PRIMARY KEY (`tm_zawodnik_id`),
  ADD KEY `FK_40` (`szkola_id`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`uzytkownik_id`);

--
-- Indeksy dla tabeli `zawody`
--
ALTER TABLE `zawody`
  ADD PRIMARY KEY (`zawody_id`),
  ADD KEY `FK_53` (`status_zawodow_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `archiwum`
--
ALTER TABLE `archiwum`
  MODIFY `archiwum_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `gokart`
--
ALTER TABLE `gokart`
  MODIFY `gokart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `miasto`
--
ALTER TABLE `miasto`
  MODIFY `miasto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `status_przejazdu`
--
ALTER TABLE `status_przejazdu`
  MODIFY `status_przejazdu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `status_zawodow`
--
ALTER TABLE `status_zawodow`
  MODIFY `status_zawodow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `szkola`
--
ALTER TABLE `szkola`
  MODIFY `szkola_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `tm_przejazd`
--
ALTER TABLE `tm_przejazd`
  MODIFY `tm_przejazd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `tm_zawodnik`
--
ALTER TABLE `tm_zawodnik`
  MODIFY `tm_zawodnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `uzytkownik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `zawody`
--
ALTER TABLE `zawody`
  MODIFY `zawody_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `archiwum`
--
ALTER TABLE `archiwum`
  ADD CONSTRAINT `archiwum_gokart` FOREIGN KEY (`gokart_id`) REFERENCES `gokart` (`gokart_id`),
  ADD CONSTRAINT `archiwum_szkola` FOREIGN KEY (`szkola_id`) REFERENCES `szkola` (`szkola_id`),
  ADD CONSTRAINT `archiwum_zawody` FOREIGN KEY (`zawody_id`) REFERENCES `zawody` (`zawody_id`);

--
-- Ograniczenia dla tabeli `szkola`
--
ALTER TABLE `szkola`
  ADD CONSTRAINT `szkola_miasto` FOREIGN KEY (`miasto_id`) REFERENCES `miasto` (`miasto_id`);

--
-- Ograniczenia dla tabeli `tm_przejazd`
--
ALTER TABLE `tm_przejazd`
  ADD CONSTRAINT `przejazd_gokart` FOREIGN KEY (`gokart_id`) REFERENCES `gokart` (`gokart_id`),
  ADD CONSTRAINT `przejazd_status` FOREIGN KEY (`status_przejazdu_id`) REFERENCES `status_przejazdu` (`status_przejazdu_id`),
  ADD CONSTRAINT `przejazd_zawodnik` FOREIGN KEY (`tm_zawodnik_id`) REFERENCES `tm_zawodnik` (`tm_zawodnik_id`);

--
-- Ograniczenia dla tabeli `tm_zawodnik`
--
ALTER TABLE `tm_zawodnik`
  ADD CONSTRAINT `zawodnik_szkola` FOREIGN KEY (`szkola_id`) REFERENCES `szkola` (`szkola_id`);

--
-- Ograniczenia dla tabeli `zawody`
--
ALTER TABLE `zawody`
  ADD CONSTRAINT `zawody_status` FOREIGN KEY (`status_zawodow_id`) REFERENCES `status_zawodow` (`status_zawodow_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
