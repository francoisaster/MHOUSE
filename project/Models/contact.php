<?php

require'../Models/connexionBdd.php';
$bdd=connexionBdd();

$req=$bdd->prepare('INSERT INTO commentaire(mail, commentaire, nom) VALUES(?, ?, ?)');
$req->execute(array(htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['commentaire']), htmlspecialchars($_POST['nom'])));

    echo 'Votre message a bien été pris en charge !';
