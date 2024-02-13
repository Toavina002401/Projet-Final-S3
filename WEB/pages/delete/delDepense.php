<?php
    include_once("../../inc/function.php");
    deleteCategorieDepense($_GET["id"]);
    header("Location:../Templates/template.php?page=depenseAdmin.php");
?>