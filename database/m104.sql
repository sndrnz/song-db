-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 29. Jun 2021 um 14:54
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `m104`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artist`
--

CREATE TABLE `artist` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `youtube` varchar(256) DEFAULT NULL,
  `soundcloud` varchar(256) DEFAULT NULL,
  `spotify` varchar(256) DEFAULT NULL,
  `apple` varchar(256) DEFAULT NULL,
  `website` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `artist`
--

INSERT INTO `artist` (`id`, `user_id`, `name`, `description`, `youtube`, `soundcloud`, `spotify`, `apple`, `website`) VALUES
(1, 1, 'Alan Walker', 'Alan Olav Walker (* 24. August 1997 in Northampton, Northamptonshire, England[1]) ist ein britisch-norwegischer EDM-DJ und Musikproduzent, der Ende 2015 durch die Single Faded bekannt wurde und auch unter dem Pseudonym DJ Walkzz produziert.[2] Seit 2016 ist er neben seinen Tätigkeiten im Studio ebenfalls als DJ tätig und startete im selben Jahr seine erste Welttournee.', 'https://www.youtube.com/channel/UCJrOtniJ0-NWz37R30urifQ', 'https://soundcloud.com/alanwalker', 'https://open.spotify.com/artist/7vk5e3vY1uw9plTHJAMwjN?si=IUE3ohEKRWKChxUlutngEQ&dl_branch=1', 'https://music.apple.com/de/artist/alan-walker/1062085272', 'https://alanwalker.com/'),
(2, 1, 'Avicii', 'Avicii (* 8. September 1989 als Tim Bergling in Stockholm; † 20. April 2018 in Maskat, Oman) war ein schwedischer DJ, Remixer und Musikproduzent im Bereich der elektronischen Tanzmusik. Er feierte im Jahr 2011 mit dem Lied Levels seinen weltweiten Durchbruch. Im Jahr 2013 veröffentlichte er sein erstes Studioalbum True, dessen erste Single-Auskopplung Wake Me Up in über 20 Ländern auf Platz eins der Single-Charts vorrückte. 2015 folgte sein zweites Album Stories mit dem Lied Waiting for Love, das in über fünf Ländern Platz eins erreichte. 2017 erschien die EP Avīci (01) mit Without You als Lead-Single. Tim Bergling wurde 2012 für seine Arbeit an dem Lied Sunshine mit David Guetta sowie 2013 für den Song Levels für einen Grammy nominiert.', 'https://www.youtube.com/channel/UCPHjpfnnGklkRBBTd0k6aHg', 'https://soundcloud.com/aviciiofficial', 'https://open.spotify.com/artist/1vCWHaC5f2uS3yhpwWbIA6?si=FeE-63t0QNmceYEkfKM3SA&dl_branch=1', 'https://music.apple.com/de/artist/avicii/298496035', 'https://avicii.com/'),
(3, 1, 'David Guetta', 'Pierre David Guetta [ˌdeɪvɪt ˈgɛ̝tɐ] (* 7. November 1967 in Paris[1] [ˌpjɛːʁ daˌviːd gɛˈta]) ist ein französischer DJ und Musikproduzent. Er begann mit House-Musik und wechselte nach seinem Durchbruch 2009 zu Dance- und Electro-Pop. Später entwickelte sich sein Stil in Richtung Traps, Future-Bass und Electro-House.', 'https://www.youtube.com/channel/UC1l7wYrva1qCH-wgqcHaaRg', 'https://soundcloud.com/davidguetta', 'https://open.spotify.com/artist/1Cs0zKBU1kc0i8ypK3B9ai?si=CvcCKtQeQn-HTtnN4Lp1Rw&dl_branch=1', 'https://music.apple.com/de/artist/david-guetta/5557599', 'https://davidguetta.com/'),
(4, 1, 'VIZE', 'Vize (stilisiert VIZE, auch Vize Music) ist ein deutsches Musikprojekt. Bekanntheit erlangte es 2018 durch die Single Glad You Came.', 'https://www.youtube.com/channel/UCy0ARzXdyS8EcZ00xSsgluw', 'https://soundcloud.com/vize-music', 'https://open.spotify.com/artist/09agIJMxCD2k87ys9Al0f0?si=KX_ujmuGRhyq0QzVIMRJhQ&dl_branch=1', 'https://music.apple.com/de/artist/vize/1418628326', 'http://www.vize-music.com/'),
(5, 1, 'Imanbek', 'Imanbek Seikenow (kasachisch Иманбек Зейкенов; * 21. Oktober 2000 in Aqsu) ist ein kasachischer DJ und Musikproduzent, der vor allem unter seinem Vornamen bekannt ist.', 'https://www.youtube.com/channel/UCBu_VutYjA-gq4rdr9QQMEQ', '', 'https://open.spotify.com/artist/5rGrDvrLOV2VV8SCFVGWlj?si=ltMNRxbKQq2XkIidd-JO4g&dl_branch=1', 'https://music.apple.com/de/artist/imanbek/1478512031', 'https://imanbekmusic.com/'),
(6, 2, 'K-391', 'Kenneth Oseberg Nilsen (* 2. November 1994), besser bekannt unter dem Pseudonym K-391, ist ein norwegischer DJ und Musikproduzent. Im Jahr 2018 feierte er mit der Single Ignite großen Erfolg und erreichte in Norwegen den Platz eins der Charts.[1]', 'https://www.youtube.com/channel/UC1XoTfl_ctHKoEbe64yUC_g', 'https://soundcloud.com/k-391', 'https://open.spotify.com/artist/6pWcSL9wSJZQ9ne0TnhdWr?si=ttDR-L-WSFeXW_7pGZRDlw&dl_branch=1', 'https://music.apple.com/ca/artist/k-391/519186020', 'https://k391.no/');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `song_id` bigint(20) NOT NULL,
  `content` varchar(2048) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `genre`
--

CREATE TABLE `genre` (
  `id` bigint(20) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'House'),
(2, 'Trap'),
(3, 'Pop'),
(4, 'Dubstep'),
(5, 'Electro'),
(6, 'Techno'),
(7, 'Rock'),
(8, 'Hip Hop');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `genre_to_song`
--

CREATE TABLE `genre_to_song` (
  `genre_id` bigint(20) NOT NULL,
  `song_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `genre_to_song`
