<?php
class Consultation
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getConsultationsbyclient($idClient)
  {
    $this->db->query('SELECT con.id,cl.id AS "to",cl.fname,cl.lname,cl.photo
                      FROM clients cl ,consultation con
                      WHERE cl.id IN (select c.idLawyer from consultation c where c.idClient = :idClient)
                      AND con.idClient = :idClient
                      AND cl.id = con.idLawyer');
    $this->db->bind(':idClient', $idClient);
    $results = $this->db->resultSet();
    return $results;
  }

  public function getConsultationsbylawyer($idLawyer)
  {
    $this->db->query('SELECT con.id,cl.id AS "to",cl.fname,cl.lname,cl.photo
                      FROM clients cl ,consultation con
                      WHERE cl.id IN (select c.idClient from consultation c where c.idLawyer = :idLawyer)
                      AND con.idLawyer = :idLawyer
                      AND cl.id = con.idClient');
    $this->db->bind(':idLawyer', $idLawyer);
    $results = $this->db->resultSet();
    return $results;
  }

  public function add($data)
  {
    $this->db->query('INSERT INTO consultation (status,idLawyer, idClient) VALUES(:status,:idLawyer, :idClient)');
    // Bind values
    $this->db->bind(':status', 1);
    $this->db->bind(':idLawyer', $data['to']);
    $this->db->bind(':idClient', $data['from']);

    // Execute
    
    if ($this->db->execute()) {
      return $this->getLastConsultationIdByClientId($data['from']);
    } else {
      return false;
    }
  }

  public function getLastConsultationIdByClientId($idClient)
  {
    $this->db->query('SELECT id FROM consultation WHERE idClient = :idClient ORDER BY id DESC LIMIT 1');
    // Bind value
    $this->db->bind(':idClient', $idClient);

    $row = $this->db->single();
    if (!$row) {
      return false;
    }
    return $row->id;
  }

  public function deleteConsultation($id)
  {
    $this->db->query('DELETE FROM consultation WHERE id = :id');
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
