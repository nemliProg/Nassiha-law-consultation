<?php

class MessageConroller extends Controller
{

  public function __construct()
  {
    $this->messageModel = $this->model('Message');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  }

  public function addMessage()
  {
    $data = [
      'read' => false,
      'content' => $_POST['content'],
      'from' => $_POST['from'],
      'to' => $_POST['to'],
      'idConsultation' => $_POST['idConsultation'],
      'content_err' => '',
      'from_err' => '',
      'to_err' => '',
      'idConsultation_err' => '',
    ];
    if (empty($data['content'])) {
      $data['content_err'] = 'X';
    }
    if (empty($data['from'])) {
      $data['from_err'] = 'X';
    }
    if (empty($data['to'])) {
      $data['to_err'] = 'X';
    }
    if (empty($data['idConsultation'])) {
      $data['idConsultation_err'] = 'X';
    }
    if (empty($data['content_err']) && empty($data['from_err']) && empty($data['to_err']) && empty($data['idConsultation_err'])) {
      if ($this->messageModel->addMessage($data)) {
        $arr = array(
          'message' => 'message created'
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
