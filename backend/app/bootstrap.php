<?php
  // Load Config
  require_once 'config/config.php';
  require_once 'helpers/index.php';
  // vendor Load
  require_once '../vendor/autoload.php';
  // Autoload Core Libraries
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });
  
