<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 16/05/2017
 * Time: 15:17
 */

require '../Models/profil.php';

/*
updateProfil();
*/
upContact();


$requser = getUserSelected(); // Le reqUser contient requser2 qui a la querry bdd, récupère toutes les données de l'utilisateur connecté
$donnees = $requser->fetch();

    $_SESSION['pseudo'] = $donnees['pseudo'];
    $_SESSION['nom'] = $donnees['nom'];
    $_SESSION['prenom'] = $donnees['prenom'];
    $_SESSION['adresse'] = $donnees['adresse'];
    $_SESSION['email'] = $donnees['email'];
    $_SESSION['sexe'] = $donnees['sexe'];
    $_SESSION['pass'] = $donnees['pass'];
    $_SESSION['date_naissance'] = $donnees['date_naissance'];
header('Location:../public/index.php?p=profil');

