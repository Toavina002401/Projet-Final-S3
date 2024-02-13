<?php
    include_once("../../inc/function.php");
    if (connexion_Admin($_GET["pseudo"],$_GET["mdp"])==-1) {
        header("Location:../admin.php");
    }
    else if(connexion_Admin($_GET["pseudo"],$_GET["mdp"])!=-1){
        header("Location:../Templates/template.php?page=homeAdmin.php");
    }
?>