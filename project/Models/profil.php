<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 16/05/2017
 * Time: 15:16
 */

require'../Models/connexionBdd.php';

function afficheProfil(){
    $bdd=connexionBdd();
    $req = $bdd->prepare('SELECT pseudo, prenom, nom, adresse, sexe, date_naissance, email FROM utilisateur
WHERE id_utilisateur= ? ');
    $req=execute(array(
        $_POST['id_utilisateur']
    ));
    while ($donnees = $req->fetch()) {
        echo '<p>' . htmlspecialchars($donnees['pseudo']) . htmlspecialchars($donnees['prenom']) . htmlspecialchars($donnees['nom']) .
            htmlspecialchars($donnees['adresse']) . htmlspecialchars($donnees['sexe']) . htmlspecialchars($donnees['date_naissance']) .
            htmlspecialchars($donnees['email']) . '</p>';
    }
    $req->closeCursor();
}


function updateProfil()
{
    $bdd=connexionBdd();
    $requpdate = $bdd->prepare('
UPDATE utilisateur
SET pseudo = :nv_pseudo, prenom = :nv_prenom, nom = :nv_nom, adresse = :nv_adresse, sexe = :nv_sexe,
date_naissance = :date_naissance, email = :nv_email, numero_tel = :numero_tel
WHERE id_utilisateur = :id_utilisateur ');
    $requpdate->execute(array(
        'nv_pseudo' => $_POST['pseudo'],
        'nv_prenom' => $_POST['prenom'],
        'nv_nom' => $_POST['nom'],
        'nv_adresse' => $_POST['adresse'],
        'nv_sexe' => $_POST['sexe'],
        'date_naissance' => $_POST['date_naissance'],
        'nv_email' => $_POST['email'],
        'numero_tel' => $_POST['numero_tel'],
        'id_utilisateur' => $_SESSION['id_utilisateur'],
        ));
}

function childaccount(){
    /*
    $bdd=connexionBdd();
    $req=$bdd->prepare('
INSERT INTO utilisateur(pseudo,pass,prenom,nom,adresse,sexe,date_naissance,email,numero_tel)
VALUES(:pseudo,:pass,:prenom,:nom,:adresse,:sexe,:date_naissance,:email,:numero_tel)');
    $req->execute(array(
        'pseudo' => $_POST['pseudoEnfant'],
        'pass' => $_POST['mdp'],
        'prenom' => $_SESSION['prenom'],
        'nom' => $_SESSION['nom'],
        'adresse' => $_SESSION['adresse'],
        'sexe' => $_SESSION['sexe'],
        'date_naissance' => $_SESSION['date_naissance'],
        'email' => $_SESSION['email'],
        'numero_tel' => $_SESSION['numero_tel']));
*/
    
    $tour = 0;
    $passCript = $_POST['mdp'];
    while($tour<50){
        $passCript = hash('SHA256', $passCript);
        $tour=$tour+1;
    }
    $spectateur = 'spectateur';
    $bdd=connexionBdd();
    $req=$bdd->prepare('
INSERT INTO utilisateur(pseudo, pass, prenom, nom, adresse, sexe, date_naissance, email, statut, numero_tel, id_parent) 
VALUES(:pseudo,:pass,:prenom, :nom, :adresse, :sexe, :date_naissance, :email, :spectateur, :numero_tel,:id_parent)');
// $req->execute(array($_POST['pseudo'], $_POST['pass'], $_POST['email']));
    $req->bindParam(':pseudo',$_POST['pseudoEnfant']);
    $req->bindParam(':pass',$passCript);
    $req->bindParam(':prenom',$_SESSION['prenom']);
    $req->bindParam(':nom',$_SESSION['nom']);
    $req->bindParam(':adresse',$_SESSION['adresse']);
    $req->bindParam(':sexe',$_SESSION['sexe']);
    $req->bindParam(':date_naissance',$_SESSION['date_naissance']);
    $req->bindParam(':email',$_SESSION['email']);
    $req->bindParam(':spectateur',$spectateur);
    $req->bindParam(':numero_tel',$_SESSION['numero_tel']);
    $req->bindParam(':id_parent',$_SESSION['id_utilisateur']);
    $req->execute();
}

function verifExistence($pseudo){
    $bdd=connexionBdd();
    $reponse = $bdd->prepare('SELECT pseudo, pass FROM utilisateur WHERE pseudo= ?');
    $reponse->execute(array($pseudo));
    return $reponse;
}



function upContact(){
    $bdd=connexionBdd();
    $req = $bdd->prepare('UPDATE utilisateur SET adresse = :nv_adresse, email = :nv_mail, numero_tel = :nv_tel WHERE id_utilisateur = :id_utilisateur');
    $req->execute(array(
        'nv_adresse' => htmlspecialchars($_POST['adresse']),
        'nv_mail' => htmlspecialchars($_POST['email']),
        'nv_tel' => htmlspecialchars($_POST['numero_tel']),
        'id_utilisateur' => $_SESSION['id_utilisateur'],
    ));

}

function getUserSelected(){
    $bdd=connexionBdd();
    $requser2 = $bdd->prepare('SELECT * FROM utilisateur WHERE id_utilisateur= :id_utilisateur');
    $requser2 -> execute(array(
    'id_utilisateur' => $_SESSION['id_utilisateur'],
        ));
    return $requser2;
}


function changementMdp($pass, $newpass, $newpass2) {
    $bdd = connexionBdd();
    if(isset($_POST['modifier'])) {
        if (($pass != '') && ($newpass != '') && ($newpass2 != '')) {
            $tour=0;
            while($tour<50){
                $newpass = hash('SHA256', $newpass);
                $tour=$tour+1;
            }
            $tour2=0;
            while($tour2<50){
                $newpass2 = hash('SHA256', $newpass2);
                $tour2=$tour2+1;
            }
            $tour3=0;
            while($tour3<50){
                $pass = hash('SHA256', $pass);
                $tour3=$tour3+1;
            }
            if ($pass == $_SESSION['pass']) {
                if ($newpass == $newpass2) {
                    $req = $bdd->prepare('UPDATE utilisateur SET pass = :newpass WHERE id_utilisateur = :id_utilisateur');
                    $req->execute(array(
                        'newpass' => $newpass,
                        'id_utilisateur' => $_SESSION['id_utilisateur'],
                    ));

                    // $req->execute(array('$newpass' => $_SESSION['$newpass']));
                    $text = 'La modification de votre mot de passe à réussie';
                    $_SESSION['pass'] = $newpass;
                } else {
                    $text = 'Erreur, vos deux nouveaux mot de passe ne correspondent pas';
                }
            } else {
                $text = 'Le mot de passe actuel n\'est pas valide';
            }
        } else {
            $text = 'Veuillez remplir tout les champs';
        }
    } else{
        $text = 'Page de modification de mot passe administrateur'; }

    return $text;
}