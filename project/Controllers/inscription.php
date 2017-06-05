<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 15/05/2017
 * Time: 15:09
 */

require '../Models/inscription.php';

$pseudo=htmlspecialchars(trim($_POST['pseudo']));
$pass=htmlspecialchars(trim($_POST['pass']));
$pass2=htmlspecialchars(trim($_POST['pass2']));
$prenom=htmlspecialchars(trim($_POST['prenom']));
$nom=htmlspecialchars(trim($_POST['nom']));
$adresse=htmlspecialchars(trim($_POST['adresse']));
$civilite=htmlspecialchars(trim($_POST['sexe']));
$date_naissance=htmlspecialchars(trim($_POST['date_naissance']));
$email=htmlspecialchars(trim($_POST['email']));
$admin=htmlspecialchars(trim($_POST['statut'])); // TRIM : enlève les espaces

    if (strlen($pass) >= 8 && strlen($pass) < 35 && preg_match('/(?=.*[0-9])[A-Z]|(?=.*[A-Z])[0-9]/', $pass)) { //Si le mot de passe est alphanumérique et que sa longueur est plus que 8 caractères
        if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass2']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['adresse']) && !empty($_POST['sexe']) && !empty($_POST['date_naissance']) && !empty($_POST['statut'])) {
            if ($pass == $pass2) {
                $reponse = verifExistence($pseudo, $email);
                if ($reponse->rowcount() == 0) {
                    // l'utilisateur est unique, tout ses champs sont libres, il peut continuer
                    inscription();
                    //echo 'Inscrit !';
                    header('Location: ../public/index.php?p=inscriptionSuccessfull');
                } else {
                    //Un utilisateur a deja pris un des champs requis
                    //$erreur="Un des chammps existe deja, veuillez changer vos champs";
                    //header('Location: http://localhost/project/public/index.php?p=inscription');
                    echo 'Un champ est déjà pris';
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


// REGEX POUR NUMERO DE TELEPHONE FRANCAIS : #^0[1-9]([-. ]?[0-9]{2}){4}$#
// REGEX POUR ADRESSE GMAIL : ##^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#
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