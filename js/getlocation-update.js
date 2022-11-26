var color;
var pagecolor;
var pgclr = [];

//var aboutText = '';
var idgame = ['ma', 'fb', 'cg', 'gh', 'cp', 'wr', 'mf', 'pd', 'bb', 'gl', 'ff', 'pr', 'dw', 'mr', 'hb'];
var prcolor;

function setColors(){
  for (i = 0; i < idgame.length; i++){
  color = randcolor();
  pgclr.push(color);
  //$('#' + idgame[i] + 'img').css('background-color', color);
  $('#' + idgame[i] + 'svg').css('background-color', color);
  $('#' + idgame[i]).css('color', color);
  $('#' + idgame[i]).css('box-shadow', '0 0 50px' + color);
    $('#' + idgame[i]+'txt').css('fill', color);

  }


$('.gamebox').hover(
  function() {
    var that = this;
    $('.boxtext', that).stop();
    $('.boxsvg', that).stop();
    if(that.id=="pr"){
      $('.boxsvg', that).css('background-color', prcolor);
    }else{
      $('.boxsvg', that).css('background-color', $('.boxtext', that).css("color"));
    }
    
    $('.boxtext', that).stop().animate({
      top: "500px"
    }, 250, function(){
      /*$('.boximage', that).stop().animate({
        width: "100%",
        height: "100%"
      }, 500, 'easeOutBack');*/
      $('.boxsvg', that).stop().animate({
        opacity: "1"
      }, 500, 'easeOutBack');
      $('.boxsvg .addspath', that).addClass('spath'); 
      $('.boxsvg .addpath', that).addClass('path'); 
      $('.boxsvg .addmpath', that).addClass('mpath'); 
      $('.boxsvg .addlpath', that).addClass('lpath'); 
      $('.boxsvg .addfillin', that).addClass('fillin');
      $('.boxsvg .addflip', that).addClass('flip');
    });
  },
  function() {
    var that = this;
    $('.boxtext', that).stop();
    $('.boxsvg', that).stop();
    
    $('.boxsvg', that).stop().animate({
      opacity: "0"
    }, 250, function(){
      color = randcolor();
      $(that).css('box-shadow', '0 0 50px' + color);
      $('.boxtext', that).css('color', color);
      $('.boxtext', that).css('fill', color);       
      $('.boxtext', that).stop().animate({
        top: "0"
      }, 500, function(){
        
        $('.boxsvg', that).css('background-color', color);
        $('.boxsvg .addspath', that).removeClass('spath');
        $('.boxsvg .addpath', that).removeClass('path');
        $('.boxsvg .addmpath', that).removeClass('mpath'); 
        $('.boxsvg .addlpath', that).removeClass('lpath');  
      $('.boxsvg .addfillin', that).removeClass('fillin');
      $('.boxsvg .addflip', that).removeClass('flip');
        pagecolor = color;
      });
    });
  }
);  

$('.pagewrapper, #header').click(function(){
  $('#controlback').click();
})
  

//Linking to Gamepages from Gameboxes
$('.gamebox').click(function(){
  var id = $(this).attr('id');
  var pagecolor = $('.boxtext', this).css('color');
  localStorage.setItem('color', pagecolor);
  $("body").animate({ scrollTop: $(this).offset().top - $('#mainpage').offset().top -50}, 500);
  var gamepagefolder = $('.boxtext', this).attr('data-link');
  $('#gamepagetitle').load(gamepagefolder+id+'pagetitle.svg');
  $('#video').load(gamepagefolder+'video.dat');
  $('#instructions').load(gamepagefolder+'instructions.dat');

  var delay = 500;
  if(isMobile()){
    delay = 1750;
  }
  var gamepagedb = gamepagefolder.replace('/','');
  shareable_gamename = gamepagedb;
  $('#gamepagetitle').removeClass('animate__animated animate__bounceInDown');
  $(this).delay(delay).queue(function(next){
      showSection(gamepagedb, 'gamepage');
      $('#mainpagetitle').stop().fadeOut();
      $('body').addClass('body-background');
      $('#header').stop().fadeOut(150).delay(500).fadeIn();
      $('#gamenameinput').prop('value',gamepagedb);
      addOrRemovePageColor(1, pagecolor);
      $('.nologo').show();
      $('#gamepagetitle svg').show();
      $('#gamepagetitle').addClass('animate__animated animate__bounceInDown');
      $('#nearbyrows').addClass('gamepagenearbyrows');
      next();
    });
});
}

