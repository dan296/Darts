<!-- NEW WCC -->
<?php
session_start();
?>
<!DOCTYPE html>
<head>
  <!--<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
$url = "https://www.gamenight.plus/";
$path = "/home/araihzsn/gamenight/";
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="https://fonts.googleapis.com/css?family=Varela+Round:300,400,700|Raleway:400i|Lato:300,400,700|Open+Sans:300,400,700|Luckiest+Guy:300,400,700|Saira:300,400,700|Source+Sans+Pro:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="<?php echo $url; ?>js/jquery.easing.1.3.js"></script>
<script src="<?php echo $url; ?>js/detectmobilebrowser.js"></script>
<link rel="icon" href="<?php echo $url; ?>imgs/gnpLogo.png">
<link rel="apple-touch-icon" sizes="100x100" href="<?php echo $url; ?>imgs/gnpLogo.png" />
<?php include($path . 'includes/analytics.dat'); ?>
<script src="<?php echo $url; ?>js/spin.js"></script>
<script src="<?php echo $url; ?>js/spinopts.js"></script>
<title>gameNight+ | Playing Wildcard Cricket</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
  :root{
    --bg: white;
  }
html{
  overflow: hidden;
}
body{
    height: 100vh;
    margin: 0;
opacity: 0;
    font-family: Sans-Serif;
color: white;
transition: opacity 1s ease, background-color 1s ease;    
    padding-bottom: 1000px;
    -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
     -khtml-user-select: none; /* Konqueror HTML */
       -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none;
background: var(--bg);
}
#gamepage{
    height: 100%;
    overflow-y: scroll;
}
#players, #scores{
background-color: #272727;
height: auto;
width: 50%;
float: left;
transition: background-color 1s ease;
}

.scores, .playerins{
display:inline-block;
width: 100%;
    text-align: center;
    font-size: 15pt;
    height: 40px;
    padding-top: 15px;
    font-family: Sans-Serif;
transition: background-color 1s ease;
    
}

.playerins{
color: white;
border:none;
outline: none;
transition: background-color 1s ease;
}

.playerinputs{
    text-align:center;
border:none;
}

form button{
  width: 25%;
  height: 40px;
  float: left;
  font-size: 15pt;
  background-color: var(--bg);
  margin-top: 10px;
  border:white;
  border-radius: 20px;
  color:#40A4FF;
  transition: 0.2s ease-in-out;
  cursor: pointer;
  outline: none;
}

form button:hover{
  background-color: #1d1d1d;
  color: var(--bg);
}

form{
  width: 100%;
  height: auto;
  margin: auto;
    position:relative;
    z-index: 20;
    text-align:center;
    margin-bottom: 200px;
}

.currentplayer{
	background-color: #40A4FF !important;
	font-weight: bold;
}
.playernameinput::placeholder{
	color: white;
}
.playernameinput{
  width: 100%;
  padding: 0;
border: none;
    text-align: center;
    font-size: 15pt;
color: white;
outline: none;
    background-color: #272727;
transition: background-color 1s ease;
    
}

.bust{
display:none;
width: 100%;
font-size: 100pt;
color: white;
position: absolute;
top: 225px;
z-index: 51;
text-align: center;
color: red;
}

.scores{
    font-size: 18pt;
}

svg{
  position: absolute;
  left: 0;
  right: 0;
  margin: auto;
  background: #000000bf;
  transition: background 0.2s ease-in-out;
}
svg:hover{
	background: #000000;
}
.overlay{
  cursor: crosshair;
  transition: 0.2s ease-in-out;
}

.overlay:hover{
-webkit-filter: drop-shadow(12px 12px 7px rgba(0,0,0,0.5));      
    filter: drop-shadow(12px 12px 7px rgba(0,0,0,0.5));  
}
#mysvg {
  position: relative;
  z-index: 50;
  background-color: transparent;
  text-align: center;
  left: 0px;
  width: 320px;
  height: 320px;
  margin: auto;
  margin-bottom: 20px;
}

#minmax,#mysvgheader {
  width: 40px;
  padding: 0px;
  height: 40px;
  font-size: 35px;
  top: 0;
  cursor: move;
  z-index: 10;
  background-color: #2196F3;
  color: #fff;
  position: absolute;
}
#minmax{
  right:0;
  cursor: nesw-resize;
}
.fa-expand{
  display: none;
}
#gameoverpage{
        opacity:1;
        position: absolute;
        bottom: 0;
        left: 0;
        z-index: 19;
        height: 0px;
        overflow: hidden;
        width: 100%;
        font-size: 70px;
        background-color:rgba(0, 0, 0, 0.5);
        transition: background-color 1s ease, opacity 1s ease, height 1s ease;
        text-align: center;
    }
canvas {
    overflow-y: hidden;
    overflow-x: hidden;
    width: 100%;
    margin: 0;
}
#winnerintro{
  position: absolute;
        font-size: 40px;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        top: 25%;
    }
#canvas,#winnerintro,#scoreintro{
    display:none;
}

@media screen and (max-width: 812px) {
    form button{
        display: block;
        margin: auto;
        width: 100%;
    }
    form{
        width: 200px;
    }
}
#scoreboard{
    max-height: 320px;
    overflow-y: scroll;
    margin-bottom: 20px;
}

</style>
</head>

<body>
<div id="gamepage">
    <div id="scoreboard">
	<div id="players" class="playerinputs"></div>
	<div id="scores"></div>
	</div>
	<div id='mysvg'>
