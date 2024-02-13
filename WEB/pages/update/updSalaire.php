<?php
    include_once("../../inc/function.php");
    updateSalaire($_POST["idmod"],$_POST["cueil"],$_POST["sal"],$_POST["datelast"]);
    header("Location:../Templates/template.php?page=salaireAdmin.php");
?>