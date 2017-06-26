<?php
require '../Models/test2.php'; //necessaire pour avoir la fonction affichePieces
require '../Models/statHome.php';


?>

<!--
 ICI Les notifications
 -->
    <div id="pinkButton">
    </div>
    <div id="block-flottant">
        <?php
        if(isset($luminositéRecue)) {
            echo 'Luminosité actuelle : ' . $luminositéRecue; ?> <br> <?php

            if(isset($moyenne)) {
                if ($moyenne + 100 < $luminositéRecue) {
                    echo '<span style="font-size: small; font-style: italic;">'. 'La luminosité est forte par rapport à la moyenne' . '</span>'; ?> <br> <?php
                }
                if ($luminositéRecue>4000) {
                    echo '<span style="font-size: small; font-style: italic;">'. 'La lumière est allumée' . '</span>'; ?> <br> <?php
                }
                if($luminositéRecue<3500){
                    echo '<span style="font-size: small; font-style: italic;">'. 'La lumière est éteinte' . '</span>'; ?> <br> <?php
                }
            }
        }
        ?>
    </div>


<script>
    $(document).ready(function(){
        $("#pinkButton").hide();
        $("#pinkButton").click(function(){
            $("#block-flottant").toggle();
            $("#pinkButton").hide();

        });
        $("#block-flottant").click(function(){
            $("#block-flottant").toggle();
            $("#pinkButton").show();
        });
    });
</script>


<form action="" method="post" class="block">
    <fieldset>
        <legend>Les statistiques d'un capteur</legend>
        <p>
            <br />

            <label for="capteur_choisi">Choix de capteur :</label>
            <select name="capteur_choisi" id="capteur_choisi">
                <?php
                affichePieces();
                ?>
            </select>

            <br/>
            <br/>
            <input type="submit" value="Voir" class="submit"/>
        </p>
    </fieldset>
</form>

<?php
if(isset($_POST['capteur_choisi'])) {
    require '../Views/homeStats.php';
}
?>


