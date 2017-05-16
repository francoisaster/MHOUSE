<?php


/*
 *
 */
function inscription() {
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=mhouse_bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    /*$pseudo=htmlspecialchars(trim($_POST['pseudo']));
    $pass=sha1($_POST['pass']);
    $pass2=sha1($_POST['pass2']);
    $prenom=htmlspecialchars(trim($_POST['prenom']));
    $nom=htmlspecialchars(trim($_POST['nom']));
    $adresse=htmlspecialchars(trim($_POST['adresse']));
    $civilite=htmlspecialchars(trim($_POST['civilite']));
    $date_naissance=htmlspecialchars(trim($_POST['date_naissance']));
    $email=htmlspecialchars(trim($_POST['email']));
    $admin=htmlspecialchars(trim($_POST['admin']));*/

// Insertion
    $req=$bdd->prepare('INSERT INTO utilisateur(pseudo, pass, prenom, nom, adresse, sexe, date_naissance, email, admin) VALUES(:pseudo,:pass,:prenom, :nom, :adresse, :sexe, :date_naissance, :email, :admin)');
// $req->execute(array($_POST['pseudo'], $_POST['pass'], $_POST['email']));
    $req->bindParam(':pseudo',$_POST['pseudo']);
    $req->bindParam(':pass',$_POST['pass']);
    $req->bindParam(':prenom',$_POST['prenom']);
    $req->bindParam(':nom',$_POST['nom']);
    $req->bindParam(':adresse',$_POST['adresse']);
    $req->bindParam(':sexe',$_POST['sexe']);
    $req->bindParam(':date_naissance',$_POST['date_naissance']);
    $req->bindParam(':email',$_POST['email']);
    $req->bindParam(':admin',$_POST['admin']);
    $req->execute();
// On prend le marqueur :pseudo et on lui attribue le POST pseudo qui vient du champ pseudo

}

function verifExistence($pseudo, $email, $pass){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=mhouse_bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    $reponse = $bdd->query('SELECT pseudo,email, pass FROM utilisateur WHERE pseudo="'.$pseudo.'" && email="'.$email.'" && pass="'.$pass.'"');
    return $reponse;
}
