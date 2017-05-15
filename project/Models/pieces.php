<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 14/05/2017
 * Time: 21:16
 */


function creationPieces(){
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
// Insertion
    $req = $bdd->prepare('INSERT INTO piece(nom_piece) VALUES(:nom_piece)');
    $req->bindParam(':nom_piece', $_POST['nom_piece']);
    $req->execute();
}
//../Views/pieces.php');


function affichePieces()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $reponse = $bdd->query('SELECT nom_piece FROM piece ORDER BY ID');
    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
    while ($donnees = $reponse->fetch()) {
        echo '<p>' . htmlspecialchars($donnees['nom_piece']) . '</p>';
    }
    $reponse->closeCursor();
}
