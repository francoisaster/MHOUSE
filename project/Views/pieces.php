
<form action="../Controllers/ajout_maison.php" method="post" class="block">
    <fieldset>
        <legend>Ajout d'une maison</legend>
        <p>
            <label for="nom_maison">Le nom de la maison :</label>
            <input type="text" name="nom_maison" id="nom_maison" autofocus="" />
            <br />
            <br/>
            <input type="submit" value="Ajouter maison" class="submit"/>
        </p>
    </fieldset>
</form>

<form action="../Controllers/pieces.php" method="post" class="block">
    <fieldset>
        <legend>Ajout d'une pièce</legend>
        <p>
            <label for="nom_piece">Le nom d'une pièce :</label>
            <input type="text" name="nom_piece" id="nom_piece" autofocus="" />
            <br />
            <br/>
            <label for="vue_capteur">Choix du domicile :</label>
            <select name="id_maison_piece" id="id_maison_piece">
                <?php require '../Models/affMenu.php';
                afficheMaisonMenu(); ?>
            </select>
            <br />
            <br/>
            <label for="superficie">La superficie de la piece (m²) :</label>
            <input type="text" name="superficie" id="superficie" autofocus="" />

            <br />
            <br/>
            <input type="submit" value="Ajouter pièce" class="submit"/>
        </p>
    </fieldset>
</form>


<!-- CAPTEURS  -->


<form action="../Controllers/afficheCapteur.php" method="post" class="block">
    <fieldset>
        <legend>Voir les capteurs par piece</legend>
        <p>
            <br />

            <label for="vue_capteur">Choix de piece :</label>
            <select name="vue_capteur" id="vue_capteur">
                <?php require '../Models/pieces.php';
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
