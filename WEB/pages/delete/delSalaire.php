<?php
    include_once("../../inc/function.php");
    deleteSalaire($_GET["id"]);
    header("Location:../Templates/template.php?page=salaireAdmin.php");
?>