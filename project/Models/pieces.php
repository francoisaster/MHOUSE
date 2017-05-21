<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 14/05/2017
 * Time: 21:16
 */



function creationPieces(){

    $bdd=connexionBdd();
// Insertion
    $req = $bdd->prepare('INSERT INTO piece(nom_piece,id_utilisateur) VALUES(:nom_piece,:id_utilisateur)');
    $req->bindParam(':nom_piece', $_POST['nom_piece']);
    $req->bindParam(':id_utilisateur', $_SESSION['id_utilisateur']);
    $req->execute();
}
//../Views/pieces.php');
require'connexionBdd.php';

function affichePieces()
{

    $bdd=connexionBdd();
    $reponse = $bdd->query('SELECT nom_piece FROM piece ORDER BY ID');
    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
    while ($donnees = $reponse->fetch()) {
        echo '<p>' . htmlspecialchars($donnees['nom_piece']) . '</p>';
    }
    $reponse->closeCursor();
}

function affichePiecesMenu()
{

    $bdd=connexionBdd();

    $req = $bdd->prepare('SELECT * FROM piece WHERE id_utilisateur = :id_utilisateur ');
    $req->execute(array('id_utilisateur' => $_SESSION['id_utilisateur']));
    $req2 = $bdd->prepare('SELECT * FROM piece WHERE id_utilisateur = :id_utilisateur ');
    $req2->execute(array('id_utilisateur' => $_SESSION['id_utilisateur']));
/*
 * Il y a 2 requetes car le fecth retire les lignes une fois qu'il les parcourt.
 */
    if(!isset($_SESSION['id_piece'])) { // si il n'a jamais cliqué sur une piece, alors affiche toutes les pieces dans l'ordre
        while ($donnees = $req->fetch()) {
            echo '<option value="' . htmlspecialchars($donnees['id_piece']) . '">' . htmlspecialchars($donnees['nom_piece']) . '</option>';
        }
    }else{
        while ($donnees = $req->fetch()) {
            if($_SESSION['id_piece']==$donnees['id_piece']){
                echo '<option value="' . htmlspecialchars($donnees['id_piece']) . '">' . htmlspecialchars($donnees['nom_piece']) . '</option>';
            }
        }
        while ($donnee = $req2->fetch()) {
            if(($_SESSION['id_piece']!=$donnee['id_piece'])){
                echo '<option value="' . htmlspecialchars($donnee['id_piece']) . '">' . htmlspecialchars($donnee['nom_piece']) . '</option>';
            }
        }
    }



    $req->closeCursor();
}

function isUniquePiece($_nomPiece){

    $bdd=connexionBdd();
    $req = $bdd->prepare('SELECT * FROM piece WHERE id_utilisateur = :id_utilisateur ');
    $req->execute(array('id_utilisateur' => $_SESSION['id_utilisateur']));
    while ($donnees = $req->fetch()) {
        if($_nomPiece==$donnees['nom_piece']) {
            return false;
        }
    }
    return true;

}
