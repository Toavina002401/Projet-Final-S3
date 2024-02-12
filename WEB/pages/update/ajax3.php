<?php
    include("../../inc/function.php");
    $valiny=getCueilleurById($_POST["id"]);
    echo json_encode($valiny);
?>