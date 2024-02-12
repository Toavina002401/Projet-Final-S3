<?php
    include("../../inc/function.php");
    $valiny=getTeaById($_POST["id"]);
    echo json_encode($valiny);
?>