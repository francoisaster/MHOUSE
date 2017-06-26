<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26/06/2017
 * Time: 23:36
 */$bdd=connexionBdd2();
if(isset($_POST['capteur_choisi'])) {
    $capteur_choisi = $_POST['capteur_choisi'];


    $test = $bdd->prepare('SELECT id_capteur FROM capteurs WHERE nom_capteur = ? AND id_utilisateur= ?'); // rajout d'heure
    $test->execute(array($capteur_choisi, $_SESSION['id_utilisateur']));
    while ($donneeTest = $test->fetch()) {
        $idCapteur = htmlspecialchars($donneeTest['id_capteur']);
    }

    $result = $bdd->prepare('SELECT * FROM valeurs_capteur WHERE id_capteur= ? ORDER BY date_mesure'); // rajout d'heure
    $result->execute(array($idCapteur));



    $reponses = $bdd->query('SELECT AVG(valeur) AS valeur FROM valeurs_capteur');
    while ($donnees42 = $reponses->fetch())
    {
        $moyenne = $donnees42['valeur'];
    }
    $reponses->closeCursor();


}