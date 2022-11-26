<?php
$version_info = new stdClass(); 
$version_info->version = 'v2.0.0';
$version_info->major = 2;
$version_info->minor = 0;
$version_info->revision = 0;
$version_info->release = date("m/d/Y"); // get date() when updating version
$version_info->time_diff = time() - 1646604802; // get time() when updating version
$version_info->updates = new stdClass(); 
$version_info->updates->general_updates = array(array("Navigation","Updates to the navigation bar have been made and users can now sign in, refer to a How To guide, and learn more about GameNight+ on our about page."), array("Bug Fixes","Bugs related to the game pages, nearby game locator, and contact page have been fixed."));
$version_info->updates->user_updates = [["Avatars <div style='height: 50px;width: 50px;display: inline-block;position: relative;margin-top: -25px;top: 12px;margin-bottom: 10px;'>" . file_get_contents("svg/avatars/basic-avatar.svg")."</div>", "Users now have the ability to create custom avatars"],["Plus Tokens <div style='height: 30px; width: 50px; display: inline-block; position: relative; top: 5px;'>" . file_get_contents("svg/vinfo_plus_tokens.svg")."</div>", "Users can now accumulate plus tokens in the following ways: <ul><li>Creating an account</li><li>Winning a game</li><li>Referring a friend</li></ul>"]];
$version_info->updates->game_updates = [["General", "Users can now play certain games online without being together in person.<br/>User-interface adjustments have been made."], ["Fishbowl", "Users can now use a random word generator.<br/>Users will not be able to submit words that have already been submitted."]];
?>