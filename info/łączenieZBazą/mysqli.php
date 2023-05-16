<?php
// Wczytanie danych dostępowych z pliku konfiguracyjnego
$configFile = file_get_contents('config.json');
$config = json_decode($configFile, true);

// Ustalenie połączenia z bazą danych
$mysqli = new mysqli($config['host'], $config['user'], $config['password'], $config['database']);

// Sprawdzenie czy udało się nawiązać połączenie
if ($mysqli->connect_error) {
    die('Błąd połączenia z bazą danych: ' . $mysqli->connect_error);
}

// Wykonanie zapytania SQL
$query = "SELECT * FROM score";
$result = $mysqli->query($query);

// Sprawdzenie czy zapytanie zostało wykonane poprawnie
if (!$result) {
    die('Błąd zapytania: ' . $mysqli->error);
}

// Przetwarzanie wyników
while ($row = $result->fetch_assoc()) {
    print_r($row);
}

// Zamknięcie połączenia
$mysqli->close();