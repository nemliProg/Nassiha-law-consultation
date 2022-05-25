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

  public function getLawyers()
  {
    $this->db->query('SELECT * 
                      from clients c,lawyers l
                      where c.id = l.id');
    $lawyers = $this->db->resultSet();
    $lawyersMapByIds = [];
    $lawyersIds = [];
    foreach($lawyers as $lawyer){
      $lawyersMapByIds[$lawyer->id] = [...(array)($lawyer), "skills" => []];
      $lawyersMapByIds[$lawyer->id] = [...(array)($lawyer), "languages" => []];
      $lawyersIds[] = $lawyer->id;
    }
    $skills = $this->getSkillsByLawyersIds($lawyersIds);
    $languages = $this->getLanguagesByLawyersIds($lawyersIds);
    foreach($skills as $skill){
      $lawyerId = $skill->idLawyer;
      unset($skill->idLawyer);
      $lawyersMapByIds[$lawyerId]["skills"][] = $skill->skill;
    }
    foreach($languages as $language){
      $lawyerId = $language->idLawyer;
      unset($language->idLawyer);
      $lawyersMapByIds[$lawyerId]["languages"][] = $language->name;
    }
    $result =array_values($lawyersMapByIds); 
    return $result;
  }
  public function getLawyerById($id)
  {
    $this->db->query('SELECT * 
                      from clients c,lawyers l
                      where c.id = l.id
                      and l.id = :id');
    $this->db->bind(':id', $id);
    $lawyer = $this->db->single();
    $lawyersMapByIds = [];
    $lawyersIds = [];
    $lawyersMapByIds = [...(array)($lawyer), "skills" => []];
    $lawyersMapByIds = [...(array)($lawyer), "languages" => []];
    $lawyersIds[] = $lawyer->id;
    $skills = $this->getSkillsByLawyersIds($lawyersIds);
    $languages = $this->getLanguagesByLawyersIds($lawyersIds);
    foreach($skills as $skill){
      unset($skill->idLawyer);
      $lawyersMapByIds["skills"][] = $skill->skill;
    }
    foreach($languages as $language){
      unset($language->idLawyer);
      $lawyersMapByIds["languages"][] = $language->name;
    }
    $result =$lawyersMapByIds; 
    return $result;
  }

  public function getLawyerSkills($id)
  {
    $this->db->query('SELECT * 
                      from skills s,specialised sp
                      where sp.idSkill = s.id
                      and sp.idLawyer = :id');
    $this->db->bind(':id', $id);
    $results = $this->db->resultSet();
    return $results;
  }

  public function getSkillsByLawyersIds($ids)
  {
    $placeholders = implode(",", array_fill(0, count($ids), "?"));
    $query = "select skills.skill, specialised.idLawyer
     from specialised
      left join skills on specialised.idSkill = skills.id where specialised.idLawyer in ($placeholders)
      ";
      $this->db->query($query);
      $this->db->getStmt()->execute($ids);
      $skills = $this->db->resultSet();
      return $skills;
  }

  public function getLanguagesByLawyersIds($ids)
  {
    $placeholders = implode(",", array_fill(0, count($ids), "?"));
    $query = "select languages.name,languages.idLawyer
     from languages
      left join lawyers on languages.idLawyer = lawyers.id where languages.idLawyer in ($placeholders)
      ";
      $this->db->query($query);
      $this->db->getStmt()->execute($ids);
      $languages = $this->db->resultSet();
      return $languages;
  }


  public function ifLawyer($id)
  {
    $this->db->query('SELECT * FROM lawyers WHERE id = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    if ($row) {
      return true;
    }else {
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
