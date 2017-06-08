

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

