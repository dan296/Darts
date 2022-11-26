<?php 
session_start();
$file = "mysqlstatus.log";
$handle = fopen($file, 'a');
$gamecode = $_POST['gamecode'];

include('../../includes/mysqli.dat');

if(isset($_POST['submitting'])){
	$player = $_POST['name'];
	$_SESSION['name'] = $player;

	// Fetching Avatar
	$avatar = "";
	if(isset($_SESSION['avatar'])){
		if($_SESSION['avatar'] == 1){
			$email = $_SESSION['email'];
			$sql = "SELECT `avatar` FROM `accounts` WHERE `email` = '$email'";
			$result = $mysqli->query($sql)->fetch_array();
			fwrite($handle, $mysqli->error);
			$avatar = $result[0];
		}
	}

	//FISHBOWL VARS:
	if($gamename == 'fishbowl'){
		$numgames = 0;
		$numwords = 0;
		$team1 = '';
		$team2 = '';
		$random = 0;
	}

	$sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode'";
	$result = $mysqli->query($sql);
	$results = NULL;
	while($results[] = $result->fetch_array());
	//$numplayers = count($results) - 1;
	if($results[0] != NULL){
		$numgames = $results[0]['num_game'];
		//if($gamename == 'fishbowl-update' || $gamename == 'mouthful-update'){
		if(isset($results[0]['num_words'])){
	        $numwords = $results[0]['num_words'];
	    }
	    if(isset($results[0]['deck'])){
        	$deck = $results[0]['deck'];
        }
        $team1 = $results[0]['team1'];
        $team2 = $results[0]['team2'];
        $random = $results[0]['random'];
        $skip = 0;
        if(isset($results[0]['skip'])){
        	$skip = $results[0]['skip'];
        }
        //checking if name is taken
        /*for($x = 0; $x < count($results); $x++){
        	if($results[$x] == $player){
				echo "!name+taken";
				return;
        	}
        }*/
		//}
	}else{
		$numgames = 0;
	}
	if($gamename == 'fishbowl'){
		$sql = "INSERT INTO `$gamename`(`game_code`, `name`, `num_words`, `team1`, `team2`, `random`, `skip`, `num_game`, `timer_time`) VALUES ('$gamecode',  '$player', '$numwords', '$team1', '$team2', '$random', '$skip', '$numgames', 60)";
		$mysqli->query($sql);
		fwrite($handle, $mysqli->error);
	}elseif($gamename == 'mouthful' || $gamename == 'gridlock'){
		$sql = "INSERT INTO `$gamename`(`game_code`, `name`, `deck`, `team`, `team1`, `team2`, `random`,  `num_game`) VALUES ('$gamecode',  '$player', '$deck', '', '$team1', '$team2', '$random', '$numgames')";
		$mysqli->query($sql);
		fwrite($handle, $mysqli->error);
	}elseif($gamename == 'puzzle'){
		$sql = "INSERT INTO `$gamename`(`game_code`, `name`, `team1`, `team2`, `random`,  `num_game`) VALUES ('$gamecode', '$player', '$team1', '$team2', '$random', '$numgames')";
		$mysqli->query($sql);
		fwrite($handle, $mysqli->error);
	}else{
		$sql = "INSERT INTO `$gamename`(`game_code`, `name`, `num_game`,`avatar`) VALUES ('$gamecode',  '$player', '$numgames', '$avatar')";
	    $mysqli->query($sql);
	    fwrite($handle, $mysqli->error);
	}
	
} else if (isset($_POST['deleting'])){
	$player = $_POST['name'];
	if(isset($_SESSION['name'])){
	    if($player == $_SESSION['name']){
	        unset($_SESSION['name']);
	    }
	}
	$sql = "DELETE FROM `$gamename` WHERE `game_code` = '$gamecode' AND `name` = '$player'";
	$result = $mysqli->query($sql);
}

 if(isset($_POST['assigning_roles'])){
 	$sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode'";
	$result = $mysqli->query($sql);
	$results = NULL;
	while($results[] = $result->fetch_array());
	$numgame = $results[0]['num_game'] + 1;
    $roles=json_decode($_POST['roles']);

    //Couch setup
    if($gamename == 'couch'){
    	$players = array();
	    $teams=json_decode($_POST['teams']);
    	for ($x = 0; $x < count($roles); $x++) {
	        $players[$x] = $results[$x]['name'];
		}
	     
	    $counter = 0;
	    for($i = 0; $i < count($roles); $i++){
	        if($roles[$i] == $players[$i]){
	            shuffle($roles);
	            $i = -1;
	        }
	        $counter = $counter + 1;
	        if ($counter == 10000){
	             break;
	        }
	    }
    }
    
    // Fam Secret Setup:
    $father = "The Father is ";
	$son = "The Son is ";
	for ($x = 0; $x <= count($roles)-1; $x++) {
		$role = $roles[$x];
		if($role == "Father"){
		    $father .= "<b>".$results[$x]['name']."<b>";
		} elseif($role == "Son"){
		    $son .= "<b>".$results[$x]['name']."<b>";
		}
	}
 	// Pindrop Place Setup:
 	if(isset($_POST["places"])){
 		$places = $_POST["places"];
 	}
 	if(isset($_POST["time"])){
 		$time = $_POST["time"];
 	}
 	if(isset($_POST["firstup"])){
 		$firstup = $_POST["firstup"];
 	}


    for ($x = 0; $x <= count($roles)-1; $x++) {
    	$secret = "";
        $role = $roles[$x];
        $assignedTo = $results[$x]['player'];
        if($gamename == 'ghost'){ //change to ghost when updated
        	$gameword = "";
	        if($role == "Living"){
	            $gameword = $_POST["gameword"];
	        }
	        $sql = "UPDATE `$gamename` SET `game_word`='$gameword' WHERE `game_code` = '$gamecode' AND `player` = '$assignedTo'";
    		$mysqli->query($sql);
 		}elseif($gamename == 'couch'){
 			$team = "";
	        if($_POST['random']){
	            $team = $teams[$x];
	        }
	        $sql = "UPDATE `$gamename` SET `team`='$team' WHERE `game_code` = '$gamecode' AND `player` = '$assignedTo'";
	    	$mysqli->query($sql);
 		}elseif($gamename == 'fam'){ //change to fam when updated
 			if($role == "Godfather" || $role == "Grandfather"){
	            if(rand(0,1) == 0){
	                $secret = $son;
	            }else{
	                $secret = $father;
	            }
	        }
	        $sql = "UPDATE `$gamename` SET `secret`='$secret' WHERE `game_code` = '$gamecode' AND `player` = '$assignedTo'";
	    	$mysqli->query($sql);
 		}elseif($gamename == 'pindrop'){ //change to pindrop when updated
 			$place = $_POST["place"];
	        if($role == "Lost"){
	            $place = "";
	        }
	        $sql = "UPDATE `$gamename` SET `place`='$place', `places`='$places',`time`='$time', `first_up`='$firstup' WHERE `game_code` = '$gamecode' AND `player` = '$assignedTo'";
	    	$mysqli->query($sql);
 		}
 		$sql = "UPDATE `$gamename` SET `player_role`='$role',`num_game`='$numgame' WHERE `game_code` = '$gamecode' AND `player` = '$assignedTo'";
	    $mysqli->query($sql);
    }
 	    
 }

