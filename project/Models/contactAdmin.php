<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/05/2017
 * Time: 21:23
 */

require'connexionBdd.php';
function contactAdmin()
{$id_contact=1;
    $bdd = connexionBdd();
    $reponse = $bdd->query("SELECT * FROM utilisateur WHERE id_utilisateur=$id_contact");
    return $donnees = $reponse->fetch();
}
function upContact(){
$bdd=connexionBdd();
    $req = $bdd->prepare('UPDATE utilisateur SET adresse = :nv_adresse, email = :nv_mail, numero_tel = :nv_tel WHERE id_utilisateur = :one');
    $req->execute(array(
        'nv_adresse' => $_POST['nv_adresse'],
        'nv_mail' => $_POST['nv_mail'],
        'nv_tel' => $_POST['nv_tel'],
        'one' =>1,
    ));

}