<?php 
include("connection.php");
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');




        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $query = "SELECT * FROM score ";
            $statement = $pdo->prepare($query);
            $statement->execute();
          
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
          
            $json = json_encode($results);
        
            header('Content-Type: application/json');
            echo json_encode($json);
        }