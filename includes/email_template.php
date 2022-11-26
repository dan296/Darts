<?php
$copy = file_get_contents("../includes/copy.dat");
$headers_from_email_template = "MIME-Version: 1.0\r\n";
$headers_from_email_template .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers_from_email_template .= 'From: GameNight+ <service@gamenight.plus>' . "\r\n" .
   'Reply-To: service@gamenight.plus' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();

   $message_beginning_from_email_template = '<html style="font-family: Helvetica Neue, Helvetica, Arial, sans; margin: 0; padding: 0px; background: linear-gradient(0deg, #000000, #21144a); color: white;"><head><link href="confirm.css" rel="stylesheet" /></head><body style="font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans; margin: 0; padding: 25px; padding-bottom: 0; background: linear-gradient(0deg, #000000, #21144a); color: white; font-weight: 300"><div style="display: none; font-size: 0px; line-height: 0px; max-height: 0px; max-width: 0px; width: 0px; opacity: 0; overflow: hidden;"></div>';
	$message_beginning_from_email_template .= '<a href="https://www.gamenight.plus" target="_blank"><img style="display: block; margin: auto; width: 100px; height: auto;" src="https://www.beta.gamenight.plus/imgs/gnpLogo_doNotDelete.png"/></a><div style="margin: auto; max-width: 500px; background: #3d3d3d; border-radius: 5px; padding: 20px;"><h1 style="font-weight: 400; color: white; margin-top: 0;">';
	
	$message_ending_from_email_template = '</div><div style="text-align: center; margin: auto; margin-top: 40px; font-size: 10px;">'.$copy.'</div></body></html>';

?>