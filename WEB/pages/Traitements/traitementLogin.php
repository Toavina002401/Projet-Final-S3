<?php
    include_once("../../inc/function.php");
    if (connexion_Utilisateurs($_GET["pseudo"],$_GET["mdp"])==-1) {
        header("Location:../login.php");
    }
    else if(connexion_Utilisateurs($_GET["pseudo"],$_GET["mdp"])!=-1){
        header("Location:../Templates/template.php?page=accueil.php");
    }
?>