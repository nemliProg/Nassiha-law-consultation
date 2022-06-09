<?php

class SkillsController extends Controller
{

  public function __construct()
  {
    $this->skillModel = $this->model('Skill');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  }

  public function leftSkills($id)
  {
    $result = $this->skillModel->getLeftSkillsByLawyer($id);
    if ($result) {
      echo json_encode($result);
    }
  }


  public function addSkill()
  {
    $data = [
      'idLawyer' => $_POST['idLawyer'],
      'idSkill' => $_POST['idSkill'],
      'idLawyer_err' => '',
      'idSkill_err' => ''
    ];

    if (empty($data['idLawyer'])) {
      $data['idLawyer_err'] = 'X';
    }
    if (empty($data['idSkill'])) {
      $data['idSkill_err'] = 'X';
    }

    if (empty($data['idSkill_err']) && empty($data['idLawyer_err'])) {
      if ($this->skillModel->addSkill($data)) {
        $arr = array(
          'message' => 'Skill Added'
        );
        echo json_encode($arr);
      } else {
        $arr = array(
          'message' => 'something went wrong'
        );
        echo json_encode($arr);
      }
    } else {
      $arr = array(
        'message' => 'incomplete informations'
      );
      echo json_encode($arr);
    }
  }


  public function deleteSkill()
  {
    $data = [
      'idLawyer' => $_POST['idLawyer'],
      'idSkill' => $_POST['idSkill'],
    ];

    if (empty($data['idLawyer'])) {
      $data['idLawyer_err'] = 'X';
    }
    if (empty($data['idSkill'])) {
      $data['idSkill_err'] = 'X';
    }

    if (empty($data['idSkill_err']) && empty($data['idLawyer_err'])) {
      if ($this->skillModel->deleteSkill($data['idLawyer'], $data['idSkill'])) {
        $arr = array(
          'message' => 'Skill deleted'
        );
        echo json_encode($arr);
      } else {
        $arr = array(
          'message' => 'something went wrong'
        );
        echo json_encode($arr);
      }
    } else {
      $arr = array(
        'message' => 'incomplete information'
      );
      echo json_encode($arr);
    }
  }
}
