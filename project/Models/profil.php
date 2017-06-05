<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 16/05/2017
 * Time: 15:16
 */

require'../Models/connexionBdd.php';

function afficheProfil(){
    $bdd=connexionBdd();
    $req = $bdd->prepare('SELECT pseudo, prenom, nom, adresse, sexe, date_naissance, email FROM utilisateur
WHERE id_utilisateur= ? ');
    $req=execute(array(
        $_POST['id_utilisateur']
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
    $bdd=connexionBdd();
    $requpdate = $bdd->prepare('
UPDATE utilisateur
SET pseudo = :nv_pseudo, prenom = :nv_prenom, nom = :nv_nom, adresse = :nv_adresse, sexe = :nv_sexe,
date_naissance = :date_naissance, email = :nv_email, numero_tel = :numero_tel
WHERE id_utilisateur = :id_utilisateur ');
    $requpdate->execute(array(
        'nv_pseudo' => htmlspecialchars($_POST['pseudo']),
        'nv_prenom' => htmlspecialchars($_POST['prenom']),
        'nv_nom' => htmlspecialchars($_POST['nom']),
        'nv_adresse' => htmlspecialchars($_POST['adresse']),
        'nv_sexe' => htmlspecialchars($_POST['sexe']),
        'date_naissance' => htmlspecialchars($_POST['date_naissance']),
        'nv_email' => htmlspecialchars($_POST['email']),
        'numero_tel' => htmlspecialchars($_POST['numero_tel']),
        'id_utilisateur' => htmlspecialchars($_SESSION['id_utilisateur']),
        ));
}

function upContact(){
    $bdd=connexionBdd();
    $req = $bdd->prepare('UPDATE utilisateur SET adresse = :nv_adresse, email = :nv_mail, numero_tel = :nv_tel WHERE id_utilisateur = :id_utilisateur');
    $req->execute(array(
        'nv_adresse' => htmlspecialchars($_POST['adresse']),
        'nv_mail' => htmlspecialchars($_POST['email']),
        'nv_tel' => htmlspecialchars($_POST['numero_tel']),
        'id_utilisateur' => $_SESSION['id_utilisateur'],
    ));

}

function getUserSelected(){
    $bdd=connexionBdd();
    $requser2 = $bdd->prepare('SELECT * FROM utilisateur WHERE id_utilisateur= :id_utilisateur');
    $requser2 -> execute(array(
    'id_utilisateur' => $_SESSION['id_utilisateur'],
        ));
    return $requser2;
}
