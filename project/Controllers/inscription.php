<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 15/05/2017
 * Time: 15:09
 */

require '../Models/inscription.php';

$pseudo=$_POST['pseudo'];
$pass=$_POST['pass'];
$pass2=$_POST['pass2'];
$prenom=htmlspecialchars(trim($_POST['prenom']));
$nom=htmlspecialchars(trim($_POST['nom']));
$adresse=htmlspecialchars(trim($_POST['adresse']));
$civilite=htmlspecialchars(trim($_POST['sexe']));
$date_naissance=htmlspecialchars(trim($_POST['date_naissance']));
$email=$_POST['email'];
$admin=htmlspecialchars(trim($_POST['admin']));

if(!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass2']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['adresse']) && !empty($_POST['sexe']) && !empty($_POST['date_naissance']) && !empty($_POST['admin']))
{
    if($pass==$pass2){
        $reponse = verifExistence($pseudo, $email);
        if($reponse->rowcount()==0){
            // l'utilisateur est unique, tout ses champs sont libres, il peut continuer
            inscription();
            //echo 'Inscrit !';
            header('Location: ../Views/inscriptionSuccessfull.php');
        }else{
            //Un utilisateur a deja pris un des champs requis
            //$erreur="Un des chammps existe deja, veuillez changer vos champs";
            //header('Location: http://localhost/project/public/index.php?p=inscription');
            echo 'Un champ est déjà pris';
        }
    }else{
        echo'Vos mots de passe ne dont pas identiques';
    }

}else{
    echo 'Remplissez TOUS les champs';
}


/*

if(!empty($_POST['email']) AND !empty($_POST['pass']) AND !empty($_POST['pass2'] ))
{
    require '../Models/inscription.php';
    $reponse = verifExistance($pseudo, $email, $pass);
    if($reponse->rowcount()==0){
        // l'utilisateur n'est pas dans la base de donnée
        inscription();
        header('Location: ../Views/inscriptionSuccessfull.php');
    } else{
        //Un utilisateur a deja pris les coordonnées
        $erreur="Pseudo deja existant";
        header('Location: http://localhost/project/public/index.php?p=home');
    }
}*/
/*
else
{
    $erreur="Tout les champs doivent être saisis";
    header('Location: http://localhost/project/public/index.php?p=home');

}*/



/*
if(isset($erreur))
{
    echo '<font color="red">' .$erreur. "</font>";
    header('Location: http://localhost/project/public/index.php?p=inscription');
}*/

/*
 * $insertmbr= $bdd->prepare("INSERT INTO utilisateur(compte,pseudo,email,mdp,sexe,nom,prenom,age,adresse) VALUES(?,?,?,?,?,?,?,?,?)");
        $insertmbr->execute(array($compte,$pseudo,$email,$mdp,$civilite,$nom,$prenom,$age,$adresse));
        $erreur= "Votre compte a bien été crée";
 */