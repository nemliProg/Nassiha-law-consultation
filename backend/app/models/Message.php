<?php

class Message extends Database {
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function addMessage($data)
  {
    $this->db->query('INSERT INTO messages (_read,content,_from,_to,idConsultation) VALUES(:_read,:content,:_from,:_to,:idConsultation)');
    // Bind values
    $this->db->bind(':_read', $data['read']);
    $this->db->bind(':content', $data['content']);
    $this->db->bind(':_from', $data['from']);
    $this->db->bind(':_to', $data['to']);
    $this->db->bind(':idConsultation', $data['idConsultation']);
  
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function updateMessage($data)
  {
    $this->db->query('UPDATE messages SET  content = :content WHERE id = :id');
    // Bind values
    $this->db->bind(':content', $data['content']);
    $this->db->bind(':id', $data['id']);

  
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  
  public function deleteMessage($id)
  {
    $this->db->query('DELETE FROM messages WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $id);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}