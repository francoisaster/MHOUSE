<?php


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
                $reponse = $bdd->query('SELECT pseudo,email, mdp FROM utilisateur WHERE pseudo="'.$pseudo.'"');
                if($reponse->rowcount()==0){
                // l'utilisateur n'est pas dans la base de donnée
                    $insertmbr= $bdd->prepare("INSERT INTO utilisateur(compte,pseudo,email,mdp,sexe,nom,prenom,age,adresse) VALUES(?,?,?,?,?,?,?,?,?)");
                    $insertmbr->execute(array($compte,$pseudo,$email,$mdp,$civilite,$nom,$prenom,$age,$adresse));
                    $erreur= "Votre compte a bien été crée"; 
                }
                //a enlever et mettre en page connexion
                else{
                // utilisateur trouvé dans la base de données
                        $ligne = $reponse->fetch();
                        if($mdp!=$ligne['mdp']){
                        // Le mot de passe entré ne correspond pas à celui stocké dans la base de données
                                    $erreur = "Mot de passe incorrect";
                                    include("Vue/app_accueil.php");
                        } 
                         else{ 
                        // mot de passe correct, on affiche la page d'accueil
                                    $_SESSION["userID"] = $ligne['id'];
                                    include("Vue/page_accueil.php");
                            }
                    }      


                }           
                
}
    
    else
    {
        $erreur="Tout les champs doivent être saisis";
        include("Vue/page_accueil.php");

    }

 if(isset($erreur))
    {
        echo '<font color="red">' .$erreur. "</font>";
        include("Vue/page_accueil.php");
    }
   

    