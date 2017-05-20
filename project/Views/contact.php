<h2>Contact</h2 >

<?php
$admin = false;
if ($admin == true) {   /*Test si c'est un administrateur ou non et affiche 2 pages différentes */

    ?>

    <div class="infos-contact">
        <div> <img src="Image/Icone_localisation.png" width="24" height="24"> 28 rue Notre Dame des Champs</div>
        <div> <img src="Image/Icone_telephone.png" width="24" height="24"> +33 (0)1 22 33 44 55</div>
        <div> <img src="Image/Icone_email.png" width="24" height="24"> contact@mhouse.com</div>
    </div>

    <div map>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.6723360750684!2d2.3259462154355663!3d48.845388409576486
    !2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671ce3fd4afd3%3A0xb729389a530d1380!2s28+Rue+Notre+Dame+des+Champs%2C+75006
    +Paris!5e0!3m2!1sfr!2sfr!4v1495021372339" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

<?php }
else {
    ?>

    <div class="envoyer_message">           <!-- Identité et message du client -->
        <h3> Vous souhaitez contacter notre service client ? </h3>
        <form method="post" action="../Models/contact.php" >
            <label for="nom"> Nom : </label>
            <input type="text" name="nom" placeholder="Nom" id="nom" />

            <label for="mail"> Mail : </label>
            <input type="email" name="mail" placeholder="mail" id="mail" />
            <br>

            <label for="commentaire"> Commentaire : </label>
            <br>
            <textarea type="text" name="commentaire" placeholder="Votre message" id="Commentaire" rows="8" cols="50"></textarea>

            <br>
            <input type="submit" value="Envoyer">
            <br>
        </form>
    </div>

    <div class="infos-contact">
        <div> <img src="Image/Icone_localisation.png" width="24" height="24"> 28 rue Notre Dame des Champs</div>
        <div> <img src="Image/Icone_telephone.png" width="24" height="24"> +33 (0)1 22 33 44 55</div>
        <div> <img src="Image/Icone_email.png" width="24" height="24"> contact@mhouse.com</div>
    </div>
    <div map>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.6723360750684!2d2.3259462154355663!3d48.845388409576486
    !2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671ce3fd4afd3%3A0xb729389a530d1380!2s28+Rue+Notre+Dame+des+Champs%2C+75006
    +Paris!5e0!3m2!1sfr!2sfr!4v1495021372339" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

<?php } ?>