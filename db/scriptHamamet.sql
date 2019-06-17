-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 28 jan. 2019 à 09:30
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


DROP DATABASE IF EXISTS Hamamet;

CREATE DATABASE Hamamet;

use Hamamet;

-- --------------------------------------------------------

--
-- Structure de la table `admin`


-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `isAdmin` int(11) DEFAULT 0,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50),
  `add1` varchar(50),
  `add2` varchar(50),
  `city` varchar(50),
  `postcode` varchar(10),
  `phone` varchar(20),
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `updated_at` varchar(100),
  `created_at` varchar(100),
  `remember_token` varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `isAdmin`, `name`, `surname`, `add1`, `add2`, `city`, `postcode`, `phone`, `email`, `password`, `remember_token`) VALUES
(1, 0, 'Luca', 'Savio', 'ligne add1', 'ligne add2', 'Lyon', '69001', '0612345678', 'luca@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL),
(2, 1, 'Paul', 'Legrand', 'ligne add1', 'ligne add2', 'Lyon', '69009', '0796321458', 'paul@gmail.fr', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL),
(3, 0, 'Kyle', 'Exact', '4 rue oklm', '', 'Meximieux', '02800', '0612345678', 'k.exact@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL),
(4, 1, 'Dorian', 'Arnoux', 'ligne add1', 'ligne add2', 'Lyon', '69006', '0612345678', 'dorian@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL),
(5, 1, 'Alexis', 'Jamal', 'ligne add1', 'ligne add2', 'Lyon', '69006', '0612345678', 'alexis@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL);

-- --------------------------------------------------------



CREATE TABLE `sauces` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sauces`
--

INSERT INTO `sauces` (`id`, `name`) VALUES
(1, 'Mayonnaise'),
(2, 'Ketchup'),
(3, 'Harissa'),
(4, 'Blanche'),
(5, 'Burger'),
(6, 'Curry'),
(7, 'Moutarde'),
(8, 'Algérienne'),
(9, 'Fish'),
(10, 'Tartare'),
(11, 'Samouraï'),
(12, 'Barbecue'),
(13, 'Andalouse'),
(14, 'Gruyère'),
(15, 'Chili'),
(16, 'Marocaine'),
(17, 'Poivre');



CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `composition` varchar(100) NOT NULL,
  `prix` float(4) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `produit` (`id`, `categorie`, `name`, `composition`, `prix`, `image`) VALUES
(1, 'burger', 'Fresh Escalope', 'Escalope, crudités, cheddar', 5, 'http://www.hamamet-food.com/wp-content/uploads/2013/10/burger-fresh-escalope.png'),
(2, 'burger', 'Mix', 'Escalope, steak, crudités, cheddar', 5.7, 'http://www.hamamet-food.com/wp-content/uploads/2013/10/burger-mix.png'),
(3, 'burger', 'Chicken', 'Chicken, crudités, cheddar', 5, 'http://www.hamamet-food.com/wp-content/uploads/2013/10/burger-chicken.png'),
(4, 'burger', 'Maxi', 'Steak, crudités, cheddar', 4.5, 'http://www.hamamet-food.com/wp-content/uploads/2013/10/burger-maxi.png'),
(5, 'burger', 'Chèvre', 'Steak, crudités, chèvre', 4.5, 'http://www.hamamet-food.com/wp-content/uploads/2013/10/burger-chevre.jpg'),
(6, 'burger', 'Bleu', 'Steak, crudités, bleu', 4.5, 'http://www.hamamet-food.com/wp-content/uploads/2013/10/burger-bleu.png'),
(7, 'burger', 'Baps', 'Steak, crudités, roastie, cheddar', 5.5, 'http://www.hamamet-food.com/wp-content/uploads/2013/10/burger-baps-1.png'),
(8, 'burger', 'Tower', 'Chicken, crudités, roastie, cheddar', 5.5, 'http://www.hamamet-food.com/wp-content/uploads/2013/10/burger-tower.png'),
(9, 'burger', 'Suprême', 'Chicken, steak, crudités, cheddar', 5.7, 'http://www.hamamet-food.com/wp-content/uploads/2013/10/burger-supreme.png'),
(10, 'burger', 'Hamamet', 'Chicken, steak, roastie, crudités, cheddar', 6.7, 'http://www.hamamet-food.com/wp-content/uploads/2013/10/burger-hamamet.png'),
(11, 'burger', 'Chèvre miel', 'Escalope, chèvre, miel, saice fromagère, crudités, gratin de pommes de terre', 6.5, 'http://www.hamamet-food.com/wp-content/uploads/2013/10/burger-chevre-miel.png'),
(12, 'tacos', 'Steak', 'Steak, salade, tomate, oignons, sauce fromagère', 6.5, 'http://www.hamamet-food.com/wp-content/uploads/2014/12/tacossteak.png'),
(13, 'tacos', 'Chicken', 'Poulet, salade, tomate, oignons, sauce fromagère', 6.5, 'http://www.hamamet-food.com/wp-content/uploads/2014/12/tacos-escalope.png'),
(14, 'tacos', 'Tenders', 'Poulet frit, salade, tomate, oignons, sauce fromagère', 6.5, 'http://www.hamamet-food.com/wp-content/uploads/2013/10/tacostendre.png'),
(15, 'tacos', 'Kefta', 'Kefta, salade, tomate, oignons, sauce fromagère', 6.5, 'http://www.hamamet-food.com/wp-content/uploads/2014/12/tacos-kefta.png'),
(16, 'tacos', 'Fish', 'Poisson, salade, tomate, oignons, sauce fromagère', 6.5, 'http://www.hamamet-food.com/wp-content/uploads/2014/12/tacos-fish.png'),
(17, 'tacos', 'Cordon bleu', 'Dinde, salade, tomate, oignons, sauce fromagère', 6.5, 'http://www.hamamet-food.com/wp-content/uploads/2014/12/tacos-cordonbleu.png'),
(18, 'tacos', 'Merguez', 'Merguez, salade, tomate, oignons, sauce fromagère', 6.5, 'http://www.hamamet-food.com/wp-content/uploads/2014/12/tacos-merguez.png'),
(19, 'tacos', 'Chicken épicé', 'Poulet épicé, salade, tomate, oignons, sauce fromagère', 6.5, 'http://www.hamamet-food.com/wp-content/uploads/2014/12/tacos-chicken-epice.png'),
(20, 'tacos', 'Chicken marinée', 'Poulet mariné, salade, tomate, oignons, sauce fromagère', 6.5, 'http://www.hamamet-food.com/wp-content/uploads/2014/12/tacos-poulet-marine.png'),
(21, 'pizza', 'Margarita', 'tomates, fromage', 5.5, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/marguarita.png'),
(22, 'pizza', 'Thonata', 'tomate, fromage, oignons, thon, oeuf', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/thon.png'),
(23, 'pizza', 'Orientale', 'tomate, fromage, merguez, oignons, olives', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/orientale.png'),
(24, 'pizza', '4 fromages', 'tomate, mozza, chèvre, reblochon, gruyère', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/4fromages.png'),
(25, 'pizza', 'Américaine', 'tomate, fromage, steak, poivrons, oeuf, oignons', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/americaine.png'),
(26, 'pizza', 'Reine', 'tomate, mozza, jambon, champignons', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/reine.png'),
(27, 'pizza', 'Mexicaine', 'tomate, fromage, oeuf, viande hachée, merguez', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/mexicaine.png'),
(28, 'pizza', 'Végétarienne', 'tomate, fromage, champignons, poivron, oignon, oeuf', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/vegetarienne.png'),
(29, 'pizza', 'Suprême', 'tomate, mozza, roquefort, tomates fraiches', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/supreme.png'),
(30, 'pizza', '3 jambons', 'tomate, mozza, jambon, lardons, chorizo', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/3jambons.png'),
(31, 'pizza', 'Chicken', 'tomate, fromage, poulet, pomme de terre', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/chicken.png'),
(32, 'pizza', 'Boursin', 'tomate, fromage, lardons, Boursin', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/boursin.png'),
(33, 'pizza', 'Royale', 'tomate, fromage, champignons, merguez, steak, jambon de dinde, poivrons, olives', 10, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/royale1.png'),
(34, 'pizza', 'Copa', 'tomate, fromage, champignons, poulet, chorizo, jambon, oignons, olives, tomates fraîches', 10, 'http://www.hamamet-food.com/wp-content/uploads/2013/10/livraison-pizza-copa-euro-2016.png'),
(35, 'pizza', 'Norvégienne', 'crème, fromage, saumon', 10.5, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/norvegienne.png'),
(36, 'pizza', 'Kebab', 'crème, fromage, kebab, poivrons, oignons', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/kebab1.png'),
(37, 'pizza', 'Boisée', 'crème, fromage, escalope, poivrons, sauce fromagère', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/boisee.png'),
(38, 'pizza', 'Milano', 'crème, fromage, viande hachée, pomme de terre', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/milano.png'),
(39, 'pizza', 'Fermière', 'crème, fromage, moutarde, poulet, tomates fraiches', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/fermiere.png'),
(40, 'pizza', 'Barbecue', 'sauce barbecue, fromage, viande hachée, poivrons', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/barbecue.png'),
(41, 'pizza', 'Algérienne', 'sauce algérienne, poulet mariné, poivrons, p. de terre, sauce gruyère', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/algerienne.png'),
(42, 'pizza', 'Miami', 'crème, mozza, poulet, viande hachée, chèvre', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/miami.png'),
(43, 'pizza', 'Hamamet', 'crème, sauce pimenté, mozza, poulet, viande hachée, Boursin', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/hamamet.png'),
(44, 'pizza', 'La chef', 'crème, mozza, lardon, tomates fraiches, chèvre', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/chef.png'),
(45, 'pizza', 'Tartiflette', 'crème, mozza, lardons, pomme de terre, reblochon', 7, 'http://www.hamamet-food.com/wp-content/uploads/2015/07/tartiflette.png');




-- --------------------------------------------------------

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `produitId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `commande` (`id`, `userId`, `produitId`) VALUES
(1, 1, 14),
(2, 2, 14),
(3, 3, 14),
(4, 4, 14),
(5, 5, 14);


--
-- Index pour la table `admin`

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--

-- Index pour la table `sauces`
--
ALTER TABLE `sauces`
  ADD PRIMARY KEY (`id`);


--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tacos`

--
-- AUTO_INCREMENT pour la table `admin`

ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

