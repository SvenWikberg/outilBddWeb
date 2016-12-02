<?php
    session_start();
    include_once('function.inc.php');

    $myPDO = bddPdo($_SESSION['ip_host'], $_SESSION['bd_name'], $_SESSION['user_name'], $_SESSION['user_pwd']);


    print_rr($_POST);
    print_rr($_GET);

    $tmp = '';
    $cpt = 0;
    foreach($_POST as $key => $value){
        if($cpt != count($_POST) - 1){
            $tmp .= $key . ' = "' . str_replace('"', '\"', $value) . '", '; 
        }

        $cpt++;
    }
    $tmp = substr($tmp, 0, -2);


    $whereTmp = '';
    foreach($_GET as $key => $value){
        $whereTmp = ' ' . $key . ' = "' . $value . '" AND';
    }
    $whereTmp = substr($whereTmp, 0, -3);

    echo 'UPDATE ' . $_POST['table_name'] . ' SET ' . $tmp . ' WHERE' . $whereTmp;

    $req = $myPDO->prepare('UPDATE ' . $_POST['table_name'] . ' SET ' . $tmp . ' WHERE' . $whereTmp);
    $req->execute();
    print_rr($req->errorInfo());

    header('Location: bdd.php?table=' . $_POST['table_name'] . '&error=' . $req->errorInfo()[2]);