--

INSERT INTO `genre_to_song` (`genre_id`, `song_id`) VALUES
(1, 1),
(5, 1),
(1, 2),
(5, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `song`
--

CREATE TABLE `song` (
  `id` bigint(20) NOT NULL,
  `artist_id` bigint(20) NOT NULL,
  `name` varchar(64) NOT NULL,
  `date` date NOT NULL,
  `song_bpm` int(11) NOT NULL,
  `song_key` varchar(16) NOT NULL,
  `lyrics` text DEFAULT NULL,
  `youtube` varchar(256) DEFAULT NULL,
  `soundcloud` varchar(256) DEFAULT NULL,
  `spotify` varchar(256) DEFAULT NULL,
  `apple` varchar(256) DEFAULT NULL,
  `website` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `song`
--

INSERT INTO `song` (`id`, `artist_id`, `name`, `date`, `song_bpm`, `song_key`, `lyrics`, `youtube`, `soundcloud`, `spotify`, `apple`, `website`) VALUES
(1, 1, 'Faded', '2015-11-25', 90, 'D#m', 'You were the shadow to my light\r\nDid you feel us\r\nAnother start\r\nYou fade away\r\nAfraid our aim is out of sight\r\nWanna see us\r\nAlive\r\nWhere are you now\r\nWhere are you now\r\nWhere are you now\r\nWas it all in my fantasy\r\nWhere are you now\r\nWere you only imaginary\r\nWhere are you now\r\nAtlantis\r\nUnder the sea\r\nUnder the sea\r\nWhere are you now\r\nAnother dream\r\nThe monsters running wild inside of me\r\nI%a%m faded\r\nI%a%m faded\r\nSo lost\r\nI%a%m faded\r\nThese shallow waters, never met\r\nWhat I needed\r\nI%a%m letting go\r\nA deeper dive\r\nEternal silence of the sea\r\nI%a%m breathing\r\nAlive\r\nWhere are you now\r\nWhere are you now\r\nUnder the bright\r\nBut faded lights\r\nYou set my heart on fire\r\nWhere are you now\r\nWhere are you now\r\nWhere are you now\r\nWhere are you now\r\nWhere are you now\r\nAtlantis\r\nUnder the sea\r\nUnder the sea\r\nWhere are you now\r\nAnother dream\r\nThe monsters running wild inside of me\r\nI%a%m faded\r\nI%a%m faded\r\nSo lost\r\nI%a%m faded', 'https://youtu.be/60ItHLz5WEA', 'https://soundcloud.com/alanwalker/faded-1', 'https://open.spotify.com/track/698ItKASDavgwZ3WjaWjtz?si=9be0e228b7964aec', 'https://music.apple.com/ca/album/faded/1065564400?i=1065564556', ''),
(2, 1, 'The Spectre', '2017-09-15', 128, 'E', 'Hello, hello\r\nCan you hear me\r\nAs I scream your name?\r\nHello, hello\r\nDo you need me\r\nBefore I fade away?\r\nIs this a place that I call home?\r\nTo find what I%a%ve become\r\nWalk along the path unknown\r\nWe live, we love, we lie\r\nDeep in the dark, I don%a%t need the light\r\nThere%a%s a ghost inside me\r\nIt all belongs to the other side\r\nWe live, we love, we lie\r\n(We live, we love, we lie)\r\nHello, hello\r\nNice to meet you\r\nVoice inside my head\r\nHello, hello\r\nI believe you\r\nHow can I forget?\r\nIs this a place that I call home?\r\nTo find what I%a%ve become\r\nWalk along the path unknown\r\nWe live, we love, we lie\r\nDeep in the dark, I don%a%t need the light\r\nThere%a%s a ghost inside me\r\nIt all belongs to the other side\r\nWe live, we love, we lie\r\n(We live, we love, we lie)\r\nWe live, we love, we lie', 'https://youtu.be/wJnBTPUQS5A', 'https://soundcloud.com/alanwalker/the-spectre', 'https://open.spotify.com/track/2DGa7iaidT5s0qnINlwMjJ?si=18219f1bd84a4322', 'https://music.apple.com/ca/album/the-spectre/1277697257?i=1277697262', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`) VALUES
(1, 'admin@mail.com', 'Admin', '3f2cd8e57b096fe7e4a78a5627e34ca3f885ad65a56e61c287cf4211bbc5949f'),
(2, 'test@mail.com', 'Test', '3f2cd8e57b096fe7e4a78a5627e34ca3f885ad65a56e61c287cf4211bbc5949f');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `artist`
--
ALTER TABLE `artist`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `genre`
--
ALTER TABLE `genre`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `song`
--
ALTER TABLE `song`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
