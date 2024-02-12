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
    

?>