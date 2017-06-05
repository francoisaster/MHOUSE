<?php
require '../Models/profil.php';
session_start();

$pseudo=htmlspecialchars(trim($_POST['pseudoEnfant']));
$mdp=htmlspecialchars(trim($_POST['mdp']));
$mdp2=htmlspecialchars(trim($_POST['mdp2']));

if (strlen($mdp) >= 8 && strlen($mdp) < 35 && preg_match('/(?=.*[0-9])[A-Z]|(?=.*[A-Z])[0-9]/', $mdp)) { //Si le mot de passe est alphanumérique et que sa longueur est plus que 8 caractères
    if (!empty($_POST['pseudoEnfant']) && !empty($_POST['mdp']) && !empty($_POST['mdp2'])) {
        if ($mdp == $mdp2) {
            $reponse = verifExistence($pseudo);
            if ($reponse->rowcount() == 0) {
                // l'utilisateur est unique, tout ses champs sont libres, il peut continuer
                childaccount();
                /*header('Location: ../public/index.php?p=inscriptionSuccessfull');*/
            } else {
                //Un utilisateur a deja pris un des champs requis
                //$erreur="Un des chammps existe deja, veuillez changer vos champs";
                //header('Location: http://localhost/project/public/index.php?p=inscription');
                echo 'Ce pseudo est déjà pris';
            }
        } else {
            echo 'Vos mots de passe ne dont pas identiques';
        }

    } else {
        echo 'Remplissez TOUS les champs';
    }

}else {
    echo 'Le mot de passe doit être alphanumérique, et compris entre 8 et 35 caractères !';
}







/*$_SESSION['nom'] = $donnees['nom'];
$_SESSION['prenom'] = $donnees['prenom'];
$_SESSION['adresse'] = $donnees['adresse'];
$_SESSION['email'] = $donnees['email'];
$_SESSION['sexe'] = $donnees['sexe'];
$_SESSION['pass'] = $donnees['pass'];
$_SESSION['date_naissance'] = $donnees['date_naissance'];*/

header('Location:../public/index.php?p=profil');





















