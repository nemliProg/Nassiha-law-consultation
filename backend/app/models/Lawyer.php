<?php
class Lawyer
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function register($data)
  {
    $this->db->query('INSERT INTO lawyers (id, bar, cassation, adress) VALUES(:id,:bar, :cassation, :adress)');
    // Bind values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':bar', $data['bar']);
    $this->db->bind(':cassation', $data['cassation']);
    $this->db->bind(':adress', $data['adress']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function specialisedToggle($idLawyer, $idSkill)
  {
    if ($this->researchSkill($idLawyer, $idSkill)) {
      $this->db->query('DELETE FROM specialised where idLawyer = :idLawyer and idSkill = :idSkill');
    }else {
      $this->db->query('INSERT INTO specialised (idLawyer,idSkill) VALUES(:idLawyer,:idSkill)');
    }
    // Bind values
    $this->db->bind(':idLawyer', $idLawyer);
    $this->db->bind(':idSkill', $idSkill);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function researchSkill($idLawyer, $idSkill)
  {
    $this->db->query('SELECT  FROM specialised WHERE idLawyer = :idLawyer and idSkill = :idSkill');
    $this->db->bind(':idLawyer', $idLawyer);
    $this->db->bind(':idSkill', $idSkill);
    $row = $this->db->single();
    if ($row) {
      return true;
    } else {
      return false;
    }
  }
}
