<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/05/2017
 * Time: 21:08
 */

require'../Models/contactAdmin.php';
$donnees=contactAdmin();


?>
<form action="../Controllers/contactAdmin.php" method="post" class="block">
    <fieldset>
        <legend>Modifier les infos de contact :</legend>
        <p>

            <!-- RAJOUTER DES VALUES A CHAQUE CHAMPS GRACE A LA SESSION (lecture des données et insertion dans value, pour l'UPDATE -->
            <label for="nv_adresse">Nouvelle adresse :</label>
            <input type="text" name="nv_adresse" id="nv_adresse" value="<?php echo $donnees['adresse']?>"/> <!-- Pour mettre un champ text avec le nom pseudo -->
            <!-- for et id avec le meme nom permettent de lier les zones de texte-->
            <!-- placeholder permet de mettre une indication dans le champ-->
            <br />
            <br />
            <label for="nv_tel">Nouveau numéro de téléphone :</label>
            <input type="text" name="nv_tel" id="nv_tel" value="<?php echo $donnees['numero_tel']?>"/>
            <br />

            <br />

            <label for="nv_mail">Nouvelle adresse mail :</label>
            <input type="email" name="nv_mail" id="nv_mail" value="<?php echo $donnees['email']?>"/>
            <br /><br />

            <input type="submit" value="Envoyer" class="submit" />
        </p>
    </fieldset>
</form>