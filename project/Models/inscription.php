<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 10/05/2017
 * Time: 14:16
 */

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=mhouse_bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
//A RAJOUTER LE HASHAGE

// Insertion
$req=$bdd->prepare('INSERT INTO utilisateur(pseudo, pass, prenom, nom, adresse, sexe, date_naissance, email, admin) VALUES(:pseudo,:pass,:prenom, :nom, :adresse, :sexe, :date_naissance, :email, :admin)');
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
$req->execute();



// On prend le marqueur :pseudo et on lui attribue le POST pseudo qui vient du champ pseudo


header('Location: ../Views/inscriptionSuccessfull.php');