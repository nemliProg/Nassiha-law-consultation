<?php

class LanguagesController extends Controller
{

  public function __construct()
  {
    $this->languageModel = $this->model('Language');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  }

  public function getlanguagesByLawyerId($id)
  {
    try {
      $languages = $this->languageModel->getlanguagesByLawyerId($id);
      echo json_encode($languages);
    } catch (\Throwable $th) {
      $arr = array(
        'message' => 'something went wrong'
      );
      echo json_encode($arr);
    } 
  }

  public function addLanguage()
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(array(
        'message' => 'This method is not allowed'
      ));
        die();
    }

    $data = [
      'name' => $_POST['name'],
      'idLawyer' => $_POST['idLawyer'],
      'name_err' => '',
      'idLawyer_err' => '',
    ];
    if (empty($data['name'])) {
      $data['name_err'] = 'X';
    }
    if (empty($data['idLawyer'])) {
      $data['idLawyer_err'] = 'X';
    }
    if (empty($data['name_err']) && empty($data['idLawyer_err'])) {
      if ($this->languageModel->addLanguage($data)) {
        $arr = array(
          'message' => 'language added'
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


  public function deleteLanguage()
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      echo json_encode(array(
        'message' => 'This method is not allowed'
      ));
      die();
    }

    $data = [
      'id' => $_POST['id'],
      'id_err' => $_POST['id']
    ];

    if (empty($data['id'])) {
      $data['id_err'] = 'X';
    }

    if (!empty($data['id_err'])) {
      if ($this->languageModel->deleteLanguage($data['id'])) {
        $arr = array(
          'message' => 'Language deleted'
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
