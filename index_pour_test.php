<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page test html et php</title>
</head>
<body>
    
    <h2>Page de tests PHP</h2>
        
        <?php echo "Quelques petits tests"; ?>

        <ul>
        <li style="color: blue;">Texte en bleu</li>
        <li style="color: red;">Texte en rouge</li>
        <li style="color: green;">Texte en vert</li>
        </ul>

        <?php
        //phpinfo();
        ?>
 
        <!-- var et affichage -->
        <p>Nous sommes le: <?php 
        $nom_visiteur = "Yolo l'elephant"; //pas besoin d'échapper (\) le ' car il y a des " autour de la chaine
        $age_visiteur = 17;
        echo "le visiteur $nom_visiteur a $age_visiteur ans. ";
        //plus rapide pour php pq il n'a pas besoin de chercher la var ds le texte
        echo 'le visiteur '.$nom_visiteur.' a '.$age_visiteur.' ans. ';
        echo date('d/m/y h:i:s');
        ?></p>

        <?php
            //HTML dans PHP
            if($age_visiteur > 15){
                echo 'Heeey you there';
                ?>
                <p><strong>Yay</strong> vous avez plus de 15 ans</p>
                <?php
            }
        ?>


        <?php
            //switch
            $note = 4;
            switch($note){
                case 1:
                case 2:
                    echo "coucou";
                    break;
                case 3:
                    echo "holà";
            }

            //ternaire
            $majeur = ($age_visiteur >= 18)? true: false;
            //101
            //while(true){
            //    return false;
            //}

            //ARRAYS
            //tableau numéroté --> données d'un même type
            $prenoms = array("hey", "you", "there");
            $prenoms[3] = "I see you over there";
            echo $prenoms[3].'<br/>';
            //for
            for($i = 0 ; $i < sizeof($prenoms) ; $i++){
                echo $prenoms[$i]. '<br/>';
            }
            //foreach
            foreach($prenoms as $element){
                echo $element.'<br/>';
            }

            //tableau associatif
            $autres_prenoms = array(
                'prenom' => "Henri",
                'nom'=> "réussit sa vie"
            );
            $autres_prenoms["age"] = 17;
            echo $autres_prenoms["age"].'<br/>';
            //foreach
            foreach($autres_prenoms as $element){
                echo $element.'<br/>';
            }
            foreach($autres_prenoms as $cle => $element){
                echo 'clé: '.$cle.' element: '.$element.'<br/>';
            }
            //autre affichage (pour débug):
            echo '<pre>';
            print_r($autres_prenoms);
            echo '</pre>';

            //verif si clé existe
            array_key_exists('prenom', $autres_prenoms);
            //si val existe dans l'array
            in_array('Henri', $autres_prenoms);
            //clé (ou place i) d'une valeur
            array_search('hey', $prenoms);
        ?>

        <?php
            /*
            fonctions random:
            longueur chaine: strlen($phrase);
            recherche et remplace: 
            $une_var = str_replace('b', 'p', 'bim bam boum'); -> renvoie pim pam poum
            mélanger: str_shuffle($chaine);
            en minuscule: $chaine = strtolower($truc);
            en maj: strtoupper();

            date: date(param) -> H ou i(=minute) ou d, m, Y(=year)
            exple: $annee = date(Y);
            */
        ?>

        <?php
            function DireBonjour($nom)
            {
                echo 'Bonjour '.$nom.'<br/>';
            }

            DireBonjour("Patrick");

            function RayonDunCone($rayon, $hauteur)
            {
                return $rayon*$rayon*3.14*$hauteur*(1/3);
            }

            echo RayonDunCone(3,4);
        ?>

</body>
</html>


<!--
    Erreurs les plus courantes:

    Parse error:
    -> instruction php mal formée
    = manque point virgule
    = manque "
    = probleme concaténation -> "hey".$truc "lol"
    = accolade mal fermée (ou pas fermée)

    Undefined function:
    soit n'existe pas
    soit extension php non activée

    Wrong parameter count:
    oubli de paramètres pr fonction
    $fichier = fopen("fichier.txt", r) -> complet ici

    Headers already sent by: (travail avec sessions ou cookies):
    envoyer des infos de header:
    header() // session_start() // setcookie()
    ==> doivent être utilisées au TOUT DEBUT du code php, si qqch avant,
    provoque l'erreur
            mettre:
            <?//php session_start(); ?>
            <html>
    
-->
