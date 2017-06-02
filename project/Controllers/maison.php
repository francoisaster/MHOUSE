<?php
/**
 * Created by PhpStorm.
 * User: Quentin
 * Date: 15/05/2017
 * Time: 15:02
 */
session_start();
if(isset($_POST['vue_capteur']) && isset($_SESSION['id_utilisateur'])){
    $_SESSION['id_piece']=$_POST['vue_capteur'];
    header('Location:../public/index.php?p=maison');
}