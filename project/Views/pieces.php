<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 14/05/2017
 * Time: 21:15
 */?>

<form action="../Models/pieces.php" method="post" >
    <fieldset>
        <legend>Ajout d'une pièce</legend>
        <p>
            <label for="nom_piece">Le nom d'une pièce :</label>
            <input type="text" name="nom_piece" id="nom_piece" placeholder="Salle à manger" autofocus="" />
            <br />

            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>


<fieldset>
    <legend>Les différentes pièces :</legend>
    <?php
    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    // Récupération des pièces
    $reponse = $bdd->query('SELECT nom_piece FROM piece ORDER BY ID');
    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
    while ($donnees = $reponse->fetch()) {
        echo '<p>' . htmlspecialchars($donnees['nom_piece']) . '</p>';
    }
    $reponse->closeCursor();
    ?>
</fieldset>


<!-- PIECE -->

<form action="../Models/capteurs.php" method="post" >
    <fieldset>
        <legend>Ajout de capteurs</legend>
        <p>
            <label for="nom_capteur">Le nom du capteur :</label>
            <input type="text" name="nom_capteur" id="nom_capteur" placeholder="capteur1" autofocus="" />
            <br />

            <label for="type_capteur">Type de capteurs :</label>
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

<fieldset>
    <legend>Les capteurs :</legend>
    <?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    // Récupération des 20 derniers messages
    $reponse = $bdd->query('SELECT nom_capteur, type_capteur FROM capteurs ORDER BY id_capteur DESC LIMIT 0, 20');
    while ($donnees = $reponse->fetch())
    {
        echo '<p><strong>' . htmlspecialchars($donnees['nom_capteur']) . '</strong> : ' . htmlspecialchars($donnees['type_capteur']) . '</p>';
    }
    $reponse->closeCursor();
    ?>
</fieldset>
