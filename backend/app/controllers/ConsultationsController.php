<?php
class ConsultationsController extends Controller
{
  public function __construct()
  {
    $this->consultationModel = $this->model('Consultation');
    $this->messageModel = $this->model('Message');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  }

  public function add()
  {
    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');
    
    $data = [
      'content' => $_POST['content'],
      'to' => $_POST['idLawyer'],
      'from' => $_POST['idClient'],
      'idConsultation' => null
    ];

    if (!empty($data['to']) && !empty($data['from'])) {
      $data['idConsultation'] = $this->consultationModel->add($data);
      if ($data['idConsultation']) {
        if ($this->messageModel->addMessage($data)) {
          $msg = 'message added successfully';
        } else {
          $msg = 'Error adding message';
        }
        $arr = array(
          'message' => 'Consultation created'. " and " . $msg ,
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

  public function getConsultationsbyclient($id)
  {
    if (!empty($id)) {
      $consultations = $this->consultationModel->getConsultationsbyclient($id);
      echo json_encode($consultations);
    } else {
      $arr = array(
        'message' => 'incomplete information'
      );
      echo json_encode($arr);
    }
  }
  
  public function getConsultationsbylawyer($id)
  {
    if (!empty($id)) {
      $consultations = $this->consultationModel->getConsultationsbylawyer($id);
      echo json_encode($consultations);
    } else {
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
