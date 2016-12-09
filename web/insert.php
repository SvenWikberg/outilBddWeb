<!doctype html>
<html lang="fr">
    <?php
        session_start();
        include_once('function.inc.php');

        $myPDO = bddPdo($_SESSION['ip_host'], $_SESSION['bd_name'], $_SESSION['user_name'], $_SESSION['user_pwd']);
    ?>
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    <body>
        <form style="width: 100%;" method="post" <?php echo 'action="insert.func.php?table=' . $_GET['table'] . '"' ?>>
        <?php 
            $tableData = getTableDataAssoc($myPDO, $_GET['table']);
            $tableColumnData = getTableColumnData($myPDO, $_GET['table']);

            //print_rr($tableColumnData);
            //print_rr($tableData);
            
            $cpt = 0;
            foreach($tableData as $key => $value){
                if($tableColumnData[$cpt]['Extra'] != 'auto_increment'){
                    echo '<p style="margin-bottom: 0px;">' . $key . ':</p>';
                    echo '<input style="width: 100%;" type="text" name="' . $key . '" value=""><br><br>';
                }
                $cpt++;
            }
        ?>
        <input type="submit" value="Send">
    </body>
</html>