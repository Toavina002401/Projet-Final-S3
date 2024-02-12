<?php
    include("dbConnection.php");
    
   

    //CONNEXION ok
        // Connexion admin
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
        
        //////////////////////////------------------------------------/////////////////////////////////////
        //////////////////////////------------------------------------/////////////////////////////////////
        //////////////////////////------------------------------------/////////////////////////////////////

    //GEStTION PARCELLE
        // LISTER PARCELLE
            // Par Surface
                function listParcelleBySurface(){
                    $query = "SELECT * FROM Parcelle ORDER BY surface_HA";
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

        
        // Fonction pour obtenir l'ID de la parcelle par son numéro
        function getidparcelleparnum($num_parcelle){
            $bdd = dbconnect(); 
            $query = "SELECT id FROM Parcelle WHERE numero_parcelle = ?";
            $stmt = $bdd->prepare($query);
            if ($stmt) {
                $stmt->bind_param("i", $num_parcelle);
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        return $row['id']; // Retourne l'ID de la parcelle
                    } else {
                        return null; // Aucune parcelle trouvée avec ce numéro
                    }
                } else {
                    return null; // Erreur lors de l'exécution de la requête
                }
            } else {
                return null; // Erreur de préparation de la requête
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
                    $query = "INSERT INTO Cueilleurs (nom, genre, salaire) VALUES (?, ?, ?)";
                    $stmt = dbconnect()->prepare($query);
                    if ($stmt) {
                        $stmt->bind_param("ssd", $nom, $genre, $salaire);
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
                    $query = "UPDATE Cueilleurs SET nom = ?, genre = ?, salaire = ? WHERE id = ?";
                    $stmt = dbconnect()->prepare($query);
                    if ($stmt) {
                        $stmt->bind_param("ssdi", $nom, $genre, $salaire, $id);
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


  

    //////////////////////////------------------------------------/////////////////////////////////////
    //////////////////////////------------------------------------/////////////////////////////////////
    //////////////////////////------------------------------------/////////////////////////////////////




    /////////////////////FRONT OFFICE/////////////////////////////////////////////

    //SAISIE CUEILLETE
        function saisiecuillete($date, $idcueilleur, $idparcelle, $poids){
            $bdd = dbconnect(); 
            $query = "INSERT INTO Cueillettes (date_cueillette, id_cueilleur, id_parcelle, poids_cueilli) VALUES (?, ?, ?, ?)";
            $stmt = $bdd->prepare($query);
            if ($stmt) {
                $stmt->bind_param("siii", $date, $idcueilleur, $idparcelle, $poids);
                if ($stmt->execute()) {
                    return true; // Insertion réussie
                } else {
                    return false; // Échec de l'insertion
                }
            } else {
                return false; // Erreur de préparation de la requête
            }
        }

    
    ///// 

    // Fonction pour enregistrer une nouvelle dépense
    function saisieDepense($date, $nom, $id_typeDepense, $montant){
        $bdd = dbconnect(); // Obtenir l'objet de connexion à la base de données
        $query = "INSERT INTO Depenses (dates, nom, id_typeDep, montant) VALUES (?, ?, ?, ?)";
        $stmt = $bdd->prepare($query);
        if ($stmt) {
            $stmt->bind_param("ssis", $date, $nom, $id_typeDepense, $montant);
            if ($stmt->execute()) {
                return true; // Insertion réussie
            } else {
                return false; // Échec de l'insertion
            }
        } else {
            return false; // Erreur de préparation de la requête
        }
    }





    // Fonction pour récupérer la somme des poids cueillis dans une parcelle pour un mois donné
        function sumPoidscultive($idparcelle, $date) {
           $bdd= dbconnect();

            // Requête SQL pour obtenir la somme des poids cueillis dans la parcelle pour le mois donné
            $query = "SELECT SUM(poids_cueilli) AS total_poids FROM Cueillettes WHERE id_parcelle = ? AND MONTH(date_cueillette) = MONTH(?) AND YEAR(date_cueillette) = YEAR(?)";
            $stmt = $bdd->prepare($query);
            $stmt->bind_param("iss", $idparcelle, $date, $date);
            $stmt->execute();
            $result = $stmt->get_result();

            // Vérifier si la requête a réussi
            if ($result) {
                $row = $result->fetch_assoc();
                return $row['total_poids'];
            } else {
                return 0; 
            }
        }

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
                $query_rendement = "SELECT rendement_par_pied FROM The WHERE id = ?";
                $stmt_rendement = $bdd->prepare($query_rendement);
                $stmt_rendement->bind_param("i", $id_variete);
                $stmt_rendement->execute();
                $result_rendement = $stmt_rendement->get_result();

                // Vérifier si la requête a réussi
                if ($result_rendement->num_rows > 0) {
                    $row_rendement = $result_rendement->fetch_assoc();
                    $rendement_par_pied = $row_rendement['rendement_par_pied']; // Rendement par pied de la variété de thé

                    // Calculer la surface de la parcelle en mètres carrés
                    $surface_m2 = $surface_HA * 10000;

                    // Calculer le nombre de pieds de thé sur la parcelle
                    $nombre_pied = $surface_m2 / $rendement_par_pied;

                    // Calculer le poids maximum attendu
                    $poids_max = $nombre_pied * $rendement_par_pied;

                    return $poids_max;
                }
            }

            // En cas d'erreur ou de données manquantes, retourner false
            return false;
        }

        // Fonction pour tester si le poids de la cueillette est suffisant
        function checkIFisEnough($date, $idcueilleur, $idparcelle, $poids) {
            $max = 0;

            // Vérifier si la date est le premier jour du mois
            if (date('j', strtotime($date)) == 1) {
                $max = getMAX($idparcelle);
            } else {
                $max = getMAX($idparcelle) + sumPoidscultive($idparcelle, $date);
            }

            // Vérifier si les fonctions getMAX et sumPoidscultive ont renvoyé des résultats valides
            if ($max !== false) {
                if ($poids < $max) {
                    saisiecuillete($date, $idcueilleur, $idparcelle, $poids);
                } else {
                    return "Erreur : Le poids de la cueillette est insuffisant.";
                }
            } else {
                return "Erreur : Impossible de récupérer les données nécessaires pour vérifier le poids de la cueillette.";
            }
        }

   





?>
