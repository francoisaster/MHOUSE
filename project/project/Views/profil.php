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

        <label for="pass">Ancien mot de passe :</label>
            <input type="password" name="pass" id="pass" class="champ" onblur="verifPass(this)"/>
            <br /><br />
        <label for="newpass">Nouveau mot de passe :</label>
            <input type="password" name="newpass" id="newpass" class="champ" onblur="verifPass(this)"/>
            <br /><br />

        <label for="newpass2">Confirmation mot de passe :</label>
            <input type="password" name="newpass2" id="newpass2" class="champ" onblur="verifPass(this)"/>
            <br/>
            <br/>
        
            <?php
            if (isset ($_SESSION['text'])){
                echo $_SESSION['text'];
            }
            ?>
            <br/>
            <br/>

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

            <input type="submit" name="modifier" value="Modifier" class="submit"/>
        </p>
    </fieldset>
</form>




<div class= "block">
    <fieldset>
        <form action="../Controllers/enfant.php" method="post" >
            <legend>Rajouter un compte spectateur :</legend>
            <p>

                <!-- RAJOUTER DES VALUES A CHAQUE CHAMPS GRACE A LA SESSION (lecture des données et insertion dans value, pour l'UPDATE -->
                <label for="pseudoEnfant">Pseudo :</label>
                <input type="text" name="pseudoEnfant" id="pseudoEnfant" onblur="verifPseudo(this)"/> <!-- Pour mettre un champ text avec le nom pseudo -->
                <!-- for et id avec le meme nom permettent de lier les zones de texte-->
                <!-- placeholder permet de mettre une indication dans le champ-->
                <br />
                <span class="annotation">Votre pseudo doit avoir au moins 5 caractères.</span>
                <br />
                <br />

                <label for="mdp">Votre mot de passe :</label>
                <input type="password" name="mdp" id="mdp" onblur="verifPass(this)"/>
                <br /><span class="annotation">Le mot de passe doit comprendre au moins 1 lettre 1 chiffre dans les 8 caractères.</span>
                <br />
                <br />

                <label for="mdp2">Confirmez le mot de passe :</label>
                <input type="password" name="mdp2" id="mdp2"/>
                <br /><br />

                <input type="submit" value="Creer" class="submit"/>
            </p>
        </form>
    </fieldset>
</div>



<script>

    //JS BASIQUE
    function surligne(champ, erreur)
    {
        if(erreur)
            champ.style.backgroundColor = "#fba";
        else
            champ.style.backgroundColor = "";
    }
    function verifPseudo(champ)
    {
        if(champ.value.length < 5 || champ.value.length > 25)
        {
            surligne(champ, true);
            return false;
        }
        else
        {
            surligne(champ, false);
            return true;
        }
    }
    function verifPass(champ)
    {
        var regex = /(?=.*[0-9])[A-Z]|(?=.*[A-Z])[0-9]/;
        if(!regex.test(champ.value))
        {
            surligne(champ, true);
            return false;
        }
        else
        {
            surligne(champ, false);
            return true;
        }
    }
/*
    //jQuery
    $(document).ready(function() {
        var $pseudoEnfant = $('#pseudoEnfant');
        $pseudoEnfant.keyup(function () {
            if ($(this).val().length < 5) { // si la chaîne de caractères est inférieure à 5
                $(this).css({ // on rend le champ rouge
                    borderColor: 'red',
                    color: 'red'
                });
            }
            else {
                $(this).css({ // si tout est bon, on le rend vert
                    borderColor: 'green',
                    color: 'green'
                });
            }
        });
    }*/
</script>


