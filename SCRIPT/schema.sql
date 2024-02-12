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




-- Insertion de données de test pour les variétés de thé
INSERT INTO The (nom, occupation, rendement_par_pied) VALUES
    ('Thé vert', 2.5, 0.8),
    ('Thé noir', 2.7, 0.7),
    ('Thé oolong', 2.6, 0.75);

-- Insertion de données de test pour les parcelles
INSERT INTO Parcelle (numero_parcelle, surface_HA, id_variete) VALUES
    (1, 5.5, 1),
    (2, 4.0, 2),
    (3, 3.8, 3);

-- Insertion de données de test pour les cueilleurs
INSERT INTO Cueilleurs (nom, genre, salaire) VALUES
    ('Jean Dupont', 'Masculin', 10.50),
    ('Marie Leclerc', 'Féminin', 11.20),
    ('Pierre Durand', 'Masculin', 9.75);

-- Insertion de données de test pour les types de dépenses
INSERT INTO TypeDepense (nom) VALUES
    ('Engrais'),
    ('Carburant'),
    ('Logistique');

-- Insertion de données de test pour les dépenses
INSERT INTO Depenses (dates, nom, id_typeDep, montant) VALUES
    ('2024-02-10', 'Achat d engrais', 1, 50.25),
    ('2024-02-11', 'Achat de carburant', 2, 30.75),
    ('2024-02-12', 'Frais de logistique', 3, 100.00);

-- Insertion de données de test pour les cueillettes
INSERT INTO Cueillettes (date_cueillette, id_cueilleur, id_parcelle, poids_cueilli) VALUES
    ('2024-02-10', 1, 1, 12.5),
    ('2024-02-11', 2, 2, 10.8),
    ('2024-02-12', 3, 3, 9.2);

-- Insertion de données de test pour les plantations
INSERT INTO Plantation (id_parcelle, id_the, date_plantation) VALUES
    (1, 1, '2023-04-01'),
    (2, 2, '2023-03-15'),
    (3, 3, '2023-04-20');
