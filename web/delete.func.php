<?php
    session_start();
    include_once('function.inc.php');

    $myPDO = bddPdo($_SESSION['ip_host'], $_SESSION['bd_name'], $_SESSION['user_name'], $_SESSION['user_pwd']);


    $tableColumnData = getTableColumnData($myPDO, $_GET['table_name']);

    $tmp = '';

    for ($i = 0; $i < count($tableColumnData); $i++) {
        if($tableColumnData[$i]['Type'] != "text")
            if($i == count($tableColumnData) - 1){
                if(empty($_GET[$i])){
                    $tmp .= '(' . $tableColumnData[$i]['Field'] . ' = "' . $_GET[$i] . '" OR ' . $tableColumnData[$i]['Field'] . ' IS NULL)';
                }
                else{
                    $tmp .= $tableColumnData[$i]['Field'] . ' = "' . $_GET[$i] . '"';
                }
            } else {
                if(empty($_GET[$i])){
                    $tmp .= '(' . $tableColumnData[$i]['Field'] . ' = "' . $_GET[$i] . '" OR ' . $tableColumnData[$i]['Field'] . ' IS NULL)' . ' AND ';
                }
                else{
                    $tmp .= $tableColumnData[$i]['Field'] . ' = "' . $_GET[$i] . '"' . ' AND ';
                }
            }
    }

    //print_rr($tableColumnData);
    echo 'DELETE FROM ' . $_GET['table_name'] . ' WHERE ' . $tmp;

    $req = $myPDO->prepare('DELETE FROM ' . $_GET['table_name'] . ' WHERE ' . $tmp);
    $req->execute();
    print_rr($req->errorInfo());
    
   // header('Location: bdd.php?table=' . $_GET['table_name'] . '&error=' . $req->errorInfo()[2]);
