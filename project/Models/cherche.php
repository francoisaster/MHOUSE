<?php

function cherche($id_utilisateur){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=mhouse_bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    $requser = $bdd->query("
SELECT piece.nom_piece,capteurs.nom_capteur,capteurs.type_capteur,utilisateur.id_utilisateur,utilisateur.prenom,utilisateur.nom 
FROM capteurs 
INNER JOIN utilisateur ON utilisateur.id_utilisateur=capteurs.id_utilisateur 
INNER JOIN piece ON piece.id_utilisateur=utilisateur.id_utilisateur 
WHERE utilisateur.id_utilisateur=$id_utilisateur");
    return $requser;
}