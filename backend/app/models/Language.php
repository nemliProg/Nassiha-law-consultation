<?php

class Language extends Database {
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getLanguagesByLawyer($id)
  {
      $this->db->query('SELECT * 
                      from languages
                      where idLawyer = :id');
      $this->db->bind(':id', $id);
      $result = $this->db->resultSet();
      return $result;
  }

  public function addLanguage($data)
  {
    $this->db->query('INSERT INTO languages (name,idLawyer) VALUES(:name,:idLawyer)');
    // Bind values
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':idLawyer', $data['idLawyer']);
  
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  
  public function deleteLanguage($id)
  {
    $this->db->query('DELETE FROM languages WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $id);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}