<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 15/05/2017
 * Time: 15:09
 */

require '../Models/inscription.php';
if(isset($_POST['nom_piece']) && isset($_POST[''])    ){

    inscription();
    header('Location: ../Views/inscriptionSuccessfull.php');
}