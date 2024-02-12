<?php
    function dbconnect()
    {
        static $connect = null;
        if ($connect === null) {
            //localohost= ip
            //root utilisateur
            //mdp
            //nom databases
            $connect = mysqli_connect('localhost','root','','takeTea');
        }
        return $connect;
    }
?>