if(isset($_POST['setting_up'])){
    $sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode'";
	$result = $mysqli->query($sql);
	$results = NULL;
	while($results[] = $result->fetch_array());
	$numgame = $results[0]['num_game'] + 1;
	if(isset($_POST['deck'])){
		$deck = $_POST["deck"];
	}
	if(isset($_POST['num_words'])){
		$numwords = $_POST["num_words"];
	}
	if(isset($_POST['rounds'])){
		$rounds = $_POST["rounds"];
	}
    $random = $_POST['random'];
    if(isset($_POST['skip'])){
		$skip = $_POST["skip"];
	}
    $team1 = $_POST['team1'];
    $team2 = $_POST['team2'];
    if($gamename == 'fishbowl'){
    	$sql = "UPDATE `$gamename` SET `words`='', `num_words`='$numwords', `round`=0, `trash`='', `player_up`='', `player_score`= 0, `team_score`=0, `member1`=0, `member2`=0, `skip`='$skip' WHERE `game_code` = '$gamecode'";
		$mysqli->query($sql);
    }elseif($gamename == 'mouthful' || $gamename == 'gridlock'){
    	$sql = "UPDATE `$gamename` SET `deck`='$deck' WHERE `game_code` = '$gamecode'";
		$mysqli->query($sql);
    }elseif($gamename == 'puzzle'){
    	$sql = "UPDATE `$gamename` SET `rounds`='$rounds', `steps`='',`instructions`='',`information`='',`question`='',`answer`='',`points`=0,`current_round`=0,`attempts`=0 WHERE `game_code` = '$gamecode'";
	    $mysqli->query($sql);
	    fwrite($handle, $mysqli->error);
    }

    if($gamename =='gridlock'){
    	$sql = "UPDATE `$gamename` SET `board`='', `colboard`='', `grid`='', `grid_colors`='', `grid_clicked`='', `double_agent`='', `count1`='', `count2`='', `scores`='', `team1_array`='', `team2_array`='', `member1`='', `member2`='', `scores1`='', `scores2`='', `round` = '', `currentplayer` = '' WHERE `game_code` = '$gamecode'";
	$mysqli->query($sql);
	fwrite($handle, $mysqli->error); 
    }

    if(isset($_POST['maintain_teams']) && $_POST['maintain_teams']){
    	$sql = "UPDATE `$gamename` SET `random`='$random', `team1`='$team1', `team2`='$team2', `num_game` = '$numgame' WHERE `game_code` = '$gamecode'";
		$mysqli->query($sql);
    }else{
    	$sql = "UPDATE `$gamename` SET `team`='', `random`='$random', `team1`='$team1', `team2`='$team2', `num_game` = '$numgame' WHERE `game_code` = '$gamecode'";
		$mysqli->query($sql);
    }
    
}
     
