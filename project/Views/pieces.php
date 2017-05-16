
<form action="../Controllers/pieces.php" method="post" >
    <label for="choix_capteur">Choix du capteur :</label>
    <select name="choix_capteur" id="choix_capteur">
        <option value="lumiere">Lumière</option>
        <option value="temperature">Température</option>
    </select>
</form>



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
    <?php
    require '../Models/pieces.php';
    affichePieces();?>
</fieldset>


<!-- CAPTEURS  -->

<form action="../Controllers/capteurs.php" method="post" >
    <fieldset>
        <legend>Ajout de capteurs</legend>
        <p>
            <label for="nom_capteur">Le nom du capteur :</label>
            <input type="text" name="nom_capteur" id="nom_capteur" placeholder="capteur1" autofocus="" />
            <br />

            <label for="type_capteur">Type de capteurs :</label>
            <select name="type_capteur" id="type_capteur">
                <option value="lumiere">Lumière</option>
                <option value="temperature">Température</option>
            </select>
            <br />
            <!--
                   <label for="pass">Retapez votre mot de passe : </label>
                    <input type="password" name="verify_pass" id="pass" placeholder="*********"/>
                    <br /> -->

            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>

<fieldset>
    <legend>Les capteurs :</legend>
    <?php
    require '../Models/capteurs.php';
    afficheCapteurs();?>
</fieldset>
