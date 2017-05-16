<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 16/05/2017
 * Time: 15:16
 */



function afficheProfil(){
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=mhouse_bdd;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare('SELECT pseudo, prenom, nom, adresse, sexe, date_naissance, email FROM utilisateur 
WHERE id_utilisateur= ? ');
    $req=execute(array(
        $_GET['id_utilisateur']
    ));
    while ($donnees = $req->fetch()) {
        echo '<p>' . htmlspecialchars($donnees['pseudo']) . htmlspecialchars($donnees['prenom']) . htmlspecialchars($donnees['nom']) .
            htmlspecialchars($donnees['adresse']) . htmlspecialchars($donnees['sexe']) . htmlspecialchars($donnees['date_naissance']) .
            htmlspecialchars($donnees['email']) . '</p>';
    }
    $req->closeCursor();
}



function updateProfil()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=mhouse_bdd;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare('UPDATE utilisateur SET pseudo = :nv_pseudo, prenom=:nv_prenom, nom=:nv_nom, adresse=:nv_adresse, sexe=:nv_sexe, date_naissance=:date_naissance, email=:nv_email WHERE id_utilisateur=:id_utilisateur');
    $req = execute(array(
        'nv_pseudo' => $_POST['pseudo'],
        'nv_prenom' => $_POST['prenom'],
        'nv_nom' => $_POST['nom'],
        'nv_adresse' => $_POST['adresse'],
        'nv_sexe' => $_POST['sexe'],
        'date_naissance' => $_POST['date_naissance'],
        'nv_email' => $_POST['email'],
    ));
}