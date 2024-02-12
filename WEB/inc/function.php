<?php
    include("dbConnection.php");
    $bdd = dbconnect();
    global $bdd;

    //CONNEXION ok
        // Connexion admin
        function connexion_Admin($email, $mdp){
            $query = "SELECT id FROM Utilisateurs WHERE email = ? AND mot_de_passe = SHA1(?) AND post = 'admin'"; 
            $stmt = $bdd->prepare($query);
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
            $stmt = $bdd->prepare($query);
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
                function getAllThea($bdd){
                    $query = "SELECT * FROM The";
                    $result = $bdd->query($query);
                    if ($result) {
                        return $result->fetch_all(MYSQLI_ASSOC);
                    } else {
                        return [];
                    }
                }
                // Fonction pour récupérer toutes les variétés de thé triées par nom
                function getTheaByAlphabet($bdd){
                    $query = "SELECT * FROM The ORDER BY nom";
                    $result = $bdd->query($query);
                    if ($result) {
                        return $result->fetch_all(MYSQLI_ASSOC);
                    } else {
                        return [];
                    }
                }
                // Fonction pour récupérer toutes les variétés de thé triées par occupation (du plus grand au plus petit)
                function getTheaByOccupation($bdd){
                    $query = "SELECT * FROM The ORDER BY occupation DESC";
                    $result = $bdd->query($query);
                    if ($result) {
                        return $result->fetch_all(MYSQLI_ASSOC);
                    } else {
                        return [];
                    }
                }
                // Fonction pour récupérer toutes les variétés de thé triées par rendement par pied (du plus grand au plus petit)
                function getTheaByRendement($bdd){
                    $query = "SELECT * FROM The ORDER BY rendement_par_pied DESC";
                    $result = $bdd->query($query);
                    if ($result) {
                        return $result->fetch_all(MYSQLI_ASSOC);
                    } else {
                        return [];
                    }
                }

        
        //UPDATE THEA
        function updateThea($id, $nom, $occupation, $rendement){

            $query = "UPDATE The SET nom = ?, occupation = ?, rendement_par_pied = ? WHERE id = ?";
        
            $stmt = $bdd->prepare($query);
            
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
            
            $stmt = $bdd->prepare($query);
            
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
            $stmt = $bdd->prepare($query);
            
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
                    $result = $bdd->query($query);
                    if ($result) {
                        return $result->fetch_all(MYSQLI_ASSOC);
                    } else {
                        return [];
                    }
                }         
            // Par Numero
                function listParcelleByNumero(){
                    $query = "SELECT * FROM Parcelle ORDER BY numero_parcelle";
                    $result = $bdd->query($query);
                    if ($result) {
                        return $result->fetch_all(MYSQLI_ASSOC);
                    } else {
                        return [];
                    }
                }

    
        // CREATE PARCELLE
            function createParcelle($numero, $surface, $id_variete){
            
                $query = "INSERT INTO Parcelle (numero_parcelle, surface_HA, id_variete) VALUES (?, ?, ?)";
                $stmt = $bdd->prepare($query);
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
                $stmt = $bdd->prepare($query);
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
            $stmt = $bdd->prepare($query);
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

    
        //////////////////////////------------------------------------/////////////////////////////////////
        //////////////////////////------------------------------------/////////////////////////////////////
        //////////////////////////------------------------------------/////////////////////////////////////

    //GESTION CUEILLEURS
        // LISTER CUEILLEURS
                // Par Nom
                function listCueilleursByNom(){
                    $query = "SELECT * FROM Cueilleurs ORDER BY nom";
                    $result = $bdd->query($query);
                    if ($result) {
                        return $result->fetch_all(MYSQLI_ASSOC);
                    } else {
                        return [];
                    }
                }
        // CREATE CUEILLEUR
            function createCueilleur($nom, $genre, $salaire){
                    $query = "INSERT INTO Cueilleurs (nom, genre, salaire) VALUES (?, ?, ?)";
                    $stmt = $bdd->prepare($query);
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
                    $stmt = $bdd->prepare($query);
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
                    $stmt = $bdd->prepare($query);
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

    //////////////////////////------------------------------------/////////////////////////////////////
    //////////////////////////------------------------------------/////////////////////////////////////
    //////////////////////////------------------------------------/////////////////////////////////////



        


  







?>
