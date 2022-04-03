-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Dim 03 Avril 2022 à 12:32
-- Version du serveur :  5.7.29
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `in20b1117`
--

-- --------------------------------------------------------

--
-- Structure de la table `pluri2_Agenda`
--

CREATE TABLE `pluri2_Agenda` (
  `idAgenda` int(10) NOT NULL,
  `idRH` int(5) NOT NULL,
  `idCandidate` int(5) DEFAULT NULL,
  `startDate` varchar(20) NOT NULL,
  `endDate` varchar(20) NOT NULL,
  `date` varchar(10) NOT NULL,
  `meetingURL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pluri2_Agenda`
--

INSERT INTO `pluri2_Agenda` (`idAgenda`, `idRH`, `idCandidate`, `startDate`, `endDate`, `date`, `meetingURL`) VALUES
(1, 1, NULL, '13:00', '14:00', '01/04/2022', ''),
(5, 1, NULL, '14:00', '15:00', '01/04/2022', ''),
(6, 1, NULL, '15:00', '16:00', '01/04/2022', ''),
(7, 1, NULL, '16:00', '17:00', '01/04/2022', ''),
(8, 1, NULL, '17:00', '18:00', '01/04/2022', ''),
(9, 1, NULL, '13:00', '14:00', '08/04/2022', ''),
(10, 1, NULL, '14:00', '15:00', '08/04/2022', ''),
(11, 1, NULL, '15:00', '16:00', '08/04/2022', ''),
(12, 1, NULL, '16:00', '17:00', '08/04/2022', ''),
(13, 1, NULL, '17:00', '18:00', '08/04/2022', ''),
(14, 1, NULL, '13:00', '14:00', '15/04/2022', ''),
(15, 1, NULL, '14:00', '15:00', '15/04/2022', ''),
(16, 1, NULL, '15:00', '16:00', '15/04/2022', ''),
(17, 1, NULL, '16:00', '17:00', '15/04/2022', ''),
(18, 1, NULL, '17:00', '18:00', '15/04/2022', '');

-- --------------------------------------------------------

--
-- Structure de la table `pluri2_Application`
--

CREATE TABLE `pluri2_Application` (
  `idApplication` int(11) NOT NULL,
  `idCandidat` int(5) NOT NULL,
  `motivation` text,
  `ableToStartIn` varchar(30) NOT NULL,
  `cvURL` varchar(150) DEFAULT NULL,
  `diploma` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `idOffer` int(5) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pluri2_Application`
--

INSERT INTO `pluri2_Application` (`idApplication`, `idCandidat`, `motivation`, `ableToStartIn`, `cvURL`, `diploma`, `language`, `idOffer`, `status`) VALUES
(18, 17, 'I\'m a really good human!', 'in 6 months (or less)', './uploads/Human resources manager!ophicy@gmail.com.pdf', 'Master', 'DE', 11, 1),
(19, 19, 'Why not?', 'More', './uploads/Human resources manager!adada@lovelace.cm.pdf', 'Community College', 'EN', 11, 1),
(20, 20, '', 'in 3 months (or less)', './uploads/Human resources manager!pok@mon.fr.pdf', 'Community College', 'DE', 11, NULL),
(27, 27, '...', 'Immediatly', './uploads/Human Ressources Manager!fdetiffe@gmail.com.pdf', 'Master', 'FR, EN, NE', 20, 0);

-- --------------------------------------------------------

--
-- Structure de la table `pluri2_Image`
--

CREATE TABLE `pluri2_Image` (
  `idImage` int(5) NOT NULL,
  `imageURL` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pluri2_Offer`
--

CREATE TABLE `pluri2_Offer` (
  `idOffer` int(5) NOT NULL,
  `titleOffer` varchar(100) NOT NULL,
  `descriptionOffer` text NOT NULL,
  `skillsOffer` text NOT NULL,
  `jobStartDate` varchar(30) NOT NULL,
  `contractType` varchar(50) NOT NULL,
  `idRH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pluri2_Offer`
--

INSERT INTO `pluri2_Offer` (`idOffer`, `titleOffer`, `descriptionOffer`, `skillsOffer`, `jobStartDate`, `contractType`, `idRH`) VALUES
(9, 'Software Engineer', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. ', 'Java, C#, PHP', '2022-04-30', 'CDI', 1),
(10, 'IT developper FullStack', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', '2022-09-01', 'CDD', 1),
(11, 'Human resources manager', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. ', '2022-10-03', 'CDD 6 months', 1),
(17, 'Human resources manager', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. ', '2022-10-03', 'CDD 6 months', 1),
(18, 'IT developper FullStack', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', '2022-09-01', 'CDD', 1),
(19, 'Software Engineer', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. ', 'Java, C#, PHP', '2022-04-30', 'CDI', 1),
(20, 'Human Ressources Manager', '....', 'Communication', '2022-04-06', 'CDI', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pluri2_User`
--

CREATE TABLE `pluri2_User` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `isRH` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pluri2_User`
--

INSERT INTO `pluri2_User` (`idUser`, `nom`, `prenom`, `email`, `phone`, `isRH`, `password`) VALUES
(1, 'Goossens', 'Julie', 'notjugoossens@deloitte.lu', '0494949494', 1, 'root'),
(17, 'Beaujean', 'Cyril', 'cy.beaujean@gmail.com', '0404040404', 0, 'root'),
(18, 'Gabin', 'Jean', 'ophicy@gmail.com', '0404040505', 0, '2SmTotED'),
(19, 'Lovelace', 'Ada', 'adada@lovelace.cm', '000008888', 0, '8RdYVNV2'),
(20, 'Kaspersky', 'Igor', 'pok@mon.fr', '88880450120', 0, 'BongBoUp'),
(27, 'Detiffe', 'Florian', 'fdetiffe@gmail.com', '098765433', 0, 'Fv4GFmao');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `pluri2_Agenda`
--
ALTER TABLE `pluri2_Agenda`
  ADD PRIMARY KEY (`idAgenda`),
  ADD UNIQUE KEY `idCandidate` (`idCandidate`),
  ADD KEY `idRH` (`idRH`);

--
-- Index pour la table `pluri2_Application`
--
ALTER TABLE `pluri2_Application`
  ADD PRIMARY KEY (`idApplication`),
  ADD UNIQUE KEY `idCandidat` (`idCandidat`),
  ADD KEY `idOffer` (`idOffer`),
  ADD KEY `idOffer_2` (`idOffer`);

--
-- Index pour la table `pluri2_Image`
--
ALTER TABLE `pluri2_Image`
  ADD PRIMARY KEY (`idImage`);

--
-- Index pour la table `pluri2_Offer`
--
ALTER TABLE `pluri2_Offer`
  ADD PRIMARY KEY (`idOffer`),
  ADD UNIQUE KEY `idOffer_2` (`idOffer`),
  ADD KEY `idOffer` (`idOffer`),
  ADD KEY `idOffer_3` (`idOffer`),
  ADD KEY `indexIdRH` (`idRH`);

--
-- Index pour la table `pluri2_User`
--
ALTER TABLE `pluri2_User`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `pluri2_Agenda`
--
ALTER TABLE `pluri2_Agenda`
  MODIFY `idAgenda` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `pluri2_Application`
--
ALTER TABLE `pluri2_Application`
  MODIFY `idApplication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `pluri2_Image`
--
ALTER TABLE `pluri2_Image`
  MODIFY `idImage` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `pluri2_Offer`
--
ALTER TABLE `pluri2_Offer`
  MODIFY `idOffer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `pluri2_User`
--
ALTER TABLE `pluri2_User`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `pluri2_Agenda`
--
ALTER TABLE `pluri2_Agenda`
  ADD CONSTRAINT `pluri2_Agenda_ibfk_2` FOREIGN KEY (`idCandidate`) REFERENCES `pluri2_User` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pluri2_Agenda_ibfk_3` FOREIGN KEY (`idRH`) REFERENCES `pluri2_User` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pluri2_Application`
--
ALTER TABLE `pluri2_Application`
  ADD CONSTRAINT `pluri2_Application_ibfk_1` FOREIGN KEY (`idCandidat`) REFERENCES `pluri2_User` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pluri2_Application_ibfk_2` FOREIGN KEY (`idOffer`) REFERENCES `pluri2_Offer` (`idOffer`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
