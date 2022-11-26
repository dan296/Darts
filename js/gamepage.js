//What happens when someone starts a game
/*function isMobile() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}*/
var userclick = 0;
var heightscroll;
// var showinggamecode = false; SET IN getlocation.js because that script is shared with index.php
function copyGameCode(gc){
  /* Get the text field */
  var copyText = "https://www.gamenight.plus/"+gc;
    var $temp = $("<input>");
  $("body").append($temp);
  $temp.val(copyText).select();
  document.execCommand("copy");
  $temp.remove();

  $('#copy-link').html('Link Copied!');
  setTimeout(function(){
      $('#copy-link').html('<i class="fas fa-copy"></i> Copy Game Link');
  }, 1000)
}

function blurBackground(){
  $('#header, #newinstructions, #controlbars, #pagewrapper, #vol, #feedbacklogo, #aboutlogo').css('filter','blur(10px)');
  }
function unblurBackground(){
  $('#header, #newinstructions, #controlbars, #pagewrapper, #vol, #feedbacklogo, #aboutlogo').css('filter','unset');
}

$('#userstartgamebutton').click( function(event) {

    if($('#gamesetupform input[name="gamename"]').val()== "Wildcard Cricket"){
	event.preventDefault();
	$.ajax({
			async: 'false',
			type: 'post',
			url: '../bullseye/clearSession.php',
			data: {clearing: true},
			success: function(data){
			    if(data){
			        console.log(data);
			    window.location.href="https://www.gamenight.plus/bullseye/play/";
			    }
			}
	})
    
  }else if($('#gamesetupform input[name="gamename"]').val()== "301"){
  event.preventDefault();
  $.ajax({
			async: 'false',
			type: 'post',
			url: '../bullseye/clearSession.php',
			data: {clearing: true},
			success: function(data){
			    if(data){
			    window.location.href="https://www.gamenight.plus/bullseye/play-01/";
			    }
			}
	})
  }else{
  	event.preventDefault();
  	getLocation();
  	showinggamecode = true;
    $('#warning').hide();
  	userclick = 1;
	$('#join, #nearbygames').fadeOut();
	$('#social,#donate, #popup').fadeOut();
	$('#pagewrapper').fadeOut();
  $('#controlpage').fadeOut();
  $('#controlbars').fadeOut();
	$('#footer').animate({
		height: '100%'
	}, 1000, 'easeInBack', function(){
		//Spinning loading animation
		var target = document.getElementById('footer');
		var spinner = new Spinner(opts).spin(target);

		//Ajax code for game set up now that the form can't be changed and the loading animation is being displayed
		//Ajax => PHP => MySQL => Return a joincode for user to share with party
			//Wait for Ajax to finish everything before showing the gamecode and giving user the joingame button
		$.ajax({
			async: 'false',
			type: 'post',
			url: '../gamecreate/gamecreate.php',
			data: $('#gamesetupform').serialize(),
			success: function(data){
				$('.spinner').fadeOut();
				$('#footer').append(
					'<div id="backarrow"><i class="far fa-arrow-alt-circle-down" aria-hidden="true"></i></div><div id="gamecode"><p id="gamecodeprompt">Here is your game code:</p>'
					+ data + 
					'<div id="copy-link" onclick="copyGameCode(\''+data.substring(0,5)+'\')"><i class="fas fa-copy"></i> Copy Game Link</div></div><div id="userjoingame">Share the code with your party, <br />then click the button below to join the game yourself.<div id="mobilepref">We recommend playing on a mobile device. <br /> Just use the code above to join the game on your device without clicking the button below.</div><form method="POST" id="joingameform"><input type="hidden" name="gamecode" value="'
					+ data.replace(/\n/g, '') +
					'"><input type="submit" id="userjoingamebutton" value="Join Game"></form></div>'
				);
				$('#userjoingamebutton').css('color',color);
				$('#userjoingamebutton').hover(function(){
				    $(this).css('color', "white");
            	},function(){
            		$(this).css('color', color);
            	});



var checkplayersinterval;
var gamecode;
var name;
var joinedwaitingroom = 0;
$('#gamecodeinput').prop('value',data.replace(/\n/g, ''));
$('#vericon').html('<i style="color:white;" class="fa fa-check-circle"></i>');
$('#vericon').show();

		$('#userjoingamebutton').click(function(evt){
        evt.preventDefault();
        $('#joinbutton').click();
        //$('#footer').append("<div id='joinGameSubtitle' style='display: none; font-family: Arial; position: fixed; width: 100%; bottom: 200px; font-size: 15pt; text-align: center;'>Taking you to your game...</div>");
        $('#joinGameSubtitle').hide();
        $('#backarrow, #userjoingame, #gamecode').stop();
        $('#backarrow, #userjoingame, #gamecode').fadeOut(function(){
          $(function () {
              var $element = $('.spinner, #joinGameSubtitle');
              $element.fadeIn(1000).delay(1500).fadeOut(1000).delay(250).fadeIn(1000);
              setInterval(function () {
                  $element.fadeIn(1000).delay(1500).fadeOut(1000).delay(250).fadeIn(1000);
              }, 2500);
          });
        })
    })

				$('#backarrow').fadeIn();
				$('#gamecode').fadeIn();
				$('#userjoingame').delay(500).fadeIn(1500);
				if(!$.browser.mobile){
					$('#mobilepref').fadeIn();
				}
				//What happens when someone clicks the backarrow
               
               
				$('#backarrow').click( function() {	
                    
					unblurBackground();
						if($(document).innerWidth()<=812){
               heightscroll = 140;
               } else{
               heightscroll = 140;
               }
					userclick = 0;
					
					$('#backarrow').fadeOut();
					$('#gamecode').fadeOut();
					$('#userjoingame').fadeOut();
                      $('#backarrow').remove();
                      $('#gamecode').remove();
                      $('#userjoingame').remove();
					$('#footer').animate({
						height: heightscroll+"px"
					}, 1000, 'easeOutBack', function(){
						$('#join').fadeIn(function(){});
						$('#social,#donate, #popup').fadeIn();
						$('#nearbygames').css('opacity','1');
            //if (isMobile()) {
            	if($(document).innerWidth()<=812){
            $('#controlbars').fadeIn();
            $('#controlpage').fadeIn();
        }
            //$('#pagewrapper').css('filter','unset');
          //}
						$('#pagewrapper').fadeIn(function(){
							window.location.href = "#gamesetup";
              showinggamecode = false;
						});
					});
				});
			}
		});
	});
}
$('#nearbygames').fadeOut(200);
});

