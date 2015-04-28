-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Kwi 2015, 17:27
-- Wersja serwera: 5.6.20
-- Wersja PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `kwadratex`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kwadratex_kategorie`
--

CREATE TABLE IF NOT EXISTS `kwadratex_kategorie` (
`kategorie_id` int(8) NOT NULL,
  `kategorie_nazwa` varchar(50) DEFAULT NULL,
  `kategorie_plikGraficzny` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `kwadratex_kategorie`
--

INSERT INTO `kwadratex_kategorie` (`kategorie_id`, `kategorie_nazwa`, `kategorie_plikGraficzny`) VALUES
(1, 'Brak', '1.png'),
(2, 'Czapki', '2.png'),
(3, 'Włosy - Fikuśne', '3.png'),
(4, 'Spodnie', '4.png'),
(5, 'Kurtki', '5.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kwadratex_rzeczy`
--

CREATE TABLE IF NOT EXISTS `kwadratex_rzeczy` (
`rzeczy_id` int(8) NOT NULL,
  `rzeczy_kategoria_id` int(8) DEFAULT NULL,
  `rzeczy_nazwa` varchar(20) DEFAULT NULL,
  `rzeczy_opis` text,
  `rzeczy_plikGraficzny` text,
  `rzeczy_typy_id` int(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `kwadratex_rzeczy`
--

INSERT INTO `kwadratex_rzeczy` (`rzeczy_id`, `rzeczy_kategoria_id`, `rzeczy_nazwa`, `rzeczy_opis`, `rzeczy_plikGraficzny`, `rzeczy_typy_id`) VALUES
(1, 2, 'Kowbojka', '<p>Jest to pierwsza czapka testowa</p>', '1.png', 4),
(2, 3, 'Falowane', '<p>Pierwsze testowe włosy ;)</p>', '2.png', 5),
(3, 5, 'Szara Kurtka', '<p>To jest pierwsza testowa kurtka :D</p>', '3.png', 7),
(4, 4, 'Niebieskie Spodnie', '<p>To są pierwze spodnie ;)</p>', '4.png', 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kwadratex_typy`
--

CREATE TABLE IF NOT EXISTS `kwadratex_typy` (
`typy_id` int(11) NOT NULL,
  `typy_nazwa` varchar(50) DEFAULT NULL,
  `typy_funkcja_id` int(2) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Zrzut danych tabeli `kwadratex_typy`
--

INSERT INTO `kwadratex_typy` (`typy_id`, `typy_nazwa`, `typy_funkcja_id`) VALUES
(1, 'Jadalny', 1),
(2, 'Leczniczy', 2),
(3, 'Dekoracyjny', 3),
(4, 'Nakrycie głowy', 4),
(5, 'Włosy', 5),
(6, 'Akcesoria na oczy', 6),
(7, 'Część górna ubrania', 7),
(8, 'Część dolna ubrania', 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`news_id` int(8) NOT NULL,
  `news_tytul` varchar(50) DEFAULT NULL,
  `news_data` date DEFAULT NULL,
  `news_zawartosc` text,
  `news_stworzonyPrzez` int(8) DEFAULT NULL,
  `news_edytowanyPrzez` int(8) DEFAULT NULL,
  `news_plikGraficzny` text
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`news_id`, `news_tytul`, `news_data`, `news_zawartosc`, `news_stworzonyPrzez`, `news_edytowanyPrzez`, `news_plikGraficzny`) VALUES
(1, 'Start wersji alpha v 0.1!', '2015-04-08', '<p>Witajcie :) !</p>\r\n<p>&nbsp;</p>\r\n<p>Z dniem dzisiejszym chciałbym przekazać wam super wiadomość. Dzisiaj rusza pierwsza wersja alpha (v 0.1) gry KwadrateX.</p>\r\n<p>&nbsp;</p>\r\n<p>Wszystkich zapraszam do zakładania kont i szperania w Aplikacji :). Niedługo wyjdzie już wersja w kt&oacute;rej będziecie mogli załozyć swojego stworka ;).</p>', 1, 1, '1.jpg'),
(2, 'Nowy admin', '2015-04-09', '<p>Witajcie!</p>\r\n<p>Jestem waszym nowym adminem ;). Teraz ja też będę tutaj rządził.</p>\r\n<p>Jeśli macie jakieś pytania bądź problemy to kierujcie je do mnie.</p>\r\n<p>Trzymajcie się Kwadratowicze ;)!</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p style="text-align: right;"><strong>@Admin</strong></p>\r\n<p style="text-align: right;"><strong>Chcaiłem tylko potwierdzić informację podaną przez kolegę ;)</strong></p>', 2, 1, '2.jpg'),
(3, 'Aktualizacja strony', '2015-04-28', '<p>Witajcie :)!</p>\r\n<p>&nbsp;</p>\r\n<p>Dzisiaj została wprowadzone długo wyczekiwana zmiany na stronie ;). Od dzisiaj mamy stronę "startową", jak r&oacute;wnież strona "Newsy" została uzupełniona o paginację ;). Dzięki paginacji unikniemy takich sytuacji jakie są na niekt&oacute;rych portalach plotkarskich tj. 1k newsow na stronie ;)</p>\r\n<p>&nbsp;</p>\r\n<p>Pozdrawiam</p>\r\n<p>Admin</p>', 1, NULL, '3.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(255) NOT NULL,
  `user_name` varchar(40) DEFAULT NULL,
  `user_sec_name` varchar(40) DEFAULT NULL,
  `user_login` varchar(20) DEFAULT NULL,
  `user_pass` varchar(40) DEFAULT NULL,
  `user_email` varchar(20) DEFAULT NULL,
  `user_last_login` datetime DEFAULT NULL,
  `user_create_date` datetime DEFAULT NULL,
  `user_type` int(1) DEFAULT NULL,
  `user_premmy` int(1) DEFAULT NULL,
  `user_capatcha` varchar(7) DEFAULT NULL,
  `user_active` int(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_sec_name`, `user_login`, `user_pass`, `user_email`, `user_last_login`, `user_create_date`, `user_type`, `user_premmy`, `user_capatcha`, `user_active`) VALUES
(1, NULL, NULL, 'Admin', 'c19dca3c356230affb1c65a97e8e7020', 'polkasa@o2.pl', '2015-04-28 14:47:03', '2015-03-17 11:13:04', 3, 0, 'VPSUHCL', 1),
(2, NULL, NULL, 'Lugormod', 'c19dca3c356230affb1c65a97e8e7020', 'lugormod@o2.pl', '2015-04-10 10:51:16', '2015-03-17 11:31:19', 3, 0, 'DTVHFRD', 1),
(3, NULL, NULL, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@o2.pl', '2015-04-28 13:22:07', '2015-03-24 14:30:58', 1, 0, 'RBCOHQU', 1),
(4, NULL, NULL, 'test2', 'ad0234829205b9033196ba818f7a872b', 'test2@o2.pl', '2015-04-10 10:50:17', '2015-04-10 10:50:17', 1, 0, 'PGIIVEZ', 1),
(5, NULL, NULL, 'tes1', '5a105e8b9d40e1329780d62ea2265d8a', 'test1@o2.pl', '2015-04-28 13:25:31', '2015-04-28 13:25:31', 1, 0, 'gwgwfua', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kwadratex_kategorie`
--
ALTER TABLE `kwadratex_kategorie`
 ADD PRIMARY KEY (`kategorie_id`);

--
-- Indexes for table `kwadratex_rzeczy`
--
ALTER TABLE `kwadratex_rzeczy`
 ADD PRIMARY KEY (`rzeczy_id`);

--
-- Indexes for table `kwadratex_typy`
--
ALTER TABLE `kwadratex_typy`
 ADD PRIMARY KEY (`typy_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kwadratex_kategorie`
--
ALTER TABLE `kwadratex_kategorie`
MODIFY `kategorie_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `kwadratex_rzeczy`
--
ALTER TABLE `kwadratex_rzeczy`
MODIFY `rzeczy_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `kwadratex_typy`
--
ALTER TABLE `kwadratex_typy`
MODIFY `typy_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT dla tabeli `news`
--
ALTER TABLE `news`
MODIFY `news_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
