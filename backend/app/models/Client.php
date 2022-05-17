<?php
class Client
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }


  
  // Regsiter user
  public function register($data)
  {
    $this->db->query('INSERT INTO clients (fname,lname,photo,tel,email,cin,password) VALUES(:fname,:lname,:photo,:tel,:email,:cin,:password)');
    // Bind values
    $this->db->bind(':fname', $data['fname']);
    $this->db->bind(':lname', $data['lname']);
    $this->db->bind(':photo', $data['photo']);
    $this->db->bind(':tel', $data['tel']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':cin', $data['cin']);
    $this->db->bind(':password', $data['password']);
    // Execute
    if ($this->db->execute()) {
      return $this->getLastClientIdByEmail($data['email']);
    } else {
      return false;
    }
  }
  // Login User
  public function login($email, $password)
  {
    $this->db->query('SELECT * FROM clients WHERE email = :email');
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    $hashed_password = $row->password;
    if (password_verify($password, $hashed_password)) {
      return $row;
    } else {
      return false;
    }
  }

  // Get User by ID
  public function getClientById($id)
  {
    $this->db->query('SELECT * FROM clients WHERE id = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }
  
  public function getLastClientIdByEmail($email)
  {
    $this->db->query('SELECT id FROM clients where email = :email');
    // Bind value
    $this->db->bind(':email', $email);

    $row = $this->db->single();
    if (is_null($row->id)) {
      return 0;
    } else {
      return $row->id;
    }
  }

  public function getLastClientId()
  {
    $this->db->query('SELECT id FROM clients order by id desc limit 1');
    // Bind value
    $row = $this->db->single();
    if (is_null($row->id)) {
      return 0;
    } else {
      return $row->id;
    }
  }
  


  //Update client 
  public function updateClient($data)
  {
    $this->db->query('UPDATE clients SET fname = :fname,lname = :lname,photo = :photo,tel = :tel  WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':fname', $data['fname']);
    $this->db->bind(':lname', $data['lname']);
    $this->db->bind(':photo', $data['photo']);
    $this->db->bind(':tel', $data['tel']);
    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  //get all clients 
  public function getClients()
  {
    $this->db->query('SELECT * from clients');
    $results = $this->db->resultSet();
    return $results;
  }
  //Delete client 
  public function deleteClient($id)
  {
    $this->db->query('DELETE FROM clients WHERE id = :id');
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