<svg height="320" width="320" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<text id="arctext20" fill="white" font-size="26" x="148" y="24">20</text><path id="arc20" class="overlay" fill="black" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 180.02361152514956 33.575892403822365 A 128 128 0 0 0 139.97638847485044 33.57589240382238 L 160 160"></path><path id="arc20_2" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 180.02361152514956 33.575892403822365 A 128 128 0 0 0 139.97638847485044 33.57589240382238 L 141.97874962736537 46.21830316344014 A -115.2 115.2 0 0 1 178.0212503726346 46.218303163440126 L 180.02361152514956 33.575892403822365"></path><path id="arc20_3" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 170.01180576257477 96.78794620191118 A 128 128 0 0 0 149.9881942374252 96.78794620191118 L 151.59008315943717 106.9018748096054 A -115.2 115.2 0 0 1 168.4099168405628 106.9018748096054 L 170.01180576257477 96.78794620191118"></path><text id="arctext1" fill="white" font-size="26" x="198" y="32">1</text><path id="arc1" class="overlay" fill="wheat" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 218.11078396666198 45.95116490388892 A 128 128 0 0 0 180.02361152514956 33.575892403822365 L 160 160"></path><path id="arc1_2" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 218.11078396666198 45.95116490388892 A 128 128 0 0 0 180.02361152514956 33.575892403822365 L 178.0212503726346 46.218303163440126 A -115.2 115.2 0 0 1 212.2997055699958 57.356048413500034 L 218.11078396666198 45.95116490388892"></path><path id="arc1_3" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 189.055391983331 102.97558245194446 A 128 128 0 0 0 170.01180576257477 96.78794620191118 L 168.4099168405628 106.9018748096054 A -115.2 115.2 0 0 1 184.40652926599805 112.09948925963334 L 189.055391983331 102.97558245194446"></path><text id="arctext18" fill="white" font-size="26" x="230" y="50">18</text><path id="arc18" class="overlay" fill="black" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 250.50966799187808 69.49033200812192 A 128 128 0 0 0 218.11078396666198 45.95116490388892 L 160 160"></path><path id="arc18_2" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 250.50966799187808 69.49033200812192 A 128 128 0 0 0 218.11078396666198 45.95116490388892 L 212.2997055699958 57.356048413500034 A -115.2 115.2 0 0 1 241.45870119269028 78.54129880730973 L 250.50966799187808 69.49033200812192"></path><path id="arc18_3" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 205.25483399593904 114.74516600406096 A 128 128 0 0 0 189.055391983331 102.97558245194446 L 184.40652926599805 112.09948925963334 A -115.2 115.2 0 0 1 198.0140605565888 121.98593944341121 L 205.25483399593904 114.74516600406096"></path><text id="arctext4" fill="white" font-size="26" x="268" y="82">4</text><path id="arc4" class="overlay" fill="wheat" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 274.0488350961111 101.88921603333802 A 128 128 0 0 0 250.50966799187808 69.49033200812192 L 160 160"></path><path id="arc4_2" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 274.0488350961111 101.88921603333802 A 128 128 0 0 0 250.50966799187808 69.49033200812192 L 241.45870119269028 78.54129880730973 A -115.2 115.2 0 0 1 262.64395158649995 107.70029443000422 L 274.0488350961111 101.88921603333802"></path><path id="arc4_3" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 217.02441754805554 130.944608016669 A 128 128 0 0 0 205.25483399593904 114.74516600406096 L 198.0140605565888 121.98593944341121 A -115.2 115.2 0 0 1 207.90051074036666 135.59347073400198 L 217.02441754805554 130.944608016669"></path><text id="arctext13" fill="white" font-size="26" x="282" y="122">13</text><path id="arc13" class="overlay" fill="black" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 286.42410759617763 139.97638847485044 A 128 128 0 0 0 274.0488350961111 101.88921603333802 L 160 160"></path><path id="arc13_2" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 286.42410759617763 139.97638847485044 A 128 128 0 0 0 274.0488350961111 101.88921603333802 L 262.64395158649995 107.70029443000422 A -115.2 115.2 0 0 1 273.7816968365599 141.9787496273654 L 286.42410759617763 139.97638847485044"></path><path id="arc13_3" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 223.21205379808882 149.98819423742523 A 128 128 0 0 0 217.02441754805554 130.944608016669 L 207.90051074036666 135.59347073400198 A -115.2 115.2 0 0 1 213.0981251903946 151.5900831594372 L 223.21205379808882 149.98819423742523"></path><text id="arctext6" fill="white" font-size="26" x="296" y="168">6</text><path id="arc6" class="overlay" fill="wheat" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 286.42410759617763 180.02361152514956 A 128 128 0 0 0 286.42410759617763 139.97638847485044 L 160 160"></path><path id="arc6_2" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 286.42410759617763 180.02361152514956 A 128 128 0 0 0 286.42410759617763 139.97638847485044 L 273.7816968365599 141.9787496273654 A -115.2 115.2 0 0 1 273.7816968365599 178.0212503726346 L 286.42410759617763 180.02361152514956"></path><path id="arc6_3" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 223.21205379808882 170.01180576257477 A 128 128 0 0 0 223.21205379808882 149.98819423742523 L 213.0981251903946 151.5900831594372 A -115.2 115.2 0 0 1 213.0981251903946 168.4099168405628 L 223.21205379808882 170.01180576257477"></path><text id="arctext10" fill="white" font-size="26" x="284" y="212">10</text><path id="arc10" class="overlay" fill="black" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 274.0488350961111 218.11078396666198 A 128 128 0 0 0 286.42410759617763 180.02361152514956 L 160 160"></path><path id="arc10_2" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 274.0488350961111 218.11078396666198 A 128 128 0 0 0 286.42410759617763 180.02361152514956 L 273.7816968365599 178.0212503726346 A -115.2 115.2 0 0 1 262.64395158649995 212.29970556999578 L 274.0488350961111 218.11078396666198"></path><path id="arc10_3" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 217.02441754805554 189.055391983331 A 128 128 0 0 0 223.21205379808882 170.01180576257477 L 213.0981251903946 168.4099168405628 A -115.2 115.2 0 0 1 207.90051074036666 184.40652926599802 L 217.02441754805554 189.055391983331"></path><text id="arctext15" fill="white" font-size="26" x="264" y="254">15</text><path id="arc15" class="overlay" fill="wheat" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 250.50966799187808 250.50966799187808 A 128 128 0 0 0 274.0488350961111 218.11078396666198 L 160 160"></path><path id="arc15_2" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 250.50966799187808 250.50966799187808 A 128 128 0 0 0 274.0488350961111 218.11078396666198 L 262.64395158649995 212.29970556999578 A -115.2 115.2 0 0 1 241.45870119269028 241.45870119269028 L 250.50966799187808 250.50966799187808"></path><path id="arc15_3" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 205.25483399593904 205.25483399593904 A 128 128 0 0 0 217.02441754805554 189.055391983331 L 207.90051074036666 184.40652926599802 A -115.2 115.2 0 0 1 198.0140605565888 198.0140605565888 L 205.25483399593904 205.25483399593904"></path><text id="arctext2" fill="white" font-size="26" x="236" y="286">2</text><path id="arc2" class="overlay" fill="black" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 218.11078396666198 274.0488350961111 A 128 128 0 0 0 250.50966799187808 250.50966799187808 L 160 160"></path><path id="arc2_2" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 218.11078396666198 274.0488350961111 A 128 128 0 0 0 250.50966799187808 250.50966799187808 L 241.45870119269028 241.45870119269028 A -115.2 115.2 0 0 1 212.2997055699958 262.64395158649995 L 218.11078396666198 274.0488350961111"></path><path id="arc2_3" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 189.055391983331 217.02441754805554 A 128 128 0 0 0 205.25483399593904 205.25483399593904 L 198.0140605565888 198.0140605565888 A -115.2 115.2 0 0 1 184.40652926599805 207.90051074036666 L 189.055391983331 217.02441754805554"></path><text id="arctext17" fill="white" font-size="26" x="188" y="306">17</text><path id="arc17" class="overlay" fill="wheat" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 180.02361152514956 286.42410759617763 A 128 128 0 0 0 218.11078396666198 274.0488350961111 L 160 160"></path><path id="arc17_2" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 180.02361152514956 286.42410759617763 A 128 128 0 0 0 218.11078396666198 274.0488350961111 L 212.2997055699958 262.64395158649995 A -115.2 115.2 0 0 1 178.0212503726346 273.7816968365599 L 180.02361152514956 286.42410759617763"></path><path id="arc17_3" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 170.01180576257477 223.21205379808882 A 128 128 0 0 0 189.055391983331 217.02441754805554 L 184.40652926599805 207.90051074036666 A -115.2 115.2 0 0 1 168.4099168405628 213.0981251903946 L 170.01180576257477 223.21205379808882"></path><text id="arctext3" fill="white" font-size="26" x="153.5" y="312">3</text><path id="arc3" class="overlay" fill="black" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 139.97638847485044 286.42410759617763 A 128 128 0 0 0 180.02361152514956 286.42410759617763 L 160 160"></path><path id="arc3_2" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 139.97638847485044 286.42410759617763 A 128 128 0 0 0 180.02361152514956 286.42410759617763 L 178.0212503726346 273.7816968365599 A -115.2 115.2 0 0 1 141.97874962736537 273.78169683655983 L 139.97638847485044 286.42410759617763"></path><path id="arc3_3" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 149.9881942374252 223.21205379808882 A 128 128 0 0 0 170.01180576257477 223.21205379808882 L 168.4099168405628 213.0981251903946 A -115.2 115.2 0 0 1 151.59008315943717 213.0981251903946 L 149.9881942374252 223.21205379808882"></path><text id="arctext19" fill="white" font-size="26" x="100" y="306">19</text><path id="arc19" class="overlay" fill="wheat" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 101.88921603333802 274.0488350961111 A 128 128 0 0 0 139.97638847485044 286.42410759617763 L 160 160"></path><path id="arc19_2" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 101.88921603333802 274.0488350961111 A 128 128 0 0 0 139.97638847485044 286.42410759617763 L 141.97874962736537 273.78169683655983 A -115.2 115.2 0 0 1 107.70029443000422 262.64395158649995 L 101.88921603333802 274.0488350961111"></path><path id="arc19_3" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 130.944608016669 217.02441754805554 A 128 128 0 0 0 149.9881942374252 223.21205379808882 L 151.59008315943717 213.0981251903946 A -115.2 115.2 0 0 1 135.59347073400198 207.90051074036666 L 130.944608016669 217.02441754805554"></path><text id="arctext7" fill="white" font-size="26" x="70" y="286">7</text><path id="arc7" class="overlay" fill="black" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 69.49033200812192 250.50966799187808 A 128 128 0 0 0 101.88921603333802 274.0488350961111 L 160 160"></path><path id="arc7_2" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 69.49033200812192 250.50966799187808 A 128 128 0 0 0 101.88921603333802 274.0488350961111 L 107.70029443000422 262.64395158649995 A -115.2 115.2 0 0 1 78.54129880730973 241.45870119269028 L 69.49033200812192 250.50966799187808"></path><path id="arc7_3" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 114.74516600406096 205.25483399593904 A 128 128 0 0 0 130.944608016669 217.02441754805554 L 135.59347073400198 207.90051074036666 A -115.2 115.2 0 0 1 121.98593944341121 198.0140605565888 L 114.74516600406096 205.25483399593904"></path>
 <text id="arctext16" fill="white" font-size="26" x="26" y="254">16</text><path id="arc16" class="overlay" fill="wheat" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 45.95116490388892 218.11078396666198 A 128 128 0 0 0 69.49033200812192 250.50966799187808 L 160 160"></path><path id="arc16_2" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 45.95116490388892 218.11078396666198 A 128 128 0 0 0 69.49033200812192 250.50966799187808 L 78.54129880730973 241.45870119269028 A -115.2 115.2 0 0 1 57.356048413500034 212.2997055699958 L 45.95116490388892 218.11078396666198"></path><path id="arc16_3" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 102.97558245194446 189.055391983331 A 128 128 0 0 0 114.74516600406096 205.25483399593904 L 121.98593944341121 198.0140605565888 A -115.2 115.2 0 0 1 112.09948925963334 184.40652926599805 L 102.97558245194446 189.055391983331"></path><text id="arctext8" fill="white" font-size="26" x="16" y="212">8</text><path id="arc8" class="overlay" fill="black" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 33.57589240382238 180.02361152514956 A 128 128 0 0 0 45.95116490388892 218.11078396666198 L 160 160"></path><path id="arc8_2" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 33.57589240382238 180.02361152514956 A 128 128 0 0 0 45.95116490388892 218.11078396666198 L 57.356048413500034 212.2997055699958 A -115.2 115.2 0 0 1 46.21830316344014 178.0212503726346 L 33.57589240382238 180.02361152514956"></path><path id="arc8_3" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 96.78794620191118 170.0118057625748 A 128 128 0 0 0 102.97558245194446 189.055391983331 L 112.09948925963334 184.40652926599805 A -115.2 115.2 0 0 1 106.9018748096054 168.40991684056283 L 96.78794620191118 170.0118057625748"></path><text id="arctext11" fill="white" font-size="26" x="4" y="168">11</text><path id="arc11" class="overlay" fill="wheat" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 33.575892403822365 139.97638847485047 A 128 128 0 0 0 33.57589240382238 180.02361152514956 L 160 160"></path><path id="arc11_2" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 33.575892403822365 139.97638847485047 A 128 128 0 0 0 33.57589240382238 180.02361152514956 L 46.21830316344014 178.0212503726346 A -115.2 115.2 0 0 1 46.218303163440126 141.97874962736543 L 33.575892403822365 139.97638847485047"></path><path id="arc11_3" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 96.78794620191118 149.98819423742523 A 128 128 0 0 0 96.78794620191118 170.0118057625748 L 106.9018748096054 168.40991684056283 A -115.2 115.2 0 0 1 106.9018748096054 151.5900831594372 L 96.78794620191118 149.98819423742523"></path><text id="arctext14" fill="white" font-size="26" x="6" y="122">14</text><path id="arc14" class="overlay" fill="black" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 45.95116490388888 101.88921603333807 A 128 128 0 0 0 33.575892403822365 139.97638847485047 L 160 160"></path><path id="arc14_2" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 45.95116490388888 101.88921603333807 A 128 128 0 0 0 33.575892403822365 139.97638847485047 L 46.218303163440126 141.97874962736543 A -115.2 115.2 0 0 1 57.35604841349999 107.70029443000428 L 45.95116490388888 101.88921603333807"></path><path id="arc14_3" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 102.97558245194443 130.94460801666904 A 128 128 0 0 0 96.78794620191118 149.98819423742523 L 106.9018748096054 151.5900831594372 A -115.2 115.2 0 0 1 112.09948925963333 135.59347073400198 L 102.97558245194443 130.94460801666904"></path><text id="arctext9" fill="white" font-size="26" x="38" y="82">9</text><path id="arc9" class="overlay" fill="wheat" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 69.4903320081219 69.49033200812192 A 128 128 0 0 0 45.95116490388888 101.88921603333807 L 160 160"></path><path id="arc9_2" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 69.4903320081219 69.49033200812192 A 128 128 0 0 0 45.95116490388888 101.88921603333807 L 57.35604841349999 107.70029443000428 A -115.2 115.2 0 0 1 78.5412988073097 78.54129880730973 L 69.4903320081219 69.49033200812192"></path><path id="arc9_3" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 114.74516600406095 114.74516600406096 A 128 128 0 0 0 102.97558245194443 130.94460801666904 L 112.09948925963333 135.59347073400198 A -115.2 115.2 0 0 1 121.9859394434112 121.98593944341121 L 114.74516600406095 114.74516600406096"></path><text id="arctext12" fill="white" font-size="26" x="58" y="50">12</text><path id="arc12" class="overlay" fill="black" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 101.88921603333799 45.95116490388892 A 128 128 0 0 0 69.4903320081219 69.49033200812192 L 160 160"></path><path id="arc12_2" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 101.88921603333799 45.95116490388892 A 128 128 0 0 0 69.4903320081219 69.49033200812192 L 78.5412988073097 78.54129880730973 A -115.2 115.2 0 0 1 107.70029443000419 57.356048413500034 L 101.88921603333799 45.95116490388892"></path><path id="arc12_3" class="overlay" fill="red" stroke="#4b4b4b" stroke-width="5px" d="M 130.944608016669 102.97558245194446 A 128 128 0 0 0 114.74516600406095 114.74516600406096 L 121.9859394434112 121.98593944341121 A -115.2 115.2 0 0 1 135.59347073400195 112.09948925963334 L 130.944608016669 102.97558245194446"></path><text id="arctext5" fill="white" font-size="26" x="108" y="32">5</text><path id="arc5" class="overlay" fill="wheat" stroke="#4b4b4b" stroke-width="5px" d="M 160 160 L 139.97638847485044 33.57589240382238 A 128 128 0 0 0 101.88921603333799 45.95116490388892 L 160 160"></path><path id="arc5_2" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 139.97638847485044 33.57589240382238 A 128 128 0 0 0 101.88921603333799 45.95116490388892 L 107.70029443000419 57.356048413500034 A -115.2 115.2 0 0 1 141.97874962736537 46.21830316344014 L 139.97638847485044 33.57589240382238"></path><path id="arc5_3" class="overlay" fill="green" stroke="#4b4b4b" stroke-width="5px" d="M 149.9881942374252 96.78794620191118 A 128 128 0 0 0 130.944608016669 102.97558245194446 L 135.59347073400195 112.09948925963334 A -115.2 115.2 0 0 1 151.59008315943717 106.9018748096054 L 149.9881942374252 96.78794620191118"></path><circle id="arc25" cx="160" cy="160" r="20" class="overlay" stroke="#4b4b4b" stroke-width="5" fill="green" d="M 160 160 L 180.02361152514953 33.575892403822365 A 128 128 0 0 0 139.97638847485044 33.57589240382238 L 160 160"></circle><circle id="arc25_2" cx="160" cy="160" r="10" class="overlay" stroke="#4b4b4b" stroke-width="5" fill="red" d="M 180.02361152514953 33.575892403822365 A 128 128 0 0 0 139.97638847485044 33.57589240382238 L 141.97874962736537 46.21830316344014 A -115.2 115.2 0 0 1 178.02125037263457 46.218303163440126 L 180.02361152514953 33.575892403822365"></circle>        
