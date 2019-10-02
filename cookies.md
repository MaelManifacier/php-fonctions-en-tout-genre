cookie :

setCookie
    -> nom
    -> valeur
    -> timestamp (genre: 1090521508 == nb de secondes écoulées depuis
    le 1er janvier 1970, pour avoir l'actuel: time() auquel on ajoute
    le temps que l'on veut qu'il reste. pour 1 an: time() + 365*24*3600)
    == temps (timestamp = horodatage) avant que le cookie soit détruit


exemple :

<?php setCookie('pseudo', 'lol', time()+365*24*3600, null, null, false, true)  ?>

Pour le sécuriser: httpOnly -> rendra le cookie inaccessible en Js
le dernier true permet d'activer ce mode

NE MARCHE QUE SI ON LE FAIT AVANT <!DOCTYPE html>
