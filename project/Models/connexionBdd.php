<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/05/2017
 * Time: 17:52
 */
function connexionBdd(){
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=mhouse_bdd;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
return $bdd;
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

}
