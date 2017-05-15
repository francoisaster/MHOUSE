<?php
require '../app/Autoloader.php'; //Apporte les Class nécessaires
Autoloader::register();


if(isset($_GET['p'])){
    $p = $_GET['p'];
} else{
    $p = 'home';
}

ob_start(); //TOUT ce qui sera affiché sera stocké dans une variable
if($p === 'home'){ //3 = c'est pour vérifier une chaine de caractère
    require '../Views/home.php';
}elseif ($p =='inscription'){
    require '../Views/inscription.php';
}elseif ($p =='capteurs'){
    require '../Views/capteurs.php';
}elseif ($p =='inscriptionSuccessfull'){
    require '../Views/inscriptionSuccessfull.php';
}elseif ($p =='pieces'){
    require '../Views/pieces.php';
}
// plutot que d'afficher les requires, ils seront stockés dans la variable $content.
$content = ob_get_clean();

require '../Views/templates/default.php';

