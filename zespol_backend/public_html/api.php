<?php
include('credentials.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $pdo = new PDO($dsn, $user, $password);
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
    if(!$myValue){
        $arrayResult = array('yourValue' => $yourValue);
        echo(json_encode($yourValue));
    }

    $arrayResult = array('yourValue' => $yourValue, 'myValue' => $myValue);
    echo(json_encode($arrayResult));
}
function getUserData($pdo, $number) {
    $stmt = $pdo->prepare("SELECT raw_value FROM user WHERE raw_value>=? ORDER BY raw_value DESC LIMIT 1");
    $stmt->execute([$number]);
    return $stmt->fetch();
}