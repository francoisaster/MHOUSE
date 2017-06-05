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
    $pass = htmlspecialchars($_POST['pass']);

    $requser = getUser(); // Le reqUser contient requser2 qui a la querry bdd

    while ($donnees = $requser->fetch()) {
        if ($donnees['pseudo'] == $pseudo AND $donnees['pass'] == $pass) {

            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['nom']=htmlspecialchars($donnees['nom']);
            $_SESSION['prenom']=htmlspecialchars($donnees['prenom']);
            $_SESSION['adresse']=htmlspecialchars($donnees['adresse']);
            $_SESSION['email']=htmlspecialchars($donnees['email']);
            $_SESSION['sexe']=htmlspecialchars($donnees['sexe']);
            $_SESSION['pass']=htmlspecialchars($donnees['pass']);
            $_SESSION['numero_tel']=htmlspecialchars($donnees['numero_tel']);
            $_SESSION['date_naissance']=htmlspecialchars($donnees['date_naissance']);


            $_SESSION['co']='true';
            $_SESSION['id_utilisateur']=htmlspecialchars($donnees['id_utilisateur']);
            if(($donnees['statut'])=='admin'){
                $_SESSION['statut']='admin';
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





