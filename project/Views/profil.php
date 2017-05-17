<p> Ceci est la page Profil qui sert à modifier les infos de l'utilisateur</p>

<form action="../Controllers/profil.php" method="post" >
    <fieldset>
        <legend>Modifier le profil existant :</legend>
        <p>

            <!-- RAJOUTER DES VALUES A CHAQUE CHAMPS GRACE A LA SESSION (lecture des données et insertion dans value, pour l'UPDATE -->
            <label for="pseudo">Nouveau pseudo </label> :
            <input type="text" name="pseudo" id="pseudo" placeholder="Maxime2326" autofocus=""/> <!-- Pour mettre un champ text avec le nom pseudo -->
            <!-- for et id avec le meme nom permettent de lier les zones de texte-->
            <!-- placeholder permet de mettre une indication dans le champ-->
            <br />
            <label for="pass">Votre nouveau mot de passe </label> :
            <input type="password" name="pass" id="pass" placeholder="*********"/>
            <br />

            <label for="pass2">Retapez votre mot de passe : </label>
            <input type="password" name="pass2" id="pass2" placeholder="*********"/>
            <br />

            <label for="nom">Votre nouveau nom </label> :
            <input type="text" name="nom" id="nom" placeholder="DU COCQ"/>
            <br />

            <label for="adresse">Votre nouvelle adresse </label> :
            <input type="text" name="adresse" id="adresse" placeholder="21, rue des marguerittes, 75 001, PARIS" size="35"/>
            <br />


            <label for="sexe">Civilité :</label><br />
            <select name="sexe" id="sexe">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
            <br />

            <label for="email">Votre email </label> :
            <input type="email" name="email" id="email" placeholder="email@email.fr"/>
            <br />

            <input type="submit" value="Envoyer" />

        </p>
    </fieldset>
</form>

<fieldset>
    <legend>Vos informations personnelles :</legend>
    <?php
    require '../Models/profil.php';
    afficheProfil();?>
</fieldset>






