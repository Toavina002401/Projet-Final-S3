<?php
    include_once("../../inc/function.php");
    createThea($_POST["variete"],$_POST["occupation"],$_POST["rendement"],$_POST["prix"]);
    header("Location:../Templates/template.php?page=accueilAdmin.php");
?>