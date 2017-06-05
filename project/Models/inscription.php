<?php


/*
 *
 */
require'../Models/connexionBdd.php';
function inscription() {

    $bdd=connexionBdd();

    /*$pseudo=htmlspecialchars(trim($_POST['pseudo']));
    $pass=sha1($_POST['pass']);
    $pass2=sha1($_POST['pass2']);
    $prenom=htmlspecialchars(trim($_POST['prenom']));
    $nom=htmlspecialchars(trim($_POST['nom']));
    $adresse=htmlspecialchars(trim($_POST['adresse']));
    $civilite=htmlspecialchars(trim($_POST['civilite']));
    $date_naissance=htmlspecialchars(trim($_POST['date_naissance']));
    $email=htmlspecialchars(trim($_POST['email']));
    $admin=htmlspecialchars(trim($_POST['admin']));*/

// Insertion
    $req=$bdd->prepare('INSERT INTO utilisateur(pseudo, pass, prenom, nom, adresse, sexe, date_naissance, email, admin, numero_tel) VALUES(:pseudo,:pass,:prenom, :nom, :adresse, :sexe, :date_naissance, :email, :admin, :numero_tel)');
// $req->execute(array($_POST['pseudo'], $_POST['pass'], $_POST['email']));
    $req->bindParam(':pseudo',htmlspecialchars($_POST['pseudo']));
    $req->bindParam(':pass',htmlspecialchars($_POST['pass']));
    $req->bindParam(':prenom',htmlspecialchars($_POST['prenom']));
    $req->bindParam(':nom',htmlspecialchars($_POST['nom']));
    $req->bindParam(':adresse',htmlspecialchars($_POST['adresse']));
    $req->bindParam(':sexe',htmlspecialchars($_POST['sexe']));
    $req->bindParam(':date_naissance',htmlspecialchars($_POST['date_naissance']));
    $req->bindParam(':email',htmlspecialchars($_POST['email']));
    $req->bindParam(':admin',htmlspecialchars($_POST['admin']));
    $req->bindParam(':numero_tel',htmlspecialchars($_POST['numero_tel']));
    $req->execute();
// On prend le marqueur :pseudo et on lui attribue le POST pseudo qui vient du champ pseudo

}

function verifExistence($pseudo, $email){

    $bdd=connexionBdd();
    $reponse = $bdd->query('SELECT pseudo,email, pass FROM utilisateur WHERE pseudo="'.$pseudo.'" && email="'.$email.'" ');
    return $reponse;
}
