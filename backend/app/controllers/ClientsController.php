<?php
class ClientsController extends Controller
{
  public function __construct()
  {
    $this->clientModel = $this->model('Client');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  }
  public function index()
  {
    echo "Hello from clients Controller";
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
      'fname_err' => '',
      'lname_err' => '',
      'photo_err' => '',
      'tel_err' => '',
      'cin_err' => '',
      'email_err' => '',
      'password_err' => ''
    ];
    if (empty($data['fname'])) {
      $data['fname_err'] = 'x';
    }
    if (empty($data['lname'])) {
      $data['lname_err'] = 'x';
    }
    if (empty($data['tel'])) {
      $data['tel_err'] = 'x';
    }

    if (empty($data['photo'])) {
      $data['photo_err'] = 'Please select  your photo';
    }

    if (empty($data['cin'])) {
      $data['cin_err'] = 'x';
    }
    if (empty($data['email'])) {
      $data['email_err'] = 'x';
    }
    if (empty($data['password'])) {
      $data['password_err'] = 'x';
    }
    $imag_name = $data['photo']['name'];
    $imag_size = $data['photo']['size'];
    $tmp_name = $data['photo']['tmp_name'];
    if ($imag_size > 1250000) {
      $data['photo_err'] = "sorry , your file is too large ";
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
        $data['photo_err'] = "you can't upload files of this type ";
      }
    }
    // Make sure no errors
    if (empty($data['photo_err']) && empty($data['fname_err']) && empty($data['lname_err']) && empty($data['tel_err']) && empty($data['cin_err']) && empty($data['email_err']) && empty($data['password_err'])) {
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
        'message' => 'No Data'
      );
      echo json_encode($arr);
    }
  }
}
