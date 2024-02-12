<?php
    include_once("../../inc/function.php");
    updateThea($_POST["idmod"],$_POST["variete"],$_POST["occupation"],$_POST["rendement"]);
    header("Location:../Templates/template.php?page=accueilAdmin.php");
?>