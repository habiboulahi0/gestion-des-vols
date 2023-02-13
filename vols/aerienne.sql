-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 23 juil. 2022 à 01:26
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `aerienne`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `mdp`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Structure de la table `avion`
--

CREATE TABLE `avion` (
  `idav` int(11) NOT NULL,
  `typeav` varchar(40) DEFAULT NULL,
  `cap` int(11) DEFAULT NULL,
  `loc` varchar(40) DEFAULT NULL,
  `remarq` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `avion`
--

INSERT INTO `avion` (`idav`, `typeav`, `cap`, `loc`, `remarq`) VALUES
(1, 'A300', 300, 'Nice', 'En service'),
(2, 'A300', 300, 'Nice', 'En service'),
(3, 'A320', 320, 'Paris', 'En service'),
(4, 'A300', 300, 'Paris', 'En service'),
(5, 'CONCORDE', 300, 'Nice', 'En service'),
(6, 'B707', 400, 'Paris', 'En panne'),
(7, 'CARAVELLE', 300, 'Paris', 'En service'),
(8, 'B727', 250, 'Toulouse', 'En service'),
(9, 'CONCORDE', 350, 'Toulouse', 'En service'),
(10, 'A300', 400, 'Paris', 'En service');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `pseudo`, `email`, `mdp`) VALUES
(1, 'habibou', 'habibouissa00@gmail.com', 'habibou'),
(2, 'issa', 'habibouissa00@gmail.com', 'issa');

-- --------------------------------------------------------

--
-- Structure de la table `pilote`
--

CREATE TABLE `pilote` (
  `idpil` int(5) NOT NULL,
  `nompil` varchar(40) DEFAULT NULL,
  `dnaiss` date DEFAULT NULL,
  `adr` varchar(40) DEFAULT NULL,
  `tel` varchar(40) DEFAULT NULL,
  `sal` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pilote`
--

INSERT INTO `pilote` (`idpil`, `nompil`, `dnaiss`, `adr`, `tel`, `sal`) VALUES
(1, 'Miranda', '1952-08-16', 'Sophia-Antipolis', '93548254', '18009'),
(2, 'St-exupery', '1932-10-16', 'Lyon', '91548254', '12300'),
(3, 'Armstrong', '1930-03-11', 'Wapakoneta', '96548254', '24500'),
(4, 'Tintin', '1929-08-01', 'Bruxelles', '93548254', '21100'),
(5, 'Gagarine', '1934-08-12', 'Klouchino', '93548454', '22100'),
(6, 'Baudry', '1959-08-31', 'Toulouse', '93548444', '21000'),
(8, 'Bush', '1924-02-28', 'Milton', '44556254', '22000'),
(9, 'Ruskoi', '1930-08-16', 'Moscou', '73548254', '22000'),
(10, 'Math', '1938-08-12', 'Paris', '23548254', '15000'),
(11, 'Yen', '1942-09-19', 'Munich', '13548254', '29000'),
(12, 'Icare', '1962-12-17', 'Ithaques', '73548211', '17001'),
(13, 'Mopolo', '1955-11-04', 'Nice', '93958211', '17001'),
(14, 'Chretien', '1945-11-04', 'Lyon', '73223322', '15001'),
(15, 'Vernes', '1935-11-04', 'Paris', '67423322', '17001'),
(16, 'Tournesol', '1929-08-04', 'Bruxelles', '78723322', '15001'),
(17, 'Concorde', '1966-08-04', 'Paris', '73553322', '21001');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `ville_dep` varchar(50) NOT NULL,
  `ville_arr` varchar(50) NOT NULL,
  `dat_dep` varchar(50) NOT NULL,
  `dat_arr` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `nom`, `prenom`, `ville_dep`, `ville_arr`, `dat_dep`, `dat_arr`, `pseudo`) VALUES
(12, 'saly', 'saly', 'Toulouse', 'Mulhouse', '2023-8-17', '2025-10-17', 'habibou'),
(18, 'Issa Seydou', 'Habiboulahi', 'Nice', 'Toulouse', '2029-8-9', '0', 'issa'),
(29, 'Issa Seydou', 'habiboulahi', 'Nice', 'New york', '2030-1-1', '2030-1-1', 'habibou');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `idvol` int(11) NOT NULL,
  `idpil` int(11) DEFAULT NULL,
  `idav` int(11) DEFAULT NULL,
  `villedep` varchar(40) DEFAULT NULL,
  `villearr` varchar(40) DEFAULT NULL,
  `hdep` varchar(40) DEFAULT NULL,
  `harr` varchar(40) DEFAULT NULL,
  `dat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vol`
--

INSERT INTO `vol` (`idvol`, `idpil`, `idav`, `villedep`, `villearr`, `hdep`, `harr`, `dat`) VALUES
(100, 1, 1, 'Nice', 'Paris', '1345', '1500', '1989-03-03'),
(110, 3, 6, 'Nice', 'Toulouse', '1230', '1325', '1989-03-06'),
(111, 5, 3, 'Nice', 'Paris', '0800', '0920', '1989-12-04'),
(120, 4, 3, 'Nice', 'Paris', '0745', '0900', '1989-06-21'),
(125, 12, 6, 'Paris', 'Nice', '1330', '1845', '1989-01-10'),
(130, 4, 8, 'Toulouse', 'Beauvais', '0630', '0750', '1989-03-27'),
(135, 8, 5, 'Paris', 'Toulouse', '1200', '1320', '1989-03-22'),
(140, 14, 9, 'Lyon', 'Nice', '0700', '0750', '1989-06-04'),
(150, 1, 1, 'Paris', 'Nantes', '1630', '1725', '1989-03-28'),
(153, 2, 3, 'Lyon', 'Nice', '1210', '1300', '1989-11-06'),
(156, 9, 2, 'Paris', 'Lyon', '0230', '0320', '1989-01-14'),
(200, 5, 3, 'Nice', 'Toulouse', '2030', '2125', '1989-06-17'),
(210, 14, 7, 'Nice', 'Nantes', '1430', '1525', '1989-10-14'),
(236, 8, 4, 'Lyon', 'Toulouse', '2130', '2250', '1989-10-15'),
(240, 13, 10, 'Nice', 'Paris', '2300', '2355', '1989-11-19'),
(250, 13, 4, 'Bordeaux', 'Paris', '2300', '2355', '1989-12-25'),
(260, 13, 5, 'Bordeaux', 'Paris', '2300', '2355', '1989-11-30'),
(270, 13, 9, 'Paris', 'New york', '1400', '2300', '1989-01-03'),
(280, 8, 9, 'Nice', 'Mulhouse', '1200', '1320', '1989-03-21'),
(290, 3, 8, 'Beauvais', 'Marseille', '1230', '1425', '1989-03-09');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`idav`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD PRIMARY KEY (`idpil`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`idvol`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `avion`
--
ALTER TABLE `avion`
  MODIFY `idav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `pilote`
--
ALTER TABLE `pilote`
  MODIFY `idpil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `vol`
--
ALTER TABLE `vol`
  MODIFY `idvol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;
COMMIT;