// Adding page color to game page section
function addOrRemovePageColor(truth, pagecolor){
  document.documentElement.style.setProperty('--gamepage-color', pagecolor);
  document.documentElement.style.setProperty('--connected-color', pagecolor);
  $("body").get(0).style.setProperty("--color", pagecolor);
  if(truth){
    $('#controlpage, #footer, #controlbars div').addClass('gamepage-background-color');
  }else{
    $('#controlpage, #footer, #controlbars div').removeClass('gamepage-background-color');
  }
}


setColors();

var showinggamecode = false;

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
function randcolor(){
    //NEW COLOR PALETTE
    var colorArray = [
                            "#4286f4",
                            "#7e52aa",
                            "#42b278",
                            "#e54e4e",
                            "#fc9c46",
                            "#ad3d73",
                            "#51a7de",
                            "#AE173D"
                            ];
                            return colorArray[Math.floor(Math.random()*colorArray.length)];
    //OLD CODE CREATES PURELY RANDOM COLORS THAT ARE NOT TOO DARK OR LIGHT
    /*colorcode = "";
    while(colorcode.length < 6){
        colorcode += [0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f'][Math.floor(Math.random()*16)];
    }
    newcolor = "#" + colorcode;
    var hex = hexToRgb(newcolor);
    var sum = hex.r + hex.g + hex.b;
    var lowdiff = (Math.abs(hex.r-hex.g) < 30) || (Math.abs(hex.g-hex.b) < 30) || (Math.abs(hex.b-hex.r) < 30);
    if(sum<100 || sum>400 || lowdiff){
        return randcolor();
    }else{
        return newcolor;
    }*/
}
var section = 'go_home';
$('#go_home').addClass('section-selected');
function showSection(thisid, id){
  //console.log(thisid);
  $('.controlbutton').removeClass('section-selected', 'gamepage-section-selected');
  $('body').removeClass('body-background');
  $('#nearbyrows').removeClass('gamepagenearbyrows');
  $('#'+thisid+'.controlbutton').addClass('section-selected');
  //$('.controlbutton').addClass('section-selected');
  $('#navunderlineelement').css('opacity', 0); 
  $('#controlback').click();
  if(section != thisid){
    section = thisid;
    $('#pagecontent').hide();
    $('#mainpage section').html('');
    var show_id = 'home';
    if(id == 'gamepage' || id=='about'){
      show_id = id;
    }else{
      $('#mainpage #home').load('./'+id+'.php', function() {
      setColors();
    });
    }
    
    $('section').stop().fadeOut(150);
    $('#mainpagetitle, #'+show_id).stop().delay(150).fadeIn(function(){
      //setColors();
      if($(document).width() > 812){
        $('#pagecontent').css('margin-top',40);
      }else{
        $('#pagecontent').css('margin-top',$('#gamepage_header').height()+40);
      }
        $('#pagecontent').show();
        $('#pagenav1 .navwords').click();
    });
  }
  $('#controlbars div').css('background', 'white');
  addOrRemovePageColor(0);
  $('.nologo').hide();
}

