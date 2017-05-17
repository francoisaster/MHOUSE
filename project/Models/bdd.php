<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 17/05/2017
 * Time: 19:36
 */

function bdd(){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
}