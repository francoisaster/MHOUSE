<?php
function affichePieces()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=mhouse_bdd;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    $req = $bdd->prepare('SELECT * FROM capteurs WHERE id_utilisateur = :id_utilisateur');
    $req->bindParam(':id_utilisateur',$_SESSION['id_utilisateur']);
    $req->execute();
    $req2 = $bdd->prepare('SELECT * FROM capteurs WHERE id_utilisateur = :id_utilisateur');
    $req2->bindParam(':id_utilisateur',$_SESSION['id_utilisateur']);
    $req2->execute();
    /*
     * Il y a 2 requetes car le fecth retire les lignes une fois qu'il les parcourt, sinon utiliser un close cursor...
     */
    if(!isset($_SESSION['id_capteur'])) { // si il n'a jamais cliqué sur une piece, alors affiche toutes les pieces dans l'ordre
        while ($donnees = $req->fetch()) {
            echo '<option value="'.htmlspecialchars($donnees['nom_capteur']).'">'.htmlspecialchars($donnees['nom_capteur']).'</option>';
        }
    }else{
        while ($donnees = $req->fetch()) {
            if($_SESSION['id_capteur']==$donnees['id_capteur']){
                echo '<option value="'.htmlspecialchars($donnees['nom_capteur']).'">'.htmlspecialchars($donnees['nom_capteur']).'</option>';
            }
        }
        while ($donnee = $req2->fetch()) {
            if(($_SESSION['id_capteur']!=$donnee['id_capteur'])){
                echo '<option value="'.htmlspecialchars($donnee['nom_capteur']).'">'.htmlspecialchars($donnee['nom_capteur']).'</option>';
            }
        }
    }
    $req->closeCursor();
}


/*
if(isset($_POST['capteur_choisi'])){
    $_SESSION['capteur_stats'] = $_POST['capteur_choisi'];

}else{
    $_SESSION['capteur_stats'] = 'capteur alpha';
}*/
//CONTROLLER




