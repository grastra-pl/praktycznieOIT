<?php 
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');
 $conn=mysqli_connect("localhost","root","","database1");
 $query= mysqli_query($conn,"SELECT max(id) as 'last_id' FROM score");
 $row = mysqli_fetch_array($query);
 $lastId = $row['last_id'];
 $lastId+=1;
 $result = mysqli_query($conn, "INSERT INTO `score` (`id`, `creation_time`, `modification_time`, `deleted`, `game_id`, `player_id`, `value`) VALUES ('$lastId',  '0000-00-00 00:00:00', CURRENT_TIMESTAMP(), 0, 2, 1, -100);");
 mysqli_close($conn);

?>    
