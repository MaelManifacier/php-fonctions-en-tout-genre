<?php

setcookie('pseudo', 'LeMe', time()+3600*24*365, null, null, false, true);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Site de test(s) PHP</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../general.css">
    </head>

    <?php
        include("../elementsPage/menu_sous_dossier.php");
    ?>


<body>

<h2 style="text-align: center">WOW ! Quelle SUPER page de création de cookie !</h2>

<br><br><br>
<p>Set cookie :</p>
<form action="page_cookie.php" method="post">
    <input type="text" name="le_cookie">
    <input type="submit" value="Gateau">
</form>

<br>
<p>Ton cookie : 
    <?php
        if(isset($_COOKIE['pseudo'])){
            echo $_COOKIE['pseudo'];
        }
        if(isset($_POST['le_cookie'])){
            setcookie('pseudo', $_POST['le_cookie'], time()+3600*24*365, null, null, false, true);
            header('location: page_cookie.php');
        }
    ?>
</p>
</body>
</html>