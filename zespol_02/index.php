<?php
$jsonData = file_get_contents('php://input');
if ($jsonData) {
    
    $data = json_decode($jsonData, true);

    $id = $data['id'];

    $result = $id * 2;
    echo(is_int($id));
    echo $result;
}
