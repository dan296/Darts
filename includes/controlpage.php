<div id="controlbars">
	<?php include($path .'svg/controlbars.dat')?>
	<!--<div class="horiz-cross horiz-cross-top"></div><div class="horiz-cross"></div><div class="horiz-cross horiz-cross-bottom"></div>-->	
</div>
<div id="controlpage">
<div id="controlwrap">
<div class="controlbutton" id='go_home'><div id="minitemplogo" class="logo" style="font-size: 30px;"><img src="../../imgs/gnpTransparentLogo.png" class="logoimg" style="width: auto;"></div></i><span class="controllogolabel">Home</span></div>
<div class = "controlbutton nologo gp_tab" id="gp_video"><div id="videologo" class="logo"><i class="fas fa-video"></i></div><span class="controllogolabel logolabel">Video</span></div>
<div class = "controlbutton nologo gp_tab" id="gp_gamesetup"><div id="setuplogo" class="logo"><i class="fas fa-play" style='left:2px;'></i></div><span class="controllogolabel logolabel">Setup</span></div>
<div class = "controlbutton nologo gp_tab" id="gp_instructions"><div id="instructionslogo" class="logo"><i class="fas fa-book-open"></i></div><span class="controllogolabel logolabel">Instructions</span></div>
<div class = "controlbutton" id="go_signin"><div id="minisigninlogo" class="logo"><i class="fas fa-sign-in-alt"></i></div><span class="controllogolabel">Sign In</span></div>
<div class = "controlbutton" id="go_profile"><div id="miniprofilelogo" class="logo"><i class="fas fa-user-alt"></i></div><span class="controllogolabel">Account</span></div>
<div class = "controlbutton" id="go_guide"><div id="miniguidelogo" class="logo"><i class="fas fa-book"></i></div><span class="controllogolabel">Guide</span></div>
<!-- GUIDE TABS -->
<div class='tabs guide-tabs' data-tab="#body-wrapper">
	<div class="controlbutton mini-section" data-tab="guide-video"><div class="logo"><i class="fas fa-play"></i></div><span class="controllogolabel">Video</span></div>
	<div class="controlbutton mini-section" data-tab="guide-step"><div class="logo"><i class="fas fa-list-ol"></i></div><span class="controllogolabel">Steps</span></div>
	<div class="controlbutton mini-section" data-tab="shortcuts"><div class="logo"><i class="fas fa-cut"></i></div><span class="controllogolabel">Shortcuts</span></div>
</div>
<!-- GUIDE TABS END -->
<div class = "controlbutton" id="go_about"><div id="miniaboutlogo" class="logo"><i class="fas fa-info"></i></div><span class="controllogolabel">About</span></div>
<!-- ABOUT TABS -->
<div class='tabs about-tabs' data-tab-scroll="body" data-tab="#about">
	<div class="controlbutton mini-section" data-tab="about"><div class="logo"><i class="fas fa-book-open"></i></div><span class="controllogolabel">Story</span></div>
	<div class="controlbutton mini-section" data-tab="testimonials"><div class="logo"><i class="fas fa-comment"></i></div><span class="controllogolabel">Testimonials</span></div>
	<div class="controlbutton mini-section" data-tab="team"><div class="logo"><i class="fas fa-user-friends"></i></div><span class="controllogolabel">Team</span></div>
	<div class="controlbutton mini-section" data-tab="pricing"><div class="logo"><i class="fas fa-dollar-sign"></i></div><span class="controllogolabel">Pricing</span></div>
	<div class="controlbutton mini-section" data-tab="faq"><div class="logo"><i class="fas fa-question"></i></div><span class="controllogolabel">FAQs</span></div>
</div>
<!-- ABOUT TABS END -->
<div class = "controlbutton" id="go_contact"><div id="minifeedbacklogo" class="logo"><i class="fas fa-comment-alt" style='top: 6px;'></i></div><span class="controllogolabel">Contact</span></div>
<!--<div class = "controlbutton" id="go_shop"><div id="minishoplogo" class="logo"><i class="fas fa-shopping-cart"></i></div><span class="controllogolabel">Shop</span></div>-->
<div class = "controlbutton" id="gosignout"><div id="minisignoutlogo" class="logo"><i class="fas fa-sign-out-alt"></i></div><span class="controllogolabel">Sign Out</span></div>


<div id="controlfooter"><div style="bottom: 40px;" id="go_terms">Terms of Service</div><div style="bottom: 20px;" id="go_privacy">Privacy Policy</div><div id="version"><?php include("version_info.php");
	echo $version_info->version ?></div></div>
</div>
<div id="controlback" class="controlbutton"><div class="vert-cross"></div><div class="horiz-cross"></div></div>
</div>
