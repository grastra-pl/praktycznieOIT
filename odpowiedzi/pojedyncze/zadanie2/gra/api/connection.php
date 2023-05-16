<?php
$mysql_host = 'localhost'; //tutaj jest localhost ale może być adres do bazy danych
$port = '3306'; // domyślny numer portu
$username = 'root';
$password = '';
$database = 'database1';

try{
    $pdo = new PDO('mysql:host=' . $mysql_host . ';dbname=' . $database . ';port=' . $port . ";charset=utf8", $username, $password );

  }catch(PDOException $e){die();}