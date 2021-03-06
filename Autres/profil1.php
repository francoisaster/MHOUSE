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
        'nv_pseudo' => $_POST['pseudo'],
        'nv_prenom' => $_POST['prenom'],
        'nv_nom' => $_POST['nom'],
        'nv_adresse' => $_POST['adresse'],
        'nv_sexe' => $_POST['sexe'],
        'date_naissance' => $_POST['date_naissance'],
        'nv_email' => $_POST['email'],
        'numero_tel' => $_POST['numero_tel'],
        'id_utilisateur' => $_SESSION['id_utilisateur'],
        ));
}

function childaccount(){
    $bdd=connexionBdd();
    $req=$bdd->prepare('INSERT INTO utilisateur(pseudo,pass,prenom,nom,adresse,sexe,date_naissance,email,numero_tel) VALUES(:pseudo,:pass,:prenom,:nom,:adresse,:sexe,:date_naissance,:email,:numero_tel)');
    $req->execute(array('pseudo' => $_POST['pseudoEnfant'],
                        'pass' => $_POST['mdp'],
                        'prenom' => $_SESSION['prenom'],
                        'nom' => $_SESSION['nom'],
                        'adresse' => $_SESSION['adresse'],
                        'sexe' => $_SESSION['sexe'],
                        'date_naissance' => $_SESSION['date_naissance'],
                        'email' => $_SESSION['email'],
                        'numero_tel' => $_SESSION['numero_tel']));


}



function upContact(){
    $bdd=connexionBdd();
    $req = $bdd->prepare('UPDATE utilisateur SET adresse = :nv_adresse, email = :nv_mail, numero_tel = :nv_tel WHERE id_utilisateur = :id_utilisateur');
    $req->execute(array(
        'nv_adresse' => $_POST['adresse'],
        'nv_mail' => $_POST['email'],
        'nv_tel' => $_POST['numero_tel'],
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