$('#controlbars').click(function(){
  shiftMain(200);
  //blurBackground();
  //$('body').css('overflow-y','auto');
  //$('body').css('-webkit-overflow-scrolling','auto');
  $('#controlpage').css('width','200px');
  //$('body').css('overflow','hidden');
  $(this).animate({opacity: 0});
  $('#controlback').css({'display':'initial','opacity':0});
  setTimeout(function(){
      $('#controlpage div').css({'opacity':1});
      }, 200);
})
$('#controlback').click(function(){
  
  //unblurBackground();
  //$('body').css('overflow','scroll');
  //$('body').css('-webkit-overflow-scrolling','touch');
  $('#controlpage div').css('opacity',0);
  $('#controlback').css({'display':'none','opacity':0});
  $("#controlpage").animate({ scrollTop: 0 }, "fast");
  //setTimeout(function(){
    $('#controlpage').css('width','0%');
    shiftMain(0);
    $('#controlbars').animate({opacity: 1});
  //}, 200);
})
$('#templogo').click(function(){
	window.location.href = "../";
});
$('.controlbutton, #go_terms, #go_privacy').click(function(){
  var section = this.id;
  var sectionid = this.id.replace('go_', '');
  var gamesection = this.id.replace('gp_', '');
  if(section.length > sectionid.length){
    showSection(this.id, sectionid);
    if(section == "go_about" || section == "go_shop"){
      $('#mainpagetitle').stop().fadeOut();
      $('#controlbars div').css('background', '#444');
      //$('#controlbars').addClass('body-background');
      //$('body').addClass('body-background');
    }
  } else if(section.length > gamesection.length){
    //video, gameseteup, instructions
    $('.controlbutton').removeClass('gamepage-section-selected');
    $(this).addClass('gamepage-section-selected');
    //console.log(gamesection);
    var headerHeight = 0;
    if($('#gamepage_header').offset().top < headerHeight || ($(document).width() - $('#controlpage').width() <= 812)){
      headerHeight = $('#gamepage_header').height();
    }
    //console.log(headerHeight);
    
      $('#gamepage').stop().animate({
        scrollTop: $('#'+gamesection).offset().top - $('#pagecontent').offset().top + headerHeight + 15
      }, 200, function(){
      })
    $('#controlback').click();

  }
})

function isMobile() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

var canvas = document.querySelector('#starrynight');
if(canvas){
  canvas.width = $(document).width();
  canvas.height = $(document).height();
}
innerWidth = $(document).width();
innerHeight = $(document).height();

function blurBackground(){
  $('#header, #newinstructions, #controlbars, #pagewrapper, #vol, #feedbacklogo, #aboutlogo, #profilelogo, #signoutlogo, #signinlogo').css('filter','blur(10px)');
}
function unblurBackground(){
  $('#header, #newinstructions, #controlbars, #pagewrapper, #vol, #feedbacklogo, #aboutlogo, #profilelogo, #signoutlogo, #signinlogo').css('filter','unset');
}

