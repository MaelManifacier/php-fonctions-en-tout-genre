<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Site de test(s) PHP</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="general.css">
    </head>
 

    <body>
    <?php
        /* inclusion de pages : 
        * dans elementsPage/ 
        * on peut trouver les différents éléments "répétitifs"
        */
        include("elementsPage/menu.php");
        //peut s'écrire aussi :
        //include "elementsPage/menu.php";
    ?>

    <div style="position: absolute; top: 1%; right: 3%">
        <p>Nous sommes le: <?php echo date('d/m/y').'. Il est '.date('h:i:s'); ?></p>
    </div>


    <div style="text-align: center">
        <br>
        <h3>Ce site ne vise qu'à la réalisation de différents tests avec le langage PHP</h3>
        <br><br>
    </div>


    <div>
    <h5>Envoi vers une page avec Get :</h5>
    <a href="bonjour.php?nom=Dupont&amp;prenom=Jean">Click me !</a>
    <br><br><br>
    </div>


    <h3>Formulaire :</h3>
    <!-- UN PETIT FORMULAIRE -->
    <form method="post" action="cible_form.php">
        <!-- éléments formulaire - name obligatoire - value : pré-rempli -->
        <div class="form-group">
            <input name="pseudo" type="text" class="form-control" id="pseudo" placeholder="pseudo">
        </div>
        <div class="form-group">
            <label for="mdp">Mot de passe :</label>
            <input name="mdp" type="password" class="form-control" id="mdp">
        </div>
        <br>
        <!-- Un grand texte -->
        <textarea name="message" rows=4 cols="40" class="form-control">
        Exprimez-vous ici.
        </textarea>
        <br>
        <!-- liste déroulante -->
        <label for="listeDeroulante">Ici la case "hey" est choisie par défaut</label><br>
        <select name="choix" id="listeDeroulante">
            <option value="choix1">Yolo</option>
            <option value="choix2" selected="selected">Hey</option>
            <option value="choix3">You²</option>
            <option value="choix4">There</option>
        </select>
        <br><br>
        <!-- cases : le label permet de pouvoir cliquer sur le texte
            value 'on' si coché sinon $_POST['case'] n'existera pas
            cochée par défaut: checked="checked"
        -->
        <input type="checkbox" name="case" id="case"/><label for="case">Une case à cocher vraiment intéressante</label>
        <br>
        <button type="submit">Valider</button>
    </form>
    

    <br><br>
    <h3>Formulaire d'envoi de fichiers :</h3>
    <!-- ENVOI DE FICHIER(S) 
    ==> enctype (le navigateur sait qu'il s'apprete à envoyer des fichiers) -->
    <form action="cible_envoi_fichier.php" method="post" enctype="multipart/form-data">
        <input type="file" name="un_fichier"/>
        <br>
        <button type="submit">Envoyer</button>
    </form>


    <!-- Le pied de page -->
    <?php include("elementsPage/pied_de_page.php"); ?>
    
    </body>
</html>