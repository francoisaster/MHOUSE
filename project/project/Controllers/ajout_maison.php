<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 04/06/2017
 * Time: 16:39
 */
session_start();

require '../Models/connexionBdd.php';
require '../Models/maison.php';
if(isset($_POST['nom_maison']) && isset($_SESSION['id_utilisateur']) and isUniqueMaison($_POST['nom_maison'])) {
    creationMaison();
    header('Location:../public/index.php?p=pieces');
    exit();
}else{
    header('Location:../public/index.php?p=pieces');
}