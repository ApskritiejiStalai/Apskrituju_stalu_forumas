-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2020 m. Geg 20 d. 19:24
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forumas`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `admin_login`
--

CREATE TABLE `admin_login` (
  `Admin_id` varchar(255) NOT NULL,
  `Vardas` varchar(255) DEFAULT NULL,
  `Pavarde` varchar(255) DEFAULT NULL,
  `Slapyvardis` varchar(255) DEFAULT NULL,
  `Slaptazodis` varchar(255) DEFAULT NULL,
  `Elektroninis_Pastas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `admin_login`
--

INSERT INTO `admin_login` (`Admin_id`, `Vardas`, `Pavarde`, `Slapyvardis`, `Slaptazodis`, `Elektroninis_Pastas`) VALUES
('1', 'Simas', 'Andziulis', 'simand1', 'testas123', 'simand1@ktu.lt'),
('2', 'Greta', 'Grunskyte', 'gregru', 'testas123', 'gregru@ktu.lt'),
('3', 'Mantas', 'Danauskas', 'mandan', 'testas123', 'mandan@ktu.lt'),
('4', 'Monika', 'Maliaukaite', 'monmal', 'testas123', 'monmal@ktu.lt');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `komentarai`
--

CREATE TABLE `komentarai` (
  `id` int(255) NOT NULL,
  `Komentaras` varchar(255) DEFAULT NULL,
  `Upvote` int(11) DEFAULT NULL,
  `Perziureta` tinyint(1) DEFAULT NULL,
  `Data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `komentarai`
--

INSERT INTO `komentarai` (`id`, `Komentaras`, `Upvote`, `Perziureta`, `Data`) VALUES
(1268, 'Samas yra fainiausias studentas -simruo', 4, 1, '2020-05-20 17:17:41'),
(1269, 'ketvirtas - tomgir\r\n', 0, 1, '2020-05-20 17:18:20'),
(1270, 'penktas <3 daldel\r\n', 0, 1, '2020-05-20 17:19:00'),
(1271, 'egis bieliauskaite sestas', 0, 1, '2020-05-20 17:19:40'),
(1272, 'arnrad septinas kometarcikas', 0, 0, '2020-05-20 17:21:26'),
(1273, 'KOMENTARAS arnrad', 0, 1, '2020-05-20 17:26:57'),
(1274, 'dontru komentaaariuxss', 1, 1, '2020-05-20 17:28:24'),
(1275, 'gusger xiukas', 2, 1, '2020-05-20 17:29:58'),
(1276, 'Vacius Usas blogas destytojas - gusger', 1, 1, '2020-05-20 17:30:41'),
(1277, 'Jusas? More like Usas', 3, 1, '2020-05-20 17:31:11'),
(1278, 'Cia buvo smagu, pabraizai ir gyveni toliau - gusger', 3, 1, '2020-05-20 17:31:29'),
(1279, 'atejau, nugalejau, isejau - gusger', 1, 1, '2020-05-20 17:31:47'),
(1280, 'Bagdono koza puiki - arnbel', 1, 1, '2020-05-20 17:32:46'),
(1281, 'Destyojai faini - arnbel', 0, 1, '2020-05-20 17:33:16'),
(1282, 'f', 0, 1, '2020-05-20 17:33:34'),
(1283, 'Vacius? More like Nacius', 0, 1, '2020-05-20 17:33:52'),
(1284, 'AutoCad? More like Easy modulis - tomgir', 0, 1, '2020-05-20 17:34:24'),
(1285, 'Ivadas i gyvenima ', 1, 1, '2020-05-20 17:35:35'),
(1286, 'Simas yra fainiausias studentas -simru', 4, 1, '2020-05-20 17:36:07'),
(1287, 'Jūsų komentaras aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 0, 1, '2020-05-20 17:37:04'),
(1288, 'Vacius Jusas? LabIaUu kAIp Jacius Vusas xdddddddddd', 0, 1, '2020-05-20 17:40:14'),
(1289, 'simruo', 0, 1, '2020-05-20 17:41:09'),
(1290, 'Komentuoju', 0, 0, '2020-05-20 20:17:14');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `loginai`
--

CREATE TABLE `loginai` (
  `ip_adresas` varchar(255) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Tinklapio_adresas` varchar(255) DEFAULT NULL,
  `Jungimosi_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `moduliai`
--

CREATE TABLE `moduliai` (
  `Kodas` varchar(255) NOT NULL,
  `Pavadinimas` varchar(255) DEFAULT NULL,
  `Semestras` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `moduliai`
--

INSERT INTO `moduliai` (`Kodas`, `Pavadinimas`, `Semestras`) VALUES
('H120B111', 'Medijų filosofija', 2),
('H320B143', 'Garso technologijos', 5),
('H570B104', 'Akademinė ir dalykinės srities komunikacija anglų kalba (C1 lygiu)', 3),
('H592B102', 'Žiniasklaidos technologijų specialybės kalba', 7),
('P130B001', 'Matematika 1', 1),
('P130B002', 'Matematika 2', 2),
('P160B003', 'Tikimybių teorija ir statistika', 3),
('P160B116', 'Optimizavimo metodai', 6),
('P170B008', 'Diskrečiosios struktūros', 3),
('P170B103', 'Duomenų saugyklos ir verslo duomenų analizė', 5),
('P170B112', 'Verslo valdymo sistemos', 5),
('P170B113', 'Veiklos procesų skaitmeninimas', 6),
('P170B114', 'Informacinių sistemų pagrindai', 5),
('P170B115', 'Skaitiniai metodai ir algoritmai', 5),
('P170B118', 'Fizikine elgsena grįstos animacijos', 7),
('P170B126', 'Informacinių sistemų grafinė naudotojo sąsaja', 5),
('P170B328', 'Lygiagretusis programavimas', 5),
('P170B400', 'Algoritmų sudarymas ir analizė', 4),
('P175B014', 'Duomenų struktūros', 3),
('P175B015', 'Programų sistemų inžinerija', 4),
('P175B100', 'Skaitmeninės logikos pradmenys', 1),
('P175B117', 'Objektinio programavimo pagrindai 1', 1),
('P175B118', 'Objektinis programavimas 1', 1),
('P175B120', 'Paslaugų programavimas debesų kompiuterijoje', 6),
('P175B121', 'Informacinių sistemų projektų valdymas ir diegimas', 4),
('P175B122', 'Įmonių veiklos procesų valdymas ir modernizavimas', 6),
('P175B123', 'Objektinis programavimas 2', 2),
('P175B125', 'Kompiuterių architektūra', 3),
('P175B126', 'Duomenų struktūrų pagrindai', 3),
('P175B129', 'Išskirstytosios duomenų bazės', 7),
('P175B130', 'Informacinių sistemų auditas ir vertinimas', 7),
('P175B162', 'Grafikos programavimas', 6),
('P175B163', 'Sistemų imitacinis modeliavimas', 4),
('P175B167', 'Vizualaus projektavimo principai', 5),
('P175B304', 'Operacinės sistemos', 4),
('P175B314', 'Programavimo inžinerija', 4),
('P175B505', 'Kompiuterinė grafika', 1),
('P175B602', 'Duomenų bazės', 4),
('P176B101', 'Intelektikos pagrindai', 6),
('P190B101', 'Fizika 1', 2),
('P200B104', 'Fizika 3', 5),
('PR00B121', 'Semestro projektas', 4),
('S122B100', 'Žiniasklaidos etika ir teisė', 5),
('S180B103', 'Inžinerinė ekonomika', 7),
('S183B001', 'Darnus vystymasis', 2),
('S210B003', 'Darni socialinė raida', 7),
('S265B105', 'Radijo, televizijos ir interneto žurnalistika', 7),
('S265B106', 'Televizijos laidų gamyba', 7),
('T111B010', 'Vaizdo sintaksė', 6),
('T120B015', 'Kompiuterinių sistemų inžinerija', 5),
('T120B019', 'Žmogaus-kompiuterio sąsajos projektavimas', 7),
('T120B029', 'Programų sistemų analizės ir projektavimo įrankiai', 6),
('T120B106', 'Skaitmeninės garso ir vaizdo sistemos', 7),
('T120B111', 'Realaus laiko sistemos', 7),
('T120B112', 'Trimatės grafikos modeliavimas pažengusiems', 6),
('T120B120', 'Kibernetinis saugumas', 6),
('T120B126', 'Sistemų projektavimas Framework aplinkose', 5),
('T120B129', 'Informacinių technologijų sauga', 5),
('T120B132', 'Skaitmeniniai signalai ir grandynai', 5),
('T120B135', 'Daiktų interneto įrenginiai ir technologijos', 7),
('T120B139', 'Aplinkos kompiuterizacija ir protingos sistemos', 7),
('T120B143', 'Įmonių kompiuterinių sistemų kūrimo platformos', 5),
('T120B145', 'Kompiuterių tinklai ir internetinės technologijos', 5),
('T120B146', 'Įterptinių sistemų analizė ir projektavimas', 6),
('T120B147', 'Duomenų bazių programavimas ir administravimas', 6),
('T120B148', 'Informacinių sistemų projektavimas ir CASE technologijos', 7),
('T120B149', 'Reikalavimų informacinėms sistemoms analizė ir specifikavimas', 6),
('T120B161', 'Turinio apdorojimo sistemos', 6),
('T120B162', 'Programų sistemų testavimas', 7),
('T120B165', 'Saityno taikomųjų programų projektavimas', 5),
('T120B166', 'Žaidimų kūrimo pagrindai', 6),
('T120B167', 'Žaidimų efektų programavimo pagrindai', 7),
('T120B168', 'Interaktyvios interneto technologijos', 7),
('T120B169', 'Mobilių programėlių kūrimo pagrindai', 6),
('T120B171', 'Multimedijos sistemų projektavimas', 5),
('T120B172', 'Sistemų integracijos technologijos', 7),
('T120B173', 'Daugiaagenčių sistemų pagrindai', 6),
('T120B174', 'Sistemų administravimas ir techninis palaikymas', 7),
('T120B178', 'Informacinių sistemų kūrimas karkasais', 7),
('T120B179', 'Paslaugų architektūra grindžiamos informacinės sistemos', 7),
('T120B180', 'Tinklo paslaugų kūrimas ir diegimas', 7),
('T120B181', 'Kompiuterių tinklų ir interneto sauga', 7),
('T120B188', 'Debesų technologijų saugyklos', 6),
('T120B190', 'Trimatės grafikos modeliavimo pagrindai', 5),
('T120B192', 'Mobiliosios internetinės sistemos', 7),
('T120B194', 'Scenarijų kalbos', 7),
('T120B195', 'Informacinių technologijų produkto vystymo projektas', 6),
('T120B196', 'Informatikos studijų įvadas', 1),
('T120B197', 'Informacinių sistemų programų derinimas', 7),
('T120B516', 'Objektinis programų projektavimas', 7),
('T125B158', 'Robotų programavimo technologijos', 7),
('T150B016', 'Medžiagų mokslo įvadas', 7);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `modulio_komentaras`
--

CREATE TABLE `modulio_komentaras` (
  `Modulio_id` varchar(255) NOT NULL,
  `Komentaro_id` int(11) NOT NULL,
  `Studento_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `modulio_komentaras`
--

INSERT INTO `modulio_komentaras` (`Modulio_id`, `Komentaro_id`, `Studento_id`) VALUES
('P175B100', 1274, 'C0000'),
('P130B001', 1290, 'C0000'),
('P175B100', 1275, 'C1111'),
('P175B117', 1276, 'C1111'),
('P175B118', 1277, 'C1111'),
('P175B505', 1278, 'C1111'),
('T120B196', 1279, 'C1111'),
('P130B001', 1268, 'C2222'),
('P175B100', 1280, 'C2222'),
('P175B117', 1281, 'C2222'),
('P130B001', 1269, 'C3333'),
('P175B100', 1282, 'C3333'),
('P175B118', 1283, 'C3333'),
('P175B505', 1284, 'C3333'),
('T120B196', 1285, 'C3333'),
('P130B001', 1270, 'C4444'),
('P130B001', 1271, 'C5555'),
('P130B001', 1272, 'C6666'),
('P175B100', 1273, 'C6666'),
('P130B001', 1286, 'C7777'),
('P175B100', 1287, 'C7777'),
('P175B118', 1288, 'C7777'),
('P175B505', 1289, 'C7777');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `student_login`
--

CREATE TABLE `student_login` (
  `Vidkodas` varchar(255) NOT NULL,
  `Vardas` varchar(255) DEFAULT NULL,
  `Pavarde` varchar(255) DEFAULT NULL,
  `Slapyvardis` varchar(255) DEFAULT NULL,
  `Slaptazodis` varchar(255) DEFAULT NULL,
  `Elektroninis_pastas` varchar(255) DEFAULT NULL,
  `Komentaru_kiekis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `student_login`
--

INSERT INTO `student_login` (`Vidkodas`, `Vardas`, `Pavarde`, `Slapyvardis`, `Slaptazodis`, `Elektroninis_pastas`, `Komentaru_kiekis`) VALUES
('C0000', 'Donaldas', 'Trumpas', 'dontru', 'stud123', 'dontru@ktu.lt', 3),
('C1111', 'Gustas', 'Germanas', 'gusger', 'stud123', 'gusger@ktu.lt', 3),
('C2222', 'Arnas', 'Belauskas', 'arnbel', 'stud123', 'arnbel@ktu.lt', 3),
('C3333', 'Tomas', 'Girdzius', 'tomgir', 'stud123', 'tomgir@ktu.lt', 3),
('C4444', 'Dalius', 'Deldzius', 'daldel', 'stud123', 'daldel@ktu.lt', 3),
('C5555', 'Egis', 'Bielius', 'egibie', 'stud123', 'egibie@ktu.lt', 3),
('C6666', 'Arnas', 'Radzius', 'arnrad', 'stud123', 'arnrad@ktu.lt', 3),
('C7777', 'Simas', 'Ruokis', 'simruo', 'stud123', 'simruo@ktu.lt', 3),
('C8888', 'Inga', 'Lazauskiene', 'inglaz', 'stud123', 'inglaz@ktu.lt', 3),
('C9999', 'Romas', 'Kalanta', 'romkal', 'stud123', 'romkal@ktu.lt', 3);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `upvote`
--

CREATE TABLE `upvote` (
  `Up_id` int(255) NOT NULL,
  `Modulis_id` varchar(255) NOT NULL,
  `Komentaras_id` int(255) NOT NULL,
  `Studentas_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `upvote`
--

INSERT INTO `upvote` (`Up_id`, `Modulis_id`, `Komentaras_id`, `Studentas_id`) VALUES
(216, 'P175B100', 1274, 'C1111'),
(217, 'P175B100', 1275, 'C2222'),
(218, 'P175B117', 1276, 'C2222'),
(219, 'P175B118', 1277, 'C3333'),
(222, 'P175B505', 1278, 'C3333'),
(224, 'T120B196', 1279, 'C3333'),
(226, 'P175B100', 1275, 'C7777'),
(230, 'P175B118', 1277, 'C7777'),
(231, 'P175B505', 1278, 'C7777'),
(279, 'P130B001', 1286, 'C0000'),
(280, 'P175B100', 1280, 'C0000'),
(281, 'T120B196', 1285, 'C0000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `komentarai`
--
ALTER TABLE `komentarai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginai`
--
ALTER TABLE `loginai`
  ADD PRIMARY KEY (`Jungimosi_id`);

--
-- Indexes for table `moduliai`
--
ALTER TABLE `moduliai`
  ADD PRIMARY KEY (`Kodas`);

--
-- Indexes for table `modulio_komentaras`
--
ALTER TABLE `modulio_komentaras`
  ADD PRIMARY KEY (`Komentaro_id`,`Modulio_id`) USING BTREE,
  ADD KEY `Studento_id` (`Studento_id`) USING BTREE;

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`Vidkodas`);

--
-- Indexes for table `upvote`
--
ALTER TABLE `upvote`
  ADD PRIMARY KEY (`Up_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modulio_komentaras`
--
ALTER TABLE `modulio_komentaras`
  MODIFY `Komentaro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1291;

--
-- AUTO_INCREMENT for table `upvote`
--
ALTER TABLE `upvote`
  MODIFY `Up_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
