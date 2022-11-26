<?php 

/* Game Setup Inputs */
function inputCharacterRole($name, $detail, $min, $max, $value, $inputID) {
	$div = '<div class="rowCont"><div class="setting-detail" setting-detail="'.$detail.'">'.$name.':</div><input id="'.$inputID.'" type="number" class="characters" value="'.$value.'" min="'.$min.'" max="'.$max.'" readonly></input><div><i class="fas fa-minus-square input-plus-minus"></i><i class="fas fa-plus-square input-plus-minus"></i></div></div>';
	return $div;
}

function totalCh() {
	return '<div id="totalch" class="rowCont"><div>Total:</div><input type="number" value="5" readonly></input></div>';
}

function inputNumber($name, $detail, $min, $max, $value, $inputID, $character_class) {
	$div = '<div class="rowCont"><div class="setting-detail" setting-detail="'.$detail.'">'.$name.':</div><input id="'.$inputID.'" type="number" class="'.$character_class.'" value="'.$value.'" min="'.$min.'" max="'.$max.'" readonly></input><div><i class="fas fa-minus-square input-plus-minus"></i><i class="fas fa-plus-square input-plus-minus"></i></div></div>';
	return $div;
}

function hiddenWordInput($name, $detail, $placeholder, $divInputID, $inputID){
$div = '<div id="'.$divInputID.'" class="rowCont"><div class="setting-detail" setting-detail="'.$detail.'">'.$name.':</div><input type="password" value="" placeholder="'.$placeholder.'" id="'.$inputID.'"></input><div style="right: 8%; position: absolute; height: 40px; width: 17%;"><button id="randWord" onclick="randomWord()" style="width: 50%; border-radius: 0 !important; border-top-left-radius: 5px !important; border-bottom-left-radius: 5px !important;"><i class="fas fa-random" title="Random Word"></i></button><button id="showWord" onclick="showWord()" style="width: 50%; border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important;"><i class="far fa-eye" title="Show Password"></i></button></div></div>';
return $div;
}

/*
WITH INLINE CSS:
function toggleInput($label, $detail, $val1, $val2, $initialCheckVal, $id1, $id2) {
	$div = '<div class="rowCont randomRowCont toggleInput" style="position: relative;"><div style="width: 43%; left: 0; height: 25px;" class="setting-detail" setting-detail="'.$detail.'">'.$label.':</div><input type="text" class="toggleInput-text" value="'.$val1.'" data-val1="'.$val1.'" data-val2="'.$val2.'" id="'.$id1.'" class="indicator" readonly style="width: 14%; left: 0; right: 0;"></input><div style="width: 43%; right: 0;"><label class="switch"><input type="checkbox" class="toggleInput-checkbox" id="'.$id2.'" value="'.$initialCheckVal.'" checked="'.$initialCheckVal.'"><span class="slider round"></span></label></div></div>';
	return $div;
}*/

// WITHOUT INLINE CSS
function toggleInput($label, $detail, $val1, $val2, $initialCheckVal, $id1, $id2) {
	$div = '<div class="rowCont randomRowCont toggleInput" style="position: relative;"><div style="width: 43%; left: 0; height: 25px;" class="setting-detail" setting-detail="'.$detail.'">'.$label.':</div><input type="text" class="toggleInput-text" value="'.$val1.'" data-val1="'.$val1.'" data-val2="'.$val2.'" id="'.$id1.'" class="indicator" readonly style="width: 14%; left: 0; right: 0;"></input><div style="right: 0;"><label class="switch"><input type="checkbox" class="toggleInput-checkbox" id="'.$id2.'" value="'.$initialCheckVal.'"><span class="slider round"></span></label></div></div>';
	return $div;
}

function selectInput($label, $options, $id, $function){
	$div = '<div class="rowCont" id="deckinputwrap"><div>'.$label.':</div>
			<select id="'.$id.'" onchange="'.$function.'">';
	for($i = 0; $i < count($options); $i++){
		$div .= '<option value="'.$options[$i].'">'.ucwords($options[$i]).'</option>';
	}
	$div .= '</select></div>';
	return $div;
}
function revealTeamInput($numTeams){
	$div = '<div class="revealTeam">';

	for($i = 1; $i < $numTeams+1; $i++){
		$div .= '<div class="rowCont"><div>Team '.$i.':</div><input type="text" value="" placeholder="Team '.$i.'" id="team'.$i.'" class="team-name-input" style="width: 59.7%;" maxlength = "14" onkeydown="return alphaOnlyTeamOrWord(event);"></input></div>';
	}
	$div .= '</div>';
	return $div;
}

