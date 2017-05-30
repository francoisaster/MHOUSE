<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 20/05/2017
 * Time: 19:24
 */


function afficheCapteurs($id_utilisateur,$id_piece){

    $bdd=connexionBdd();
    // Récupération des 20 derniers messages
    $reponse = $bdd->query("SELECT *FROM capteurs WHERE id_piece=$id_piece and id_utilisateur=$id_utilisateur");
    ?>
    <div class="block">
        <?php
    while ($donnees = $reponse->fetch())
    {

        echo '<p><strong>' . htmlspecialchars($donnees['nom_capteur']) . '</strong> : ' . htmlspecialchars($donnees['type_capteur']) . '</p>';

    }
    ?>
    </div>
    <?php
    $reponse->closeCursor();

} //Fonction pour afficher les capteurs par piece