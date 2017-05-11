<?php


class UtilisateurManager{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Utilisateur $perso)
  {
    $q = $this->_db->prepare('INSERT INTO personnages(nom, forcePerso, degats, niveau, experience) VALUES(:nom, :forcePerso, :degats, :niveau, :experience)');

    $q->bindValue(':nom', $perso->nom());
    $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
    $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);

    $q->execute();
  }

  public function delete(Personnage $perso)
  {
    $this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Personnage($donnees);
  }

  public function getList()
  {
    $persos = [];

    $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages ORDER BY nom');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $persos[] = new Personnage($donnees);
    }

    return $persos;
  }

  public function update(Personnage $perso)
  {
    $q = $this->_db->prepare('UPDATE personnages SET forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience WHERE id = :id');

    $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
    $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
    $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}








class Utilisateur
{
  private $_id;
  private $_pseudo;
  private $_pass;
  private $_email;

    // Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
  public function hydrate(array $donnees)
  {

      foreach ($donnees as $key => $value)
      {
        $method = 'set'.ucfirst($key);

        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
      }

  }
  
  // Liste des getters
  
  public function id()
  {
    return $this->_id;
  }
  
  public function pseudo()
  {
    return $this->_pseudo;
  }
  
  public function pass()
  {
    return $this->_pass;
  }
  
  public function email()
  {
    return $this->_email;
  }
  
  
  // Liste des setters
  
  public function setId($id)
  {
    // On convertit l'argument en nombre entier.
    // Si c'en était déjà un, rien ne changera.
    // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
    $id = (int) $id;
    
    // On vérifie ensuite si ce nombre est bien strictement positif.
    if ($id > 0)
    {
      // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
      $this->_id = $id;
    }
  }
  
  public function setPseudo($pseudo)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($pseudo))
    {
      $this->_pseudo = $pseudo;
    }
  }
  public function setPass($pass)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($pass))
    {
      $this->_pass = $pass;
    }
  }
  
  public function setEmail($email)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    if (is_string($email))
    {
      $this->_email = $email;
    }
  }


?>