<?php
    include_once("../../inc/function.php");
    echo(saisiecuillete($_POST["date"],$_POST["variete"],$_POST["num"],$_POST["poids"]));
    // getLastMonth_Regeneration_BetweenJan_Date($_POST["num"],2);
    // var_dump(getLastMonth_Regeneration_BetweenJan_Date(12,2));
?>