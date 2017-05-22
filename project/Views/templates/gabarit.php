<!DOCTYPE html>
<html>
<head> <!--mettre le java script dedans le head -->
    <meta charset="utf-8">
    <link rel="icon" href="../../logo.ico">
    <title>Mhouse</title>
    <link href="../../public/css/style.css" rel="stylesheet">
</head>

<body>

<nav class="menu">
    <div class="container">
        <?= $menu; ?>
    </div>
</nav>

<div class="container">
    <div class="content">
        <?= $content; //affiche de la variable content qui contient le code html de la oage appelé par require dans l'index !?>
    </div>
</div><!-- /.container -->

</body>
</html>

