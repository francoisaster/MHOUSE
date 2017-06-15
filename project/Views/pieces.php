<div class="notifications">
    <img src="http://localhost/Project/Views/valider.jpg" class="check">
    <a>La maison a bien été enregistré </a>            
</div>

<div class="notifications2">
    <img src="http://localhost/Project/Views/valider.jpg" class="check">
    <a>La piece a bien été ajouté </a>            
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
            $('.notifications').fadeIn();
            var temp = '.' + this.id;
            setTimeout(function(){ 
                $('.notifictaions').fadeOut();
                $(temp).submit();
            },1500);
        });

        $(".submit2").click( function(){
            $('.notifications2').fadeIn();
            var temp = '.' + this.id;
            setTimeout(function(){ 
                $('.notifictaions2').fadeOut();
                $(temp).submit();
            },1500);
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
