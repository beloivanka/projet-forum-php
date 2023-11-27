DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
    `idUtilisateur` int NOT NULL AUTO_INCREMENT,
    `prenomUtilisateur` varchar(255) NOT NULL,
    `nomUtilisateur` varchar(255) NOT NULL,
    `mailUtilisateur` varchar(255) NOT NULL,
    `mdpUtilisateur` varchar(255) NOT NULL,
    `photoUtilisateur` varchar(255) NOT NULL,
PRIMARY KEY (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
    `idCategorie` int NOT NULL AUTO_INCREMENT,
    `titreCategorie` varchar(255) NOT NULL,
    `description` varchar(255) NOT NULL,
    `imageCategorie` varchar(255) NOT NULL,
    `urlNom` varchar(255) NOT NULL,
PRIMARY KEY (`idCategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `sujet`;
CREATE TABLE IF NOT EXISTS `sujet` (
    `idSujet` int NOT NULL AUTO_INCREMENT,
    `titreSujet` varchar(255) NOT NULL,
    `messageSujet` varchar(255) NOT NULL,
    `dateSujet` datetime NOT NULL,
    `idCategorie` int NOT NULL,
    `idUtilisateur` int NULL,
PRIMARY KEY (`idSujet`),
CONSTRAINT `fk_categorie` FOREIGN KEY (`idCategorie`) REFERENCES categorie (`idCategorie`),
CONSTRAINT `fk_utilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES utilisateur (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
    `idMessage` int NOT NULL AUTO_INCREMENT,
    `message` varchar(255) NOT NULL,
    `dateMessage` datetime NOT NULL,
    `idSujet` int NOT NULL,
    `idUtilisateur` int NULL,
PRIMARY KEY (`idMessage`),
CONSTRAINT `fk_sujet` FOREIGN KEY (`idSujet`) REFERENCES sujet (`idSujet`),
CONSTRAINT `fk_utilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES utilisateur (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
COMMIT;