var shiftTimeout = false;
function shiftMain(translated){
  if(!pagenavclicked){
    $('#header, .pagewrapper').css('transform','translate('+translated+'px, 0px)');
    clearInterval(shiftTimeout);
    shiftTimeout = false;
    if(translated == 0){
      shiftTimeout = setTimeout(function(){
        $('#gamepage').css('transform','none');
      }, 500)
    }
  }
  
}
$(document).ready(function() {
  if(isMobile()){
    $('#fbpage').click(function(){
      $.get("fb://profile/175884013079091").done(function () {}).fail(function () {
        $('#outerlink').attr('href','https://www.facebook.com/gamenightplus/');
        $('#outerlink')[0].click();
      })
      $('#outerlink').attr('href','fb://profile/175884013079091');
      $('#outerlink')[0].click();
    })
    $('#igpage').click(function(){
      $.get("instagram://user?username=gamenightplus").done(function () {}).fail(function () {
        $('#outerlink').attr('href','https://www.instagram.com/gamenight.plus/');
        $('#outerlink')[0].click();
      })
      $('#outerlink').attr('href','instagram://user?username=gamenight.plus');
      $('#outerlink')[0].click();
    })
    $('#twtpage').click(function(){
      $('#outerlink').attr('href','twitter://user?screen_name=gamenightplus');
      $('#outerlink')[0].click();
      $.get("twitter://user?screen_name=gamenightplus").done(function () {
          $('#outerlink').attr('href','twitter://user?screen_name=gamenightplus');
          $('#outerlink')[0].click();
      }).fail(function () {
        $('#outerlink').attr('href','https://www.twitter.com/gamenightplus/');
        $('#outerlink')[0].click();
      })
    })
    $('#tchpage').click(function(){
      $('#outerlink').attr('href','twitch://open?stream=gamenightplus');
          $('#outerlink')[0].click();
      $.get("twitch://open?stream=gamenightplus").done(function () {
          $('#outerlink').attr('href','twitch://open?stream=gamenightplus');
          $('#outerlink')[0].click();
      }).fail(function () {
        $('#outerlink').attr('href','https://www.twitch.tv/gamenightplus');
        $('#outerlink')[0].click();
      })
    })
    /*$('#discpage').click(function(){
      $('#outerlink').attr('href','twitch://open?stream=gamenightplus');
          $('#outerlink')[0].click();
      $.get("twitch://open?stream=gamenightplus").done(function () {
          $('#outerlink').attr('href','twitch://open?stream=gamenightplus');
          $('#outerlink')[0].click();
      }).fail(function () {
        $('#outerlink').attr('href','https://www.twitch.tv/gamenightplus');
        $('#outerlink')[0].click();
      })
    })*/
  }else{
      $('#fbpage').attr('href','https://www.facebook.com/gamenightplus/');
      $('#igpage').attr('href','https://www.instagram.com/gamenight.plus/');
      $('#twtpage').attr('href','https://www.twitter.com/gamenightplus/');
      $('#tchpage').attr('href','https://www.twitch.tv/gamenightplus');
  }
  $('#ytpage').attr('href','https://www.youtube.com/channel/UCUaegLhnI4c2JPgmnFwSg6g');
  $('#discpage').attr('href', 'https://discord.gg/jEj8bpg');
  if($('#video').width()){
    $('#pagecontent').css('margin-top',$('#gamepage_header').height()+40);
  }

  var footerheight;
  if($('#footer').width()){
    if($(document).innerWidth()<=812){
      footerheight = 140;
      $('#gamecodeinput').css('width','300px');
    }else{
      footerheight = 140;
      $('#gamecodeinput').css('width','300px');
      $('#controlback').click();
    }
    $('#controlpage').animate({bottom: '140px'});
    $('#cancelbutton').click(function () {
       //$('#social, #social2, #donate, #popup').fadeIn();
       $('#footer').animate({height: footerheight+'px'});
       $('#footer').css('overflow', 'hidden');
       //console.log('it was cancel');
       $('#controlpage').animate({bottom: '140px'});
       //$("html, body").css('overflow','initial');
       $('#cancelbutton').hide();
       //unblurBackground();
     })
  }
  var onresize = function() {
    if($('#video').width()){
      if($(document).width() > 812){
        $('#pagecontent').css('margin-top',40);
      }else{
        $('#pagecontent').css('margin-top',$('#gamepage_header').height()+40);
      }
    }
    if(canvas){
      canvas.width = $(document).width();
      canvas.height = $(document).height();
    }
    innerWidth = $(document).width();
    innerHeight = $(document).height();
    if($('#footer').width()){
      if($(document).innerWidth()<=812){
        footerheight = 140;
        $('#gamecodeinput').css('width','300px');
      }else{
        footerheight = 140;
        $('#gamecodeinput').css('width','300px');
        if($('#donationpage').height()>0){
          $('#donationpage').css({'height':'auto','bottom':'140px'});
        }
        $('#controlback').click();
      }
      if($('#footer').height()<=140){
        $('#footer').css({'height': footerheight+'px'});
        //unblurBackground();
      }else{
        //blurBackground();
      }
    }
    if($('#contact').width() || $('#feedbackform').width()){
      if($('body').innerWidth()>812){
        if($('#donationpage').height()>0){
          //blurBackground();
        }else{
         $('#controlback').click();
        }
      }
    }
  }
  window.addEventListener("resize", onresize);
  if (isMobile()) {
  $('#joinbutton').click(function () {
    $(this).css({'background-color':'#38acec','border-color':'#38acec','color':'white'});
    $(this)
    .delay(200)
    .queue(function (next) {
      $(this).css({'background-color':'transparent','border-color':'white'})
      next();
      });
    });
  }
  $('#joingameform input[type="text"]').click(function () {
    $("html, body").animate({ scrollTop: 0 }, 100);
    $('#footer').animate({height: '100%'});

    //$("html, body").css('overflow','hidden');
    //$('body').css('-webkit-overflow-scrolling','auto');
    $('#controlback').click();
    $('#back2games').click();
    //$('#social, #social2,#donate, #popup').fadeOut();
    $('#cancelbutton').show();
    setTimeout(function(){
      $('#footer').css('overflow', 'scroll');
    }, 500);
    //blurBackground();
  });
  //FOR DONATION POPUP
  function changeOpacity(time){
    var el = document.getElementById('popup');
    var oel = document.getElementById('myPopup');
    if(el){
      if(el.style.opacity == 1){
        $(this)
        .delay(time)
        .queue(function (next) {
          $('.popup').css('opacity',0);
          $(this)
          .delay(1000)
          .queue(function (next) {
            changeOpacity();
            next();
          });
          next();
        });
      }else{
      $(this)
      .delay(time)
      .queue(function (next) {
        $('.popup').css('opacity',1);
        $(this)
        .delay(2000)
        .queue(function (next) {
          changeOpacity();
          next();
        });
        next();
        });
      }
    }
  }
  changeOpacity(500);
})

