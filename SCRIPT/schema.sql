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


-- Table pour les parcelles
CREATE TABLE Parcelle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_parcelle INT NOT NULL,
    surface_HA DECIMAL(10,2) NOT NULL, -- en ha
    id_variete INT,
    FOREIGN KEY (id_variete) REFERENCES The(id)
);


INSERT INTO Parcelle (numero_parcelle, surface_HA, id_variete) VALUES
    (1, 5.5, 1),
    (2, 4.0, 2),
    (3, 3.8, 3),
    (5, 4.7, 1),
    (6, 3.5, 2),
    (7, 5.0, 3),
    (8, 7.2, 5),
    (9,4.2,5),
    (10,2.2,6),
    (11,1.2,5)
    ;


-- Insertion de données de test supplémentaires pour les parcelles
INSERT INTO Parcelle (numero_parcelle, surface_HA, id_variete) VALUES
    (24, 5.3, 1),
    (25, 6.7, 2),
    (26, 4.5, 3),
    (27, 7.1, 8),
    (28, 5.9, 5),
    (29, 6.2, 6),
    (30, 4.8, 7),
    (31, 7.5, 11),
    (32, 5.6, 12),
    (33, 6.9, 9);


-- Table pour les cueilleurs
CREATE TABLE Cueilleurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    genre ENUM('Masculin', 'Féminin') NOT NULL,
    datenaissance DATE -- Suppression de la colonne salaire
);

-- Insertion de données de test pour les cueilleurs
INSERT INTO Cueilleurs (nom, genre, datenaissance) VALUES
    ('Jean Dupont', 'Masculin', '1990-05-15'),
    ('Marie Leclerc', 'Féminin', '1987-12-28'),
    ('Pierre Durand', 'Masculin', '1995-08-03'),
    ('Alice Martin', 'Féminin', '1992-04-20'),
    ('Paul Dupuis', 'Masculin', '1989-10-10'),
    ('Sophie Lefèvre', 'Féminin', '1993-07-18'),
    ('Martin Lambert', 'Masculin', '1985-02-09');


-- Table pour les types de dépenses
CREATE TABLE TypeDepense (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);


    INSERT INTO TypeDepense (nom) VALUES
        ('Engrais'),
        ('Carburant'),
        ('Logistique'),
        ('Emballage'),
        ('Entretien'),
        ('Transport'),
        ('Marketing');
    -- Insertion de quelques données de test supplémentaires pour les types de dépenses
    INSERT INTO TypeDepense (nom) VALUES
        ('Fournitures de bureau'),
        ('Frais de maintenance');


-- Table pour les salaires
CREATE TABLE Salaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cueilleur INT,
    salaire DECIMAL(10,2),
    datelastupdate DATE,
    FOREIGN KEY (id_cueilleur) REFERENCES Cueilleurs(id)
);

-- Insertion de données de test pour les salaires
INSERT INTO Salaire (id_cueilleur, salaire, datelastupdate) VALUES
    (1, 1500.50, '2024-02-10'),
    (2, 1600.75, '2024-02-11'),
    (3, 1400.25, '2024-02-12'),
    (4, 1550.00, '2024-02-13'),
    (8, 1650.25, '2024-02-14'),
    (6, 1450.75, '2024-02-15'),
    (7, 1700.00, '2024-02-16');