if(isset($_POST['submitting_words'])){
	$player = $_POST['name'];
    $words = json_decode($_POST['words']);
    $team = "";
    if(!$_POST['random']){
        $team = $_POST['team'];
    }
    $allwords = "";
    for ($x = 0; $x < count($words); $x++) {
        $allwords .= $words[$x]."~";
	}
    $sql = "UPDATE `$gamename` SET `team`='$team',`words`='$allwords', round=0, `trash`='', `player_up`='', `player_score`= 0, `team_score`=0, `member1`=0, `member2`=0 WHERE `game_code` = '$gamecode' AND `name` = '$player'";
	$mysqli->query($sql);
}

if(isset($_POST['submitting_teams'])){
    $sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode'";
	$result = $mysqli->query($sql);
	$results = NULL;
	while($results[] = $result->fetch_array());
	$deck = $results[0]['deck'];
	$rounds = 0;
	if(isset($results[0]['rounds'])){
		$rounds = $results[0]['rounds'];
	}
	$player = $_POST['name'];
    $team = "";
    if(!$_POST['random']){
        $team = $_POST['team'];
    }

    if($gamename == 'puzzle'){
    	$sql = "UPDATE `$gamename` SET `steps` = '', `instructions` = '', `information` = '', `question` = '', `answer` = '', `points`=0, `current_round` = 0, `attempts` = '', `rounds`='$rounds' WHERE `game_code` = '$gamecode'";
		$mysqli->query($sql);
		fwrite($handle, $mysqli->error);
    }else{
    	$sql = "UPDATE `$gamename` SET `deck`='$deck' WHERE `game_code` = '$gamecode'";
	    $mysqli->query($sql);
    }

    $sql = "UPDATE `$gamename` SET `team`='$team' WHERE `game_code` = '$gamecode' AND `name` = '$player'";
	    $mysqli->query($sql);

    if($_POST["random"] && $gamename == "puzzle"){
    	$numberOfPlayers = count($results) - 1;
    	$teamsArray = array();
    	$whichTeamHasMore = rand(1,2);
    	$moreTeam = $results[0]['team1'];
    	$lessTeam = $results[0]['team2'];
    	if($whichTeamHasMore == 2){
    		$moreTeam = $results[0]['team2'];
    		$lessTeam = $results[0]['team1'];
    	}
    	for ($x = 0; $x < $numberOfPlayers; $x++) {
    		if($x < ceil($numberOfPlayers/2)){
    			$teamsArray[$x] = $moreTeam;
    		}else{
    			$teamsArray[$x] = $lessTeam;
    		}
		}
		shuffle($teamsArray);
		for ($x = 0; $x < $numberOfPlayers; $x++) {
			$thisplayer = $results[$x]['name'];
			$thisteam = $teamsArray[$x];
			$sql = "UPDATE `$gamename` SET `team`='$thisteam' WHERE `game_code` = '$gamecode' AND `name` = '$thisplayer'";
	    	$mysqli->query($sql);
		}
    }
 }

 if(isset($_POST['submitting_teams_random'])){
 	$sql = "SELECT `team1`, `team2` FROM `$gamename` WHERE `game_code` = '$gamecode'";
	$result = $mysqli->query($sql);
	$results = NULL;
	while($results[] = $result->fetch_array());
	$teamname1 = $results[0]['team1'];
	$teamname2 = $results[0]['team2'];
    $teammembers1 = $_POST["teammembers1"];
    $teammembers2 = $_POST["teammembers2"];
    $teammembers1_array = json_decode($teammembers1);
    $teammembers2_array = json_decode($teammembers2);

    for($i = 0; $i < count($teammembers1_array); $i++){
    	$sql = "UPDATE `$gamename` SET `team` = '$teamname1' WHERE `game_code` = '$gamecode' AND `name` = '$teammembers1_array[$i]'";
		$mysqli->query($sql);
		fwrite($handle, $mysqli->error);
    }
    for($i = 0; $i < count($teammembers2_array); $i++){
    	$sql = "UPDATE `$gamename` SET `team` = '$teamname2' WHERE `game_code` = '$gamecode' AND `name` = '$teammembers2_array[$i]'";
		$mysqli->query($sql);
		fwrite($handle, $mysqli->error);
    }

    $sql = "UPDATE `$gamename` SET `team1_array` = '$teammembers1',`team2_array` = '$teammembers2' WHERE `game_code` = '$gamecode'";
		$mysqli->query($sql);
		fwrite($handle, $mysqli->error);


    $sql = "UPDATE `$gamename` SET `team`='$team' WHERE `game_code` = '$gamecode' AND `name` = '$player'";
	    $mysqli->query($sql);
 }

 if(isset($_POST['changing_deck'])){
    $deck = $_POST["deck"];
    $sql = "UPDATE `$gamename` SET `deck`='$deck' WHERE `game_code` = '$gamecode'";
	    $mysqli->query($sql);
}

