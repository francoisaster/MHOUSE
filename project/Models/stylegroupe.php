<?php

function affichePiecesMenu()
{
    $dbname = "exercice";
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $bdd = new PDO("mysql:host=$host;dbname=$dbname","$user","$pass");
    $reponse = $bdd->requery('SELECT * FROM style ');

}