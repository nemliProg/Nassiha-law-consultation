<?php
class Consultation
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function add($data)
  {
    $this->db->query('INSERT INTO consultation (status,idLawyer, idClient) VALUES(:status,:idLawyer, :idClient)');
    // Bind values
    $this->db->bind(':status', 1);
    $this->db->bind(':idLawyer', $data['idLawyer']);
    $this->db->bind(':idClient', $data['idClient']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deleteConsultation($id)
  {
    $this->db->query('DELETE FROM consultations WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $id);
    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function updateConsultationStatusToFalse($id)
  {
    $this->db->query('UPDATE consultation SET status = 0  WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $id);
    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  
}