//VERIFICATION
if (isMobile()) {
    $pos = -5;
} else {$pos = -5;}
$(document).ready(function() {

  if(!isMobile()){
      //$('#vericon').css({'font-size':'26px','top':'4px'});
     }

//Shake vericon
(function($){
  $.fn.shake = function(settings) {
    if(typeof settings.interval == 'undefined'){
       settings.interval = 100;
    }

    if(typeof settings.distance == 'undefined'){
        settings.distance = 10;
    }

    if(typeof settings.times == 'undefined'){
      settings.times = 4;
    }

    if(typeof settings.complete == 'undefined'){
      settings.complete = function(){};
    }

    for(var iter=0; iter<(settings.times+1); iter++){
      $(this).animate({ right:((iter%2 == 0 ? settings.distance-$pos : (settings.distance * -1)-$pos)) }, settings.interval);
    }

    $(this).animate({ right: -1*$pos}, settings.interval, settings.complete);
  };
 })(jQuery);

 //Verification in input with check icons and exclamation icon
$('#gamecodeinput').on('input', function() {

if($('#gamecodeinput').val().length > 4){
  $('#joinbutton').attr('disabled', 'disabled');
  var gamecode = $("#gamecodeinput").val().toUpperCase();
  verifyGameExists(gamecode);
}else{
  $('#vericon').html('');
  $('#vericon').hide();
  $('#joinbutton').removeAttr("disabled");
}

})
})

function verifyGameExists(gamecode){
  $('#vericon').removeClass('animate__animated animate__tada'); 
  $.ajax({
    url: '../ajax/verifygame.php',
    type: 'POST',
    data: {gamecode: gamecode},
    dataType: "html",
    success: function(data){
      if(data==1){
        //console.log('Game exists');
        //$('#vericon').html('<i style="color:white;" class="fa fa-check-circle animate__animated animate__jello"></i>');
        $('#vericon').attr('src','../imgs/check-icon.png');
        $('#vericon').attr('title','');
        $('#vericon').show();
        $('#vericon').addClass('animate__animated animate__tada');
        //$('#vericon').toggleClass('')
        $('#joinbutton').removeAttr("disabled");
      }else {
        //$('#vericon').html('<i style="color:red;" class="fa fa-exclamation-circle" title="code does not exist!"></i>');
        $('#vericon').attr('src','../imgs/exclamation-icon.png');
        $('#vericon').attr('title','code does not exist!');
        $('#vericon').show();
        $('#vericon').shake({
          interval: 100,
          distance: 5,
          times: 2
        });
      }
    } 
  });
}

