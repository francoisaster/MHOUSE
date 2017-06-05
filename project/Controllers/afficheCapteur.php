<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 20/05/2017
 * Time: 20:08
 */
session_start();
if(isset($_POST['vue_capteur']) && isset($_SESSION['id_utilisateur'])){
    $_SESSION['id_piece']=htmlspecialchars($_POST['vue_capteur']);
    header('Location:../public/index.php?p=pieces');
}