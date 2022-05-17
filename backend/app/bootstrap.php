<?php
  // Load Config
  require_once 'config/config.php';
  // vendor Load
  require_once '../vendor/autoload.php';
  // Autoload Core Libraries
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });
  
