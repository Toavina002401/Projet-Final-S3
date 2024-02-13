<?php
    include("../../inc/function.php");
    $valiny=getSalaireById($_POST["id"]);
    echo json_encode($valiny);
?>