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

ob_start(); //TOUT ce qui sera affiché sera stocké dans une variable
if($p === 'home'){ //3 = c'est pour vérifier la value et le type
    require '../Views/home.php';
}elseif ($p =='inscription'){
    require '../Views/inscription.php';
}elseif ($p =='inscriptionSuccessfull'){
    require '../Views/inscriptionSuccessfull.php';
}elseif ($p =='pieces'){
    require '../Views/pieces.php';
}elseif ($p =='contact'){
    require '../Views/contact.php';
}elseif ($p =='profil'){
    require '../Views/profil.php';
}elseif ($p =='connexion'){
    require '../Views/connexion.php';
}elseif ($p =='leave'){
    require '../Views/leave.php';
}

// plutot que d'afficher les requires, ils seront stockés dans la variable $content.
    $content = ob_get_clean();

    require '../Views/templates/default.php';





