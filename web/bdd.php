<!doctype html>
<html>
    <?php
        session_start();
        include_once('function.inc.php');

        if(!isset($_SESSION['myPdo']))
            $_SESSION['myPdo'] = bddPdo($_POST['ip_host'], $_POST['bd_name'], $_POST['user_name'], $_POST['user_pwd']);

        /*if(!isset($_SESSION['ip_host']))
            $_SESSION['ip_host'] = $_POST['ip_host'];

        if(!isset($_SESSION['bd_name']))
            $_SESSION['bd_name'] = $_POST['bd_name'];

        if(!isset($_SESSION['user_name']))
            $_SESSION['user_name'] = $_POST['user_name'];

        if(!isset($_SESSION['user_pwd']))
            $_SESSION['user_pwd'] = $_POST['user_pwd'];

        $myPDO = bddPdo($_SESSION['ip_host'], $_SESSION['bd_name'], $_SESSION['user_name'], $_SESSION['user_pwd']);*/

    ?>
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    <body>
        <?php
            print_rr($_SESSION['myPdo']);
            foreach(showTables($_SESSION['myPdo']) as $table){
                echo '<p>' . $table['Tables_in_cinema'] . '</p>';
            }
        ?>
    </body>
</html>