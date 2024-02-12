<?php
    include_once("../../inc/function.php");
    updateCueilleur($_POST["idmod"],$_POST["nom"],$_POST["genre"],$_POST["dateNaissance"]);
    header("Location:../Templates/template.php?page=cueilleurAdmin.php");
?>