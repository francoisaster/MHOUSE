<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 16/05/2017
 * Time: 18:04
 */
require'../Models/connexionBdd.php';
function getUser(){

    $bdd=connexionBdd();

    $requser2 = $bdd->query("SELECT * FROM utilisateur");
    return $requser2;
}

//require '../Controllers/connexion.php';
?>