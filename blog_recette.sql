CREATE DATABASE  IF NOT EXISTS `blog_recette` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `blog_recette`;

--
-- Table structure for table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE `recette` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `author` varchar(100) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `dateCreation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recette`
--

INSERT INTO `recette` VALUES (1,'Tartiflette','La tartiflette savoyarde est un gratin de pommes de terre avec du Reblochon fondu dessus','Nicolas','tartiflette.jpg','2019-01-07 00:00:00'),(2,'Velouté de carottes au cumin','Un velouté de carotte au cumin','Nicolas','veloute-de-carotte-au-cumin.jpg','2019-01-08 00:00:00');

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRecette` int(11) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  `note` int(11) NOT NULL,
  `dateCreation` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Commentaire_Recette` (`idRecette`),
  CONSTRAINT `FK_Commentaire_Recette` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRecette` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `quantite` int(11) NOT NULL,
  `unit` char(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Commentaire_Recette` (`idRecette`),
  CONSTRAINT `FK_Ingredient_Recette` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO `ingredient` VALUES (1,1,'Pommes de  terre ',750,'g'),(2,1,'Reblochon',1,'u'),(3,1,'Lardons',200,'g'),(4,1,'Crème fraîche épaisse',3,'cs'),(5,1,'Oignons',2,'u'),(6,1,'Beurre',20,'g'),(7,1,'Sel',1,'cc'),(8,1,'Poivre',1,'p'),(9,2,'Carottes',800,'g'),(10,2,'Oignon',1,'u'),(11,2,'Bouillon de volaille',1,'l'),(12,2,'Cumin',1,'cs'),(13,2,'Crème fraîche épaisse',2,'cs'),(14,2,'Huile d’olive',2,'cs'),(15,2,'Sel',1,'cc'),(16,2,'Poivre',1,'p');

