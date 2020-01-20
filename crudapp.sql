-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Sty 2020, 20:28
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `crudapp`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `ID_CAT` int(5) NOT NULL,
  `CATEGORY` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`ID_CAT`, `CATEGORY`) VALUES
(10, 'Sales'),
(11, 'Finance'),
(12, 'Production'),
(13, 'Basis'),
(14, 'Materials'),
(15, 'Development');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(5) NOT NULL,
  `comment_ticket_id` int(5) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id_comment`, `comment_ticket_id`, `comment_author`, `comment_content`, `comment_date`) VALUES
(2, 20010, 'Ja', 'Ooddaj', '2020-01-20 19:18:23'),
(3, 20010, 'Navi', 'Otworz ten ticket', '2020-01-20 19:30:43'),
(4, 20010, 'Navi', 'Otworz ten ticket', '2020-01-20 19:30:56');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ticket`
--

CREATE TABLE `ticket` (
  `ID_TICKET` int(5) NOT NULL,
  `OPENED_BY` int(5) NOT NULL,
  `ASSIGNED_TO` int(5) NOT NULL,
  `CREATION_DATE` datetime NOT NULL,
  `UPDATE_DATE` datetime NOT NULL,
  `WORK_GROUP` int(5) NOT NULL,
  `TICKET_STATE` varchar(255) NOT NULL,
  `TICKET_PRIORITY` varchar(255) NOT NULL,
  `SHORT_DESC` text NOT NULL,
  `LONG_DESC` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ticket`
--

INSERT INTO `ticket` (`ID_TICKET`, `OPENED_BY`, `ASSIGNED_TO`, `CREATION_DATE`, `UPDATE_DATE`, `WORK_GROUP`, `TICKET_STATE`, `TICKET_PRIORITY`, `SHORT_DESC`, `LONG_DESC`) VALUES
(20010, 10000, 10001, '2020-01-20 04:16:42', '2020-01-20 04:16:42', 10, 'Opened', 'Medium', 'OK boomwe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in consequat ante. Maecenas viverra, velit vitae viverra viverra, enim est pretium augue, id tincidunt urna lacus in nunc. In hac habitasse platea dictumst. In eget efficitur lorem. Pellentesque id dapibus ante. Pellentesque laoreet ex et laoreet finibus. '),
(20011, 10001, 10000, '2020-01-20 04:17:28', '2020-01-20 04:17:28', 10, 'Opened', 'Low', 'AAAAAAAAAAAAAA', '        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in consequat ante. Maecenas vivLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in consequat ante. Maecenas viverra, velit vitae viverra viverra, enim est pretium augue, id tincidunt urna lacus in nunc. In hac habitasse platea dictumst. In eget efficitur lorem. Pellentesque id dapibus ante. Pellentesque laoreet ex et laoreet finibus. erra, velit vitae viverra viverra, enim est pretium augue, id tincidunt urna lacus in nunc. In hac habitasse platea dictumst. In eget efficitur lorem. Pellentesque id dapibus ante. Pellentesque laoreet ex et laoreet finibus. '),
(20017, 10000, 10001, '2020-01-20 20:10:52', '2020-01-20 20:10:52', 12, 'Opened', 'Urgent', 'Test1', 'Test2'),
(20020, 10006, 10006, '2020-01-20 20:19:45', '2020-01-20 20:19:45', 14, 'Closed', 'Urgent', 'Zamk', 'Zamk');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `ID_USER` int(5) NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `USER_TYPE` varchar(255) NOT NULL,
  `USER_PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`ID_USER`, `FIRST_NAME`, `EMAIL`, `USER_TYPE`, `USER_PASSWORD`) VALUES
(10000, 'Hoess Adder', 'hoess.adder@gmail.com', 'Admin', '10000'),
(10001, 'Adolar Małamysz', 'mariusz@gmail.com', 'Admin', '10001'),
(10003, 'Sven Hannawad', 'sven.hannavald@gmail.com', 'Admin', '10003'),
(10004, 'Sven Hannawad2', 'sven.hannavald@gmail.com', 'Admin', '10004'),
(10005, 'Dorota Weltmeinsters', 'weltmeister@gmail.com', 'Admin', '10005'),
(10006, 'Dawaj Pawel', 'dawajpawel@gmail.com', 'Admin', '10006');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID_CAT`) USING BTREE;

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `comment_ticket_id` (`comment_ticket_id`);

--
-- Indeksy dla tabeli `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ID_TICKET`),
  ADD KEY `WORK_GROUP` (`WORK_GROUP`),
  ADD KEY `ticket_ibfk_6` (`OPENED_BY`),
  ADD KEY `ticket_ibfk_7` (`ASSIGNED_TO`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `ID_CAT` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ID_TICKET` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20022;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10007;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_ticket_id`) REFERENCES `ticket` (`ID_TICKET`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_6` FOREIGN KEY (`OPENED_BY`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `ticket_ibfk_7` FOREIGN KEY (`ASSIGNED_TO`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `ticket_ibfk_8` FOREIGN KEY (`WORK_GROUP`) REFERENCES `categories` (`ID_CAT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
