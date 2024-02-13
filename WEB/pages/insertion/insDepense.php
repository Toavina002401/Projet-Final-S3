<?php
    include_once("../../inc/function.php");
    createCategorieDepense($_POST["typedep"]);
    header("Location:../Templates/template.php?page=depenseAdmin.php");
?>