<?php
    session_start();

    //ne sera BIEN SUR pas A transmettre dans les url
    $_SESSION['prenom']="Jack Jack"
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
    
    <?php echo 'Heey '.$_SESSION['prenom'].' ! You\'ve got a session !'; ?>


    <!--
    <br><br><br>
    <p>'d you like to change your name ?</p>
    <form action="page_session.php" method="post">
        <input type="text" name="nom">
        <input type="submit" value="Change !">
    </form>
    -->
    <?php
        /*
        if(isset($_POST["nom"])){
            $_SESSION["prenom"]=htmlspecialchars($_POST["nom"]);
        }*/
    ?>
    


        <br><br><br>
    <a href="../index.php">
        Deconnexion
        <?php session_destroy(); ?>
    </a>

</body>
</html>
