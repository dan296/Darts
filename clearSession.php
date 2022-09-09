<?php
session_start();
if($_POST['clearing']){
    	if(isset($_SESSION['numplayers'])){
	unset($_SESSION["numplayers"]);
}
if(isset($_SESSION['playernames'])){
	unset($_SESSION["playernames"]);
}
if(isset($_SESSION['currentplayer'])){
	unset($_SESSION["currentplayer"]);
}
if(isset($_SESSION['scores'])){
	unset($_SESSION["scores"]);
}
if(isset($_SESSION['history'])){
	unset($_SESSION["history"]);
}
if(isset($_SESSION['lasthit'])){
	unset($_SESSION["lasthit"]);
}
if(isset($_SESSION['icons'])){
	unset($_SESSION["icons"]);
}
if(isset($_SESSION['randnums'])){
	unset($_SESSION["randnums"]);
}
if(isset($_SESSION['playerhits'])){
	unset($_SESSION["playerhits"]);
}
if(isset($_SESSION['new'])){
	unset($_SESSION["new"]);
}
    echo TRUE;
}


?>