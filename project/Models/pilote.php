<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25/06/2017
 * Time: 16:16
 */

function pilote($capteur_choisi,$a){
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=009E&TRAME=1009E2D01".$a."000000083");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);

}