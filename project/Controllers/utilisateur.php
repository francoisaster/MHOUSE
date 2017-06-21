<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17/06/2017
 * Time: 16:00
 */


require '../Models/confirmation.php';
confirmation($_POST['id_utilisateur'],$_POST['choix']);
header('Location:../public/index.php?p=utilisateur');