</svg>
</div>
	<form id='newgameform' method='post' action='newGame.php'>
		<div>
			<button id="undo">Undo  <i class='fa fa-undo' aria-hidden="true"></i></button>
      <button id="newgame">New Game  <i class="fas fa-redo"></i></button>
      <input type="hidden" id="newinput" name = "new" value="new"/>
      <button id="endgame">End Game  <i class='fa fa-times-circle' aria-hidden="true"></i></button>
		  <button id="next">Next Player  <i class='fa fa-arrow-right' aria-hidden="true"></i></button>
		</div>
	</form>
<div class="bust missed">BUST!</div>
</div>
<div id="gameoverpage">
  <canvas id="canvas"></canvas>
  <div id="winnerintro"><span id="winner"></span> wins!</div>
</div>
<!-- JUST ADDED FEB 11 -->

<!-- END -->
<script>
let root = document.documentElement;
  root.style.setProperty('--bg', localStorage.getItem('color'));
  function updateSessionVariables(){
    $nameinputs = [];
    for(var i = 0; i < $numplayers; i++){
      var namestrid = '#playernameinput'+(i+1);
      $nameinputs.push($(namestrid).val());
    }
    $.ajax({
        url: "updateSessionVariables.php",
        type: "post",
        data: {numplayers: $numplayers, playernames: $nameinputs.join("~,~"), currentplayer: $currplayer, scores: $scoreshistory.join("~,~"), history: $history, lasthit: $lasthit.join(), randnums: $randnums.join(), playerhits: $playerhits.join()} ,
        success: function (response) {
           // you will get response from your php page (what you echo or print)                 

        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    })
  }

	function updateScores(){
		var scores = [];
    
                    	for(var i = 0; i < $numplayers; i++){
                    		var scorer = '#score'+(i+1);
                    		scores.push(parseInt($(scorer).html()));
                    	}
                    	$scoreshistory.push(scores);
                    }
$(document).ready(function(){
                  $topbound = 0;
                  $leftbound = 0;
                  //compression first
                  $topbound = -580*0.5/2;
                  $leftbound = -600*0.5/2;
                  $nameinputs = [];
                  <?php if(isset($_SESSION["numplayers"])){ ?>
                  $numplayers = <?php echo $_SESSION["numplayers"]; ?>;
                  <?php }else{ ?>
                    do{
                    $numplayers = parseInt(prompt("How many players?"));
                    }while(isNaN($numplayers));
                    do{
                    $numbegin = parseInt(prompt("Enter Mode: 301, 501, 701, or 1001"));
                    }while(($numbegin==301 || $numbegin == 501 || $numbegin == 701 || $numbegin == 1001)==false);
                  <?php } ?>
                  $("body").css("opacity",1);
                  <?php if(isset($_SESSION["currentplayer"])){ ?>
                    $currplayer = <?php echo $_SESSION["currentplayer"]; ?>;
                  <?php }else{ ?>
                    $currplayer = 0;
                  <?php } ?>
                  $numplayers = parseInt($numplayers);
                  <?php if(isset($_SESSION["playerhits"])){ ?>
                  $playerhits = "<?php echo $_SESSION["playerhits"]; ?>";
                  $playerhits = $playerhits.split(",");
                  for(var j = 0; j < $playerhits.length; j++){
                    $playerhits[j] = parseInt($playerhits[j]);
                  }
                  <?php }else{ ?>
                    $playerhits = [];
                  <?php } ?>
                  

                  for($i=1;$i<$numplayers+1;$i++){
                  	$autofocus = '';
                  	if($i ==1){
                  		$autofocus = 'autofocus';
                  	}
                  <?php if(isset($_SESSION["numplayers"])){ ?>
                    <?php }else{ ?>
                  $playerhits.push(0);
                  $(".playerinputs").append("<div class='playerins'  id='playerin"+$i+"' ><input class='playernameinput' id='playernameinput"+$i+"' placeholder='Player "+$i+"' type='text' "+$autofocus+"></input></div>");
                  $("#scores").append("<div class = 'scores' id='score"+$i+"'>"+$numbegin+"</div>");
                  <?php } ?>
                  }
                


                  <?php if(isset($_SESSION["scores"])){ ?>
                    $scoreshistory = "<?php echo $_SESSION["scores"]; ?>";
                    $scoreshistory = $scoreshistory.split("~,~");
                    for(var k = 0; k < $scoreshistory.length; k++){
                      $scoreshistory[k] = $scoreshistory[k].split(",");
                    }
                    for(var i = 0; i < $numplayers; i++){
                        var oldscorer = '#score'+(i+1);
                        var j= i + 1;
                        $(oldscorer).html($scoreshistory[$scoreshistory.length-1][i]);
                        $(".playerinputs").append("<div class='playerins'  id='playerin"+j+"' ><input class='playernameinput' id='playernameinput"+j+"' placeholder='Player "+j+"' type='text' "+$autofocus+"></input></div>");
                  $("#scores").append("<div class = 'scores' id='score"+j+"'>"+$scoreshistory[$scoreshistory.length-1][i]+"</div>");
                      }
                      $history = "<?php echo $_SESSION["history"]; ?>";
                      $history = parseInt($history);
                      $lasthit = "<?php echo $_SESSION["lasthit"]; ?>";
                      $lasthit = $lasthit.split(",");
                      for(var k = 0; k < $lasthit.length; k++){
                      $lasthit[k] = parseInt($lasthit[k]);
                    }
                    <?php }else{ ?>
                      $scoreshistory = [];
                      $history = 0;
                    $lasthit=[];
                    $lasthit.push(0);
                    
                      
                      <?php } ?>
                  
                  <?php if(isset($_SESSION["randnums"])){ ?>
                    $randnums = "<?php echo $_SESSION["randnums"]; ?>";
                    $randnums = $randnums.split(",");
                    for(var j = 0; j < $randnums.length; j++){
                      $randnums[j] = parseInt($randnums[j]);
                    }
                    <?php }else{ ?>

               
                  $dartnums = [];
                  $randnums=[];
                  
                  for($i=1;$i<21;$i++){
                  $dartnums.push($i);
                  }
                  $dartnums.push(25);
                  $realnums=$dartnums;
                  for($i=1;$i<8;$i++){
                  $numRand = Math.floor(Math.random() * ($dartnums.length));
                  $numRand = $dartnums[$numRand];
                  $randnums.push($numRand);
                  $dartnums.splice($.inArray($numRand, $dartnums),1);
                  }
                        
                  
                  <?php } ?> 
                  
                  $("#player"+($currplayer+1)+",#score"+($currplayer+1)+",#playerin"+($currplayer+1)+", #playernameinput"+($currplayer+1)+"").addClass('currentplayer');
                  
                    $('#next').click(function(event){
	                    event.preventDefault();
	                    $lasthit.push($playerhits[$currplayer]);
	                    $playerhits[$currplayer] = 0;
						$("#player"+($currplayer+1)+",#score"+($currplayer+1)+",#playerin"+($currplayer+1)+", #playernameinput"+($currplayer+1)+"").removeClass('currentplayer');
				  		if($currplayer<$numplayers-1){
				  			$currplayer++;
				  		}else{
				  			$currplayer = 0;
				  		}
				  		$("#player"+($currplayer+1)+",#score"+($currplayer+1)+",#playerin"+($currplayer+1)+", #playernameinput"+($currplayer+1)+"").addClass('currentplayer');
				  		$history++;
				  		updateScores();
                    })
                    $('#scoreboard').css('height',($numplayers*55)+'px');
                    $("#undo").click(function(event){
                    	event.preventDefault();
                    	if($history>0){
                    	if($playerhits[$currplayer] == 0){
                    		$("#player"+($currplayer+1)+",#score"+($currplayer+1)+",#playerin"+($currplayer+1)+", #playernameinput"+($currplayer+1)+"").removeClass('currentplayer');
	                       if($currplayer>0){
	                       	$currplayer--;
	                       }else{
	                       	$currplayer = $numplayers-1;
	                       }
	                       $playerhits[$currplayer] = $lasthit[$lasthit.length-1];
	                       $lasthit.pop();
	                       
	                       $("#player"+($currplayer+1)+",#score"+($currplayer+1)+",#playerin"+($currplayer+1)+", #playernameinput"+($currplayer+1)+"").addClass('currentplayer');
                    	}else{
                    		$playerhits[$currplayer]--;
                    	}
                    	$history--;
                    	$scoreshistory.pop();
                    	for(var i = 0; i < $numplayers; i++){
                    		var oldscorer = '#score'+(i+1);
                    		$(oldscorer).html($scoreshistory[$scoreshistory.length-1][i]);
                    	}
                    	}
                    })
                    var updateSessInt;
                  <?php if(isset($_SESSION["playernames"])){ ?>
                  $nameinputs = "<?php echo $_SESSION["playernames"]; ?>";
                  clearInterval(updateSessInt);
                  $nameinputs = $nameinputs.split("~,~");

                  for(var i = 0; i < $numplayers; i++){
                    var namestrid = '#playernameinput'+(i+1);
                    $(namestrid).prop('value',$nameinputs[i]);
                  }
                  //updateSessionVariables();
                   updateSessInt = setInterval(updateSessionVariables,1000);
                  <?php }else{ ?>
                  $nameinputs = [];
                  updateSessionVariables();
                  updateSessInt = setInterval(updateSessionVariables,1000);
                  <?php } ?>
                    
                  <?php if(isset($_SESSION["numplayers"])){ ?>
                  
                  <?php }else{  ?>
                    updateScores();
                  <?php }       ?>
                  $('#newgame').click(function(event){
                    event.preventDefault();
                    if (confirm("Starting a new game")) {
                    clearInterval(updateSessInt);
                    updateSessInt = undefined;
                    $('#newgameform').submit();
                  }
                  })
                  $('#endgame').click(function(event){
                    event.preventDefault();
                    if (confirm("Exiting to home page")) {
                    clearInterval(updateSessInt);
                    updateSessInt = undefined;
                    $('#newinput').prop('value','end');
                    $('#newgameform').submit();
                  }
                  })
                  })
//ADDED FEB 11
function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
  var angleInRadians = (angleInDegrees-90) * Math.PI / 180.0;

  return {
    x: centerX + (radius * Math.cos(angleInRadians)),
    y: centerY + (radius * Math.sin(angleInRadians))
  };
}

