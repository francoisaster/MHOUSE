<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 04/06/2017
 * Time: 17:30
 */
session_start();

if(isset($_POST['choix_maison_capteur']) && isset($_SESSION['id_utilisateur'])){
    $_SESSION['id_maison']=htmlspecialchars($_POST['choix_maison_capteur']);
    header('Location:../public/index.php?p=capteur');
}