---------------------------------------

--
-- Structure de la table `disponibilty`
--

CREATE TABLE `disponibilty` (
  `idDis` int NOT NULL,
  `idAvocat` int DEFAULT NULL,
  `datadebut` date DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ;

--
-- Déchargement des données de la table `disponibilty`
--

INSERT INTO `disponibilty` (`idDis`, `idAvocat`, `datadebut`, `title`) VALUES
(37, NULL, '2024-12-26', 'lk, '),
(38, NULL, '2024-12-18', 'bjb'),
(39, NULL, '2024-12-18', 'bjb'),
(40, NULL, '2024-12-18', 'bjb'),
(41, NULL, '2024-12-18', 'bjb'),
(42, NULL, '2024-12-18', 'bjb'),
(43, NULL, '2024-12-18', 'bjb'),
(44, NULL, '2024-12-18', 'bjb'),
(45, NULL, '2024-12-18', 'bjb'),
(46, NULL, '2024-12-18', 'bjb'),
(47, NULL, '2024-12-18', 'bjb'),
(48, NULL, '2024-12-18', 'bjb'),
(49, NULL, '2024-12-18', 'bjb'),
(50, NULL, '2024-12-11', ''),
(51, NULL, '2024-12-11', ''),
(52, NULL, '2024-12-10', ''),
(53, NULL, '2024-12-03', ''),
(54, NULL, '2024-12-03', ''),
(55, NULL, '2024-12-04', ''),
(56, NULL, '2024-12-19', '');

-- --------------------------------------------------------

--
-- Structure de la table `resvations`
--

CREATE TABLE `resvations` (
  `idResvations` int NOT NULL,
  `idClient` int NOT NULL,
  `DateReservation` date DEFAULT NULL,
  `idAvocat` int DEFAULT NULL,
  `statuss` varchar(255) DEFAULT 'still'
) ;

--
-- Déchargement des données de la table `resvations`
--

INSERT INTO `resvations` (`idResvations`, `idClient`, `DateReservation`, `idAvocat`, `statuss`) VALUES
(91, 293, '2006-09-12', 293, 'Cancel'),
(92, 293, '1997-02-14', 293, 'Cancel');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idRL` int NOT NULL,
  `nomRole` varchar(255) DEFAULT NULL
);


-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `idSP` int NOT NULL,
  `label` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`idSP`, `label`) VALUES
(1, 'actour\r\n'),
(2, 'Droit pénal'),
(3, 'Droit civil'),
(4, 'Droit des affaires'),
(5, 'Droit administratif'),
(6, 'Droit constitutionnel'),
(7, 'Droit de la famille'),
(8, 'Droit immobilier'),
(9, 'Droit du travail'),
(10, 'Droit commercial'),
(11, 'Droit international');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `matricule` int DEFAULT '0',
  `biography` text,
  `numeroTelephone` varchar(255) DEFAULT NULL,
  `idrole` int DEFAULT NULL,
  `idSpecialite` int DEFAULT NULL,
  `pass_word` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `roles` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `full_name`, `age`, `email`, `img`, `matricule`, `biography`, `numeroTelephone`, `idrole`, `idSpecialite`, `pass_word`, `roles`) VALUES
(293, 'Yardley Cole', 29, 'itsmoustir@gmail.com', NULL, 42, NULL, '948', NULL, 3, '$2y$10$M8t7FnWLTWcx7SDAOBC4v.GTiKqTkTiUBWOe7pqMAsWpdw9dZLde2', '1'),
(294, 'Jesse Hardy', 73, 'hh@gmail.com', NULL, NULL, NULL, '', NULL, NULL, '$2y$10$RWE57hoyZn4kBV.lI3dh7eJ5z2arstpF7TFqvRlxjywWkXQNqUvsy', '0'),
(295, 'Chava Avery', 31, 'fokyhatoxu@mailinator.com', 'upload/3981ba4f61.png', 79, NULL, '19', NULL, 4, '$2y$10$N4zPndO5KPqZaTiRUXHcwegHHmXIsa1Gi.JdwNU.BnBplsKlpOnxC', '0'),
(296, 'furix@mailinator.com', 777, 'furix@mailinator.com', 'upload/7730e8672d.png', 885, NULL, '852', NULL, 10, '$2y$10$UTpvw0trpbwHNkTsvVt9IeGZtronjnFlPH3JyVjO43xRvKhhoCuHW', '0');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `disponibilty`
--
ALTER TABLE `disponibilty`
  ADD PRIMARY KEY (`idDis`),
  ADD KEY `idAvocat` (`idAvocat`);

--
-- Index pour la table `resvations`
--
ALTER TABLE `resvations`
  ADD PRIMARY KEY (`idResvations`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `fk_resvations_idAvocat` (`idAvocat`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRL`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`idSP`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricule` (`matricule`),
  ADD KEY `idrole` (`idrole`),
  ADD KEY `idSpecialite` (`idSpecialite`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `disponibilty`
--
ALTER TABLE `disponibilty`
  MODIFY `idDis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `resvations`
--
ALTER TABLE `resvations`
  MODIFY `idResvations` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idRL` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `idSP` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `disponibilty`
--
ALTER TABLE `disponibilty`
  ADD CONSTRAINT `disponibilty_ibfk_1` FOREIGN KEY (`idAvocat`) REFERENCES `users` (`matricule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `resvations`
--
ALTER TABLE `resvations`
  ADD CONSTRAINT `fk_resvations_idAvocat` FOREIGN KEY (`idAvocat`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resvations_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `role` (`idRL`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`idSpecialite`) REFERENCES `specialite` (`idSP`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
