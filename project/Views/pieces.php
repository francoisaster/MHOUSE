<div class="notifications">
    <img src="http://localhost/Project/Views/valider.jpg" class="check">
    <!--a id="messagereussi">La maison <script>document.write(document.getElementById('nom_maison'))</script>a bien été enregistré </a-->
    <a id="messagereussi"> </a>            
</div>

<div class="messageerreur">
    <img src="http://localhost/Project/Views/info.png" class="check">
    <a>Erreur : veuillez remplir le champ</a>            
</div>

<div class="notifications2">
    <img src="http://localhost/Project/Views/valider.jpg" class="check">
    <a id="messagereussi2"></a>            
</div>

<form action="../Controllers/ajout_maison.php" method="post" class="block test">
    <fieldset>
        <legend>Ajout d'une maison</legend>
        <p>
            <label for="nom_maison">Le nom de la maison :</label>
            <input type="text" name="nom_maison" id="nom_maison" autofocus="" />
            <br />
            <br/>
            <input type="button" value="Ajouter maison" class="submit" id="test"/>
        </p>
    </fieldset>
</form>

<form action="../Controllers/pieces.php" method="post" class="block test2">
    <fieldset>
        <legend>Ajout d'une pièce</legend>
        <p>
            <label for="nom_piece">Le nom d'une pièce :</label>
            <input type="text" name="nom_piece" id="nom_piece" autofocus="" />
            <br />
            <br/>
            <label for="vue_capteur">Choix du domicile :</label>
            <select name="id_maison_piece" id="id_maison_piece">
                <?php require '../Models/affMenu.php';
                afficheMaisonMenu(); ?>
            </select>
            <br />
            <br/>
            <label for="superficie">La superficie de la piece (m²) :</label>
            <input type="text" name="superficie" id="superficie" autofocus="" />

            <br />
            <br/>
            <input type="button" value="Ajouter pièce" class="submit2" id="test2"/>
        </p>
    </fieldset>
</form>



<script>
    $(document).ready(function() {
        

        $(".submit").click( function(){
            var a = document.getElementById('nom_maison').value;
            if (a === ""){
                $('.messageerreur').fadeIn();
                var temp = '.' + this.id;
                setTimeout(function(){ 
                    $('.messageerreur').fadeOut();
                    $(temp).submit();
                },5000);
            } 
            else {
                $('.notifications').fadeIn();
                var temp = '.' + this.id;
                document.getElementById( "messagereussi" ).innerHTML = "La maison "+a+" a bien été enregistrée";
                setTimeout(function(){ 
                    $('.notifications').fadeOut();
                    $(temp).submit();
                },5000);
            }
        });
        
        $(".submit2").click( function(){
            var a = document.getElementById('nom_piece').value;
            if (a === ""){
                $('.messageerreur').fadeIn();
                var temp = '.' + this.id;
                setTimeout(function(){ 
                    $('.messageerreur').fadeOut();
                    $(temp).submit();
                },3000);
            } 
            else {
                $('.notifications2').fadeIn();
                var temp = '.' + this.id;
                document.getElementById( "messagereussi2" ).innerHTML = "La piece "+a+" a bien été enregistrée";
                setTimeout(function(){ 
                    $('.notifications2').fadeOut();
                    $(temp).submit();
                },3000);
            }


        });
    });
</script>



<!--
<script>

    $(document).ready(function(){
        $(".submit").click(function(){
            $(".notifications").show();
            $notif = 333;
            $.ajax({
                type: "POST",
                url: "",
                data: "string",
                success: function(){ console.log("success")},
                dataType: "html"
                });
        })

    })
</script>
-->
