
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



<h4 style="text-align: center">Différents types de formulaires</h4>
<h5 style="text-align: center">Just try ;)</h5>



<br><br>
<form action="page_arrivee.php" method="post">
    Mot de passe: <span style="font-style: italic">(#kangourou)</span>
    <br> <br>
    <input type="password" name="mot_de_passe">
    <br> <br>
    <input type="submit" value="Envoyer">
    <input type="submit" name="cacher" value="Cacher">
</form>

<?php
    if(isset($_POST["mot_de_passe"])){
        if($_POST["mot_de_passe"] == "kangourou"){
            include("page_protegee.php");
            //ou mettre le code là
        }
    }
    if(isset($_POST["cacher"])){
        $_POST["mot_de_passe"] = null;
    }

?>



<!-- ------------------------------------------------------ -->
<!-- ------------------------------------------------------ -->

<br><br>
<form action="page_arrivee.php" method="post">
    Mot de passe: <span style="font-style: italic">(#lol)</span>
    <br> <br>
    <input type="password" name="mot_de_passe1">
    <br> <br>
    <input type="submit" value="Envoyer">
</form>

<?php
    if(isset($_POST['mot_de_passe1'])){
        if($_POST['mot_de_passe1'] == "lol"){
            header('location: une_autre_page_gardee.php');
        } else {
            echo "Vous n'avez pas le bon mot de passe mdrrrr";
        }   
    }
?>





<!-- ------------------------------------------------------ -->
<!-- ------------------------------------------------------ -->

<br><br>
<?php

    if(!isset($_POST["un_autre"])){
        ?>
            <form action="page_arrivee.php" method="post">
            Mot de passe: <span style="font-style: italic">(#mdr)</span>
            <br> <br>
            <input type="password" name="un_autre">
            <br> <br>
            <input type="submit" value="Envoyer">
            </form>

        <?php
    } elseif ($_POST["un_autre"] != "mdr") {
        ?>

        <form action="page_arrivee.php" method="post">
            Mot de passe: <span style="font-style: italic">(#mdr)</span>
            <br> <br>
            <input type="password" name="un_autre">
            <br> <br>
            <input type="submit" value="Envoyer">
        </form>
        <p>Mauvais mot de passe</p>

        <?php
    } else {
        ?>

        <p>Yaay accès à la NASA</p>

        <?php
    }
?>