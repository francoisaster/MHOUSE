<?php
session_start();
require '../Models/capteurs.php'; // La fonction de suppression est aussi dans la page models/capteurs
if(isset($_POST['choix']) AND ($_POST['choix']=="oui")){
    echo'oui';
    supprimerMaisonEtPiecesEtCapt();
    header('Location:../public/index.php?p=capteur');
    exit();
}else{
    echo "non";
    header('Location:../public/index.php?p=capteur');
    exit();
}
