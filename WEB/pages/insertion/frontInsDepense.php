<?php
    include_once("../../inc/function.php");
    saisieDepense($_POST["date"],$_POST["variete"],$_POST["poids"]);
    header("Location:../Templates/template.php?page=frontdepense.php");
?>