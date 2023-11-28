<?php

require_once('../config/credentials.php');
require_once('Database.php');

function getRequestUri() {
    $requestUri = $_SERVER['REQUEST_URI'];
    return substr($requestUri, strpos($requestUri, 'api/') + 4);
}

function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  
function createMessage($type, $text, $field = '') {
      $message = json_encode(array('type'=>$type, 'text'=>$text, 'field'=>$field));
      return $message;
}

function logfile($content) {
    $full_log = date("Y-m-d H:i:s ").$content.PHP_EOL;
	file_put_contents('../log.txt', $full_log, FILE_APPEND | LOCK_EX);
}

function throwException($message) {
  logfile($message);
  throw new Exception($message);
}
