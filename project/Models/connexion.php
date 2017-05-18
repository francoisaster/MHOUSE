<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 16/05/2017
 * Time: 18:04
 */

function getUser(){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=mhouse_bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    $requser2 = $bdd->query("SELECT * FROM utilisateur");
    return $requser2;
}


//require '../Controllers/connexion.php';