$('#cancelbutton').click(function () {
  $('#nearbygames').fadeOut(200);
})

//Increasing and Decreasing Buttons for Gamesetuptables
$(function(){
  $("#gamesetuptable .inc").append('<div class="charcheck" id="incholder"><div id = "incminus" class="inc_button minus"><i id = "incminus" class="fa fa-minus-circle inc_button minus"><div style="opacity:0;display:inline-block;">-</div></i></div><div id = "incplus" class="inc_button plus"><i id = "incplus" class="fa fa-plus-circle inc_button plus"><div style="opacity:0;display:inline-block;">+</div></i></div></div>');
	
  $(".inc_button").on("click", function() {
		var $button = $(this);
		var oldValue = parseInt($button.parent().parent().find("input").val());
		var newVal = oldValue;
		if ($button.text() == "+" && oldValue < parseInt($button.parent().parent().find("input").attr("max"))) {
			if ($)
                        
                        var newVal = parseFloat(oldValue) + gameIncVal;
		}
		if ($button.text() == "-" && oldValue > parseInt($button.parent().parent().find("input").attr("min"))) {
			var newVal = parseFloat(oldValue) - gameIncVal;
		}
		$button.parent().parent().find("input").val(newVal);

		var total = 0;
		$('.tadd .quantity').each(function(){
			total += parseInt(this.value);
		});
		$('.total .quantity').val(total);
	});
});
function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result
    ? {
    r: parseInt(result[1], 16),
    g: parseInt(result[2], 16),
    b: parseInt(result[3], 16)
    }
    : null;
}

function opaqueColorChange(color, opc){
    if(color[0]=='r'){
        var str = color;
        var newstr = str.substring(0,3)+"a"+str.substring(3,str.length-1)+", "+opc+")";
	    return newstr;
    }else{
        var res = hexToRgb(color);
        var str = "rgba("+res.r+","+res.g+","+res.b+","+opc+")";
	    return str;
    }
    
	
}

function getRGB(str){
  var match = str.match(/rgba?\((\d{1,3}), ?(\d{1,3}), ?(\d{1,3})\)?(?:, ?(\d(?:\.\d?))\))?/);
  return match ? {
    r: match[1],
    g: match[2],
    b: match[3]
  } : {};
}

