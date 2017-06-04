<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 04/06/2017
 * Time: 18:42
 */
require 'connexionBdd2.php';
function nomMaison($id_maison){

    $bdd=connexionBdd2();
    $req = $bdd->query("SELECT nom FROM maison where id_maison=$id_maison");
    $donnees = $req->fetch();
    return $donnees['nom'];
}