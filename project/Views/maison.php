

<form action="../Controllers/maison.php" method="post" class="block">
    <fieldset>
        <legend>Voir les capteurs par piece</legend>
        <p>
            <br />

                <?php require'../Models/pieces.php';
                afficheMaison(); ?>

            <br/>
            <input class="submit" type="submit" value="Modifier mes maisons" />
        </p>
    </fieldset>
</form>