//ANIMATE .CSS for footer
$('#footer').addClass('animate__animated animate__slideInUp');
$('#mainpagetitle').toggleClass('animate__animated animate__bounceInDown');

//INHIBITING JOIN INPUT TO ALPHABET ONLY
function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8 || key == 13 || key == 37 ||key == 39);
};

// FEEDBACK FORM JS
$('#feedbackformsubmit').click(function(e){
  e.preventDefault();
  var name;
  var email;
  var gamename;
  var blurb;
  name = $('#feedbackformname').val();
  email = $('#feedbackformemail').val();
  gamename = $('select').val();
  blurb = $('#feedbackformblurb').val();
  if(name.replace(/\s/g, '').length == 0){
      $('#feedbackerror').html("Please enter your name.");
  }else if(email.replace(/\s/g, '').length == 0){
      $('#feedbackerror').html("Please enter your email.");
  }else if(gamename == ""){
      $('#feedbackerror').html("Please select a subject.");
  }else if(blurb.replace(/\s/g, '').length == 0){
      $('#feedbackerror').html("Please submit a comment.");
  }else{
     $.ajax({
      type: 'POST',
      url: '../../ajax/feedback.php',
      data: {name:name, email:email, gamename:gamename, blurb:blurb}
    });
    $('#feedbackform').fadeOut(function(){
      $('#thankyou').fadeIn(1000);
    });
    $('#thankyoureturn').click(function(){
      $('#go_home').click();
      $('#thankyou').fadeOut(function(){
        $('#feedbackform').delay(500).fadeIn();
      });
    });
  }
})


// END FEEDBACK FORM JS

// PAGE NAV JS UNDERLINE ELEMENT
var headerHeight = $('#gamepage_header').height();
var pagenavlocate;
var pagenavw;
var pagenavclicked = false;
var instDivs = ["video", "gamesetup", "instructions"];
var scrollBottom

function underlinebarmove(){
  scrollBottom = $('#gamepage').scrollTop();
  for(var i = 0; i < instDivs.length; i++){
      if(scrollBottom >= $('#'+instDivs[i]).offset().top - ($('#pagecontent').offset().top) - $('#header').offset().top + 10){
        pagenavw = $('#pagenav' + (i+1) + ' .navwords').width();
        pagenavlocate = $('#pagenav' + (i+1) + ' .navwords').offset().left - $('#controlpage').width();
        $('#navunderlineelement').stop().animate({
          left: pagenavlocate,
          width: pagenavw,
          opacity: 1
        }, 250);
      }
    }
}

//Onload underline bar move
$(window).load(underlinebarmove);

$(window).load(function(){
  $('#loader').delay(500).fadeOut();
});

var loadTime = 0;
setInterval(function(){
  loadTime++;
  if(loadTime > 5){
    $('#loader').delay(500).fadeOut();
  }
},1000);


//Onresize underline bar move
$(window).resize(underlinebarmove);

//Onscroll underline bar
$('#gamepage').scroll(underlinebarmove);

//Onclick changing underline bar location and scrolling page
$('.pagenavs .navwords').click(function(){
  var divelnum = parseInt($(this).parent().get(0).id.replace("pagenav", ""));
  var div = instDivs[divelnum - 1];
  $('.controlbutton').removeClass('gamepage-section-selected');
  $('#gp_'+div).addClass('gamepage-section-selected');
  $('#gamepage').stop().animate({
    scrollTop: $('#'+div).offset().top - ($('#pagecontent').offset().top) + 15
  }, 250, function(){
  });
})
// END OF PAGE NAV JS UNDERLINE ELEMENT

