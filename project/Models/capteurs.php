<?php


function creationCapteurs(){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=mhouse_bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    $req=$bdd->prepare('INSERT INTO capteurs(nom_capteur, type_capteur, date_d_ajout, id_utilisateur,id_piece) VALUES(:nom_capteur, :type_capteur, NOW(),:id_utilisateur,:id_piece)');
// $req->execute(array($_POST['pseudo'], $_POST['pass'], $_POST['email']));
    $req->bindParam(':nom_capteur',$_POST['nom_capteur']);
    $req->bindParam(':type_capteur',$_POST['type_capteur']);
    $req->bindParam(':id_utilisateur',$_SESSION['id_utilisateur']);
    $req->bindParam(':id_piece',$_POST['choix_piece_capteur']);
    $req->execute();

}

function afficheCapteurs(){

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=mhouse_bdd;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    // Récupération des 20 derniers messages
    $reponse = $bdd->query('SELECT nom_capteur, type_capteur FROM capteurs ORDER BY id_capteur DESC LIMIT 0, 20');
    while ($donnees = $reponse->fetch())
    {
        echo '<p><strong>' . htmlspecialchars($donnees['nom_capteur']) . '</strong> : ' . htmlspecialchars($donnees['type_capteur']) . '</p>';
    }
    $reponse->closeCursor();

}
