
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



<h3 style="text-align: center">Cette page consulte deux fichiers texte et un fichier json</h3>
<p style="text-align: center">Pour le texte: un fichier de "contenu" et un contenant le nombre de vues <br>
Le fichier json est une liste d'actualités </p>

<br>
<?php

//ouverture
$theFichier = fopen('wow', 'r+');

//lecture
$line = fgets($theFichier);
while($line != ""){
    echo 'Contenu fichier wow.txt : <br>'.$line;
    echo '<br><br> Astonishing !! <br><br>';
    $line = fgets($theFichier);
}

//fermeture
fclose($theFichier);


//UN DEUXIEME FICHIER, .. WOW
$unAutreFichier = fopen('nbVues', 'r+');

$nb = fgets($unAutreFichier);
if($nb == null){
    $nb = 1;
    fputs($unAutreFichier, 1);
    echo 'wow, vous êtes la première vue ! <br>';
} else {
    $nb += 1;
    echo 'Il y a '.$nb.' vues ! <br>';
    fseek($unAutreFichier, 0);
    fputs($unAutreFichier, $nb);
}

fclose($unAutreFichier);

?>

<p>(Just try to refresh :p)</p>


<br><br><br>
<h5>Lecture fichier json :</h5>
<br>

<?php

    $source = file_get_contents("desActus.json");
    $json_data = json_decode($source, true);

    $output = '<div class="row" style="padding-top: 3vh">';
        foreach($json_data['listeActus'] as $actu){
            $output .= '<div class="column">
                        <div class="card" style="text-align: center">
                            <div class="card-body">';
            $output .= '<h4 class="card-title">'.$actu['titre'].'</h4>';
            $output .= '<hr size=2 width="75%" noshade color=black align=center>';
            $output .= '<p class="card-text">'.$actu['contenu'].'</p> </div>';
            $output .= '
                <img class="card-img-right" src="'.$actu['chemin'].'" style="max-width: 45vh">';
            $output .= '</div> </div>';
        }
    $output .= '</div>';
    echo $output;

?>

<br><br><br>

<form action="page_fichier.php" method="post" enctype="multipart/form-data" style="text-align: center">
        <br> <br>
        <h3>Ajouter une actu</h3>
        <br>
        <h5>Titre:</h5>
        <input class="form-control" name="titre_actu" type="text">
        <br>
        <textarea class="form-control" name="text_actu" cols="3" rows="5"></textarea>
        <br>
        <p>Photo à ajouter (optionnel)</p>
        <input type="file" name="un_fichier"/>
        <br> <br>
        <button class="btn" id="bouton" type="submit">Envoyer</button>

        <?php
            if(isset($error)){
                echo $error;
            }
        ?>
    </form>


<?php
    $si_fichier = false;
    if(isset($_POST['text_actu']) && isset($_POST['titre_actu'])
        && isset($_FILES['un_fichier']) 
        && $_FILES['un_fichier']['error'] == 0){

            $infos_fichier = pathinfo($_FILES['un_fichier']['name']);
            $extension_fichier = $infos_fichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'png', 'gif', 'JPEG', 'PNG', 'JPG');
            
            if(in_array($extension_fichier, $extensions_autorisees)){
                move_uploaded_file($_FILES['un_fichier']['tmp_name'], 'img/'.basename($_FILES['un_fichier']['name']));
                ajouterActuAvecImage($_FILES['un_fichier']['name']);
            } else {
                echo 'L\'extension du fichier n\'est pas bonne'; 
            }
            $si_fichier = true;
            
    }
    elseif( isset($_FILES['un_fichier']) && $_FILES['un_fichier']['error'] != 0){
        if($_FILES['un_fichier']['error'] == 1){
            echo 'Le fichier donné pour l\'envoi est trop gros.';
        }
        elseif($_FILES['un_fichier']['error'] == 3){
            echo 'Le fichier donné n\a été uploadé que partiellement';
        }
    }
    if (isset($_POST['text_actu']) && isset($_POST['titre_actu'])){
        if(!$si_fichier){
            //ajout de texte seulement
            ajouterActuSansImage();
        }
    }

    function ajouterActuSansImage(){

        $json_actuel = file_get_contents("desActus.json");
        $news_actuel = json_decode($json_actuel, true);

        $texte = str_replace(array("\r\n","\n"),'<br />',$_POST['text_actu']);
        $actu_a_ajouter = array (
            'titre' => htmlspecialchars($_POST['titre_actu']),
            'contenu' => $texte,
            'chemin' => ""
        );

        if(sizeof($news_actuel['listeActus']) < 10){
            $news_actuel['listeActus'][] = $actu_a_ajouter;
            $final_data = json_encode($news_actuel);

            if(file_put_contents("desActus.json", $final_data)){
                echo 'texte ajouté !';
                header('location:page_fichier.php');
            }
        } else {
            echo '<b>Il y a déjà dix actualités ! c\'est plein !</b>';
        }

        
    }

    function ajouterActuAvecImage($nom){
        $json_actuel = file_get_contents("desActus.json");
        $news_actuel = json_decode($json_actuel, true);

        $texte = str_replace(array("\r\n","\n"),'<br />',$_POST['text_actu']);
        $actu_a_ajouter = array (
            'titre' => $_POST['titre_actu'],
            'contenu' => $texte,
            'chemin' => 'img/'.$nom
        );

        if(sizeof($news_actuel['listeActus']) < 10){
            $news_actuel['listeActus'][] = $actu_a_ajouter;
            $final_data = json_encode($news_actuel);

            if(file_put_contents("desActus.json", $final_data)){
                echo 'fichier ajouté !';
                header('location:page_fichier.php');
            }
        } else {
            echo 'Il y a déjà dix actualités ! c\'est plein !';
        }
        
    }