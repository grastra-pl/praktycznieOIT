<?php
$host = 'localhost';
$db = 'baza';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Tworzenie nowego obiektu PDO dla połączenia z bazą danych
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Ustawienie trybu zgłaszania błędów dla obiektu PDO
    
    $query = $conn->prepare("INSERT INTO `score` (`creation_time`, `modification_time`, `deleted`, `game_id`, `player_id`, `value`) VALUES ('0000-00-00 00:00:00', CURRENT_TIMESTAMP(), 0, 2, 1, 100)");
    // Przygotowanie zapytania SQL do wstawienia nowego rekordu do tabeli "score"
    $query->execute();
    // Wykonanie zapytania SQL
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    // Wyświetlenie komunikatu o błędzie w przypadku nieudanego połączenia z bazą danych
}
