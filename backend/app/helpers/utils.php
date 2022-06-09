<?php 


function getBody(){
  if (!empty($_POST)) {
    return $_POST;
  }
  return json_decode(file_get_contents("php://input"), true);
}