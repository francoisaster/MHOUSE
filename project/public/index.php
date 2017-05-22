<?php

session_start();
/*
require '../app/Autoloader.php'; //Apporte les Class nécessaires
Autoloader::register();
*/
if(isset($_GET['p'])){
    $p = $_GET['p'];
} else{
    $p = 'connexion';
}

/*
 *
 * METTRE DES SWITCH A MA PLACE DE ELSEIF
 *
 */

ob_start(); //TOUT ce qui sera affiché sera stocké dans une variable

if($p === 'home'){ //3 = c'est pour vérifier la value et le type
    if(isset($_SESSION['admin']) and $_SESSION['admin']=='true'){
        require '../Views/homeAdmin.php';
    }else {
        require '../Views/home.php';
    }
}elseif ($p =='inscription'){
    require '../Views/inscription.php';
}elseif ($p =='inscriptionSuccessfull'){
    require '../Views/inscriptionSuccessfull.php';
}elseif ($p =='pieces'){
    require '../Views/pieces.php';
}elseif ($p =='contact'){
    if(isset($_SESSION['admin']) and $_SESSION['admin']=='true'){
        require '../Views/contactAdmin.php';
    }else {
        require '../Views/contact.php';
    }
}elseif ($p =='profil'){
    require '../Views/profil.php';
}elseif ($p =='connexion'){
    require '../Views/connexion.php';
}elseif ($p =='leave'){
    require '../Views/leave.php';
}elseif ($p =='homeAdmin'){
    require '../Views/homeAdmin.php';
}
// plutot que d'afficher les requires, ils seront stockés dans la variable $content.
$content = ob_get_clean();


if(isset($_SESSION['co'])){
    ob_start();
    require '../Views/templates/menuCo.php';
    $menu = ob_get_clean();
}else{
    ob_start();
    require '../Views/templates/menuDeco.php';
    $menu = ob_get_clean();
}

require '../Views/templates/default.php';