function describeArc(x, y, radius, startAngle, endAngle){

    var start = polarToCartesian(x, y, radius, endAngle);
    var end = polarToCartesian(x, y, radius, startAngle);

    var largeArcFlag = endAngle - startAngle <= 180 ? "0" : "1";

    var d = [
        "M", x, y,
        "L", start.x, start.y,
        //"M", start.x, start.y, 
        "A", radius, radius, 0, largeArcFlag, 0, end.x, end.y,
        "L", x, y
    ].join(" ");

    return d;       
}
function describeArc2(x, y, radius, startAngle, endAngle){

    var start = polarToCartesian(x, y, radius, endAngle);
    var end = polarToCartesian(x, y, radius, startAngle);
    var start2 = polarToCartesian(x, y, radius*0.9, endAngle);
    var end2 = polarToCartesian(x, y, radius*0.9, startAngle);

    var largeArcFlag = endAngle - startAngle <= 180 ? "0" : "1";

    var d = [
        "M", start.x, start.y, 
        //"L", start.x, start.y,
      //"L", end2.x, end2.y,
        //"A", radius, radius, 0, largeArcFlag, 0, end2.x, end2.y,
        "A", radius, radius, 0, largeArcFlag, 0, end.x, end.y,
      "L", end2.x, end2.y,
       "A", radius*-.9, radius*0.9, 0, largeArcFlag, 1, start2.x, start2.y,
      "L", start.x, start.y
        
    ].join(" ");


    return d;       
}
function describeArc3(x, y, radius, startAngle, endAngle){

    var start = polarToCartesian(x, y, radius*0.5, endAngle);
    var end = polarToCartesian(x, y, radius*0.5, startAngle);
    var start2 = polarToCartesian(x, y, radius*0.42, endAngle);
    var end2 = polarToCartesian(x, y, radius*0.42, startAngle);

    var largeArcFlag = endAngle - startAngle <= 180 ? "0" : "1";

    var d = [
        "M", start.x, start.y, 
        //"L", start.x, start.y,
      //"L", end2.x, end2.y,
        //"A", radius, radius, 0, largeArcFlag, 0, end2.x, end2.y,
        "A", radius, radius, 0, largeArcFlag, 0, end.x, end.y,
      "L", end2.x, end2.y,
       "A", radius*-.9, radius*0.9, 0, largeArcFlag, 1, start2.x, start2.y,
      "L", start.x, start.y
        
    ].join(" ");


    return d;       
}

