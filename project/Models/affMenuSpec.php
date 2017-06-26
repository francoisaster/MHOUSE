<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 04/06/2017
 * Time: 21:54
 */
require 'connexionBdd2.php';
function afficheMaisonMenu()
{

    $bdd=connexionBdd2();

    $req = $bdd->prepare('SELECT * FROM maison WHERE id_parent = :id_utilisateur ');
    $req->execute(array('id_utilisateur' => $_SESSION['id_utilisateur']));
    $req2 = $bdd->prepare('SELECT * FROM maison WHERE id_parent = :id_utilisateur ');
    $req2->execute(array('id_utilisateur' => $_SESSION['id_utilisateur']));
    /*
     * Il y a 2 requetes car le fecth retire les lignes une fois qu'il les parcourt.
     */

    if(!isset($_SESSION['id_maison'])) { // si il n'a jamais cliqué sur une piece, alors affiche toutes les pieces dans l'ordre
        while ($donnees = $req->fetch()) {
            echo '<option value="' . htmlspecialchars($donnees['id_maison']) . '">' . htmlspecialchars($donnees['nom']) . '</option>';
        }
    }else{
        while ($donnees = $req->fetch()) {
            if($_SESSION['id_maison']==$donnees['id_maison']){
                echo '<option value="' . htmlspecialchars($donnees['id_maison']) . '">' . htmlspecialchars($donnees['nom']) . '</option>';
            }
        }
        while ($donnee = $req2->fetch()) {
            if(($_SESSION['id_maison']!=$donnee['id_maison'])){
                echo '<option value="' . htmlspecialchars($donnee['id_maison']) . '">' . htmlspecialchars($donnee['nom']) . '</option>';
            }
        }
    }



    $req->closeCursor();
}
function afficheMaisonMenu2()
{

    $bdd=connexionBdd2();

    $req = $bdd->prepare('SELECT * FROM maison WHERE id_utilisateur = :id_utilisateur ');
    $req->execute(array('id_utilisateur' => $_SESSION['id_utilisateur']));
    $req2 = $bdd->prepare('SELECT * FROM maison WHERE id_utilisateur = :id_utilisateur ');
    $req2->execute(array('id_utilisateur' => $_SESSION['id_utilisateur']));
    /*
     * Il y a 2 requetes car le fecth retire les lignes une fois qu'il les parcourt.
     */
    $text='';
    if(!isset($_SESSION['id_maison_client'])) { // si il n'a jamais cliqué sur une piece, alors affiche toutes les pieces dans l'ordre
        while ($donnees = $req->fetch()) {
            $text=$text.'<option value="' . htmlspecialchars($donnees['id_maison']) . '">' . htmlspecialchars($donnees['nom']) . '</option>';
        }
    }else{
        while ($donnees = $req->fetch()) {
            if($_SESSION['id_maison_client']==$donnees['id_maison']){
                $text=$text.'<option value="' . htmlspecialchars($donnees['id_maison']) . '">' . htmlspecialchars($donnees['nom']) . '</option>';
            }
        }
        while ($donnee = $req2->fetch()) {
            if(($_SESSION['id_maison_client']!=$donnee['id_maison'])){
                $text=$text.'<option value="' . htmlspecialchars($donnee['id_maison']) . '">' . htmlspecialchars($donnee['nom']) . '</option>';
            }
        }
    }



    $req->closeCursor();
    return $text;
}





function afficheMaisonMenu3()
{

    $bdd=connexionBdd2();

    $req = $bdd->prepare('SELECT * FROM maison WHERE id_utilisateur = :id_utilisateur ');
    $req->execute(array('id_utilisateur' => $_SESSION['id_utilisateur']));
    $req2 = $bdd->prepare('SELECT * FROM maison WHERE id_utilisateur= :id_utilisateur ');
    $req2->execute(array('id_utilisateur' => $_SESSION['id_utilisateur']));
    /*
     * Il y a 2 requetes car le fecth retire les lignes une fois qu'il les parcourt.
     */
    $text='';
    if(!isset($_SESSION['id_maison_client'])) { // si il n'a jamais cliqué sur une piece, alors affiche toutes les pieces dans l'ordre
        while ($donnees = $req->fetch()) {
            $text=$text.'<option value="' . htmlspecialchars($donnees['id_maison']) . '">' . htmlspecialchars($donnees['nom']) . '</option>';
        }
    }else{
        while ($donnees = $req->fetch()) {
            if($_SESSION['id_maison_client']==$donnees['id_maison']){
                $text=$text.'<option value="' . htmlspecialchars($donnees['id_maison']) . '">' . htmlspecialchars($donnees['nom']) . '</option>';
            }
        }
        while ($donnee = $req2->fetch()) {
            if(($_SESSION['id_maison_client']!=$donnee['id_maison'])){
                $text=$text.'<option value="' . htmlspecialchars($donnee['id_maison']) . '">' . htmlspecialchars($donnee['nom']) . '</option>';
            }
        }
    }



    $req->closeCursor();
    return $text;
}


