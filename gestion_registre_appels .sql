-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 28 mai 2022 à 04:15
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_registre_appels`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation`
--

CREATE TABLE `affectation` (
  `ID` int(11) NOT NULL,
  `MODULE` varchar(100) NOT NULL,
  `MAT_ENSEIGNANT` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `affectation`
--

INSERT INTO `affectation` (`ID`, `MODULE`, `MAT_ENSEIGNANT`) VALUES
(1, 'Programmation Logique', 1010),
(2, 'Algorithme Avancé', 1010),
(3, 'Base de Données', 1010),
(4, 'Analyse Numérique', 1050),
(5, 'Préparation à la Certification CCNA1', 1050);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `ID` int(11) NOT NULL,
  `MAT_ETUDIANT` int(10) NOT NULL,
  `NOM_ETUDIANT` varchar(100) NOT NULL,
  `PRENOM_ETUDIANT` varchar(100) NOT NULL,
  `GROUPE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`ID`, `MAT_ETUDIANT`, `NOM_ETUDIANT`, `PRENOM_ETUDIANT`, `GROUPE`) VALUES
(1, 1310, 'MARAMOU', 'Maramou', 'Génie Logiciel 3 (GL3)'),
(2, 1314, 'MEZNI', 'Rania', 'Génie Logiciel 3 (GL3)'),
(3, 1311, 'CLEMENT', 'Clement', 'Réseau et Télécommunication 3 (RT3)'),
(4, 1312, 'PRUDENCE', 'Prudence', 'Réseau et Télécommunication 3 (RT3)'),
(5, 1313, 'NDAYA', 'Fortune', 'Droit 1 (D1)'),
(6, 1315, 'KILONDA', 'Divin', 'Droit 1 (D1)'),
(7, 1316, 'YALLA', 'Eunice', 'Droit 1 (D1)');

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`ID`, `USERNAME`, `PASSWORD`) VALUES
(1, '1010', 'youssouf'),
(2, '1050', 'rania');

-- --------------------------------------------------------

--
-- Structure de la table `enseignants`
--

CREATE TABLE `enseignants` (
  `ID` int(11) NOT NULL,
  `MATRICULE` int(10) NOT NULL,
  `NOM` varchar(100) NOT NULL,
  `PRENOM` varchar(100) NOT NULL,
  `TELEPHONE` varchar(20) NOT NULL,
  `ADRESSE` varchar(255) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `GRADE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enseignants`
--

INSERT INTO `enseignants` (`ID`, `MATRICULE`, `NOM`, `PRENOM`, `TELEPHONE`, `ADRESSE`, `EMAIL`, `GRADE`) VALUES
(1, 1010, 'SOUMAHORO', 'Youssouf', '01020404', 'Cité El Ghazela', 'youssouf@gmail.com', 'DR'),
(2, 1050, 'MEZNI', 'Rania', '24589636', 'Cité El Kadra', 'rania@gmail.com', 'DR');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `ID` int(11) NOT NULL,
  `MATRICULE` int(10) NOT NULL,
  `NOM` varchar(100) NOT NULL,
  `PRENOM` varchar(100) NOT NULL,
  `TELEPHONE` varchar(50) NOT NULL,
  `ADRESSE` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`ID`, `MATRICULE`, `NOM`, `PRENOM`, `TELEPHONE`, `ADRESSE`, `EMAIL`) VALUES
(1, 1310, 'MAMARAMOU', 'Maramou', '45896365', 'La Soukra', 'maramou@gmail.com'),
(2, 1311, 'CLEMENT', 'Clement', '55447896', 'La Soukra', 'clement@gmail.com'),
(3, 1312, 'PRUDENCE', 'Prudence', '36547896', 'EL Ghazela', 'prudence@gmail.com'),
(4, 1313, 'NDAYA', 'Fortune', '45863259', 'Bourguiba', 'fortune@gmail.com'),
(5, 1315, 'KILONDA', 'Divin', '66987412', 'EL Ghazela', 'divin@gmail.com'),
(6, 1314, 'MEZNI', 'Rania', '86325478', 'El Kadra', 'rania@gmail.com'),
(7, 1316, 'YALLA', 'Eunice', '4587963', 'EL Ghazela', 'eunice@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `ID` int(11) NOT NULL,
  `LIBELLE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`ID`, `LIBELLE`) VALUES
(1, 'Génie Logiciel 3 (GL3)'),
(2, 'Réseau et Télécommunication 3 (RT3)'),
(3, 'Droit 1 (D1)');

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `ID` int(11) NOT NULL,
  `LIBELLE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`ID`, `LIBELLE`) VALUES
(1, 'Programmation Logique'),
(2, 'Algorithme Avancé'),
(3, 'Base de Données'),
(4, 'Analyse Numérique'),
(5, 'Initiation aux Réseaux'),
(6, 'Préparation à la Certification CCNA1'),
(7, 'Droit Constitutionnel'),
(8, 'Droit Privée'),
(9, 'Droit des Affaires'),
(10, 'Anglais'),
(11, 'Français');

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE `planning` (
  `ID` int(11) NOT NULL,
  `MATRICULE_ENS` int(10) NOT NULL,
  `MODULE` varchar(100) NOT NULL,
  `CLASSE` varchar(100) NOT NULL,
  `TYPE_SALLE` varchar(50) NOT NULL,
  `DATE_SEANCE` date NOT NULL,
  `HEURE_DEBUT` time NOT NULL,
  `HEURE_FIN` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pointage`
