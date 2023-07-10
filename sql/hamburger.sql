-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 25, 2021 alle 21:29
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamburger`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `name_burger`
--

CREATE TABLE `name_burger` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `ingredients` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `name_burger`
--

INSERT INTO `name_burger` (`id`, `name`, `ingredients`) VALUES
(7, 'carmine', 'tomato,bacon,meat,cheddar'),
(8, 'Prova', 'salad,meat,pickle,bacon'),
(12, 'antonio', 'salad, meat, pickle, ketchup'),
(12, 'giuseppe', 'salad, grilled peppers, tomato, pickle sauce'),
(12, 'mimmo', 'salad, onion, pineapple, egg');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(16) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `age` date NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `age`, `email`, `username`, `password`) VALUES
(1, 'Mario', 'Rossi', '1987-12-10', 'maiorossi@gmail.com', 'mariorossi', '2bf65275cb7f5dc95febd7d46cd7d0af'),
(2, 'Dante', 'Alighieri', '1265-05-22', 'dante@gmail.com', 'dante', '9077c3585038a90e34afe97a02bf4355'),
(3, 'Otto', 'Kuasw', '1857-05-11', 'ottokuasw@gmail.com', 'ottokuasw', '7aa99f13e44dd25f7de294bc71abe4ff'),
(5, 'damien', 'rice', '2222-02-22', 'damien@rice.com', 'daminerice', 'f3bdc5a3844813fb1d5e4b15fbfa6dbb'),
(7, 'carmine', 'de palma', '1960-04-30', 'emy.car@virgilio.it', 'pippo', '712b7448ea3de70189aff5441d9e6ff4'),
(8, 'Fabio', 'De Palma', '1995-11-26', 'fabio.depalma95@gmail.com', 'Frost', 'a4ef405a1fdc163412df52baa59368da'),
(12, 'admin', 'admin', '1995-11-26', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(13, 'Antonio', 'Ricci', '1960-07-02', 'stricialanotizia@mediaset.it', 'antonioricci', 'ad7a76c41b183bdc2ecfc977e84d27d3');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
