<a id='outerlink' style='opacity:0'></a>
<div id="footer">
	<?php include('imgs/squiggle.svg'); ?>
	<?php include('includes/social.dat'); ?>
	<div id="join" class="subtitle">
		<form id='joingameform' name="gamecodeform" action="joingame.php" autocomplete="off" method="POST">

			Or join a game:

			<?php include($path . "includes/joininputs.dat"); ?>
		</form>
	</div>
	<div id='nearbygames' style="display: none;">
		<div>Join a game nearby:</div>
		<table style='width: 100%'>
			<tbody>
				<tr>
					<th>Game Name:</th>
					<th>Game Code:</th>
				</tr>
			</tbody>
		</table>
		<div id="nearbyrows-wrap" class="disable-scrollbars">
			<table style='width: 100%'>
				<tbody id='nearbyrows'>
				</tbody>
			</table>
		</div>
	</div>
	<?php include($path . "includes/copy.dat"); ?>
</div>