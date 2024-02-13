<?php
    function dbconnect()
    {
        static $connect = null;
        if ($connect === null) {
            $connect = mysqli_connect('172.10.0.113','ETU002631','GhEI4qABCto2','db_p16_ETU002631');
        }
        return $connect;
    }
?>