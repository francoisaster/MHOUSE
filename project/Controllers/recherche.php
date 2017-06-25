<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26/06/2017
 * Time: 00:17
 */
require '../Models/confirmation.php';
confirmation($_POST['id_utilisateur'],$_POST['choix']);
header('Location:../public/index.php?p=recherche');