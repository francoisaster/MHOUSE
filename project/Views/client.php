
<?php
require '../Models/affMenu.php';
if(isset($_POST['id_maison_client'])) {
    $_SESSION['id_maison_client'] = $_POST['id_maison_client'];
}
if(isset($_POST['id_piece_client'])) {
    $_SESSION['id_piece_client'] = $_POST['id_piece_client'];
}
?>
<form action="" method="post" class="block">
    <p>
        <label for="pseudo">pseudo : </label>
        <input type="text" name="pseudo" id="pseudo"  autofocus=""/>
        <input type="submit" name="submit" value="Chercher" />
    </p>
</form>

<?php
if(isset($_POST['pseudo'])){
    setIdClient($_POST['pseudo']);
}
if(isset($_SESSION['id_client'])){
    echo'<form action="" method="post" class="block">
    <fieldset>
        <legend>Veuillez choisir un domicile</legend>
        <p>
            <label for="id_maison_client">Choix du domicile :</label>
            <select name="id_maison_client" id="id_maison_client">

                
                '.afficheMaisonMenu2().'
</select>

<br/>

<br/>
<input type="submit" value="Choisir" class="submit"/>
</p>
</fieldset>
</form>';


}
if(isset($_SESSION['id_maison_client'])){

    echo'<form action="" method="post" class="block">
    <fieldset>
        <legend>Veuillez choisir une Piece</legend>
        <p>
            <label for="id_piece_client">Choix de la piece :</label>
            <select name="id_piece_client" id="id_piece_client">

                
                '.affichePiecesMenu2().'
</select>

<br/>

<br/>
<input type="submit" value="Choisir" class="submit"/>
</p>
</fieldset>
</form>';
}
if(isset($_POST['id_piece_client'])){
    echo '<div class="block">'.afficheCapteur().'</div>';

}
?>