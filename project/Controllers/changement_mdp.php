<?php

/*require '../Models/profil.php';

session_start();

$_SESSION['text'] = changementMdp($_POST['pass'],$_POST['newpass'],$_POST['newpass2']);*/

// header('Location:../public/index.php?p=profil');*

/*<form action="../Controllers/profil.php" method="post" class="block">
    <fieldset>
        <legend>Modification mot de passe</legend>
        <p>
            <br />
            <label for="pass">Ancien mot de passe :</label>
            <input type="password" name="pass" id="pass" class="champ" onblur="verifPass(this)"/>
            <br />

            <label for="newpass">Nouveau mot de passe :</label>
            <input type="password" name="newpass" id="newpass" class="champ" onblur="verifPass(this)"/>
            <br />

            <label for="newpass2">Confirmation mot de passe :</label>
            <input type="password" name="newpass2" id="newpass2" class="champ" onblur="verifPass(this)"/>
            <br/>
            <br/>
            <input type="submit" name="modifier" value="Modifier" class="submit"/>
            <?php
            if (isset ($_SESSION['text'])){
                echo $_SESSION['text'];
            }
            ?>
        </p>
    </fieldset>
</form>*/