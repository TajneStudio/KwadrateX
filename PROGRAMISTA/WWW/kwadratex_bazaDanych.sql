-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Cze 2015, 09:11
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
-- Struktura tabeli dla tabeli `kwadratex_ekwipunek`
--

CREATE TABLE IF NOT EXISTS `kwadratex_ekwipunek` (
`ekwipunek_id` int(8) NOT NULL,
  `ekwipunek_stworek_id` int(8) DEFAULT NULL,
  `ekwipunek_kolejnosc` int(8) DEFAULT NULL,
  `ekwipunek_rzeczy_id` int(8) DEFAULT NULL,
  `kwadratex_ekwipunek_zalozony` int(8) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Zrzut danych tabeli `kwadratex_ekwipunek`
--

INSERT INTO `kwadratex_ekwipunek` (`ekwipunek_id`, `ekwipunek_stworek_id`, `ekwipunek_kolejnosc`, `ekwipunek_rzeczy_id`, `kwadratex_ekwipunek_zalozony`) VALUES
(1, 1, 0, 1, 1),
(2, 1, 1, 2, 1),
(3, 1, 2, 7, NULL),
(4, 1, 3, 5, NULL),
(5, 1, 4, 3, 1),
(6, 1, 5, 4, 1),
(7, 1, 6, 6, NULL),
(8, 6, 0, 1, NULL),
(9, 6, 1, 3, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kwadratex_kategorie`
--

CREATE TABLE IF NOT EXISTS `kwadratex_kategorie` (
`kategorie_id` int(8) NOT NULL,
  `kategorie_nazwa` varchar(50) DEFAULT NULL,
  `kategorie_plikGraficzny` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `kwadratex_kategorie`
--

INSERT INTO `kwadratex_kategorie` (`kategorie_id`, `kategorie_nazwa`, `kategorie_plikGraficzny`) VALUES
(1, 'Brak', '1.png'),
(2, 'Czapki', '2.png'),
(3, 'Włosy - Fikuśne', '3.png'),
(4, 'Spodnie', '4.png'),
(5, 'Kurtki', '5.png'),
(6, 'Tapety', '6.png'),
(7, 'Okulary', '7.png');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `kwadratex_rzeczy`
--

INSERT INTO `kwadratex_rzeczy` (`rzeczy_id`, `rzeczy_kategoria_id`, `rzeczy_nazwa`, `rzeczy_opis`, `rzeczy_plikGraficzny`, `rzeczy_typy_id`) VALUES
(1, 2, 'Kowbojka', '<p>Jest to pierwsza czapka testowa</p>', '1.png', 4),
(2, 3, 'Falowane', '<p>Pierwsze testowe włosy ;)</p>', '2.png', 5),
(3, 5, 'Szara Kurtka', '<p>To jest pierwsza testowa kurtka :D</p>', '3.png', 7),
(4, 4, 'Niebieskie Spodnie', '<p>To są pierwze spodnie ;)</p>', '4.png', 8),
(5, 6, 'Kratka - niebieska', '<p>Tapeta w kratkę, kolor niebieski</p>', '5.png', 3),
(6, 4, 'Okulary - żółte', '', '6.png', 6),
(7, 3, 'Profesorowate', '', '7.png', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kwadratex_stworki`
--

CREATE TABLE IF NOT EXISTS `kwadratex_stworki` (
`stworek_id` int(8) NOT NULL,
  `stworek_user_id` int(8) DEFAULT NULL,
  `stworek_imie` varchar(13) DEFAULT 'BEZIMIENNY',
  `stworek_pozycja_x` float DEFAULT NULL,
  `stworek_pozycja_y` float DEFAULT NULL,
  `stworek_create_date` datetime DEFAULT NULL,
  `stworek_last_save` datetime DEFAULT NULL,
  `stworek_cialo_kolor` varchar(7) DEFAULT NULL,
  `stworek_obramowanie_kolor` varchar(7) DEFAULT NULL,
  `stworek_oko_kolor` varchar(7) DEFAULT NULL,
  `stworek_teczowka_kolor` varchar(7) DEFAULT NULL,
  `stworek_nos_kolor` varchar(7) DEFAULT NULL,
  `stworek_usta_kolor` varchar(7) DEFAULT NULL,
  `stworek_predkosc` float DEFAULT NULL,
  `stworek_predkosc_oczy` float DEFAULT NULL,
  `stworek_czapka_ekwipunek_id` int(8) DEFAULT NULL,
  `stworek_wlosy_ekwipunek_id` int(8) DEFAULT NULL,
  `stworek_oczy_ekwipunek_id` int(8) DEFAULT NULL,
  `stworek_gora_ekwipunek_id` int(8) DEFAULT NULL,
  `stworek_dol_ekwipunek_id` int(8) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `kwadratex_stworki`
--

INSERT INTO `kwadratex_stworki` (`stworek_id`, `stworek_user_id`, `stworek_imie`, `stworek_pozycja_x`, `stworek_pozycja_y`, `stworek_create_date`, `stworek_last_save`, `stworek_cialo_kolor`, `stworek_obramowanie_kolor`, `stworek_oko_kolor`, `stworek_teczowka_kolor`, `stworek_nos_kolor`, `stworek_usta_kolor`, `stworek_predkosc`, `stworek_predkosc_oczy`, `stworek_czapka_ekwipunek_id`, `stworek_wlosy_ekwipunek_id`, `stworek_oczy_ekwipunek_id`, `stworek_gora_ekwipunek_id`, `stworek_dol_ekwipunek_id`) VALUES
(1, 1, 'KWADRATEX', 325, 355, '2015-04-29 15:39:41', '2015-05-27 10:08:57', '#AAAAAA', '#000000', '#EDF7F7', '#122B07', '#000000', '#000000', 2.5, 0.3, 1, 2, NULL, 5, 6),
(4, 3, 'BEZIMIENNY', 50, 50, '2015-04-29 15:52:19', NULL, '#c7c4d0', '#c3da91', '#9eecd5', '#046372', '#c10b14', '#eef896', 2.5, 0.3, NULL, NULL, NULL, NULL, NULL),
(5, 2, 'BEZIMIENNY', 400, 400, '2015-05-07 18:01:29', NULL, '#287260', '#8e3e51', '#33083d', '#fc5985', '#9282ef', '#e24804', 2.5, 0.3, NULL, NULL, NULL, NULL, NULL),
(6, 6, 'ROBOT', 400, 165, '2015-05-20 15:14:42', '2015-05-20 15:19:00', '#557870', '#ac3c65', '#179d56', '#219f86', '#da8cfa', '#eb0a43', 2.5, 0.3, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_sec_name`, `user_login`, `user_pass`, `user_email`, `user_last_login`, `user_create_date`, `user_type`, `user_premmy`, `user_capatcha`, `user_active`) VALUES
(1, NULL, NULL, 'Admin', 'c19dca3c356230affb1c65a97e8e7020', 'polkasa@o2.pl', '2015-05-27 15:01:05', '2015-03-17 11:13:04', 3, 0, 'VPSUHCL', 1),
(2, NULL, NULL, 'Lugormod', 'c19dca3c356230affb1c65a97e8e7020', 'lugormod@o2.pl', '2015-05-07 18:01:07', '2015-03-17 11:31:19', 3, 0, 'DTVHFRD', 1),
(3, NULL, NULL, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@o2.pl', '2015-04-29 15:51:21', '2015-03-24 14:30:58', 1, 0, 'RBCOHQU', 1),
(4, NULL, NULL, 'test2', 'ad0234829205b9033196ba818f7a872b', 'test2@o2.pl', '2015-04-10 10:50:17', '2015-04-10 10:50:17', 1, 0, 'PGIIVEZ', 1),
(5, NULL, NULL, 'tes1', '5a105e8b9d40e1329780d62ea2265d8a', 'test1@o2.pl', '2015-04-28 13:25:31', '2015-04-28 13:25:31', 1, 0, 'gwgwfua', 1),
(6, NULL, NULL, 'test3', '8ad8757baa8564dc136c1e07507f4a98', 'test3@o2.pl', '2015-05-20 15:18:39', '2015-05-20 15:14:40', 1, 0, 'FAJMWRG', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kwadratex_ekwipunek`
--
ALTER TABLE `kwadratex_ekwipunek`
 ADD PRIMARY KEY (`ekwipunek_id`);

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
-- Indexes for table `kwadratex_stworki`
--
ALTER TABLE `kwadratex_stworki`
 ADD PRIMARY KEY (`stworek_id`);

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
-- AUTO_INCREMENT dla tabeli `kwadratex_ekwipunek`
--
ALTER TABLE `kwadratex_ekwipunek`
MODIFY `ekwipunek_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT dla tabeli `kwadratex_kategorie`
--
ALTER TABLE `kwadratex_kategorie`
MODIFY `kategorie_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT dla tabeli `kwadratex_rzeczy`
--
ALTER TABLE `kwadratex_rzeczy`
MODIFY `rzeczy_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT dla tabeli `kwadratex_stworki`
--
ALTER TABLE `kwadratex_stworki`
MODIFY `stworek_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
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
MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
