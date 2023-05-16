<?php
$host = 'localhost';
$db = 'baza';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $lastId = $_POST['lastId'];
    $query = $conn->prepare("INSERT INTO `score` (`id`, `creation_time`, `modification_time`, `deleted`, `game_id`, `player_id`, `value`) VALUES (:lastId, '0000-00-00 00:00:00', CURRENT_TIMESTAMP(), 0, 2, 1, 100)");
    $query->bindParam(':lastId', $lastId);
    $query->execute();

    echo "Success";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