/* User Submission Inputs -> goes into charWrap Div */

function inputsSubmission($label, $teams){
	$div = '<div id="player-input">'.$label.'<br/><br/>';
	$div.='<div id="player-input-words"></div>';
	if($teams){
		$div.='<div id="player-input-team"></div>';
	}
	$div.="</div>";
	$div .= '<button onclick="submitWords()" id="submitWords">Submit Words</button>';
	
	return $div;
}

// After all submissions and waiting for game to start:

function wordColl(){
	return '<div id="wordcoll"></div>';
}

function onTeam(){
	return '<div id="on-team"></div>';
}

function totalWordCount(){
	return '<div id="totalwordcount"></div>';
}

function teamMembers($numTeams){
	$div = '';
	for($i = 1; $i < $numTeams+1; $i++){
		$div .= '<div id="team'.$i.'-mem" style="width: 50%; white-space: nowrap; display: inline-block; vertical-align: top;"></div>';
	}
	return $div;
}

/* Main Buttons */
function hostGame(){
	return '<button class="postgamebutton master-contol" id="hostGame" style="height: 60px;width: 300px;border-radius: 5px; display: none;">Start Game</button>';
}

function newCharsOrWords($label) {
	return '<button class="postgamebutton" id="newCharacters" style="height: 60px;width: 300px;border-radius: 5px; display: none;">'.$label.'</button>';
}

function newGame(){
	return '<button class="postgamebutton master-contol" id="EndGame" style="border-radius: 5px; margin-top: 20px;">Set Up New Game</button>';
}

function playAgainSameTeams() {
	return '<button class="postgamebutton gameover-play-again master-contol" id="playAgainSameTeams" style="height: 60px;width: 300px;border-radius: 5px; display: none;">Play Again with Same Teams</button>';
}

function playAgainRandomTeams() {
	return '<button class="postgamebutton gameover-play-again master-contol" id="playAgainRandomTeams" style="height: 60px;width: 300px;border-radius: 5px; display: none;">Play Again with Random Teams</button>';
}

/* Game Page Elements -> goes into gamepage Div */
function welcomePage(){

}

function teamInfoPage($numTeams){
	$div = '<div id="teaminfopage">';
    for($i = 1; $i < $numTeams+1; $i++){
		$div .= '<div style="display: inline-block; width: 50%;position: relative;"><div class="teamname teaminfoname"><span style="overflow:hidden;width: 80%;display: inline-block;height:45px;"  id="teaminfoname'.$i.'"></span><span class = "teamtotal" id="team'.$i.'total">0</span><i id="minus'.$i.'" class="fas fa-minus not-my-turn"></i><i id="plus'.$i.'" class="fas fa-plus not-my-turn"></i></div><div class="teammembers" id="teammembers'.$i.'"></div></div>';
	}

	$div .= '<button class="gamebutton" id="back2game" style="position:absolute; bottom: 20px; margin-left: auto; margin-right: auto; left: 0; right: 0;"><i class="fas fa-arrow-circle-left"></i> Back</button></div>';
    return $div;
}

function shortCutPage($actionArr, $kbdArr){
	$div = '<div id="shortcutpage"><i id="closeshortcut" class="far fa-times-circle"></i><div style="font-size: 30px;">Keyboard Shortcuts</div><table><tr><th>Action</th><th>Button</th></tr>';

    for($i = 0; $i < count($actionArr); $i++){
    	$div .= '<tr><td>'.$actionArr[$i].'</td><td><kbd>'.$kbdArr[$i].'</kbd></td></tr>';
    }
    $div .= '</table></div>';
    return $div;
}

function gameOverPage(){
	return '<div id="gameoverpage"><canvas id="canvas"></canvas><div id="gameoverinnercontainer" class="perf-center"><div id="winnerintro"></div><div id="scoreintro"></div><button id="continuePlaying" class="gamebutton postgamebutton" style="display: block;">Continue Playing</button></div></div>';
}
?>