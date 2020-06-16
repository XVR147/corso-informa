-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 14, 2020 alle 22:00
-- Versione del server: 10.4.8-MariaDB
-- Versione PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `circolo_tennis`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ct_campi`
--

CREATE TABLE `ct_campi` (
  `id` int(11) NOT NULL,
  `nome_campo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `tipo_campo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `copertura` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ct_campi`
--

INSERT INTO `ct_campi` (`id`, `nome_campo`, `tipo_campo`, `copertura`) VALUES
(1, 'T1', 'terra', 0),
(2, 'T2', 'terra', 1),
(3, 'C1', 'cemento', 0),
(4, 'C2', 'cemento', 1),
(5, 'E1', 'erba', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `ct_prenotazioni`
--

CREATE TABLE `ct_prenotazioni` (
  `id` int(11) NOT NULL,
  `data_prenotazione` datetime NOT NULL,
  `id_campo_prenotato` int(11) NOT NULL,
  `id_socio_prenotazione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `ct_soci`
--

CREATE TABLE `ct_soci` (
  `id` int(11) NOT NULL,
  `nome` varchar(64) CHARACTER SET utf8 NOT NULL,
  `cognome` varchar(128) CHARACTER SET utf8 NOT NULL,
  `data_nascita` date NOT NULL,
  `codice_fiscale` varchar(50) CHARACTER SET utf8 NOT NULL,
  `stato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ct_soci`
--

INSERT INTO `ct_soci` (`id`, `nome`, `cognome`, `data_nascita`, `codice_fiscale`, `stato`) VALUES
(5, 'Domenico', 'Fiorese', '1984-10-02', 'FRSDNC84', 0),
(9, 'Filippo', 'Papagno', '1994-06-26', '1111111111111111', 0),
(10, 'Vincenzo', 'Gaeta', '1997-02-05', '2222222222222222', 0),
(12, 'Patrizia', 'Capotorto', '2001-10-10', '1111111111111111', 0),
(13, 'Daniele Luca Giovanni Marco Antonio ', 'Lucafò', '2001-10-10', '1111111111111111', 0),
(14, 'Zinco', 'Pallino', '2001-10-10', '1111111111111111', 0),
(15, 'cccccasashd', 'dlafàasàf', '1999-10-10', '1111111111111111', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `ct_tessera`
--

CREATE TABLE `ct_tessera` (
  `id` int(11) NOT NULL,
  `data_rilascio_tessera` date NOT NULL,
  `scadenza_tessera` date NOT NULL,
  `codice_tessera` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ct_campi`
--
ALTER TABLE `ct_campi`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `ct_prenotazioni`
--
ALTER TABLE `ct_prenotazioni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_campo` (`id_campo_prenotato`),
  ADD KEY `fk_soci` (`id_socio_prenotazione`);

--
-- Indici per le tabelle `ct_soci`
--
ALTER TABLE `ct_soci`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `ct_tessera`
--
ALTER TABLE `ct_tessera`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ct_campi`
--
ALTER TABLE `ct_campi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `ct_prenotazioni`
--
ALTER TABLE `ct_prenotazioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `ct_soci`
--
ALTER TABLE `ct_soci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `ct_tessera`
--
ALTER TABLE `ct_tessera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `ct_prenotazioni`
--
ALTER TABLE `ct_prenotazioni`
  ADD CONSTRAINT `fk_campo` FOREIGN KEY (`id_campo_prenotato`) REFERENCES `ct_campi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_soci` FOREIGN KEY (`id_socio_prenotazione`) REFERENCES `ct_soci` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
