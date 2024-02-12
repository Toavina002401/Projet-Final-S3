<?php
    include_once("../../inc/function.php");
    deleteParcelle($_GET["id"]);
    header("Location:../Templates/template.php?page=parcelleAdmin.php");
?>