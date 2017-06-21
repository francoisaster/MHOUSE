<!--<div id="erreur">
    <p>Vous n'avez pas rempli correctement les champs du formulaire !</p>
</div>-->

<form action="../Controllers/connexion.php" method="post" class="block" id="photo">
        <p>
            <label for="pseudo">Votre pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" autofocus=""/>
            <br><br>
            <label for="pass">Votre mot de passe :</label>
            <input type="password" name="pass" id="pass"/>
            <br>
            <p id="infoMDP1">Le mot de passe est trop court.</p>
            <p id="infoMDP2">Le mot de passe est de la bonne longueur.</p>
    <script>
        $(document).ready(function() {
            $("#infoMDP2").hide();
            $("#infoMDP1").hide();
        });

    </script>
            <br>
            <input type="submit" name="submit" value="Se connecter" class="submit"/>
        </p>
    </form>

<!--
    <p>Nom d'utilisateur ou mot de passe oublié ??</p>
    <a class="menu">Cliquez ici</a>
</div>
-->


<script>
    $(document).ready(function() {
        var $pass = $('#pass');
        $pass.keyup(function () {
            if ($(this).val().length < 8) { // si la chaîne de caractères est inférieure à 8
                $(this).css({ // on rend le champ rouge
                    borderColor: 'red',
                    color: 'red'
                });
                $("#infoMDP1").show();
                $("#infoMDP2").hide();

            }
            else {
                $(this).css({ // si tout est bon, on le rend vert
                    borderColor: 'green',
                    color: 'green'
                });
                $("#infoMDP2").show();
                $("#infoMDP1").hide();
            }
        });

    });
</script>
