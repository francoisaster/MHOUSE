<?php



require'connexionBdd.php';
function creationPieces(){

    $bdd=connexionBdd();
// Insertion
    $req = $bdd->prepare('INSERT INTO piece(nom_piece,id_utilisateur,id_maison,superficie) VALUES(:nom_piece,:id_utilisateur,:id_maison,:superficie)');
    $req->bindParam(':nom_piece', htmlspecialchars($_POST['nom_piece']));
    $req->bindParam(':id_utilisateur', htmlspecialchars($_SESSION['id_utilisateur']));
    $req->bindParam(':id_maison', htmlspecialchars($_POST['id_maison_piece']));
    $req->bindParam(':superficie', htmlspecialchars($_POST['superficie']));
    $req->execute();
}
//../Views/pieces.php');

function affichePieces()
{

    $bdd=connexionBdd();
    $reponse = $bdd->query('SELECT nom_piece FROM piece ORDER BY ID');
    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
    while ($donnees = $reponse->fetch()) {
        echo '<p>' . htmlspecialchars($donnees['nom_piece']) . '</p>';
    }
    $reponse->closeCursor();
}

function affichePiecesMenu()
{

    $bdd=connexionBdd();

    $req = $bdd->prepare('SELECT * FROM piece WHERE id_utilisateur = :id_utilisateur and id_maison=:id_maison');
    $req->bindParam(':id_utilisateur',$_SESSION['id_utilisateur']);
    $req->bindParam(':id_maison',$_SESSION['id_maison']);
    $req->execute();
    $req2 = $bdd->prepare('SELECT * FROM piece WHERE id_utilisateur = :id_utilisateur and id_maison=:id_maison');
    $req2->bindParam(':id_utilisateur',$_SESSION['id_utilisateur']);
    $req2->bindParam(':id_maison',$_SESSION['id_maison']);
    $req2->execute();
/*
 * Il y a 2 requetes car le fecth retire les lignes une fois qu'il les parcourt.
 */
    if(!isset($_SESSION['id_piece'])) { // si il n'a jamais cliqué sur une piece, alors affiche toutes les pieces dans l'ordre
        while ($donnees = $req->fetch()) {
            echo '<option value="' . htmlspecialchars($donnees['id_piece']) . '">' . htmlspecialchars($donnees['nom_piece']) . '</option>';
        }
    }else{
        while ($donnees = $req->fetch()) {
            if($_SESSION['id_piece']==$donnees['id_piece']){
                echo '<option value="' . htmlspecialchars($donnees['id_piece']) . '">' . htmlspecialchars($donnees['nom_piece']) . '</option>';
            }
        }
        while ($donnee = $req2->fetch()) {
            if(($_SESSION['id_piece']!=$donnee['id_piece'])){
                echo '<option value="' . htmlspecialchars($donnee['id_piece']) . '">' . htmlspecialchars($donnee['nom_piece']) . '</option>';
            }
        }
    }



    $req->closeCursor();
}



function isUniquePiece($_nomPiece,$id_maison_piece){

    $bdd=connexionBdd();
    $req = $bdd->prepare('SELECT * FROM piece WHERE id_utilisateur = :id_utilisateur and id_maison=:id_maison_piece ');
    $req->bindParam(':id_utilisateur',$_SESSION['id_utilisateur']);
    $req->bindParam(':id_maison_piece',$id_maison_piece);
    $req->execute();
    while ($donnees = $req->fetch()) {
        if($_nomPiece==$donnees['nom_piece']) {
            return false;
        }
    }
    return true;

}

function afficheMaison()
{

    $bdd=connexionBdd();
        $req2 = $bdd->prepare('SELECT * FROM piece WHERE id_utilisateur = :id_utilisateur and id_maison= :id_maison');
        $req2->execute(array('id_utilisateur' => $_SESSION['id_utilisateur'],
            'id_maison' => $_SESSION['id_maison']));

        while ($donnees2 = $req2->fetch()) {
            $id_piece = $donnees2['id_piece'];
            $id_utilisateur = $_SESSION['id_utilisateur'];
            $req3 = $bdd->query("SELECT * FROM capteurs WHERE id_piece=$id_piece and id_utilisateur=$id_utilisateur");
            
            while ($donnees3 = $req3->fetch())
            {
                echo '<tr>' . '<td class="menu2">' . htmlspecialchars($donnees2['nom_piece']) . '</td>';
                echo '<td class="menu3">' . htmlspecialchars($donnees3['nom_capteur']) .'</td>'; 
                echo '<td class="menu4">' . htmlspecialchars($donnees3['type_capteur']) . '</td>';
                echo '<td class="menu5">' . htmlspecialchars($donnees3['numero_serie']) . '</td>' . '</tr>';
            }
        }


        $req3->closeCursor();
        $req2->closeCursor();

    
}

function choisirMaison()
{
    $bdd=connexionBdd();
     
    $req1 = $bdd->prepare('SELECT * FROM maison WHERE id_utilisateur = :id_utilisateur');
    $req1->execute(array('id_utilisateur' => $_SESSION['id_utilisateur']));
    while ($donnees1 = $req1->fetch()) {
         echo '<option value="' . htmlspecialchars($donnees1['id_maison']) . '">' . htmlspecialchars($donnees1['nom']) . '</option>';
    }
    $req1->closeCursor();
}

function Maisonchoisi()
{
    $bdd=connexionBdd();
    $id_maison = $_SESSION['id_maison'];
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $req4 = $bdd->query("SELECT * FROM maison WHERE id_maison=$id_maison and id_utilisateur=$id_utilisateur");    
    $donnees4 = $req4->fetch();
    echo $donnees4['nom'];
    $req4->closeCursor();

}