function describeArcText(x, y, radius, startAngle, endAngle){

    var text = polarToCartesian(x, y, radius*0.9, (startAngle+endAngle)/2);       return text;
}

var svgrad = $('svg').width()/2;
/*
document.getElementById("arc1").setAttribute("d", describeArc(svgrad, svgrad, svgrad*0.8, -9, 9));
document.getElementById("arc2").setAttribute("d", describeArc2(svgrad, svgrad, svgrad*0.8, -9, 9));
document.getElementById("arc3").setAttribute("d", describeArc3(svgrad, svgrad, svgrad*0.8, -9, 9));
var arctext = describeArcText(svgrad, svgrad, svgrad, -9, 9);
document.getElementById("arctext1").setAttribute("x", arctext.x-13);
document.getElementById("arctext1").setAttribute("y", arctext.y);
*/
var dartnums = [20, 1, 18, 4, 13, 6, 10, 15, 2, 17, 3, 19, 7, 16, 8, 11, 14, 9, 12, 5];
var dartfill=['black', 'wheat'];
var multfill=['red', 'green'];
// KEEP THIS BELOW TO HELP GENERATE HtML FOR SVG!
/*for(var k = 0; k < dartnums.length; k++){
  if(k%2==0 || k==0){
    var colorfill = 'black';
    var multfill = 'red';
  }else{
    var colorfill = 'wheat';
    var multfill = 'green';
  }
  $('svg').append('<text id="arctext'+dartnums[k]+'" fill="white" font-size="26">'+dartnums[k]+'</text><path id="arc'+dartnums[k]+'" class="overlay" fill="'+colorfill+'" stroke="#4b4b4b" stroke-width="5px"/><path id="arc'+dartnums[k]+'_2" class="overlay" fill="'+multfill+'" stroke="#4b4b4b" stroke-width="5px" /><path id="arc'+dartnums[k]+'_3" class="overlay" fill="'+multfill+'" stroke="#4b4b4b" stroke-width="5px"/>');
var textsubtract = (dartnums[k]).toString().length == 2 ? 10 : 6.5;
document.getElementById("arc"+dartnums[k]).setAttribute("d", describeArc(svgrad, svgrad, svgrad*0.8, 18*k-9, 18*k+9));
document.getElementById("arc"+dartnums[k]+"_2").setAttribute("d", describeArc2(svgrad, svgrad, svgrad*0.8, 18*k-9, 18*k+9));
document.getElementById("arc"+dartnums[k]+"_3").setAttribute("d", describeArc3(svgrad, svgrad, svgrad*0.8, 18*k-9, 18*k+9));
var arctext = describeArcText(svgrad, svgrad, svgrad, 18*k-9, 18*k+9);
document.getElementById("arctext"+dartnums[k]).setAttribute("x", arctext.x-textsubtract);
document.getElementById("arctext"+dartnums[k]).setAttribute("y", arctext.y);
}*/
var ogcolor;
$('.overlay').mouseover(function(){
  ogcolor = $(this).attr('fill');
  $(this).attr('fill','#00bfff');
})
$('.overlay').mouseout(function(){
  $(this).attr('fill',ogcolor);
})
var initialscore;
$('.overlay').click(function(){
  var thisid = $(this).attr('id');
  var thisarray = thisid.replace("arc","").split("_");
  var thisnum = thisarray[0];
  var thishits = thisarray[1];
  var thisplayerhits = $playerhits[$currplayer];
  if(thisplayerhits == 0){
  	initialscore = parseInt($("#score"+($currplayer+1)).html());
  }
  if(thisplayerhits<3){

  if(thishits){
    
  }else{
    thishits = 1;
  }
  	
  	var scoreadded = 0;
  	var scoresubtracted = thisnum*thishits;
  	var newscore = parseInt($("#score"+($currplayer+1)).html())-scoresubtracted;
  		if(newscore == 0 && thishits == 2){
  			console.log('gameover');
        if($('#playernameinput'+($currplayer+1)).val()==''){
          var winner = 'Player '+($currplayer+1);
        }else{
          var winner = $('#playernameinput'+($currplayer+1)).val();
        }
        gameOver(winner);
  			$("#score"+($currplayer+1)).html(newscore);
  		} else if(newscore > 1) {
  			$("#score"+($currplayer+1)).html(newscore);
  		} else {
        flash('.bust');
  			$("#score"+($currplayer+1)).html(initialscore);
  			$('#next').click();
  			return;
  		}
  		
      function flash(element){
        $(element).fadeIn(function(){
          $(element).fadeOut(1000).delay(1000);
        })
      }

  //$('#submit').click();  
  $playerhits[$currplayer]++;
  	if($playerhits[$currplayer]==3){
  		$lasthit.push(2);
  		$playerhits[$currplayer] = 0;
  		$("#player"+($currplayer+1)+",#score"+($currplayer+1)+",#playerin"+($currplayer+1)+", #playernameinput"+($currplayer+1)+"").removeClass('currentplayer');
  		if($currplayer<$numplayers-1){
  			$currplayer++;
  		}else{
  			$currplayer = 0;
  		}
  		$("#player"+($currplayer+1)+",#score"+($currplayer+1)+",#playerin"+($currplayer+1)+", #playernameinput"+($currplayer+1)+"").addClass('currentplayer');
  	}  
  	$history++;
  	updateScores();
  }
})


