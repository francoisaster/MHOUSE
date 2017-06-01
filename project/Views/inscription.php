<div id="erreur">
    <p>Vous n'avez pas rempli correctement les champs du formulaire !</p>
</div>


<form action="../Controllers/inscription.php" method="post" class="block">
   <fieldset>
       <legend>Inscription</legend>
    <p>
    <label for="pseudo">Votre pseudo :</label>
    <input type="text" name="pseudo" id="pseudo" autofocus=""/> <!-- Pour mettre un champ text avec le nom pseudo -->
       <!-- for et id avec le meme nom permettent de lier les zones de texte-->
       <!-- placeholder permet de mettre une indication dans le champ-->
    <br /><br />
       <label for="pass">Votre mot de passe :</label>
        <input type="password" name="pass" id="pass"/>
        <br /><br />

       <label for="pass2">Retapez votre mot de passe :</label>
        <input type="password" name="pass2" id="pass2"/>
        <br /><br />

    <label for="prenom">Votre prenom :</label>
    <input type="text" name="prenom" id="prenom"/>
    <br /><br />

    <label for="nom">Votre nom :</label>
    <input type="text" name="nom" id="nom"/>
    <br /><br />

    <label for="adresse">Votre adresse :</label>
    <input type="text" name="adresse" id="adresse"/>
    <br /><br />

    
    <label for="sexe">Civilité :</label>
      <select name="sexe" id="sexe">
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
    </select>
        <br />
        <br />

      
    <label for="date_naissance">Votre date de naissance :</label>
    <input type="date" name="date_naissance" id="date_naissance"/>
    <br />
        <br />
    <label for="email">Votre email :</label>
        <input type="email" name="email" id="email"/>
        <br />
        <br />
      <label for="admin">Admin :</label>
      <select name="admin" id="admin">
        <option value="true">Oui</option>
        <option value="false">Non</option> <!-- A mettre en boolean... Dans la DB il est en VARCHAR-->
    </select>
      <br /><br />

        <label for="numero_tel">Votre numéro de téléphone :</label>
        <input type="text" name="numero_tel" id="numero_tel""/>
        <br /><br />

    <input type="submit" value="Envoyer" class="submit"/>

    </p>
   </fieldset>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        // notre code ici
    });



</script>