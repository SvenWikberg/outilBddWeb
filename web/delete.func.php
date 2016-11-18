<?php
    session_start();
    include_once('function.inc.php');

    $myPDO = bddPdo($_SESSION['ip_host'], $_SESSION['bd_name'], $_SESSION['user_name'], $_SESSION['user_pwd']);


    $tableColumnData = getTableColumnData($myPDO, $_GET['table_name']);

    $tmp = '';

    for ($i = 0; $i < count($tableColumnData); $i++) {
        if($i == count($tableColumnData) - 1){
            $tmp .= $tableColumnData[$i]['Field'] . ' = "' . $_GET[$i] . '"';
        } else {
            $tmp .= $tableColumnData[$i]['Field'] . ' = "' . $_GET[$i] . '"' . ' AND ';
        }
    }

    $req = $myPDO->prepare('DELETE FROM ' . $_GET['table_name'] . ' WHERE ' . $tmp);
    $req->execute();

    header('Location: bdd.php?table=' . $_GET['table_name']);
