
<?php
if($_SESSION['statut']=='spectateur'){
    require '../Models/affMenuSpec.php';
}else{
    require '../Models/affMenu.php';
}
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
require'../Models/statMaison.php';


if(isset($_POST['capteur_choisi'])) {
    require '../Views/homeStats.php';
}

?>