//dragElement(document.getElementById("mysvg"));

function dragElement(elmnt) {

  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id)) {
    // if present, the header is where you move the DIV from:
    document.getElementById(elmnt.id).onmousedown = dragMouseDown;
  } else {
    // otherwise, move the DIV from anywhere inside the DIV: 
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    var body = document.body,
    html = document.documentElement;

var height = Math.max( body.scrollHeight, body.offsetHeight, 
                       html.clientHeight, html.scrollHeight, html.offsetHeight );
    if(elmnt.offsetTop - pos2 >= $topbound && elmnt.offsetTop - pos2 < height-600+$topbound){
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
  }
  if(elmnt.offsetLeft - pos1 >= $leftbound && elmnt.offsetLeft - pos1 < window.innerWidth-40+$leftbound){
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
  }
  
  if (document.getElementById(elmnt.id)) {
    // if present, the header is where you move the DIV from:
    
    document.getElementById(elmnt.id+"header").addEventListener('touchstart', dragTouchDown, false);
  } else {
    // otherwise, move the DIV from anywhere inside the DIV: 
    elmnt.addEventListener('touchstart', dragTouchDown, false);
  }

  function dragTouchDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.touches[0].clientX;
    pos4 = e.touches[0].clientY;
    document.addEventListener('touchend', closeDragTouchElement, false)
    // call a function whenever the cursor moves:
    document.addEventListener('touchmove', elementTouchDrag, false)
  }

  function elementTouchDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.touches[0].clientX;
    pos2 = pos4 - e.touches[0].clientY;
    pos3 = e.touches[0].clientX;
    pos4 = e.touches[0].clientY;
    // set the element's new position:
    var body = document.body,
    html = document.documentElement;

