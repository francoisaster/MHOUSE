<?php
require '../Models/test2.php'; //necessaire pour avoir la fonction affichePieces

require '../Models/connexionBdd2.php';
$bdd = connexionBdd2();
/*try
{
    $bdd = new PDO('mysql:host=localhost;dbname=mhouse_bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
*/
?>
<?php
/*
$temperature = 'temperature';
$_SESSION['id_utilisateur'] = 34;
$req = $bdd -> prepare('SELECT nom_capteur FROM capteurs WHERE id_utilisateur = ? AND type_capteur = ?ORDER BY id_capteur');
$req->execute(array($_SESSION['id_utilisateur'],$temperature));
*/
/*
$requser = $bdd->prepare("
SELECT valeurs_capteur.date_mesure, valeurs_capteur.valeur, capteurs.id_capteur, capteurs.nom_capteur
FROM valeurs_capteur
INNER JOIN capteurs
ON valeurs_capteur.id_capteur = capteurs.id_capteur
WHERE capteurs.id_utilisateur = ?
ORDER BY valeurs_capteur.date_mesure
");
$requser->execute(array($_SESSION['id_utilisateur'],));
*/
/*
if(isset($_SESSION['capteur_stats'])){
    $capteur_choisi2 = $_SESSION['capteur_stats'];
}*/

if(isset($_POST['capteur_choisi'])) {
    $capteur_choisi = $_POST['capteur_choisi'];


    $test = $bdd->prepare('SELECT id_capteur FROM capteurs WHERE nom_capteur = ? AND id_utilisateur= ?'); // rajout d'heure
    $test->execute(array($capteur_choisi, $_SESSION['id_utilisateur']));
    while ($donneeTest = $test->fetch()) {
        $idCapteur = htmlspecialchars($donneeTest['id_capteur']);
    }

    $result = $bdd->prepare('SELECT * FROM valeurs_capteur WHERE id_capteur= ? ORDER BY date_mesure'); // rajout d'heure
    $result->execute(array($idCapteur));



$reponses = $bdd->query('SELECT AVG(valeur) AS valeur FROM valeurs_capteur');
while ($donnees42 = $reponses->fetch())
{
    $moyenne = $donnees42['valeur'];
}
$reponses->closeCursor();


}
/*
if(isset($_POST['capteur_choisi'])) {
    $capteur_choisi = $_POST['capteur_choisi'];


    $test = $bdd->prepare('SELECT id_capteur FROM capteurs WHERE nom_capteur = ? AND id_utilisateur= ?'); // rajout d'heure
    $test->execute(array($capteur_choisi, $_SESSION['id_utilisateur']));
    while ($donneeTest = $test->fetch()) {
        $idCapteur = htmlspecialchars($donneeTest['id_capteur']);
    }

    $result = $bdd->prepare('SELECT * FROM valeurs_capteur WHERE id_capteur= ?'); // rajout d'heure
    $result->execute(array($idCapteur));
}*/
?>

<?php
$reponseDerniere = $bdd->query('SELECT valeur FROM valeurs_capteur ORDER BY date_mesure DESC');
$donnees102 = $reponseDerniere->fetch();
$luminositéRecue = $donnees102['valeur'];
$reponseDerniere->closeCursor();
?>

<!--
<div class="block" id="demo" onclick="myFunction()">
<p  > Il n'y a aucunes notifications</p>
</div>

<script>
    function myFunction() {
        document.getElementById("demo").style.display='none';
    }
</script>
-->

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
                if ($luminositéRecue>5000) {
                    echo '<span style="font-size: small; font-style: italic;">'. 'La lumière est allumée' . '</span>'; ?> <br> <?php
                }
                if($luminositéRecue<2000){
                    echo '<span style="font-size: small; font-style: italic;">'. 'La lumière est éteinte' . '</span>'; ?> <br> <?php
                }
            }
        }
        ?>
    </div>


<script>
    $(document).ready(function(){
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