if(isset($_POST['changing_rounds'])){
    $rounds = $_POST["rounds"];
    $sql = "UPDATE `$gamename` SET `rounds`='$rounds' WHERE `game_code` = '$gamecode'";
	    $mysqli->query($sql);
	    fwrite($handle, $mysqli->error);
}

if(isset($_POST['starting_game'])){
    $sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode'";
	$result = $mysqli->query($sql);
	$results = NULL;
	while($results[] = $result->fetch_array());
	$numgame = $results[0]['num_game'];
	if($_POST['playing']){
	    $numgame = $numgame + 1;
	}
	
	$random = $results[0]['random'];
	if($random == 1){
	    $team1 = $results[0]['team1'];
	    $team2 = $results[0]['team2'];
	    $teams = array($team1, $team2);
	    $finalteams = array();
	    for($i = 0; $i < count($results); $i++){
	        if(($i == count($results) - 1) && ($i%2 == 0)){
	            $thisteam = $teams[array_rand($teams)];
	        }elseif($i%2 == 0){
	            $thisteam = $team1;
	        }else{
	            $thisteam = $team2;
	        }
	        array_push($finalteams, $thisteam);
	    }
	    shuffle($finalteams);
	    for($i = 0; $i < count($results); $i++){
	        $assigned_team = $finalteams[$i];
	        $thisplayer = $results[$i]['name'];
	        $sql = "UPDATE `$gamename` SET `team` = '$assigned_team' WHERE `game_code` = '$gamecode' AND `name` = '$thisplayer'";
	        $mysqli->query($sql);
	        fwrite($handle, $mysqli->error);
	    }
	}
    $sql = "UPDATE `$gamename` SET `num_game` = '$numgame', `steps` = '', `instructions` = '', `information` = '', `question` = '', `answer` = '', `points`=0, `current_round` = 0, `attempts` = '' WHERE `game_code` = '$gamecode'";
	$mysqli->query($sql);
	fwrite($handle, $mysqli->error);
}

if(isset($_POST['puzzling'])){
    //$instructions = json_decode(stripslashes($_POST['instructions']));
    //$information = json_decode(stripslashes($_POST['information']));
    $instructions = json_decode($_POST['instructions']);
    $information = json_decode($_POST['information']);
	$steps = json_decode($_POST['steps']);
	$team = $_POST['team'];
    $sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode' AND `team` = '$team'";
	$result = $mysqli->query($sql);
	$results = NULL;
	while($results[] = $result->fetch_array());
	$current_round = $results[0]['current_round'] + 1;
	$puzzle = $_POST['puzzle'];
	$question = $puzzle["question"];
	$answer = $puzzle["answer"];
	$attempts = count($puzzle) - 2;
	$players = json_decode($_POST['players']);
	$count = count($players);
	for($i = 0; $i < $count; $i++){

	    $player = $players[$i];
		$thisinst = $instructions[$i];
		$thisinfo = $information[$i];
		$thisstep = $steps[$i];
		
		$sql = "UPDATE `$gamename` SET `steps` = '$thisstep', `instructions` = '$thisinst', `information` = '$thisinfo', `question` = '$question', `answer` = '$answer', `current_round` = '$current_round', `attempts` = '$attempts' WHERE `game_code` = '$gamecode' AND `name` = '$player'";
		$mysqli->query($sql);
		fwrite($handle, $mysqli->error);
	}
}

if(isset($_POST['answering'])){
    $submitted_answer = $_POST['submitted_answer'];
    $correct_answer = $_POST['correct_answer'];
    $team = $_POST['team'];
    $sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode' AND `team` = '$team'";
	$result = $mysqli->query($sql);
	$results = NULL;
	while($results[] = $result->fetch_array());
	$points = $results[0]['points'];
	$attempts = $results[0]['attempts'];
	$current_round = $results[0]['current_round'];
    if(strtolower($submitted_answer) == strtolower($correct_answer)){
        $points = $points + $attempts;
        //$current_round = $current_round + 1;
    } else {
        $attempts = $attempts - 1;
        if($attempts == 0){
            $current_round = $current_round + 1;
            $points = $points - 1;
        }
    }
    $sql = "UPDATE `$gamename` SET `points`='$points', `attempts`='$attempts' WHERE `game_code` = '$gamecode' AND `team` = '$team'";
    $mysqli->query($sql);
    fwrite($handle, $mysqli->error);
    $sql = "UPDATE `$gamename` SET `current_round`='$current_round' WHERE `game_code` = '$gamecode'";
    $mysqli->query($sql);
    fwrite($handle, $mysqli->error);
}

