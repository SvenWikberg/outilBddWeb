<!doctype html>
<html>
    <?php
        session_start();
        include_once('function.inc.php');


        if(isset($_POST['ip_host']))
            $_SESSION['ip_host'] = $_POST['ip_host'];

        if(isset($_POST['bd_name']))
            $_SESSION['bd_name'] = $_POST['bd_name'];

        if(isset($_POST['user_name']))
            $_SESSION['user_name'] = $_POST['user_name'];

        if(isset($_POST['user_pwd']))
            $_SESSION['user_pwd'] = $_POST['user_pwd'];

        $myPDO = bddPdo($_SESSION['ip_host'], $_SESSION['bd_name'], $_SESSION['user_name'], $_SESSION['user_pwd']);
    ?>
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="style.css">
        <!-- <script src="script.js"></script> -->
    </head>
    <body>
        <div>
            <?php
                foreach(showTables($myPDO, $_SESSION['bd_name']) as $table){
                    echo '<a href="?table=' . $table[0] . '"><p style="margin: 0px; width: min-content;">' . $table[0] . '</p></a>';
                }
            ?>
        </div>
        <div>
            <?php
                if(isset($_GET['error'])){
                    if(empty($_GET['error']))
                        echo '<p>Delete complete</p>';
                    else
                        echo '<p>' . $_GET['error'] . '</p>';
                }
                if(isset($_GET['table'])){

                    $tableData = getTableData($myPDO, $_GET['table']);

                    echo '<table>';
                    for ($i = 0; $i < count($tableData); $i++) {
                        $tmp = '';
                        echo '<tr>'; 
                        for ($j = 0; $j < count($tableData[$i]) / 2; $j++) {
                            echo '<td style="border: solid black 1px;">';
                            echo $tableData[$i][$j];
                            echo '</td>';

                            $tmp = $tmp . $j . '=' . $tableData[$i][$j] . '&';
                        }
                        echo '<td>';
                        echo '<a href="delete.func.php?' . $tmp . 'table_name=' . $_GET['table'] . '">delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</table>'; 
                }
            ?>
        </div>
    </body>
</html>