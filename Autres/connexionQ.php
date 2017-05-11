<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8"/>
  <link href="styleconnexion.css" type="text/css" rel="stylesheet">
  </head>

<body>
  <header>
    <h1>M'house</h1>

    <ul>
      <li class="menu">Acceuil</li>
      <li class="menu">Contact</li>
      <li class="menu">Connexion</li>
      <li class="menu">Inscription</li>
    </ul>
  </header>



	<div>
 	<h1 class="bienvenue"><br/><br/>Bienvenue</h1>
  	<form action="tableau.php" method="post">
	  <p>
	  	<input type="text" name="identifiant" value="Identifiant" class="menu2" />
	  	<br><br>
	  	<input type="text" name="motdepasse" value="Mot de Passe" class="menu2" />
	  	<br><br>
	  	<input type="submit" name="valider" value="SE CONNECTER" class="menu1" />
	  </p>
	</form>
	<p>Nom d'utilisateur ou mot de passe oublié ??</p>
	<a class="menu">Cliquez ici</a>
	<p>Vous n'avez pas de compte ??</p>
	<a class="menu">Inscrivez-vous</a>

	</div>