var height = Math.max( body.scrollHeight, body.offsetHeight, 
                       html.clientHeight, html.scrollHeight, html.offsetHeight );
    if(elmnt.offsetTop - pos2 >= $topbound && elmnt.offsetTop - pos2 < height-600+$topbound){
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
  }
  if(elmnt.offsetLeft - pos1 >= $leftbound && elmnt.offsetLeft - pos1 < window.innerWidth-40+$leftbound){
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }
  }

  function closeDragTouchElement() {
    // stop moving when mouse button is released:
    document.ontouchend = null;
    document.ontouchmove = null;
  }
  
  
  
}

$('.fa-compress').click(function(){
  var newscale = 1;
  var compressint = setInterval(function(){
    if(newscale>0.5){
      $('#mysvg').css('transform','scale('+newscale+')');
      newscale -= 0.1;
    }else{
      if($('#mysvg').offset().top > 673){
        $('#mysvg').css('top','500px');
      }
      newscale += 0.1;
      $('.fa-compress').hide();
      $('.fa-expand').show();
      $topbound = -580*newscale/2;
      $leftbound = -600*newscale/2;
      clearInterval(compressint);
    }
    
  },25)
})
$('.fa-expand').click(function(){
  var newscale = 0.5;
  var expandint = setInterval(function(){
    if(newscale<1){
      $('#mysvg').css('transform','scale('+newscale+')');
      newscale += 0.1;
    }else{
      $('.fa-expand').hide();
      $('.fa-compress').show();
      if($('#mysvg').offset().top < 0){
        $('#mysvg').css('top','0');
      }
      if($('#mysvg').offset().left < 0){
        $('#mysvg').css('left','0');
      }
      $topbound = 0;
      $leftbound = 0;
      clearInterval(expandint);
    }
  },25)
})

