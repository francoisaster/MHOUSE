<?php

session_start();
/*
require '../app/Autoloader.php'; //Apporte les Class nécessaires
Autoloader::register();
*/
if(isset($_GET['p'])){ // AND preg_match("#^(a-zA-Z0-9)+$#",$_GET['p']) ?? Ne marche pas...
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
    if(isset($_SESSION['statut']) and $_SESSION['statut']=='admin'){
        require '../Views/homeAdmin.php';
    }else {
        require '../Views/home.php';
    }
}elseif ($p =='inscription'){
    require '../Views/inscription.php';
}
elseif ($p =='capteur'){
    if(isset($_SESSION['statut']) and $_SESSION['statut']=='spectateur'){
        require'../Views/interdit.php';
    }else{
        if(isset($_SESSION['id_maison'])){
            require '../Views/ajout_capteur.php';
        }else{
            require '../Views/ajout_capteur_maison.php';
        }
    }

}elseif ($p =='inscriptionSuccessfull'){
    require '../Views/inscriptionSuccessfull.php';

}elseif ($p =='pieces') {
    if (isset($_SESSION['statut']) and $_SESSION['statut'] == 'spectateur') {
        require '../Views/interdit.php';
    } else {
        require '../Views/pieces.php';

    }
}elseif($p== 'pilote') {
    require '../Views/pilote.php';
}elseif ($p =='contact'){
    if(isset($_SESSION['statut']) and $_SESSION['statut']=='admin'){
        require '../Views/contactAdmin.php';
    }else {
        require '../Views/contact.php';
    }
}


elseif ($p =='confirmation'){
    if(isset($_SESSION['statut']) and $_SESSION['statut']=='admin'){
        require '../Views/confirmation.php';
    }else {
        require '../Views/interdit.php';
    }

}
elseif ($p =='utilisateur'){
    if(isset($_SESSION['statut']) and $_SESSION['statut']=='admin'){
        require '../Views/utilisateur.php';
    }else {
        require '../Views/interdit.php';
    }

}
elseif ($p =='client'){
    if(isset($_SESSION['statut']) and $_SESSION['statut']=='admin'){
        require '../Views/client.php';
    }else {
        require '../Views/interdit.php';
    }

}
elseif ($p =='profil'){
    if(isset($_SESSION['statut']) and $_SESSION['statut']=='spectateur'){
        require'../Views/interdit.php';
    }else{
    require '../Views/profil.php';
}
}elseif ($p =='maison') {
    if(isset($_SESSION['id_maison'])){
            require '../Views/maison.php';
        }else{
            require '../Views/maisonChoix.php';
        }
}elseif ($p =='connexion'){
    require '../Views/connexion.php';
}elseif ($p =='leave'){
    require '../Views/leave.php';
}elseif ($p =='homeAdmin'){
    require '../Views/homeAdmin.php';
}
// plutot que d'afficher les requires, ils seront stockés dans la variable $content.
$content = ob_get_clean();


if(isset($_SESSION['co'])and(isset($_SESSION['statut']) and $_SESSION['statut']=='client')){
    ob_start();
    require '../Views/templates/menuCo.php';
    $menu = ob_get_clean();
    
}elseif(isset($_SESSION['co']) and isset($_SESSION['statut']) and $_SESSION['statut']=='spectateur'){
    ob_start();
    require '../Views/templates/menuSpec.php';
    $menu = ob_get_clean();

}elseif(isset($_SESSION['co']) and isset($_SESSION['statut']) and $_SESSION['statut']=='admin'){
    ob_start();
    require '../Views/templates/menuAdmin.php';
    $menu = ob_get_clean();

}

else{
    ob_start();
    require '../Views/templates/menuDeco.php';
    $menu = ob_get_clean();
}

require '../Views/templates/gabarit.php';





