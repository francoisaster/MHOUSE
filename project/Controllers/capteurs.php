<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 15/05/2017
 * Time: 15:02
 */

require '../Models/capteurs.php';
if(isset($_POST['nom_capteur']) && isset($_POST['type_capteur']) ){
    creationCapteurs();
// header('Location: ../public/index.php');
    header('Location: http://localhost/project/public/index.php?p=pieces');
}