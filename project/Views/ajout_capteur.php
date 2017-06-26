<div class="notifications">
    <img src="http://localhost/Project/Views/valider.jpg" class="check">
    <!--a id="messagereussi">La maison <script>document.write(document.getElementById('nom_maison'))</script>a bien été enregistré </a-->
    <a id="messagereussi"> </a>
</div>

<div class="messageerreur">
    <img src="http://localhost/Project/Views/info.png" class="check">
    <a>Erreur : veuillez remplir le champ</a>            
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
    <input type="submit" value="Ajouter" class="submit" id="testSubmit" /> <!-- METTRE UN SUBMIT A LA PLACE DE BUTTON-->
        </p>
</fieldset>
</form>
<!--
LE BLOC QUI CHOISI LE DOMICILE
</div> -->
<form action="../Controllers/choix_maison.php" method="post" id="changerDomicileFloatBlock">
    <fieldset>
        <legend id="changerDomicileFloat">Changer de domicile</legend>
        <p id="changerDomicileFloatComplem">
            <label2 for="choix_maison_capteur">Choix du domicile :</label2>
            <br>
            <br>
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

<!--
Suppression des capteurs de la pièce qui a été choisi
-->
<form action="../Controllers/supprimer_capteur.php" method="post" class="block" >
    <fieldset >
        <legend id="suppressionFieldsetToggle">Supprimer des capteurs dans
            <?php
            echo nomMaison($_SESSION['id_maison']);
            ?>
        </legend>
        <p id="suppressionToggle">
            <label for="nom_capteur">Le nom du capteur :</label>
            <input type="text" name="nom_capteur" id="nom_capteur" />
            <br/><br/>
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
            <input type="submit" value="Supprimer" class="submit" id="suppr1" />
        </p>
    </fieldset>
</form>

<form action="../Controllers/supprimer_pieces.php" method="post" class="block" >
    <fieldset >
        <legend id="suppressionFieldset2Toggle">Supprimer des pièces dans
            <?php
            echo nomMaison($_SESSION['id_maison']);
            ?>
        </legend>
        <p id="suppressionToggle2">
            <label for="choix_piece_suppr">Choix de la pièce à supprimer :</label>
            <select name="choix_piece_suppr" id="choix_piece_suppr">
                <?php
                affichePiecesMenu();
                ?>
            </select>
            <br/>
            <br/>
            <input type="submit" value="Supprimer" class="submit" id="suppr2" />
        </p>
    </fieldset>
</form>

<form action="../Controllers/supprimer_maison.php" method="post" class="block" >
    <fieldset >
        <legend id="suppressionFieldset3Toggle">Supprimer un domicile
        </legend>
        <p id="suppressionToggle3">

            <span> Vous allez supprimer la maison :
            <?php
            echo nomMaison($_SESSION['id_maison']);
            ?></span>
            <br/>
            <br/>
        <span>Etes-vous sur de votre choix ?</span>
            <br/>
            <br/>
            <input type="radio" name="choix" value="oui" id="oui" /> <label for="oui">Oui, je désire supprimer le domicile
            <?php
            echo nomMaison($_SESSION['id_maison']);
            ?></label>
            <br /><br /><br />
            <input type="radio" name="choix" value="non" id="non" checked/> <label for="non">Non</label><br />
<br>
            <input type="submit" value="Supprimer" class="submit" id="suppr3" />

        </p>
    </fieldset>
</form>


<script>
    $(document).ready(function() {

        $(".submit").click( function(){
            var a = document.getElementById('nom_capteur').value;
            if (a === ""){
                $('.messageerreur').fadeIn();
                var temp = '.' + this.id;
                setTimeout(function(){
                    $('.messageerreur').fadeOut();
                    $(temp).submit();
                },1000);
            }
            else {
                $('.notifications').fadeIn();
                var temp = '.' + this.id;
                document.getElementById( "messagereussi" ).innerHTML = "Le capteur "+a+" a bien été enregistrée";
                setTimeout(function(){
                    $('.notifications').fadeOut();
                    $(temp).submit();
                },1000);
            }
        });


// Pour pouvoir afficher/Cacher (TOGGLE) la suppression et ne pas prendre trop de place)

        //LES CAPTEURS
        $("#suppressionToggle").hide(); // Pour cacher de base le gros formulaire
    $("#suppressionFieldsetToggle").click(function(){
        $("#suppressionToggle").toggle();
    });

    //LES PIECES
    $("#suppressionToggle2").hide(); // Pour cacher de base le gros formulaire
    $("#suppressionFieldset2Toggle").click(function(){
        $("#suppressionToggle2").toggle();
    });

    //LE DOMICILE
    $("#suppressionToggle3").hide(); // Pour cacher de base le gros formulaire
    $("#suppressionFieldset3Toggle").click(function(){
        $("#suppressionToggle3").toggle();
    });

    //Metre en float le bloc changer de domicile, là le code permet de le réduire


    $("#changerDomicileFloat").click(function(){
        $("#changerDomicileFloatComplem").toggle();
    });
    /*$("#pinkButton").click(function(){
     $("#changerDomicileFloat").toggle();
     $("#pinkButton").hide();

     });
     $("#changerDomicileFloat").click(function(){
     $("#changerDomicileFloat").toggle();
     $("#pinkButton").show();

     });*/
    });
</script>