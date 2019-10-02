
<p>
    Bonjour <?php 
                //si var non présente de l'url --> probleme
                //echo $_GET['prenom'].' '.$_GET['nom']; 
                //du coup:
                if(isset($_GET['prenom']) && isset($_GET['nom'])){
                    echo $_GET['prenom'].' '.$_GET['nom'].' !';
                }
                else{
                    echo 'Il faut renseigner un nom et un prénom !!';
                }
                //prendre un parametre repeter et s'assurer que c'est
                //bien un int
                //$_GET['repeter'] = (int) $_GET['repeter'];
                //Si c'était une string -> va être égal à 0

                //puis tester si répéter est >0 et < à une valeur choisie
            ?>
</p>