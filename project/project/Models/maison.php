<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 04/06/2017
 * Time: 16:41
 */


function creationMaison(){

    $bdd=connexionBdd();
// Insertion
    $req = $bdd->prepare('INSERT INTO maison(nom,id_utilisateur) VALUES(:nom,:id_utilisateur)');
    $req->bindParam(':nom', htmlspecialchars($_POST['nom_maison']));
    $req->bindParam(':id_utilisateur', $_SESSION['id_utilisateur']);
    $req->execute();
}
function isUniqueMaison($nomMaison){

    $bdd=connexionBdd();
    $req = $bdd->prepare('SELECT * FROM maison WHERE id_utilisateur = :id_utilisateur ');
    $req->execute(array('id_utilisateur' => $_SESSION['id_utilisateur']));
    while ($donnees = $req->fetch()) {
        if($nomMaison==$donnees['nom']) {
            return false;
        }
    }
    return true;

}

function afficheMaisonMenu()
{

    $bdd=connexionBdd();

    $req = $bdd->prepare('SELECT * FROM maison WHERE id_utilisateur = :id_utilisateur ');
    $req->execute(array('id_utilisateur' => $_SESSION['id_utilisateur']));
    $req2 = $bdd->prepare('SELECT * FROM maison WHERE id_utilisateur = :id_utilisateur ');
    $req2->execute(array('id_utilisateur' => $_SESSION['id_utilisateur']));
    /*
     * Il y a 2 requetes car le fecth retire les lignes une fois qu'il les parcourt.
     */
    if(!isset($_SESSION['id_maison'])) { // si il n'a jamais cliqué sur une piece, alors affiche toutes les pieces dans l'ordre
        while ($donnees = $req->fetch()) {
            echo '<option value="' . htmlspecialchars($donnees['id_maison']) . '">' . htmlspecialchars($donnees['nom']) . '</option>';
        }
    }else{
        while ($donnees = $req->fetch()) {
            if($_SESSION['id_maison']==$donnees['id_maison']){
                echo '<option value="' . htmlspecialchars($donnees['id_maison']) . '">' . htmlspecialchars($donnees['nom']) . '</option>';
            }
        }
        while ($donnee = $req2->fetch()) {
            if(($_SESSION['id_maison']!=$donnee['id_maison'])){
                echo '<option value="' . htmlspecialchars($donnee['id_maison']) . '">' . htmlspecialchars($donnee['nom']) . '</option>';
            }
        }
    }



    $req->closeCursor();
}
