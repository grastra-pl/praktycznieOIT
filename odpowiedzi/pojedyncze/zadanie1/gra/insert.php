<?php
$host = 'localhost';
$db = 'baza';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $conn->query("SELECT * FROM score");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['creation_time'] . "</td>";
        echo "<td>" . $row['modification_time'] . "</td>";
        echo "<td>" . $row['deleted'] . "</td>";
        echo "<td>" . $row['game_id'] . "</td>";
        echo "<td>" . $row['player_id'] . "</td>";
        echo "<td>" . $row['value'] . "</td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

