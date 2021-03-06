<?php 
  ob_start(); // output buffering is turned on

  session_start(); // turn on sessions

//echo dirname(__FILE__);
  //constant
  define("SITE_URL",dirname(__FILE__));
  //echo SITE_URL;
  define("SHARED_PATH",dirname(__FILE__).'/includes_admin');
  // echo SHARED_PATH;
  //echo $_SERVER['SCRIPT_NAME'];

  //url path
  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 4;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);

  define("WWW_ROOT", $doc_root);

  //move 1 up

  //echo '..' . $doc_root;

  require_once('includes_admin/functions.php');
  require_once('includes_admin/database.php');
  require_once('includes_admin/query_functions.php');
  require_once('includes_admin/validation_functions.php');
  require_once('includes_admin/auth_functions.php');


  date_default_timezone_set('Asia/Taipei');
  $db = db_connect(); 
  $errors = [];
?>