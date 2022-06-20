<?php

class Diploma extends Database {
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getDiplomasByLawyer($id)
  {
      $this->db->query('SELECT * 
                      from diplomas
                      where idLawyer = :id');
      $this->db->bind(':id', $id);
      $result = $this->db->resultSet();
      return $result;
  }

  public function addDiploma($data)
  {
    $this->db->query('INSERT INTO diplomas (diploma,university,idLawyer) VALUES(:diploma,:university,:idLawyer)');
    // Bind values
    $this->db->bind(':diploma', $data['diploma']);
    $this->db->bind(':university', $data['university']);
    $this->db->bind(':idLawyer', $data['idLawyer']);
  
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  
  public function deleteDiploma($id)
  {
    $this->db->query('DELETE FROM diplomas WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $id);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}