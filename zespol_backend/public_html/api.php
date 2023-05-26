<?php
header('Access-Control-Allow-Origin: http://praktyki.42web.io/');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
include('conection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $data = json_decode(file_get_contents('php://input'), true);
    
    if(!$data)
    {
    die("Send error");
    }
    
    if (!is_int($data['raw_value'])) 
    {
    die("Data error");
    }

    $yourValue=$data['raw_value'];
    $myValue=getmyValue($pdo);
    
        if($myValue<$yourValue)
        {
          $ArrayOfValues=array('yourValue'=>$yourValue);
          insertIntoDatabase($pdo,$yourValue);
          die(json_encode($yourValue,true));
        }

        $ArrayOfValues=array('yourValue'=>$yourValue, 'myValue' => $myValue['raw_value']);
        die(json_encode($ArrayOfValues,true));

      function getmyValue($pdo)
      {
      $dbValue= $pdo->query("SELECT MAX(raw_value) FROM task");
      $result= $dbValue->fetch(PDO::FETCH_ASSOC);
      
        if (!$result || $result['raw_value'] === null) 
        {
        die("Pusta baza danych");
        }
        return $result;
      }

      function insertIntoDatabase($pdo,$value)
      {
        $query=$pdo->prepare("INSERT INTO `task` (`id`, `raw_value`, `creation_time`, `modification_time`, `deleted`) VALUES (NULL,". $value ." , '0000-00-00 00:00:00', current_timestamp(), '0');");
        return true;
      }
}
