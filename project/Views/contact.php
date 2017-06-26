<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/05/2017
 * Time: 21:08
 */

require'../Models/contactAdmin.php';
$donnees=contactAdmin();


?>

    <div id="message" class="block">
        <h3> Vous souhaitez contacter notre service client ? </h3>
        <form id="contact_form" action="../Models/contact.php" method="POST" enctype="multipart/form-data">
            <div class="nom">
                <label class="required" for="name">Votre nom : </label>
                <input id="name" class="input" name="name" type="text" value="" size="30" />
                <span id="name_validation" class="error_message"></span>
            </div>
            <br>
            <div class="mail">
                <label class="required" for="email">Votre email:</label>
                <input id="email" class="input" name="email" type="text" value="" size="30" />
                <span id="email_validation" class="error_message"></span>
            </div>
            <br>
            <div class="commentaire">
                <label class="required" for="message">Votre commentaire :</label>
                <textarea id="message" class="input" name="message" rows="8" cols="50"></textarea>
                <span id="message_validation" class="error_message"></span>
            </div>
            <br>
            <p><input class="submit" type="submit" value="Envoyer"></p>
            <br>
    </div>


    <div id="information2" class="block">
        <div> <img src="../public/images/map.png" width="20" height="20"> <span><?php echo $donnees['adresse']; ?></span></div>
        <div> <img src="../public/images/tel.png" width="20" height="20"> <span><?php echo $donnees['numero_tel'] ; ?></span></div>
    </div>




<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.6723360750684!2d2.3259462154355663!3d48.845388409576486
     !2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671ce3fd4afd3%3A0xb729389a530d1380!2s28+Rue+Notre+Dame+des+Champs%2C+75006
     +Paris!5e0!3m2!1sfr!2sfr!4v1495021372339" width="600" height="400" frameborder="5" style="border:15px" allowfullscreen></iframe>
</div>



