<?php
    include("dbConnection.php");

    // Connexion admin
    function connexion_Admin($email, $mdp){
        $query = "SELECT id FROM Utilisateurs WHERE email = ? AND mot_de_passe = SHA1(?) AND post = 'admin'"; 
        $stmt = dbconnect()->prepare($query);
        $stmt->bind_param("ss", $email, $mdp);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id);
            $stmt->fetch();
            return $id;
        } else {
            return -1;
        }
    }

     // Connexion Utilisateurs
    function connexion_Utilisateurs($email,$mdp){
  
        $query = "SELECT id FROM Utilisateurs WHERE email = ? AND mot_de_passe = SHA1(?) AND post = 'simple'";
        $stmt = dbconnect()->prepare($query);
        $stmt->bind_param("ss", $email, $mdp);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id);
            $stmt->fetch();
            return $id;
        } else {
            return -1;
        }
    }

    function getUtilisateurById($bdd, $id){
        $query = "SELECT * FROM Utilisateurs WHERE id = ?";
        $stmt = $bdd->prepare($query);
        if ($stmt) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    return $result->fetch_assoc(); // Retourne un seul utilisateur
                } else {
                    return null; // Aucun utilisateur trouvé avec cet identifiant
                }
            } else {
                return null; 
            }
        } else {
            return null; 
        }
    }

    //////////////////////////------------------------------------/////////////////////////////////////
    //////////////////////////------------------------------------/////////////////////////////////////
    //////////////////////////------------------------------------/////////////////////////////////////

    //GESTION THEA  
        // LISTER THEA
            // Fonction pour récupérer toutes les variétés de thé
            function getAllThea(){
                $query = "SELECT * FROM The";
                $result = dbconnect()->query($query);
                if ($result) {
                    return $result->fetch_all(MYSQLI_ASSOC);
                } else {
                    return [];
                }
            }
            // Fonction pour récupérer toutes les variétés de thé triées par nom
            function getTheaByAlphabet(){
                $query = "SELECT * FROM The ORDER BY nom";
                $result = dbconnect()->query($query);
                if ($result) {
                    return $result->fetch_all(MYSQLI_ASSOC);
                } else {
                    return [];
                }
            }
            // Fonction pour récupérer toutes les variétés de thé triées par occupation (du plus grand au plus petit)
            function getTheaByOccupation(){
                $query = "SELECT * FROM The ORDER BY occupation DESC";
                $result = dbconnect()->query($query);
                if ($result) {
                    return $result->fetch_all(MYSQLI_ASSOC);
                } else {
                    return [];
                }
            }
            // Fonction pour récupérer toutes les variétés de thé triées par rendement par pied (du plus grand au plus petit)
            function getTheaByRendement(){
                $query = "SELECT * FROM The ORDER BY rendement_par_pied DESC";
                $result = dbconnect()->query($query);
                if ($result) {
                    return $result->fetch_all(MYSQLI_ASSOC);
                } else {
                    return [];
                }
            }

    
        //UPDATE THEA HERE
        function updateThea($id, $nom, $occupation, $rendement, $prix_vente){
            $query = "UPDATE The SET nom = ?, occupation = ?, rendement_par_pied = ?, prix_de_vente = ? WHERE id = ?";
            
            $stmt = dbconnect()->prepare($query);
            
            if ($stmt) {
                // Binder les paramètres
                $stmt->bind_param("sdddi", $nom, $occupation, $rendement, $prix_vente, $id);
                
                // Exécuter la requête
                if ($stmt->execute()) {
                    // La mise à jour a réussi
                    return true;
                } else {
                    // La mise à jour a échoué
                    return false;
                }
            } else {
                // La préparation de la requête a échoué
                return false;
            }
        }
    
    //DELETE THEA
    function deleteThea($id){
        
        // Requête de suppression
        $query = "DELETE FROM The WHERE id = ?";
        
        $stmt = dbconnect()->prepare($query);
        
        if ($stmt) {
            // Binder le paramètre
            $stmt->bind_param("i", $id);
            
            if ($stmt->execute()) {
                // La suppression a réussi
                return true;
            } else {
                // La suppression a échoué
                return false;
            }
        } else {
            // La préparation de la requête a échoué
            return false;
        }
    }

        //CREATE THEA HERE
        function createThea($nom, $occupation, $rendement, $prix_vente){
            $query = "INSERT INTO The (nom, occupation, rendement_par_pied, prix_de_vente) VALUES (?, ?, ?, ?)";
            
            // Préparer la requête
            $stmt = dbconnect()->prepare($query);
            
            if ($stmt) {
                $stmt->bind_param("sddd", $nom, $occupation, $rendement, $prix_vente);
                
                // Exécuter la requête
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

    //GET THEA by id
    function getTeaById($id) {
       
        $bdd = dbconnect();
        
        // Préparation de la requête SQL
        $query = "SELECT * FROM The WHERE id = ?";
        
        // Préparation de la requête
        $stmt = $bdd->prepare($query);
        
        // Vérification de la préparation de la requête
        if ($stmt) {
            // Liaison des paramètres et exécution de la requête
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                // Récupération du résultat
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    // Récupération des données
                    $tea = $result->fetch_assoc();
                    return $tea; // Retourner les données de la variété de thé
                } else {
                    return null; // Aucune variété de thé trouvée avec cet identifiant
                }
            } else {
                return null; // Erreur lors de l'exécution de la requête
            }
        } else {
            return null; // Erreur lors de la préparation de la requête
        }
    }
    
    
    //////////////////////////------------------------------------/////////////////////////////////////
    //////////////////////////------------------------------------/////////////////////////////////////
    //////////////////////////------------------------------------/////////////////////////////////////

     //GEStTION PARCELLE
        // LISTER PARCELLE
            // Par Surface
            function listParcelleBySurface(){
                $query = "SELECT * FROM Parcelle";
                $result = dbconnect()->query($query);
                if ($result) {
                    return $result->fetch_all(MYSQLI_ASSOC);
                } else {
                    return [];
                }
            }         
        // Par Numero
            function listParcelleByNumero(){
                $query = "SELECT * FROM Parcelle ORDER BY numero_parcelle";
                $result = dbconnect()->query($query);
                if ($result) {
                    return $result->fetch_all(MYSQLI_ASSOC);
                } else {
                    return [];
                }
            }


    // CREATE PARCELLE
        function createParcelle($numero, $surface, $id_variete){
        
            $query = "INSERT INTO Parcelle (numero_parcelle, surface_HA, id_variete) VALUES (?, ?, ?)";
            $stmt = dbconnect()->prepare($query);
            if ($stmt) {
                $stmt->bind_param("idi", $numero, $surface, $id_variete);
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

    // DELETE PARCELLE
        function deleteParcelle($id){
            $query = "DELETE FROM Parcelle WHERE id = ?";
            $stmt = dbconnect()->prepare($query);
            if ($stmt) {
                $stmt->bind_param("i", $id);
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }


    // UPDATE PARCELLE
    function updateParcelle($id, $numero, $surface, $id_variete){
        
        $query = "UPDATE Parcelle SET numero_parcelle = ?, surface_HA = ?, id_variete = ? WHERE id = ?";
        $stmt = dbconnect()->prepare($query);
        if ($stmt) {
            $stmt->bind_param("idii", $numero, $surface, $id_variete, $id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    
    // Fonction pour obtenir parcelle par son id
    function getParcelleById($id) {
       
        $bdd = dbconnect();
        
        // Préparation de la requête SQL
        $query = "SELECT * FROM Parcelle WHERE id = ?";
        
        // Préparation de la requête
        $stmt = $bdd->prepare($query);
        
        // Vérification de la préparation de la requête
        if ($stmt) {
            // Liaison des paramètres et exécution de la requête
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                // Récupération du résultat
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    // Récupération des données
                    $tea = $result->fetch_assoc();
                    return $tea; // Retourner les données de la variété de thé
                } else {
                    return null; // Aucune variété de thé trouvée avec cet identifiant
                }
            } else {
                return null; // Erreur lors de l'exécution de la requête
            }
        } else {
            return null; // Erreur lors de la préparation de la requête
        }
    }


    //////////////////////////------------------------------------/////////////////////////////////////
    //////////////////////////------------------------------------/////////////////////////////////////
    //////////////////////////------------------------------------/////////////////////////////////////
    
     //GESTION CUEILLEURS
        // LISTER CUEILLEURS
                // Par Nom
                function listCueilleursByNom(){
                    $query = "SELECT * FROM Cueilleurs ORDER BY nom";
                    $result = dbconnect()->query($query);
                    if ($result) {
                        return $result->fetch_all(MYSQLI_ASSOC);
                    } else {
                        return [];
                    }
                }
        
        // CREATE CUEILLEUR
            function createCueilleur($nom, $genre, $salaire){
                    $query = "INSERT INTO Cueilleurs (nom, genre, datenaissance) VALUES (?, ?, ?)";
                    $stmt = dbconnect()->prepare($query);
                    if ($stmt) {
                        $stmt->bind_param("sss", $nom, $genre, $salaire);
                        if ($stmt->execute()) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                }

        

       
      
      
       
        // DELETE CUEILLEUR
            function deleteCueilleur($id){
                    $query = "DELETE FROM Cueilleurs WHERE id = ?";
                    $stmt = dbconnect()->prepare($query);
                    if ($stmt) {
                        $stmt->bind_param("i", $id);
                        if ($stmt->execute()) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                }

        
        // UPDATE CUEILLEUR
            function updateCueilleur($id, $nom, $genre, $salaire){
                    $query = "UPDATE Cueilleurs SET nom = ?, genre = ?, datenaissance = ? WHERE id = ?";
                    $stmt = dbconnect()->prepare($query);
                    if ($stmt) {
                        $stmt->bind_param("sssi", $nom, $genre, $salaire, $id);
                        if ($stmt->execute()) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                }

    
        // Fonction pour obtenir l'ID du cueilleur par son nom
            function getidcueilleurparnom($nom_cueilleur){
                $bdd = dbconnect();
                $query = "SELECT id FROM Cueilleurs WHERE nom = ?";
                $stmt = $bdd->prepare($query);
                if ($stmt) {
                    $stmt->bind_param("s", $nom_cueilleur);
                    if ($stmt->execute()) {
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            return $row['id']; // Retourne l'ID du cueilleur
                        } else {
                            return null; // Aucun cueilleur trouvé avec ce nom
                        }
                    } else {
                        return null; // Erreur lors de l'exécution de la requête
                    }
                } else {
                    return null; // Erreur de préparation de la requête
                }
            }

        //get by id cuilleur
            function getCueilleurById($id) {
                // Connexion à la base de données (à remplacer par votre méthode de connexion)
                $bdd = dbconnect();
                
                // Préparation de la requête SQL
                $query = "SELECT * FROM Cueilleurs WHERE id = ?";
                
                // Préparation de la requête
                $stmt = $bdd->prepare($query);
                
                // Vérification de la préparation de la requête
                if ($stmt) {
                    // Liaison des paramètres et exécution de la requête
                    $stmt->bind_param("i", $id);
                    if ($stmt->execute()) {
                        // Récupération du résultat
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            // Récupération des données
                            $cueilleur = $result->fetch_assoc();
                            return $cueilleur; // Retourner les données du cueilleur
                        } else {
                            return null; // Aucun cueilleur trouvé avec cet identifiant
                        }
                    } else {
                        return null; // Erreur lors de l'exécution de la requête
                    }
                } else {
                    return null; // Erreur lors de la préparation de la requête
                }
            }
            
    
    //////////////////////////------------------------------------/////////////////////////////////////
    //////////////////////////------------------------------------/////////////////////////////////////
    //////////////////////////------------------------------------/////////////////////////////////////


     //GESTION CATEGORIE DEPENSE
    
        // LISTER LES CATEGORIES DE DEPENSES
        function listCategoriesDepense(){
            $query = "SELECT * FROM TypeDepense";
            $result = dbconnect()->query($query);
            if ($result) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return [];
            }
        }


    // CREER UNE CATEGORIE DE DEPENSE
        function createCategorieDepense($nom){
            $query = "INSERT INTO TypeDepense (nom) VALUES (?)";
            $stmt = dbconnect()->prepare($query);
            if ($stmt) {
                $stmt->bind_param("s", $nom);
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }


    // DELETE UNE CATEGORIE DE DEPENSE
        function deleteCategorieDepense($id){
            $query = "DELETE FROM TypeDepense WHERE id = ?";
            $stmt = dbconnect()->prepare($query);
            if ($stmt) {
                $stmt->bind_param("i", $id);
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

    // UPDATE UNE CATEGORIE DE DEPENSE
        function updateCategorieDepense($id, $nom){
            $query = "UPDATE TypeDepense SET nom = ? WHERE id = ?";
            $stmt = dbconnect()->prepare($query);
            if ($stmt) {
                $stmt->bind_param("si", $nom, $id);
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

    
    // Fonction pour obtenir l'ID de la catégorie de dépense par son nom
        function getidparnomcategoriedepense($nom_categorie){
            $bdd = dbconnect(); // Obtenir l'objet de connexion à la base de données
            $query = "SELECT id FROM TypeDepense WHERE nom = ?";
            $stmt = $bdd->prepare($query);
            if ($stmt) {
                $stmt->bind_param("s", $nom_categorie);
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        return $row['id']; // Retourne l'ID de la catégorie de dépense
                    } else {
                        return null; // Aucune catégorie de dépense trouvée avec ce nom
                    }
                } else {
                    return null; // Erreur lors de l'exécution de la requête
                }
            } else {
                return null; // Erreur de préparation de la requête
            }
        }


    //get depense by id
        function getTypeDepenseById($id) {
            // Connexion à la base de données (à remplacer par votre méthode de connexion)
            $bdd = dbconnect();
            
            // Préparation de la requête SQL
            $query = "SELECT * FROM TypeDepense WHERE id = ?";
            
            // Préparation de la requête
            $stmt = $bdd->prepare($query);
            
            // Vérification de la préparation de la requête
            if ($stmt) {
                // Liaison des paramètres et exécution de la requête
                $stmt->bind_param("i", $id);
                if ($stmt->execute()) {
                    // Récupération du résultat
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        // Récupération des données
                        $typeDepense = $result->fetch_assoc();
                        return $typeDepense; // Retourner les données du type de dépense
                    } else {
                        return null; // Aucun type de dépense trouvé avec cet identifiant
                    }
                } else {
                    return null; // Erreur lors de l'exécution de la requête
                }
            } else {
                return null; // Erreur lors de la préparation de la requête
            }
        }
    


//////////////////////////------------------------------------/////////////////////////////////////
//////////////////////////------------------------------------/////////////////////////////////////
//////////////////////////------------------------------------/////////////////////////////////////

 //Configuration salaire

        // CREATE SALAIRE
        function createSalaire($id_cueilleur, $salaire, $datelastupdate){
            $query = "INSERT INTO Salaire (id_cueilleur, salaire, datelastupdate) VALUES (?, ?, ?)";
            $stmt = dbconnect()->prepare($query);
            if ($stmt) {
                $stmt->bind_param("ids", $id_cueilleur, $salaire, $datelastupdate);
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        // LISTER SALAIRES
        function listSalaires(){
            $query = "SELECT * FROM Salaire";
            $result = dbconnect()->query($query);
            if ($result) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return [];
            }
        }

        function listSalairesPourNom(){
            $query = "SELECT distinct id_cueilleur from salaire";
            $result = dbconnect()->query($query);
            if ($result) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return [];
            }
        }

        // DELETE SALAIRE
        function deleteSalaire($id){
            $query = "DELETE FROM Salaire WHERE id = ?";
            $stmt = dbconnect()->prepare($query);
            if ($stmt) {
                $stmt->bind_param("i", $id);
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        // UPDATE SALAIRE
        function updateSalaire($id, $id_cueilleur, $salaire, $datelastupdate){
            $query = "UPDATE Salaire SET id_cueilleur = ?, salaire = ?, datelastupdate = ? WHERE id = ?";
            $stmt = dbconnect()->prepare($query);
            if ($stmt) {
                $stmt->bind_param("idsi", $id_cueilleur, $salaire, $datelastupdate, $id);
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        //get by id salaire
        function getSalaireById($id) {
            $bdd = dbconnect();
            
            $query = "SELECT * FROM Salaire WHERE id = ?";
            
            $stmt = $bdd->prepare($query);
            
            if ($stmt) {
                $stmt->bind_param("i", $id);
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $salaire = $result->fetch_assoc();
                        return $salaire;
                    } else {
                        return null;
                    }
                } else {
                    return null;
                }
            } else {
                return null;
            }
        }

        // Fonction pour enregistrer une nouvelle dépense
        function saisieDepense($date, $id_typeDepense, $montant){
            $bdd = dbconnect(); // Obtenir l'objet de connexion à la base de données
            $query = "INSERT INTO Depenses (dates, id_typeDep, montant) VALUES (?, ?, ?)";
            $stmt = $bdd->prepare($query);
            if ($stmt) {
                $stmt->bind_param("sis", $date, $id_typeDepense, $montant);
                if ($stmt->execute()) {
                    return true; // Insertion réussie
                } else {
                    return false; // Échec de l'insertion
                }
            } else {
                return false; // Erreur de préparation de la requête
            }
        }

        //getPaiement
        function getAllPaiement() {
            $bdd = dbconnect();
            $query = "SELECT * FROM Liste_Paie";
            $result = $bdd->query($query);
            if ($result) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                // Gérer les erreurs de requête
                return [];
            }
        }

        ///Configuration regeneration
        function deleteRege($idThea){
            // Connexion à la base de données
            $bdd = dbconnect();
            
            // Requête SQL pour supprimer les données de régénération liées à l'ID de la variété de thé
            $query_delete = "DELETE FROM Regeneration WHERE id_variete = ?";
            $stmt_delete = $bdd->prepare($query_delete);
            $stmt_delete->bind_param("i", $idThea);
            
            // Exécution de la requête
            if ($stmt_delete->execute()) {
                return true; // Suppression réussie
            } else {
                return false; // Échec de la suppression
            }
        }
        
        function insertRegeneration($idTea, $months) {
            $bdd = dbconnect();
            
            // Supprimer les données de régénération existantes pour cette variété de thé
            deleteRege($idTea);
            
            // Boucle à travers les mois et insère les données de régénération
            foreach ($months as $month) {
                $query = "INSERT INTO Regeneration (id_variete, mois) VALUES (?, ?)";
                $stmt = $bdd->prepare($query);
                if ($stmt) {
                    $stmt->bind_param("ii", $idTea, $month);
                    $stmt->execute();
                } else {
                    // Gérer les erreurs de préparation de la requête
                }
            }
        }

                
     

  
    //////////////////////////////////////////////////////////////////////////////////

        // Fonction pour récupérer le poids maximum de thé attendu dans une parcelle
        function getMAX($idparcelle) {
            $bdd= dbconnect();

            // Requête SQL pour obtenir le poids maximum de thé attendu dans la parcelle
            $query = "SELECT surface_HA, id_variete FROM Parcelle WHERE id = ?";
            $stmt = $bdd->prepare($query);
            $stmt->bind_param("i", $idparcelle);
            $stmt->execute();
            $result = $stmt->get_result();

            // Vérifier si la requête a réussi
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $surface_HA = $row['surface_HA']; // Surface de la parcelle en hectares
                $id_variete = $row['id_variete']; // ID de la variété de thé

                // Requête SQL pour obtenir le rendement par pied de la variété de thé
                $query_rendement = "SELECT occupation,rendement_par_pied FROM The WHERE id = ?";
                $stmt_rendement = $bdd->prepare($query_rendement);
                $stmt_rendement->bind_param("i", $id_variete);
                $stmt_rendement->execute();
                $result_rendement = $stmt_rendement->get_result();

                // Vérifier si la requête a réussi
                if ($result_rendement->num_rows > 0) {
                    $row_rendement = $result_rendement->fetch_assoc();
                    $rendement_par_pied = $row_rendement['rendement_par_pied']; // Rendement par pied de la variété de thé
                    $occupation= $row_rendement['occupation'];

                    // Calculer la surface de la parcelle en mètres carrés
                    $surface_m2 = $surface_HA * 10000;

                    // Calculer le nombre de pieds de thé sur la parcelle
                    $nombre_pied = $surface_m2 / $occupation;

                    // Calculer le poids maximum attendu
                    $poids_max = $nombre_pied * $rendement_par_pied;

                    return $poids_max;
                }
            }

            // En cas d'erreur ou de données manquantes, retourner false
            return false;
        }

    //AFFICHER RESULTAT Poids total cueillette
            // Fonction pour calculer le poids total cueilli dans une période donnée
            function poidsTotalCueilli($datedebut, $datefin) {
                // Connexion à la base de données
                $bdd = dbconnect();

                // Requête SQL pour obtenir le poids total cueilli dans la période donnée
                $query = "SELECT SUM(poids_cueilli) AS total_poids FROM Cueillettes WHERE date_cueillette BETWEEN ? AND ?";
                $stmt = $bdd->prepare($query);
                $stmt->bind_param("ss", $datedebut, $datefin);
                $stmt->execute();
                $result = $stmt->get_result();

                // Vérifier si la requête a réussi
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    return $row['total_poids'];
                } else {
                    return 0; // En cas d'erreur ou de données manquantes, retourner 0
                }
            }

                    // Fonction pour calculer le poids total de cueillette par parcelle dans une période donnée
                    function poidTotalCuielliParParcelle($datedebut, $datefin, $idparcelle) {
                        $bdd=dbconnect();
                        // Requête SQL pour obtenir le poids total de cueillette par parcelle dans la période donnée
                        $query = "SELECT SUM(poids_cueilli) AS total_poids FROM Cueillettes WHERE id_parcelle = ? AND date_cueillette BETWEEN ? AND ?";
                        $stmt = $bdd->prepare($query);
                        $stmt->bind_param("iss", $idparcelle, $datedebut, $datefin);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Vérifier si la requête a réussi
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            return $row['total_poids'];
                        } else {
                            return 0; // En cas d'erreur ou de données manquantes, retourner 0
                        }
                    }
                    // Fonction pour calculer le poids total de cueillette par cueilleur dans une période donnée
                    function poidTotalCuilliParcueilleur($datedebut, $datefin, $idcuielleur) {
                        $bdd=dbconnect();
        
                        // Requête SQL pour obtenir le poids total de cueillette par cueilleur dans la période donnée
                        $query = "SELECT SUM(poids_cueilli) AS total_poids FROM Cueillettes WHERE id_cueilleur = ? AND date_cueillette BETWEEN ? AND ?";
                        $stmt = $bdd->prepare($query);
                        $stmt->bind_param("iss", $idcuielleur, $datedebut, $datefin);
                        $stmt->execute();
                        $result = $stmt->get_result();
        
                        // Vérifier si la requête a réussi
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            return $row['total_poids'];
                        } else {
                            return 0; // En cas d'erreur ou de données manquantes, retourner 0
                        }
                    }
        
    ////////////////////////////////////////////////////////////////////////
            
    //Poids restant sur les parcelles(Date fin)
                 
            function  getLastMonth($parcelle,$datefin){
                return "2021-01-12";
            }
            
            function poidsRestant($parcelle,$datefin){
                $date_last_renov= getLastMonth($parcelle,$datefin);

                $max = getMAX($parcelle);

                $sum_Cuiellete= poidTotalCuielliParParcelle($date_last_renov,$datefin,$parcelle);

                $result= $max - $sum_Cuiellete;
                return $result;
            }

    /////////////////////////////////////////////////////////////////////
    

    //Montant Vente Par parcelle 
        function venteParcelle($idparcelle, $datedeb, $datefin){
            // Connexion à la base de données
            $bdd = dbconnect();
            
            // Requête SQL pour obtenir les informations sur la parcelle
            $query_parcelle = "SELECT id_variete FROM Parcelle WHERE id = ?";
            $stmt_parcelle = $bdd->prepare($query_parcelle);
            $stmt_parcelle->bind_param("i", $idparcelle);
            $stmt_parcelle->execute();
            $result_parcelle = $stmt_parcelle->get_result();
            
            // Vérification si la requête a réussi
            if ($result_parcelle->num_rows > 0) {
                // Récupération de l'ID de la variété de thé plantée dans la parcelle
                $row_parcelle = $result_parcelle->fetch_assoc();
                $id_variete = $row_parcelle['id_variete'];
                
                // Requête SQL pour obtenir le prix de vente de la variété de thé
                $query_prix_vente = "SELECT prix_de_vente FROM The WHERE id = ?";
                $stmt_prix_vente = $bdd->prepare($query_prix_vente);
                $stmt_prix_vente->bind_param("i", $id_variete);
                $stmt_prix_vente->execute();
                $result_prix_vente = $stmt_prix_vente->get_result();
                
                // Vérification si la requête a réussi
                if ($result_prix_vente->num_rows > 0) {
                    // Récupération du prix de vente de la variété de thé
                    $row_prix_vente = $result_prix_vente->fetch_assoc();
                    $prix_vente_variete = $row_prix_vente['prix_de_vente'];
                    
                    // Calcul du poids total cueilli dans la parcelle pendant la période donnée
                    $poids_total_cueilli = poidTotalCuielliParParcelle($datedeb, $datefin, $idparcelle);
                    
                    // Calcul du montant de la vente de la parcelle
                    $montant_vente = $prix_vente_variete * $poids_total_cueilli;
                    
                    return $montant_vente;
                } else {
                    // En cas d'erreur ou de données manquantes, retourner 0
                    return 0;
                }
            } else {
                // En cas d'erreur ou de données manquantes, retourner 0
                return 0;
            }
        }
    
    //////////////////////////////////////////////////////////
    

    //Depense 
        function depenseGlobal($datedeb, $datefin) {
            // Connexion à la base de données
            $bdd = dbconnect();
            
            // Requête SQL pour calculer la somme des dépenses dans la période donnée
            $query_depenses = "SELECT SUM(montant) AS total_depenses FROM Depenses WHERE dates BETWEEN ? AND ?";
            $stmt_depenses = $bdd->prepare($query_depenses);
            $stmt_depenses->bind_param("ss", $datedeb, $datefin);
            $stmt_depenses->execute();
            $result_depenses = $stmt_depenses->get_result();
            $row_depenses = $result_depenses->fetch_assoc();
            $total_depenses = $row_depenses['total_depenses'];
            
            // Requête SQL pour calculer la somme des paiements dans la période donnée
            $query_paiements = "SELECT SUM(montant_paiement) AS total_paiements FROM Liste_Paie WHERE date BETWEEN ? AND ?";
            $stmt_paiements = $bdd->prepare($query_paiements);
            $stmt_paiements->bind_param("ss", $datedeb, $datefin);
            $stmt_paiements->execute();
            $result_paiements = $stmt_paiements->get_result();
            $row_paiements = $result_paiements->fetch_assoc();
            $total_paiements = $row_paiements['total_paiements'];
        
            // Calculer la somme totale des dépenses et des paiements
            $total = $total_depenses + $total_paiements;
        
            return $total;
        }
    
    ///////////////////////////////////////////////////////////

    //Benefice
        function beneficeTotal($datedebut, $datefin) {
            // Connexion à la base de données
            $bdd = dbconnect();
        
            // Calcul du total des ventes
            $total_ventes = 0;
            // Boucle à travers toutes les parcelles pour calculer les ventes
            $query_parcelles = "SELECT id FROM Parcelle";
            $result_parcelles = $bdd->query($query_parcelles);
            if ($result_parcelles->num_rows > 0) {
                while ($row_parcelle = $result_parcelles->fetch_assoc()) {
                    $id_parcelle = $row_parcelle['id'];
                    $vente_parcelle = venteParcelle($id_parcelle, $datedebut, $datefin);
                    $total_ventes += $vente_parcelle;
                }
            }
        
            // Calcul du total des dépenses
            $total_depenses = depenseGlobal($datedebut, $datefin);
        
            // Calcul du bénéfice total
            $benefice = $total_ventes - $total_depenses;
        
            return $benefice;
        }
    

    // Fonction pour calculer le coût de revient par kg
      function coutderevient($datedebut, $datefin) {
        $total_cout = 0; // Initialiser le coût total
        $total_poids = poidsTotalCueilli($datedebut, $datefin); // Obtenir le poids total de cueillette dans la période donnée
        if ($total_poids > 0) {
            // Calculer le coût de revient par kg
            $total_cout = depenseGlobal($datedebut, $datefin); // Fonction à définir pour obtenir le coût total des dépenses dans la période donnée
            return $total_cout / $total_poids; // Retourner le coût de revient par kg
        } else {
            return 0; // En cas de poids total nul, retourner 0
        }
    }

   


?>