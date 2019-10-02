$_GET :
    la plupart des navigateurs ne gèrent au max que 256 caractères en URL
    (Uniform Resource Locator)
    -> l'utilisateur peut modifier facilement

$_POST :
    -> PAS PLUS SECURISE
    permet d'envoyer autant de données qu'on veut (c'est pour ça qu'on préfère)

Dans les formulaires :
    action : pour définir la page appelée par le formulaire
    (on peut aussi faire action="formulaire.php" --> lui-même)

NEVER TRUST USER INPUT

FORMULAIRE OU INPUT FAILLE :
faille XSS (cross-site scripting): 
injection de code html qui peut contenir du JavaScript
genre :
<script type="text/javascript">alert('Lol')</script>
ou juste :
<strong> Lol </strong>

--> il faut "échapper" le code html
echo htmlspecialchars($_POST['prenom']);
(si le visiteur met des balises html, cela va les afficher et non pas les exécuter)
-> pour retirer les balises plutot que de les afficher :
script_tags($_POST['prenom']);

