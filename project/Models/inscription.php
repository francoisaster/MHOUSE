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
    $req->bindParam(':pseudo',$_POST['pseudo']);
    $req->bindParam(':pass',$_POST['pass']);
    $req->bindParam(':prenom',$_POST['prenom']);
    $req->bindParam(':nom',$_POST['nom']);
    $req->bindParam(':adresse',$_POST['adresse']);
    $req->bindParam(':sexe',$_POST['sexe']);
    $req->bindParam(':date_naissance',$_POST['date_naissance']);
    $req->bindParam(':email',$_POST['email']);
    $req->bindParam(':admin',$_POST['admin']);
    $req->bindParam(':numero_tel',$_POST['numero_tel']);
    $req->execute();
// On prend le marqueur :pseudo et on lui attribue le POST pseudo qui vient du champ pseudo

}

function verifExistence($pseudo, $email){

    $bdd=connexionBdd();
    $reponse = $bdd->prepare('SELECT pseudo,email, pass FROM utilisateur WHERE pseudo= ? && email= ? ');
    $reponse->execute(array($pseudo, $email));
    return $reponse;
}
