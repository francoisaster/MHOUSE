<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=mhouse_bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$req=$bdd->prepare('INSERT INTO commentaire(mail, commentaire, nom) VALUES(?, ?, ?)');
$req->execute(array($_POST['mail'], $_POST['commentaire'], $_POST['nom']));

    echo 'Votre message a bien été pris en charge !';
