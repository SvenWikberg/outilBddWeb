<?php

    function print_rr($var){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }

    function &bddPdo($ip_host, $bd_name, $user_name, $user_pwd) {
        $myPdo = null;

        try {
            if ($myPdo == null) {
                $myBdd = new PDO('mysql:host=' . $ip_host . ';dbname=' . $bd_name, $user_name, $user_pwd, array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_PERSISTENT => true));
                return $myBdd;
            }
        } catch (Exception $ex) {
            echo 'Erreur : ' . $ex;
        }
    }

    function showTables($myPdo){
        $reqArray = $myPdo->query('SHOW TABLES FROM cinema')->fetchAll();
        return $reqArray;
    }











