<?php
    include_once("../../inc/function.php");
    updateParcelle($_POST["idmod"],$_POST["numPars"],$_POST["surface"],$_POST["typemod"]);
    header("Location:../Templates/template.php?page=parcelleAdmin.php");
?>