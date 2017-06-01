

<div class="block">
    <h1>Home</h1>

    <fieldset class="notif">Les notifications seront bientôt disponibles !</fieldset>
    <br />
    <fieldset class="notif">Voici une notification, si tu l'as lu, clic dessus pour la faire disparaitre !</fieldset>
</div>



<script>

    //$(".notif").css("background-color", "yellow");

    $(document).ready(function(){
        $(".notif").click(function(){
            $(this).hide();
        });
    });   //PARFAIT POUR FAIRE LES SUPPRESSIONS DE notifications

    </script>