if($gamename == 'fishbowl'){
	$sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode'";
	$result = $mysqli->query($sql);
	$results = NULL;
	while($results[] = $result->fetch_array());
	if($results[0] !== NULL){
	    if($results[0]["player_up"] == ""){
	        if(isset($_SESSION["round"])){
	            unset($_SESSION["round"]);
	        }
	        if(isset($_SESSION["words"])){
	            unset($_SESSION["words"]);
	        }
	        if(isset($_SESSION["trash"])){
	            unset($_SESSION["trash"]);
	        }
	        if(isset($_SESSION["time"])){
	            unset($_SESSION["time"]);
	        }
	        if(isset($_SESSION["indivscores1"])){
	            unset($_SESSION["indivscores1"]);
	        }
	        if(isset($_SESSION["indivscores2"])){
	            unset($_SESSION["indivscores2"]);
	        }
	        if(isset($_SESSION["teamscores"])){
	            unset($_SESSION["teamscores"]);
	        }
	        if(isset($_SESSION["timelimit"])){
	            unset($_SESSION["timelimit"]);
	        }
	        if(isset($_SESSION["gameover"])){
	            unset($_SESSION["gameover"]);
	        }
	        if(isset($_SESSION["member1"])){
	            unset($_SESSION["member1"]);
	        }
	        if(isset($_SESSION["member2"])){
	            unset($_SESSION["member2"]);
	        }
	        if(isset($_SESSION["teammembers1"])){
	            unset($_SESSION["teammembers1"]);
	        }
	        if(isset($_SESSION["teammembers2"])){
	            unset($_SESSION["teammembers2"]);
	        }
	        if(isset($_SESSION["player"])){
	            unset($_SESSION["player"]);
	        }
	        if(isset($_SESSION["playerteam"])){
	            unset($_SESSION["playerteam"]);
	        }
	        if(isset($_SESSION["playinginsession"])){
	            unset($_SESSION["playinginsession"]);
	        }
	        if(isset($_SESSION["intro"])){
	            unset($_SESSION["intro"]);
	        }
	        if(isset($_SESSION["roundtitle"])){
	            unset($_SESSION["roundtitle"]);
	        }
	        if(isset($_SESSION["rounddesc"])){
	            unset($_SESSION["rounddesc"]);
	        }
	        if(isset($_SESSION["gameover"])){
	            unset($_SESSION["gameover"]);
	        }
	    }
	}

	

	$sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode'";
    $result = $mysqli->query($sql);
    $results = NULL;
    while($results[] = $result->fetch_array());
    if($results[0] !== NULL){
        $thisplayerup = $results[0]['player_up'];
    }

	if(isset($_POST['playing_virtually']) && $thisplayerup == 'hosting'){
	    $sql = "UPDATE `$gamename` SET `player_up`='', round=0, `trash`='', `player_up`='', `player_score`= 0, `team_score`=0, `member1`=0, `member2`=0 WHERE `game_code` = '$gamecode'";
	    $mysqli->query($sql);
	    fwrite($handle, $mysqli->error);
	}

	if(isset($_POST['hosting_game'])){
		if(isset($_SESSION["round"])){
		    unset($_SESSION["round"]);
		}
		if(isset($_SESSION["words"])){
		    unset($_SESSION["words"]);
		}
		if(isset($_SESSION["trash"])){
		    unset($_SESSION["trash"]);
		}
		if(isset($_SESSION["time"])){
		    unset($_SESSION["time"]);
		}
		if(isset($_SESSION["indivscores1"])){
		    unset($_SESSION["indivscores1"]);
		}
		if(isset($_SESSION["indivscores2"])){
		    unset($_SESSION["indivscores2"]);
		}
		if(isset($_SESSION["teamscores"])){
		    unset($_SESSION["teamscores"]);
		}
		if(isset($_SESSION["timelimit"])){
		    unset($_SESSION["timelimit"]);
		}
		if(isset($_SESSION["gameover"])){
		    unset($_SESSION["gameover"]);
		}
		if(isset($_SESSION["member1"])){
		    unset($_SESSION["member1"]);
		}
		if(isset($_SESSION["member2"])){
		    unset($_SESSION["member2"]);
		}
		if(isset($_SESSION["teammembers1"])){
		    unset($_SESSION["teammembers1"]);
		}
		if(isset($_SESSION["teammembers2"])){
		    unset($_SESSION["teammembers2"]);
		}
		if(isset($_SESSION["player"])){
		    unset($_SESSION["player"]);
		}
		if(isset($_SESSION["playerteam"])){
		    unset($_SESSION["playerteam"]);
		}
		if(isset($_SESSION["playinginsession"])){
		    unset($_SESSION["playinginsession"]);
		}
		if(isset($_SESSION["intro"])){
		    unset($_SESSION["intro"]);
		}
		if(isset($_SESSION["roundtitle"])){
		    unset($_SESSION["roundtitle"]);
		}
		if(isset($_SESSION["rounddesc"])){
		    unset($_SESSION["rounddesc"]);
		}
		if(isset($_SESSION["gameover"])){
		    unset($_SESSION["gameover"]);
		}
	}
}

