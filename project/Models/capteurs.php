<?php

require'connexionBdd.php';

function creationCapteurs(){
    $bdd=connexionBdd();
    $req=$bdd->prepare('INSERT INTO capteurs(nom_capteur, type_capteur, date_d_ajout, id_utilisateur,id_piece,marque,numero_serie) VALUES(:nom_capteur, :type_capteur, NOW(),:id_utilisateur,:id_piece,:marque,:numero_serie)');
// $req->execute(array($_POST['pseudo'], $_POST['pass'], $_POST['email']));
    $req->bindParam(':nom_capteur',$_POST['nom_capteur']);
    $req->bindParam(':type_capteur',$_POST['type_capteur']);
    $req->bindParam(':id_utilisateur',$_SESSION['id_utilisateur']);
    $req->bindParam(':id_piece',$_POST['choix_piece_capteur']);
    $req->bindParam(':marque',$_POST['marque']);
    $req->bindParam(':numero_serie',$_POST['numero_serie']);
    $req->execute();
}

function afficheCapteurs(){
    $bdd=connexionBdd();
    // Récupération des 20 derniers messages
    $reponse = $bdd->query('SELECT nom_capteur, type_capteur FROM capteurs ORDER BY id_capteur DESC LIMIT 0, 20');
    while ($donnees = $reponse->fetch())
    {
        echo '<p><strong>' . htmlspecialchars($donnees['nom_capteur']) . '</strong> : ' . htmlspecialchars($donnees['type_capteur']) . '</p>';
    }
    $reponse->closeCursor();
} //Maintenant la fonction est useless

function supprimerCapteurs(){ // Fonction pour supprimer un capteur dans la bdd
    $bdd=connexionBdd();
    // Ici mettre WHERE sur juste le nom supprimera la ligne dans la bdd
    $req59=$bdd->prepare('
DELETE FROM capteurs
WHERE nom_capteur = :nomDuCapteur
');
    $req59->bindParam(':nomDuCapteur',$_POST['nom_capteur']);
    $req59->execute();
}

function supprimerPiecesEtCapts(){ // Fonction pour supprimer un capteur dans la bdd
    $bdd=connexionBdd();
    // Ici mettre WHERE sur juste le nom supprimera la ligne dans la bdd
    $req528=$bdd->prepare('
DELETE FROM piece
WHERE id_piece = :idDeLaPiece AND id_utilisateur = :idUser
');
    $req528->bindParam(':idDeLaPiece',$_POST['choix_piece_suppr']);
    $req528->bindParam(':idUser',$_SESSION['id_utilisateur']);
    $req528->execute();

    //ICI SUPPRESSION DES CAPTEURS LIES A LA PIECE
    $req549=$bdd->prepare('
DELETE FROM capteurs
WHERE id_piece = :idPiece AND id_utilisateur = :idUser
');
    $req549->bindParam(':idPiece',$_POST['choix_piece_suppr']);
    $req549->bindParam(':idUser',$_SESSION['id_utilisateur']);
    $req549->execute();
}




function supprimerMaisonEtPiecesEtCapt(){
    $bdd=connexionBdd();

    //ICI SUPPRESSION DES CAPTEURS LIES A LA PIECE
    /*$req549=$bdd->prepare('
DELETE FROM capteurs
WHERE id_piece = :idPiece AND id_utilisateur = :idUser
');
    $req549->bindParam(':idPiece',$_POST['choix_piece_suppr']);
    $req549->bindParam(':idUser',$_SESSION['id_utilisateur']);
    $req549->execute();*/

    //Suppresion de la piece
    $req537=$bdd->prepare('
DELETE FROM piece
WHERE id_maison = :idMaison
');
   // $req537->bindParam(':idUser',$_SESSION['id_utilisateur']);
    $req537->bindParam(':idMaison',$_SESSION['id_maison']);
    $req537->execute();

    //SPURRESION DE LA MAISON
    $req529=$bdd->prepare('
DELETE FROM maison
WHERE id_maison = :idMaison AND id_utilisateur = :idUser
');
    $req529->bindParam(':idMaison',$_SESSION['id_maison']);
    $req529->bindParam(':idUser',$_SESSION['id_utilisateur']);
    $req529->execute();



}