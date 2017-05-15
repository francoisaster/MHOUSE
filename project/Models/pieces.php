<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 14/05/2017
 * Time: 21:16
 */


try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

// Insertion
$req=$bdd->prepare('INSERT INTO piece(nom_piece) VALUES(:nom_piece)');
$req->bindParam(':nom_piece',$_POST['nom_piece']);
$req->execute();

header('Location: http://localhost/project/public/index.php?p=pieces');
//../Views/pieces.php');