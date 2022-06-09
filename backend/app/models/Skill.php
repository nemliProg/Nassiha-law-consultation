<?php

class Skill extends Database {
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }


  public function getSkillsByLawyer($id)
  {
      $this->db->query('SELECT sk.name
                      from specialised s, skills sk
                      where s.idSkill = sk.id 
                      AND s.idLawyer = :id');
      $this->db->bind(':id', $id);
      $result = $this->db->resultSet();
      return $result;
  }

  public function getLeftSkillsByLawyer($id)
  {
      $this->db->query('SELECT sk.*
                        from skills sk
                        WHERE sk.id NOT IN (SELECT sk.id 
                                            from skills sk,specialised s 
                                            WHERE sk.id = s.idSkill 
                                            AND s.idLawyer = :id)');
      $this->db->bind(':id', $id);
      $result = $this->db->resultSet();
      return $result;
  }
  
  public function addSkill($data)
  {
    $this->db->query('INSERT INTO specialised (idLawyer,idSkill) VALUES(:idLawyer,:idSkill)');
    // Bind values
    $this->db->bind(':idSkill', $data['idSkill']);
    $this->db->bind(':idLawyer', $data['idLawyer']);
  
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  
  public function deleteSkill($idLaywer,$idSkill)
  {
    $this->db->query('DELETE FROM specialised WHERE idSkill = :idskill AND idLawyer = :idlawyer');
    // Bind values
    $this->db->bind(':idskill', $idSkill);
    $this->db->bind(':idlawyer', $idLaywer);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}