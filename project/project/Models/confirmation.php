<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17/06/2017
 * Time: 13:50
 */
require 'connexionBdd.php';
function afficheAttente(){
    $champ="";
    $bdd=connexionBdd();
    $req = $bdd->query("SELECT *FROM utilisateur WHERE statut='attente'");
    while($donnees=$req->fetch()){
        $champ= '<form action="../Controllers/confirmation.php" method="post" class="petitBlock">
    <fieldset class="petitField">
        <table>
        <tr> <td>Pseudo :</td>  <td>'.$donnees['pseudo'].'</td></tr>
        <tr> <td>Nom :</td> <td>'.$donnees['nom'].' '.$donnees['prenom'].'</td></tr> 
        <tr><td>Statut :</td> <td> '.$donnees['statut'].'</td></tr>
        <input type="hidden" name="id_utilisateur" value='.$donnees['id_utilisateur'].' />
        </table>
        <select name="choix">
            <option value="'.$donnees['statut'].'">'.$donnees['statut'].'</option>';
            if($donnees['statut']=='client'){
                $champ=$champ.'<option value="admin">admin</option>
                <option value="attente">attente</option>
                <option value="spectateur">spectateur</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
            }elseif ($donnees['statut']=='admin'){
                $champ=$champ.'<option value="client">client</option>
                <option value="attente">attente</option>
                <option value="spectateur">spectateur</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
            }
            elseif ($donnees['statut']=='attente'){
                $champ=$champ.'<option value="client">client</option>
                <option value="admin">admin</option>
                <option value="spectateur">spectateur</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
            }
            elseif($donnees['statut']=='spectateur'){
                $champ=$champ.'<option value="client">client</option>
                <option value="attente">attente</option>
                <option value="admin">admin</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
            }


    }
    if($champ==""){
        echo "<div class='block'>" .  "Aucun compte en attente" . "</div>";
    }else{
        echo $champ;
    }
}
function confirmation($id_utilisateur,$choix){
    $bdd=connexionBdd();
    $req = $bdd->prepare('UPDATE utilisateur SET statut = :choix WHERE id_utilisateur = :id_utilisateur');
    $req->execute(array(
        'choix' => htmlspecialchars($choix),
        'id_utilisateur' => $id_utilisateur,
    ));
}
function afficheUtilisateurRecherche($pseudo){
    $bdd=connexionBdd();
    // Récupération des 20 derniers messages
    $req = $bdd->prepare("SELECT *FROM utilisateur WHERE pseudo=:pseudo");
    $req->execute(array('pseudo'=>$pseudo));
    while($donnees=$req->fetch()){
        $champ= '<form action="../Controllers/recherche.php" method="post" class="petitBlock">
    <fieldset class="petitField">
        <table>
        <tr> <td>Pseudo :</td>  <td>'.$donnees['pseudo'].'</td></tr>
        <tr> <td>Nom :</td> <td>'.$donnees['nom'].' '.$donnees['prenom'].'</td></tr> 
        <tr><td>Statut :</td> <td> '.$donnees['statut'].'</td></tr>
        <input type="hidden" name="id_utilisateur" value='.$donnees['id_utilisateur'].' />
        </table>
        <select name="choix">
            <option value="'.$donnees['statut'].'">'.$donnees['statut'].'</option>';
        if($donnees['statut']=='client'){
            $champ=$champ.'<option value="admin">admin</option>
                <option value="attente">attente</option>
                <option value="spectateur">spectateur</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
        }elseif ($donnees['statut']=='admin'){
            $champ=$champ.'<option value="client">client</option>
                <option value="attente">attente</option>
                <option value="spectateur">spectateur</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
        }
        elseif ($donnees['statut']=='attente'){
            $champ=$champ.'<option value="client">client</option>
                <option value="admin">admin</option>
                <option value="spectateur">spectateur</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
        }
        elseif ($donnees['statut']=='spectateur'){
            $champ=$champ.'<option value="client">client</option>
                <option value="attente">attente</option>
                <option value="admin">admin</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
        }

        echo $champ;
    }

}

function afficheUtilisateur(){
    $bdd=connexionBdd();
    // Récupération des 20 derniers messages
    $req = $bdd->query("SELECT *FROM utilisateur");
    while($donnees=$req->fetch()){
        $champ= '<form action="../Controllers/utilisateur.php" method="post" class="petitBlock">
    <fieldset class="petitField">
        <table>
        <tr> <td>Pseudo :</td>  <td>'.$donnees['pseudo'].'</td></tr>
        <tr> <td>Nom :</td> <td>'.$donnees['nom'].' '.$donnees['prenom'].'</td></tr> 
        <tr><td>Statut :</td> <td> '.$donnees['statut'].'</td></tr>
        <input type="hidden" name="id_utilisateur" value='.$donnees['id_utilisateur'].' />
        </table>
        <select name="choix">
            <option value="'.$donnees['statut'].'">'.$donnees['statut'].'</option>';
        if($donnees['statut']=='client'){
            $champ=$champ.'<option value="admin">admin</option>
                <option value="attente">attente</option>
                <option value="spectateur">spectateur</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
        }elseif ($donnees['statut']=='admin'){
            $champ=$champ.'<option value="client">client</option>
                <option value="attente">attente</option>
                <option value="spectateur">spectateur</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
        }
        elseif ($donnees['statut']=='attente'){
            $champ=$champ.'<option value="client">client</option>
                <option value="admin">admin</option>
                <option value="spectateur">spectateur</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
        }
        elseif ($donnees['statut']=='spectateur'){
            $champ=$champ.'<option value="client">client</option>
                <option value="attente">attente</option>
                <option value="admin">admin</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
        }

        echo $champ;
    }

}
function afficheUtilisateurBis(){
    $bdd=connexionBdd();
    // Récupération des 20 derniers messages
    $req = $bdd->query("SELECT *FROM utilisateur");
    while($donnees=$req->fetch()){
        $champ= '<form action="../Controllers/utilisateur.php" method="post" class="petitBlock">
    <fieldset classe="petitField">
        <table>
        <tr> <td>Pseudo :</td>  <td>'.$donnees['pseudo'].'</td></tr> 
        <tr> <td>Nom :</td> <td>'.$donnees['nom'].' '.$donnees['prenom'].'</td></tr> 
        <tr><td>Statut :</td> <td> '.$donnees['statut'].'</td></tr>
        <input type="hidden" name="id_utilisateur" value='.$donnees['id_utilisateur'].' />
        </table>
        <select name="choix">
            <option value="'.$donnees['statut'].'">'.$donnees['statut'].'</option>';
        if($donnees['statut']=='client'){
            $champ=$champ.'<option value="admin">admin</option>
                <option value="attente">attente</option>
                <option value="spectateur">spectateur</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
        }elseif ($donnees['statut']=='admin'){
            $champ=$champ.'<option value="client">client</option>
                <option value="attente">attente</option>
                <option value="spectateur">spectateur</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
        }
        elseif ($donnees['statut']=='attente'){
            $champ=$champ.'<option value="client">client</option>
                <option value="admin">admin</option>
                <option value="spectateur">spectateur</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
        }
        elseif ($donnees['statut']=='spectateur'){
            $champ=$champ.'<option value="client">client</option>
                <option value="attente">attente</option>
                <option value="admin">admin</option>
                <option value="delet">delet</option>
            </select>
            <input type="submit" name="submit" value="Modifier" />
        </fieldset>
    </form>';
        }

        echo $champ;
    }

}