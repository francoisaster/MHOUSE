

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="page accueil.css" />
        <title>Page accueil</title>
    </head>
    <body>
    <h1> Créer votre compte DomIsep</h1>

    <form method="POST" action="connexion.php">
    <fieldset>
    <legend class="en_tete" id="id"><strong>Identifiants</strong></legend>
    <div class="grid">
            <p>
            <label for="membre"> Type de compte: </label> <br>
                <select name="membre" id="membre">
                    <option value="0">Client</option>
                    <option value="1">Administrateur</option>

                </select>

            </p>

    </div>
    <div class="grid">
        <p>
        <label for="pseudo" >Pseudo:</label> <br>
        <input type="text" id="pseudo" name="pseudo" placeholder="votre pseudo"  size="25" />
        </p>
    </div>
    <div class="grid">
        <p>
        <label for="identifiants" >Email:</label> <br>
        <input type="email" id="mail" name="mail" placeholder="@votremail.com"  size="25" />
        </p>
    </div>

    <div class="grid">
            <p>
            <label for="mdp"> Mot de passe: </label> <br>
            <input type="password" id="mdp" name="mdp" placeholder="mot de passe" size="25"/>
            </p>
    </div>
     <div class="grid">
            <p>
            <label for="mdp2"> Confirmation mot de passe: </label> <br>
            <input type="password" id="mdp2" name="mdp2" placeholder="mot de passe" size="25" />
            </p>
    </div>
    </fieldset>

    <fieldset>
    <legend class="renseignent"><strong>Fiche renseignement</strong></legend>
        <div class="grid">
            <p>
            <label for="civilite"> Civilité: </label> <br>
                <select name="civilite" id="civilite">
                    <option value="0">M</option>
                    <option value="1">Mme</option>
                    <option value="2">Autre</option>

                </select>

            </p>

        </div>

    <div class="grid">
        <p>
        <label for="Nom" > Nom: </label> <br>
        <input type="text" id="nom" name="nom"  size="25" />
        </p>
    </div>

    <div class="grid">
            <p>
            <label for="prenom"> Prénom: </label> <br>
            <input type="text" id="prenom" name="prenom"  size="25" />
            </p>
    </div>
    <div class="grid">
            <p>
            <label for="age"> Date de naissance: </label> <br>
            <input type="Date" id="age" name="age" placeholder="aaaa/mm/jj" size="25" />
            </p>
    </div>

    <div class="grid">
            <p>
            <label for="adresse"> Adresse: </label> <br>
            <input type="text" id="adresse" name="adresse" size="25" />
            </p>
    </div>
    <input type='submit' name='submit' value="S'incrire" >
 
    </fieldset>

    </form>

        
    </body>
</html>

