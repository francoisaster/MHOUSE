
<?php
require '../Models/affMenu.php';
if(isset($_POST['id_maison_client'])) {
    $_SESSION['id_maison_client'] = $_POST['id_maison_client'];
}
if(isset($_POST['id_piece_client'])) {
    $_SESSION['id_piece_client'] = $_POST['id_piece_client'];
}
?>


<?php

setIdClient($_SESSION['pseudo']);

if(isset($_SESSION['id_client'])){
    if(afficheMaisonMenu2()==""){
        echo'<div class="block"> Vous n\'avez pas encore défini de maison.</br>
         Rendez vous sur la page modification pour créer vos maisons</div>';

    }else {
        echo '<form action="" method="post" class="block">
    <fieldset>
        <legend>Veuillez choisir un domicile</legend>
        <p>
            <label for="id_maison_client">Choix du domicile :</label>
            <select name="id_maison_client" id="id_maison_client">

                
                ' . afficheMaisonMenu2() . '
</select>

<br/>

<br/>
<input type="submit" value="Choisir" class="submit"/>
</p>
</fieldset>
</form>';
    }

}
if(isset($_SESSION['id_maison_client'])){
    if(affichePiecesMenu2()==""){
        echo'<div class="block"> Il n\'y a pas de pièce dans cette maison</div>';
    }else {


        echo '<form action="" method="post" class="block">
    <fieldset>
        <legend>Veuillez choisir une Piece</legend>
        <p>
            <label for="id_piece_client">Choix de la piece :</label>
            <select name="id_piece_client" id="id_piece_client">

                
                ' . affichePiecesMenu2() . '
</select>

<br/>

<br/>
<input type="submit" value="Choisir" class="submit"/>
</p>
</fieldset>
</form>';
    }
}
if(isset($_SESSION['id_piece_client'])and affichePiecesMenu2()!=""){
    if (afficheCapteurMenu($_SESSION['id_piece_client'])==""){
        echo'<div class="block"> Il n\'y a pas de capteur dans cette pièce</div>';
    }else {
        echo '<form action="" method="post" class="block">
    <fieldset>
        <legend>Les statistiques d\'un capteur</legend>
        <p>
            <br />

            <label for="capteur_choisi">Choix de capteur :</label>
            <select name="capteur_choisi" id="capteur_choisi">
                ' .
            afficheCapteurMenu($_SESSION['id_piece_client']) . '
                
            </select>

            <br/>
            <br/>
            <input type="submit" value="Voir" class="submit"/>
        </p>
    </fieldset>
</form>';
    }
}
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=mhouse_bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
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

if(isset($_POST['capteur_choisi'])) {
    require '../Views/homeStats.php';
}

// ANCIENNE PAGE (QUENTIN)
/*
<form action="../Controllers/maison.php" method="post" class="block">
    <fieldset>
        <legend>Mes Informations</legend>
        <h3>Veuillez choisir votre Maison</h3>
        <p>
            <select name="choix_maison" id="choix_maison">

                <?php require'../Models/pieces.php';
                choisirMaison(); ?>
            </select>
            <br/>
            <br/>
            <input type="submit" value="Choisir" class="submit"/>
        </p>
    </fieldset>
</form>
<form action="../Controllers/maison.php" method="post" class="block">
<fieldset>
        <h3><?php Maisonchoisi(); ?></h3>
        <p>
            <br />
            <table>
                <?php
                afficheMaison(); ?>
            </table>
            <br/>
            
        </p>
    </fieldset>
</form>
<form action="../Controllers/pieces.php" method="post" class="block">
    <input class="submit" type="submit" value="Modifier mes maisons" />
</form>
*/
?>