function darkColorChange(color, dial){
    if(color[0]=='r'){
        var colors = getRGB(color);
        var newstr = "rgb("+(parseInt(colors.r)+dial)+","+(parseInt(colors.g)+dial)+","+(parseInt(colors.b)+dial)+")";
	    return newstr;
    }else{
        var res = hexToRgb(color);
        var str = "rgb("+(res.r+dial)+","+(res.g+dial)+","+(res.b+dial)+")";
	    return str;
    }
    
	
}


    
//Color from homepage carrying over to gamepage, scroll movement, and footer movement
$(document).ready(function() {
 



    //$('#pagecontent').css('margin-top',$('#gamepageheader').height()+40);

    //FIND NEARBY GAMES VV 
/*$('#joincontainer').click(function(){
  nearbyCheck();
})*/

$('#scrollcontainer').css('height',(($(window).height()) - ($("#footer").height())));
//$('#scrollbar').draggable({ axis: "y", containment: 'parent'});
                  
$(function(){
	color = localStorage['color'];
  if(color == undefined){
    color = randcolor();
  }
  
$('#cpo, html').css('background-color',color);
  $('#templogo').css('border-color', color);

	$('#templogo').css('border-color', color);
	$('#templogo, .controlbutton').hover(function(){
		$(this).css('background-color', darkColorChange(color, -10));
	},function(){
		$(this).css('background-color', 'transparent');
	});
  $('.fa-info-circle').css('color',color);
  $('#charpage').css('background-color',color);
    $('#controlbars div').css('background-color',color);
    $('#controlbars').hover(function(){
      $('#controlbars div').css('background-color','#1c1c1c');
    }, function(){
      $('#controlbars div').css('background-color', color);
    });
    $('#controlpage').css('background-color', color);
	$('#pagetitle, .instructionsheading').css('color', color);
	$('#pagetitle svg').css('fill', color);
	$('.pagenavbarrierelements').css('background-color', color);
	$('.pagenavbarrierelements').css('border-color', color);
	$('#navunderlineelement').css('background-color', color);
	$('#navunderlineelement').css('border-color', color);
  $('.inc_button').css('color',color);
	$('#userstartgamebutton, #userresetbutton, #gamesetuptable #button1, #gamesetuptable #button2, #selectgamestyle').css({"background-color" : "white", 'color': color, 'border-color': color});
	$("#userstartgamebutton, #userresetbutton").mouseover(function() {
		
		$(this).css({"background-color": color, "border-color": color, "color": "white"});
	});
	$("#userstartgamebutton, #userresetbutton").mouseout(function() {
  $(this).css({"background-color" : "white", 'color': color, 'border-color': color});
	});

  
    $('#donationpage').css('background-color', opaqueColorChange(color, 0.85));
	//$('#footer').css('background-color', opaqueColorChange(color, 0.85));
	$('#footer').css('background-color', color);

    $('#vol').css('color', color);
	$('#headerfader').css({'background-image': 'linear-gradient(to top, transparent,' + color + ')', 'opacity' : '0.25'});
	$('#scrollbar').css('background-color', color);
	
	$('.scrollbar').hover(function(){
		$(this).css('opacity','1');
	}, function() {
		$("this").css('opacity','0');
	});
var i = null;
	$("#pagewrapper").mousemove(function() {
		clearTimeout(i);
		$("#scrollbar").css('opacity','0.5');
		  i = setTimeout(function () {
        		$("#scrollbar").css('opacity','0');
			
   		 }, 1500);
		}).mouseleave(function() {
   	 	clearTimeout(i);
    		$("#scrollbar").css('opacity','0'); 
	});

	$('#scrollbar').mouseover(function(){
		$(this).css('opacity','1');
	});
  
  $('.fa-info-circle').click(function(){
                             $('#charpage').css('height','100%');
                             })
  $('.fa-info-circle').mouseover(function(){
                             $(this).css('color','#00bfff');
                             })
  $('.fa-info-circle').mouseout(function(){
                                 $(this).css('color',color);
                                 })
  $('#backfromchar').click(function(){
                           $('#charpage').css('height','0%');
                           $('#charpage').animate({
                                                  scrollTop: 0
                                                  }, 2000);
                           })
	
});
});
