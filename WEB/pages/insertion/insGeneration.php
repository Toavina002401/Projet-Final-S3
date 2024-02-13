<?php
    include_once("../../inc/function.php");
    insertRegeneration($_POST["idmod"],$_POST["mois"]);
    header("Location:../Templates/template.php?page=accueilAdmin.php");
?>