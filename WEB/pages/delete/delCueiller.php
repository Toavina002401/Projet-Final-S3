<?php
    include_once("../../inc/function.php");
    deleteCueilleur($_GET["id"]);
    header("Location:../Templates/template.php?page=cueilleurAdmin.php");
?>