// GAMEPAGE.JS
function copyGameCode(gc){
  /* Get the text field */
  var url = window.location.href;

  /* Get the text field */
  var copyText = url+gc;
    var $temp = $("<input>");
  $("body").append($temp);
  $temp.val(copyText).select();
  document.execCommand("copy");
  $temp.remove();

  $('#copy-link').html('<i class="fas fa-clipboard-check"></i>');
  $('#copy-link').attr('title','Link copied!');
  setTimeout(function(){
      $('#copy-link').html('<i class="fas fa-copy"></i>');
  }, 1000)
  // ALLOWING TO SHARE NATIVE:
  const shareData = {
    url: copyText
  }
  if(navigator.share){
    navigator.share(shareData)
    .then(() => console.log('Share was successful.'))
    .catch((error) => console.log('Sharing failed', error));
  }
  
}
var chr_gc = '';
$('#userstartgamebutton').click( function(event) {
  event.preventDefault();
  if($('#gamesetupform input[name="gamename"]').val()== "Wildcard Cricket" || $('#gamesetupform input[name="gamename"]').val()== "301"){
    var dartURL = "";
    if($('#gamesetupform input[name="gamename"]').val()== "301"){
      dartURL = "-01";
    }
    $.ajax({
      async: 'false',
      type: 'post',
      url: '../bullseye/clearSession.php',
      data: {clearing: true},
      success: function(data){
        if(data){
            //console.log(data);
        window.location.href="https://www.gamenight.plus/bullseye/play"+dartURL+"/";
        }
      }
    })
  }else{
    getLocation();
    showinggamecode = true;
    $('#warning').hide();
    userclick = 1;
    $('#join').fadeOut();
    $('#nearbygames').hide();
    //$('#social, #social2, #donate, #popup').fadeOut();
    $('#gamepage div').fadeOut();
    $('#controlpage').fadeOut();
    $('#controlbars').fadeOut();
    $('#footer').animate({
      height: '100%'
    }, 1000, 'easeInBack', function(){
      //Spinning loading animation
      var target = document.getElementById('footer');
      var spinner = new Spinner(opts).spin(target);
      $('#footer').css('overflow', 'scroll');
      //Ajax code for game set up now that the form can't be changed and the loading animation is being displayed
      //Ajax => PHP => MySQL => Return a joincode for user to share with party
        //Wait for Ajax to finish everything before showing the gamecode and giving user the joingame button
      $.ajax({
        async: 'false',
        type: 'post',
        url: '../gamecreate/gamecreate.php',
        data: $('#gamesetupform').serialize(),
        success: function(data){
          var chromeClass = '';
          if(chromePresent){
            chromeClass = 'chrome-present';
          }
          $('.spinner').fadeOut();
          chr_gc = data.substring(0,5);
          $('#footer').append(
            '<div id="backarrow"><i class="far fa-arrow-alt-circle-down" aria-hidden="true"></i></div><div id="gamecode"><p id="gamecodeprompt">Here is your game code:</p>'
            + data + 
            '<button id="chromecast" class="'+chromeClass+'" is="google-cast-button"></button><div id="copy-link" title="Copy Game Link" onclick="copyGameCode(\''+data.substring(0,5)+'\')"><i class="fas fa-copy"></i> Copy Game Link</div></div><div id="userjoingame">Share the code with your party, <br />then click the button below to join the game yourself.<div id="mobilepref">We recommend playing on a mobile device. <br /> Just use the code above to join the game on your device without clicking the button below.</div><form method="POST" id="joingameform"><input type="hidden" name="gamecode" value="'
            + data.replace(/\n/g, '') +
            '"><input type="submit" id="userjoingamebutton" value="Join Game"></form></div>'
          );
          var checkplayersinterval;
          var gamecode;
          var name;
          var joinedwaitingroom = 0;
          $('#gamecodeinput').prop('value',data.replace(/\n/g, ''));
          //$('#vericon').html('<i style="color:white;" class="fa fa-check-circle"></i>');
          $('#vericon').attr('src','../imgs/check-icon.png');
          $('#vericon').show();

          $('#userjoingamebutton').click(function(evt){
            evt.preventDefault();
            $('#joinbutton').click();
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
            heightscroll = 140;
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
              //$('#social,#donate, #popup').fadeIn();
              //$('#nearbygames').css('opacity','1');
              $('#footer').css('overflow', 'hidden');
              $('#controlbars, #controlpage').fadeIn();
              $('#gamepage div').fadeIn(function(){
                showinggamecode = false;
              });
            });
          });
        }
      });
    });
  }
  $('#nearbygames').hide();
});

