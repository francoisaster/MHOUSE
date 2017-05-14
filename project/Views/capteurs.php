<form action="../Models/capteurs.php" method="post" >
   <fieldset>
       <legend>Ajout de capteurs</legend>
    <p>
    <label for="nom_capteur">Le nom du capteur :</label>
    <input type="text" name="nom_capteur" id="nom_capteur" placeholder="capteur1" autofocus="" /> 
    <br />

       <label for="type_capteur">Type de capteurs :</label><br />
      <select name="type_capteur" id="type_capteur">
        <option value="lumiere">Lumière</option>
        <option value="temperature">Température</option>
    </select>
      <br />

<!--
       <label for="pass">Retapez votre mot de passe : </label>
        <input type="password" name="verify_pass" id="pass" placeholder="*********"/>
        <br /> -->

        <input type="submit" value="Envoyer" />
    </p>
   </fieldset>
</form>