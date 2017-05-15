<?php


function creationCapteurs(){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    $req=$bdd->prepare('INSERT INTO capteurs(nom_capteur, type_capteur, date_d_ajout) VALUES(:nom_capteur, :type_capteur, NOW())');
// $req->execute(array($_POST['pseudo'], $_POST['pass'], $_POST['email']));
    $req->bindParam(':nom_capteur',$_POST['nom_capteur']);
    $req->bindParam(':type_capteur',$_POST['type_capteur']);
    $req->execute();

}

function afficheCapteurs(){

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
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
