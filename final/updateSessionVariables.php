<?php
session_start();
if(isset($_POST['numplayers'])){
	$_SESSION["numplayers"] = $_POST['numplayers'];
}
if(isset($_POST['playernames'])){
	$_SESSION["playernames"] = $_POST['playernames'];
}
if(isset($_POST['currentplayer'])){
	$_SESSION["currentplayer"] = $_POST['currentplayer'];
}
if(isset($_POST['scores'])){
	$_SESSION["scores"] = $_POST['scores'];
}
if(isset($_POST['history'])){
	$_SESSION["history"] = $_POST['history'];
}
if(isset($_POST['lasthit'])){
	$_SESSION["lasthit"] = $_POST['lasthit'];
}
if(isset($_POST['icons'])){
	$_SESSION["icons"] = $_POST['icons'];
}
if(isset($_POST['randnums'])){
	$_SESSION["randnums"] = $_POST['randnums'];
}
if(isset($_POST['playerhits'])){
	$_SESSION["playerhits"] = $_POST['playerhits'];
}
?>