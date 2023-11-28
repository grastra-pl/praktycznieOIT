<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_VALUES = json_decode(file_get_contents('php://input', true));
    $score = $_VALUES->score;

    die(createMessage('ok', 'Odebrano dane:'.$score));
}

function createMessage($type, $text) {
      $message = json_encode(array('type'=>$type, 'text'=>$text));
      return $message;
}


