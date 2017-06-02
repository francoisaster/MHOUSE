<!DOCTYPE html>
<html>
<head> <!--mettre le java script dedans le head -->
    <meta charset="utf-8">
    <link rel="icon" href="../../logo.ico">
    <title>Mhouse</title>
    <link href="../public/css/style.css" rel="stylesheet" type="text/css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.validate.min.js"></script>

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
            <span>FAQ</span>
        </div>
        <div id="reseaux_sociaux">
            <span>Suivez nous sur les réseaux sociaux :</span>
        </div>
    </footer>

</div> <!-- fin superglobale -->
</body>



</html>

