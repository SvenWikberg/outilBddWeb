<?php
    session_start();
    include_once('function.inc.php');

    $myPDO = bddPdo($_SESSION['ip_host'], $_SESSION['bd_name'], $_SESSION['user_name'], $_SESSION['user_pwd']);


    print_rr($_POST);
    print_rr($_GET);

    $tmpTable = '';
    $tmpValue = '';
    $cpt = 0;
    foreach($_POST as $key => $value){
        if($cpt != count($_POST)){
            $tmpTable .= $key . ', ';
            $tmpValue .= '"' . str_replace('"', '\"', $value) . '", ';
        }

        $cpt++;
    }
    $tmpTable = substr($tmpTable, 0, -2);
    $tmpValue = substr($tmpValue, 0, -2);
    echo $tmpTable . '<br>';
    echo $tmpValue . '<br>';

    $req = 'INSERT INTO ' . $_GET['table'] . '(' . $tmpTable . ')' . 'VALUES (' . $tmpValue . ');';

    $req = $myPDO->prepare($req);
    $req->execute();
    print_rr($req->errorInfo());

    header('Location: bdd.php?table=' . $_POST['table'] . '&error=' . $req->errorInfo()[2]);
