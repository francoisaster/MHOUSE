<?php

require '../Models/cherche.php';

echo '<p>'.'bonjour '.$_SESSION['pseudo'].'<p>';
/*
$requser=getListeUser();
while ($donnee = $requser->fetch()) {
    echo '<p>'.$donnee['id_utilisateur'].' '.$donnee['prenom'].' '.$donnee['nom'].' '.$donnee['email'].'<p>';
}*/
?>
<form action="../Views/trouve.php" method="post">
    <p>
        <label for="id_utilisateur">id </label> :
        <input type="text" name="id_utilisateur" id="id_utilisateur" placeholder="id_utilisateur" autofocus=""/>
        <input type="submit" name="submit" value="Se connecter" />
    </p>
</form>
