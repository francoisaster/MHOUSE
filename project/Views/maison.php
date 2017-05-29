

<form action="../Controllers/maison.php" method="post" >
    <fieldset>
        <legend>Voir les capteurs par piece</legend>
        <p>
            <br />

            <label for="vue_capteur">Choix de piece :</label>
            <select name="vue_capteur" id="vue_capteur">
                <?php require'../Models/pieces.php';
                affichePiecesMenu(); ?>
            </select>

            <br/>
            <input type="submit" value="Rechercher" />
        </p>
    </fieldset>
</form>

<?php // A METTRE DANS CONTROLLERS
if(isset($_SESSION['id_piece'])){
require'../Models/afficheCapteur.php';
afficheCapteurs($_SESSION['id_utilisateur'],$_SESSION['id_piece']);
}
?>