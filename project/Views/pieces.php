<form action="../Controllers/pieces.php" method="post" >
    <fieldset>
        <legend>Ajout d'une pièce</legend>
        <p>
            <label for="nom_piece">Le nom d'une pièce :</label>
            <input type="text" name="nom_piece" id="nom_piece" placeholder="Salle à manger" autofocus="" />
            <br />

            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>

<fieldset>
    <legend>Les différentes pièces :</legend>
    <?/*php
    echo $_SESSION['id_utilisateur'];
    require '../Models/pieces.php';
    affichePieces();*/?>
</fieldset>


<!-- CAPTEURS  -->

<form action="../Controllers/capteurs.php" method="post" >
    <fieldset>
        <legend>Ajout de capteurs</legend>
        <p>
            <label for="nom_capteur">Le nom du capteur :</label>
            <input type="text" name="nom_capteur" id="nom_capteur" placeholder="capteur1" />
            <br />

            <label for="type_capteur">Type de capteurs :</label>
            <select name="type_capteur" id="type_capteur">
                <option value="lumiere">Lumière</option>
                <option value="temperature">Température</option>
            </select>

            <br />

            <label for="choix_piece_capteur">Choix de piece :</label>
            <select name="choix_piece_capteur" id="choix_piece_capteur">

                <?php require'../Models/pieces.php';
                affichePiecesMenu(); ?>
            </select>

            <br/>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>

<fieldset>
    <legend>Les capteurs :</legend>
    <?/*php
    require '../Models/capteurs.php';
    afficheCapteurs();*/?>
</fieldset>
