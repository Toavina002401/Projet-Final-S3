<?php
    include_once("../../inc/function.php");
    createSalaire($_POST["cueil"],$_POST["sal"],$_POST["datelast"]);
    header("Location:../Templates/template.php?page=salaireAdmin.php");
?>