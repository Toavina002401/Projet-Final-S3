<?php
    include_once("../../inc/function.php");
    createParcelle($_POST["numPars"],$_POST["surface"],$_POST["type"]);
    header("Location:../Templates/template.php?page=parcelleAdmin.php");
?>