<?php

class Experience extends Database {
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }


  public function getExperiencesByLawyer($id)
  {
      $this->db->query('SELECT * 
                      from experiences
                      where idLawyer = :id');
      $this->db->bind(':id', $id);
      $result = $this->db->resultSet();
      return $result;
  }

  public function addExperience($data)
  {
    $this->db->query('INSERT INTO experiences (bar,_from,_to,idLawyer) VALUES(:bar,:_from,:_to,:idLawyer)');
    // Bind values
    $this->db->bind(':bar', $data['bar']);
    $this->db->bind(':_from', $data['from']);
    $this->db->bind(':_to', $data['to']);
    $this->db->bind(':idLawyer', $data['idLawyer']);
  
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function updateExperience($data)
  {
    $this->db->query('UPDATE experiences SET  bar = :bar,_from = :_from,_to = :_to WHERE id = :id');
    // Bind values
    $this->db->bind(':bar', $data['bar']);
    $this->db->bind(':_from', $data['from']);
    $this->db->bind(':_to', $data['to']);
    $this->db->bind(':id', $data['idExperience']);

  
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  
  public function deleteExperience($id)
  {
    $this->db->query('DELETE FROM experiences WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $id);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}