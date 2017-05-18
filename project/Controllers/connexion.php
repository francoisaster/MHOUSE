<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 16/05/2017
 * Time: 18:04
 */
require '../Models/connexion.php';
$erreur = '';

if(isset($_POST['submit']) AND !empty($_POST['pseudo'])AND !empty($_POST['pass'])) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=mhouse_bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $pass = ($_POST['pass']);

    $requser = getUser();

    while ($donnees = $requser->fetch()) {
        if ($donnees['pseudo'] == $pseudo AND $donnees['pass'] == $pass) {
            $_SESSION['pseudo'] = $pseudo;
            if(($donnees['admin'])=='true'){
                $_SESSION['admin']='true';
            }
            header('Location: http://localhost/project/public/index.php?p=home');
        }

    }
    $erreur='MDP ou pseudo faux';
    header('Location: http://localhost/project/public/index.php?p=connexion');
}else{
    $erreur='Veuillez inserer les champs';
    header('Location: http://localhost/project/public/index.php?p=connexion');
}





