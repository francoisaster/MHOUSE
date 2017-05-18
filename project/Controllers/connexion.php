<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 16/05/2017
 * Time: 18:04
 */
require '../Models/connexion.php';

if(isset($_POST['submit']) AND !empty($_POST['pseudo'])AND !empty($_POST['pass'])) {

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $pass = ($_POST['pass']);

    $requser = getUser();

    while ($donnees = $requser->fetch()) {
        if ($donnees['pseudo'] == $pseudo AND $donnees['pass'] == $pass) {
            $_SESSION['pseudo'] = $pseudo;
            if(($donnees['admin'])=='true'){
                $_SESSION['admin']='true';
            }
            header('Location: http://localhost/project/public/index.php?p=home');
            exit();
        }
    }
    echo 'MDP ou pseudo faux';
    //MDP ou pseudo faux
    header('Location: http://localhost/project/public/index.php?p=connexion');
}else{
    echo 'Veuillez inserer les champs';
    //Veuillez inserer les champs
    header('Location: http://localhost/project/public/index.php?p=connexion');
}