--

CREATE TABLE `pointage` (
  `ID` int(11) NOT NULL,
  `MAT_ETUDIANT` int(10) NOT NULL,
  `NOM_ETUDIANT` varchar(100) NOT NULL,
  `PRENOM_ETUDIANT` varchar(100) NOT NULL,
  `CLASSE` varchar(100) NOT NULL,
  `MODULE` varchar(100) NOT NULL,
  `TYPE_SALLE` varchar(50) NOT NULL,
  `DATE_SEANCE` date NOT NULL,
  `HEURE_DEBUT` time NOT NULL,
  `HEURE_FIN` time NOT NULL,
  `STATUT` varchar(10) NOT NULL,
  `MAT_ENSEIGNANT` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pointage`
--

INSERT INTO `pointage` (`ID`, `MAT_ETUDIANT`, `NOM_ETUDIANT`, `PRENOM_ETUDIANT`, `CLASSE`, `MODULE`, `TYPE_SALLE`, `DATE_SEANCE`, `HEURE_DEBUT`, `HEURE_FIN`, `STATUT`, `MAT_ENSEIGNANT`) VALUES
(3, 1313, 'NDAYA', 'Fortune', 'Droit 1 (D1)', 'Droit des Affaires', '4-4 CONFER', '2022-05-27', '22:00:00', '23:30:00', 'ABSENT', 1010),
(4, 1315, 'KILONDA', 'Divin', 'Droit 1 (D1)', 'Droit des Affaires', '4-4 CONFER', '2022-05-27', '22:00:00', '23:30:00', 'ABSENT', 1010),
(5, 1316, 'YALLA', 'Eunice', 'Droit 1 (D1)', 'Droit des Affaires', '4-4 CONFER', '2022-05-27', '22:00:00', '23:30:00', 'PRESENT', 1010),
(6, 1311, 'CLEMENT', 'Clement', 'Réseau et Télécommunication 3 (RT3)', 'Préparation à la Certification CCNA1', '3-3 COURS', '2022-05-28', '08:10:00', '09:40:00', 'ABSENT', 1050),
(7, 1312, 'PRUDENCE', 'Prudence', 'Réseau et Télécommunication 3 (RT3)', 'Préparation à la Certification CCNA1', '3-3 COURS', '2022-05-28', '08:10:00', '09:40:00', 'ABSENT', 1050);

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `ID` int(11) NOT NULL,
  `CLASSE` varchar(100) NOT NULL,
  `MODULE` varchar(100) NOT NULL,
  `TYPE_SALLE` varchar(10) NOT NULL,
  `DATE_SEANCE` date NOT NULL,
  `HEURE_DEBUT` time NOT NULL,
  `HEURE_FIN` time NOT NULL,
  `MAT_ENSEIGNANT` int(10) NOT NULL,
  `ETAT` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`ID`, `CLASSE`, `MODULE`, `TYPE_SALLE`, `DATE_SEANCE`, `HEURE_DEBUT`, `HEURE_FIN`, `MAT_ENSEIGNANT`, `ETAT`) VALUES
(7, 'Droit 1 (D1)', 'Droit des Affaires', '4-4 CONFER', '2022-05-27', '22:00:00', '23:30:00', 1010, 1),
(8, 'Réseau et Télécommunication 3 (RT3)', 'Préparation à la Certification CCNA1', '3-3 COURS', '2022-05-28', '08:10:00', '09:40:00', 1050, 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_salle`
--

CREATE TABLE `type_salle` (
  `ID` int(11) NOT NULL,
  `NUM_SALLE` varchar(10) NOT NULL,
  `LIBELLE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_salle`
--

INSERT INTO `type_salle` (`ID`, `NUM_SALLE`, `LIBELLE`) VALUES
(1, '3-2', 'COURS'),
(2, '3-3', 'COURS'),
(3, '3-4', 'TP'),
(4, '4-2', 'TP'),
(5, '4-3', 'COURS'),
(6, '4-4', 'CONFERENCE'),
(7, '5-2', 'COURS'),
(8, '5-3', 'COURS'),
(9, '5-4', 'TP'),
(10, '6-3', 'CONFERENCE');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `enseignants`
--
ALTER TABLE `enseignants`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `pointage`
--
ALTER TABLE `pointage`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `type_salle`
--
ALTER TABLE `type_salle`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affectation`
--
ALTER TABLE `affectation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `enseignants`
--
ALTER TABLE `enseignants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `planning`
--
ALTER TABLE `planning`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `pointage`
--
ALTER TABLE `pointage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `type_salle`
--
ALTER TABLE `type_salle`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
