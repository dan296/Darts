<?php 
$sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode'";
$result = $mysqli->query($sql);
$results = NULL;
while($results[] = $result->fetch_array());
echo json_encode($results);	
?>