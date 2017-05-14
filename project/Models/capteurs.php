<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

// Insertion

$req=$bdd->prepare('INSERT INTO capteurs(nom_capteur, type_capteur, date_d_ajout) VALUES(:nom_capteur, :type_capteur, NOW())');
// $req->execute(array($_POST['pseudo'], $_POST['pass'], $_POST['email']));       
$req->bindParam(':nom_capteur',$_POST['nom_capteur']);
$req->bindParam(':type_capteur',$_POST['type_capteur']);
$req->execute();

// On prend le marqueur :pseudo et on lui attribue le POST pseudo qui vient du champ pseudo

header('Location: ../public/index.php');

