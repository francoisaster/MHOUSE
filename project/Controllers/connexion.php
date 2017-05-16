<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 16/05/2017
 * Time: 18:04
 */
session_start();


if (isset($_POST['entering'])) {
    if (!empty($_POST['pseudo']) AND !empty($_POST['pass'])){

        //A FAIRE UNE FONCTION DANS MODELS - On fait du MVC pas de la peinture :)

        $requser = $bdd->prepare("SELECT * FROM utilisateur");
        $requser->execute(array(
            $identifiant,
            $motdepasse
        ));

        $userexist = $requser -> rowCount();
        if ($userexist == 1) {
            $userinfo = $requser -> fetch();
            $_SESION['identifiant']=$userinfo['identifiant'];
            $_SESION['motdepasse']=$userinfo['motdepasse'];
        }
    }
}