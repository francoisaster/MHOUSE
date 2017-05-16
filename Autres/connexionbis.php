<?php
 

$bdd= new PDO("mysql:host=localhost;dbname=m'house",'root','root');
/*$rech=$bdd->query("SELECT * FROM utilisateur");
var_dump($rech->fetchAll());*/


if(isset($_POST['submit']));{
   
    $email=htmlentities(trim($_POST['mail']));
    $mdp=sha1($_POST['mdp']);
    $mdp2=sha1($_POST['mdp2']);
    $nom=htmlentities(trim($_POST['nom']));
    $prenom=htmlentities(trim($_POST['prenom']));
    $adresse=htmlentities(trim($_POST['adresse']));
    $civilite=htmlentities(trim($_POST['civilite']));
    $age=htmlentities(trim($_POST['age']));
    $compte=htmlentities(trim($_POST['membre']));
    $pseudo=htmlentities(trim($_POST['pseudo']));



    

    if(!empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'] ))    
    {
       
         if($mdp== $mdp2)
            {
                /*pseudo="'.$pseudo.'" mdp="'.$mdp.'"*/
                $reponse = $bdd->query('SELECT pseudo,email, mdp FROM utilisateur WHERE email="'.$email.'" '); // il reste un pb avec le WHERE ou j'arrive pas a faire plusieurs requetes simultaness, le AND ne marche pas !
                if($reponse->rowcount()==0){
                // l'utilisateur n'est pas dans la base de donnée
                    $insertmbr= $bdd->prepare("INSERT INTO utilisateur(compte,pseudo,email,mdp,sexe,nom,prenom,age,adresse) VALUES(?,?,?,?,?,?,?,?,?)");
                    $insertmbr->execute(array($compte,$pseudo,$email,$mdp,$civilite,$nom,$prenom,$age,$adresse));
                    $erreur= "Votre compte a bien été crée"; 
                }
                else
                {
                // compte deja existant
                    $erreur="Veuillez saisir de nouveaux identifiants";

                        
                }     
                
            }
            else
            {
            // Cas ou les mots de passes doivent etre identiques

                $erreur=" Vos mots de passes doivent être identiques";
            }
    
    }
    
    else
    {
        $erreur="Tout les champs doivent être saisis";

    }

}
 if(isset($erreur))
    {
        echo '<font color="red">' .$erreur. '</font>';
        include("../Vue/page_accueil.php");
    }
   

    