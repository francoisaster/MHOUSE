<?php
/**
 * Created by PhpStorm.
 * User: Quentin
 * Date: 15/05/2017
 * Time: 15:02
 */
session_start();
if(isset($_SESSION['id_utilisateur'])){
    $_SESSION['id_maison']=$_POST['choix_maison'];
    header('Location:../public/index.php?p=maison');
}