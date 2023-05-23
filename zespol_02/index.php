<?php
if (isset($_POST['id'])) {
    $dsn = 'mysql:host=localhost;dbname=database';
    $username = 'username';
    $password = 'password';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Przygotowanie i wykonanie zapytania SQL
        $query = "SELECT :id * 2 AS result";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $_POST['id']);
        $stmt->execute();

        // Pobranie wyniku zapytania
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Zwrócenie wyniku jako odpowiedź
        echo $result['result'];
    } catch (PDOException $e) {
        echo 'Wystąpił błąd: ' . $e->getMessage();
    }
} else {
    echo 'Brak przesłanej zmiennej "id".';
}