if($gamename == 'mouthful'){
	if(isset($_POST['hosting_game'])){
		if(isset($_SESSION["timelimit"])){
		unset($_SESSION["timelimit"]);
		}
		if(isset($_SESSION["time"])){
		unset($_SESSION["time"]);
		}
		if(isset($_SESSION["indivscores1"])){
		unset($_SESSION["indivscores1"]);
		}
		if(isset($_SESSION["indivscores2"])){
		unset($_SESSION["indivscores2"]);
		}
		if(isset($_SESSION["teamscores"])){
		unset($_SESSION["teamscores"]);
		}
		if(isset($_SESSION["gameover"])){
		unset($_SESSION["gameover"]);
		}
		if(isset($_SESSION["member1"])){
		unset($_SESSION["member1"]);
		}
		if(isset($_SESSION["member2"])){
		unset($_SESSION["member2"]);
		}
		if(isset($_SESSION["teammembers1"])){
		unset($_SESSION["teammembers1"]);
		}
		if(isset($_SESSION["teammembers2"])){
		unset($_SESSION["teammembers2"]);
		}
		if(isset($_SESSION["player1"])){
		unset($_SESSION["player1"]);
		}
		if(isset($_SESSION["player2"])){
		unset($_SESSION["player2"]);
		}
		if(isset($_SESSION["playinginsession"])){
		unset($_SESSION["playinginsession"]);
		}
		if(isset($_SESSION["difficulty"])){
		unset($_SESSION["difficulty"]);
		}
		if(isset($_SESSION["started"])){
		unset($_SESSION["started"]);
		}
		if(isset($_SESSION["answers"])){
		unset($_SESSION["answers"]);
		}
		if(isset($_SESSION["hints"])){
		unset($_SESSION["hints"]);
		}
		if(isset($_SESSION["words"])){
		unset($_SESSION["words"]);
		}
		$sql = "UPDATE `$gamename` SET `playing`=1 WHERE `game_code` = '$gamecode'";
		$mysqli->query($sql);
		fwrite($handle, $mysqli->error);
	}

	if(isset($_POST['button_clicked'])){
		$button = $_POST['button'];
		$sql = "UPDATE `$gamename` SET `button`='$button' WHERE `game_code` = '$gamecode'";
		$mysqli->query($sql);
		fwrite($handle, $mysqli->error);
	}

}

if($gamename == 'gridlock'){
	if(isset($_POST['hosting_game'])){
	    unset($_SESSION['indivscores1']);
	    unset($_SESSION['indivscores2']);
	    unset($_SESSION['teamscores']);
	    unset($_SESSION['words']);
	    unset($_SESSION['round']);
	    unset($_SESSION['currentdeck']);
	    unset($_SESSION['newdeck']);
	    unset($_SESSION['member1']);
	    unset($_SESSION['member2']);
	    unset($_SESSION['player1']);
	    unset($_SESSION['player2']);
	    unset($_SESSION['gameover']);
	    unset($_SESSION['hiddengrid']);
	    unset($_SESSION['dubagent']);
	    unset($_SESSION['teamscores']);
	    unset($_SESSION['newdeck']);
	}
}

