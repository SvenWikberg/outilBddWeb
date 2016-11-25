<!doctype html>
<html lang="fr">
    <?php
        session_start();
        include_once('function.inc.php');
    ?>
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    <body>
        <form method="post" action="update.func.php">
            <?php

            ?>
        </form>


        <?php
            print_rr($_GET);
        ?>
    </body>
</html>