//$('.fa-compress').click();
//$('#mysvg').css({'transform':'scale(0.5)','top':'320px','left':($(document).width()/2)-300+'px'});
$('.fa-compress').hide();
$('.fa-expand').show();

//END

// Game OVer PAge

let W = window.innerWidth;
                  let H = window.innerHeight;
                  const canvas = document.getElementById("canvas");
                  const context = canvas.getContext("2d");
                  const maxConfettis = window.innerWidth/15;
                  const particles = [];
                  
                  const possibleColors = [
                  "DodgerBlue",
                  "OliveDrab",
                  "Gold",
                  "Pink",
                  "SlateBlue",
                  "LightBlue",
                  "Gold",
                  "Violet",
                  "PaleGreen",
                  "SteelBlue",
                  "SandyBrown",
                  "Chocolate",
                  "Crimson"
                  ];
                  
                  function randomFromTo(from, to) {
                      return Math.floor(Math.random() * (to - from + 1) + from);
                  }
                  
                  function confettiParticle() {
                  this.x = Math.random() * W; // x
                  this.y = Math.random() * H - H; // y
                  this.r = randomFromTo(11, 33); // radius
                  this.d = Math.random() * maxConfettis + 11;
                  this.color =
                  possibleColors[Math.floor(Math.random() * possibleColors.length)];
                  this.tilt = Math.floor(Math.random() * 33) - 11;
                  this.tiltAngleIncremental = Math.random() * 0.07 + 0.05;
                  this.tiltAngle = 0;
                  
                  this.draw = function() {
                      context.beginPath();
                      context.lineWidth = this.r / 2;
                      context.strokeStyle = this.color;
                      context.moveTo(this.x + this.tilt + this.r / 3, this.y);
                      context.lineTo(this.x + this.tilt, this.y + this.tilt + this.r / 5);
                      return context.stroke();
                  };
              }

              function Draw() {
                  const results = [];
                  
                  // Magical recursive functional love
                  requestAnimationFrame(Draw);
                  
                  context.clearRect(0, 0, W, window.innerHeight);
                  
                  for (var i = 0; i < maxConfettis; i++) {
                      results.push(particles[i].draw());
                  }
                  
                  let particle = {};
                  let remainingFlakes = 0;
                  for (var i = 0; i < maxConfettis; i++) {
                      particle = particles[i];

                      particle.tiltAngle += particle.tiltAngleIncremental;
                      particle.y += (Math.cos(particle.d) + 3 + particle.r / 2) / 2;
                      particle.tilt = Math.sin(particle.tiltAngle - i / 3) * 15;

                      if (particle.y <= H) remainingFlakes++;

                  // If a confetti has fluttered out of view,
                  // bring it back to above the viewport and let if re-fall.
                  if (particle.x > W + 30 || particle.x < -30 || particle.y > H) {
                      particle.x = Math.random() * W;
                      particle.y = -30;
                      particle.tilt = Math.floor(Math.random() * 10) - 20;
                  }
              }

              return results;
          }

          window.addEventListener(
              "resize",
              function() {
                  W = window.innerWidth;
                  H = window.innerHeight;
                  canvas.width = window.innerWidth;
                  canvas.height = window.innerHeight;
              },
              false
              );

                  // Push new confetti objects to `particles[]`
                  for (var i = 0; i < maxConfettis; i++) {
                      particles.push(new confettiParticle());
                  }
                  
                  // Initialize
                  canvas.width = W;
                  canvas.height = H;
                  Draw();

                  function gameOver(winner){
                    $('#gameoverpage').css('height','100%');
                    $('#canvas').show();
                    $('#winner').html(winner);
                    $('#winnerintro').css('top',$('#undo').offset().top-60+'px');
                    $('#winnerintro').show();
                  }

</script>
</body>


</html>



