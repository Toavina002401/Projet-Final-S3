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

-- Table pour les parcelles
CREATE TABLE Parcelle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_parcelle INT NOT NULL,
    surface_HA DECIMAL(10,2) NOT NULL, -- en ha
    id_variete INT,
    FOREIGN KEY (id_variete) REFERENCES The(id)
);

-- Table pour les cueilleurs
CREATE TABLE Cueilleurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    genre ENUM('Masculin', 'Féminin') NOT NULL,
    salaire DECIMAL(10,2)
);

-- Table pour les types de dépenses
CREATE TABLE TypeDepense (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);

-- Table pour les dépenses
CREATE TABLE Depenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dates DATE,
    nom VARCHAR(255) NOT NULL,
    id_typeDep INT,
    montant DECIMAL(10,2),
    FOREIGN KEY (id_typeDep) REFERENCES TypeDepense(id)
);

-- Table pour les cueillettes
CREATE TABLE Cueillettes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_cueillette DATE NOT NULL,
    id_cueilleur INT,
    id_parcelle INT,
    poids_cueilli DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_cueilleur) REFERENCES Cueilleurs(id),
    FOREIGN KEY (id_parcelle) REFERENCES Parcelle(id)
);

-- Table pour les plantations
CREATE TABLE Plantation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_parcelle INT,
    id_the INT,
    date_plantation DATE,
    FOREIGN KEY (id_parcelle) REFERENCES Parcelle(id),
    FOREIGN KEY (id_the) REFERENCES The(id)
);

-- Fonction pour récupérer tous les cueillettes dans un parcelle pour valider le poids
-- getSurfaceParcelle en m2
-- Récupérer toutes les plantations
