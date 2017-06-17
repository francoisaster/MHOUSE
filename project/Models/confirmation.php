<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17/06/2017
 * Time: 13:50
 */
require 'connexionBdd.php';
function afficheAttente(){
    $bdd=connexionBdd();
    // Récupération des 20 derniers messages
    $req = $bdd->query("SELECT *FROM utilisateur WHERE statut='attente'");
    while($donnees=$req->fetch()){
        $champ= '<form action="../Controllers/confirmation.php" method="post" class="block">
    <fieldset>
        <label for="pseudo">pseudo : '.$donnees['pseudo'].'</label>
        <label for="nom">nom : '.$donnees['nom'].'</label>
        <label for="prenom">prenom : '.$donnees['prenom'].'</label>
        <label for="statut">statut : '.$donnees['statut'].'</label>
        <input type="hidden" name="id_utilisateur" value='.$donnees['id_utilisateur'].' />
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
function confirmation($id_utilisateur,$choix){
    $bdd=connexionBdd();
    $req = $bdd->prepare('UPDATE utilisateur SET statut = :choix WHERE id_utilisateur = :id_utilisateur');
    $req->execute(array(
        'choix' => htmlspecialchars($choix),
        'id_utilisateur' => $id_utilisateur,
    ));
}
function afficheUtilisateur(){
    $bdd=connexionBdd();
    // Récupération des 20 derniers messages
    $req = $bdd->query("SELECT *FROM utilisateur");
    while($donnees=$req->fetch()){
        $champ= '<form action="../Controllers/utilisateur.php" method="post" class="block">
    <fieldset>
        <label for="pseudo">pseudo : '.$donnees['pseudo'].'</label>
        <label for="nom">nom : '.$donnees['nom'].'</label>
        <label for="prenom">prenom : '.$donnees['prenom'].'</label>
        <label for="statut">statut : '.$donnees['statut'].'</label>
        <input type="hidden" name="id_utilisateur" value='.$donnees['id_utilisateur'].' />
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