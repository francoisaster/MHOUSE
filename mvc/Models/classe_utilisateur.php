<?php
class Utilisateur
{
  private $_id;
  private $_pseudo;
  private $_pass;
  private $_email;
  
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