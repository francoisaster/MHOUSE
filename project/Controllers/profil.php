<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 16/05/2017
 * Time: 15:17
 */

require '../Models/profil.php';

session_start();
updateProfil();


/*
upContact();
*/

$requser = getUserSelected(); // Le reqUser contient requser2 qui a la querry bdd, récupère toutes les données de l'utilisateur connecté
$donnees = $requser->fetch();

$_SESSION['pseudo'] = htmlspecialchars($donnees['pseudo']);
$_SESSION['nom'] = htmlspecialchars($donnees['nom']);
$_SESSION['prenom'] = htmlspecialchars($donnees['prenom']);
$_SESSION['adresse'] = htmlspecialchars($donnees['adresse']);
$_SESSION['email'] = htmlspecialchars($donnees['email']);
$_SESSION['sexe'] = htmlspecialchars($donnees['sexe']);
$_SESSION['pass'] = htmlspecialchars($donnees['pass']);
$_SESSION['date_naissance'] = htmlspecialchars($donnees['date_naissance']);


header('Location:../public/index.php?p=profil');