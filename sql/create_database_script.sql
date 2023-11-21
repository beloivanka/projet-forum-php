DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
    `idUtilisateur` int NOT NULL AUTO_INCREMENT,
    `prenomUtilisateur` longtext NOT NULL,
    `nomUtilisateur` longtext NOT NULL,
    `mailUtilisateur` longtext NOT NULL,
    `mdpUtilisateur` longtext NOT NULL,
    `photoUtilisateur` longtext NOT NULL,
PRIMARY KEY (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
    `idCategorie` int NOT NULL AUTO_INCREMENT,
    `titreCategorie` longtext NOT NULL,
PRIMARY KEY (`idCategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `sujet`;
CREATE TABLE IF NOT EXISTS `sujet` (
    `idSujet` int NOT NULL AUTO_INCREMENT,
    `titreSujet` longtext NOT NULL,
    `idCategorie` int NOT NULL,
PRIMARY KEY (`idSujet`),
CONSTRAINT `fk_categorie` FOREIGN KEY (`idCategorie`) REFERENCES categorie (`idCategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
    `idMessage` int NOT NULL AUTO_INCREMENT,
    `message` longtext NOT NULL,
    `idSujet` int NOT NULL,
    `idUtilisateur` int NOT NULL,
PRIMARY KEY (`idMessage`),
CONSTRAINT `fk_sujet` FOREIGN KEY (`idSujet`) REFERENCES sujet (`idSujet`),
CONSTRAINT `fk_utilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES utilisateur (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
COMMIT;
