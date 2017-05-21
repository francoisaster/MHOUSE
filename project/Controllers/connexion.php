<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 16/05/2017
 * Time: 18:04
 */

session_start();

require '../Models/connexion.php';

if(isset($_POST['submit']) AND !empty($_POST['pseudo'])AND !empty($_POST['pass'])) {

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $pass = ($_POST['pass']);

    $requser = getUser(); // Le reqUser contient requser2 qui a la querry bdd

    while ($donnees = $requser->fetch()) {
        if ($donnees['pseudo'] == $pseudo AND $donnees['pass'] == $pass) {

            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['nom']=$donnees['nom'];
            $_SESSION['prenom']=$donnees['prenom'];
            $_SESSION['adresse']=$donnees['adresse'];
            $_SESSION['email']=$donnees['email'];
            $_SESSION['sexe']=$donnees['sexe'];
            $_SESSION['pass']=$donnees['pass'];
            $_SESSION['date_naissance']=$donnees['date_naissance'];
            $_SESSION['numero_tel']=$donnees['numero_tel'];


            $_SESSION['co']='true';
            $_SESSION['id_utilisateur']=$donnees['id_utilisateur'];
            if(($donnees['admin'])=='true'){
                $_SESSION['admin']='true';
                header('Location:../public/index.php?p=homeAdmin');
                exit();
            }
            header('Location:../public/index.php?p=home');
            exit();
        }
    }
    echo 'MDP ou pseudo faux';
    //MDP ou pseudo faux
    header('Location:../public/index.php?p=connexion');
    exit();
}else{
    echo 'Veuillez inserer les champs';
    //Veuillez inserer les champs
    header('Location:../public/index.php?p=connexion');
    exit();
}





