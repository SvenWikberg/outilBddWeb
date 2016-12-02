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
        <?php
            $primGet = "?";
            $cpt = 0;
            foreach($_GET as $key => $value){
                if($cpt != count($_GET) - 1){
                    $primGet .= $key . "=" . $value . "&";
                }
                $cpt++;
            }

            $primGet = substr($primGet, 0, -1);
        ?>
        <form style="width: 100%;" method="post" <?php echo 'action="update.func.php' . $primGet . '"' ?>>
            <?php 
            $primaryArray = array();

            $cpt = 0;
            foreach($_GET as $key => $value){
                if($cpt != count($_GET) - 1){
                    $primaryArray[$key] = $value;
                }
                $cpt++;
            }

            $recordData = getDataByPrimaryKey($myPDO, $_GET['table_name'], $primaryArray);
            //print_rr($recordData);

            foreach($recordData as $key => $field){

                $cleared = htmlspecialchars($field, ENT_QUOTES);

                echo '<input style="width: 100%;" type="text" name="' . $key . '" value="' . $cleared . '"><br>';
            }

            echo '<input type="hidden" name="table_name" value="' .  $_GET['table_name'] . '">';
            ?>

            <input type="submit" value="update">
        </form>


        <?php
            print_rr("");
        ?>
    </body>
</html>