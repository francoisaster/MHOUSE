<?php



echo '<p>'.'Bonjour '.$_SESSION['pseudo'].'<p>';

?>
<form action="" method="post">
    <p>
        <label for="id_utilisateur">id </label> :
        <input type="text" name="id_utilisateur" id="id_utilisateur" placeholder="id_utilisateur" autofocus=""/>
        <input type="submit" name="submit" value="Se connecter" />
    </p>
</form>
<?php // A METTRE DANS CONTROLLERS
    require'../Controllers/homeAdmin.php';
?>