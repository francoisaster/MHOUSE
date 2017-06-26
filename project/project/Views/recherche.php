
<form action="" method="post" class="block">
    <p>
        <label for="pseudo">pseudo : </label>
        <input type="text" name="pseudo" id="pseudo"  autofocus=""/>
        <input type="submit" name="submit" value="Chercher" />
    </p>
</form>

<?php
require '../Models/confirmation.php';
if(isset($_POST['pseudo'])|| isset($_SESSION['pseudoClient'])){
    if(isset($_POST['pseudo'])) {
        $_SESSION['pseudoClient'] = $_POST['pseudo'];

        afficheUtilisateurRecherche($_POST['pseudo']);
    }else{
        afficheUtilisateurRecherche($_SESSION['pseudoClient']);
    }
}
?>