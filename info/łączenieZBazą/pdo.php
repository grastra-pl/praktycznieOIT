<?php
// Wczytanie danych dostępowych z pliku konfiguracyjnego
$configFile = file_get_contents('config.json');
$config = json_decode($configFile, true);

// Ustalenie połączenia z bazą danych za pomocą PDO
$dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['database'];
$pdo = new PDO($dsn, $config['user'], $config['password']);

// Ustawienie opcji, aby zgłaszać błędy w przypadku problemów z zapytaniami
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Wykonanie zapytania SQL
$query = "SELECT * FROM score";
$result = $pdo->query($query);

// Przetwarzanie wyników
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
}

// Zamknięcie połączenia
$pdo = null;

