-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 11:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbforumas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
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
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`Admin_id`, `Vardas`, `Pavarde`, `Slapyvardis`, `Slaptazodis`, `Elektroninis_Pastas`) VALUES
('1', 'Simas', 'Andziulis', 'simand1', 'testas123', 'simand1@ktu.lt'),
('2', 'Greta', 'Grunskyte', 'gregru', 'testas123', 'gregru@ktu.lt'),
('3', 'Mantas', 'Danauskas', 'mandan', 'testas123', 'mandan@ktu.lt'),
('4', 'Monika', 'Maliaukaite', 'monmal', 'testas123', 'monmal@ktu.lt');

-- --------------------------------------------------------

--
-- Table structure for table `komentarai`
--

CREATE TABLE `komentarai` (
  `id` int(255) NOT NULL,
  `Komentaras` varchar(255) DEFAULT NULL,
  `Upvote` int(11) DEFAULT NULL,
  `Redaguota` tinyint(1) DEFAULT NULL,
  `Data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loginai`
--

CREATE TABLE `loginai` (
  `ip_adresas` varchar(255) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Tinklapio_adresas` varchar(255) DEFAULT NULL,
  `Jungimosi_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `moduliai`
--

CREATE TABLE `moduliai` (
  `Kodas` varchar(255) NOT NULL,
  `Pavadinimas` varchar(255) DEFAULT NULL,
  `Semestras` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moduliai`
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
-- Table structure for table `modulio_komentaras`
--

CREATE TABLE `modulio_komentaras` (
  `Modulio_id` int(255) NOT NULL,
  `Komentaro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
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
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`Vidkodas`, `Vardas`, `Pavarde`, `Slapyvardis`, `Slaptazodis`, `Elektroninis_pastas`, `Komentaru_kiekis`) VALUES
('C0000', 'Donaldas', 'Trumpas', 'dontru', 'stud123', 'dontru@ktu.lt', 8),
('C1111', 'Gustas', 'Germanas', 'gusger', 'stud123', 'gusger@ktu.lt', 0),
('C2222', 'Arnas', 'Belauskas', 'arnbel', 'stud123', 'arnbel@ktu.lt', 2),
('C3333', 'Tomas', 'Girdzius', 'tomgir', 'stud123', 'tomgir@ktu.lt', 10),
('C4444', 'Dalius', 'Deldzius', 'daldel', 'stud123', 'daldel@ktu.lt', 4),
('C5555', 'Egis', 'Bielius', 'egibie', 'stud123', 'egibie@ktu.lt', 3),
('C6666', 'Arnas', 'Radzius', 'arnrad', 'stud123', 'arnrad@ktu.lt', 2),
('C7777', 'Simas', 'Ruokis', 'simruo', 'stud123', 'simruo@ktu.lt', 15),
('C8888', 'Inga', 'Lazauskiene', 'inglaz', 'stud123', 'inglaz@ktu.lt', 9),
('C9999', 'Romas', 'Kalanta', 'romkal', 'stud123', 'romkal@ktu.lt', 20);

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
  ADD PRIMARY KEY (`Komentaro_id`,`Modulio_id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`Vidkodas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
