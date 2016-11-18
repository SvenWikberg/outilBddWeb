<?php

    function print_rr($var){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }

    function bddPdo($ip_host, $bd_name, $user_name, $user_pwd) {
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

    function showTables($myPdo, $db_name){
        $req = $myPdo->prepare("SHOW TABLES FROM " . $db_name);
        $req->execute();
        return $req->fetchAll();
    }

    function getTableData($myPdo, $table){
        $req = $myPdo->prepare('SELECT * FROM ' . $table);
        //$req->bindParam(':table', $table, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll();
    }











