<?php
session_start();
require '../Models/capteurs.php';
if(isset($_POST['nom_capteur']) && isset($_POST['type_capteur']) AND isset($_POST['choix_piece_capteur']) ){
    // Attention on n'a pas besoin de choix_piece_capteur et de type_capteur pour

    //RAJOUTER UNE FONCTION DE DETECTION D EXISTENCE DU CAPTEUR. Car bug si le capteur existe pas.
    SupprimerCapteurs();
    header('Location:../public/index.php?p=capteur');
}

