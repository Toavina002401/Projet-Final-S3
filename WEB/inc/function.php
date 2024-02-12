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

    

?>