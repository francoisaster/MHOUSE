<?php  /*session_start(); */
?>

<!DOCTYPE html>
<html lang="en">
<head> <!--mettre le java script dedans le head -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Mhouse</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="http://localhost/project/public/index.php?p=home">MHOUSE</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="http://localhost/project/public/index.php?p=connexion">Connexion</a></li>
                <li><a href="http://localhost/project/public/index.php?p=inscription">Inscription</a></li>
                <li><a href="http://localhost/project/public/index.php?p=pieces">Pièces</a></li>
                <li><a href="http://localhost/project/public/index.php?p=contact">Contact</a></li>
                <li><a href="http://localhost/project/public/index.php?p=profil">Profil</a></li>
                <li><a href="http://localhost/project/public/index.php?p=leave">Deconnexion</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    <div class="starter-template" style="padding-top: 100px;">

        <?= $content; //affiche de la variable content qui contient le code html de la oage appelé par require dans l'index !?>
    </div>

</div><!-- /.container -->


</body>
</html>


