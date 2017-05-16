<form action="../Controllers/inscription.php" method="post" >
   <fieldset>
       <legend>Inscription</legend>
    <p>
    <label for="pseudo">Votre pseudo </label> :
    <input type="text" name="pseudo" id="pseudo" placeholder="Maxime2326" autofocus=""/> <!-- Pour mettre un champ text avec le nom pseudo -->
       <!-- for et id avec le meme nom permettent de lier les zones de texte-->
       <!-- placeholder permet de mettre une indication dans le champ-->
    <br />
       <label for="pass">Votre mot de passe </label> :
        <input type="password" name="pass" id="pass" placeholder="*********"/>
        <br />

       <label for="pass2">Retapez votre mot de passe : </label>
        <input type="password" name="pass2" id="pass2" placeholder="*********"/>
        <br />

    <label for="prenom">Votre prenom </label> :
    <input type="text" name="prenom" id="prenom" placeholder="Maxime"/>
    <br />

    <label for="nom">Votre nom </label> :
    <input type="text" name="nom" id="nom" placeholder="DU COCQ"/>
    <br />

    <label for="adresse">Votre adresse </label> :
    <input type="text" name="adresse" id="adresse" placeholder="21, rue des marguerittes, 75 001, PARIS" size="35"/>
    <br />

    
    <label for="sexe">Civité :</label><br />
      <select name="sexe" id="sexe">
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
    </select>
      <br />

      
    <label for="date_naissance">Votre date de naissance </label> :
    <input type="date" name="date_naissance" id="date_naissance"/>
    <br />

    <label for="email">Votre email </label> :
        <input type="email" name="email" id="email" placeholder="email@email.fr"/> 
        <br />

      <label for="admin">Admin :</label><br />
      <select name="admin" id="admin">
        <option value="true">Oui</option>
        <option value="false">Non</option> <!-- A mettre en boolean... Dans la DB il est en VARCHAR-->
    </select>
      <br />


    <input type="submit" value="Envoyer" />

    </p>
   </fieldset>
</form>