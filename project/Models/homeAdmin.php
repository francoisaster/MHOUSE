<?php
require'../Models/connexionBdd.php';


function afficheCapteurClient($id_utilisateur){


    $bdd=connexionBdd();

    $requser = $bdd->query("
SELECT piece.nom_piece,capteurs.nom_capteur,capteurs.type_capteur,utilisateur.id_utilisateur,utilisateur.prenom,utilisateur.nom 
FROM capteurs 
INNER JOIN utilisateur ON utilisateur.id_utilisateur=capteurs.id_utilisateur 
INNER JOIN piece ON piece.id_piece=capteurs.id_piece 
WHERE utilisateur.id_utilisateur=$id_utilisateur");
    return $requser;

}