$('#cancelbutton').click(function () {
  $('#nearbygames').hide();
  $('#footer').css('overflow', 'hidden');
})
// END OF GAMEPAGE.JS

// ENABLING CHROME CAST OF GAMECODE
// Add this html: <button is="google-cast-button"></button>
function checkChrome(){
  window.__onGCastApiAvailable = function(isAvailable){
    if(!isAvailable){
        chromePresent = false;
        setTimeout(checkChrome, 5000);
        return false;
    }

    if(typeof cast === 'undefined'){
      chromePresent = false;
      setTimeout(checkChrome, 5000);
      return false;
    }
    
    if(!cast){
      chromePresent = false;
      setTimeout(checkChrome, 5000);
      return false;
    }
    chromePresent = true;
    var castContext = cast.framework.CastContext.getInstance();
    const applicationId = '36BAA887';
    const namespace = 'urn:x-cast:gnpchromecast';
    castContext.setOptions({
        autoJoinPolicy: chrome.cast.AutoJoinPolicy.TAB_AND_ORIGIN_SCOPED,
        receiverApplicationId: applicationId
    });
    //castSend(window);
    //cast.framework.messages.customData = {code: 'DANIYAL'};
    
    var stateChanged = cast.framework.CastContextEventType.CAST_STATE_CHANGED;
    castContext.addEventListener(stateChanged, function(event){
      //$('#chromecast').removeClass('chrome-connected');
        var castSession = castContext.getCurrentSession();
        if(castSession != null){
          castSession.addMessageListener(namespace, (namespace, message) => {
            //console.log(namespace, message);
          })
          castSession.sendMessage(namespace, 'HELLO');
        }
        
        //let message = {code: 'testMessage'};
        //message = JSON.stringify(message);
        //cast.sendMessage(namespace, message);
        //cast.framework.messages.CustomCommandRequestData = {"code": "DANIYAL"};
        
        function updateChromeCode(){
          if(chr_gc !== chromecode){
            var media = new chrome.cast.media.MediaInfo('gnpTransparentLogo.png', 'image/png');
          media.customData = {"code": chr_gc};
          var request = new chrome.cast.media.LoadRequest(media);
          //console.log(media);
          castSession && castSession
              .loadMedia(request)
              .then(function(){
                  //console.log('Success');
                  chromecode = chr_gc;
                  $('#chromecast').addClass('chrome-connected');
              })
              .catch(function(error){
                  //console.log('Error: ' + error);
              });
          }
          setTimeout(updateChromeCode, 1000);
        }
        updateChromeCode();

    });
};
}

checkChrome();
var chromecode = '';
var chromePresent = false;


$('#mainpagetitle svg').delay(500).fadeIn();


// SIGN IN SESSION AND OPEN ANIMATION:
var sessionsignin = true;
var freesessionsignin = true;
var openAnimWidth = $(window).width();
var firstWidth = openAnimWidth;
var openAnimHeight = $(window).height();
var openAnimAspectRatio = openAnimWidth/openAnimHeight;



window.addEventListener("resize", function() {
  
  $('#openingcanvas').css('height',openAnimWidth/openAnimAspectRatio);
  $('#openingcanvas').css('transform','scale('+(0.5*firstWidth/openAnimWidth)+')');
  openAnimWidth = $(window).width();

  if(freesessionsignin){
    $('.freeplaylock').fadeOut();
  //$('fieldset').offset({top: $('#mf').offset().top-12.5});
  $('.freeplay').hide();
  $('#signinform').hide();
}else{
  //$('fieldset').offset({top: $('#fb').offset().top-12.5});
}
},false);
$('#gosignin, #signinlogo').hide();
