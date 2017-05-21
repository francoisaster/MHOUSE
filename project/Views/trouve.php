<?php


if(isset($_POST['submit']) AND !empty($_POST['id_utilisateur'])) {
    require'../Models/cherche.php';
    $requser=cherche($_POST['id_utilisateur']);
    while ($donnees = $requser->fetch()) {
        echo '<p>'.$donnees['prenom'].' '.$donnees['nom'].' '.$donnees['nom_capteur'].' '.$donnees['nom_piece'].'</p>';
    }
}