-- Supprimer la base de données si elle existe
DROP DATABASE IF EXISTS takeTea;

-- Créer une nouvelle base de données
CREATE DATABASE IF NOT EXISTS takeTea;

-- Utiliser la base de données créée
USE takeTea;

-- Table pour les utilisateurs
CREATE TABLE Utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    post ENUM('admin', 'simple') DEFAULT 'simple' -- Spécification de la colonne avec une valeur par défaut
);

-- Insertion dans la table Utilisateurs
INSERT INTO Utilisateurs (nom, email, mot_de_passe, post) VALUES ("Admin", "cult@to.fr", SHA1('1234'), 'admin');
INSERT INTO Utilisateurs (nom, email, mot_de_passe, post) VALUES ("Utilisateur", "util@to.fr", SHA1('1234'), 'simple');


-- Table pour les variétés de thé
CREATE TABLE The (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    occupation DECIMAL(10,2) NOT NULL, -- en m2
    rendement_par_pied DECIMAL(10,2) NOT NULL
);

-- Insertion de données de test supplémentaires pour les variétés de thé
INSERT INTO The (nom, occupation, rendement_par_pied) VALUES
    ('Thé au jasmin', 3.0, 0.85),
    ('Thé au gingembre', 2.8, 0.75),
    ('Thé au citron', 2.9, 0.78),
    ('Thé aux fruits rouges', 3.2, 0.82),
    ('Thé à la menthe', 3.1, 0.80);



INSERT INTO The (nom, occupation, rendement_par_pied) VALUES
    ('Thé vert', 2.5, 0.8),
    ('Thé noir', 2.7, 0.7),
    ('Thé oolong', 2.6, 0.75),
    ('Thé vert clair', 3.2, 0.9),
    ('Thé noir foncé', 2.9, 0.65),
    ('Thé oolong léger', 2.4, 0.8),
    ('Thé blanc pur', 3.0, 0.75);