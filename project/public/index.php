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
}
// plutot que d'afficher les requires, ils seront stockés dans la variable $content.
$content = ob_get_clean();

require '../Views/templates/default.php';



/*
 * //a enlever et mettre en page connexion / Controllers
    else{
        // utilisateur trouvé dans la base de données
        $ligne = $reponse->fetch();
        if($mdp!=$ligne['mdp']){
            // Le mot de passe entré ne correspond pas à celui stocké dans la base de données
            $erreur = "Mot de passe incorrect";
            include("Vue/app_accueil.php");
        }
        else{
            // mot de passe correct, on affiche la page d'accueil
            $_SESSION["userID"] = $ligne['id'];
            include("Vue/page_accueil.php");
        }
    }
 */
