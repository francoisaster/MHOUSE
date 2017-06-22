<div class="notifications">
    <img src="http://localhost/Project/Views/valider.jpg" class="check"> <!-- A CHANGER EN RELATIF -->
    <a>Le capteur a bien été ajouté</a>            
</div>

<form action="../Controllers/capteurs.php" method="post" class="block test">
    <fieldset>
        <legend>Ajout de capteurs dans
            <?php
            require'../Models/nomMaison.php';
            echo nomMaison($_SESSION['id_maison'])
            ?>
        </legend>
        <p>
            <label for="nom_capteur">Le nom du capteur :</label>
            <input type="text" name="nom_capteur" id="nom_capteur" />
            <br/><br/>
            <label for="marque">La marque du capteur :</label>
            <input type="text" name="marque" id="marque" />
            <br /><br/>
            <label for="numero_serie">Le numero de serie du capteur :</label>
            <input type="text" name="numero_serie" id="numero_serie" />
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
    <input type="button" value="Ajouter" class="submit" id="testSubmit" /> <!-- METTRE UN SUBMIT A LA PLACE DE BUTTON-->
        </p>
</fieldset>
</form>

<form action="../Controllers/choix_maison.php" method="post" class="block">
    <fieldset>
        <legend>Changer de domicile</legend>
        <p>
            <label for="choix_maison_capteur">Choix du domicile :</label>
            <select name="choix_maison_capteur" id="choix_maison_capteur">

                <?php require'../Models/maison.php';
                afficheMaisonMenu(); ?>
            </select>
            <br/>
            <br/>
            <input type="submit" value="Choisir" class="submit"/>
        </p>
    </fieldset>
</form>

<form action="../Controllers/supprimer_capteur.php" method="post" class="block">
    <fieldset>
        <legend>Supprimer des capteurs dans
            <?php
            echo nomMaison($_SESSION['id_maison']);
            ?>
        </legend>
        <p>
            <label for="nom_capteur">Le nom du capteur :</label>
            <input type="text" name="nom_capteur" id="nom_capteur" />
            <br/><br/>
            <br /><br/>
            <label for="choix_piece_capteur">Choix de piece :</label>
            <select name="choix_piece_capteur" id="choix_piece_capteur">
                <?php
                affichePiecesMenu();
                ?>
            </select>
            <br/>
            <br/>
            <label for="type_capteur">Type de capteurs :</label>
            <select name="type_capteur" id="type_capteur">
                <option value="lumiere">Lumière</option>
                <option value="temperature">Température</option>
            </select>
            <br/>
            <br/>
            <input type="submit" value="Supprimer" class="submit" id="suppr" />
        </p>
    </fieldset>
</form>



<script>

    $(document).ready(function() {
        $("#testSubmit").click( function(){
            $('.notifications').fadeIn();
            var temp = '.' + this.id;
            setTimeout(function(){ 
                $('.notifications').fadeOut();
                $(temp).submit();
            },1500);
        });
    });

</script>