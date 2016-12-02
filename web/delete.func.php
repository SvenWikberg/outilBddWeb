<?php
    session_start();
    include_once('function.inc.php');

    $myPDO = bddPdo($_SESSION['ip_host'], $_SESSION['bd_name'], $_SESSION['user_name'], $_SESSION['user_pwd']);

    $tmp = '';

    print_rr($_GET);

    $cpt = 0;
    foreach($_GET as $key => $value){
        if($cpt != count($_GET) - 1){
            $tmp .= $key . '="' . $value . '" ';
        }

        $cpt++;
    }
     

    //print_rr($tableColumnData);
    echo 'DELETE FROM ' . $_GET['table_name'] . ' WHERE ' . $tmp;

    $req = $myPDO->prepare('DELETE FROM ' . $_GET['table_name'] . ' WHERE ' . $tmp);
    $req->execute();
    print_rr($req->errorInfo());
    
    header('Location: bdd.php?table=' . $_GET['table_name'] . '&error=' . $req->errorInfo()[2]);
