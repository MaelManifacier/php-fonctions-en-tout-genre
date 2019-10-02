A l'arrivée d'un client sur site, on demande à php de créer une session :
    PHPSESSID : numéro unique d'id souvent en hexadécimal
    une fois la session générée, on peut créer une infinité de variables
genre $_SESSION['nom']
    --> on ne sait pas quand exactement le visiteur part : on utilise alors
un timeout qui va supprimer la session après un certain temps sans requête
    --> ou on le fait se déconnecter

Deux fonctions :
    session_start() -> doit être appelée au tout début 
de chaque page --> AVANT MEME <!DOCTYPE>
dans lesquelles on a besoin des var de session
    session_destroy() -> appelée automatiquement après un timeout (auto)
ou bien il faut créer une page de déconnexion


Si on veut faire une connexion :
    dans le formulaire de connexion on check si le login et le password sont les bons
        (ne pas oublier de vérifier que rien ne contient de code)
    puis on crée une var de session avec SEULEMENT LE LOGIN
    enfin on peut afficher les pages si le login existe,
    sinon on redirige ou affiche une erreur

