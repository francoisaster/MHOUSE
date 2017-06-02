<form action="" method="post" class="block">
    <p>
        <label for="id_utilisateur">id : </label>
        <input type="text" name="id_utilisateur" id="id_utilisateur"  autofocus=""/>
        <input type="submit" name="submit" value="Se connecter" />
    </p>
</form>
<?php // A METTRE DANS CONTROLLERS
    require'../Controllers/homeAdmin.php';
?>