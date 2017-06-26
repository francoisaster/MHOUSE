<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 15/05/2017
 * Time: 15:02
 */
session_start();

require '../Models/capteurs.php';
if(isset($_POST['nom_capteur']) && isset($_POST['type_capteur']) AND isset($_POST['choix_piece_capteur']) ){
    creationCapteurs();
// header('Location: ../public/index.php');
    header('Location:../public/index.php?p=capteur');
}