if(isset($_POST['sending_board'])){
	$board = $_POST["board"];
	$colboard = $_POST["colboard"];
	$name1 = $_POST["name1"];
	$name2 = $_POST["name2"];
	$grid = $_POST["grid"];
	$grid_colors = $_POST["grid_colors"];
	$grid_clicked = $_POST["grid_clicked"];
	$double_agent = $_POST["double_agent"];
	$count1 = $_POST["count1"];
	$count2 = $_POST["count2"];
	$scores = $_POST["scores"];
	$team1_array = $_POST["team1_array"];
	$team2_array = $_POST["team2_array"];
	$currentplayer = $_POST["currentplayer"];
	$member1 = $_POST["member1"];
	$member2 = $_POST["member2"];
	$scores1 = $_POST["scores1"];
	$scores2 = $_POST["scores2"];
	$round = $_POST["round"];
	$sql = "UPDATE `$gamename` SET `board`='$board',`colboard`='' WHERE `game_code` = '$gamecode'";
	$mysqli->query($sql);
	fwrite($handle, $mysqli->error);

	$sql = "UPDATE `$gamename` SET `colboard`='$colboard' WHERE `game_code` = '$gamecode' AND `name` = '$name1'";
	$mysqli->query($sql);
	fwrite($handle, $mysqli->error);

	$sql = "UPDATE `$gamename` SET `colboard`='$colboard' WHERE `game_code` = '$gamecode' AND `name` = '$name2'";
	$mysqli->query($sql);
	fwrite($handle, $mysqli->error); 

	$sql = "UPDATE `$gamename` SET `grid`='$grid', `grid_colors`='$grid_colors', `grid_clicked`='$grid_clicked', `double_agent`='$double_agent', `count1`='$count1', `count2`='$count2', `scores`='$scores', `team1_array`='$team1_array', `team2_array`='$team2_array', `member1`='$member1', `member2`='$member2', `scores1`='$scores1', `scores2`='$scores2', `round` = '$round', `currentplayer` = '$currentplayer' WHERE `game_code` = '$gamecode'";
	$mysqli->query($sql);
	fwrite($handle, $mysqli->error);   

}

// Obtaining Time used for displaying countdown clock:
if(isset($_POST['obtaining_time'])){
	if(isset($_SESSION["numgames"])){
		if($_SESSION["numgames"] < $_POST["numgames"]){
	        unset($_SESSION["time"]);
	        echo false;
	        return;
	    }else{
        	echo $_SESSION["time"];
        	return;
    	}
	}else{
        echo $_SESSION["time"];
        return;
    }
}

if(isset($_POST['updating_time'])){
    $_SESSION["time"] = $_POST["time"];
    $_SESSION["numgames"] = $_POST["numgames"];
    echo $_SESSION["numgames"];
    return;
}

if(isset($_POST['resetting_time'])){
    $sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode'";
	$result = $mysqli->query($sql);
	$results = NULL;
	while($results[] = $result->fetch_array());
	$numgames = $results[0]['num_game'];
	if(isset($_SESSION["numgames"])){
        if(isset($_SESSION["time"])){
            if($numgames > $_SESSION["numgames"]){
                $_SESSION["numgames"] = $numgames;
                unset($_SESSION["time"]);
                echo false;
            }else{
            	echo true;
            	return;
            }
        }
    }
}

//DRAFT SET UP:
if(isset($_POST['draft_setup'])){
    $sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode'";
	$result = $mysqli->query($sql);
	$results = NULL;
	while($results[] = $result->fetch_array());
	$numgame = $results[0]['num_game'] + 1;
	$rounds= $_POST['rounds'];
	$topic= $_POST['topic'];
	$draftorder = $_POST['draftorder'];
	$sql = "UPDATE `$gamename` SET `num_rounds`='$rounds', `topic`='$topic',`draft_order`='$draftorder', `pick` = '', `votes` = 0, `num_game`='$numgame' WHERE `game_code` = '$gamecode'";
	$mysqli->query($sql);
	fwrite($handle, $mysqli->error);
        
 }
if(isset($_POST['drafting'])){
	$sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode'";
	$result = $mysqli->query($sql);
	$results = NULL;
	while($results[] = $result->fetch_array());
	$picks = $results[0]['pick'];
	$pick = $_POST['pick'];

	if($picks == ''){
		$newpicks = $pick;
	}else{
		$newpicks = $picks . '~gn~' . $pick;
	}
	if(stripos($picks, $pick) !== true || $pick == ""){
		$sql = "UPDATE `$gamename` SET `pick`='$newpicks' WHERE `game_code` = '$gamecode'";
		$mysqli->query($sql);
		fwrite($handle, $mysqli->error);
	}

}

if(isset($_POST['voting'])){
	$votee = $_POST['playerVoted'];
	$sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode' AND `name` = '$votee'";
	$result = $mysqli->query($sql);
	$results = NULL;
	while($results[] = $result->fetch_array());
	$votes = $results[0]['votes'];

	$votes = $votes + 1;
	$sql = "UPDATE `$gamename` SET `votes`='$votes' WHERE `game_code` = '$gamecode' AND `name` = '$votee'";
	$mysqli->query($sql);
	fwrite($handle, $mysqli->error);
	$_SESSION['voted'] = TRUE;

}

