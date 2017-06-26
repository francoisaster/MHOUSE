<!DOCTYPE html>
<html>
<head> <!--mettre le java script dedans le head -->
    <meta charset="utf-8">
    <link rel="icon" href="../../logo.ico">
    <title>Mhouse</title>
    <link href="../public/css/style.css" rel="stylesheet" type="text/css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <!-- TEST -->


</head>

<body>
<div id="superglobal">
    <header>
        <?= $menu; ?>
    </header>


    <div id="global">
        <div class="content">
            <?= $content; //affiche de la variable content qui contient le code html de la oage appelé par require dans l'index !?>
        </div>

    </div> <!-- fin global -->

    <footer>
        <div id="faq">
            <span><a href="../public/index.php?p=FAQ">FAQ</a></span>
        </div>

        <div class="reseaux_sociaux">
            <span>Suivez nous sur les réseaux sociaux :</span>

            <a href="https://twitter.com/isep">
                <img src="../public/images/twit.png">
            </a>

            <a href="https://www.facebook.com/ISEP.Paris/?fref=ts">
                <img src="../public/images/fb.png">
            </a>

            <a href="https://www.instagram.com/isepparis/">
                <img id="insta"src="../public/images/insta.png">
            </a>

            <a href="https://fr.linkedin.com/company/institut-sup-rieur-d'electronique-de-paris-i-s-e-p-">
                <img src="../public/images/link.png">
            </a>

        </div>

    </footer>

</div> <!-- fin superglobale -->
</body>

</html>
