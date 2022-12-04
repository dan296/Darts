var thispagecolor;
var allowmouseout1 = true;
var allowmouseout2 = true;
$('#button1').click(function(evt){
	allowmouseout1 = false;
	allowmouseout2 = true;
	thispagecolor = $('.instructionsheading').css('color');
	evt.preventDefault();
	$('#changegamename').prop('value',this.innerHTML);
		$('#button1').css({'background': thispagecolor, 'color': '#1d1d1d'});
		$('#button2').css({'background': 'none', 'color': thispagecolor});

})

//Default button1 clicked
setTimeout(function(){
	$('#button1').click();
}, 500);


$('#button2').click(function(evt){
	allowmouseout2 = false;
	allowmouseout1 = true;
	evt.preventDefault();
	$('#changegamename').prop('value',this.innerHTML);
		$('#button2').css({'background': thispagecolor, 'color': '#1d1d1d'});
		$('#button1').css({'background': 'none', 'color': thispagecolor});

		$("#gamesetuptable #button2").mouseover(function(evt) {
			evt.preventDefault();
		});
	
})

$("#gamesetuptable #button1").mouseover(function() {
	thispagecolor = $('.instructionsheading').css('color');
		$(this).css({"background-color": thispagecolor, "border-color": thispagecolor, "color": "#1d1d1d"});
	});

	$("#gamesetuptable #button2").mouseover(function() {
thispagecolor = $('.instructionsheading').css('color');
		$(this).css({"background-color": thispagecolor, "border-color": thispagecolor, "color": "#1d1d1d"});
	
	});

	$("#gamesetuptable #button1").mouseout(function(evt) {
		if(allowmouseout1){
			$(this).css({"background-color": '#1d1d1d', "border-color": thispagecolor, "color": thispagecolor});
		}
	});

	$("#gamesetuptable #button2").mouseout(function() {
		if(allowmouseout2){
			$(this).css({"background-color": '#1d1d1d', "border-color": thispagecolor, "color": thispagecolor});
		}
	});


