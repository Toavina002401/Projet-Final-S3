<?php
    include_once("../../inc/function.php");
    updateCategorieDepense($_POST["idmod"],$_POST["typedep"]);
    header("Location:../Templates/template.php?page=depenseAdmin.php");
?>