function affichePiecesMenu2()
{

    $bdd=connexionBdd2();

    $req = $bdd->prepare('SELECT * FROM piece WHERE id_utilisateur = :id_utilisateur and id_maison=:id_maison');
    $req->bindParam(':id_utilisateur',$_SESSION['id_client']);
    $req->bindParam(':id_maison',$_SESSION['id_maison_client']);
    $req->execute();
    $req2 = $bdd->prepare('SELECT * FROM piece WHERE id_utilisateur = :id_utilisateur and id_maison=:id_maison');
    $req2->bindParam(':id_utilisateur',$_SESSION['id_client']);
    $req2->bindParam(':id_maison',$_SESSION['id_maison_client']);
    $req2->execute();
    /*
     * Il y a 2 requetes car le fecth retire les lignes une fois qu'il les parcourt.
     */
    $text='';
    if(!isset($_SESSION['id_piece_client'])) { // si il n'a jamais cliqué sur une piece, alors affiche toutes les pieces dans l'ordre
        while ($donnees = $req->fetch()) {
            $text=$text.'<option value="' . htmlspecialchars($donnees['id_piece']) . '">' . htmlspecialchars($donnees['nom_piece']) . '</option>';
        }
    }else{
        while ($donnees = $req->fetch()) {
            if($_SESSION['id_piece_client']==$donnees['id_piece']){
                $text=$text.'<option value="' . htmlspecialchars($donnees['id_piece']) . '">' . htmlspecialchars($donnees['nom_piece']) . '</option>';
            }
        }
        while ($donnee = $req2->fetch()) {
            if(($_SESSION['id_piece_client']!=$donnee['id_piece'])){
                $text=$text.'<option value="' . htmlspecialchars($donnee['id_piece']) . '">' . htmlspecialchars($donnee['nom_piece']) . '</option>';
            }
        }
    }



    $req->closeCursor();
    return $text;
}
function setIdClient($pseudo){
    $bdd=connexionBdd2();
    $req = $bdd->prepare('SELECT id_parent FROM utilisateur WHERE pseudo = :pseudo');
    $req->bindParam(':pseudo',$pseudo);
    $req->execute();
    $donnees=$req->fetch();
    $_SESSION['id_client']=$donnees['id_parent'];
}
function afficheCapteur(){
    $bdd=connexionBdd2();

    $req = $bdd->prepare('SELECT * FROM capteurs WHERE id_piece = :id_piece');
    $req->bindParam(':id_piece',$_SESSION['id_piece_client']);
    $req->execute();
    $text='';
    while($donnees=$req->fetch()) {
        $text=$text.'<p><strong>' . htmlspecialchars($donnees['nom_capteur']) . '</strong> : ' . htmlspecialchars($donnees['type_capteur']) . ' <strong> Marque : </strong> '.htmlspecialchars($donnees['marque']).'<strong> Numéro de série :</strong> '.htmlspecialchars($donnees['numero_serie']).'</p>';
    }
    if($text==''){
        $text="Il n'y a pas de capteur dans cette pièce";
    }
    return $text;
}
function afficheCapteurMenu($id_piece_client){
    $bdd = connexionBdd2();

    $req = $bdd->prepare('SELECT * FROM capteurs WHERE id_utilisateur = :id_utilisateur and id_piece=:id_piece');
    $req->bindParam(':id_utilisateur',$_SESSION['id_utilisateur']);
    $req->bindParam(':id_piece',$id_piece_client);
    $req->execute();
    $req2 = $bdd->prepare('SELECT * FROM capteurs WHERE id_utilisateur = :id_utilisateur and id_piece=:id_piece');
    $req2->bindParam(':id_utilisateur',$_SESSION['id_utilisateur']);
    $req2->bindParam(':id_piece',$id_piece_client);
    $req2->execute();
    /*
     * Il y a 2 requetes car le fecth retire les lignes une fois qu'il les parcourt, sinon utiliser un close cursor...
     */
    $text="";
    if(!isset($_SESSION['id_capteur'])) { // si il n'a jamais cliqué sur une piece, alors affiche toutes les pieces dans l'ordre
        while ($donnees = $req->fetch()) {
            $text=$text.'<option value="'.htmlspecialchars($donnees['nom_capteur']).'">'.htmlspecialchars($donnees['nom_capteur']).'</option>';
        }
    }else{
        while ($donnees = $req->fetch()) {
            if($_SESSION['id_capteur']==$donnees['id_capteur']){
                $text=$text.'<option value="'.htmlspecialchars($donnees['nom_capteur']).'">'.htmlspecialchars($donnees['nom_capteur']).'</option>';
            }
        }
        while ($donnee = $req2->fetch()) {
            if(($_SESSION['id_capteur']!=$donnee['id_capteur'])){
                $text=$text.'<option value="'.htmlspecialchars($donnee['nom_capteur']).'">'.htmlspecialchars($donnee['nom_capteur']).'</option>';
            }
        }
    }
    $req->closeCursor();
    return $text;

}
function afficheCapteurListe(){
    $bdd=connexionBdd2();
    $req = $bdd->prepare('SELECT * FROM capteurs WHERE id_utilisateur = :id_utilisateur and id_piece=:id_piece');
    $req->bindParam(':id_utilisateur',$_SESSION['id_utilisateur']);
    $req->bindParam(':id_piece',$id_piece_client);
    $req->execute();
    while($donnees=$req->fetch()){
        $champ= '<form action="../Controllers/confirmation.php" method="post" class="block">
    <fieldset>
        <label for="pseudo"> : '.$donnees['pseudo'].'</label>
        <label for="nom">nom : '.$donnees['nom'].'</label>
        <label for="prenom">prenom : '.$donnees['prenom'].'</label>
        <label for="statut">statut : '.$donnees['statut'].'</label>
        <input type="hidden" name="id_utilisateur" value='.$donnees['id_utilisateur'].' />
        <select name="choix">
            <option value="'.$donnees['statut'].'">'.$donnees['statut'].'</option>';

        $champ=$champ.'<option value="admin">admin</option>
                <option value="attente">attente</option>
                <option value="spectateur">spectateur</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';


        echo $champ;
    }

}