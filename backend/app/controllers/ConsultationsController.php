<?php
class ConsultationsController extends Controller
{
  public function __construct()
  {
    $this->consultationModel = $this->model('Consultation');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  }

  public function add()
  {
    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');
    
    $data = [
      'idLawyer' => $_POST['idLawyer'],
      'idClient' => $_POST['idClient'],
    ];

    if (!empty($data['idLawyer']) && !empty($data['idClient'])) {
      if ($this->consultationModel->add($data)) {
        $arr = array(
          'message' => 'Consultation created'
        );
        echo json_encode($arr);
      }else {
        $arr = array(
          'message' => 'something went wrong'
        );
        echo json_encode($arr);
      }
    }else {
      $arr = array(
        'message' => 'incomplete information'
      );
      echo json_encode($arr);
    }

  }

  public function updateConsultationToFalse()
  {
    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');
    
    $data = [
      'idConsultation' => $_POST['idConsultation'],
    ];

    if (!empty($data['idConsultation'])) {
      if ($this->consultationModel->updateConsultationStatusToFalse($data["idConsultation"])) {
        $arr = array(
          'message' => 'Consultation Updated To False'
        );
        echo json_encode($arr);
      }else {
        $arr = array(
          'message' => 'something went wrong'
        );
        echo json_encode($arr);
      }
    }else {
      $arr = array(
        'message' => 'incomplete information'
      );
      echo json_encode($arr);
    }
  }
}
