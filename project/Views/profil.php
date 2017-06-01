<form action="../Controllers/profil.php" method="post" class="block">
    <fieldset>
        <legend>Modifier le profil existant :</legend>
        <p>

            <!-- RAJOUTER DES VALUES A CHAQUE CHAMPS GRACE A LA SESSION (lecture des données et insertion dans value, pour l'UPDATE -->
            <label for="pseudo">Nouveau pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION['pseudo']?>"/> <!-- Pour mettre un champ text avec le nom pseudo -->
            <!-- for et id avec le meme nom permettent de lier les zones de texte-->
            <!-- placeholder permet de mettre une indication dans le champ-->
            <br /><br />

            <label for="prenom">Votre nouveau prenom :</label>
            <input type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['prenom']?>"/>
            <br /><br />

            <label for="nom">Votre nouveau nom :</label>
            <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['nom']?>"/>
            <br /><br />

            <label for="adresse">Votre nouvelle adresse :</label>
            <input type="text" name="adresse" id="adresse" value="<?php echo $_SESSION['adresse']?>"/>
            <br /><br />


            <label for="sexe">Civilité :</label>
            <select name="sexe" id="sexe">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
            <br /><br />

            <label for="date_naissance">Votre date de naissance :</label>
            <input type="date" name="date_naissance" id="date_naissance" value="<?php echo $_SESSION['date_naissance']?>"/>
            <br /><br />

            <label for="email">Votre email :</label>
            <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']?>"/>
            <br />
            <br />

            <label for="numero_tel">Votre numéro de téléphone :</label>
            <input type="text" name="numero_tel" id="numero_tel" value="<?php echo $_SESSION['numero_tel']?>"/>
            <br />
            <br />

            <input type="submit" value="Envoyer" class="submit"/>
        </p>
    </fieldset>
</form>


<!--
<label for="pass">Mot de passe actuel</label> :
            <input type="password" name="pass" id="pass" value="<?php echo $_SESSION['pass']?>"/>
            <br />

            <label for="pass2">Nouveau mot de passe : </label>
            <input type="password" name="pass2" id="pass2" placeholder="*********"/>
            <br />

            -->



