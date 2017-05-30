<form action="../Controllers/pieces.php" method="post" class="block">
    <fieldset>
        <legend>Ajout d'une pièce</legend>
        <p>
            <label for="nom_piece">Le nom d'une pièce :</label>
            <input type="text" name="nom_piece" id="nom_piece" autofocus="" />
            <br />
            <br/>
            <input type="submit" value="Envoyer" class="submit"/>
        </p>
    </fieldset>
</form>


<!-- CAPTEURS  -->

<form action="../Controllers/capteurs.php" method="post" class="block">
    <fieldset>
        <legend>Ajout de capteurs</legend>
        <p>
            <label for="nom_capteur">Le nom du capteur :</label>
            <input type="text" name="nom_capteur" id="nom_capteur" />
            <br /><br/>

            <label for="type_capteur">Type de capteurs :</label>
            <select name="type_capteur" id="type_capteur">
                <option value="lumiere">Lumière</option>
                <option value="temperature">Température</option>

            </select>

            <br /><br/>

            <label for="choix_piece_capteur">Choix de piece :</label>
            <select name="choix_piece_capteur" id="choix_piece_capteur">

                <?php require'../Models/pieces.php';
                affichePiecesMenu(); ?>
            </select>

            <br/>
            <br/>
            <input type="submit" value="Envoyer" class="submit"/>
        </p>
    </fieldset>
</form>

<form action="../Controllers/afficheCapteur.php" method="post" class="block">
    <fieldset>
        <legend>Voir les capteurs par piece</legend>
        <p>
            <br />

            <label for="vue_capteur">Choix de piece :</label>
            <select name="vue_capteur" id="vue_capteur">
                <?php
                affichePiecesMenu(); ?>
            </select>

            <br/>
            <br/>
            <input type="submit" value="Rechercher" class="submit"/>
        </p>
    </fieldset>
</form>

<?php // A METTRE DANS CONTROLLERS
if(isset($_SESSION['id_piece'])){
require'../Models/afficheCapteur.php';
afficheCapteurs($_SESSION['id_utilisateur'],$_SESSION['id_piece']);
}
?>
