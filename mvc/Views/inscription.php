<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Inscription</title>
</head>

<body>

<form action="Models/inscription.php" method="post" >
   <fieldset>
       <legend>Inscription</legend>
    <p>
    <label for="pseudo">Votre pseudo </label> :
    <input type="text" name="pseudo" id="pseudo" placeholder="Maxime2326"/> <!-- Pour mettre un champ text avec le nom pseudo -->
       <!-- for et id avec le meme nom permettent de lier les zones de texte-->
       <!-- placeholder permet de mettre une indication dans le champ-->
    <br />

       <label for="pass">Votre mot de passe </label> :
        <input type="password" name="pass" id="pass" placeholder="*********"/>
        <br />

<!--
       <label for="pass">Retapez votre mot de passe : </label>
        <input type="password" name="verify_pass" id="pass" placeholder="*********"/>
        <br /> -->

        <label for="email">Votre email </label> :
        <input type="email" name="email" id="email" placeholder="email@email.fr"/> 
        <br />
        <input type="submit" value="Envoyer" />
    </p>
   </fieldset>
</form>
</body>





<?php
/*
// Récupération des utilisateurs
$reponse = $bdd->query('SELECT pseudo FROM membres ORDER BY ID');
while ($donnees = $reponse->fetch()){
    echo $donnees['pseudo'];
}
$reponse->closeCursor();
*/
?>