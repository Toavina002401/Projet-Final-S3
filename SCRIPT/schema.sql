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