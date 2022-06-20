<?php

class DiplomasController extends Controller
{

  public function __construct()
  {
    $this->diplomaModel = $this->model('Diploma');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  }

  

  public function getdiplomasByLawyerId($id)
  {
    try {
      $diplomas = $this->diplomaModel->getdiplomasByLawyerId($id);
      echo json_encode($diplomas);
    } catch (\Throwable $th) {
      $arr = array(
        'message' => 'something went wrong'
      );
      echo json_encode($arr);
    } 
  }

  public function addDiploma()
  {
    $data = [
      'diploma' => $_POST['diploma'],
      'university' => $_POST['university'],
      'idLawyer' => $_POST['idLawyer'],
      'diploma_err' => '',
      'university_err' => '',
      'idLawyer_err' => '',
    ];
    if (empty($data['diploma'])) {
      $data['diploma_err'] = 'X';
    }
    if (empty($data['university'])) {
      $data['university_err'] = 'X';
    }
    if (empty($data['idLawyer'])) {
      $data['idLawyer_err'] = 'X';
    }
    if (empty($data['diploma_err']) && empty($data['university_err']) && empty($data['idLawyer_err'])) {
      if ($this->diplomaModel->addDiploma($data)) {
        $arr = array(
          'message' => 'diploma added'
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


  public function deleteDiploma()
  {
    $data = [
      'id' => $_POST['id'],
      'id_err' => ''
    ];

    if (empty($data['id'])) {
      $data['id_err'] = 'X';
    }

    if (empty($data['id_err'])) {
      if ($this->diplomaModel->deletediploma($data['id'])) {
        $arr = array(
          'message' => 'diploma deleted'
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
