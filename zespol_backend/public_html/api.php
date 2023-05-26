<?php
include ('credentials.php');
try{
    $pdo = new PDO('mysql:host=' + $servername + ';dbname=' + $database_name + ';port=' + $port + ';charset='+$charset+, $username, $password );
    echo('<p>Houston mamy połączenie!</p>');
  }catch(PDOException $e){
    echo('<p>Houston mamy problem! Nie możemy się połączyć!</p>');
    die(); // Nie połączyłeś się? To nie ma co robić nic więcej!
  }