<div id="erreur">
    <p>Un ou plusieurs champs rouge(s) n'ont pas été rempli !</p>
</div>


<form action="../Controllers/inscription.php" method="post" class="block" id="formulaire_inscription">
   <fieldset>
       <legend>Inscription</legend>
    <p>
    <label for="pseudo">Votre pseudo : *</label>
    <input type="text" name="pseudo" id="pseudo" class="champ" autofocus=""/> <!-- Pour mettre un champ text avec le nom pseudo -->
       <!-- for et id avec le meme nom permettent de lier les zones de texte-->
       <!-- placeholder permet de mettre une indication dans le champ-->
    <br />
        <span class="annotation">Le mot de passe doit faire plus de 5 caractères.</span>
        <br />
        <br />
       <label for="pass">Votre mot de passe : *</label>
        <input type="password" name="pass" id="pass" class="champ" onblur="verifPass(this)"/>
        <br />
        <span class="annotation">Votre mot de passe doit être alphanumérique et doit comprendre au moins 8 caractères.</span>
        <br />
        <br />

       <label for="pass2">Retapez votre mot de passe : *</label>
        <input type="password" name="pass2" id="pass2" class="champ"/>
        <br /><br />

    <label for="prenom">Votre prenom : *</label>
    <input type="text" name="prenom" id="prenom" class="champ"/>
    <br /><br />

    <label for="nom">Votre nom : *</label>
    <input type="text" name="nom" id="nom" class="champ" class="champ"/>
    <br /><br />

    <label for="adresse">Votre adresse : *</label>
    <input type="text" name="adresse" id="adresse" class="champ"/>
    <br />
        <span class="annotation">N'oubliez pas de préciser dans votre adresse : Le numéro, la rue, le code postal ainsi que la ville.</span>
        <br />
        <br />

    
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
    <label for="email">Votre email : *</label>
        <input type="email" name="email" id="email" class="champ">
        <br />
        <br />
      <label for="statut">Admin :</label>
      <select name="statut" id="statut">
        <option value="admin">Admin</option>
        <option value="spectateur">Spectateur</option>
        <option value="client">Client</option>
        <option value="attente">Attente</option>


          <!-- A mettre en boolean... Dans la DB il est en VARCHAR-->
    </select>
      <br /><br />

        <label for="numero_tel">Votre numéro de téléphone : *</label>
        <input type="text" name="numero_tel" id="numero_tel" class="champ" onblur="verifTel(this)"/>
        <br /><br />

        <p><em> Les champs possèdant une * sont obligatoires.</em><p>
        <br />

    <input type="submit" value="Envoyer" id ="submit_inscription" class="submit"/>
           <input type="reset" id="rafraichir" value="Rafraîchir" class="submit"/>

    </p>
   </fieldset>
</form>


<script>

    //JS BASIQUE
    function surligne(champ, erreur)
    {
        if(erreur)
            champ.style.backgroundColor = "#fba";
        else
            champ.style.backgroundColor = "";
    }

    function verifPass(champ)
    {
        var regex = /(?=.*[0-9])[A-Z]|(?=.*[A-Z])[0-9]/;
        if(!regex.test(champ.value))
        {
            surligne(champ, true);
            alert("Le mot de passe doit comprendre au moins 1 lettre 1 chiffre dans les 8 caractères.");
            return false;
        }
        else
        {
            surligne(champ, false);
            return true;
        }
    }

    function verifTel(champ)
    {
        var regex = /^0[1-9]([-. ]?[0-9]{2}){4}$/;
        if(!regex.test(champ.value))
        {
            surligne(champ, true);
            alert("Le numéro de téléphone n'est pas un numéro valide en France. Pour rappel, il doit comporter 10 chiffres et commencer un chiffre allant de 01 à 09.");
            return false;
        }
        else
        {
            surligne(champ, false);
            return true;
        }
    }


// jQUERY
    $(document).ready(function() {

        var $pass = $('#pass'),
            $pass2 = $('#pass2'),
            $pseudo = $('#pseudo'),
            $champ = $('#champ'),
            $submit_inscription = $('#submit_inscription'),
            $prenom = $('#prenom'),
            $nom = $('#nom'),
            $numero_tel = $('#numero_tel'),
            $email = $('#email'),
            $adresse = $('#adresse'),
            $erreur = $('#erreur'),
            $reset = $('#rafraichir');

// VERIFICATION DE LA LONGUEUR MOT DE PASSE
        $pass.keyup(function () {
            if ($(this).val().length < 8) { // si la chaîne de caractères est inférieure à 8
                $(this).css({ // on rend le champ rouge
                    borderColor: 'red',
                });
            }
            else {
                $(this).css({ // si tout est bon, on le rend vert
                    borderColor: 'green',
                });
            }
        });
        $pseudo.keyup(function () {
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

//VERIFICATION PASS ET PASS2 identiques
        $pass2.keyup(function(){
            if($(this).val() != $pass.val()){ // si la confirmation (pass2) est différente du mot de passe (pass)
                $(this).css({ // on rend le champ rouge
                    borderColor : 'red',
                });
            }
            else{
                $(this).css({ // si tout est bon, on le rend vert
                    borderColor : 'green',
                });
            }
        });
//VERIFIER QUE LES CLASS CHAMP NE SONT PAS VIDES
        function verifier(champ){
            if(champ.val() == ""){ // si le champ est vide
                $erreur.css('display', 'block'); // on affiche le message d'erreur
                champ.css({ // on rend le champ rouge
                    borderColor : 'red',
                    color : 'red'
                });
            }
        }
// ON VERIFIE ICI QUE TOUTES LES CLASS "CHAMP" cad touts les champs sans *, soient remplis et non vides
        $submit_inscription.click(function(e){
            e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi
            // puis on lance la fonction de vérification sur tous les champs :
            verifier($pseudo);
            verifier($pass);
            verifier($pass2);
            verifier($prenom);
            verifier($nom);
            verifier($adresse);
            verifier($email);
            verifier($numero_tel);

            document.getElementById('formulaire_inscription').submit();
        });

//ON VA ENELEVER LE MESSAGE D ERREUR EN CLIQUANt SUr lE bOUTON. PAR CONTRE, LA PROPRIETE GRISE NE SE REMET PAS...

        $reset.click(function(){
            $champ.css({ // on remet le style des champs comme on l'avait défini dans le style CSS (cd style.css)
                borderColor : ""
            });
            $erreur.css('display', 'none'); //cache le message d'erreur
        });


    });
</script>