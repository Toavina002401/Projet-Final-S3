<?php
    include_once("../../inc/function.php");
    createCueilleur($_POST["nom"],$_POST["genre"],$_POST["dateNaissance"]);
    header("Location:../Templates/template.php?page=cueilleurAdmin.php");
?>