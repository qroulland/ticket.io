-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2021 at 11:07 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gest-tickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `projets`
--

CREATE TABLE `projets` (
  `pro_num` int(11) NOT NULL,
  `pro_nom` text NOT NULL,
  `pro_createur` text NOT NULL,
  `pro_date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projets`
--

INSERT INTO `projets` (`pro_num`, `pro_nom`, `pro_createur`, `pro_date_creation`) VALUES
(1, 'Ticket.io', '1', '2021-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `rol_num` int(11) NOT NULL,
  `rol_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rol_num`, `rol_type`) VALUES
(1, 'Admin'),
(2, 'Technicien'),
(3, 'Visiteur');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `tic_num` int(11) NOT NULL,
  `tic_titre` varchar(1000) DEFAULT NULL,
  `tic_description` varchar(1000) DEFAULT NULL,
  `tic_date_creation` varchar(1000) DEFAULT NULL,
  `tic_date_prise_en_charge` varchar(1000) DEFAULT NULL,
  `tic_date_fin_intervention` varchar(1000) DEFAULT NULL,
  `tic_date_cloture` varchar(1000) DEFAULT NULL,
  `tic_intervenant` varchar(1000) DEFAULT NULL,
  `tic_urgence` varchar(1000) DEFAULT NULL,
  `tic_projet` varchar(1000) DEFAULT NULL,
  `tic_type` varchar(1000) DEFAULT NULL,
  `tic_demandeur` varchar(1000) DEFAULT NULL,
  `tic_description_intervention` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type_ticket`
--

CREATE TABLE `type_ticket` (
  `typ_num` int(11) NOT NULL,
  `typ_nom` text NOT NULL,
  `typ_icone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_ticket`
--

INSERT INTO `type_ticket` (`typ_num`, `typ_nom`, `typ_icone`) VALUES
(1, 'Bug', 'fas fa-bug text-danger'),
(2, 'Feature', 'fas fa-tools text-warning'),
(3, 'User story', 'fas fa-book-open text-info');

-- --------------------------------------------------------

--
-- Table structure for table `urgence`
--

CREATE TABLE `urgence` (
  `urg_num` int(11) NOT NULL,
  `urg_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `urgence`
--

INSERT INTO `urgence` (`urg_num`, `urg_type`) VALUES
(1, 'Low'),
(2, 'Medium'),
(3, 'Hight');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `util_num` int(11) NOT NULL,
  `util_nom` text NOT NULL,
  `util_prenom` text NOT NULL,
  `util_login` text NOT NULL,
  `util_password` text NOT NULL,
  `util_mail` text NOT NULL,
  `util_rol_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`util_num`, `util_nom`, `util_prenom`, `util_login`, `util_password`, `util_mail`, `util_rol_num`) VALUES
(1, 'Nom', 'Prénom', 'root', 'root', 'admin@ticketio.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`pro_num`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_num`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`tic_num`);

--
-- Indexes for table `type_ticket`
--
ALTER TABLE `type_ticket`
  ADD PRIMARY KEY (`typ_num`);

--
-- Indexes for table `urgence`
--
ALTER TABLE `urgence`
  ADD PRIMARY KEY (`urg_num`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`util_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projets`
--
ALTER TABLE `projets`
  MODIFY `pro_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `tic_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `type_ticket`
--
ALTER TABLE `type_ticket`
  MODIFY `typ_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `urgence`
--
ALTER TABLE `urgence`
  MODIFY `urg_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `util_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;