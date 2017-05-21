<form action="../Controllers/profil.php" method="post" >
    <fieldset>
        <legend>Modifier le profil existant :</legend>
        <p>

            <!-- RAJOUTER DES VALUES A CHAQUE CHAMPS GRACE A LA SESSION (lecture des données et insertion dans value, pour l'UPDATE -->
            <label for="pseudo">Nouveau pseudo </label> :
            <input type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION['pseudo']?>"/> <!-- Pour mettre un champ text avec le nom pseudo -->
            <!-- for et id avec le meme nom permettent de lier les zones de texte-->
            <!-- placeholder permet de mettre une indication dans le champ-->
            <br />

            <label for="pass">Mot de passe actuel</label> :
            <input type="password" name="pass" id="pass" value="<?php echo $_SESSION['pass']?>"/>
            <br />

            <label for="pass2">Nouveau mot de passe : </label>
            <input type="password" name="pass2" id="pass2" placeholder="*********"/>
            <br />

            <label for="nom">Votre nouveau prenom </label> :
            <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['prenom']?>"/>
            <br />

            <label for="nom">Votre nouveau nom </label> :
            <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['nom']?>"/>
            <br />

            <label for="adresse">Votre nouvelle adresse </label> :
            <input type="text" name="adresse" id="adresse" size="35" value="<?php echo $_SESSION['adresse']?>"/>
            <br />


            <label for="sexe">Civilité :</label><br />
            <select name="sexe" id="sexe">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
            <br />

            <label for="email">Votre email </label> :
            <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']?>"/>
            <br />

            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>





