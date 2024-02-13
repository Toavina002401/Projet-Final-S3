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

    
    //UPDATE THEA
    function updateThea($id, $nom, $occupation, $rendement){

        $query = "UPDATE The SET nom = ?, occupation = ?, rendement_par_pied = ? WHERE id = ?";
    
        $stmt = dbconnect()->prepare($query);
        
        if ($stmt) {
            // Binder les paramètres
            $stmt->bind_param("sddi", $nom, $occupation, $rendement, $id);
            
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

    //CREATE THEA
    function createThea($nom, $occupation, $rendement){
        
        $query = "INSERT INTO The (nom, occupation, rendement_par_pied) VALUES (?, ?, ?)";
        
        // Préparer la requête
        $stmt = dbconnect()->prepare($query);
        
        if ($stmt) {
            $stmt->bind_param("sdd", $nom, $occupation, $rendement);
            
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

?>