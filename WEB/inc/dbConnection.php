<?php
    function dbconnect()
    {
        static $connect = null;
        if ($connect === null) {
            //localohost= ip
            //root utilisateur
            //mdp
            //nom database
            $connect = mysqli_connect('localhost','root','','takeTea');
        }
        return $connect;
    }
?>