<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

  class Core {
    protected $currentController = 'LawyersController';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){

      $headers = apache_request_headers();
      
      if (isset($headers['Authorization'])) {
        $token = $headers['Authorization'];
        $token = str_replace('Bearer ', '', $token);
        try {
          $decoded = JWT::decode($token, new Key(JWT_SECRET_KEY, 'HS256'));
        } catch (Exception $e) {
          $ex = array(
            'message' => false
          );
          echo json_encode($ex);
          die();
        }
      }

      $url = $this->getUrl();
      // Look in controllers for first value
      if (isset($url[0])) {
      if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
        unset($url[0]);
      }
      }
      // Require the controller
      require_once '../app/controllers/'. $this->currentController . '.php';

      // Instantiate controller class
      $this->currentController = new $this->currentController;

      // Check for second part of url
      if(isset($url[1])){
        // Check to see if method exists in controller
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
          // Unset 1 index
          unset($url[1]);
        }
      }
      

      // Get params
      $this->params = $url ? array_values($url) : [];

      // Call a callback with array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  } 
  
  