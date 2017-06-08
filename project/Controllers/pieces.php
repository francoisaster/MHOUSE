<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 15/05/2017
 * Time: 15:04
 */
session_start();

require '../Models/pieces.php';
if(isset($_POST['nom_piece']) && isset($_SESSION['id_utilisateur']) and isUniquePiece($_POST['nom_piece'])) {
    creationPieces();
    header('Location:../public/index.php?p=pieces');
    exit();
}else{
    header('Location:../public/index.php?p=pieces');
}