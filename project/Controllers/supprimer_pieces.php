<?php
session_start();
require '../Models/capteurs.php'; // La fonction de suppression est aussi dans la page models/capteurs
if(isset($_POST['choix_piece_suppr']) ){

    supprimerPiecesEtCapts();
    header('Location:../public/index.php?p=capteur');
}

