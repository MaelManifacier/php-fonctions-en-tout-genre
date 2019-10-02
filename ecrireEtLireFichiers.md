
Sous Linux, changer chmod des fichiers auxquels on veut accéder

ouvrir : 
$theFichier = fopen('nom.txt', 'r+')
-> r : ouvre le fichier en lecture seule
r+ : lecture + écriture
a : écriture seule
a+ : lecture + écriture mais créée le fichier si n'existe pas 
    (penser au chmod du répertoire dans ce cas-là) / si existe, 
    texte ajouté à la fin

fermer :
fclose($theFichier)

lire :
caractere par caractere : fgetc
ligne par ligne : fgets

écrire :
fputs($theFichier, 'texte à écrire')

-> Replacer le curseur où on veut dans le fichier :
fseek($theFichier, 0)
---> ATTENTION: fseek n'a aucun effet si on ouvre le fichier avec a ou a+

