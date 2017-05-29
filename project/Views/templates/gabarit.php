<!DOCTYPE html>
<html>
<head> <!--mettre le java script dedans le head -->
    <meta charset="utf-8">
    <link rel="icon" href="../../logo.ico">
    <title>Mhouse</title>
    <link href="../public/css/style.css" rel="stylesheet" type="text/css" >
</head>

<body>
    <header>
        <?= $menu; ?>
    </header>

    <div class="content">
        <?= $content; //affiche de la variable content qui contient le code html de la oage appelé par require dans l'index !?>
    </div>

</body>
</html>

