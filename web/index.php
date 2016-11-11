<!doctype html>
<html>
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
        <form method="post" action="bdd.php">
            <p>Ip host :</p>
            <input type="text" name="ip_host" value="127.0.0.1">

            <p>Database name :</p>
            <input type="text" name="bd_name">

            <p>Username :</p>
            <input type="text" name="user_name">

            <p>Password :</p>
            <input type="password" name="user_pwd">

            <input type="submit" value="Connection"/>
        </form>
    </body>
</html>