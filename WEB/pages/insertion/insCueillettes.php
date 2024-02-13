<?php
    include_once("../../inc/function.php");
    $valiny=checkIFisEnough($_POST["date"],$_POST["variete"], $_POST["num"], $_POST["poids"]);
    echo json_encode($valiny);
?>