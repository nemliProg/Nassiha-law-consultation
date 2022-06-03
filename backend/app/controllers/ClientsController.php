<?php

use \Firebase\JWT\JWT;

class ClientsController extends Controller
{
  public function __construct()
  {
    $this->clientModel = $this->model('Client');
    $this->lawyerModel = $this->model('Lawyer');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  }

  public function getClient($id)
  {
    $result = $this->clientModel->getClientById($id);
    if ($result) {
      echo json_encode($result);
    }
  }

  public function login()
  {
    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'err' => ''
      ];
      if (empty($data['email'])) {
        $data['err'] = 'email is required';
        $arr = array(
          'message' => $data['err']
        );
        echo json_encode($arr);
        die();
      }
      if (empty($data['password'])) {
        $data['err'] = 'password is required';
        $arr = array(
          'message' => $data['err']
        );
        echo json_encode($arr);
        die();
      }

      if (empty($data['email_err']) && empty($data['password_err'])) {
        $row = $this->clientModel->login($data['email'], $data['password']);
        if ($row) {
          $ifLawyer = $this->lawyerModel->ifLawyer($row->id);
          $iss = "localhost";
          $iat = time();
          $nbf = $iat + 10;
          $exp = $iat + 432000;
          $aud = ($ifLawyer) ? "MyLawyers" : "Myclients";
          $client_data = array(
            "id" => $row->id,
            "fname" => $row->fname,
            "lname" => $row->lname,
            "email" => $row->email,
            "lawyer" => $ifLawyer
          );
          $payload_info = array(
            "iss" => $iss,
            "iat" => $iat,
            "nbf" => $nbf,
            "exp" => $exp,
            "aud" => $aud,
            "data" => $client_data
          );

          $algorithm = "HS256";
          $jwt = JWT::encode($payload_info, JWT_SECRET_KEY, $algorithm);
          $arr = array(
            'message' => 'You are logged in',
            'jwt' => $jwt,
            'role' => $ifLawyer ? "lawyer" : "client",
            'id' => $row->id
          );
          echo json_encode($arr);
        } else {
          $arr = array(
            'message' => 'information is incorecct'
          );
          echo json_encode($arr);
        }
      }
    }
  }

  public function register()
  {
    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');
    $data = [
      'fname' => $_POST["fname"],
      'lname' => $_POST["lname"],
      'photo' => $_FILES['photo'],
      'tel' => $_POST["tel"],
      'cin' => $_POST["cin"],
      'email' => $_POST["email"],
      'password' => $_POST["password"],
      'err' => '',
    ];
    if (empty($data['fname'])) {
      $data['err'] = 'First name is required';
      $arr = array(
        'message' => $data['err']
      );
      echo json_encode($arr);
      die();
    }
    if (empty($data['lname'])) {
      $data['err'] = 'last name is required';
      $arr = array(
        'message' => $data['err']
      );
      echo json_encode($arr);
      die();
    }
    if (empty($data['tel'])) {
      $data['err'] = 'telephone is required';
      $arr = array(
        'message' => $data['err']
      );
      echo json_encode($arr);
      die();
    }

    if (empty($data['photo'])) {
      $data['err'] = 'Please select  your photo';
      $arr = array(
        'message' => $data['err']
      );
      echo json_encode($arr);
      die();
    }

    if (empty($data['cin'])) {
      $data['err'] = 'cin is required';
      $arr = array(
        'message' => $data['err']
      );
      echo json_encode($arr);
      die();
    }
    if (empty($data['email'])) {
      $data['err'] = 'email is required';
      $arr = array(
        'message' => $data['err']
      );
      echo json_encode($arr);
      die();
    }
    if (empty($data['password'])) {
      $data['err'] = 'password is required';
      $arr = array(
        'message' => $data['err']
      );
      echo json_encode($arr);
      die();
    }
    $imag_name = $data['photo']['name'];
    $imag_size = $data['photo']['size'];
    $tmp_name = $data['photo']['tmp_name'];
    if ($imag_size > 99999999999999) {
      $data['err'] = "sorry , your file is too large ";
      $arr = array(
        'message' => $data['err']
      );
      echo json_encode($arr);
      die();
    } else {
      $img_ex = pathinfo($imag_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);
      $allowed_exs = array("jpg", "jpeg", "png");
      if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $img_upload_path = "img/$new_img_name";
        move_uploaded_file($tmp_name, $img_upload_path);
        $data['photo'] = URLROOT . "/img/$new_img_name";
      } else {
        $data['err'] = "you can't upload files of this type ";
        $arr = array(
          'message' => $data['err']
        );
        echo json_encode($arr);
        die();
      }
    }
    // Make sure no errors
    if (empty($data['err'])) {
      // Validated
      if ($this->clientModel->register($data)) {
        $arr = array(
          'message' => 'Client Added'
        );
        echo json_encode($arr);
      } else {
        $arr = array(
          'message' => 'Something went wrong'
        );
        echo json_encode($arr);
      }
    } else {
      $arr = array(
        'message' => $data['err']
      );
      echo json_encode($arr);
    }
  }
}
