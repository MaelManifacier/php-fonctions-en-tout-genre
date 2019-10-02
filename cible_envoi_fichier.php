
<?php
//le fichier est ds dossier temp
//on peut le prendre avec move_upload_file
//pour chaque fichier une var : $_FILES['nom_du_champ] est créée

/*
ISSET true == FICHIER EXISTANT
INTERDIRE LES FICHIERS .PHP
+ checker espaces et accents ou renommer
On peut faire plusieurs tests dessus :
$_FILES['un_fichier']['name'] == nom
$_FILES['un_fichier']['type'] == image / gif ...
$_FILES['un_fichier']['size'] == en octets
$_FILES['un_fichier']['tmp_name'] == emplacement temp du fichier
$_FILES['un_fichier']['error'] == savoir si il y a eu erreur à l'envoi
(contient 0 si pas d'erreur)
*/

if(isset($_FILES['un_fichier']) && $_FILES['un_fichier']['error'] == 0){
    //verif extension du fichier
    //pathinfo renvoie un array d'infos
    $infos_fichier = pathinfo($_FILES['un_fichier']['name']);
    $extension_fichier = $infos_fichier['extension'];

    $extensions_autorisees = array('jpg', 'jpeg', 'png', 'gif');
    if(in_array($extension_fichier, $extensions_autorisees)){
        //ici on peut traiter le fichier
        // on enregistre ici le nom du fichier avec son nom mais on pourrait en générer un
        move_uploaded_file(
            $_FILES['un_fichier']['tmp_name'], 
            'uploads/'.basename($_FILES['un_fichier']['name']));
        echo 'envoi effectué !';
    }
}

?>