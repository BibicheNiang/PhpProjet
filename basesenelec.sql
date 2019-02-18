-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 18 fév. 2019 à 09:22
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `basesenelec`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

CREATE TABLE `abonnements` (
  `id` int(10) UNSIGNED NOT NULL,
  `contrat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `cumulAnc` double DEFAULT '0',
  `cumulNouv` double NOT NULL,
  `compteur_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `abonnements`
--

INSERT INTO `abonnements` (`id`, `contrat`, `date`, `cumulAnc`, `cumulNouv`, `compteur_id`, `created_at`, `updated_at`) VALUES
(3, 'ferme', '2019-02-01', 0, 100, 11, '2019-02-14 02:37:39', '2019-02-14 13:12:10'),
(5, 'SERVTEST', '2019-02-02', 0, 100, 13, '2019-02-14 12:59:18', '2019-02-14 12:59:18');

-- --------------------------------------------------------

--
-- Structure de la table `compteurs`
--

CREATE TABLE `compteurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `compteurs`
--

INSERT INTO `compteurs` (`id`, `numero`, `created_at`, `updated_at`) VALUES
(8, 'NC12345', '2019-02-14 00:50:27', '2019-02-14 13:47:57'),
(10, 'NC546', '2019-02-14 01:07:42', '2019-02-14 01:07:42'),
(11, 'NC5678', '2019-02-14 02:37:39', '2019-02-14 02:37:39'),
(12, 'NC9877', '2019-02-14 12:36:17', '2019-02-14 12:36:17'),
(13, 'NC900', '2019-02-14 12:59:18', '2019-02-14 12:59:18'),
(14, 'NC789', '2019-02-15 00:29:25', '2019-02-15 00:29:25'),
(15, 'NC096', '2019-02-15 00:31:05', '2019-02-15 00:31:05');

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` int(10) UNSIGNED NOT NULL,
  `mois` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comsommation` double NOT NULL,
  `prix` int(11) NOT NULL,
  `reglement` tinyint(1) NOT NULL,
  `abonnement_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id`, `mois`, `comsommation`, `prix`, `reglement`, `abonnement_id`, `created_at`, `updated_at`) VALUES
(5, 'fevrier', 100, 20000, 1, 3, '2019-02-04 00:00:00', '2019-02-03 00:00:00'),
(6, 'fevrier', 200, 200000, 1, 5, '2019-02-04 00:00:00', '2019-02-12 00:00:00'),
(7, 'mars', 200, 400000, 0, 3, '2019-03-01 00:00:00', '2019-03-01 00:00:00'),
(8, 'mars', 50, 10000, 1, 5, '2019-03-02 00:00:00', '2019-02-02 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_13_162601_create_compteurs_table', 2),
(4, '2019_02_13_162709_create_abonnements_table', 2),
(5, '2019_02_13_162814_create_factures_table', 2),
(6, '2019_02_14_230936_create_abonnements_table', 0),
(7, '2019_02_14_230936_create_compteurs_table', 0),
(8, '2019_02_14_230936_create_factures_table', 0),
(9, '2019_02_14_230936_create_password_resets_table', 0),
(10, '2019_02_14_230936_create_users_table', 0),
(11, '2019_02_14_230937_add_foreign_keys_to_abonnements_table', 0),
(12, '2019_02_14_230937_add_foreign_keys_to_factures_table', 0);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bibiche', 'bibiche@gmail.com', '2019-02-05 00:00:00', 'passer1234', 'mdetudiant', '2019-02-14 00:00:00', '2019-02-14 00:00:00'),
(3, 'Bibiche', 'binou@gmail.com', NULL, '$2y$10$oh/CHz2TuHx.mgzS02ksa.TY1bAqmLfzWhNLSSlBWfIT5YQJ2JurG', '5PqhlCCc3nltpgYn75P4gk4e6j68Ja3fWScCQJHG7KUPcEEYxNJ7F2boCCvM', '2019-02-15 13:18:43', '2019-02-15 13:18:43');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abonnements_compteur_id_foreign` (`compteur_id`);

--
-- Index pour la table `compteurs`
--
ALTER TABLE `compteurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `compteurs_numero_unique` (`numero`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factures_abonnement_id_foreign` (`abonnement_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `compteurs`
--
ALTER TABLE `compteurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD CONSTRAINT `abonnements_compteur_id_foreign` FOREIGN KEY (`compteur_id`) REFERENCES `compteurs` (`id`);

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_abonnement_id_foreign` FOREIGN KEY (`abonnement_id`) REFERENCES `abonnements` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
