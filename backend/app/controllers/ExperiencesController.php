<?php

class ExperiencesController extends Controller
{

  public function __construct()
  {
    $this->experienceModel = $this->model('Experience');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  }

  public function ExperiencesByLawyer()
  {
    $data = [
      'id' => $_POST['idLawyer']
    ];
    $result = $this->experienceModel->getExperiencesByLawyer($data['id']);
    if ($result) {
      echo json_encode($result);
    }
  }


  public function addExperience()
  {
    $data = [
      'bar' => $_POST['bar'],
      '_from' => $_POST['from'],
      '_to' => $_POST['to'],
      'idLawyer' => $_POST['idLawyer'],
      'bar_err' => '',
      'from_err' => '',
      'to_err' => '',
      'idLawyer_err' => ''
    ];

    if (empty($data['bar'])) {
      $data['bar_err'] = 'X';
    }
    if (empty($data['from'])) {
      $data['from_err'] = 'X';
    }
    if (empty($data['to'])) {
      $data['_to_err'] = 'X';
    }
    if (empty($data['idLawyer'])) {
      $data['idLawyer_err'] = 'X';
    }

    if (empty($data['bar_err']) && empty($data['from_err']) && empty($data['to_err']) && empty($data['idLawyer_err'])) {
      if ($this->experienceModel->addExperience($data)) {
        $arr = array(
          'message' => 'Experience Added'
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

  public function updateExperience()
  {
    $data = [
      'bar' => $_POST['bar'],
      '_from' => $_POST['from'],
      '_to' => $_POST['to'],
      'idExperience' => $_POST['idExperience'],
      'bar_err' => '',
      'from_err' => '',
      'to_err' => '',
      'idExperience_err' => ''
    ];

    if (empty($data['bar'])) {
      $data['bar_err'] = 'X';
    }
    if (empty($data['from'])) {
      $data['from_err'] = 'X';
    }
    if (empty($data['to'])) {
      $data['_to_err'] = 'X';
    }
    if (empty($data['idExperience'])) {
      $data['idExperience_err'] = 'X';
    }

    if (empty($data['bar_err']) && empty($data['from_err']) && empty($data['to_err']) && empty($data['idExperience_err'])) {
      if ($this->experienceModel->updateExperience($data)) {
        $arr = array(
          'message' => 'Experience updated'
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

  public function deleteExperience()
  {
    $data = [
      'idExperience' => $_POST['idExperience'],
      'idExperience_err' => ''
    ];

    if (empty($data['idExperience'])) {
      $data['idExperience_err'] = 'X';
    }

    if (empty($data['idExperience_err'])) {
      if ($this->experienceModel->deleteExperience($data['id'])) {
        $arr = array(
          'message' => 'Experience deleted'
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
