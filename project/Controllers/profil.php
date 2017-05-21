<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 16/05/2017
 * Time: 15:17
 */

require '../Models/profil.php';
require '..Models/connexion.php'; //pour avoir getUser
updateProfil();
header('Location:../public/index.php?p=profil');