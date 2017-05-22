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
<div class="infos-contact">
    <div> <img src="../public/images/18678848_1664162940290601_2025009995_n.png" width="24" height="24"> <?php echo $donnees['adresse']?></div>
    <div> <img src="../public/images/18643553_1664162936957268_1022541758_n.png" width="24" height="24"> <?php echo $donnees['numero_tel']?></div>
    <div> <img src="../public/images/18622995_1664162933623935_1982767871_n.png" width="24" height="24"> <?php echo $donnees['email']?></div>
    </div>
<hr/>
    <div map>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.6723360750684!2d2.3259462154355663!3d48.845388409576486
    !2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671ce3fd4afd3%3A0xb729389a530d1380!2s28+Rue+Notre+Dame+des+Champs%2C+75006
    +Paris!5e0!3m2!1sfr!2sfr!4v1495021372339" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>



<form action="../Controllers/contactAdmin.php" method="post" >
    <fieldset>
        <legend>Modifier les infos de contact :</legend>
        <p>

            <!-- RAJOUTER DES VALUES A CHAQUE CHAMPS GRACE A LA SESSION (lecture des données et insertion dans value, pour l'UPDATE -->
            <label for="nv_adresse">Nouvelle adresse </label> :
            <input type="text" name="nv_adresse" id="nv_adresse" value="<?php echo $donnees['adresse']?>"/> <!-- Pour mettre un champ text avec le nom pseudo -->
            <!-- for et id avec le meme nom permettent de lier les zones de texte-->
            <!-- placeholder permet de mettre une indication dans le champ-->
            <br />

            <label for="nv_tel">Nouveau numéro de téléphone</label> :
            <input type="text" name="nv_tel" id="nv_tel" value="<?php echo $donnees['numero_tel']?>"/>
            <br />



            <label for="nv_mail">Nouvelle adresse mail </label> :
            <input type="email" name="nv_mail" id="nv_mail" value="<?php echo $donnees['email']?>"/>
            <br />

            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>