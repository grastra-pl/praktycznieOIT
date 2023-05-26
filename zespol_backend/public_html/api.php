<?php
include('credentials.php');

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST, "Access-Control-Allow-Credentials" : true ');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $pdo = new PDO($dsn, $user, $password, $options);
    $jsonData = file_get_contents('php://input');
    if (!$jsonData) {
        die("błąd wysyłania");
    }

    $data = json_decode($jsonData, true);

    $yourValue = $data['rawValue'];

    if(!is_int($yourValue)){
        die("wystąpił błąd");
    }

    $myValue = getUserData($pdo,$yourValue);

    if($myValue==$yourValue){
        insertIntoDatabase($pdo, $yourValue);
        $arrayResult = array('yourValue' => $yourValue, 'myValue' => $myValue['raw_value']);
        die(json_encode($arrayResult, true));
    }

    if(!$myValue){
        $arrayResult = array('yourValue' => $yourValue);
        insertIntoDatabase($pdo, $yourValue);
        die(json_encode($yourValue,true));
    }
    
    insertIntoDatabase($pdo, $yourValue);

    $arrayResult = array('yourValue' => $yourValue, 'myValue' => $myValue['raw_value']);
    
    echo(json_encode($arrayResult, true));
}
function getUserData($pdo, $number) {
    $stmt = $pdo->prepare("SELECT raw_value FROM task WHERE raw_value>=? ORDER BY raw_value DESC LIMIT 1");
    $stmt->execute([$number]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function insertIntoDatabase($pdo, $number){
    $stmt = $pdo->prepare("INSERT INTO `task` (`id`, `raw_value`, `creation_time`, `modification_time`, `deleted`) VALUES (NULL, ? , '0', current_timestamp(), '0');");
    $stmt->execute([$number]);
    return true;
}