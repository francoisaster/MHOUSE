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

    $requser = getUser();

    while ($donnees = $requser->fetch()) {
        if ($donnees['pseudo'] == $pseudo AND $donnees['pass'] == $pass) {

            $_SESSION['pseudo'] = $pseudo;
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





