<?php
    include_once("../../inc/function.php");
    deleteThea($_GET["id"]);
    header("Location:../Templates/template.php?page=accueilAdmin.php");
?>