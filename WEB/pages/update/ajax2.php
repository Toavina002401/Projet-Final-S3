<?php
    include("../../inc/function.php");
    $valiny=getParcelleById($_POST["id"]);
    echo json_encode($valiny);
?>