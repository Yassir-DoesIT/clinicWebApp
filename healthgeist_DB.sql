-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 02:37 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthgeist`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `ID_CONSULTATION` int(11) NOT NULL,
  `DOCTOR` int(11) NOT NULL,
  `PATIENT` int(11) NOT NULL,
  `DATE_DEBU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `demande_attente`
--

CREATE TABLE `demande_attente` (
  `ID_DEMANDE` int(11) NOT NULL,
  `ID_DOCTOR` int(11) NOT NULL,
  `ID_PATIENT` int(11) NOT NULL,
  `DATE_DEMANDE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID_MESSAGE` int(11) NOT NULL,
  `ID_EXPEDITEUR` int(11) NOT NULL,
  `ID_DESTINATAIRE` int(11) NOT NULL,
  `CONTENU` text NOT NULL,
  `DATE_ENVOI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quartiers`
--

CREATE TABLE `quartiers` (
  `ID_QUARTIER` int(11) NOT NULL,
  `CODE_POSTALE_VILLE` int(11) NOT NULL,
  `INTITULE_QUARTIER` varchar(200) NOT NULL,
  `LAT_QUARTIER` double NOT NULL,
  `LNG_QUARTIER` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quartiers`
--

INSERT INTO `quartiers` (`ID_QUARTIER`, `CODE_POSTALE_VILLE`, `INTITULE_QUARTIER`, `LAT_QUARTIER`, `LNG_QUARTIER`) VALUES
(1, 70000, 'Boulevard de la Marine', 27.161611314107073, -13.199608789668355),
(3, 60000, 'Hay El-Andalouss', 34.65594499650796, -1.8868341348756499),
(4, 83000, 'Hay Mohammadi', 30.48857504164336, -8.87361649022121),
(6, 60000, 'Lazaret', 34.68823397503519, -1.8843643016818206),
(7, 60000, 'Hay Zitoune', 34.669384854892016, -1.888908203343054);

-- --------------------------------------------------------

--
-- Table structure for table `services_medicaux`
--

CREATE TABLE `services_medicaux` (
  `ID_SERVICE` int(11) NOT NULL,
  `ID_QUARTIER` int(11) NOT NULL,
  `INTITULE_SERVICE` varchar(200) NOT NULL,
  `PERMANANCE` tinyint(1) NOT NULL,
  `LAT_SERVICE` double NOT NULL,
  `LNG_SERVICE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_medicaux`
--

INSERT INTO `services_medicaux` (`ID_SERVICE`, `ID_QUARTIER`, `INTITULE_SERVICE`, `PERMANANCE`, `LAT_SERVICE`, `LNG_SERVICE`) VALUES
(1, 1, 'Hopital Militaire', 1, 27.160990528688377, -13.195296008180076),
(2, 6, 'Pharmacie Dar Azzaim', 1, 34.69208669573113, -1.8797395111916029),
(3, 4, 'Pharmacie Lastah', 1, 30.48760696021876, -8.874357225710067),
(4, 6, 'Pharmacie Al Israe', 1, 34.692680743636195, -1.88131834184193),
(6, 6, 'Pharmacie Rif', 1, 34.683831059136274, -1.8906694755038767),
(7, 1, 'Pharmacie Raiss', 1, 27.161624126368757, -13.201549299624272);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID_USER` int(11) NOT NULL,
  `ROLE` char(1) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `PASSWORD` varchar(1024) NOT NULL,
  `CIN` varchar(15) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `PRENOM` varchar(50) NOT NULL,
  `DATE_NAISSANCE` date NOT NULL,
  `SEXE` char(1) NOT NULL,
  `SPECIALITE` varchar(100) DEFAULT NULL,
  `ESTVERIFIER` tinyint(1) NOT NULL,
  `JUSTIFICATIF` varchar(200) DEFAULT NULL,
  `LIEUTRAVAILLE` varchar(200) DEFAULT NULL,
  `PHOTOPROFILE` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID_USER`, `ROLE`, `EMAIL`, `PASSWORD`, `CIN`, `NOM`, `PRENOM`, `DATE_NAISSANCE`, `SEXE`, `SPECIALITE`, `ESTVERIFIER`, `JUSTIFICATIF`, `LIEUTRAVAILLE`, `PHOTOPROFILE`) VALUES
(99, 'a', 'admin@healthgeist.com', '$2y$10$/ZSMi5jn2ExNlKxkClA5A.//l2GuufKAJWyOAiDzb4u9nfBEvCzbG', 'admin', 'admin', 'admin', '0000-00-00', 'a', NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `CODE_POSTALE_VILLE` int(11) NOT NULL,
  `INTITULE_VILLE` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`CODE_POSTALE_VILLE`, `INTITULE_VILLE`) VALUES
(60000, 'Oujda'),
(70000, 'Laayoune'),
(83000, 'Taroudant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`ID_CONSULTATION`),
  ADD KEY `FK_DOCTEUR` (`DOCTOR`),
  ADD KEY `FK_PATIENT` (`PATIENT`);

--
-- Indexes for table `demande_attente`
--
ALTER TABLE `demande_attente`
  ADD PRIMARY KEY (`ID_DEMANDE`),
  ADD KEY `FK_DOCTEUR_DEMANDE` (`ID_PATIENT`),
  ADD KEY `FK_PATIENT_DEMANDE` (`ID_DOCTOR`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID_MESSAGE`),
  ADD KEY `FK_DOCTEUR_MESSAGE` (`ID_DESTINATAIRE`),
  ADD KEY `FK_PATIENT_MESSAGE` (`ID_EXPEDITEUR`);

--
-- Indexes for table `quartiers`
--
ALTER TABLE `quartiers`
  ADD PRIMARY KEY (`ID_QUARTIER`),
  ADD KEY `FK_CONTIENT` (`CODE_POSTALE_VILLE`);

--
-- Indexes for table `services_medicaux`
--
ALTER TABLE `services_medicaux`
  ADD PRIMARY KEY (`ID_SERVICE`),
  ADD KEY `FK_SITUE_A` (`ID_QUARTIER`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`CODE_POSTALE_VILLE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `ID_CONSULTATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `demande_attente`
--
ALTER TABLE `demande_attente`
  MODIFY `ID_DEMANDE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID_MESSAGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `quartiers`
--
ALTER TABLE `quartiers`
  MODIFY `ID_QUARTIER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services_medicaux`
--
ALTER TABLE `services_medicaux`
  MODIFY `ID_SERVICE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `FK_DOCTEUR` FOREIGN KEY (`DOCTOR`) REFERENCES `utilisateurs` (`ID_USER`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PATIENT` FOREIGN KEY (`PATIENT`) REFERENCES `utilisateurs` (`ID_USER`) ON UPDATE CASCADE;

--
-- Constraints for table `demande_attente`
--
ALTER TABLE `demande_attente`
  ADD CONSTRAINT `FK_DOCTEUR_DEMANDE` FOREIGN KEY (`ID_PATIENT`) REFERENCES `utilisateurs` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PATIENT_DEMANDE` FOREIGN KEY (`ID_DOCTOR`) REFERENCES `utilisateurs` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `FK_DOCTEUR_MESSAGE` FOREIGN KEY (`ID_DESTINATAIRE`) REFERENCES `utilisateurs` (`ID_USER`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PATIENT_MESSAGE` FOREIGN KEY (`ID_EXPEDITEUR`) REFERENCES `utilisateurs` (`ID_USER`) ON UPDATE CASCADE;

--
-- Constraints for table `quartiers`
--
ALTER TABLE `quartiers`
  ADD CONSTRAINT `FK_CONTIENT` FOREIGN KEY (`CODE_POSTALE_VILLE`) REFERENCES `villes` (`CODE_POSTALE_VILLE`) ON UPDATE CASCADE;

--
-- Constraints for table `services_medicaux`
--
ALTER TABLE `services_medicaux`
  ADD CONSTRAINT `FK_SITUE_A` FOREIGN KEY (`ID_QUARTIER`) REFERENCES `quartiers` (`ID_QUARTIER`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
