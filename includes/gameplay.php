<?php
session_start();
/*if(empty($_SESSION['gamename']) || $_SESSION['gamename'] != "$gamename" || empty($_SESSION['gamecode'])){
	header('location: ../../debugger/getSessionVars.php');
}else{
    $gamename = $_SESSION['gamename'];
	$gamecode = $_SESSION['gamecode'];
}*/
?>
<!DOCTYPE>
<html>
	<head>
		<?php 
		include('../../includes/head.dat');
		include('../../includes/mysqli.dat'); ?>
		<title>GameNight+ | Playing <?php echo $gameName ?></title>
		<link rel="icon" href="../../imgs/gnpLogoRound.png">
		<link href="../../css/gameplay-update.css?v=<?php echo rand(); ?>" rel="stylesheet">
        <?php if(isset($css)) { ?>
        <link href="play.css?v=<?php echo rand(); ?>" rel="stylesheet">
        <?php } ?>
	</head>

<body>
    <script>
        var gamecode = localStorage.getItem('gamecode');
        var gamename = localStorage.getItem('gamename');
        if(gamecode == "" || gamename == "" || gamename !== '<?php echo $gamename ?>'){
            localStorage.clear();
            window.location.href = "../../";
        }
    </script>
    <div id="master-request-cont" class="perf-center">
        <div id="master-request-prompt"><strong><span id="master-request-name"></span></strong> is requesting master control</div>
        <button id="accept-req" class='gamebutton' onclick="acceptMasterReq()">Accept</button>
        <button id="deny-req" class='gamebutton' onclick="denyMasterReq()">Deny</button>
        <div id="acceptMasterReqTime"></div>
    </div>
    <div id="setting-detail-cont" class="perf-center">
        <div id="setting-detail-exit">
            <div class='vert-cross perf-center'></div>
            <div class='horiz-cross perf-center'></div>
        </div>
        <div id="setting-detail-text"></div>
    </div>
    <div id="error-message-cont" class="perf-center">
        <div id="error-message-text" class="perf-center"></div>
    </div>
    <div id="debugdiv"></div>
    <div id="introcontainer">
        <div id="gameinfowrap">
            <div id="gamecode">Game Code: 
                <b id='gamelink' onclick="copyGameCode()"></b>
            </div>
            <div id="game-locator-cont">Location: 
                <label class="switch">
                    <input type="checkbox" id="game-locator" value="0">
                    <span class="slider round"></span>
                </label>
            </div>
            <div id="numplayers">
                # Players: 
                <strong id="actnumplayers">0</strong>
            </div>
            <div id="gamenum">
                Game #: 
                <strong id="numgame">0</strong>
            </div>
            <?php if(isset($gameinfo)){ 
                echo $gameinfo;
             } ?>
        </div>
        <div id="introwrap">
            <h1>Party Members</h1>
            <div id="listcont"></div>
            <div id="dispconfwrap">
                <div id="displayConf"></div>
                <br/>
            </div>
            <div id="introinputs">
                <input type='text' id='name' placeholder="Enter Name" maxlength="10" onkeydown="return alphaOnly(event);" autocomplete="off"></input>
                <div id="introCharacters">
                    <?php echo $inputs ?>
                </div>
			</div>
			<div style="text-align: center; display: none;" id="startGameWrap">
                <button onclick="startGame()" id="startGame" class="gamebutton">Create Game</button><br/>
                <button id="resumegame" class="gamebutton" style="display: none;">Resume Game</button>
            </div>
            
		</div>
        <div id="characterWrap">
        	<?php echo $charWrap ?>
        	<div id='gameendintrocontainer'>
                <?php echo $gameendintro ?>
            </div>
        </div>
        <?php if(isset($gamepage)) { ?>
        <div id='gamepage'>
            <?php echo $gamepage ?>
        </div>
        <?php } ?>
        <button onclick="submitAll()" id="submitAll" class="gamebutton">Submit</button>
        <div id="reqMaster-wrap" style="text-align: center;">
            <button onclick="requestMaster()" id="reqMaster" class="gamebutton">Crown Me!</button>
            <div id="req_wait"><?php include("../../svg/loaders/plus-load.svg") ?><br/>waiting on response</div>
        </div>
        <div id="backToGameCont" style="text-align: center;">
            <button id="backToGame" class="postgamebutton">Back to Lobby</button>
        </div>
        <div id="gameoverpage">
            <canvas id="canvas"></canvas>
            <?php if(isset($gameoverpage)){ 
                echo $gameoverpage;
            } else { ?>
            <div id="gameoverpagewrap" class="perf-center">
                <div id="winner"></div>
                <div id="final-score"></div>
            </div>
            <?php } ?>
        </div>
    </div>
    <a id="redirect" href="../gamenoexist.php"></a>
    <a href="../"><img  id="home" src="../../imgs/gnpLogo_doNotDelete.png"/></a>
</div>
<div id="footer">
    <?php include('../../includes/copy.dat') ?>
</div>
<!-- AUDIO -->
<audio id="winAudio" preload="auto">
    <source src="../../audio/tada.ogg" type="audio/ogg">
    <source src="../../audio/tada.mp3" type="audio/mpeg">
</audio>
<!-- END AUDIO -->
<?php 
    if(isset($script)) { 
        echo $script;
    }
?>
<script>
    var submitted = false;
    $('#gamelink').html(gamecode);
    var avatar_crown_svg = '<?php include("../../svg/avatars/avatar-crown.svg") ?>';
    var reveal = false;

    if(localStorage.getItem("user") !== null && localStorage.getItem("user") !== "null"){
        name = localStorage.getItem("user");
        $('#name').prop('value', name);
    }
    
    if(localStorage.getItem("name") !== null && localStorage.getItem("name") !== "null"){
        name = localStorage.getItem("name");
        submitted = true;
        $('#name, #submitAll').stop().fadeOut(200);
        $('#name').prop('value', name); 
        console.log("njjn"); 
    }
    
    //CHECKING IF PERSON WHO STARTED GAME (GENERATED GAME CODE) ACTUALLY JOINED
    var master = localStorage.getItem('master') == null ? false : true;

</script>
<script src="play.js?v=<?php echo rand(); ?>"></script>
<script src="../../../js/gameplay.js?v=<?php echo rand(); ?>"></script>
</body>
</html>