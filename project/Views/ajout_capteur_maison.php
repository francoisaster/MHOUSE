<form action="../Controllers/choix_maison.php" method="post" class="block">
    <fieldset>
        <legend>Veuillez choisir un domicile</legend>
        <p>
            <label for="choix_maison_capteur">Choix du domicile :</label>
            <select name="choix_maison_capteur" id="choix_maison_capteur">

                <?php require '../Models/connexionBdd.php';
                require'../Models/maison.php';
                afficheMaisonMenu(); ?>
</select>

<br/>

<br/>
<input type="submit" value="Choisir" class="submit"/>
</p>
</fieldset>
</form>