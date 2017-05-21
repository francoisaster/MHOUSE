<?php

require '../Models/homeAdmin.php';
if(isset($_POST['id_utilisateur'])) {
    $req=afficheCapteurClient($_POST['id_utilisateur']);
    while ($donnees = $req->fetch()){
        echo'<p> <strong>Nom du capteur:</strong> <em>'.$donnees['nom_capteur'].'</em> <strong>Nom piece:</strong> <em>'.$donnees['nom_piece'].'</em> <strong>Nom Client:</strong> <em>'.$donnees['nom'].'</em></p> </br>';
    }
}