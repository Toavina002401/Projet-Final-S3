<?php
    include("../../inc/function.php");
    $valiny=getTypeDepenseById($_POST["id"]);
    echo json_encode($valiny);
?>