if(isset($_POST['duplicating'])){
	$sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode'";
	$result = $mysqli->query($sql);
	$results = NULL;
	while($results[] = $result->fetch_array());
	array_pop($results);
	$gamecode = $results[0]['game_code'];
	$num_rounds = $results[0]['num_rounds'];
	$topic = $results[0]['topic'];
	$draft_order = $results[0]['draft_order'];
	$pick = $results[0]['pick'];
	$num_game = $results[0]['num_game'];
	for($i = 0; $i < count($results); $i++){
		$player = $results[$i]['player'];
		$name = $results[$i]['name'];
		$votes = $results[$i]['votes'];
		$sql = "INSERT INTO `draftvote`(`game_code`, `player`, `name`, `num_rounds`, `topic`, `draft_order`, `pick`, `votes`, `num_game`) VALUES ('$gamecode',$player,'$name',$num_rounds,'$topic','$draft_order','$pick',$votes,$num_game)";
		$mysqli->query($sql);
		fwrite($handle, $mysqli->error);
	}

}


// WORKING ON THIS CURRENTLY TO RANDOMIZE TEAMS INSTEAD OF RANDOMIZING IT ON HOST GAME PAGES (NOT IMPLEMENTED CURRENTLY)
if(isset($_POST['randomize_teams'])){
	if($_POST['master'] === "true"){
		$sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode'";
	    $result = $mysqli->query($sql);
	    $results = NULL;
	    while($results[] = $result->fetch_array());
	    array_pop($results);
	    shuffle($results);
	    $random = $results[0]["random"];
	    
	    $teamname1 = $results[0]["team1"];
	    $teamname2 = $results[0]["team2"];
	    $teams = array();
	    $tempteams = array($teamname1, $teamname2);
	    $lesserteam = array_rand($tempteams);
	    $lesserteam = $tempteams[$lesserteam];
	    if($lesserteam == $teamname1){
	        $otherteam = $teamname2;
	    }else{
	        $otherteam = $teamname1;
	    }
	    for($i = 0; $i < count($results); $i++){
	        if($i%2 == 0){
	            array_push($teams,$lesserteam);
	        } else {
	            array_push($teams, $otherteam);
	        }
	    }
	    
	    if($random){
	        for($i = 0; $i < count($results); $i++){
	            $thisteam = $teams[$i];
	            $player = $results[$i]["name"];
	            $sql = "UPDATE `$gamename` SET `team`='$thisteam' WHERE `game_code` = '$gamecode' AND `name` = '$player'";
	            $mysqli->query($sql);
	        }
	    }
	}
}

// COMMON
if(isset($_POST['assigning_master'])){
	if(isset($_POST['decline_master'])){
		$decline_name = $_POST['decline_master'];
		$sql = "UPDATE `$gamename` SET `req_master` = '0' WHERE `game_code` = '$gamecode' AND `name` = '$decline_name'";
		$mysqli->query($sql);
	}else{
		if($_POST['diff_master']){
			$sql = "UPDATE `$gamename` SET `master` = '0', `req_master` = '0' WHERE `game_code` = '$gamecode'";
			$mysqli->query($sql);
			$new_master = $_POST['new_master'];
			$sql = "UPDATE `$gamename` SET `master` = 1 WHERE `game_code` = '$gamecode' AND `name` = '$new_master'";
			$mysqli->query($sql);
		}
	}
}

if(isset($_POST['requesting_master'])){
	$result = $mysqli->query("SELECT `player` FROM `$gamename` WHERE `game_code` = '$gamecode' AND `req_master` = '1'");
	if($result->num_rows == 0) {
	     // row not found, do stuff...
		$new_master = $_POST['new_master'];
		$sql = "UPDATE `$gamename` SET `req_master` = 1 WHERE `game_code` = '$gamecode' AND `name` = '$new_master'";
		$mysqli->query($sql);
	}
}  

//UNSETTING NAME SESSION VARIABLE IF KICKED OUT
if(isset($_SESSION['name'])){
	$sess_name = $_SESSION['name'];
	$result = $mysqli->query("SELECT `player` FROM `$gamename` WHERE `game_code` = '$gamecode' AND `name` = '$sess_name'");
	if($result->num_rows == 0) {
	     // row not found, do stuff...
		unset($_SESSION['name']);
	}
}
//

// ADDING LOCATION
if(isset($_POST['showing_location'])){
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$sql = "UPDATE `gameindex` SET `latitude` = '$latitude', `longitude` = '$longitude' WHERE `game_code` = '$gamecode'";
	$mysqli->query($sql);
	fwrite($handle, $mysqli->error);
}

if(isset($_POST['checking_location_on'])){
	$sql = "SELECT `latitude`, `longitude` FROM `gameindex` WHERE `game_code` = '$gamecode'";
	$result = $mysqli->query($sql);
	$results = NULL;
	while($results[] = $result->fetch_array());
	echo json_encode($results);
	exit();
}
// END ADDING LOCATION

$sql = "SELECT * FROM `$gamename` WHERE `game_code` = '$gamecode'";
$result = $mysqli->query($sql);
$results = NULL;
while($results[] = $result->fetch_array());
echo json_encode($results);	
?>